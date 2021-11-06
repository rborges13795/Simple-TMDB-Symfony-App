<?php
namespace App\Entity;

class Movie
{
    private $imageUri = 'https://www.themoviedb.org/t/p/w500';

    private $movie_id;

    private $imdb_id;

    private $adult;

    private $backdrop_path;

    private $belongs_to_collection;

    private $budget;

    private $genres;

    private $homepage;
    
    private array $keywords;

    private $original_language;

    private $original_title;

    private $overview;

    private $popularity;

    private $poster_path;

    private $production_countries;

    private $production_companies;

    private $release_date;

    private $revenue;

    private $runtime;

    private $spoken_languages;

    private $status;

    private $tagline;

    private $title;

    private $video;

    private $vote_average;

    private $vote_count;

    public function getMovie_id(): int
    {
        return $this->movie_id;
    }

    public function setMovie_id(int $movie_id)
    {
        $this->movie_id = $movie_id;
        
        return $this;
    }

    public function getImdb_id()
    {
        return $this->imdb_id;
    }

    public function setImdb_id($imdb_id)
    {
        $this->imdb_id = $imdb_id;
        
        return $this;
    }

    public function getAdult(): bool
    {
        return $this->adult;
    }

    public function setAdult(bool $adult)
    {
        $this->adult = $adult;
        
        return $this;
    }

    public function getBackdrop_path(): string
    {
        return $this->backdrop_path;
    }

    public function setBackdrop_path(?string $backdrop_path)
    {
        $this->backdrop_path = $backdrop_path;
        
        return $this;
    }

    public function getBelongs_to_collection()
    {
        return $this->belongs_to_collection;
    }

    public function setBelongs_to_collection($belongs_to_collection)
    {
        $this->belongs_to_collection = $belongs_to_collection;
        
        return $this;
    }

    public function getBudget()
    {
        return $this->budget;
    }

    public function setBudget(int $budget)
    {
        $this->budget = $budget;
        
        return $this;
    }

    public function getGenres()
    {
        return $this->genres;
    }

    public function setGenres($genres)
    {
        $this->genres = $genres;
        
        return $this;
    }

    public function getHomepage(): ?string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage)
    {
        $this->homepage = $homepage;
        
        return $this;
    }
    
    public function getKeywords(): ?array
    {
        return $this->keywords;
    }
    
    public function setKeywords(array $keywords)
    {
        $this->keywords = $keywords;
        
        return $this;
    }

    public function getOriginal_language()
    {
        return $this->original_language;
    }

    public function setOriginal_language($original_language)
    {
        $this->original_language = $original_language;
        
        return $this;
    }

    public function getOriginal_title()
    {
        return $this->original_title;
    }

    public function setOriginal_title($original_title)
    {
        $this->original_title = $original_title;
        
        return $this;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview)
    {
        $this->overview = $overview;
        
        return $this;
    }

    public function getPopularity(): float
    {
        return $this->popularity;
    }

    public function setPopularity(float $popularity)
    {
        $this->popularity = $popularity;
        
        return $this;
    }

    public function getPoster_path(): ?string
    {
        return $this->imageUri . $this->poster_path;
    }

    public function setPoster_path(string $poster_path)
    {
        $this->poster_path = $poster_path;
        
        return $this;
    }
    
    public function getProduction_companies(): array
    {
        return $this->production_companies;
    }

    public function setProduction_companies(array $production_companies)
    {
        $this->production_companies = $production_companies;
    }

    public function getProduction_countries(): array
    {
        return $this->production_countries;
    }

    public function setProduction_countries(array $production_countries)
    {
        $this->production_countries = $production_countries;
        
        return $this;
    }

    public function getRelease_date(): ?string
    {
        return $this->release_date;
    }

    public function setRelease_date(string $release_date)
    {
        $this->release_date = date_format(date_create($release_date), "Y");
        
        return $this;
    }

    public function getRevenue(): int
    {
        return $this->revenue;
    }

    public function setRevenue(int $revenue)
    {
        $this->revenue = $revenue;
        
        return $this;
    }

    public function getRuntime()
    {
        return $this->runtime;
    }

    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;
        
        return $this;
    }

    public function getSpoken_languages(): array
    {
        return $this->spoken_languages;
    }

    public function setSpoken_languages(array $spoken_languages)
    {
        $this->spoken_languages = $spoken_languages;
        
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
        
        return $this;
    }

    public function getTagline(): ?string
    {
        return $this->tagline;
    }

    public function setTagline(string $tagline)
    {
        $this->tagline = $tagline;
        
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        
        return $this;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video)
    {
        $this->video = $video;
        
        return $this;
    }

    public function getVote_average(): ?float
    {
        return $this->vote_average;
    }

    public function setVote_average(float $vote_average)
    {
        $this->vote_average = $vote_average;
        
        return $this;
    }

    public function getVote_count(): ?int
    {
        return $this->vote_count;
    }

    public function setVote_count(int $vote_count)
    {
        $this->vote_count = $vote_count;
        
        return $this;
    }
    
    
}