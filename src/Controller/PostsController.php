<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\CurlHttpClient;

class PostsController extends AbstractController
{
    /**
     * @Route("/posts", name="posts", methods={"GET", "HEAD"})
     */
    public function index() {
        // Get Posts Data
        $posts = $this->getPosts('http://jsonplaceholder.typicode.com/posts/');

        // Render Posts
        return $this->render('posts.html.twig', ['posts' => $posts]);
    }

    public function getPosts($url) {
        $validURL = filter_var($url, FILTER_VALIDATE_URL);
        if(!$validURL) {
            return false;
        }
        $client = new CurlHttpClient();
        $response = $client->request('GET', $url);
        $status = $response->getStatusCode();
        if($status != 200) {
            return false;
        }
        $response_json = $response->getContent();
        return json_decode($response_json);
    }

}