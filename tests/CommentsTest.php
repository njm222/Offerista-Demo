<?php

namespace App\Tests;

use App\Controller\PostsController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/*class CommentsTest extends WebTestCase
{
    public function testLoadedPosts() {
        $client = self::createClient();
        $pageContent = $client->request('GET', '/posts');

        $posts = $pageContent->filter('div.posts-container')->children();
        $this->assertCount(100, $posts);
    }

    public function testLoadComments() {
        $client = self::createClient();
        $pageContent = $client->request('GET', '/posts');

        $post = $pageContent->filter('a.comments-button')->link();
        $pageContent = $client->click($post);

        $comments = $pageContent->filter('a.hide-comments-button')->text();
        $this->assertTrue($comments);

    }

    public function testHideComments() {
        $client = self::createClient();
        $pageContent = $client->request('GET', '/posts');

        $post = $pageContent->filter('a.comments-button')->link();
        $pageContent = $client->click($post);

        $hideButton = $pageContent->filter('a.hide-comments-button')->link();
        $this->assertTrue($hideButton);

        $pageContent = $client->click($hideButton);

        $comments = $pageContent->filter('div.comments-container')->first()->siblings();
        $this->assertTrue($comments);
    }

}*/
