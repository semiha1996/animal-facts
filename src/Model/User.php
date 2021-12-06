<?php

//src/Model/User.php

namespace App\Model;

/**
 * Description of User
 *
 * @author semiha
 */
class User {
    protected string $id;
    
    protected  string $photo;
    
    protected array $name;
    
    public function __construct(string $id, string $photo, array $name) {
        $this->id = $id;
        $this->photo = $photo;
        $this->name = $name;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getPhoto(): string {
        return $this->photo;
    }

    public function getName(): array {
        return $this->name;
    }

    public function setId(string $id) {
        $this->id = $id;
        return $this;
    }

    public function setPhoto(string $photo) {
        $this->photo = $photo;
        return $this;
    }

    /**
     * Sets the user's first and last names. 
     * 
     * @param array $name
     * @return $this
     * 
     * If the given parameter does not contain keys "first" or "last" 
     * it will throw an InvalidUserNamesException
     */
    public function setName(array $name) {
        $this->name = $name;
        return $this;
    }


    /**
     * Returns the user's full name
     * 
     */
    public function getFullName(): string {
        return string;
    } 
    
    /**
     * Returns the user's first name
     * 
     */
     public function getFirstName(): string {
        return string;
    } 
    
    /**
     * Returns the user's last name
     * 
     */
     public function getLastName(): string {
        return string;
    } 
}
