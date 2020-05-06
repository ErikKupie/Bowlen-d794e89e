<?php

class ScoreBoard {
	private $players = [];

	public function addPlayer($player) 
	{
		$this->players[$player] = new Speler($player); 
	} 

	public function RegisterCurrentPlayer() 
	{
		for ($x = 0; $x <= 9; $x+=1) {
			foreach($this->players as $player){
				$this->registerPinsDown($player);
				var_dump($player);
			}
			$this->printStatus();
		}
		$this->getWinner();
	}

	private function registerPinsDown($player) 
	{
			$firstThrow = intval(readline("It's your turn ".$player->getName().": what was your first throw? "));

					if( $firstThrow == 10){
						echo("Thats a strike! good job! your next two throws will be added to this set\n");
						$player->setScore([10, 0]);
						$player->setLastTwoThrows([10, 0]);
					}
			
			if ($firstThrow !== 10){
			$secondThrow = intval(readline("what was your second throw? "));
					if( $firstThrow + $secondThrow == 10){
						echo("Thats a spare! good job! your next set throw will be added to this set\n");
					}
					$player->setScore([$firstThrow, $secondThrow]);
					$player->setLastTwoThrows([$firstThrow, $secondThrow]);
			}
	}

	public function printStatus() 
	{
		echo("The new player scores!\n");
		foreach($this->players as $player){
			echo($player->getName() . ": " . $player->getScore() . "\n");
		}
	}

	public function getWinner() 
	{
		$winner;
		$newWinnerScore = 0;
		foreach($this->players as $player){
			if ($player->getScore() > $newWinnerScore){
				$newWinnerScore = $player->getScore();
				$winner = $player->getName();
			}
		}
		echo ("The game is over. ".$winner." won! Congratulations!");
	}
}
