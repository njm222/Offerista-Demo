<?php

namespace App\Tests;

use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeOutException;
use Symfony\Component\Panther\PantherTestCase;

class CommentsTest extends PantherTestCase
{
    public function testLoadedPosts() {
        // create client
        $client = self::createPantherClient();
        // get page
        $pageContent = $client->request('GET', '/posts');
        // get all posts
        $posts = $pageContent->filter('div.posts-container')->children();
        // check there are 100 posts
        $this->assertCount(100, $posts);
    }

    public function testLoadComments() {
        // create client
        $client = self::createPantherClient();
        // get page
        $pageContent = $client->request('GET', '/posts');
        // click on comments button
        $post = $pageContent->filter('a.comments-button')->first()->link();
        $client->click($post);
        // wait for comments to load and get children of container
        try {
            $pageContent = $client->waitFor('a.hide-comments-button');
            // get comments container
            $comments = $pageContent->filter('div.comments-container')->first()->children();
            // check there are 6 children (5 comments + 1 button)
            $this->assertCount(6, $comments);
        } catch (NoSuchElementException $e) {
            $this->assertTrue(false);
        } catch (TimeOutException $e) {
            $this->assertTrue(false);
        }

    }

    public function testHideComments() {
        // create client
        $client = self::createPantherClient();
        // get page
        $pageContent = $client->request('GET', '/posts');
        // click on comments button
        $post = $pageContent->filter('a.comments-button')->first()->link();
        $client->click($post);
        // wait for comments to load and get children of container
        try {
            $pageContent = $client->waitFor('a.hide-comments-button');
            $hideButton = $pageContent->filter('a.hide-comments-button')->first()->link();
            // click on hide comments button
            $pageContent = $client->click($hideButton);
            // check if style is set to display: none
            $comments = $pageContent->filter('div.comments-container')->first()->attr('style');
            $this->assertContains("display: none", $comments);
        } catch (NoSuchElementException $e) {
            $this->assertTrue(false);
        } catch (TimeOutException $e) {
            $this->assertTrue(false);
        }
    }

}
