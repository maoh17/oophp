<?php

namespace maoh17\D100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class GameRound.
 */
class GameRoundCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObject()
    {
        $gameround = new GameRound();
        $this->assertInstanceOf("\maoh17\D100\GameRound", $gameround);

        $res = $gameround->getSum();
        $exp = 0;
        $this->assertEquals($exp, $res);

        $res = $gameround->getStarted();
        $exp = false;
        $this->assertEquals($exp, $res);

        $res = $gameround->getClosed();
        $exp = false;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test function addHand.
     */
    public function testAddHand()
    {
        $gameround = new GameRound();
        $this->assertInstanceOf("\maoh17\D100\GameRound", $gameround);

        $gameround->addHand(15);
        $gameround->addHand(5);

        $res = $gameround->getSum();
        $exp = 20;
        $this->assertEquals($exp, $res);

        $res = $gameround->getStarted();
        $exp = true;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test function resetSum.
     */
    public function testResetSum()
    {
        $gameround = new GameRound();
        $this->assertInstanceOf("\maoh17\D100\GameRound", $gameround);

        $gameround->addHand(15);

        $gameround->resetSum();

        $res = $gameround->getSum();
        $exp = 0;
        $this->assertEquals($exp, $res);

        $res = $gameround->getStarted();
        $exp = false;
        $this->assertEquals($exp, $res);

        $res = $gameround->getClosed();
        $exp = true;
        $this->assertEquals($exp, $res);
    }
}
