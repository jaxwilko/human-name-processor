<?php

namespace JaxName;

class HumanName
{
    protected $original;
    protected $title;
    protected $firstName;
    protected $lastName;
    
    public function __construct(string $original = null)
    {
        if ($original) {
            $this->setOriginal($original);
        }
    }

    public function __toString()
    {
        return str_replace('  ', ' ',
            trim(
                sprintf(
                    '%s %s %s',
                    $this->getTitle(),
                    $this->getFirstName(),
                    $this->getLastName()
                )
            )
        );
    }

    public function getOriginal(): ?string
    {
        return $this->original;
    }
    
    public function setOriginal(string $original): HumanName
    {
        $this->original = $original;

        return $this;
    }
    
    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    public function setTitle(string $title): HumanName
    {
        $this->title = $title;

        return $this;
    }
    
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }
    
    public function setFirstName(string $firstName): HumanName
    {
        $this->firstName = $firstName;

        return $this;
    }
    
    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    
    public function setLastName(string $lastName): HumanName
    {
        $this->lastName = $lastName;

        return $this;
    }
}
