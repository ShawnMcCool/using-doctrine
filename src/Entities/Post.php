<?php namespace Example\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Example\ValueObjects\PostId;
use Rhumsaa\Uuid\Uuid;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
final class Post
{
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     */
    private $id;

    /** @ORM\Column(type="string") */
    private $subject;

    /** @ORM\Column(type="text") */
    private $body;

    /** @ORM\ManyToMany(targetEntity="Tag", inversedBy="posts") */
    private $tags;

    /**
     * @var Member
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="posts")
     */
    private $author;

    /**
     * @param Member $author
     * @param $subject
     * @param $body
     */
    public function __construct(Member $author, $subject, $body)
    {
        $this->id = (string) Uuid::uuid1();
        $this->author = $author;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * @return PostId
     */
    public function getId()
    {
        return new PostId($this->id);
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return Member
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     */
    public function addTag(Tag $tag)
    {
        $this->tags[] = $tag;
    }
} 
