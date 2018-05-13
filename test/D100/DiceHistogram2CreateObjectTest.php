<?php

namespace maoh17\D100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceHistogram2.
 */
class DiceHistogram2CreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dicehistogram2 = new DiceHistogram2();
        $this->assertInstanceOf("\maoh17\D100\DiceHistogram2", $dicehistogram2);

        $value = $dicehistogram2->getValue();

        $res = $value;
        $exp = null;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test function roll.
     */
    public function testRoll()
    {
        $dicehistogram2 = new DiceHistogram2();
        $this->assertInstanceOf("\maoh17\D100\DiceHistogram2", $dicehistogram2);

        $roll = $dicehistogram2->roll();

        $res = $roll;
        $exp = 0;
        $this->assertGreaterThan($exp, $res);
    }
}
