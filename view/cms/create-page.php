<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<h2><?= $title ?></h2>

<form method="post">
    <fieldset>
    <p>
        <label>Titel:<br>
        <input type="text" name="contentTitle" default="A Title"/>
        </label>
    </p>

    <p>
        <input type="submit" name="doCreate" value="Lägg till">
        <button type="reset"></i> Reset</button>
    </p>
    </fieldset>
</form>
