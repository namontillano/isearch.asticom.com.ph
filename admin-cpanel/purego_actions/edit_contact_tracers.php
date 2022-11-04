<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $token = $_POST['edit_id'];
    $id = $_POST['edit_itemid'];
    $emp_id = $_POST['edit_empid'];
    $employeename = $_POST['edit_empname'];
    $email = $_POST['edit_email'];
    

    $curl = curl_init();
    
    $data = '{
        "id": "'.$id.'",
        "token": "'.$token.'",
        "emp_id": "'.$emp_id.'",
        "employeename": "'.$employeename.'",
        "email": "'.$email.'"
    }';
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/purego/contact_tracer/update_tracer/'.$emp_id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => $data,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    
    echo "<script>window.location = '../contact-tracer-account.php?update=success'</script>";
}
?>