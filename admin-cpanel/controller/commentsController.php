<?php
 require_once("../../core/dbcon.php");

 if(isset($_REQUEST['command'])) {
    $classController = new commentsController();
    if($_REQUEST['command'] == 'updateCommentStatus') {
        if(isset($_GET['comment_id']) && isset($_GET['status'])) {
            $classController->updateCommentStatus($_GET['comment_id'], $_GET['status']);
        }
    }
}


 class commentsController {

    public function __construct()
    {
        $db = new Connection;
        $this->conn = $db->open();
    }

    public function updateCommentStatus($comment_id, $status)
    {
        $query = "UPDATE comments SET comment_status=:status WHERE id = :id";
        $res = $this->conn->prepare($query);
        $res->execute(array(
            ':id' => $comment_id,
            ':status' => $status,
        ));
        if($res) {
            echo json_encode(array(
                'message' => 'success',
                'comment_id' => $comment_id,
                'status' => $status
            )); 
        } else {
            echo 'error';
        }
        
    }
   

 }


?>