<?php namespace Example\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Example\ValueObjects\MemberId;
use Example\ValueObjects\Name;

/**
 * @ORM\Entity
 * @ORM\Table(name="members")
 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\Column(type="memberid")
     */
    private $id;

    /**
     * @var \Example\ValueObjects\Name
     * @ORM\Embedded(class = "Example\ValueObjects\Name")
     */
    private $name;

    /**
     * @param \Example\ValueObjects\Name $name
     */
    public function __construct(MemberId $memberId = null, Name $name)
    {
        $this->id = $memberId ?: MemberId::generateNew();
        $this->name = $name;
    }

    /**
     * @return \Example\ValueObjects\MemberId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Example\ValueObjects\Name
     */
    public function getName()
    {
        return $this->name;
    }
}
