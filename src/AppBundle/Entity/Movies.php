<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movies
 *
 * @ORM\Table(name="movies")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="MovieRepository");
 */
class Movies
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
     * @ORM\Column(name="imdb_id", type="string", length=45, nullable=false)
     */
    private $imdbId;

    /**
     * @var string
     *
     * @ORM\Column(name="imdb_poster", type="string", length=250, nullable=true)
     */
    private $imdbPoster;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Actors", inversedBy="idMovie")
     * @ORM\JoinTable(name="movies_actors",
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
     * @ORM\ManyToMany(targetEntity="Directors", inversedBy="idMovie")
     * @ORM\JoinTable(name="movies_directors",
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
     * @ORM\ManyToMany(targetEntity="Genres", inversedBy="idMovie")
     * @ORM\JoinTable(name="movies_genres",
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
     * Constructor
     */
    public function __construct()
    {
        $this->idActor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idDirector = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idGenre = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Movies
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
     * @return Movies
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
     * @return Movies
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
     * @return Movies
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
     * @return Movies
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
     * @return Movies
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
     * Set imdbId
     *
     * @param string $imdbId
     * @return Movies
     */
    public function setImdbId($imdbId)
    {
        $this->imdbId = $imdbId;

        return $this;
    }

    /**
     * Get imdbId
     *
     * @return string
     */
    public function getImdbId()
    {
        return $this->imdbId;
    }

    /**
     * Set imdbPoster
     *
     * @param string $imdbPoster
     * @return Movies
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
     * Add idActor
     *
     * @param \AppBundle\Entity\Actors $idActor
     * @return Movies
     */
    public function addIdActor(\AppBundle\Entity\Actors $idActor)
    {
        $this->idActor[] = $idActor;

        return $this;
    }

    /**
     * Remove idActor
     *
     * @param \AppBundle\Entity\Actors $idActor
     */
    public function removeIdActor(\AppBundle\Entity\Actors $idActor)
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
     * @param \AppBundle\Entity\Directors $idDirector
     * @return Movies
     */
    public function addIdDirector(\AppBundle\Entity\Directors $idDirector)
    {
        $this->idDirector[] = $idDirector;

        return $this;
    }

    /**
     * Remove idDirector
     *
     * @param \AppBundle\Entity\Directors $idDirector
     */
    public function removeIdDirector(\AppBundle\Entity\Directors $idDirector)
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
     * @param \AppBundle\Entity\Genres $idGenre
     * @return Movies
     */
    public function addIdGenre(\AppBundle\Entity\Genres $idGenre)
    {
        $this->idGenre[] = $idGenre;

        return $this;
    }

    /**
     * Remove idGenre
     *
     * @param \AppBundle\Entity\Genres $idGenre
     */
    public function removeIdGenre(\AppBundle\Entity\Genres $idGenre)
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
}
