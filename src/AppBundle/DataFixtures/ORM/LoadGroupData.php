<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Group;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    const MAX_GROUPS = 10;
    const MAX_STUDENTS_PER_GROUP = 20;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $faker = \Faker\Factory::create();

        $students = $this->manager->getRepository('AppBundle:Student')->findAll();

        $courses = $this->manager->getRepository('AppBundle:Course')->findAll();

        $rooms = $this->manager->getRepository('AppBundle:Room')->findAll();

        $teachers = $this->manager->getRepository('AppBundle:Teacher')->findAll();

        for ($i = 1; $i <= self::MAX_GROUPS; ++$i) {
            $group = new Group();
            $group->setName($faker->text(20));
            $group->setWeekday($faker->numberBetween(1, 7));
            $group->setHour(new \DateTime($faker->time('H:i')));
            $group->setStartDate($faker->dateTimeThisMonth);

//            $group->setEndDate($group->getStartDate()->add(new \DateInterval('P3M')));
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
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 6;
    }
}
