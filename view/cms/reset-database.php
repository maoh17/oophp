<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<h2><?= $title ?></h2>

<p> Varning!!! Väljer du att återställa databasen försvinner alla webbsidor och bloggposter. Originaldata laddas in på nytt</p>

<form method="post">
    <fieldset>
    <p>
        <label>Skriv <i>reset</i> i detta fält för att återställa databasen:<br>
        <input type="text" name="resetText" default=""/>
        </label>
    </p>

    <p>
        <input type="submit" name="doReset" value="Återställ">
    </p>
    </fieldset>
</form>
