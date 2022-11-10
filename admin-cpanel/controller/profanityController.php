<?php
 require_once("../../core/dbcon.php");

 if(isset($_REQUEST['command'])) {
    $classController = new profanityController();
    if($_REQUEST['command'] == 'updateProfanity') {
        $classController->update();
    }
}


 class profanityController {

    public function __construct()
    {
        $db = new Connection;
        $this->conn = $db->open();
    }

    public function update() {
        $query = "UPDATE profanity SET badwords=:badwords WHERE id = 1";
        $res = $this->conn->prepare($query);
        $res->execute(array(
            ':badwords' =>  $_POST['profanities'],
        ));
        
        if($res) {
            echo 'success';
        } else {
            echo 'error';
        }
    }


 }


?>