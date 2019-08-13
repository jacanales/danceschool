<?php

namespace App\DataFixtures\ORM;

use App\School\Domain\Entity\Course;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCourseData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $this->addCourse('MAMA FIT');
        $this->addCourse('ZUMBA KIDS');
        $this->addCourse('ZUMBA');
        $this->addCourse('SALSA INICIO');
        $this->addCourse('SALSA BASICO');
        $this->addCourse('SALSA MEDIO');
        $this->addCourse('SALSA ALTO');
        $this->addCourse('LATINOS');
        $this->addCourse('PARTICULAR');
        $this->addCourse('BACHATA INICIO');
        $this->addCourse('BACHATA BASICO');
        $this->addCourse('BACHATA MEDIO');
        $this->addCourse('BACHATA ALTO');
        $this->addCourse('COREOGRAFICO');
        $this->addCourse('ESTILO LADIES');

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 4;
    }

    private function addCourse(string $name, float $price = 75): void
    {
        $course = new Course();
        $course->setName($name)
            ->setPrice($price);

        $this->manager->persist($course);
    }
}
