<?php

class Speler
{
    private $score = 0;
    private $lastTwoThrows = [0,0];
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    private function setScore($score)
    {
        if ($this->getLastTwoThrows() == [10, 10]) { // two strikers
            $this->score = $this->score + $this->$lastTwoThrows()[0] +
            $this->getLastTwoThrows()[1] + ($score[0] + $score[1]) * 2;
        } elseif ($this->getLastTwoThrows()[0] == 10) { // one strike
            $this->score = $this->score + ($score[0] + $score[1]) * 2;
        } elseif (array_sum($this->getLastTwoThrows()) == 10) { // spare
            $this->score = $this->score + $score[0] * 2 + $score[1];
        } else {
            $this->score += $score[0] + $score[1];
        }
    }

    public function getScore()
    {
        return $this->score;
    }

    private function setLastTwoThrows($throws)
    {
        if ($this->getLastTwoThrows()[0] == 10 && $throws[1] == 0) {
            $this->lastTwoThrows = [10,10];
        } else {
            $this->lastTwoThrows = $throws;
        }
        print_r($this->getLastTwoThrows());
    }

    public function getLastTwoThrows()
    {
        return $this->lastTwoThrows;
    }
}
