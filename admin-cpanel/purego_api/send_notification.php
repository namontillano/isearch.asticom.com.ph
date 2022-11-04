<?php

if(isset($_POST['title']))
{
    $title = $_POST['title'];
}
if(isset($_POST['textInput']))
{
    $description = $_POST['textInput'];
}
if(isset($_POST['imgURL']))
{
    $imgURL = $_POST['imgURL'];
}

// Get all the registration ids

$curl1 = curl_init();

curl_setopt_array($curl1, array(
  CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/attendance/getinformation/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response1 = curl_exec($curl1);

curl_close($curl1);
$responseData = json_decode($response1);

$resp = array();

foreach($responseData as $user)
{
    array_push($resp,$user->token);
}

$datas = '{
    "data": {},
    "notification": {
        "body": "'.$description.'",
        "title": "'.$title.'",
        "image": "'.$imgURL.'"
    },
    "registration_ids": '.json_encode($resp).'
    }';


//Send the notification using all the registration ids

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$datas,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: key=AAAAGtdR-KM:APA91bGvldY29V46yeVGDM_7CYvsQu6K10Fs8L2HvUbuKlxfcYPc0pP743WKMSBDlnOo936XGqTv1noqYBhowHBfKi3zssT5xcU5SqYXLyqRnBCH-1n4hJ4jQIANnrB1V0pBvY-eILk6'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$data = '{
    "id": "'.uniqid().'",
    "title": "'.$title.'",
    "message": "'.$description.'",
    "image_path": "'.$imgURL.'",
    "cdate": "'.date('d-m-y H:i:s').'"
}';

//then save the data

$curl2 = curl_init();

curl_setopt_array($curl2, array(
  CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/notification',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$data,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response2 = curl_exec($curl2);

curl_close($curl2);
header('location: ../purego_view/broadcast.php');



