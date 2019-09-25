<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;

class ScheduleController extends AbstractController
{
    /**
     * @Route("/schedule", name="ro_schedule")
     */
    public function index()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.rozklad.org.ua/v2/teachers/Булах+Богдан+Вікторович/lessons');

        $content = $response->toArray();

        return $this->render('schedule/index.html.twig', [
            'content' => $content,
        ]);
    }
}
