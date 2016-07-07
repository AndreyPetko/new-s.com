<?php


namespace AppBundle\Model;

class GamesApi {
	protected $url;
	protected $games;


	public function __construct($url) {
		$this->url = $url;
	}


	public function getGamesList() {
		$this->getCurlResponse();

		return $this;
	}


	public function formatGamesDay() {
		foreach ($this->games as $game) {
			$game->day = substr($game->day, 0, 10);
		}

		return $this;
	}


	public function getCurlResponse() {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			$error = curl_error($ch);
			curl_close($ch);
			
			throw new Exception("Failed retrieving  '" . $this->send_url . "' because of ' " . $error . "'.");
		}

		$this->games = json_decode($result);
	}


	public function get() {
		return $this->games;
	}
}


