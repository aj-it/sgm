<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use AppBundle\Entity\Movie;
use Elasticsearch\Client;

class MovieCommand extends ContainerAwareCommand
{
    protected function configure()
    {
      $this->setName('movie:import')
        ->setDescription('Import des films dans Elasticsearch');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $output->writeln("Début de l'import");
      $client = new Client();

      try {
        $deleteParams['index'] = 'sgm';
        $client->indices()->delete($deleteParams);
      }
      catch (\Elasticsearch\Common\Exceptions\Missing404Exception $e) {
        // nothing
      }

      $movies = $this->getContainer()->get('doctrine')
              ->getRepository('AppBundle:Movie')
              ->listAll(0);
      foreach ($movies as $movie) {

        $dataActors = array();
        foreach ($movie->getActors() as $actor) {
          $dataActors[] = array(
            'idActor' => $actor->getIdActor(),
            'name' => $actor->getName()
          );
        }

        $dataDirectors = array();
        foreach ($movie->getDirectors() as $director) {
          $dataDirectors[] = array(
            'idDirector' => $director->getIdDirector(),
            'name' => $director->getName()
          );
        }

        $dataGenres = array();
        foreach ($movie->getGenres() as $genre) {
          $dataGenres[] = array(
            'idGenre' => $genre->getIdGenre(),
            'name' => $genre->getName()
          );
        }

          $params = array(
            'index' => 'sgm',
            'type' => 'movie',
            'id' => $movie->getIdMovie(),
            'body' => array(
              'title' => $movie->getTitle(),
              'originalTitle' => $movie->getOriginalTitle(),
              'poster' => $movie->getImdbPoster(),
              'year' => $movie->getYear(),
              'releaseDate' => $movie->getReleaseDate(),
              'duration' => $movie->getDuration(),
              'imdbRating' => $movie->getImdbRating(),
              'actors' => $dataActors,
              'directors' => $dataDirectors,
              'genres' => $dataGenres,
              'preferences' => array(
                
              )
            )
          );

          $client->index($params);
          $output->writeln($movie->getTitle());
      }

      $output->writeln("Fin de l'import");
    }
}
