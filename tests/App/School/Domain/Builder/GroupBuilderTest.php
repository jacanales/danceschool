<?php

declare(strict_types=1);

namespace Tests\App\School\Domain\Builder;

use App\School\Domain\Builder\GroupBuilder;
use App\School\Domain\Model\Course;
use App\School\Domain\Model\Room;
use App\School\Domain\Model\Teacher;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;

class GroupBuilderTest extends TestCase
{
    private ?GroupBuilder $builder;
    private ?Generator $faker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->builder = new GroupBuilder();
        $this->faker   = Factory::create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->builder = null;
        $this->faker   = null;
    }

    public function testBuildEmptyGroup(): void
    {
        $group = $this->builder->build();

        $this->assertNull($group->course);
        $this->assertNull($group->room);
        $this->assertNull($group->teacher);
        $this->assertEmpty($group->name);
        $this->assertEquals(0, $group->weekday);
        $this->assertNull($group->hour);
        $this->assertNull($group->startDate);
        $this->assertNull($group->endDate);
        $this->assertEmpty($group->whatsAppGroup);
        $this->assertInstanceOf(ArrayCollection::class, $group->groupStudent);
    }

    public function testBuildGroup(): void
    {
        $name          = $this->faker->name;
        $weekday       = $this->faker->numberBetween(0, 6);
        $hour          = new DateTime($this->faker->time('H:i'));
        $startDate     = $this->faker->dateTimeThisMonth;
        $endDate       = $startDate->add(new \DateInterval('P3M'));
        $whatsAppGroup = $this->faker->text(15);

        $group = $this->builder
            ->withName($name)
            ->withWeekday($weekday)
            ->withHour($hour)
            ->withStartDate($startDate)
            ->withEndDate($endDate)
            ->withWhatsAppGroup($whatsAppGroup)
            ->withCourse(new Course())
            ->withRoom(new Room())
            ->withTeacher(new Teacher())
            ->build();

        $this->assertInstanceOf(Course::class, $group->course);
        $this->assertInstanceOf(Room::class, $group->room);
        $this->assertInstanceOf(Teacher::class, $group->teacher);
        $this->assertEquals($name, $group->name);
        $this->assertEquals($weekday, $group->weekday);
        $this->assertEquals($hour, $group->hour);
        $this->assertEquals($startDate, $group->startDate);
        $this->assertEquals($endDate, $group->endDate);
        $this->assertEquals($whatsAppGroup, $group->whatsAppGroup);
        $this->assertInstanceOf(ArrayCollection::class, $group->groupStudent);
    }
}
