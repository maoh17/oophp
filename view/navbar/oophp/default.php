<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

/* borttaget nedan: NAVBAR <?= __FILE__ ?> <br>*/
?>

<navbar>
    <a href="<?= url("") ?>">Hem</a> |
    <a href="<?= url("redovisning") ?>">Redovisning</a> |
    <a href="<?= url("om") ?>">Om</a> |
    <a href="<?= url("lek") ?>">Lek</a> |
    <a href="<?= url("gissa") ?>">Gissa</a> |
    <a href="<?= url("tarningsspel100") ?>">Tärningsspel 100</a> |
    <a href="<?= url("movie/show-all") ?>">Filmdatabas</a> |
    <a href="<?= url("textfilter-test") ?>">Textfilter</a> |
    <a href="<?= url("content") ?>">Content</a> |
    <a href="<?= url("cms/show-all") ?>">CMS</a> |
    <a href="<?= url("debug") ?>">Debug</a>
</navbar>
