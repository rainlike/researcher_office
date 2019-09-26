<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="ro_news")
     */
    public function index()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=ua&category=technology&apiKey=8d98616ded6d4adbb61a3e0ccc3b91ef');
        $sources = $client->request('GET', 'https://newsapi.org/v2/sources?apiKey=8d98616ded6d4adbb61a3e0ccc3b91ef');

        $content = $response->toArray();
        $sources = $sources->toArray();

        return $this->render('news/index.html.twig', [
            'content' => $content,
            'sources' => $sources
        ]);
    }
}
