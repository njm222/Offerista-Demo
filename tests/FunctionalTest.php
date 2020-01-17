<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalTest extends WebTestCase
{
    public function testIndexPage () {
        // create client
        $client = static::createClient();
        // get page
        $client->request('GET', '/');
        // check response is valid
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testButtonOnIndexPage () {
        // create client
        $client = static::createClient();
        // get page
        $client->request('GET', '/');
        // check response is valid
        if($client->getResponse()->getStatusCode() === 200) {
            // check if crawled to /posts
            $crawler = $client->getCrawler();
            $link = $crawler->filter('a')->first()->link();
            $pageContent = $client->click($link);
            $this->assertContains('/posts', $pageContent->getBaseHref());
        } else {
            $this->assertTrue(false);
        }
    }

    public function testPostsPage () {
        // create client
        $client = static::createClient();
        // get page
        $client->request('GET', '/posts');
        // check response is valid
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
