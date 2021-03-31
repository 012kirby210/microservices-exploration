<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AliveController extends AbstractController
{

	/**
	 * @Route("/adapter/comments/alive", name="alive")
	 */
	public function alive() :Response
	{
		return (new Response())->setStatusCode(Response::HTTP_OK);
	}

}