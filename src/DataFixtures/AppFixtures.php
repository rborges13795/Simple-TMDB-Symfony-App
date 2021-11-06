<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\MovieList;
use App\Entity\UserMovie;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;
    
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $hasher = $this->passwordHasher;
        
        $user = new User();
        $user->setUsername('justATest')->setPassword($hasher->hashPassword($user, 'justATest123'));
        $manager->persist($user);
        
        $user2 = new User();
        $user2->setUsername('another')->setPassword($hasher->hashPassword($user2, 'another123'));
        $manager->persist($user2);
        
        $user3 = new User();
        $user3->setUsername('oneMore')->setPassword($hasher->hashPassword($user3, 'oneMore123'));
        $manager->persist($user3);
        
        $movie = new UserMovie();
        $movie->setMovieId(436969);
        $manager->persist($movie);
        
        $movie2 = new UserMovie();
        $movie2->setMovieId(101);
        $manager->persist($movie2);
        
        $movie3 = new UserMovie();
        $movie3->setMovieId(101);
        $manager->persist($movie3);
        
        $movie4 = new UserMovie();
        $movie4->setMovieId(559);
        $manager->persist($movie4);
        
        $list = new MovieList();
        $list->setName('list1');
        $list->setUser($user);
        $list->addMovie($movie)->addMovie($movie2)->addMovie($movie3);
        $manager->persist($list);
        
        $list2 = new MovieList();
        $list2->setName('list2');
        $list2->setUser($user2);
        $list2->addMovie($movie)->addMovie($movie2);
        $manager->persist($list2);
        $manager->flush();
        
        $list3 = new MovieList();
        $list3->setName('list3');
        $list3->setUser($user3);
        $manager->persist($list3);
        $manager->flush();
        
        $list4 = new MovieList();
        $list4->setName('list4');
        $list4->setUser($user3);
        $manager->persist($list4);
        $manager->flush();
    }
}
