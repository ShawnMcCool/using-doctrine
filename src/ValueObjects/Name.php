<?php namespace Example\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;

/** @ORM\Embeddable */
final class Name
{
    /** @ORM\Column(type = "string") */
    private $firstName;

    /** @ORM\Column(type = "string") */
    private $lastName;

    /**
     * @param string $firstName
     * @param string $lastName
     * @return Name
     */
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getFirstName();
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getFullName();
    }

    /**
     * @param Name $name
     * @return bool
     */
    public function equals(Name $name)
    {
        return $this->getFirstName() == $name->getFirstName() &&
            $this->getLastName() == $name->getLastName();
    }
} 
