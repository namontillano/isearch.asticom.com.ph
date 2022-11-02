<?php
 require_once("../../core/dbcon.php");

 if(isset($_REQUEST['command'])) {
    $announcementController = new announcementController();
    if($_REQUEST['command'] == 'addAnnouncement') {
        $announcementController->create();
    }
}


 class announcementController {

    public function __construct()
    {
        $db = new Connection;
        $this->conn = $db->open();
    }

    public function create() {
        
        $title = $_POST['title'];
        $types = $_POST['types'];
        $category = $_POST['category'];
        $status = $_POST['status'];
        $link = $_POST['link'];
        $content = $_POST['content'];

        //Tumbnail 
        if(!empty($_FILES['thumbnail'])) {
            $thumbnail = $this->uploadFile($_FILES['thumbnail'], '../../uploads/posts/');
            if($thumbnail == 'error') {
                echo 'Invalid uploading of Thumnail';
                exit;
            }
        }

        //Link
        if($_POST['link'] != '') {
            $image = $link;
        }
        // Image
        else if(!empty($_FILES['image']) ) {
            $image = $this->uploadFile($_FILES['image'], '../../uploads/posts/');
            if($image == 'error') {
                echo 'Invalid uploading of Embedded';
                exit;
            }
        }


        $posted_by = $_SESSION['google_id'];
        $query = "INSERT INTO posts (post_title,post_type,post_category,display_status,post_thumb,post_embed,post_content, post_postedby)
                  VALUES ('$title','$types','$category','$status','$thumbnail','$image','$content', '$posted_by')";
        $res = $this->conn->query($query);
        
        if($res) {
            echo 'success';
        } else {
            echo 'error';
        }

    }


    public function uploadFile($filename, $folder) {

        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $sourcePath = $filename['tmp_name'];
        $newFile = $randomString;
        $ext = pathinfo($filename['name']);

        $targetPath = $folder . $newFile . '.' .$ext['extension'];
        $final_filename = $newFile . '.' .$ext['extension'];

        if(move_uploaded_file($sourcePath, $targetPath)) {
            return $final_filename;
        } else {
            return 'errors';
        }
    }
 }


?>