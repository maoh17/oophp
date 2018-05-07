<?php
/**
 * Show off the autoloader.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

// For the view
$title = "Guess my number (POST)";

// Get incoming
$number = $_POST["number"] ?? -1;
$tries = $_POST["tries"] ?? 6;
$guess = $_POST["guess"] ?? null;

// Start up the game
$game = new Guess($number, $tries);

// Reset the game
if (isset($_POST["reset"])) {
    $game->random();
}

// Do a guess
$res = null;
if (isset($_POST["doGuess"])) {
    $res = $game->makeGuess($guess);
}

require __DIR__ . "/view/game_post.php";
