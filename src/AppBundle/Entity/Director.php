<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Director
 *
 * @ORM\Table(name="director")
 * @ORM\Entity
 */
class Director
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_director", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDirector;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Movie", mappedBy="idDirector")
     */
    private $idMovie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idMovie = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idDirector
     *
     * @return integer 
     */
    public function getIdDirector()
    {
        return $this->idDirector;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Director
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
     * Add idMovie
     *
     * @param \AppBundle\Entity\Movie $idMovie
     * @return Director
     */
    public function addIdMovie(\AppBundle\Entity\Movie $idMovie)
    {
        $this->idMovie[] = $idMovie;

        return $this;
    }

    /**
     * Remove idMovie
     *
     * @param \AppBundle\Entity\Movie $idMovie
     */
    public function removeIdMovie(\AppBundle\Entity\Movie $idMovie)
    {
        $this->idMovie->removeElement($idMovie);
    }

    /**
     * Get idMovie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdMovie()
    {
        return $this->idMovie;
    }
}
