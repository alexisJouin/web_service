<?php

namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="BookBundle\Repository\MemberRepository")
 */
class Member {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="BookBundle\Entity\Book")
     * @ORM\JoinColumn(name="id_book", referencedColumnName="id")
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
     * Set idBook
     *
     * @param \BookBundle\Entity\Book $idBook
     *
     * @return Member
     */
    public function setIdBook(\BookBundle\Entity\Book $idBook = null)
    {
        $this->idBook = $idBook;

        return $this;
    }

    /**
     * Get idBook
     *
     * @return \BookBundle\Entity\Book
     */
    public function getIdBook()
    {
        return $this->idBook;
    }
}
