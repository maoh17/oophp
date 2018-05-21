<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<h1><?= $title ?></h1>

<p>Funktionen nltbr() lägger till en radbryning med HTML för varje \n som finns i texten. Här visas ett exempel på hur nl2br används för att formatera text till HTML.</p>

<h2>Originaltext</h2>
<pre><?= htmlentities($text) ?></pre>

<h2>Filtrerad text</h2>
<pre><?= htmlentities($html) ?></pre>

<h2>Filtrerad text utskriven som HTML</h2>
<?= nl2br($html) ?>
