<?php

//src/tests/UserTest.php

use App\Model\User;
use App\Exception\InvalidUserNamesException;

/**
 *Test User class
 *
 * @author semiha
 */
    define('EXPECTED_ID','20cv4cj5');
    define('EXPECTED_PHOTO','/images/img1.png');
    define('EXPECTED_NAME',['first'=>'Ivan','last'=>'Ivanov']);
    define('INVALID_NAME',['Semiha','Tahirova']);
    
class UserTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test getFullName method
     * @test
     */
    public function testGetFullNameMethod() 
    {
        $user = new User(EXPECTED_ID, EXPECTED_PHOTO, EXPECTED_NAME);
        define('EXPECTED_FULL_NAME','Ivan Ivanov');
        $this->assertEquals(EXPECTED_FULL_NAME, $user->getFullName());
    }
    /**
     * Test getFirstName method
     * @test
     */
    public function testGetFirstNameMethod() 
    {
        $user = new User(EXPECTED_ID, EXPECTED_PHOTO, EXPECTED_NAME);
        define('EXPECTED_FIRST_NAME','Ivan');
        $this->assertEquals(EXPECTED_FIRST_NAME, $user->getFirstName());
    }
    /**
     * Test getLastName method
     * @test
     */
    public function testGetLastNameMethod() 
    {
        $user = new User(EXPECTED_ID, EXPECTED_PHOTO, EXPECTED_NAME);
        define('EXPECTED_LAST_NAME','Ivanov');
        $this->assertEquals(EXPECTED_LAST_NAME, $user->getLastName());
    }
    
    /**
     * Test setName method with invalid name array
     * @test
     */
    public function testSetNameMethod() 
    {
        $user = new User(EXPECTED_ID, EXPECTED_PHOTO, INVALID_NAME);
        $this->expectException(InvalidUserNamesException::class);
        $this->expectExceptionMessage = 'Invalid name';
        $user->setName(INVALID_NAME);  
    }
}
