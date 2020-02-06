<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Persistence\DataFixtures\ORM;

use App\School\Domain\Model\Course;
use App\School\Domain\Model\Group;
use App\School\Domain\Model\Room;
use App\School\Domain\Model\Teacher;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    private const MAX_GROUPS = 15;

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

        /** @var Course[] $courses */
        $courses = $this->manager->getRepository(Course::class)->findAll();

        /** @var Room[] $rooms */
        $rooms = $this->manager->getRepository(Room::class)->findAll();

        /** @var Teacher[] $teachers */
        $teachers = $this->manager->getRepository(Teacher::class)->findAll();

        for ($i = 1; $i <= self::MAX_GROUPS; ++$i) {
            $group = new Group();
            $group->setName($faker->text(20));
            $group->setWeekday($faker->numberBetween(1, 7));
            $group->setHour(new \DateTime($faker->time('H:i')));

            $startDate = $faker->dateTimeThisMonth;
            $group->setStartDate($startDate);
            $group->setEndDate($startDate->add(new \DateInterval('P3M')));
            $group->setWhatsAppGroup($faker->text(15));

            $courseIndex = \array_rand($courses);
            $group->setCourse($courses[$courseIndex]);

            $teacherIndex = \array_rand($teachers);
            $group->setTeacher($teachers[$teacherIndex]);

            $roomIndex = \array_rand($rooms);
            $group->setRoom($rooms[$roomIndex]);

            $this->manager->persist($group);
        }

        $this->manager->flush();
    }

    /**
     * Get the order of this fixture.
     */
    public function getOrder(): int
    {
        return 6;
    }
}
