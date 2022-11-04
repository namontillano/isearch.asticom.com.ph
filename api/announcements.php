<?php     
require '../core/dbcon.php';
$database = new Connection();
$db = $database->open();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$sql = 'SELECT * FROM posts WHERE (post_type="News" OR post_type="Announcements" OR post_type="Broadcast") AND display_status="1" AND deleted_status = "0" ORDER BY id desc limit 10';        

$data=array();
$data["announcements"]=array();
$query = $db->query($sql);

if(isset($query)){
    foreach($query as $row){                
        extract($row);

        if ($row['post_type'] == "Broadcast") {
            $posttype = "img";
            $postthumb = $row['post_embed'];
            $postsrc = $row['post_embed']; 
        } else {
            if ($row['post_embed'] == '0') {
                $posttype = "img";
                $postthumb = "https://isearch.asticom.com.ph/uploads/"."default-thumbnail.jpg";
                $postsrc = "https://isearch.asticom.com.ph/uploads/"."default-thumbnail.jpg";
            } else { 
                $ext = array("gif", "jpeg", "png", "jpg");
                if (in_array(pathinfo($row['post_embed'], PATHINFO_EXTENSION), $ext)) {
                    $posttype = "img";
                    $postthumb = "https://isearch.asticom.com.ph/uploads/"."posts/".$row['post_embed'];  
                    $postsrc = "https://isearch.asticom.com.ph/uploads/"."posts/".$row['post_embed'];  
                } else {
                    $posttype = "iframe";
                    $postsrc = $row['post_embed'];

                    if ($row['post_thumb'] == "0") {
                        $postthumb = "https://isearch.asticom.com.ph/uploads/"."default-thumbnail.jpg";
                    } else {
                        $postthumb = "https://isearch.asticom.com.ph/uploads/"."posts/".$row['post_thumb'];
                    }
                }
            }
        }

        $dataItem = array(
            "id"=>$id,
            "post_type"=>$post_type,
            "post_category"=>$post_category,
            "post_embed"=>$postsrc,
            "post_thumb"=>$postthumb,
            "post_title"=>$post_title,
            "post_content"=>$post_content,
            "post_postedby"=>$post_postedby,
            "post_postedon"=>$post_postedon,
            "post_pin"=>$post_pin             
        );

        array_push($data["announcements"], $dataItem);
        
    }

    http_response_code(200);        
    echo json_encode($data);
}else{
    http_response_code(404);
    
    echo json_encode(
        array("message" => "No Announcements Found.")
    );
}

$database->close();
?>


