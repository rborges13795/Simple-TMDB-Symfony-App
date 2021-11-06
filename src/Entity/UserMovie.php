<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass=UserMovieRepository::class)
 */
class UserMovie
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique="true")
     */
    private $id;

    /**
     *
     * @ORM\ManyToMany(targetEntity=MovieList::class, mappedBy="movies")
     */
    private $list;
    
    public function getId(): int
    {
        return (int) $this->id;
    }

    public function setId(int $movieId): self
    {
        $this->id = $movieId;
        
        return $this;
    }

}
