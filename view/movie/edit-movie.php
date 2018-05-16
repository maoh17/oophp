<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

if (!$movieId) {
    return;
}

?>

<form method="post">
    <fieldset>
    <legend>Redigera</legend>

    <input type="hidden" name="movieId" value="<?= $movieId ?>"/>

    <p>
        <label>Titel:<br>
        <input type="text" name="movieTitle" value="<?= $title ?>">
        </label>
    </p>

    <p>
        <label>År:<br>
        <input type="number" name="movieYear" value="<?= $year ?>">
        </label>
    </p>

    <p>
        <label>Bild:<br>
        <input type="text" name="movieImage" value="<?= $image ?>">
        </label>
    </p>

    <p>
        <input type="submit" name="doSave" value="Spara">
    </p>
    </fieldset>
</form>
