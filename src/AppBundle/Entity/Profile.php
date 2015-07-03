<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ProfileRepository");
 */
class Profile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_profile", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProfile;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     */
    private $username;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_connection", type="datetime", nullable=true)
     */
    private $lastConnection;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Movie", inversedBy="idProfile")
     * @ORM\JoinTable(name="preference",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_profile", referencedColumnName="id_profile")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_movie", referencedColumnName="id_movie")
     *   }
     * )
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
     * Get idProfile
     *
     * @return integer 
     */
    public function getIdProfile()
    {
        return $this->idProfile;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Profile
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Profile
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

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Profile
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Profile
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set lastConnection
     *
     * @param \DateTime $lastConnection
     * @return Profile
     */
    public function setLastConnection($lastConnection)
    {
        $this->lastConnection = $lastConnection;

        return $this;
    }

    /**
     * Get lastConnection
     *
     * @return \DateTime 
     */
    public function getLastConnection()
    {
        return $this->lastConnection;
    }

    /**
     * Add idMovie
     *
     * @param \AppBundle\Entity\Movie $idMovie
     * @return Profile
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
