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

    public function testPostsPage () {
        // create client
        $client = static::createClient();
        // get page
        $client->request('GET', '/posts');
        // check response is valid
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
