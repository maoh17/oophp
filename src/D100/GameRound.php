<?php

namespace maoh17\D100;

/**
 * A game round containg the sum of the current round.
 */
class GameRound
{
    /**
     * @var int $sum           The sum of the current round.
     * @var boolean $closed    The current round is closed.
     */
    private $sum;
    private $started;
    private $closed;


    /**
     * Constructor to initiate the game round.
     */
    public function __construct()
    {
        $this->sum = 0;
        $this->closed = false;
        $this->started = false;
    }


    /**
     * Get the sum of the current round.
     *
     * @return int
     */
    public function getSum()
    {
        return $this->sum;
    }


    /**
     * Get if the game round is started.
     *
     * @return boolean
     */
    public function getStarted()
    {
        return $this->started;
    }


    /**
     * Get if the game round is closed.
     *
     * @return boolean
     */
    public function getClosed()
    {
        return $this->closed;
    }


    /**
     * Add a hand value to the sum of the current round.
     *
     * @param int $hand     Value to be added to the sum of current round.
     */
    public function addHand(int $hand)
    {
        $this->sum = $this->sum + $hand;
        $this->started = true;
    }

    /**
     * Reset sum due to a failed dice hand or take home collected points.
     */
    public function resetSum()
    {
        $this->sum = 0;
        $this->closed = true;
        $this->started = false;
    }
}
