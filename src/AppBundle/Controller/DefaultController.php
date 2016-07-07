<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\GamesApi;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $gamesUrl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath() . '/games';
        $gamesCls = new GamesApi($gamesUrl);

        $games = $gamesCls->getGamesList()->formatGamesDay()->get();


        return $this->render('default/index.html.twig', array(
            'games' => $games,
            ));
    }
}
