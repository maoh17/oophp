<?php

namespace maoh17\Guess;

/**
 * Show off the autoloader.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/../../vendor/autoload.php");

// For the view
$title = "Guess my number (GET inside)";

// Get incoming
$number = $_GET["number"] ?? -1;
$tries = $_GET["tries"] ?? 6;
$guess = $_GET["guess"] ?? null;

// Start up the game
$game = new Guess($number, $tries);

// Reset the game
if (isset($_GET["reset"])) {
    $game->random();
}

// Do a guess
$res = null;
if (isset($_GET["doGuess"])) {
    $res = $game->makeGuess($guess);
}
