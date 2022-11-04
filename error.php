<?php
if (!empty($_GET["code"])) {
  switch ($_GET["code"]) {
    case '401':
    $code = '401';
    $title = 'Access Denied';
    $desc = 'We are sorry, you are not allowed to access this page.';
    break;
    case "403":
    $code = "403";
    $title = "Access Forbidden";
    $desc = "Access to this resource of the server is denied!";
    break;
    case '404':
    $code = '404';
    $title = 'Page Not Found';
    $desc = 'We are sorry, but the page you requested was not found.';
    break;
    case '500':
    $code = '500';
    $title = 'Server Error';
    $desc = 'We are sorry, but the page you requested is too busy.';
    break;
    
    default:
    header('Location: error.php?code=404');
    exit;
  }
} else {
  header('Location: error.php?code=404');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Error <?php echo $code;?></title>
  <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
  <style type="text/css">
    * { -webkit-box-sizing: border-box; box-sizing: border-box; }
    body { padding: 0; margin: 0; }
    #error { position: relative; height: 100vh; }
    #error .error { position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%); }
    .error { max-width: 520px; width: 100%; line-height: 1.4; text-align: center; }
    .error .error-code { position: relative; height: 240px; }
    .error .error-code h1 { font-family: 'Montserrat', sans-serif; font-size: 85px; font-weight: 900; text-transform: uppercase; letter-spacing: 0px; margin-top: -10px;margin-bottom: 0px; color: black;}
    .error .error-code h3 { font-family: 'Cabin', sans-serif; position: relative; font-size: 16px; font-weight: 700; text-transform: uppercase; color: black; margin: 0px; letter-spacing: 3px; padding-left: 6px;}
    .error h2 { font-family: 'Cabin', sans-serif; font-size: 20px; font-weight: 400; text-transform: uppercase; color: black; margin-top: 0px; margin-bottom: 25px; }
  </style>
</head>
<body>
  <div id="error">
    <div class="error">
      <div class="error-code">
        <h3><?php echo $title;?></h3>
        <h1><?php echo $code;?></h1>
        <h2><?php echo $desc;?></h2>
      </div>
      
    </div>
  </div>
</body>
</html>
