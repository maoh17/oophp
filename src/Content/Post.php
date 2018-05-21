<?php

namespace maoh17\Content;

/**
 * A class for posts.
 */
class Post extends Content
{

    /**
     * Constructor to initiate the object and create a database object.
     *
     */
    public function __construct($database)
    {
        parent::__construct($database);
    }


    public function createPost($contentTitle, $contentPath, $contentSlug)
    {
        $sql = "INSERT INTO content (title, path, slug, type) VALUES (?, ?, ?, ?);";
        $this->db->execute($sql, [$contentTitle, $contentPath, $contentSlug, "post"]);
    }


    public function getNextBlogpostPath()
    {
        $sql = "SELECT SUBSTRING(path, 10, (
            SELECT length(path) - 9 AS length FROM  content
            WHERE type ='post'
            ORDER BY created DESC LIMIT 1)) + 1 AS number
            FROM content WHERE type ='post' ORDER BY created DESC LIMIT 1;";
        $res = $this->db->executeFetch($sql);
        $blogpostPath = "blogpost-" . strval($res->number);

        return $blogpostPath;
    }


    public function getSlug($contentTitle)
    {
        // Check if slug exists
        $slug = slugify($contentTitle);

        $i = 1;
        $currentContentSlug  = $slug;
        do {
            $i = $i + 1;
            $sql = "SELECT COUNT(*) AS count FROM content WHERE slug = ?;";
            $res = $this->db->executeFetch($sql, [$slug]);
            if ($res->count == 1) {
                $slug = $currentContentSlug . "-" . $i;
                $slugUnique = false;
            } else {
                $slugUnique = true;
            }
        } while (!$slugUnique);

        return $slug;
    }


    public function updatePost($title, $path, $slug, $data, $type, $filter, $publish, $id)
    {
        $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=? WHERE id = ?;";
        $this->db->execute($sql, [$title, $path, $slug, $data, $type, $filter, $publish, $id]);
    }


    public function getPostBySlug($slug)
    {
        $sql = <<<EOD
SELECT
*,
DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE type=?
AND slug=?
;
EOD;

        $res = $this->db->executeFetch($sql, ["post", $slug]);

        return $res;
    }


    public function readAllPosts()
    {
        $sql = <<<EOD
SELECT
*,
DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE
    type=?
    AND (deleted IS NULL OR deleted > NOW())
ORDER BY published
;
EOD;

        $res = $this->db->executeFetchAll($sql, ["post"]);

        return $res;
    }
}
