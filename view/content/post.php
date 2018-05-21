<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


?>

<article>
    <header>
        <h1><?= esc($content->title) ?></h1>
        <p style="font-size: 12px"><i>Publiserad: <time datetime="<?= esc($content->published_iso8601) ?>" pubdate><?= esc($content->published) ?></time></i></p>
    </header>
    <?= $content->data ?>
</article>
