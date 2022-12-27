<?php
 require_once("../../core/dbcon.php");

 if(isset($_REQUEST['command'])) {
    $announcementController = new announcementController();
    if($_REQUEST['command'] == 'addAnnouncement') {
        $announcementController->create();
    }
    else if($_REQUEST['command'] == 'showAnnouncement') {
        if(isset($_GET['post_id'])) {
            $announcementController->showAnnouncement($_GET['post_id']);
        }
    }else if($_REQUEST['command'] == 'updateAnnouncement') {
        if(isset($_GET['post_id'])) {
            $announcementController->updateAnnouncement($_GET['post_id']);
        }
    } else if($_REQUEST['command'] == 'updatePinStatus') {
        if(isset($_GET['post_id']) && isset($_GET['status'])) {
            $announcementController->updatePinStatus($_GET['post_id'], $_GET['status']);
        }
    } else if($_REQUEST['command'] == 'updateDelStatus') {
        if(isset($_GET['post_id']) && isset($_GET['status'])) {
            $announcementController->updateDelStatus($_GET['post_id'], $_GET['status']);
        }
    } else if($_REQUEST['command'] == 'updateApproveStatus') {
        if(isset($_GET['post_id']) && isset($_GET['status'])) {
            $announcementController->updateApproveStatus($_GET['post_id'], $_GET['status']);
        }
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
        $content = str_replace("'","\'",$_POST['content']);
        $thumbnail = 0;
        //Tumbnail 
        if($_FILES['thumbnail']['size'] != 0) {
            $thumbnail = $this->uploadFile($_FILES['thumbnail'], '../../uploads/posts/');
            if($thumbnail == 'errors') {
                echo 'Invalid uploading of Embedded';
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
            if($image == 'errors') {
                echo 'Invalid uploading of Embedded';
                exit;
            }
        }


        $posted_by = $_SESSION['google_id'];
        $query = "INSERT INTO posts (post_title,post_type,post_category,display_status,post_thumb,post_embed,post_content, post_postedby, post_pin)
                  VALUES ('$title','$types','$category','$status','$thumbnail','$image','$content', '$posted_by','1')";
        $res = $this->conn->query($query);
        
        if($res) {
            echo json_encode(array(
                'message' => 'success',
                'image' => $thumbnail,
                'content' => strip_tags($content, '<br>')
            ));
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

    public function showAnnouncement($id){
        $query = "SELECT * FROM posts WHERE id =".$id;
        $res = $this->conn->query($query);
        
        if($res->rowCount()) {
            foreach($res as $data) {
                echo json_encode($data);
            }
        }
    }

    public function updateAnnouncement($id) {
        $astigo_status = $_POST['astigo_status'];
        $title = $_POST['u_title'];
        $types = $_POST['u_types'];
        $category = $_POST['u_category'];
        $status = $_POST['u_status'];
        $link = $_POST['u_link'];
        $content = $_POST['content'];

        $updateThumbnail = $_POST['ex_thumbnail'];
        $updateEmbed = $_POST['ex_embed_post'];

        

        if($updateThumbnail == '') {
            //Tumbnail 
            if($_FILES['u_thumbnail']['size'] != 0) {
                $updateThumbnail = $this->uploadFile($_FILES['u_thumbnail'], '../../uploads/posts/');
                if($updateThumbnail == 'errors') {
                    echo 'Invalid uploading of Embedded';
                    exit;
                }
            }
        }

        if($updateEmbed == '') {
            if($_POST['u_link'] != '') {
                $updateEmbed = $link;
            }
            // Image
            else if(!empty($_FILES['u_image']) ) {
                $updateEmbed = $this->uploadFile($_FILES['u_image'], '../../uploads/posts/');
                if($updateEmbed == 'errors') {
                    echo 'Invalid uploading of Embedded';
                    exit;
                }
            }
        }

        $query = "UPDATE posts SET astigo_status=:astigo_status, post_title=:post_title, post_type = :post_type, post_category = :post_category, display_status = :display_status, post_thumb = :post_thumb, post_embed = :post_embed, post_content = :post_content WHERE id = :id";
        $res = $this->conn->prepare($query);
        $res->execute(array(
            ':id' => $id,
            ':astigo_status' => $astigo_status,
            ':post_title' => $title,
            ':post_type' => $types,
            ':post_category' => $category,
            ':display_status' => $status,
            ':post_thumb' => $updateThumbnail,
            ':post_embed' => $updateEmbed,
            ':post_content' => $content,
        ));
        
        if($res) {
            echo json_encode(array(
                'message' => 'success',
                'image' => $updateThumbnail,
                'content' => strip_tags($content, '<br>')
            ));
        } else {
            echo 'error';
        }

    }


    public function updatePinStatus($id, $status)
    {
        $query = "UPDATE posts SET post_pin=:status WHERE id = :id";
        $res = $this->conn->prepare($query);
        $res->execute(array(
            ':id' => $id,
            ':status' => $status,
        ));
        if($res) {
            echo json_encode(array(
                'message' => 'success',
                'post_id' => $id,
                'status' => $status
            ));
        } else {
            echo 'error';
        }
        
    }

    public function updateDelStatus($id, $status)
    {
        $query = "UPDATE posts SET deleted_status=:status WHERE id = :id";
        $res = $this->conn->prepare($query);
        $res->execute(array(
            ':id' => $id,
            ':status' => $status,
        ));
        if($res) {
            echo json_encode(array(
                'message' => 'success',
                'post_id' => $id,
                'status' => $status
            ));
        } else {
            echo 'error';
        }
        
    }

    public function updateApproveStatus($id, $status)
    {
        $query = "UPDATE posts SET post_approval=:status WHERE id = :id";
        $res = $this->conn->prepare($query);
        $res->execute(array(
            ':id' => $id,
            ':status' => $status,
        ));
        if($res) {
            echo json_encode(array(
                'message' => 'success',
                'post_id' => $id,
                'status' => $status
            ));
        } else {
            echo 'error';
        }
        
    }


 }


?>
