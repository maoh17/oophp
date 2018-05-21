<?php
/**
 * Guess games specific routes.
 */
//var_dump(array_keys(get_defined_vars()));


/**
 * Test BBcode.
 */
$app->router->get("textfilter/bbcode", function () use ($app) {
    $data = [
        "title"  => "BBCode"
    ];

    $myfilter = new maoh17\Content\MyTextFilter();

    $text = file_get_contents(__DIR__ . "/../../content/text/bbcode.txt");

    $html = $myfilter->parse($text, ["bbcode"]);

    $data["text"] = $text;
    $data["html"] = $html;

    $app->view->add("textfilter/bbcode", $data);
    $app->page->render($data);
});


/**
 * Test makeClickable.
 */
$app->router->get("textfilter/clickable", function () use ($app) {
    $data = [
        "title"  => "Skapa klickbara länkar"
    ];

    $myfilter = new maoh17\Content\MyTextFilter();

    $text = file_get_contents(__DIR__ . "/../../content/text/clickable.txt");

    $html = $myfilter->parse($text, ["link"]);

    $data["text"] = $text;
    $data["html"] = $html;

    $app->view->add("textfilter/clickable", $data);
    $app->page->render($data);
});


/**
 * Test Markdown.
 */
$app->router->get("textfilter/markdown", function () use ($app) {
    $data = [
        "title"  => "Markdown"
    ];

    $myfilter = new maoh17\Content\MyTextFilter();

    $text = file_get_contents(__DIR__ . "/../../content/text/sample.md");

    $html = $myfilter->parse($text, ["markdown"]);

    $data["text"] = $text;
    $data["html"] = $html;

    $app->view->add("textfilter/markdown", $data);
    $app->page->render($data);
});


/**
 * Test nl2br.
 */
$app->router->get("textfilter/nl2br", function () use ($app) {
    $data = [
        "title"  => "nl2br"
    ];

    $myfilter = new maoh17\Content\MyTextFilter();

    $text = "Detta är en test\ndär detta stycke hamnar på en ny rad.";

    $html = $myfilter->parse($text, ["nl2br"]);

    $data["text"] = $text;
    $data["html"] = $html;

    $app->view->add("textfilter/nl2br", $data);
    $app->page->render($data);
});
