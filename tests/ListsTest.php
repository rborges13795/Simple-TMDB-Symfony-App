<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;

class ListsTest extends WebTestCase
{
    public function testListIsCreated()
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);
        
        $testUser = $userRepository->findOneBy(['username' => 'justATest']);
        
        $client->loginUser($testUser);

        $client->request('POST', '/lists', ['listName' => 'test']);
        $client->followRedirect();
        $this->assertResponseIsSuccessful();
    }
    
    public function testListIsRemoved()
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneBy(['username' => 'justATest']);
        $lists = $testUser->getList();
        
        $client->loginUser($testUser);
        
        foreach ($lists as $list) {
            if ($list->getName() == 'test') {
                $client->request('GET', "/removeList/{$list->getId()}");
            }
        }
        $client->followRedirect();
        $this->assertResponseIsSuccessful();
        $selector = 'body > section > section > div.container.justify-content-start.flex-wrap.resultsBody > 
                    div.d-flex.flex-row.flex-wrap > div > div > h5 > a';
        $this->assertSelectorTextNotContains($selector, 'test');
    }

}

