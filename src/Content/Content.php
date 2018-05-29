<?php

namespace maoh17\Content;

/**
 * A class for content such as pages and posts.
 */
class Content
{
    protected $db;

    /**
     * Constructor to initiate the object and create a database object.
     *
     */
    public function __construct($database)
    {
        $this->db = $database;
        $this->db->connect();
    }


    public function readAllContent()
    {
        $sql = "SELECT * FROM content06 ORDER BY type, id;";
        $res = $this->db->executeFetchAll($sql);

        return $res;
    }


    public function getContentById($id)
    {
        $sql = "SELECT * FROM content06 WHERE id = ?;";
        $res = $this->db->executeFetch($sql, [$id]);

        return $res;
    }


    public function deleteContent($id)
    {
        $sql = "UPDATE content06 SET deleted=NOW() WHERE id=?;";
        $this->db->execute($sql, [$id]);
    }


    public function resetDB()
    {
        $setupfile = "../sql/content/setup.sql";
        $mysql = $this->db->getConfig('mysql');
        $dsn = $this->db->getConfig('dsn');
        $output = null;

        // Extract hostname and databasename from dsn
        $dsnDetail = [];
        preg_match("/mysql:host=(.+);dbname=([^;.]+)/", $dsn, $dsnDetail);
        $host = $dsnDetail[1];
        $database = $dsnDetail[2];
        $login = $this->db->getConfig('username');
        $password = $this->db->getConfig('password');

        $command = "$mysql -h{$host} -u{$login} -p{$password} $database < $setupfile 2>&1";
        $output = [];
        $status = null;
        exec($command, $output, $status);
        $output = "<p>The command was: <code>$command</code>.<br>The command exit status was $status."
            . "<br>The output from the command was:</p><pre>"
            . print_r($output, 1);
        return $output;
    }
}
