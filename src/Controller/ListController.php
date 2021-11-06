<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\MovieList;
use App\Repository\MovieListRepository;
use App\Repository\MovieRepository;
use App\Factory\MovieFactory;
use App\Entity\UserMovie;
use App\Repository\UserMovieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class ListController extends AbstractController
{

    private MovieListRepository $repository;

    private MovieRepository $movieRepository;

    private MovieFactory $factory; 

    private UserMovieRepository $userMovieRepository;
    
    private const LIST = '/lists';
    
    public function __construct(MovieListRepository $repository, MovieRepository $movieRepository, 
        MovieFactory $factory, UserMovieRepository $userMovieRepository)
    {
        $this->repository = $repository;
        $this->movieRepository = $movieRepository;
        $this->factory = $factory;
        $this->userMovieRepository = $userMovieRepository;
    }

    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        $lists = $this->getUser()->getList();
        return $this->render('list/lists.html.twig', [
            'lists' => $lists
        ]);
    }

    /**
     *
     * @param int $id
     * @return Response
     */
    public function getListMovies(int $id): Response
    {
        $list = $this->repository->find($id);
        if ($list == null) {
            return $this->redirect(self::LIST);
        }
        $movieList = $list->getMovies();
        
        $cache = new FilesystemAdapter();
        $movies = $cache->get($movieList->count(), function (ItemInterface $item) use ($movieList) {
            
            $item->expiresAfter(3600);
            $movies = [];
            foreach ($movieList as $movie) {
                $movies[] = $this->factory->create($this->movieRepository->find($movie->getId()));
            }
            return $movies;
        });

        return $this->render('list/user_list.html.twig', [
            'movies' => $movies,
            'list' => $list
        ]);
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $listName = $request->request->get('listName');
        $user = $this->getUser();
        $list = new MovieList();
        $list->setUser($user);
        $list->setName($listName);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($list);
        $manager->flush();
        return $this->redirect(self::LIST);
    }

    /**
     *
     * @param int $id
     * @param int $movieId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addMovie(int $id, int $movieId): RedirectResponse
    {
        $list = $this->repository->find($id);
        $userMovie = $this->userMovieRepository->find($movieId);
        if ($userMovie) {
            $list->addMovie($userMovie);
        } else {
            $movie = new UserMovie();
            $movie->setId($movieId);
            $list->addMovie($movie);
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($list);
        $manager->flush();
        return $this->redirect('/list/' . $list->getId());
    }

    /**
     *
     * @param int $id
     * @param int $movieId
     * @return RedirectResponse
     */
    public function removeMovie(int $id, int $movieId): RedirectResponse
    {
        $list = $this->repository->find($id);
        $userMovie = $this->userMovieRepository->find($movieId);
        if ($userMovie) {
            $list->removeMovie($userMovie);
        } else {
            return $this->redirect('/list/' . $list->getId());
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($list);
        $manager->flush();
        return $this->redirect('/list/' . $list->getId());
    }

    /**
     *
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateList(int $id, Request $request): RedirectResponse
    {
        $list = $this->repository->find($id);
        (string) $newName = $request->get('updateList');
        $list->setName($newName);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($list);
        $manager->flush();
        return $this->redirect(self::LIST);
    }

    /**
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function removeList(int $id): RedirectResponse
    {
        $list = $this->repository->find($id);
        $user = $this->getUser();
        if ($list->getUser() !== $user) {
            return $this->redirect(self::LIST);
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($list);
        $manager->flush();
        return $this->redirect(self::LIST);
    }
}

