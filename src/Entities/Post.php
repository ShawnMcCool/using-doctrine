<?php namespace Example\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Example\ValueObjects\PostId;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
final class Post
{
    /**
     * @var PostId
     * @ORM\Id
     * @ORM\Column(type="postid")
     */
    private $id;

    /** @ORM\Column(type="string") */
    private $subject;

    /** @ORM\Column(type="text") */
    private $body;

    /**
     * @var \Example\Entities\Member
     * @ORM\ManyToOne(targetEntity="Example\Entities\Member", inversedBy="Example\Entities\Post")
     */
    private $author;

    /**
     * @param Member $author
     * @param $subject
     * @param $body
     */
    public function __construct(Member $author, $subject, $body)
    {
        $this->id = PostId::generateNew();
        $this->author = $author;
        $this->subject = $subject;
        $this->body = $body;
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
     * @return \Example\Entities\Member
     */
    public function getAuthor()
    {
        return $this->author;
    }
} 
