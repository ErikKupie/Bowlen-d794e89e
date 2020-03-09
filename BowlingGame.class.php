<?php

class BowlingGame 
{
	public $scoreBoard = NULL;

	function __construct($scoreBoard) 
	{
		$this->scoreBoard = $scoreBoard;
		echo("Welkom to the bowling game! Please enter your players:\n");
		$this->start();
	}

	public function start() 
	{
		$name = strtolower(readline("what is your name? "));
		$this->scoreBoard->addPlayer($name);
		$this->otherPlayer();
	}

	private function otherPlayer()
	{
		$newPlayer = strtolower(readline("Is there an other player? "));
		if ($newPlayer === "y" || $newPlayer === "yes"){
			$this->start();
		} elseif ($newPlayer === "n" || $newPlayer === "no"){

			echo "Great, lets begin! \n";
			$this->scoreBoard->getCurrentPlayer();
		} else {

			echo"Not a valid answer, just say (y)es or (n)o! \n";
			$this->otherPlayer();
		}
	}
}