<?php namespace Example\Entities;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="post_images")
 */
class PostImage extends Image
{
    /**
     * @var Post
     * @ORM\OneToOne(targetEntity="Post", inversedBy="image")
     */
    private $post;

    /**
     * @param Post $post
     * @param $path
     * @return \Example\Entities\PostImage
     */
    public function __construct(Post $post, $path)
    {
        parent::__construct($path);
        $this->post = $post;
    }
}
