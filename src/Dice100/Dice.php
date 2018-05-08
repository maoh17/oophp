<?php

namespace maoh17\Dice100;

/**
 * Showing off a standard class with methods and properties.
 */
class Dice
{
    /**
     * @var int $value     The current dice value.
     */
    private $value;


    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number.
     *
     */
    public function __construct()
    {
        $this->value = rand(1, 6);
    }



    /**
     * Randomize the dice value between 1 and 6.
     *
     * @return int
     */
    public function roll()
    {
        $this->value = rand(1, 6);
        return $this->value;
    }


    /**
     * Get last roll.
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}
