<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>
<style>
/**
 * CSS sprite for a dice with six faces.
 */
.dice-sprite {
    display: inline-block;
    padding: 0;
    margin: 0 4px 0 0;
    width: 32px;
    height: 32px;
    background: url(../img/dice-faces.jpg) no-repeat;
}
.dice-sprite.dice-1 { background-position: -160px 0; }
.dice-sprite.dice-2 { background-position: -128px 0; }
.dice-sprite.dice-3 { background-position: -96px 0; }
.dice-sprite.dice-4 { background-position: -64px 0; }
.dice-sprite.dice-5 { background-position: -32px 0; }
.dice-sprite.dice-6 { background-position: 0 0; }
</style>


<h1><?= $title ?></h1>

<?php if ($gameover) : ?>
<p>Vill du starta ett nytt spel mot datorn?</p>
<form method="POST">
    <input type="submit" name="doReset" value="*** Nytt spel ***">
</form>
<?php endif; ?>

<?php if (!$gameover and !$computer and $gameround_player->getSum() > 0) : ?>
<p>Slå två tärningar eller avbryt spelrundan och ta hem poängen.</p>
<form method="POST">
    <input type="submit" name="doRoll" value="Slå tärningar">
    <input type="submit" name="doTakePoints" value="Ta hem poängen">
    <input type="submit" name="doReset" value="*** Nytt spel ***">
</form>
<?php endif; ?>

<?php if (!$gameover and !$computer and $gameround_player->getSum() == 0) : ?>
<p>Slå tärningar för att starta din spelrunda.</p>
<form method="POST">
    <input type="submit" name="doRoll" value="Slå tärningar">
    <input type="submit" name="doReset" value="*** Nytt spel ***">
</form>
<?php endif; ?>

<?php if (!$gameover and $computer) : ?>
<form method="POST">
    <p>Nu är det datorns tur.</p>
    <input type="submit" name="doComputerRound" value="Spela en spelrunda för datorn">
    <input type="submit" name="doReset" value="*** Nytt spel ***">
</form>
<?php endif; ?>


<?php if ($showdicehand) : ?>
<p>
    <?php foreach ($class as $value) : ?>
        <i class="dice-sprite <?= $value ?>"></i>
    <?php endforeach; ?>
</p>
<?php endif; ?>

<?php if ($dicehandsum > 0) : ?>
<p>Summan av tärningarna är <?= $dicehandsum ?> </p>
<?php endif; ?>

<?php if (!$gameover and $dicehandok and $showplayerresult) : ?>
    <p>------------------------------------------------------------------------------------------------</p>
    <p>Summan av din spelrunda är <?= $gameround_player->getSum() ?>.</p>
    <pre><?= $histogram->getAsText() ?></pre>

<?php endif; ?>

<?php if (!$gameover and $showcomputerresult) : ?>
    <p>Datorn fick <?= $gameround_computer->getSum() ?> poäng. </p>
<?php endif; ?>

<?php if (!$dicehandok) : ?>
    <p>Du slog en etta. Det blev inga poäng denna spelrundan. </p>
<?php endif; ?>

<p>------------------------------------------------------------------------------------------------</p>

<p>Du har totalt <?= $game->getPlayerSum() ?> poäng.</p>

<p>Datorn har totalt <?= $game->getComputerSum() ?> poäng.</p>

<?php if ($game->getPlayerSum() >= 100) : ?>
    <h3>Du vann!</h3>
<?php endif; ?>

<?php if ($game->getComputerSum() >= 100) : ?>
    <h3>Datorn vann!</h3>
<?php endif; ?>
