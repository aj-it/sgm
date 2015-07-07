<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Movie;
use Elasticsearch\Client;

class MovieController extends Controller {

    /**
     * @Route("/api/movie/list", name="movie-list")
     */
    public function listAction() {
        $movies = $this->getDoctrine()
                ->getRepository('AppBundle:Movie')
                ->listAll();
        $data = array();
        foreach ($movies as $movie) {
            $data[] = array(
                'id' => $movie->getIdMovie(),
                'title' => $movie->getTitle(),
                'poster' => $movie->getImdbPoster()
            );
        }
        return new JsonResponse($data);
    }

    /**
     * @Route("/api/movie/search", name="movie-search")
     */
    public function searchAction()
    {
      $query = $this->get('request')->get('query');
      $page = $this->get('request')->get('page');
      $count = $this->get('request')->get('count');

      $from = ($count * $page) - $count;

      $client = new Client();

      $params['index'] = 'sgm';
      $params['type']  = 'movie';
      $params['size'] = $count;
      $params['from'] = $from;

      $params['body'] = array(
        'query' => array(
          'multi_match' => array(
            'query' => $query,
            'fields' => ['title', 'actors.name', 'directors.name', 'genres.name'],
            'operator' => 'or'
          )
        )
      );

      $results = $client->search($params);
      $total = $results['hits']['total'];

      $data = array(
        'result' => array(),
        'page' => $page,
        'total' => $total,
        'count' => $count
      );
      foreach ($results['hits']['hits'] as $doc) {
        $row = array();
        $row['id'] = $doc['_id'];
        $row['title'] = $doc['_source']['title'];
        $row['poster'] = $doc['_source']['poster'];
        $data['result'][] = $row;
      }

      return new JsonResponse($data);
    }

    /**
     * @Route("/elastic/test", name="test")
     */
    public function testAction() {

      $client = new Client();
/*
      $params = array(
        'index' => 'sgm',
        'type' => 'movie',
        'id' => 1,
        'body' => array(
          'title' => "The Matrix",
          'year' => 1999,
          'duration' => 136,
          'genre' => 'Sci-Fi'
        )
      );

      $ret = $client->index($params);
*/
/*
      $getParams = array();
      $getParams['index'] = 'sgm';
      $getParams['type']  = 'movie';
      $getParams['id']    = '1';
      $retDoc = $client->get($getParams);
*/
      $params['index'] = 'sgm';
      $params['type']  = 'movie';
      $params['body']['query']['match']['title'] = 'matrix';

      $results = $client->search($params);
      dump($results);exit;

      return new JsonResponse($ret);
    }
}
