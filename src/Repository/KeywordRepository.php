<?php
namespace App\Repository;

class KeywordRepository extends AbstractRepository
{
    public function getMovieSearch(int $keywordId, $params = [])
    {
        $queryParams = http_build_query($params);
        $url = $this->getUri() . 'keyword/' . $keywordId . '/movies' . '?' . $queryParams . '&' . $this->apiKey();
        
        return $this->getResponse($url);
    }
    
}
