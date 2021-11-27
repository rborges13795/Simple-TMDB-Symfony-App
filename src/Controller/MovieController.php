<?php
namespace App\Controller;

use App\Repository\MovieRepository;
use App\Factory\MovieFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CreditsRepository;
use App\Factory\CreditsFactory;
use GuzzleHttp\Exception\RequestException;

class MovieController extends AbstractController
{

    private MovieRepository $repository;

    private CreditsRepository $creditsRepository;

    private MovieFactory $factory;

    /**
     *
     * @param MovieRepository $movieRepository
     * @param CreditsRepository $creditsRepository
     */
    public function __construct(MovieRepository $movieRepository, CreditsRepository $creditsRepository)
    {
        $this->repository = $movieRepository;
        $this->creditsRepository = $creditsRepository;
        $this->factory = new MovieFactory();
        $this->creditsFactory = new CreditsFactory();
    }

    /**
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dashboard(): Response
    {
        $response = $this->repository->getMovieTrending();

        foreach ($response['results'] as $movie) {
            $movies[] = $this->factory->create($movie);
        }

        if ($response['results'] == null) {
            $movies = false;
        }

        return $this->render('dashboard.html.twig', [
            'movies' => $movies
        ]);
    }

    /**
     *
     * @param Request $params
     * @return Response
     */
    public function getMovies(Request $params): Response
    {
        try {
            $params = $params->query->all();
            $query = "?query={$params['query']}";
            $response = $this->repository->getMovieSearch($params);
    
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
        } catch (\Exception $e) {
            $data = $movies = $query = null;
            return $this->render('results.html.twig', [
                'data' => $data,
                'movies' => $movies,
                'query' => $query
            ]); 
        }
    }

    /**
     *
     * @param int $id
     * @param Request $params
     * @return Response
     */
    public function show(int $id, Request $params): Response
    {
        try {
            $response = $this->repository->find($id);
            $credits = $this->creditsRepository->getCast($id);
            foreach ($credits as $credit) {
                $cast[] = $this->creditsFactory->createCast($credit);
            }
            $movie = $this->factory->create($response);
    
            return $this->render('movies.html.twig', [
                'movie' => $movie,
                'cast' => $cast
            ]);
        } catch (\Exception $e) {
            $movie = $cast = null;
            return $this->render('movies.html.twig', [
                'movie' => $movie,
                'cast' => $cast
            ]);
        }
    }
}