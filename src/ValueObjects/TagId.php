<?php namespace Example\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;

final class TagId
{
    /**
     * @var string
     * @ORM\Column(type = "uuid")
     */
    private $id;

    /**
     * @param $id
     * @return TagId
     */
    public static function fromString($id)
    {
        return new static($id);
    }

    /**
     * @param $id
     * @return TagId
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
     * @param TagId $otherId
     * @return bool
     */
    public function equals(TagId $otherId)
    {
        return (string) $this == (string) $otherId;
    }
} 
