<?php

use App\Model\FactCollection;
use App\Model\Fact;
use App\Model\Status;
use App\Model\User;

/**
 * Test FactCollection
 * When valid object is passed to the offsetSet method, the count of elements in
 * $fCollection is set to 1
 * @author semiha
 * @test
 */

class FactCollectionTest extends PHPUnit\Framework\TestCase
{
    public function testOffseSetMethodWithValidFactObject()
    {
        $status = new Status(0, 1);
        $user = new User(
            '123ad',
            '/images/img1.png',
            ['first' => 'Ivan', 'last' => 'Ivanov']
        );
        $fact = new Fact(
            1,
            'Cats sleep a lot.',
            '12f2s4s',
            'cat',
            '2021-11-11',
            '2021-12-12',
            $status,
            $user
        );

        $fCollection = new FactCollection();
        $fCollection->offsetSet(0, $fact);
        $expectedCount = 1;
        $actualCount = $fCollection->count();

        $this->assertEquals($expectedCount, $actualCount);
    }

    /**
     * Test offsetSet Method with invalid Fact
     * When invalid object is passed to the offsetSet method, the count of
     * elements in $fCollection is 0
     * @test
     */
    public function testOffseSetMethodWithInvalidFactObject()
    {
        $user = new User(
            '123ad',
            '/images/img1.png',
            ['', '']
        );

        $fCollection = new FactCollection();
        $fCollection->offsetSet(0, $user);
        $expectedCount = 0;
        $actualCount = $fCollection->count();

        $this->assertEquals($expectedCount, $actualCount);
    }
}
