<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Directors
 *
 * @ORM\Table(name="directors")
 * @ORM\Entity
 */
class Directors
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
     * @ORM\ManyToMany(targetEntity="Movies", mappedBy="idDirector")
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
     * @return Directors
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
     * @param \AppBundle\Entity\Movies $idMovie
     * @return Directors
     */
    public function addIdMovie(\AppBundle\Entity\Movies $idMovie)
    {
        $this->idMovie[] = $idMovie;

        return $this;
    }

    /**
     * Remove idMovie
     *
     * @param \AppBundle\Entity\Movies $idMovie
     */
    public function removeIdMovie(\AppBundle\Entity\Movies $idMovie)
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
