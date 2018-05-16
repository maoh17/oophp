<?php
/**
 * Movie database specific routes.
 */
//var_dump(array_keys(get_defined_vars()));


/**
 * Show all movies (movie/).
 */
$app->router->get("movie/", function () use ($app) {
    $data = [
        "title"  => "Filmer",
    ];

    $app->view->add('movie/movie-navbar', $data);
    $app->db->connect();

    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);

    $data["resultset"] = $res;

    $app->view->add("movie/show-all", $data);
    $app->page->render($data);
});


/**
 * Show all movies (movie/show-all).
 */
$app->router->get("movie/show-all", function () use ($app) {
    $data = [
        "title"  => "Filmer",
    ];

    $app->view->add('movie/movie-navbar', $data);
    $app->db->connect();

    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);

    $data["resultset"] = $res;

    $app->view->add("movie/show-all", $data);
    $app->page->render($data);
});



/**
 * Search for title.
 */
$app->router->get("movie/search-title", function () use ($app) {
    $data = [
        "title" => "Sök på titel"
    ];

    $app->view->add("movie/movie-navbar", $data);
    $app->db->connect();

    $searchTitle = $app->request->getGet('title');
    $data["searchTitle"] = $searchTitle;
    $app->view->add("movie/search-title", $data);

    if ($searchTitle) {
        $sql = "SELECT * FROM movie WHERE title LIKE ?;";
        $res = $app->db->executeFetchAll($sql, [$searchTitle]);

        $data["resultset"] = $res;
        $app->view->add("movie/show-all", $data);
    }

    $app->page->render($data);
});



/**
 * Search for year.
 */
$app->router->get("movie/search-year", function () use ($app) {
    $data = [
        "title" => "Sök på år"
    ];

    $app->view->add("movie/movie-navbar", $data);
    $app->db->connect();

    $res = null;

    $searchYear1 = $app->request->getGet('year1');
    $searchYear2 = $app->request->getGet('year2');

    $data["searchYear1"] = $searchYear1;
    $data["searchYear2"] = $searchYear2;
    $app->view->add("movie/search-year", $data);

    if ($searchYear1 and $searchYear1) {
        $sql = "SELECT * FROM movie WHERE year >= ? AND year <= ?;";
        $res = $app->db->executeFetchAll($sql, [$searchYear1, $searchYear2]);
    } elseif ($searchYear1) {
        $sql = "SELECT * FROM movie WHERE year >= ?;";
        $res = $app->db->executeFetchAll($sql, [$searchYear1]);
    } elseif ($searchYear2) {
        $sql = "SELECT * FROM movie WHERE year <= ?;";
        $res = $app->db->executeFetchAll($sql, [$searchYear2]);
    }

    $data["resultset"] = $res;
    $app->view->add("movie/show-all", $data);
    $app->page->render($data);
});



/**
 * CRUD movie.
 */
$app->router->any(['GET', 'POST'], 'movie/crud-movie', function () use ($app) {
    $data = [
        'title' => "Lägg till | Redigera | Ta bort"
    ];

    $app->view->add("movie/movie-navbar", $data);
    $app->db->connect();

    $movieId = $app->request->getPost('movieId');

    if ($app->request->getPost('doDelete') && is_numeric($movieId)) {
        $sql = "DELETE FROM movie WHERE id = ?;";
        $res = $app->db->execute($sql, [$movieId]);
    } elseif ($app->request->getPost('doAdd')) {
        $sql = "INSERT INTO movie (title, year, image) VALUES (?, ?, ?);";
        $res = $app->db->execute($sql, ["A title", 2017, "img/noimage.png"]);

        $movieId = $app->db->lastInsertId();

        $data["movieId"] = $movieId;
        $data["title"] = "A title";
        $data["year"] = 2017;
        $data["image"] = "img/noimage.png";
        $app->view->add("movie/edit-movie", $data);
        $app->page->render($data);
        exit;
    } elseif ($app->request->getPost('doEdit') && is_numeric($movieId)) {
        $sql = "SELECT * FROM movie WHERE id = ?;";
        $res = $app->db->executeFetchAll($sql, [$movieId]);

        $data["movieId"] = $res[0]->id;
        $data["title"] = $res[0]->title;
        $data["year"] = $res[0]->year;
        $data["image"] = $res[0]->image;

        $app->view->add("movie/edit-movie", $data);
        $app->page->render($data);
        exit;
    } elseif ($app->request->getPost("doSave")) {
        $movieId = $app->request->getPost("movieId");
        $movieTitle = $app->request->getPost("movieTitle");
        $movieYear = $app->request->getPost("movieYear");
        $movieImage = $app->request->getPost("movieImage");

        $sql = "UPDATE movie SET title = ?, year = ?, image = ? WHERE id = ?;";
        $app->db->execute($sql, [$movieTitle, $movieYear, $movieImage, $movieId]);
    }

    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);
    $data["resultset"] = $res;
    $app->view->add('movie/crud-movie', $data);
    $app->page->render($data);

});
