<?php

//src/Model/User.php

namespace App\Model;

use App\Exception\InvalidUserNamesException;

/**
 * Description of User
 *
 * @author semiha
 */
class User 
{
    //The user's id
    protected string $id;
    
    //The author's photo
    protected  string $photo;
    
    //User first and last name as array
    protected array $name;
    
    public function __construct(string $id, string $photo, array $name) 
    {
        $this->id = $id;
        $this->photo = $photo;
        $this->name = $name;
    }

    /**
     * 
     * @return string
     */
    public function getId(): string 
    {
        return $this->id;
    }

    /**
     * Returns the photo path
     * @return string
     */
    public function getPhoto(): string 
    {
        return $this->photo;
    }

    /**
     * Return first and last name as array
     * @return array
     */
    public function getName(): array 
    {
        return $this->name;
    }

    public function setId(string $id) 
    {
        $this->id = $id;
        return $this;
    }

    public function setPhoto(string $photo) 
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * Sets the user's first and last names. 
     * 
     * @param array $name
     * @return $this
     * @throws InvalidUserNamesException
     */
    public function setName(array $name) 
    {
     /* If the given parameter does not contain keys "first" or "last" 
     * it will throw an InvalidUserNamesException*/
        
        if(!array_key_exists('first', $name)&&(!array_key_exists('last', $name))) {
            throw new InvalidUserNamesException;
        }else {
            $this->name = $name;
        }
        return $this;
    }


    /**
     * Returns the user's full name
     * 
     */
    public function getFullName(): string 
    {
        $fullName = implode(' ',$name);
        return $fullName;
    } 
    
    /**
     * Returns the user's first name
     * 
     */
     public function getFirstName(): string 
     {  
        $firstName = $name['first'];
        return $firstName;
    } 
    
    /**
     * Returns the user's last name
     * 
     */
     public function getLastName(): string 
    {
         $lastName = $name['last'];
        return $lastName;
    } 
}