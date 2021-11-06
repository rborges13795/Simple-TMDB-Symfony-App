<?php
namespace App\Controller;

use App\Repository\KeywordRepository;
use App\Factory\MovieFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Exception\RequestException;

class KeywordController extends AbstractController
{

    private KeywordRepository $repository;

    private MovieFactory $factory;

    public function __construct(KeywordRepository $keywordRepository)
    {
        $this->repository = $keywordRepository;
        $this->factory = new MovieFactory();
    }

    public function getMovies(Request $params, int $id)
    {
        $params = $params->query->all();
        $query = "?query=";
        try {
            $response = $this->repository->getMovieSearch($id, $params);
            
            if (! array_key_exists('results', $response)) {
                return $this->render('error1.html.twig');
            }
    
            foreach ($response['results'] as $movie) {
                $movies[] = $this->factory->create($movie);
            }
    
            $data = array(
                'page' => $response['page'],
                'total_pages' => $response['total_pages'],
                'total_results' => $response['total_results']
            );
    
            if ($response['results'] == null) {
                $movies = false;
            }
    
            return $this->render('results.html.twig', [
                'data' => $data,
                'movies' => $movies,
                'query' => $query
            ]); 
        } catch (RequestException $e) {
            $data = $movies = $query = null;
            return $this->render('results.html.twig', [
                'data' => $data,
                'movies' => $movies,
                'query' => $query
            ]);
        }
        
    }
}

