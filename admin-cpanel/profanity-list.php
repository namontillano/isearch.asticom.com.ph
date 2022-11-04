<?php
$pagetitle = "Profanity List";
$pageuserlevel=array("1","2","3","4","5");


include_once "controller/onLoadController.php";
require ("../functions/userlevel.php");
$onloadData = new onLoadController();

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
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap-tagsinput.css">
    <?php include "includes/styles.php" ?>

    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    
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
                                            <h3 class="nk-block-title page-title"><?php echo $pagetitle; ?></h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to <?php echo $pagetitle; ?> Page</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-12">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group mb-1">
                                                        <div class="card-title">
                                                            <h6 class="title">Current  List of Profanity </h6>
                                                            <p>Click x button to remove </p>
                                                        </div>
                                                    </div>
                                                    <div class="nav nav-tabs nav-tabs-card">
                                                    </div>
                                                    <div class="tab-content mt-0">
                                                        <form action="#" id="updateProfanities">
                                                            <div class="tab-pane active">
                                                                <div class="form-group">
                                                                    <input type="text" class="w-100 form-control" name="profanities" id="profanities" value="<?php echo $onloadData->getProfanity(); ?>" data-role="tagsinput" />
                                                                </div>
                                                            </div>
                                                            <ul>
                                                                <li style="text-align: right;"><button type="button" id="update_profanity" class="btn btn-primary btn-submit ">Update</button></li>
                                                            </ul>
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
    <script src="assets/angular.min.js"></script>
    <script src="assets/bootstrap-tagsinput.min.js"></script>
    <script>
        $(document).ready(function() {
           var url = 'controller/profanityController.php';
           $(document).on('click', '#update_profanity', function(){
                // var profanities = $('#profanities').val();
                $.SystemScript.swalConfirmMessage('Are you sure?',
                    'Do you want to update the profanity lists?', 'question').done(function(response) {
                    if (response) {
                        var data = new FormData($('#updateProfanities')[0]);
                        let path = url + `?command=updateProfanity`;
                        $.SystemScript.executePost(path, data).done((res) => {
                            if(res.data == 'success') {
                                $.SystemScript.swalAlertMessage('Successfully',`Updated the Profanity List`, 'success');
                            }  
                        });
                    }
                });
           })
        });
    </script>
</body>

</html>