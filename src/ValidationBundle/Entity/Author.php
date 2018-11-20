<?php

namespace ValidationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass="ValidationBundle\Entity\Repository\AuthorRepository")
 * 
 * 
 * @UniqueEntity(
 *     fields={"firstName","lastName"},
 *     errorPath="port",
 *     message="This {{ value }} is already in use on that host.",
 *     repositoryMethod="findByUniqueCriteria"
 * )
 * 
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
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;
    
    /**
     * @var string
     *
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;
    
    /**
     * @var string
     *
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;
    
    /**
     * @var string
     *
     *
     * @Assert\EqualTo(value = "youssef@1234")
     *
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     * 
     */
    private $username;
    
    /**
     * @var string
     *
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=true)
     */
    private $adress;
    
    /**
     * @var string
     *
     *
     * @ORM\Column(name="campany", type="string", length=255, nullable=true)
     */
    private $company;
    
    /**
     * @var string
     *
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;
    
    /**
     * @var string
     *
     *
     * @ORM\Column(name="postal_code", type="integer", length=255, nullable=true)
     */
    private $postalCode;
    
    /**
     * @var string
     *
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;
    
    /**
     * @var string
     *
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;
    
    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="author", cascade={"all"})
     */
    private $books;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    

    /**
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }


    /**
     * @param string $active
     * 
     * @return Author
     */
    public function setActive($active)
    {
        $this->active = $active;
        
        return $this;     
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Author
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Author
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Author
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Author
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return Author
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Author
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Author
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postalCode
     *
     * @param integer $postalCode
     *
     * @return Author
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return integer
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Author
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Add book
     *
     * @param \ValidationBundle\Entity\Book $book
     *
     * @return Author
     */
    public function addBook(\ValidationBundle\Entity\Book $book)
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setAuthor($this);
        }
        
        return $this;
    }

    /**
     * Remove book
     *
     * @param \ValidationBundle\Entity\Book $book
     */
    public function removeBook(\ValidationBundle\Entity\Book $book)
    {
        $this->books->removeElement($book);
        
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            // set the owning side to null (unless already changed)
            if ($book->getAuthor() === $this) {
                $book->setAuthor(null);
            }
        }
        
        return $this;
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBooks()
    {
        return $this->books->toArray();
    }
}
