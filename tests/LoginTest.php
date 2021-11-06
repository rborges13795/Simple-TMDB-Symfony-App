<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;
#php vendor/bin/phpunit tests
class LoginTest extends WebTestCase
{   
    #User Mock: name='justATest' id=28
    public function testLoginIsSuccesful(): void
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);
        
        $testUser = $userRepository->findOneBy(['username' => 'justATest']);
        
        $client->loginUser($testUser);
        
        $client->request('GET', '/dashboard');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Welcome');
        $this->assertSelectorTextContains('#navbarSupportedContent > ul > li:nth-child(2) > a', 'Lists');
        $this->assertSelectorTextContains('#navbarSupportedContent > ul > li:nth-child(4) > a', 'justATest');
    }
    
}
