<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GameController extends Controller
{
	/**
	 * @Route("/games", name="gamespage")
	 */
	public function indexAction(Request $request)
	{

		$em = $this->getDoctrine()->getManager();

		$gamesObj = $em->getRepository('AppBundle:Game')->findBy(
				   array(),			        // $where 
				   array('id' => 'ASC'),    // $orderBy
				   100,                        // $limit
				   0                          // $offset
				   );;

		$gamesArr = [];

		foreach ($gamesObj as $key => $game) {
			$gamesArr[$key]['day'] = $game->getDay();
			$gamesArr[$key]['home'] = $game->getHome();
			$gamesArr[$key]['away'] = $game->getAway();
			$gamesArr[$key]['stadium_id'] = $game->getStadiumId();
		}

		return new JsonResponse($gamesArr);
	}
}
