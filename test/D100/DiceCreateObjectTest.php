<?php

namespace maoh17\D100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\maoh17\D100\Dice", $dice);

        $res = $dice->getSides();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use one argument.
     */
    public function testCreateObjectOneArgument()
    {
        $dice = new Dice(6);
        $this->assertInstanceOf("\maoh17\D100\Dice", $dice);

        $res = $dice->getSides();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test function roll.
     */
    public function testRoll()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\maoh17\D100\Dice", $dice);

        $roll = $dice->roll();

        $res = $roll;
        $exp = 0;
        $this->assertGreaterThan($exp, $res);
    }

    /**
     * Test function getValue.
     */
    public function testGetValue()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\maoh17\D100\Dice", $dice);

        $dice->roll();

        $res = $dice->getValue();
        $exp = 0;
        $this->assertGreaterThan($exp, $res);
    }
}
