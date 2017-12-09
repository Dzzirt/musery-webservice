<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="song")
 */
class Song
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $author;

    /**
     * @ORM\Column(type="string")
     */
    private $album;

    /**
     * @ORM\Column(type="string")
     */
    private $imagePath;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating = 0;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $lyrics;

    /**
     * @ORM\OneToMany(targetEntity="Review", mappedBy="song")
     */
    private $reviews;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="songs")
     */
    private $tags;


    /**
     * Song constructor.
     * @param $id
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param mixed $album
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getLyrics()
    {
        return $this->lyrics;
    }

    /**
     * @param mixed $lyrics
     */
    public function setLyrics($lyrics)
    {
        $this->lyrics = $lyrics;
    }

    /**
     * @return mixed
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param mixed $reviews
     */
    public function addReviews(array $reviews)
    {
        foreach ($reviews as $review) {
            $this->reviews[] = $review;
        }
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function addTags(array $tags)
    {
        foreach ($tags as $value) {
            $value->addSongs([$this]);
            $this->tags[] = $value;
        }

    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * @param mixed $imagePath
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
    }



    public function __toString()
    {
        return $this->id . $this->name . $this->author . $this->album;
    }


}