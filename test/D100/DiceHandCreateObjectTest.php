<?php

namespace maoh17\D100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceHand.
 */
class DiceHandCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dicehand = new DiceHand();
        $this->assertInstanceOf("\maoh17\D100\DiceHand", $dicehand);

        $res = $dicehand->values()[0];
        $exp = null;
        $this->assertEquals($exp, $res);

        $res = $dicehand->values()[1];
        $exp = null;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use one argument.
     */
    public function testCreateObjectOneArgument()
    {
        $dicehand = new DiceHand(2);
        $this->assertInstanceOf("\maoh17\D100\DiceHand", $dicehand);

        $res = $dicehand->values()[0];
        $exp = null;
        $this->assertEquals($exp, $res);

        $res = $dicehand->values()[1];
        $exp = null;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test function roll.
     */
    public function testRoll()
    {
        $dicehand = new DiceHand();
        $this->assertInstanceOf("\maoh17\D100\DiceHand", $dicehand);

        $dicehand->roll();

        $res = $dicehand->values()[0];
        $exp = 0;
        $this->assertGreaterThan($exp, $res);

        $res = $dicehand->values()[1];
        $exp = 0;
        $this->assertGreaterThan($exp, $res);
    }
}
