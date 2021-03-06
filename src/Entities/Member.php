<?php namespace Example\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Example\ValueObjects\MemberId;
use Example\ValueObjects\Name;
use Rhumsaa\Uuid\Uuid;

/**
 * @ORM\Entity
 * @ORM\Table(name="members")
 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @var Name
     * @ORM\Embedded(class = "Example\ValueObjects\Name")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="author")
     */
    private $posts;

    /**
     * @ORM\OneToOne(targetEntity="MemberImage", mappedBy="member")
     */
    private $image;

    /**
     * @param Name $name
     * @return Member
     */
    public function __construct(Name $name)
    {
        $this->id = (string) Uuid::uuid1();
        $this->name = $name;
    }

    /**
     * @return MemberId
     */
    public function getId()
    {
        return MemberId::fromString($this->id);
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @return MemberImage
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $path
     * @return MemberImage
     */
    public function setImage($path)
    {
        $image = new MemberImage($this, $path);
        $this->image = $image;
        return $image;
    }

    /**
     * @param $subject
     * @param $body
     * @return Post
     */
    public function addPost($subject, $body)
    {
        return new Post($this, $subject, $body);
    }
}
