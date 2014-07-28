<?php

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="members")
 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Name
     * @ORM\Embedded(class = "Name")
     */
    private $name;

    /**
     * @param Name $name
     */
    public function __construct(Name $name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return $this->name->getFullName();
    }
}
