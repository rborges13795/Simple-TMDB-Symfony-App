<?php
namespace App\Repository;

class CreditsRepository extends AbstractRepository
{

    public function getCast(int $movieId)
    {
        $response = $this->getMovieCredits($movieId);

        return $response['cast'];
    }

    private function getMovieCredits(int $movieId, $params = [])
    {
        $queryParams = http_build_query($params);
        $url = $this->getUri() . 'movie/' . $movieId . '/credits' . '?' . $queryParams . '&' . $this->apiKey();

        return $this->getResponse($url);
    }

}

