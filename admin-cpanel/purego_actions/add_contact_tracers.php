<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $emp_id = $_POST['emp_id'];
        $employeename = $_POST['employeename'];
        

        $curl = curl_init();

        $data = '{
            "id": "'.uniqid().'",
            "email": "'.$email.'",
            "token": "CHANGE TOKEN",
            "emp_id": "'.$emp_id.'",
            "employeename": "'.$employeename.'"
        }';

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/purego/contact_tracer',
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

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        header("location: ../contact-tracer-account.php?add=success");

    }
?>