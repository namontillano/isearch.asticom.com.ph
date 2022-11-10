<?php
 require_once("../../core/dbcon.php");

 if(isset($_REQUEST['command'])) {
    $classController = new userManagementController();
    if($_REQUEST['command'] == 'updateUserStatus') {
        if(isset($_GET['user_id']) && isset($_GET['status'])) {
            $classController->updateUserStatus($_GET['user_id'], $_GET['status']);
        }
    }
    else if($_REQUEST['command'] == 'getCategories') {
        if(isset($_GET['user_id'])) {
            $classController->getCategories($_GET['user_id']);
        }
    } 
    else if($_REQUEST['command'] == 'updateUserAccessCategory') {
        $classController->updateUserAccessCategory();
    }
}


 class userManagementController {

    public function __construct()
    {
        $db = new Connection;
        $this->conn = $db->open();
    }

    public function updateUserStatus($user_id, $status) {
        $query = "UPDATE accounts SET status=:user_status WHERE google_id = :id";
        $res = $this->conn->prepare($query);
        $res->execute(array(
            ':id' => $user_id,
            ':user_status' => $status,
        ));
        if($res) {
            echo json_encode(array(
                'message' => 'success',
                'user_id' => $user_id,
                'status' => $status
            ));
        } else {
            echo 'error';
        }
    }

    public function getCategories($id){
        $query = "SELECT id,categories_name FROM categories";
        

        $res = $this->conn->query($query);
        $categories_data = [];
        $existing_access = [];
        if($res->rowCount()) {
            foreach($res as $data) {
                array_push($categories_data, $data);
            }  
        }
        $query2 = "SELECT user_level FROM accounts WHERE google_id=".$id;
        $res2 = $this->conn->query($query2);
        foreach($res2 as $data2){
            // array_push($existing_access, $data2['user_level']);
            $existing_access = explode (",", $data2['user_level']);
        }

        if($res && $res2) {
            echo json_encode(array(
                'categories' => $categories_data,
                'existing_access' => $existing_access
            ));
        } else {
            echo 'error';
        }
        
    }

    public function updateUserAccessCategory() {
        $access = $_POST['access'];
        $google_id = $_POST['google_id'];

        $query = "UPDATE accounts SET user_level=:access WHERE google_id = :id";
        $res = $this->conn->prepare($query);
        $res->execute(array(
            ':id' => $google_id,
            ':access' => '0,'.$access,
        ));
        if($res) {
            echo 'success';
        } else {
            echo 'error';
        }
    }


 }


?>