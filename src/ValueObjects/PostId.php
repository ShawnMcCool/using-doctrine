<?php namespace Example\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;

/** @ORM\Embeddable */
final class PostId
{
    /**
     * @var string
     * @ORM\Column(type = "uuid")
     */
    private $id;

    /**
     * @param string $id
     * @return PostId
     */
    public static function fromString($id)
    {
        return new static($id);
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
    public function __toString()
    {
        return $this->id;
    }

    /**
     * @param PostId $other
     * @return bool
     */
    public function equals(PostId $other)
    {
        return $this->id == $other->id;
    }
} 
