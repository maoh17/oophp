<?php
/**
 * CMS specific routes.
 */
//var_dump(array_keys(get_defined_vars()));


/**
 * Show all content (1).
 */
$app->router->get("cms/show-all", function () use ($app) {
    $data = [
        "title"  => "Alla sidor och poster",
    ];

    $app->view->add('cms/cms-navbar', $data);

    $content = new maoh17\Content\Content($app->db);
    $res = $content->readAllContent();

    $data["resultset"] = $res;

    $app->view->add("cms/show-all", $data);
    $app->page->render($data);
});


/**
 * Show all content (2).
 */
$app->router->get("cms/", function () use ($app) {
    $data = [
        "title"  => "Alla sidor och poster",
    ];

    $app->view->add('cms/cms-navbar', $data);

    $content = new maoh17\Content\Content($app->db);
    $res = $content->readAllContent();

    $data["resultset"] = $res;

    $app->view->add("cms/show-all", $data);
    $app->page->render($data);
});


/**
 * Create page.
 */
$app->router->get("cms/create-page", function () use ($app) {
    $data = [
        "title"  => "Skapa ny webbsida",
    ];

    $app->view->add('cms/cms-navbar', $data);

    $app->view->add("cms/create-page", $data);
    $app->page->render($data);
});


/**
 * Create page (INSERT).
 */
$app->router->post("cms/create-page", function () use ($app) {
    $data = [
        "title"  => "Skapa ny webbsida",
    ];

    $app->view->add('cms/cms-navbar', $data);

    if ($app->request->getPost("doCreate")) {
        // Create
        $contentTitle= $app->request->getPost("contentTitle");

        $page = new maoh17\Content\Page($app->db);
        $page->createPage($contentTitle);

        $res = $page->readAllContent();

        $data["resultset"] = $res;
        $data["title"]     = "Alla sidor och poster";

        $app->view->add("cms/show-all", $data);
        $app->page->render($data);
    }
});


/**
 * Create post.
 */
$app->router->get("cms/create-post", function () use ($app) {
    $data = [
        "title"  => "Skapa ny bloggpost",
    ];

    $app->view->add('cms/cms-navbar', $data);

    $app->view->add("cms/create-post", $data);
    $app->page->render($data);
});


/**
 * Create post (INSERT).
 */
$app->router->post("cms/create-post", function () use ($app) {
    $data = [
        "title"  => "Skapa ny bloggpost",
    ];

    $app->view->add('cms/cms-navbar', $data);
    $app->db->connect();

    if ($app->request->getPost("doCreate")) {
        // Create
        $contentTitle= $app->request->getPost("contentTitle");

        $post = new maoh17\Content\Post($app->db);

        $contentPath = $post->getNextBlogpostPath();
        $contentSlug = $post->getSlug($contentTitle);

        $post->createPost($contentTitle, $contentPath, $contentSlug);

        $res = $post->readAllContent();

        $data["resultset"] = $res;
        $data["title"]     = "Alla sidor och poster";

        $app->view->add("cms/show-all", $data);
        $app->page->render($data);
    }
});

/**
 * Edit page.
 */
$app->router->get("cms/edit-page", function () use ($app) {
    $data = [
        "title"  => "Redigera webbsida",
    ];

    $app->view->add('cms/cms-navbar', $data);
    $page = new maoh17\Content\Page($app->db);

    $contentId = $app->request->getGet('id');

    $content = $page->getContentById($contentId);

    $data["content"] = $content;

    $app->view->add("cms/edit-page", $data);
    $app->page->render($data);
});


/**
 * Edit page (UPDATE/DELETE).
 */
$app->router->post("cms/edit-page", function () use ($app) {
    $data = [
        "title"  => "Redigera webbsida",
    ];

    $app->view->add('cms/cms-navbar', $data);
    $page = new maoh17\Content\Page($app->db);

    $contentId = $app->request->getPost('contentId');

    if (!is_numeric($contentId)) {
        die("Not valid for content id.");
    }

    if ($app->request->getPost("doSave")) {
        // Update
        $contentTitle = $app->request->getPost("contentTitle");
        $contentPath = $app->request->getPost("contentPath");
        $contentData = $app->request->getPost("contentData");
        $contentType = $app->request->getPost("contentType");
        $contentFilter = $app->request->getPost("contentFilter");
        $contentPublish = $app->request->getPost("contentPublish");
        $contentId = $app->request->getPost("contentId");

        if (!$contentPath) {
            $contentPath = null;
        }

        $page->updatePage($contentTitle, $contentPath, $contentData, $contentType, $contentFilter, $contentPublish, $contentId);
    } elseif ($app->request->getPost("doDelete")) {
        // Delete
        $contentId = $app->request->getPost("contentId");

        $page->deleteContent($contentId);
    }

    $res = $page->readAllContent();

    $data["resultset"] = $res;
    $data["title"]     = "Alla sidor och poster";

    $app->view->add("cms/show-all", $data);
    $app->page->render($data);
});


