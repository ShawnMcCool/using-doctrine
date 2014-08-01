<?php namespace Example\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Rhumsaa\Uuid\Uuid;

/** @ORM\MappedSuperclass */
abstract class Image
{
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $path;

    /**
     * @param $path
     * @return \Example\Entities\Image
     */
    public function __construct($path)
    {
        $this->id = (string) Uuid::uuid1();
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }
} 
