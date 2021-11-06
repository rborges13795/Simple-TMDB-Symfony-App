<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class KeywordTest extends WebTestCase
{

    public function testKeywordSelectionSucceeds()
    {
        $client = static::createClient();
        $client->request('GET', "/keyword/782/movies");
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('body > section > section.resultsBody');
    }
}

