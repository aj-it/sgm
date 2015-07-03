<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 *
 * @ORM\Table(name="movie", indexes={@ORM\Index(name="fk_movies_imdb1_idx", columns={"imdb_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="MovieRepository");
 */
class Movie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_movie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMovie;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="original_title", type="string", length=200, nullable=true)
     */
    private $originalTitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="smallint", nullable=false)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="release_date", type="string", length=45, nullable=true)
     */
    private $releaseDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="smallint", nullable=false)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="imdb_rating", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $imdbRating;

    /**
     * @var string
     *
     * @ORM\Column(name="imdb_poster", type="string", length=250, nullable=true)
     */
    private $imdbPoster;

    /**
     * @var \Imdb
     *
     * @ORM\ManyToOne(targetEntity="Imdb")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imdb_id", referencedColumnName="id_imdb")
     * })
     */
    private $imdb;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Actor", inversedBy="idMovie")
     * @ORM\JoinTable(name="movie_actor",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_movie", referencedColumnName="id_movie")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_actor", referencedColumnName="id_actor")
     *   }
     * )
     */
    private $idActor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Director", inversedBy="idMovie")
     * @ORM\JoinTable(name="movie_director",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_movie", referencedColumnName="id_movie")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_director", referencedColumnName="id_director")
     *   }
     * )
     */
    private $idDirector;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="idMovie")
     * @ORM\JoinTable(name="movie_genre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_movie", referencedColumnName="id_movie")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_genre", referencedColumnName="id_genre")
     *   }
     * )
     */
    private $idGenre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Profile", mappedBy="idMovie")
     */
    private $idProfile;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idActor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idDirector = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idGenre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idProfile = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idMovie
     *
     * @return integer 
     */
    public function getIdMovie()
    {
        return $this->idMovie;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Movie
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set originalTitle
     *
     * @param string $originalTitle
     * @return Movie
     */
    public function setOriginalTitle($originalTitle)
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    /**
     * Get originalTitle
     *
     * @return string 
     */
    public function getOriginalTitle()
    {
        return $this->originalTitle;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Movie
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set releaseDate
     *
     * @param string $releaseDate
     * @return Movie
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return string 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Movie
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set imdbRating
     *
     * @param string $imdbRating
     * @return Movie
     */
    public function setImdbRating($imdbRating)
    {
        $this->imdbRating = $imdbRating;

        return $this;
    }

    /**
     * Get imdbRating
     *
     * @return string 
     */
    public function getImdbRating()
    {
        return $this->imdbRating;
    }

    /**
     * Set imdbPoster
     *
     * @param string $imdbPoster
     * @return Movie
     */
    public function setImdbPoster($imdbPoster)
    {
        $this->imdbPoster = $imdbPoster;

        return $this;
    }

    /**
     * Get imdbPoster
     *
     * @return string 
     */
    public function getImdbPoster()
    {
        return $this->imdbPoster;
    }

    /**
     * Set imdb
     *
     * @param \AppBundle\Entity\Imdb $imdb
     * @return Movie
     */
    public function setImdb(\AppBundle\Entity\Imdb $imdb = null)
    {
        $this->imdb = $imdb;

        return $this;
    }

    /**
     * Get imdb
     *
     * @return \AppBundle\Entity\Imdb 
     */
    public function getImdb()
    {
        return $this->imdb;
    }

    /**
     * Add idActor
     *
     * @param \AppBundle\Entity\Actor $idActor
     * @return Movie
     */
    public function addIdActor(\AppBundle\Entity\Actor $idActor)
    {
        $this->idActor[] = $idActor;

        return $this;
    }

    /**
     * Remove idActor
     *
     * @param \AppBundle\Entity\Actor $idActor
     */
    public function removeIdActor(\AppBundle\Entity\Actor $idActor)
    {
        $this->idActor->removeElement($idActor);
    }

    /**
     * Get idActor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdActor()
    {
        return $this->idActor;
    }

    /**
     * Add idDirector
     *
     * @param \AppBundle\Entity\Director $idDirector
     * @return Movie
     */
    public function addIdDirector(\AppBundle\Entity\Director $idDirector)
    {
        $this->idDirector[] = $idDirector;

        return $this;
    }

    /**
     * Remove idDirector
     *
     * @param \AppBundle\Entity\Director $idDirector
     */
    public function removeIdDirector(\AppBundle\Entity\Director $idDirector)
    {
        $this->idDirector->removeElement($idDirector);
    }

    /**
     * Get idDirector
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdDirector()
    {
        return $this->idDirector;
    }

    /**
     * Add idGenre
     *
     * @param \AppBundle\Entity\Genre $idGenre
     * @return Movie
     */
    public function addIdGenre(\AppBundle\Entity\Genre $idGenre)
    {
        $this->idGenre[] = $idGenre;

        return $this;
    }

    /**
     * Remove idGenre
     *
     * @param \AppBundle\Entity\Genre $idGenre
     */
    public function removeIdGenre(\AppBundle\Entity\Genre $idGenre)
    {
        $this->idGenre->removeElement($idGenre);
    }

    /**
     * Get idGenre
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdGenre()
    {
        return $this->idGenre;
    }

    /**
     * Add idProfile
     *
     * @param \AppBundle\Entity\Profile $idProfile
     * @return Movie
     */
    public function addIdProfile(\AppBundle\Entity\Profile $idProfile)
    {
        $this->idProfile[] = $idProfile;

        return $this;
    }

    /**
     * Remove idProfile
     *
     * @param \AppBundle\Entity\Profile $idProfile
     */
    public function removeIdProfile(\AppBundle\Entity\Profile $idProfile)
    {
        $this->idProfile->removeElement($idProfile);
    }

    /**
     * Get idProfile
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdProfile()
    {
        return $this->idProfile;
    }
}
