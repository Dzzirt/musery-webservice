<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TagRepository")
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="search_count", type="integer")
     */
    private $searchCount;

    /**
     * @ORM\ManyToMany(targetEntity="Song", mappedBy="tags")
     */
    private $songs;

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        $this->songs = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getSongs()
    {
        return $this->songs;
    }

    /**
     * @param mixed $songs
     */
    public function addSongs(array $songs)
    {
        foreach ($songs as $value) {
            $this->songs[] = $value;
        }
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSearchCount(): int
    {
        return $this->searchCount;
    }

    /**
     * @param int $searchCount
     */
    public function setSearchCount(int $searchCount)
    {
        $this->searchCount = $searchCount;
    }



}

