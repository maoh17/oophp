<?php

namespace maoh17\D100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceGraphic.
 */
class DiceGraphicCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dicegraphic = new DiceGraphic();
        $this->assertInstanceOf("\maoh17\D100\DiceGraphic", $dicegraphic);

        $res = $dicegraphic->getValue();
        $exp = null;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test function roll.
     */
    public function testRoll()
    {
        $dicegraphic = new DiceGraphic();
        $this->assertInstanceOf("\maoh17\D100\DiceGraphic", $dicegraphic);

        $dicegraphic->roll();

        $res = $dicegraphic->getValue();
        $exp = 0;
        $this->assertGreaterThan($exp, $res);
    }
}
