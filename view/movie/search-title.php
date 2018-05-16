<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<form method="get">
    <fieldset>
    <legend>Sök (använd % som wildcard)</legend>
    <p>
        <label>Titel:
            <input type="search" name="title" value="<?= htmlentities($searchTitle) ?>" required autofocus>
        </label>
    </p>
    <p>
        <input type="submit" name="doSearch" value="Sök">
    </p>
    </fieldset>
</form>

<br>
