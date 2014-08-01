<?php namespace Example\Entities;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="member_images")
 */
class MemberImage extends Image
{
    /**
     * @var Member
     * @ORM\OneToOne(targetEntity="Member", inversedBy="image")
     */
    private $member;

    /**
     * @param Member $member
     * @param $path
     * @return MemberImage
     */
    public function __construct(Member $member, $path)
    {
        parent::__construct($path);
        $this->member = $member;
    }

    /**
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }
}
