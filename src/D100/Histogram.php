<?php

namespace maoh17\D100;

/**
 * Generating histogram data.
 */
class Histogram
{
    /**
     * @var array $serie  The numbers stored in sequence.
     * @var int   $min    The lowest possible number.
     * @var int   $max    The highest possible number.
     */
    private $serie = [];
    private $min;
    private $max;



    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getSerie()
    {
        return $this->serie;
    }



    /**
     * Return a string with a textual representation of the histogram.
     *
     * @return string representing the histogram.
     */
    public function getAsText()
    {
        $histogram = "";

        // for ($i = 1; $i <= 6; $i++) {

        for ($i = $this->min; $i <=  $this->max; $i++) {
            // Print the serie from min to max
            // Print also empty values in the serie

            $histogramrow = "";

            foreach ($this->serie as $value) {
                if ($value == $i) {
                    $histogramrow = $histogramrow . "*";
                }
            }

            // Build a row of return string
            $histogram = $histogram . $i . ": ";
            $histogram = $histogram . $histogramrow;
            $histogram = $histogram . "\n";
        }

        return $histogram;
    }


    /**
    * Inject the object to use as base for the histogram data.
    *
    * @param HistogramInterface $object The object holding the serie.
    *
    * @return void.
    */
    public function injectData(HistogramInterface $object)
    {
        $this->serie = $object->getHistogramSerie();
        $this->min   = $object->getHistogramMin();
        $this->max   = $object->getHistogramMax();
    }
}
