<?php

namespace App\DataFixtures\ORM;

use App\School\Domain\Entity\Course;
use App\School\Domain\Entity\Group;
use App\School\Domain\Entity\Room;
use App\School\Domain\Entity\Teacher;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    private const MAX_GROUPS = 10;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $faker = Factory::create();

        $courses  = $this->manager->getRepository(Course::class)->findAll();
        $rooms    = $this->manager->getRepository(Room::class)->findAll();
        $teachers = $this->manager->getRepository(Teacher::class)->findAll();

        for ($i = 1; $i <= self::MAX_GROUPS; ++$i) {
            $group = new Group();
            $group->setName($faker->text(20));
            $group->setWeekday($faker->numberBetween(1, 7));
            $group->setHour(new \DateTime($faker->time('H:i')));
            $group->setStartDate($faker->dateTimeThisMonth);

            $group->setEndDate($group->getStartDate()->add(new \DateInterval('P3M')));
            $group->setWhatsappGroup($faker->text(15));

            $courseIndex = array_rand($courses);
            $group->setCourse($courses[$courseIndex]);

            $teacherIndex = array_rand($teachers);
            $group->setTeacher($teachers[$teacherIndex]);

            $roomIndex = array_rand($rooms);
            $group->setRoom($rooms[$roomIndex]);

            $this->manager->persist($group);
        }

        $this->manager->flush();
    }

    /**
     * Get the order of this fixture.
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 6;
    }
}
