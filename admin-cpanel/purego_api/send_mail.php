<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

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

    $curl1 = curl_init();

    curl_setopt_array($curl1, array(
    CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/purego/contact_tracer',
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
        array_push($resp,$user->email);
    }

    // $senderTo = "pbmacandili@asticom.com.ph";


    // // $senderSubject = trim($data->senderSubject);
    // // $senderMessage = trim($data->senderMessage);
    // $senderSubject = "TEST SUBJECT";
    // $senderMessage = "TEST MESSAGE";

    // // Always set content-type when sending HTML email
    // $headers = "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // // More headers
    // $headers .= 'From: <astigomobile@asticom.com.ph>' . "\r\n";
    // // $headers .= 'Cc: myboss@example.com' . "\r\n";

    // $result = mail($senderTo,$senderSubject,$senderMessage,$headers);

    // if(!$result)
    // {
    //     $returnData = [
    //         'success' => 0,
    //         'status' => 204,
    //         'message' => 'Something went wrong sending your email to recipients'
    //     ];    
    // }
    // else
    // {
    //     $returnData = [
    //         'success' => 1,
    //         'status' => 201,
    //         'message' => 'Email Sent'
    //     ];
    // }


    // $sender = 'noreply@asticom.com';
    // $recipient = 'pioloestrella@gmail.com';

    // $subject = "php mail test";
    // $message = "php test message";
    // $headers = 'From:' . $sender;

    // if (mail($recipient, $subject, $message, $headers))
    // {
    //     echo "Message accepted";
    // }
    // else
    // {
    //     echo "Error: Message not accepted";
    // }

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pbmacandili@asticom.com.ph';                     //SMTP username
        $mail->Password   = 'barcon143!!';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreply@astigomobile.com', 'Mailer');
        $mail->addAddress('pmestrella@asticom.com.ph', 'Piolo Estrella');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



}

echo json_encode($returnData);