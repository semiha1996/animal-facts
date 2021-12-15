<?php

//src/tests/FactCollectionTest.php

use App\Model\FactCollection;
use App\Model\Fact;
use App\Model\Status;
use App\Model\User;
use App\Exception\InvalidCollectionObjectException;

/**
 * Test FactCollection
 *
 * @author semiha
 */

    define('EXPECTED_INDEX', 0);
    define('EXPECTED_NEW_VALUE', $fact);
    
class FactCollectionTest extends PHPUnit\Framework\TestCase
{
 
    public function testOffseSetMethodWithValidFactObject() 
    {
        $status = new Status(0,1);
        $user = new User(
             '123ad','/images/img1.png',['first'=>'Ivan', 'last'=>'Ivanov']);
        $fact = new Fact(
              1, 'Cats sleep a lot.', '12f2s4s','cat','2021-11-11','2021-12-12',
                $status, $user
                );
        $fCollection = new FactCollection();
        $fCollection->offsetSet(0, $fact);
    }
    
    /**
     * Test offsetSet Method with invalid Fact
     * @test
     */
    public function testOffseSetMethodWithInvalidFactObject() 
    {
        $status = new Status(0,1);
        $user = new User(
             '123ad','/images/img1.png',['', '']);
        $fact = new Fact(
              1, 'Cats sleep a lot.', '12f2s4s','cat','2021-11-11','2021-12-12',
                $status, $user
                );
       
        $this->expectException(InvalidCollectionObjectException::class);
        $fCollection = new FactCollection();
        $fCollection->offsetSet(0, $fact);
    }
}
