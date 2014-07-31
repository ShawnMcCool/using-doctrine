<?php namespace Example\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Example\ValueObjects\TagId;

/**
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
final class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="string") */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="tags")
     **/
    private $posts;

    /**
     * @param $name
     * @return Tag
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return TagId
     */
    public function getId()
    {
        return TagId::fromString($this->id);
    }

    /**
     * @return string
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
} 
