<?php

declare(strict_types=1);

namespace App\School\Infrastructure\Persistence\DataFixtures\ORM;

use App\School\Domain\Builder\CourseBuilder;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class LoadCourseData extends AbstractFixture implements OrderedFixtureInterface
{
    private ObjectManager $manager;
    private CourseBuilder $builder;
    private Generator $faker;

    public function __construct(CourseBuilder $builder)
    {
        $this->builder = $builder;
        $this->faker   = Factory::create();
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

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

    private function addCourse(string $name): void
    {
        $course = $this->builder
            ->create()
            ->withName($name)
            ->withPrice($this->faker->randomFloat(50, 80))
            ->build();

        $this->manager->persist($course);
    }
}
