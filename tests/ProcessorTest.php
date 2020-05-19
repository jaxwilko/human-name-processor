<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class CompilerTest extends TestCase
{
    protected $processor;

    protected function setUp(): void
    {
        $this->processor = new \JaxName\HumanNameProcessor();
    }

    public function testCanParseProperName(): void
    {
        $test = 'Mr. John Smith';
        $name = $this->processor->make($test);
        $this->assertEquals($test, $name);
    }

    public function testCanParseFirstNameMissing(): void
    {
        $test = 'Mr. Smith';
        $name = $this->processor->make($test);
        $this->assertEquals(null, $name->getFirstName());
        $this->assertEquals('Smith', $name->getLastName());
    }

    public function testCanParseFirstNameDot(): void
    {
        $test = '. Smith';
        $name = $this->processor->make($test);
        $this->assertEquals(null, $name->getFirstName());
        $this->assertEquals('Smith', $name->getLastName());
    }

    public function testCanParseLastNameDot(): void
    {
        $test = 'John .';
        $name = $this->processor->make($test);
        $this->assertEquals('John', $name->getFirstName());
        $this->assertEquals(null, $name->getLastName());
    }

    public function testCanParseComplexLastName(): void
    {
        $test = 'John McSmith';
        $name = $this->processor->make($test);
        $this->assertEquals('John', $name->getFirstName());
        $this->assertEquals('McSmith', $name->getLastName());
    }

    public function testCanParseNoTitle(): void
    {
        $test = 'John Smith';
        $name = $this->processor->make($test);
        $this->assertEquals(null, $name->getTitle());
        $this->assertEquals('John', $name->getFirstName());
        $this->assertEquals('Smith', $name->getLastName());
    }

    public function testCanParseAdditionalLastNames(): void
    {
        $test = 'Mr. John Smith the Third';
        $name = $this->processor->make($test);
        $this->assertEquals('Mr.', $name->getTitle());
        $this->assertEquals('John', $name->getFirstName());
        $this->assertEquals('Smith the Third', $name->getLastName());
    }

    public function testCanRetainCasing(): void
    {
        $test = 'Mr. John Smith the third';
        $name = $this->processor->make($test);
        $this->assertEquals('Mr.', $name->getTitle());
        $this->assertEquals('John', $name->getFirstName());
        $this->assertEquals('Smith the third', $name->getLastName());
    }
}
