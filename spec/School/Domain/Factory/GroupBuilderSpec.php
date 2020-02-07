<?php

declare(strict_types=1);

namespace spec\School\Domain\Factory;

use App\School\Domain\Builder\GroupBuilder;
use App\School\Domain\Model\Course;
use App\School\Domain\Model\Group;
use App\School\Domain\Model\Room;
use App\School\Domain\Model\Teacher;
use DateTime;
use Faker\Factory;
use Faker\Generator;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;

/**
 * @mixin GroupBuilder|ObjectBehavior
 */
class GroupBuilderSpec extends ObjectBehavior
{
    private Generator $faker;

    public function let(): void
    {
        $this->beAnInstanceOf(GroupBuilder::class);

        $this->create();
        $this->faker = Factory::create();
    }

    public function it_adds_name(): void
    {
        $value = $this->faker->text(20);

        $this->withName($value)->shouldBeAnInstanceOf(GroupBuilder::class);
        $this->build()->shouldHavePropertyWithValue('name', $value);
    }

    public function it_adds_weekday(): void
    {
        $value = $this->faker->numberBetween(1, 7);

        $this->withWeekday($value)->shouldBeAnInstanceOf(GroupBuilder::class);
        $this->build()->shouldHavePropertyWithValue('weekday', $value);
    }

    public function it_adds_hour(): void
    {
        $value = new DateTime($this->faker->time('H:i'));

        $this->withHour($value)->shouldBeAnInstanceOf(GroupBuilder::class);
        $this->build()->shouldHavePropertyWithValue('hour', $value);
    }

    public function it_adds_start_date(): void
    {
        $value = $this->faker->dateTimeThisMonth;

        $this->withStartDate($value)->shouldBeAnInstanceOf(GroupBuilder::class);
        $this->build()->shouldHavePropertyWithValue('startDate', $value);
    }

    public function it_adds_end_date(): void
    {
        $value = $this->faker->dateTimeThisMonth;

        $this->withEndDate($value)->shouldBeAnInstanceOf(GroupBuilder::class);
        $this->build()->shouldHavePropertyWithValue('endDate', $value);
    }

    public function it_adds_whatsapp_group(): void
    {
        $value = $this->faker->text();

        $this->withWhatsAppGroup($value)->shouldBeAnInstanceOf(GroupBuilder::class);
        $this->build()->shouldHavePropertyWithValue('whatsAppGroup', $value);
    }

    public function it_adds_course(): void
    {
        $value = new Course();

        $this->withCourse($value)->shouldBeAnInstanceOf(GroupBuilder::class);
        $this->build()->shouldHavePropertyWithValue('course', $value);
    }

    public function it_adds_teacher(): void
    {
        $value = new Teacher();

        $this->withTeacher($value)->shouldBeAnInstanceOf(GroupBuilder::class);
        $this->build()->shouldHavePropertyWithValue('teacher', $value);
    }

    public function it_adds_room(): void
    {
        $value = new Room();

        $this->withRoom($value)->shouldBeAnInstanceOf(GroupBuilder::class);
        $this->build()->shouldHavePropertyWithValue('room', $value);
    }

    public function getMatchers(): array
    {
        return [
            'havePropertyWithValue' => function (Group $object, string $property, $expected) {
                if (!\property_exists($object, $property)) {
                    throw new FailureException('Invalid property');
                }

                if ($object->{$property} === $expected) {
                    return true;
                }

                throw new FailureException('Property not match.');
            },
        ];
    }
}
