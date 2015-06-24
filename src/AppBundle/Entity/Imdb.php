<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imdb
 *
 * @ORM\Table(name="imdb")
 * @ORM\Entity
 */
class Imdb
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_imdb", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idImdb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt = 'CURRENT_TIMESTAMP';



    /**
     * Get idImdb
     *
     * @return integer 
     */
    public function getIdImdb()
    {
        return $this->idImdb;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Imdb
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
