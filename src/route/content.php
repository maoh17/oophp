<?php
/**
 * Blog specific routes.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Show page.
 */
$app->router->get("content/page/{path}", function ($path) use ($app) {

    //$app->db->connect();
    $page = new maoh17\Content\Page($app->db);

    $content = $page->getPageByPath($path);

    if (!$content) {
        $data["title"] = "404";
        $app->view->add("content/404", $data);
        $app->page->render($data);
        exit;
    }

    $myfilter = new maoh17\Content\MyTextFilter();

    $html = $myfilter->parseCS($content->data, $content->filter);

    $data["title"] = $content->title;
    $data["html"] = $html;

    $app->view->add("content/page", $data);
    $app->page->render($data);
});



/**
 * Show post.
 */
$app->router->get("content/post/{slug}", function ($slug) use ($app) {

    //$app->db->connect();
    $post = new maoh17\Content\Post($app->db);

    $content = $post->getPostBySlug($slug);

    if (!$content) {
        $data["title"] = "404";
        $app->view->add("content/404", $data);
        $app->page->render($data);
        exit;
    }

    $myfilter = new maoh17\Content\MyTextFilter();

    $content->data = $myfilter->parseCS($content->data, $content->filter);

    $data["content"] = $content;

    $app->view->add("content/post", $data);
    $app->page->render($data);
});



/**
 * Show blog.
 */
$app->router->get("content/blog", function () use ($app) {
    $data = [
        "title"  => "Bloggen",
    ];
    //$app->db->connect();
    $post = new maoh17\Content\Post($app->db);

    $resultset = $post->readAllPosts();

    $myfilter = new maoh17\Content\MyTextFilter();

    foreach ($resultset as $res) {
        $res->data = $myfilter->parseCS($res->data, $res->filter);
    }

    $data["resultset"] = $resultset;

    $app->view->add("content/blog", $data);
    $app->page->render($data);
});
