<?php

namespace App\Tests;

use App\Controller\PostsController;
use PHPUnit\Framework\TestCase;

class PostsTest extends TestCase
{
    public function testGetPosts() {
        // initialize new controller
        $postsController = new PostsController();
        // invoke function getPosts
        $postsResult = $postsController->getPosts('http://jsonplaceholder.typicode.com/posts/');
        // check that the function did not fail
        $this->assertNotFalse($postsResult);
    }

    public function testGetPostsError() {
        // initialize new controller
        $postsController = new PostsController();
        // invoke function getPosts with incorrect url
        $postsResult = $postsController->getPosts(' ');
        // check that the function failed
        $this->assertFalse($postsResult);
    }

}
