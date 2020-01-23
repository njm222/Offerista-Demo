<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

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
        try {
            $response = $client->request('GET', $url);
            $status = $response->getStatusCode();
            if($this->checkStatus($status)) {
                return false;
            }
            $response_json = $response->getContent();
            return json_decode($response_json);
        } catch (TransportExceptionInterface $e) {
            return false;
        } catch (ClientExceptionInterface $e) {
            return false;
        } catch (RedirectionExceptionInterface $e) {
            return false;
        } catch (ServerExceptionInterface $e) {
            return false;
        }
    }

    public function checkStatus($status) {
        if($status != 200) {
            return true;
        }
        return false;
    }

}