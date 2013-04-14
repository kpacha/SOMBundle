<?php

namespace Kpacha\SOMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/track")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $error = !$this->get('kpacha_som.tracker')
                        ->track(
                                $request->getClientIp(),
                                $request->getQueryString(),
                                $request->headers->get('referer'),
                                $request->headers->get('cookie')
                                );

        $response = new Response;
        if ($error) {
            $this->get('logger')->err('An error occurred');
            $response->setStatusCode(500);
        } else {
            $response->headers->set('Content-Type', 'image/jpeg');
        }

        return $response;
    }

}
