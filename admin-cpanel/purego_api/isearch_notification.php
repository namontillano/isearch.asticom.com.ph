<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


function msg($success, $status, $message, $extra = [])
{
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ], $extra);
}


$data = json_decode(file_get_contents("php://input"));
$returnData = [];

if($_SERVER["REQUEST_METHOD"] !== "POST")
{
    $returnData = msg(0, 404, 'Page Not Found!');
}
else
{
    $title = trim($data->title);
    $message = trim($data->message);
    $image_path = trim($data->image_path);

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
        "body": "'.$message.'",
        "title": "'.$title.'",
        "image": "'.$image_path.'"
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
    "message": "'.$message.'",
    "image_path": "'.$image_path.'",
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
    
    $returnData = [
        'success' => 1,
        'status' => 201,
        'message' => 'Success'
    ];
}

echo json_encode($returnData);