/**
 * Edit post.
 */
$app->router->get("cms/edit-post", function () use ($app) {
    $data = [
        "title"  => "Redigera bloggpost",
    ];

    $app->view->add('cms/cms-navbar', $data);
    $post = new maoh17\Content\Post($app->db);

    $contentId = $app->request->getGet('id');

    $content = $post->getContentById($contentId);

    $data["content"] = $content;

    $app->view->add("cms/edit-post", $data);
    $app->page->render($data);
});


/**
 * Edit page (UPDATE/DELETE).
 */
$app->router->post("cms/edit-post", function () use ($app) {
    $data = [
        "title"  => "Redigera bloggpost",
    ];

    $app->view->add('cms/cms-navbar', $data);
    $post = new maoh17\Content\Post($app->db);

    $contentId = $app->request->getPost('contentId');

    if (!is_numeric($contentId)) {
        die("Not valid for content id.");
    }

    if ($app->request->getPost("doSave")) {
        // Update
        $contentTitle = $app->request->getPost("contentTitle");
        $contentPath = $app->request->getPost("contentPath");
        $contentSlug = $app->request->getPost("contentSlug");
        $contentData = $app->request->getPost("contentData");
        $contentType = $app->request->getPost("contentType");
        $contentFilter = $app->request->getPost("contentFilter");
        $contentPublish = $app->request->getPost("contentPublish");
        $contentId = $app->request->getPost("contentId");

        if (!$contentPath) {
            $contentPath = null;
        }

        //$contentSlug = $post->getSlug($contentTitle);

        $post->updatePost($contentTitle, $contentPath, $contentSlug, $contentData, $contentType, $contentFilter, $contentPublish, $contentId);
    } elseif ($app->request->getPost("doDelete")) {
        // Delete
        $contentId = $app->request->getPost("contentId");

        $post->deleteContent($contentId);
    }

    $res = $post->readAllContent();

    $data["resultset"] = $res;
    $data["title"]     = "Alla sidor och poster";

    $app->view->add("cms/show-all", $data);
    $app->page->render($data);
});


/**
 * Delete content.
 */
$app->router->get("cms/delete", function () use ($app) {
    $data = [
        "title"  => "Ta bort post",
    ];

    $app->view->add('cms/cms-navbar', $data);
    $content = new maoh17\Content\Content($app->db);

    $contentId = $app->request->getGet('id');

    $content = $content->getContentById($contentId);

    $data["content"] = $content;

    $app->view->add("cms/delete", $data);
    $app->page->render($data);
});


/**
 * Delete content (DELETE).
 */
$app->router->post("cms/delete", function () use ($app) {
    $data = [
        "title"  => "Ta bort post",
    ];

    $app->view->add('cms/cms-navbar', $data);
    $content = new maoh17\Content\Content($app->db);

    $contentId = $app->request->getPost('contentId');

    if (!is_numeric($contentId)) {
        die("Not valid for content id.");
    }

    if ($app->request->getPost("doDelete")) {
        // Delete
        $contentId = $app->request->getPost("contentId");

        $content->deleteContent($contentId);
    }

    $res = $content->readAllContent();

    $data["resultset"] = $res;
    $data["title"]     = "Alla sidor och poster";

    $app->view->add("cms/show-all", $data);
    $app->page->render($data);
});


/**
 * Reset database.
 */
$app->router->get("cms/reset-database", function () use ($app) {
    $data = [
        "title"  => "Återställ databasen",
    ];

    $app->view->add('cms/cms-navbar', $data);

    $app->view->add("cms/reset-database", $data);
    $app->page->render($data);
});


/**
 * Reset database (run SQL script).
 */
$app->router->post("cms/reset-database", function () use ($app) {
    $data = [
        "title"  => "Återställ databasen",
    ];

    $app->view->add('cms/cms-navbar', $data);
    $content = new maoh17\Content\Content($app->db);

    if ($app->request->getPost("doReset")) {
        // Create
        $resetText= $app->request->getPost("resetText");

        if ($resetText == "reset") {
            $r = $content->resetDB();
        }

        $res = $content->readAllContent();

        $data["resultset"] = $res;
        $data["title"]     = "Alla sidor och poster";

        $app->view->add("cms/show-all", $data);
        $app->page->render($data);
    }
});
