<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;

class UserMovieListTest extends WebTestCase
{   
    public function testAddMovieToListIsSuccesful()
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);
        
        $testUser = $userRepository->findOneBy(['username' => 'justATest']);
        
        $client->loginUser($testUser);
        
        $crawler = $client->request('GET', '/movie/436969');
        //'lalala' is the mock user's list
        $link = $crawler->selectLink('lalala')->link();
        $client->click($link);
        $this->assertResponseRedirects("/list/$testUser->getId()");
        $client->followRedirect();
        $this->assertSelectorTextContains('body > section > section > 
            div.container.justify-content-start.flex-wrap.resultsBody > div.d-flex.flex-row.flex-wrap > 
            div:nth-child(1) > div > div > a > p', 
            'The Suicide Squad');
    }
    
    public function testRemoveMovieOffAListIsSuccesful()
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);
        
        $testUser = $userRepository->findOneBy(['username' => 'justATest']);
        
        $client->loginUser($testUser);
        
        $client->request('GET', '/removeMovie/7/436969');

        $this->assertResponseRedirects("/list/$testUser->getId()");
    }
}

