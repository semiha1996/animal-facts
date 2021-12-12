<?php

//src/Model/Status.php

namespace App\Model;

/**
 * Status for animal facts
 * Simple model for statuses
 *
 * @author semiha
 */
class Status 
{
    //Is the fact verified or not
    protected bool $verified;
    
    //How many time the fact is sent for verification
    protected  int $sentCount;
    
    /**
     * Creates new Status object
     * @param bool $verified
     * @param int $sentCount
     */
    public function __construct(bool $verified, int $sentCount) 
    {
        $this->verified = $verified;
        $this->sentCount = $sentCount;
    }
    
    /**
     * Check whether the fact is verified or not
     * @return bool
     */
    public function isVerified(): bool 
    {
        return $this->verified;
    }
    
    /**
     * Returns the sent counter
     * @return int
     */
    public function getSentCount(): int 
    {
        return $this->sentCount;
    }
    
    /**
     * Sets the verified value
     * @param bool $verified
     * @return $this
     */
    public function setVerified(bool $verified) 
    {
        $this->verified = $verified;
        return $this;
    }
    
    /**
     * Sets the sent counter
     * @param int $sentCount
     * @return $this
     */
    public function setSentCount(int $sentCount) 
    {
        $this->sentCount = $sentCount;
        return $this;
    }
}