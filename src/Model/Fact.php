<?php

//src/Model/Fact.php

namespace App\Model;

use \DateTimeImmutable;
use App\Model\Status;
use App\Model\User;

/**
 * Model for animal facts
 *
 * @author semiha
 */

class Fact {
    public const CAT = 'cat';
    
    public const DOG = 'dog';
    
    public const ALLOWED_TYPES = [self::CAT, self::DOG];
            
    protected string $id;
    
    protected string $text;
    
    protected string $user;
    
    protected string $type;
    
    protected DateTimeImmutable $createdAt;
    
    protected ?DateTimeImmutable $updatedAt;
    
    protected Status $status;
    
    protected ?User $author;
    
    
    public function getId(): string {
        return $this->id;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getUser(): string {
        return $this->user;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getCreatedAt(): DateTimeImmutable {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTimeImmutable {
        return $this->updatedAt;
    }

    public function getStatus(): Status {
        return $this->status;
    }

    public function getAuthor(): ?User {
        return $this->author;
    }

    public function setId(string $id) {
        $this->id = $id;
        return $this;
    }

    public function setText(string $text) {
        $this->text = $text;
        return $this;
    }

    public function setUser(string $user) {
        $this->user = $user;
        return $this;
    }

    public function setType(string $type) {
        $this->type = $type;
        return $this;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function setStatus(Status $status) {
        $this->status = $status;
        return $this;
    }

    public function setAuthor(?User $author) {
        $this->author = $author;
        return $this;
    }


}
