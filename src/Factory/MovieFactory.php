<?php
namespace App\Factory;

use App\Entity\Movie;

class MovieFactory
{

    public function create(array $response): Movie
    {
        $movie = new Movie();

        if (array_key_exists('adult', $response)) {
            $movie->setAdult($response['adult']);
        }

        if (array_key_exists('backdrop_path', $response)) {
            $movie->setBackdrop_path($response['backdrop_path']);
        }

        if (array_key_exists('belongs_to_collection', $response)) {
            $movie->setBelongs_to_collection($response['belongs_to_collection']);
        }

        if (array_key_exists('budget', $response)) {
            $movie->setBudget($response['budget']);
        }

        if (array_key_exists('genres', $response)) {
            $movie->setGenres($response['genres']);
        }

        if (array_key_exists('homepage', $response)) {
            $movie->setHomepage($response['homepage']);
        }

        if (array_key_exists('id', $response)) {
            $movie->setMovie_id($response['id']);
        }

        if (array_key_exists('imdb_id', $response)) {
            $movie->setImdb_id($response['imdb_id']);
        }
        
        if (array_key_exists('keywords', $response)) {
            $movie->setKeywords($response['keywords']);
        }

        if (array_key_exists('original_language', $response)) {
            $movie->setOriginal_language($response['original_language']);
        }

        if (array_key_exists('original_title', $response)) {
            $movie->setOriginal_title($response['original_title']);
        }

        if (array_key_exists('overview', $response)) {
            $movie->setOverview($response['overview']);
        }

        if (array_key_exists('popularity', $response)) {
            $movie->setPopularity($response['popularity']);
        }

        if (array_key_exists('poster_path', $response) && $response['poster_path'] !== null) {
            $movie->setPoster_path($response['poster_path']);
        }

        if (array_key_exists('production_companies', $response)) {
            $movie->setProduction_companies($response['production_companies']);
        }

        if (array_key_exists('production_companies', $response)) {
            $movie->setProduction_countries($response['production_companies']);
        }

        if (array_key_exists('release_date', $response)) {
            $movie->setRelease_date($response['release_date']);
        }

        if (array_key_exists('revenue', $response)) {
            $movie->setRevenue($response['revenue']);
        }

        if (array_key_exists('runtime', $response)) {
            $movie->setRuntime($response['runtime']);
        }

        if (array_key_exists('spoken_languages', $response)) {
            $movie->setSpoken_languages($response['spoken_languages']);
        }

        if (array_key_exists('status', $response)) {
            $movie->setStatus($response['status']);
        }

        if (array_key_exists('tagline', $response)) {
            $movie->setTagline($response['tagline']);
        }

        if (array_key_exists('title', $response)) {
            $movie->setTitle($response['title']);
        }

        if (array_key_exists('video', $response)) {
            $movie->setVideo($response['video']);
        }

        if (array_key_exists('vote_average', $response)) {
            $movie->setVote_average($response['vote_average']);
        }

        if (array_key_exists('vote_count', $response)) {
            $movie->setVote_count($response['vote_count']);
        }

        return $movie;
    }
}