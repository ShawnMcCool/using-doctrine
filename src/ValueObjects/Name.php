<?php namespace Example\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;

/** @ORM\Embeddable */
class Name
{
    /** @ORM\Column(type = "string") */
    private $firstName;

    /** @ORM\Column(type = "string") */
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function __toString()
    {
        return $this->getFullName();
    }
} 
