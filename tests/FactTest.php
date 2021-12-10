<?php

//src/tests/FactTest.php

use PHPUnit\Framework\TestCase;

/**
 * Test Fact class
 *
 * @author semiha
 */
class FactTest extends TestCase
{
    public function testCanBeCreatedWithValidAnimalType() 
    {
        $this->assertInstanceOf(Fact::class, Fact::fromString());
    }
    public function testCannotBeCreatedWithValidAnimalType() 
    {
        $this->assertInstanceOf(Fact::class, Fact::fromString());
    }
}
