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
        
        public function checkPostCategories($code) {
            $show = false;
            $id = explode(",", $_SESSION['user_level']);
            $query = "SELECT * FROM categories where categories_code='".$code."'";
            $res = $this->conn->prepare($query);
            $res->execute();
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
				if(in_array($row['id'], $id)) {
                    $show = true;
                }
			}
            return $show;
        }

        public function getProfanity() {
            $query = 'SELECT badwords FROM profanity';
            $res = $this->conn->query($query);
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
				return $row['badwords'];
			}
        }

        public function getUserAccount() {
            $query = 'SELECT * FROM accounts';
            $res = $this->conn->prepare($query);
            $res->execute();
            return $res;
        }
    }

?>