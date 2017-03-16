<?php

namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="BookBundle\Repository\MemberRepository")
 */
class Member implements JsonSerializable {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="BookBundle\Entity\Book" , cascade={"persist"})
     */
    private $idBook;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     * 
     */
    private $name;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Member
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idBook = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add idBook
     *
     * @param \BookBundle\Entity\Book $idBook
     *
     * @return Member
     */
    public function addIdBook(\BookBundle\Entity\Book $idBook)
    {
        $this->idBook[] = $idBook;

        return $this;
    }

    /**
     * Remove idBook
     *
     * @param \BookBundle\Entity\Book $idBook
     */
    public function removeIdBook(\BookBundle\Entity\Book $idBook)
    {
        $this->idBook->removeElement($idBook);
    }

    /**
     * Get idBook
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdBook()
    {
        return $this->idBook;
    }
    
    
    //Fonction retournant json du livre emprunté par un membre
    public function jsonSerialize()
    {
        $array = array();
        foreach($this->getIdBook() as $book){
            $array[] = array('id' => $book->getId(), 'name' => $book->getName(), 'category' => $book->getCategory());
        }
        return $array;
    }
}
