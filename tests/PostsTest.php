<?php

namespace App\Tests;

use App\Controller\PostsController;
use PHPUnit\Framework\TestCase;

class PostsTest extends TestCase
{
    public function testGetPosts() {

        $postsController = new PostsController();
        $postsResult = $postsController->getPosts('http://jsonplaceholder.typicode.com/posts/');
        $this->assertNotFalse($postsResult);
    }

    public function testGetPostsError() {
        $postsController = new PostsController();
        $postsResult = $postsController->getPosts(' ');
        $this->assertFalse($postsResult);
    }

}
