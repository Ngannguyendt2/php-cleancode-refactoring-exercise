<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */
const ZEROSCORE = 0;
const ONESCORE = 1;
const TWOSCORE = 2;
const THREESCORE = 3;
class TennisGame
{
    public $score = '';

    public function getScore($scorePlayer1, $scorePlayer2)
    {
        if ($scorePlayer1 == $scorePlayer2) {
            $this->checkScoreEqual();
        } else if ($scorePlayer1 >= 4 || $scorePlayer2 >= 4) {
            $this->checkPlayerWin($scorePlayer1, $scorePlayer2);
        } else {
            $this->readScore($scorePlayer1, $scorePlayer2);
        }
    }

    public function checkScoreEqual($scorePlayer1)
    {
        switch ($scorePlayer1) {
            case ZEROSCORE:
                $this->score = "Love-All";
                break;
            case ONESCORE:
                $this->score = "Fifteen-All";
                break;
            case TWOSCORE:
                $this->score = "Thirty-All";
                break;
            case THREESCORE:
                $this->score = "Forty-All";
                break;
            default:
                $this->score = "Deuce";
                break;

        }
    }

    public function readScore($scorePlayer1, $scorePlayer2)
    {
        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) $tempScore = $scorePlayer1;
            else {
                $this->score .= "-";
                $tempScore = $scorePlayer2;
            }
            switch ($tempScore) {
                case ZEROSCORE:
                    $this->score .= "Love";
                    break;
                case ONESCORE:
                    $this->score .= "Fifteen";
                    break;
                case TWOSCORE:
                    $this->score .= "Thirty";
                    break;
                case THREESCORE:
                    $this->score .= "Forty";
                    break;
            }
        }

    }

    public function checkPlayerWin($scorePlayer1, $scorePlayer2)
    {
        $minusResult = $this->getMinusResult($scorePlayer1, $scorePlayer2);
        if ($minusResult == 1) $this->score = "Advantage player1";
        else if ($minusResult == -1) $this->score = "Advantage player2";
        else if ($minusResult >= 2) $this->score = "Win for player1";
        else $this->score = "Win for player2";
    }

    function getMinusResult($scorePlayer1, $scorePlayer2)
    {
        $minusResult = $scorePlayer1 - $scorePlayer2;
        return $minusResult;
    }

    public function __toString()
    {
        return $this->score;
    }
}