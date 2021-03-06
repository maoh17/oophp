<?php

namespace maoh17\D100;

/**
 * A dice which has the ability to present data to be used for creating
 * a histogram.
 */
class DiceHistogram2 extends DiceGraphic implements HistogramInterface
{
    use HistogramTrait2;

    /**
     * Get max value for the histogram.
     *
     * @return int with the max value.
     */
    public function getHistogramMax()
    {

        //return $this->sides;
        return $this->getSides();
    }



    /**
     * Roll the dice, remember its value in the serie and return
     * its value.
     *
     * @return int the value of the rolled dice.
     */
    public function roll()
    {
        $this->serie[] = parent::roll();
        return $this->getValue();
    }
}
