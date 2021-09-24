<?php

namespace App\Controller;

use App\Form\WeatherType;
use App\Services\WeatherManagementService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class WeatherController extends AbstractController
{

    public function indexAction(Request $request, WeatherManagementService $weatherManagementService) {
        $weatherModel = null;
        $form = $this->createForm(WeatherType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $weatherModel = $weatherManagementService->getWeatherFromCity($form->get('city')->getData());
        }
        return $this->renderForm('home.html.twig', ['form' => $form, 'infos' => $weatherModel]);
    }

}
