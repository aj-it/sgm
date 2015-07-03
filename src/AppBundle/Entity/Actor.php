<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actor
 *
 * @ORM\Table(name="actor")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ActorRepository");
 */
class Actor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_actor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActor;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Movie", mappedBy="idActor")
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
     * Get idActor
     *
     * @return integer 
     */
    public function getIdActor()
    {
        return $this->idActor;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Actor
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
     * @return Actor
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
