<?php

namespace maoh17\D100;

/**
 * A dice 100 game with one human player and one computer player.
 */
class Game
{
    /**
     * @var int $playerSum    The player's total points of the current game.
     * @var int $computerSum  The computer's total points of the current game.
     */
    private $playerSum;
    private $computerSum;

    /**
     * Constructor to initiate the game round.
     */
    public function __construct()
    {
        $this->playerSum  = 0;
        $this->computerSum  = 0;
    }


    /**
     * Get the player's total points.
     *
     * @return int
     */
    public function getPlayerSum()
    {
        return $this->playerSum;
    }


    /**
     * Get the computer's total points.
     *
     * @return int
     */
    public function getComputerSum()
    {
        return $this->computerSum;
    }


    /**
     * Add game round points to the player.
     *
     * @param int $points     Value to be added to the player's total points.
     */
    public function addPlayerPoints(int $points)
    {
        $this->playerSum = $this->playerSum + $points;
    }


    /**
     * Add game round points to the computer.
     *
     * @param int $points     Value to be added to the computers's total points.
     */
    public function addComputerPoints(int $points)
    {
        $this->computerSum = $this->computerSum + $points;
    }
}
