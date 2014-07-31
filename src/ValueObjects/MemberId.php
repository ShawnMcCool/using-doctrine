<?php namespace Example\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;

/** @ORM\Embeddable */
final class MemberId
{
    /**
     * @var string
     * @ORM\Column(type = "uuid")
     */
    private $id;

    /**
     * @param $id
     * @return MemberId
     */
    public static function fromString($id)
    {
        return new static($id);
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
    public function __toString()
    {
        return $this->id;
    }

    /**
     * @param MemberId $otherId
     * @return bool
     */
    public function equals(MemberId $otherId)
    {
        return (string) $this == (string) $otherId;
    }
} 
