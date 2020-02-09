<?php

declare(strict_types=1);

namespace Tests\School\Domain\Builder;

use App\School\Domain\Builder\CourseBuilder;
use PHPUnit\Framework\TestCase;

class CourseBuilderTest extends TestCase
{
    private const DEFAULT_NAME  = 'course_name';
    private const DEFAULT_PRICE = 60.00;

    private ?CourseBuilder $builder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->builder = new CourseBuilder();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->builder = null;
    }

    public function testBuildEmptyCourse(): void
    {
        $course = $this->builder
            ->build();

        $this->assertEmpty($course->name);
        $this->assertEquals(0, $course->price);
    }

    public function testBuildCourse(): void
    {
        $course = $this->builder
            ->withName(self::DEFAULT_NAME)
            ->withPrice(self::DEFAULT_PRICE)
            ->build();

        $this->assertEquals(self::DEFAULT_NAME, $course->name);
        $this->assertEquals(self::DEFAULT_PRICE, $course->price);
    }
}
