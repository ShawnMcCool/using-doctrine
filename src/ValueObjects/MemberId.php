<?php namespace Example\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;
use Rhumsaa\Uuid\Uuid;

/** @ORM\Embeddable */
final class MemberId
{
    /** @ORM\Column(type = "string") */
    private $id;

    public static function generateNew()
    {
        return new static((string) Uuid::uuid1());
    }

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }
} 
