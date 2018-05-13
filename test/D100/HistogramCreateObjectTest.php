<?php

namespace maoh17\D100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Histogram.
 */
class HistogramCreateObjectTest extends TestCase
{
    /**
     * Test class histogram and function getSerie.
     */
    public function testHistogramSerie()
    {
        $histogram = new Histogram();
        $this->assertInstanceOf("\maoh17\D100\Histogram", $histogram);

        $dice = new DiceHistogram2();
        $diceroll[0] = $dice->roll();
        $diceroll[1] = $dice->roll();

        $histogram->injectData($dice);

        $serie = $histogram->getSerie();

        $res = $serie[0];
        $exp = $diceroll[0];
        $this->assertEquals($exp, $res);

        $res = $serie[1];
        $exp = $diceroll[1];
        $this->assertEquals($exp, $res);
    }

    /**
     * Test class histogram and function getAsText.
     */
    public function testHistogramGetAsText()
    {
        $histogram = new Histogram();
        $this->assertInstanceOf("\maoh17\D100\Histogram", $histogram);

        $dice = new DiceHistogram2();
        $diceroll[0] = $dice->roll();
        $diceroll[1] = $dice->roll();
        $diceroll[2] = $dice->roll();

        $histogram->injectData($dice);

        // Get the expected histogram text
        $histogramtext = "";
        for ($i = 1; $i <= 6; $i++) {
            $histogramrow = "";
            foreach ($diceroll as $value) {
                if ($value == $i) {
                    $histogramrow = $histogramrow . "*";
                }
            }
            $histogramtext = $histogramtext . $i . ": ";
            $histogramtext = $histogramtext . $histogramrow;
            $histogramtext = $histogramtext . "\n";
        }

        $res = $histogram->getAsText();
        $exp = $histogramtext;
        $this->assertEquals($exp, $res);
    }
}
