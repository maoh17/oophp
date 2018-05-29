<?php

namespace maoh17\Content;

/**
 * A class for pages.
 */
class Page extends Content
{

    /**
     * Constructor to initiate the object and create a database object.
     *
     */
    public function __construct($database)
    {
        parent::__construct($database);
    }


    public function createPage($title)
    {
        $sql = "INSERT INTO content06 (title, type) VALUES (?, ?);";
        $this->db->execute($sql, [$title, "page"]);
    }


    public function updatePage($title, $path, $data, $type, $filter, $publish, $id)
    {
        $sql = "UPDATE content06 SET title=?, path=?, data=?, type=?, filter=?, published=? WHERE id = ?;";
        $this->db->execute($sql, [$title, $path, $data, $type, $filter, $publish, $id]);
    }


    public function getPageByPath($path)
    {
        $sql = <<<EOD
SELECT
*,
DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content06
WHERE type=?
AND path=?
;
EOD;

        $res = $this->db->executeFetch($sql, ["page", $path]);
        return $res;
    }
}
