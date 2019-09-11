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
    private $scorePlayer1;
    private $scorePlayer2;
    public function __construct($scorePlayer1,$scorePlayer2)
    {
        $this->scorePlayer1=$scorePlayer1;
        $this->scorePlayer2=$scorePlayer2;
    }

    /**
     * @return mixed
     */
    public function getScorePlayer1()
    {
        return $this->scorePlayer1;
    }

    /**
     * @return mixed
     */
    public function getScorePlayer2()
    {
        return $this->scorePlayer2;
    }

    public function getScore()
    {
        if ($this->getScorePlayer1() == $this->getScorePlayer2()) {
            $this->checkScoreEqual();
        } else if ($this->getScorePlayer1() >= 4 || $this->getScorePlayer2() >= 4) {
            $this->checkPlayerWin();
        } else {
            $this->readScore();
        }
    }

    public function checkScoreEqual()
    {
        switch ($this->getScorePlayer1()) {
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

    public function readScore()
    {
        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) $tempScore = $this->getScorePlayer1();
            else {
                $this->score .= "-";
                $tempScore = $this->getScorePlayer2();
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

    public function checkPlayerWin()
    {
        $minusResult = $this->getMinusResult();
        if ($minusResult == 1) $this->score = "Advantage player1";
        else if ($minusResult == -1) $this->score = "Advantage player2";
        else if ($minusResult >= 2) $this->score = "Win for player1";
        else $this->score = "Win for player2";
    }

    function getMinusResult()
    {
        $minusResult = $this->getScorePlayer1() - $this->getScorePlayer2();
        return $minusResult;
    }

    public function __toString()
    {
        return $this->score;
    }
}