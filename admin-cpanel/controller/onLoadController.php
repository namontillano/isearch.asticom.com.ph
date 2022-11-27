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
            $query = 'SELECT * FROM posts WHERE (post_type = "Announcements" OR post_type = "News") AND deleted_status = "0" ORDER BY id DESC';
            $res = $this->conn->prepare($query);
            $res->execute();
            return $res;
        }

        public function getCommunity() {
            $query = 'SELECT posts.id as id , posts.post_type as post_type , posts.post_category as post_category , posts.post_embed as post_embed , posts.post_thumb as post_thumb , posts.post_title as post_title , posts.post_content as post_content , posts.post_postedby as post_postedby , posts.post_postedon as post_postedon , posts.post_pin as post_pin , posts.post_views as post_views , posts.display_status as display_status , posts.deleted_status as deleted_status ,  accounts.google_first_name,  accounts.google_last_name, accounts.google_image FROM posts INNER JOIN accounts ON posts.post_postedby = accounts.google_id WHERE posts.post_type="Community" AND posts.display_status="1" AND posts.deleted_status = "0" ORDER BY posts.id DESC';
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

        public function getComment() {
            $query = "SELECT comments.id AS comment_row_id, comments.comment_post_id AS comment_post_id, comments.comment_user_id AS comment_user_id, comments.comment_message AS comment_message, comments.comment_date_posted AS comment_date_posted, comments.comment_status AS comment_status,  accounts.* FROM comments INNER JOIN accounts ON comments.comment_user_id = accounts.google_id ORDER BY comments.comment_date_posted DESC";
            $res = $this->conn->prepare($query);
            $res->execute();
            return $res;
        }
    }

?>
