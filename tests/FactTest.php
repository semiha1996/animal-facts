<?php

use App\Exception\InvalidFactTypeException;
use App\Model\Fact;

/**
 * Test Fact class
 *
 * @author semiha
 */
class FactTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test id getter and setter
     * @test
     */
    public function testGetAndSetIdMethod()
    {
        $fact = new Fact();
        define('EXPECTED_FACT_ID', '20cvcj5');
        $fact->setId(EXPECTED_FACT_ID);
        $this->assertEquals(EXPECTED_FACT_ID, $fact->getId());
    }

    /**
     * Test text getter and setter
     * @test
     */
    public function testGetAndSetTextMethod()
    {
        $fact = new Fact();
        define('EXPECTED_TEXT', 'Cats love long naps');
        $fact->setText(EXPECTED_TEXT);
        $this->assertEquals(EXPECTED_TEXT, $fact->getText());
    }
    /**
     * Test animalType get/set Method With Invalid Data
     * @test
     */
    public function testGetAndSetTypeMethodWithInvalidData()
    {
        $fact = new Fact();
        define('EXPECTED_TYPE_INVALID', 'cow');
        $this->expectException(InvalidFactTypeException::class);
        $this->expectExceptionMessage = 'The type is not allowed';
        $fact->setType('EXPECTED_TYPE_INVALID');
    }
    /**
     * @test
     */
    public function testGetAndSetAnimalTypeMethodWithValidData()
    {
        $fact = new Fact();
        define('EXPECTED_TYPE', 'cat');
        $fact->setType(EXPECTED_TYPE);
        $this->assertEquals(EXPECTED_TYPE, $fact->getType());
    }
    /**
     * Test user id getter and setter
     * @test
     */
    public function testGetAndSetUserIdMethod()
    {
        $fact = new Fact();
        define('EXPECTED_USER_ID', 'abc');
        $fact->setUser(EXPECTED_USER_ID);
        $this->assertEquals(EXPECTED_USER_ID, $fact->getUser());
    }
    /**
     * Test createdAT getter and setter
     * @test
     */
    public function testGetAndSetCreatedAtMethod()
    {
        $fact = new Fact();
        $expectedCreatedAt = new DateTimeImmutable(2001 - 01 - 01);
        $fact->setCreatedAt($expectedCreatedAt);
        $this->assertEquals($expectedCreatedAt, $fact->getCreatedAt());
    }
    /**
     * Test updatedAt getter and setter with data
     * @test
     */
    public function testGetAndSetUpdatedAtMethod()
    {
        $fact = new Fact();
        $expectedUpdatedAt = new DateTimeImmutable(2001 - 01 - 01);
        $fact->setUpdatedAt($expectedUpdatedAt);
        $this->assertEquals($expectedUpdatedAt, $fact->getUpdatedAt());
    }
    /**
     * Test updatedAt getter and setter with null
     * @test
     */
    public function testGetAndSetUpdatedAtMethodWithNull()
    {
        $fact = new Fact();
        $expectedNullUpdatedAt = null;
        $fact->setUpdatedAt($expectedNullUpdatedAt);
        $this->assertEquals($expectedNullUpdatedAt, $fact->getUpdatedAt());
    }
}
