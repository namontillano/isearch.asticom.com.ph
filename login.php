<?php
  require 'core/dbcon.php';

  $database = new Connection();
  $db = $database->open();

  session_regenerate_id(true);

  require_once 'vendor/autoload.php';
  $google_client = new Google_Client();
  $google_client->setClientId('192477195005-higoth89l4ce2gs6if56lblkg75pcq5j.apps.googleusercontent.com');
  $google_client->setClientSecret('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');
  $google_client->setRedirectUri('http://localhost/isearch.asticom.com.ph/login.php');
  $google_client->addScope('email');
  $google_client->addScope('profile');

  if(!isset($_SESSION['access_token'])) {
   $google_login_btn = '<a href="'.$google_client->createAuthUrl().'"><img src="https://www.tutsmake.com/wp-content/uploads/2019/12/google-login-image.png" /></a>';
  } else {
    header("Location: index.php");
  }

  if(isset($_GET["code"])) {
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
   
   if(!isset($token['error'])) {
    $google_client->setAccessToken($token['access_token']);
    $_SESSION['access_token'] = $token['access_token'];
    $google_service = new Google_Service_Oauth2($google_client);
    $data = $google_service->userinfo->get();

    $stmt = $db->query("SELECT * FROM accounts WHERE google_email_address = '".$data['email']."'");
    $countUser = $stmt->rowCount();
    if($countUser === 0) {
      $smtp=$db->prepare("INSERT INTO accounts (google_id, google_first_name, google_last_name, google_email_address, google_image)
      values (:id, :fname, :lname, :email, :photo)");
      $smtp->execute(array(
        ':id' => $data['id'],
        ':fname' => $data['given_name'],
        ':lname' => $data['family_name'],
        ':email' => $data['email'],
        ':photo' => $data['picture']
      ));

    }
    
    $cookie_google_id = $data['id'];
    setcookie('authenticated', $cookie_google_id, time() + (86400 * 30), "/");
 
    header("Location: index.php");
    exit();
   }
 
  }
?>
<?php $pagetitle="Login";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title><?=APP_NAME." | ".$pagetitle;?></title>
  <link rel="shortcut icon" href="<?=ASSETS;?>custom/img/favicon.png" title="Favicon" sizes="16x16" />
  <link rel="stylesheet" href="<?=ASSETS;?>css/lib/bootstrap.min.css">
  <link rel="stylesheet" href="<?=ASSETS;?>vendor/bootstrap-icons%401.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?=ASSETS;?>css/style.css" />
  <link rel="stylesheet" href="<?=ASSETS;?>custom/css/style.css" />
  <style type="text/css">
    html,
    body { height: 100%;
    }
    .parent {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .child {
      width: 350px;
    }
  </style>
</head>
<body class="login">
  <div class="parent">
<div class="child">
    <img class="img-fluid" src="<?=ASSETS;?>custom/img/asticom-white.png">
    <img class="img-fluid login-sub" src="<?=ASSETS;?>custom/img/companies-white.png">
    <div class="login-form">
      <p>Login your account to continue.</p>
        <a href="<?php echo $google_client->createAuthUrl(); ?>"  class="google-btn mt-10">
          <div class="google-icon-wrapper">
            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
          </div>
          <p class="btn-text"><b>Sign in with google</b></p>
        </a>
    </div>
    <p class="text-white"><small class="small">&copy; <script>document.write(new Date().getFullYear())</script> Copyrights by <a href="<?=DEV_URL;?>" target="_blank" class="fw-bold text-decoration-underline"><?=DEV_COMPANY;?></a>.<br>All Rights Reserved.</small></p>

</div>
</div>
   <script src="<?=ASSETS;?>js/lib/bootstrap.bundle.min.js"></script>
</body>
</html>