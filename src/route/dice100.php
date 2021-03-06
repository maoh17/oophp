<?php
/**
 * Guess games specific routes.
 */
//var_dump(array_keys(get_defined_vars()));


/**
 * Play Dice 100 with POST.
 */
$app->router->any(["GET", "POST"], "dice100/game", function () use ($app) {
    $data = [
        "title" => "Spela Tärningsspel 100",
    ];

    // Start the session
    session_destroy();
    session_name("maoh17");
    session_start();

    // Start up the game if not already started
    if (!isset($_SESSION["dice100"])) {
        $_SESSION["dice100"] = new maoh17\Dice100\Game();
    }

    // Start up the game round if not already started
    if (!isset($_SESSION["gameround-player"])) {
        $_SESSION["gameround-player"] = new maoh17\Dice100\GameRound();
    }

    // Start up the game round if not already started
    if (!isset($_SESSION["gameround-computer"])) {
        $_SESSION["gameround-computer"] = new maoh17\Dice100\GameRound();
    }

    // Start up two dices
    $dice = new maoh17\Dice100\DiceGraphic();
    $rolls = 2;
    $diceroll = [];
    $class = [];
    for ($i = 0; $i < $rolls; $i++) {
        $diceroll[] = $dice->roll();
        $class[] = $dice->graphic();
    }

    $res = null;
    $showdicehand = false;
    $dicehandsum = 0;
    $dicehandok = true;
    $gameover = false;
    $computer = false;
    $showplayerresult = false;
    $showcomputerresult = false;

    // Reset the game
    if (isset($_POST["doReset"])) {
        $res = "RESET!";
        $_SESSION["dice100"] = new maoh17\Dice100\Game();
        $_SESSION["gameround-player"] = new maoh17\Dice100\GameRound();
    }

    // Do a roll
    if (isset($_POST["doRoll"])) {
        $res = "ROLL:  " . implode(", ", $diceroll);
        $_SESSION["gameround-player"]->addHand($diceroll[0]);
        $_SESSION["gameround-player"]->addHand($diceroll[1]);

        if ($diceroll[0] == 1 or $diceroll[1] == 1) {
            $dicehandsum = 0;
            $dicehandok = false;
            $computer = true;
            $_SESSION["gameround-player"]->resetSum();
        } else {
            $dicehandsum = $diceroll[0] + $diceroll[1];
        }

        $showdicehand = true;
        $showplayerresult = true;
    }

    // Cancel the game round and take home collected points
    if (isset($_POST["doTakePoints"])) {
        $res = "TAKE POINTS!";
        $_SESSION["dice100"]->addPlayerPoints($_SESSION["gameround-player"]->getSum());
        $_SESSION["gameround-player"]->resetSum();
        $computer = true;
    }

    // Start new game round - Computer
    if (isset($_POST["doComputerRound"])) {
        $res = "START NEW COMPUTER ROUND!";
        $_SESSION["gameround-computer"] = new maoh17\Dice100\GameRound();

        while ($_SESSION["gameround-computer"]->getSum() < 16 and !$_SESSION["gameround-computer"]->getClosed()) {
            // Start up two dices
            $dice = new maoh17\Dice100\DiceGraphic();
            $rolls = 2;
            $diceroll = [];
            $class = [];
            for ($i = 0; $i < $rolls; $i++) {
                $diceroll[] = $dice->roll();
            }

            if ($diceroll[0] > 1 and $diceroll[1] > 1) {
                $_SESSION["gameround-computer"]->addHand($diceroll[0]);
                $_SESSION["gameround-computer"]->addHand($diceroll[1]);
            } else {
                $_SESSION["gameround-computer"]->resetSum();
            }
        }

        $_SESSION["dice100"]->addComputerPoints($_SESSION["gameround-computer"]->getSum());
        $showcomputerresult = true;
        $computer = false;
    }

    if ($_SESSION["dice100"]->getPlayerSum() >= 100) {
        $res = "SLUT!";
        $gameover = true;
    }

    if ($_SESSION["dice100"]->getComputerSum() >= 100) {
        $res = "SLUT!";
        $gameover = true;
    }

    // Prepare $data
    $data["res"]                    = $res;
    $data["class"]                  = $class;
    $data["dicehandsum"]            = $dicehandsum;
    $data["dicehandok"]             = $dicehandok;
    $data["showdicehand"]           = $showdicehand;
    $data["gameover"]               = $gameover;
    $data["computer"]               = $computer;
    $data["showcomputerresult"]     = $showcomputerresult;
    $data["showplayerresult"]       = $showplayerresult;
    $data["gameround_player"]       = $_SESSION["gameround-player"];
    $data["gameround_computer"]     = $_SESSION["gameround-computer"];
    $data["game"]                   = $_SESSION["dice100"];

    // Add view and render page
    $app->view->add("dice100/game", $data);
    $app->page->render($data);
});
