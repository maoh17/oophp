<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<h1><?= $title ?></h1>

<p>Markdown är ett sätt att skriva texter som är läsbara i källformatet men enkelt kan formatteras till HTML. Här visas ett exempel på hur text i Markdown formateras till HTML.</p>

<h2>Originaltext</h2>
<pre><?= htmlentities($text) ?></pre>

<h2>Filtrerad text</h2>
<pre><?= htmlentities($html) ?></pre>

<h2>Filtrerad text utskriven som HTML</h2>
<?= nl2br($html) ?>
