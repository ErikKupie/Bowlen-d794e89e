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
		$ready = true;
		$readyNewPlayer = true;
		while($ready == true){
			$name = strtolower(readline("what is your name? "));
			$this->scoreBoard->addPlayer($name);

			while ($readyNewPlayer == true){
				$newPlayer = strtolower(readline("Is there an other player? "));
				if ($newPlayer === "y" || $newPlayer === "yes"){
					$ready = true;
					$readyNewPlayer = false;
				} elseif ($newPlayer === "n" || $newPlayer === "no"){
					echo "Great, lets begin! \n";
					$ready = false;
					$this->scoreBoard->registerCurrentPlayer();
				} else {
					echo"Not a valid answer, just say (y)es or (n)o! \n";
					$readyNewPlayer = true;
				}
			}
		}
	}
}