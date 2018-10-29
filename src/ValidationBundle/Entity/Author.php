<?php

namespace ValidationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass="ValidationBundle\Entity\Repository\AuthorRepository")
 */
class Author
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
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    
    /**
     * @var boolean
     *
     *
     * @ORM\Column(name="notification", type="boolean", length=255)
     */
    private $notification;
    
    
    
    /**
     * @var string
     *
     *
     * @ORM\Column(name="book", type="string", length=255)
     */
    private $book;


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
     * @return string
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set book
     * 
     * @param string $book
     * 
     * @return Author
     */
    public function setBook($book)
    {
        $this->book = $book;
        
        return $this;
    }

    /**
     * @return boolean
     */
    public function isNotification()
    {
        return $this->notification;
    }

    /**
     * 
     * Set notification
     * 
     * @param boolean $notification
     * 
     * @return Author
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;
        
        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Author
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
}

