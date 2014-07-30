<?php namespace Example\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;
use Rhumsaa\Uuid\Uuid;

/** @ORM\Embeddable */
final class PostId
{
    /**
     * @var string
     * @ORM\Column(type = "string")
     */
    private $id;

    /**
     * @return PostId
     */
    public static function generateNew()
    {
        return new static((string) Uuid::uuid1());
    }

    /**
     * @param $id
     * @return PostId
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

    /**
     * @param PostId $otherId
     * @return bool
     */
    public function equals(PostId $otherId)
    {
        return $this->id == (string) $otherId;
    }
} 
