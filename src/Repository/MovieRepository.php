<?php
namespace App\Repository;

class MovieRepository extends AbstractRepository
{
    public function getMovieSearch($params = []): array
    {
        $queryParams = http_build_query($params);
        $url = $this->getUri() . 'search/movie' . '?' . $queryParams . '&' . $this->apiKey();
        return $this->getResponse($url);
    }
    
    public function getMovieTrending(): array
    {
        $url =$this->getUri() . 'movie/popular' . '?' . $this->apiKey();
        
        return $this->getResponse($url);
    }
    
    public function find($movieId): array
    {
        $urlKeyword = $this->getUri() . 'movie/' . $movieId . '/keywords' . '?' . $this->apiKey();
        $keyword =  $this->getResponse($urlKeyword);
        
        $url = $this->getUri() . 'movie/' . $movieId . '?' . $this->apiKey();
        $movie = $this->getResponse($url);
        
        return array_merge($movie, $keyword);
    }
    
}

