<?php

namespace maoh17\D100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Game.
 */
class GameCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObject()
    {
        $game = new Game();
        $this->assertInstanceOf("\maoh17\D100\Game", $game);

        $res = $game->getPlayerSum();
        $exp = 0;
        $this->assertEquals($exp, $res);

        $res = $game->getComputerSum();
        $exp = 0;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test function addPlayerPoints.
     */
    public function testAddPlayerPoints()
    {
        $game = new Game();
        $this->assertInstanceOf("\maoh17\D100\Game", $game);

        $game->addPlayerPoints(15);
        $game->addPlayerPoints(5);

        $res = $game->getPlayerSum();
        $exp = 20;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test function addComputerPoints.
     */
    public function testAddComputerPoints()
    {
        $game = new Game();
        $this->assertInstanceOf("\maoh17\D100\Game", $game);

        $game->addComputerPoints(25);
        $game->addComputerPoints(5);

        $res = $game->getComputerSum();
        $exp = 30;
        $this->assertEquals($exp, $res);
    }
}
