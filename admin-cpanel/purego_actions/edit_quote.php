<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $id = $_POST['edit_itemid'];
    $quoteoftheday = $_POST['quoteoftheday'];
    

    $curl = curl_init();
    
    $data = '{
        "id": "'.$id.'",
        "quote": "'.$quoteoftheday.'",
        "cdate": "'.date("Y/m/d").'"
    }';
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/quotes/dailyquotes/updatequotes/'.$id,
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
    
    echo "<script>window.location = '../quotes.php?update=success'</script>";
}
?>