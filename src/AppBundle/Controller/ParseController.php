<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Model\FantasyDataMLB;
use AppBundle\Entity\Game;

class ParseController extends Controller
{
	/**
	 * @Route("/parse", name="parsepage")
	 */
	public function indexAction(Request $request)
	{
		$fantasyDataMLB = new FantasyDataMLB('efd5969309e6424186fb55c1733e1342');

		$items = $fantasyDataMLB->games_by_season(2016);

		$items = json_decode($items);


		foreach ($items as $item) {
			$game = new Game();
			$game->setDay($item->Day);
			$game->setHome($item->HomeTeam);
			$game->setAway($item->AwayTeam);
			$game->setStadiumId((int)$item->StadiumID);

			$em = $this->getDoctrine()->getManager();
			$em->persist($game);
			$em->flush();
		}

		return new Response('Saved new games');
	}
}
