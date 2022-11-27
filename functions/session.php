<?php
$database = new Connection();
$db = $database->open();

if(isset($_COOKIE['authenticated'])) {
    if(!isset($_SESSION['google_id'])){
        $query = "SELECT * FROM accounts WHERE google_id = '".$_COOKIE['authenticated']."'";
        $res=$db->prepare($query);
        $res->execute();    
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['google_id'] = $row['google_id'];
            $_SESSION['google_first_name'] = $row['google_first_name'];
            $_SESSION['google_last_name'] = $row['google_last_name'];
            $_SESSION['google_email_address'] = $row['google_email_address'];
            $_SESSION['google_image'] = $row['google_image'];
        }   
    }

    $query = "SELECT user_level FROM accounts WHERE google_id = '".$_SESSION['google_id']."'";
    $res=$db->prepare($query);
    $res->execute();    
    while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['user_level'] = $row['user_level'];
    }

} else {
    header('Location: login.php');
    exit;
}

$database->close();
?>