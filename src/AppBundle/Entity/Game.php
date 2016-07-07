<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
* @ORM\Entity(repositoryClass="GameRepository")
* @ORM\Table(name="app_game")
*/


class Game {
	/**
	* @ORM\Id()
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;



	/**
	* @ORM\Column(type="string", length=256)
	*/
	protected $day;


    /**
    * @ORM\Column(type="string", length=256)
    */
    protected $home;

    /**
    * @ORM\Column(type="string", length=256)
    */
    protected $away;


    /**
    * @ORM\Column(type="string", length=256)
    */
    protected $stadium_id;



    public function __toString()
    {
        return $this->title;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set day
     *
     * @param string $day
     * @return Game
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set home
     *
     * @param string $home
     * @return Game
     */
    public function setHome($home)
    {
        $this->home = $home;

        return $this;
    }

    /**
     * Get home
     *
     * @return string 
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Set away
     *
     * @param string $away
     * @return Game
     */
    public function setAway($away)
    {
        $this->away = $away;

        return $this;
    }

    /**
     * Get away
     *
     * @return string 
     */
    public function getAway()
    {
        return $this->away;
    }

    /**
     * Set stadium_id
     *
     * @param string $stadiumId
     * @return Game
     */
    public function setStadiumId($stadiumId)
    {
        $this->stadium_id = $stadiumId;

        return $this;
    }

    /**
     * Get stadium_id
     *
     * @return string 
     */
    public function getStadiumId()
    {
        return $this->stadium_id;
    }
}
