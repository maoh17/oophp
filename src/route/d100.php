<?php
/**
 * Guess games specific routes.
 */
//var_dump(array_keys(get_defined_vars()));


/**
 * Play Dice 100 with POST.
 */
$app->router->any(["GET", "POST"], "d100/game100", function () use ($app) {
    $data = [
        "title" => "Spela Tärningsspel 100 - version 2",
    ];

    // Check POST variables
    $doReset         = $app->request->getPost("doReset");
    $doRoll          = $app->request->getPost("doRoll");
    $doTakePoints    = $app->request->getPost("doTakePoints");
    $doComputerRound = $app->request->getPost("doComputerRound");

    // Create game and gameround objects

    // Start the session
    if (!$app->session->has("game100")) {
        $game = new maoh17\D100\Game();
        $app->session->set("game100", $game);
    }
    if (!$app->session->has("gameround-player")) {
        $gameround_player = new maoh17\D100\GameRound();
        $app->session->set("gameround-player", $gameround_player);
    }
    if (!$app->session->has("gameround-computer")) {
        $gameround_computer = new maoh17\D100\GameRound();
        $app->session->set("gameround-computer", $gameround_computer);
    }


    $res = null;
    $showdicehand = false;
    $dicehandsum = 0;
    $dicehandok = true;
    $gameover = false;
    $computer = false;
    $showplayerresult = false;
    $showcomputerresult = false;
    $showhistogram = false;

    // Reset the game
    if ($doReset) {
        $res = "RESET!";

        // Create game and gameround objects
        $game = new maoh17\D100\Game();
        $gameround_player = new maoh17\D100\GameRound();

        // Start the session
        $app->session->set("game100", $game);
        $app->session->set("gameround-player", $gameround_player);
    }

    $game = $app->session->get("game100");
    $gameround_player = $app->session->get("gameround-player");
    $gameround_computer = $app->session->get("gameround-computer");

    // Do a roll
    if ($doRoll) {
        if (!$gameround_player->getStarted()) {
            // Start up dice object
            $dice = new maoh17\D100\DiceHistogram2();

            // Start the dice session
            $app->session->set("dice", $dice);
        } else {
            $dice = $app->session->get("dice");
        }

        $showhistogram = true;
        $rolls = 2;
        $diceroll = [];
        $class = [];
        for ($i = 0; $i < $rolls; $i++) {
            $diceroll[] = $dice->roll();
            $class[] = $dice->graphic();
        }

        $res = "ROLL:  " . implode(", ", $diceroll);

        $gameround_player->addHand($diceroll[0]);
        $gameround_player->addHand($diceroll[1]);

        if ($diceroll[0] == 1 or $diceroll[1] == 1) {
            $dicehandsum = 0;
            $dicehandok = false;
            $computer = true;

            $gameround_player ->resetSum();
        } else {
            $dicehandsum = $diceroll[0] + $diceroll[1];
        }

        $showdicehand = true;
        $showplayerresult = true;
    }

    // Cancel the game round and take home collected points
    if ($doTakePoints) {
        $res = "TAKE POINTS!";

        $game->addPlayerPoints($gameround_player->getSum());
        $gameround_player->resetSum();

        $computer = true;
    }

    // Start new game round - Computer
    if ($doComputerRound) {
        $res = "START NEW COMPUTER ROUND!";

        $gameround_computer = new maoh17\D100\GameRound();
        $app->session->set("gameround-computer", $gameround_computer);

        $continue = true;

        while ($continue and !$gameround_computer->getClosed()) {
            // Start up two dices
            $dice = new maoh17\D100\DiceHistogram2();
            $rolls = 2;
            $diceroll = [];
            $class = [];
            for ($i = 0; $i < $rolls; $i++) {
                $diceroll[] = $dice->roll();
            }

            if ($diceroll[0] > 1 and $diceroll[1] > 1) {
                $gameround_computer->addHand($diceroll[0]);
                $gameround_computer->addHand($diceroll[1]);
            } else {
                $gameround_computer->resetSum();
            }

            // Intelligence?
            $playerSum = $game->getPlayerSum();
            $computerSum = $game->getComputerSum() + $gameround_computer->getSum();

            if ($playerSum < 70 and $computerSum < 70) {
                $continue = $gameround_computer->getSum() < 16;
            } elseif ($computerSum >= 100) {
                $continue = false;
            } elseif ($playerSum > 92 and $computerSum > 92) {
                $continue = true;
            } elseif ($playerSum - $game->getComputerSum() > 30) {
                $continue = $gameround_computer->getSum() < 20;
            } else {
                $continue = $gameround_computer->getSum() < 16;
            }
        }

        $game->addComputerPoints($gameround_computer->getSum());

        $showcomputerresult = true;
        $computer = false;
    }

    if ($game->getPlayerSum() >= 100) {
        $res = "SLUT!";
        $gameover = true;
    }

    if ($game->getComputerSum() >= 100) {
        $res = "SLUT!";
        $gameover = true;
    }

    // Prepare histogram
    if ($showhistogram) {
        $histogram = new maoh17\D100\Histogram();
        $histogram->injectData($dice);
    } else {
        $histogram = null;
        $class = null;
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
    $data["showhistogram"]          = $showhistogram;
    $data["gameround_player"]       = $gameround_player;
    $data["gameround_computer"]     = $gameround_computer;
    $data["game"]                   = $game;
    $data["histogram"]              = $histogram;

    // Add view and render page
    $app->view->add("d100/game100", $data);
    $app->page->render($data);
});
