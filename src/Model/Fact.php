<?php

namespace App\Model;

use DateTimeImmutable;
use App\Model\Status;
use App\Model\User;
use App\Exception\InvalidFactTypeException;

/**
 * Model for animal facts
 *
 * @author semiha
 */

class Fact
{
    public const CAT = 'cat';

    public const DOG = 'dog';

    public const ALLOWED_TYPES = [self::CAT, self::DOG];

    //The fact's id
    protected string $id = "";

    //The fact's text
    protected string $text;

    //The user's id
    protected string $user;

    //The animal type(cat or dog)
    protected string $type;

    //The Date, the fact is created
    protected DateTimeImmutable $createdAt;

    //The Date, the fact is updated (can be null)
    protected ?DateTimeImmutable $updatedAt;

    //The fact's status
    protected Status $status;

    //The author of a fact (can be null)
    protected ?User $author;

    /**
     *
     * @return string the id of a fact
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Returns the fact text
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Returns the id of the user
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * Returns the type of the animal
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Returns the date the fact was created
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     *  Returns the date the fact was updated or null if not
     * @return DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * Returns the status of a fact
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     *
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * Set the fact id
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set the text of the fact
     *
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $user
     * @return $this
     */
    public function setUser(string $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Sets the type of the animal fact
     * @param string $type
     * @return $this
     *
     * @throws InvalidFactTypeException
     */
    public function setType(string $type)
    {
       // If the type is not allowed it will throw InvalidFactTypeException
        if (!in_array($type, self::ALLOWED_TYPES)) {
            throw new InvalidFactTypeException('The type is not allowed');
        } else {
             $this->type = $type;
        }
        return $this;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Set the fact status (1-verified/0-not verified
     * @param Status $status
     * @return $this
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Sets the author's object if any
     * @param User|null $author
     * @return $this
     */
    public function setAuthor(?User $author)
    {
        $this->author = $author;
        return $this;
    }
}
