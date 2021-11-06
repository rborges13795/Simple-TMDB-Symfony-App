<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MovieSearchTest extends WebTestCase
{

    public function testMovieSearchSucceeds()
    {
        $client = static::createClient();
        $client->request('GET', '/search/movie', [
            'query' => 'Black+Widow'
        ]);
        $this->assertResponseIsSuccessful();
        $selector = 'body > section > section.resultsBody > section > div > div:nth-child(5) > 
                    div.details > div.wrapper > div > div > a > h2';
        $this->assertSelectorTextContains($selector, 'Curse of the Black Widow');
    }
    
    public function testGetMovieSucceeds()
    {
        $client = static::createClient();
        $client->request('GET', '/movie/19345');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains(
            'body > section > section:nth-child(2) > section > div > div.col-9 > p',
            'Top Billed Cast');
        $this->assertSelectorTextContains(
            'body > section > section:nth-child(2) > section > div > div.col-3 > 
             ul.d-flex.flex-row.flex-wrap > li > a > span', 
            'neo-noir');
    }

    public function testMovieSelectionSucceeds()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/dashboard');
        $form = $crawler->selectButton('Search')->form();
        $form['query'] = 'Black Widow';
        $client->submit($form);
        
        $this->assertResponseIsSuccessful();
        
        $selector = 'body > section > section.resultsBody > section > div > 
                        div:nth-child(5) > div.details > div.wrapper > div > div > a > h2';
        $this->assertSelectorTextContains($selector, 'Curse of the Black Widow');
        $selector2 = 'body > section > section.resultsBody > section > div > 
                        div:nth-child(7) > div.details > div.wrapper > div > div > a > h2';
        $this->assertSelectorTextContains($selector2, 'The Black Widow Killer');
        $this->assertSelectorExists('body > section > section.resultsBody');
    }
}

