<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Persistence\DataFixtures\ORM;

use App\School\Domain\Builder\GroupBuilder;
use App\School\Domain\Model\Course;
use App\School\Domain\Model\Room;
use App\School\Domain\Model\Teacher;
use DateInterval;
use DateTime;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    private const MAX_GROUPS = 15;

    private ObjectManager $manager;
    private GroupBuilder $factory;

    public function __construct(GroupBuilder $factory)
    {
        $this->factory = $factory;
    }

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
            $date = $faker->dateTimeThisMonth;

            $group = $this->factory
                ->create()
                ->withName($faker->text(20))
                ->withWeekday($faker->numberBetween(1, 7))
                ->withHour(new DateTime($faker->time('H:i')))
                ->withStartDate($date)
                ->withEndDate($date->add(new DateInterval('P3M')))
                ->withWhatsAppGroup($faker->text(15))
                ->withCourse($courses[\array_rand($courses)])
                ->withTeacher($teachers[\array_rand($teachers)])
                ->withRoom($rooms[\array_rand($rooms)])
                ->build();

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
