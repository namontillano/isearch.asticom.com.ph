<?php
$pagetitle = "Call Tree";
$pageuserlevel=array("99");
require '../core/dbcon.php';
require "../functions/session.php";
require ("../functions/userlevel.php");
$initiatestatus = "";
?>

<?php
include('purego_login/environment.php');
@session_start();

if(isset($_SESSION['user_email_address'])){ $emailAddress = $_SESSION['user_email_address']; }
if(isset($_SESSION['user_picture'])){ $userPicture = $_SESSION['user_picture']; }
if(isset($_SESSION['user_first_name'])){ $userFirstName = $_SESSION['user_first_name']; }
if(isset($_SESSION['user_last_name'])){ $userLastName = $_SESSION['user_last_name']; }

if(!isset($_SESSION['access_token'])){ header('location:'.$_ENV['REDIRECT_URI'].''); }
else {

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/attendance/getinformation',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $responseData = json_decode($response);

    $resp = array();

    foreach($responseData as $user)
    {
        array_push($resp,$user->token);
    }

    $datas = '{
        "data": {
            "notif_type": "Call_Tree"
            },
            "notification": {
                "body": "SOMEONE NEEDS YOUR ATTENTION!",
                "title": "Please click this notification to view!"
                },
                "registration_ids": '.json_encode($resp).'
            }';



            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $curl1 = curl_init();

                curl_setopt_array($curl1, array(
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
                        'Authorization: key=AAAAGtdR-KM:APA91bGvldY29V46yeVGDM_7CYvsQu6K10Fs8L2HvUbuKlxfcYPc0pP743WKMSBDlnOo936XGqTv1noqYBhowHBfKi3zssT5xcU5SqYXLyqRnBCH-1n4hJ4jQIANnrB1V0pBvY-eILk6',
                        'Content-Type: application/json'
                    ),
                ));

                $response1 = curl_exec($curl1);

                curl_close($curl1);

                $initiatestatus = "success";
            }
        }

        ?>


        <!DOCTYPE html>
        <html lang="zxx" class="js">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="author" content="">
            <meta name="description" content="">
            <link rel="shortcut icon" href="images/favicon.png">
            <title><?= APP_NAME . " | " . $pagetitle; ?></title>
            <?php include "includes/styles.php" ?>

            <!-- Include stylesheet -->
            <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
            <!-- Include the Quill library -->
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

            <style>
                .error { color: #e85347; font-size: 11px; font-style: italic; }
                div.dataTables_wrapper div.dataTables_length select { margin-left: 10px; margin-right: 10px; }
            </style>
        </head>

        <body class="nk-body npc-default has-sidebar ">
            <div class="nk-app-root">
                <div class="nk-main ">
                    <div class="nk-wrap ">
                        <?php include "includes/menu-header-sidebar.php"; ?>
                        <div class="nk-content ">
                            <div class="container-fluid">
                                <div class="nk-content-inner">
                                    <div class="nk-content-body">
                                        <div class="nk-block-head nk-block-head-sm">
                                            <div class="nk-block-between">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Call Tree</h4>
                                                </div>
                                                <div class="nk-block-head-content">
                                                    <div class="toggle-wrap nk-block-tools-toggle"><a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        <div class="toggle-expand-content" data-content="pageMenu">
                                                            <ul class="nk-block-tools g-3">
                                                                <li class="nk-block-tools-opt d-none d-sm-block"><a data-bs-toggle="modal" href="#addnewmanagement" data-bs-placement="top" class="btn btn-primary"><em class="icon ni ni-info"></em><span>Initiate Call Tree</span></a></li>
                                                                <li class="nk-block-tools-opt d-block d-sm-none"><a href="#" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" tabindex="-1" id="addnewmanagement">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Initiate Call Tree</h5>
                                                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                                                            </div>
                                                            <div class="modal-body">   
                                                                <div class="row g-3">
                                                                    <div class="col-12">
                                                                        <p class="text-center">Do you want to Initiate Call Tree to all users?</p>
                                                                    </div>
                                                                </div>                           
                                                            </div>
                                                            <div class="modal-footer bg-light justify-content-center">
                                                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                                                    <input type="submit" class="btn btn-primary swalDefaultSuccess" value="Initiate Now">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "includes/script.php" ?>

            <?php
              if(!empty($initiatestatus) && $initiatestatus == 'success'){
                echo "<script>Swal.fire( 'Success!', 'Call Tree Initiated!', 'success');</script>";
              }
              ?>

        </body>

        </html>