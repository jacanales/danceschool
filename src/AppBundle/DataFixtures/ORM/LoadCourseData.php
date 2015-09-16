<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Course;

class LoadCourseData implements FixtureInterface
{
    private $manager;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
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

    private function addCourse($description, $price = 75)
    {
        $course = new Course();
        $course->setDescription($description)
            ->setPrice($price);


        $this->manager->persist($course);
    }
}
