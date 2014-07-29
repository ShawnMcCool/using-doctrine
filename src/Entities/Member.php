<?php namespace Example\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Example\ValueObjects\MemberId;
use Example\ValueObjects\Name;

/**
 * @ORM\Entity
 * @ORM\Table(name="members")
 */
final class Member
{
    /**
     * @var MemberId
     * @ORM\Id
     * @ORM\Column(type="memberid")
     */
    private $id;

    /**
     * @var Name
     * @ORM\Embedded(class = "Example\ValueObjects\Name")
     */
    private $name;

    /**
     * @param Name $name
     * @return Member
     */
    public function __construct(Name $name)
    {
        $this->id = MemberId::generateNew();
        $this->name = $name;
    }

    /**
     * @return MemberId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }
}
