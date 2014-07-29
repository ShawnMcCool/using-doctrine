<?php namespace Example\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;
use Rhumsaa\Uuid\Uuid;

/** @ORM\Embeddable */
final class MemberId
{
    /**
     * @var string
     * @ORM\Column(type = "string")
     */
    private $id;

    /**
     * @return MemberId
     */
    public static function generateNew()
    {
        return new static((string) Uuid::uuid1());
    }

    /**
     * @param $id
     * @return MemberId
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }
} 
