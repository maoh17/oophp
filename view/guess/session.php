<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<h1><?= $title ?></h1>

<p>Guess a number between 1 and 100. You have <?= $game->tries() ?> tries left</p>

<form method="POST">
    <input type="text" name="guess" value="<?= $guess ?>" autofocus>
    <input type="submit" name="doGuess" value="Make a guess">
    <input type="submit" name="doCheat" value="Cheat">
    <input type="submit" name="doReset" value="Reset">
</form>

<?php if (isset($res)) : ?>
<p><?= $res ?></p>
<?php endif; ?>
