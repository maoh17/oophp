<?php
/**
 * Show off the autoloader.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

// For the view
$title = "Guess my number (SESSION)";

// Get incoming
//$number = $_SESSION["number"] ?? -1;
//$tries = $_SESSION["tries"] ?? 6;
$guess = $_POST["guess"] ?? null;


// Start the session
session_name("maoh17");
session_start();

// Start up the game
if (!isset($_SESSION["game"])) {
    $_SESSION["game"] = new Guess(-1, 6);
}

$game = $_SESSION["game"];

// Reset the game
if (isset($_POST["reset"])) {
    $game->random();
}

// Do a guess
$res = null;
if (isset($_POST["doGuess"])) {
    $res = $game->makeGuess($guess);
}

require __DIR__ . "/view/game_session.php";
