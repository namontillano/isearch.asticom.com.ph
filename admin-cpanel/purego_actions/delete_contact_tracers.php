<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_POST["deleteid"];

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/purego/contact_tracer/'.$id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'DELETE',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    header("location: ../contact-tracer-account.php?delete=success");
    
}
?>