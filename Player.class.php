<?php

class Speler 
{ 
	private $score = 0;
	private $lastTwoThrows = [0,0];
	private $name;

	function __construct($name) 
	{
		$this->name = $name;
	}

	function getName()
	{
		return $this->name;
	}

	function setScore($score){
		if ($this->getLastTwoThrows() == [10, 10]) { // two strikers
			$this->score = $this->score + $this->$lastTwoThrows()[0] + $this->getLastTwoThrows()[1] + ($score[0] + $score[1]) * 2;
		} elseif($this->getLastTwoThrows()[0] == 10) { // one strike
			$this->score = $this->score + ($score[0] + $score[1]) * 2;
		} elseif(array_sum($this->getLastTwoThrows()) == 10) { // spare
			$this->score = $this->score + $score[0] * 2 + $score[1];
		} else {
			$this->score += $score[0] + $score[1];
		}
	}

	function getScore() 
	{
		return $this->score;
	}

	function setLastTwoThrows($throws) 
	{
		if ($this->getLastTwoThrows()[0] == 10 && $throws[1] == 0){
			$this->lastTwoThrows = [10,10];
		} else {
			$this->lastTwoThrows = $throws;
		}
		print_r($this->getLastTwoThrows());
	}

	function getLastTwoThrows() 
	{
		return $this->lastTwoThrows;
	}
}
