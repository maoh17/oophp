<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

if (!$content->id) {
    return;
}

?>

<h2><?= $title ?></h2>

<form method="post">
    <fieldset>
    <input type="hidden" name="contentId" value="<?= esc($content->id) ?>"/>

    <p>
        <label>Title:<br>
        <input type="text" name="contentTitle" value="<?= esc($content->title) ?>"/>
        </label>
    </p>

    <p>
        <label>Path:<br>
        <input readonly type="text" name="contentPath" value="<?= esc($content->path) ?>"/>
    </p>

    <p>
        <label>Slug:<br>
        <input type="text" name="contentSlug" value="<?= esc($content->slug) ?>"/>
    </p>

    <p>
        <label>Text:<br>
        <textarea class="mytextarea" name="contentData"><?= esc($content->data) ?></textarea>
     </p>

     <p>
         <label>Type:<br>
         <input readonly type="text" name="contentType" value="<?= esc($content->type) ?>"/>
     </p>

     <p>
         <label>Filter:<br>
         <input type="text" name="contentFilter" value="<?= esc($content->filter) ?>"/>
     </p>

     <p>
         <label>Publish:<br>
         <input readonly type="datetime" name="contentPublish" value="<?= esc($content->published) ?>"/>
     </p>

     <p>
         <input type="submit" name="doSave" value="Spara">
         <input type="submit" name="doDelete" value="Ta bort">
     </p>

    </fieldset>
</form>
