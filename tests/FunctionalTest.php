<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalTest extends WebTestCase
{
    public function testIndexPage () {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testPostsPage () {
        $client = static::createClient();
        $client->request('GET', '/posts');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
