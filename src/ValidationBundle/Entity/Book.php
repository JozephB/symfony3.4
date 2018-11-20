<?php

namespace ValidationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ValidationBundle\Entity\Author;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="ValidationBundle\Repository\BookRepository")
 */
class Book
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="books", cascade={"persist"})
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;
    


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
     * @return Book
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


    /**
     * Set author
     *
     * @param Author $author
     *
     * @return Book
     */
    public function setAuthor(Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }
    
    /**
     * 
     * @return string
     */
    public function __toString(){
        
        return $this->name;
    }
}
