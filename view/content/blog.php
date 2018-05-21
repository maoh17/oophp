<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


if (!$resultset) {
    return;
}

?>
<h1><?= $title ?></h1>

<article>

<?php foreach ($resultset as $row) : ?>
<section>
    <header>
        <h3><a href="post/<?= esc($row->slug) ?>"><?= esc($row->title) ?></a></h3>
        <p style="font-size: 12px"><i>Publiserad: <time datetime="<?= esc($row->published_iso8601) ?>" pubdate><?= esc($row->published) ?></time></i></p>
    </header>
    <?= $row->data ?>
</section>
<hr>
<?php endforeach; ?>

</article>
