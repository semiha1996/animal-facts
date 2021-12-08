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
    protected bool $verified;
    
    protected  int $sentCount;
    
    public function __construct(bool $verified, int $sentCount) 
    {
        $this->verified = $verified;
        $this->sentCount = $sentCount;
    }
    
    public function isVerified(): bool 
    {
        return $this->verified;
    }

    public function getSentCount(): int 
    {
        return $this->sentCount;
    }

    public function setVerified(bool $verified) 
    {
        $this->verified = $verified;
        return $this;
    }

    public function setSentCount(int $sentCount) 
    {
        $this->sentCount = $sentCount;
        return $this;
    }
}