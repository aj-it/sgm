<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preference
 *
 * @ORM\Table(name="preference", indexes={@ORM\Index(name="fk_profile_has_movie_movie1_idx", columns={"id_movie"}), @ORM\Index(name="fk_profile_has_movie_profile1_idx", columns={"id_profile"})})
 * @ORM\Entity
 */
class Preference
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_preference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPreference;

    /**
     * @var boolean
     *
     * @ORM\Column(name="liked", type="boolean", nullable=false)
     */
    private $liked;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \Movie
     *
     * @ORM\ManyToOne(targetEntity="Movie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_movie", referencedColumnName="id_movie")
     * })
     */
    private $idMovie;

    /**
     * @var \Profile
     *
     * @ORM\ManyToOne(targetEntity="Profile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_profile", referencedColumnName="id_profile")
     * })
     */
    private $idProfile;



    /**
     * Get idPreference
     *
     * @return integer 
     */
    public function getIdPreference()
    {
        return $this->idPreference;
    }

    /**
     * Set liked
     *
     * @param boolean $liked
     * @return Preference
     */
    public function setLiked($liked)
    {
        $this->liked = $liked;

        return $this;
    }

    /**
     * Get liked
     *
     * @return boolean 
     */
    public function getLiked()
    {
        return $this->liked;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Preference
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
     * @return Preference
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
     * Set idMovie
     *
     * @param \AppBundle\Entity\Movie $idMovie
     * @return Preference
     */
    public function setIdMovie(\AppBundle\Entity\Movie $idMovie = null)
    {
        $this->idMovie = $idMovie;

        return $this;
    }

    /**
     * Get idMovie
     *
     * @return \AppBundle\Entity\Movie 
     */
    public function getIdMovie()
    {
        return $this->idMovie;
    }

    /**
     * Set idProfile
     *
     * @param \AppBundle\Entity\Profile $idProfile
     * @return Preference
     */
    public function setIdProfile(\AppBundle\Entity\Profile $idProfile = null)
    {
        $this->idProfile = $idProfile;

        return $this;
    }

    /**
     * Get idProfile
     *
     * @return \AppBundle\Entity\Profile 
     */
    public function getIdProfile()
    {
        return $this->idProfile;
    }
}
