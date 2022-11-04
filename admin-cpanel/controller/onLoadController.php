<?php
    require_once("../core/dbcon.php");
    require "../functions/session.php";

    class onLoadController 
    {
        public function __construct()
        {
            $db = new Connection;
            $this->conn = $db->open();
        }
        public function getAnnouncement() {
            $query = 'SELECT * FROM posts WHERE post_type = "Announcements" OR post_type = "News" ORDER BY id ASC';
            $res = $this->conn->prepare($query);
            $res->execute();
            return $res;
        }

        public function getUserCategories() {
            $query = 'SELECT * FROM categories';
            $res = $this->conn->prepare($query);
            $res->execute();
            return $res;
        }
    }

?>