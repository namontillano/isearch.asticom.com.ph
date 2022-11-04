<?php
$pagetitle = "User Management";
$pageuserlevel = array("1", "2", "3", "4", "5");


include_once "controller/onLoadController.php";
require("../functions/userlevel.php");
$onloadData = new onLoadController();
$getUserAccount = $onloadData->getUserAccount();
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
                                            <h4 class="nk-block-title"><?php echo $pagetitle; ?></h4>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to <?php echo $pagetitle; ?> Page</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-4">
                                                <table id="example" class="table table-hover p-0 nk-tb-list nk-tb-ulist" style="width:100%">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col">ID</th>
                                                            <th class="nk-tb-col"><span class="sub-text">Users</span></th>
                                                            <th class="nk-tb-col">
                                                                <span class="sub-text">Email</span>
                                                            </th>
                                                            <th class="nk-tb-col ">
                                                                <span class="sub-text">Access Category</span>
                                                            </th>
                                                            <th class="nk-tb-col ">
                                                                <span class="sub-text">Astigo Access</span>
                                                            </th>
                                                            <th class="nk-tb-col">
                                                                <span class="sub-text">Status</span>
                                                            </th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        while ($data = $getUserAccount->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td class="nk-tb-col"><?php echo $data['id'] ?></td>
                                                            <td class="nk-tb-col">
                                                                <div class="nk-tb-col">
                                                                    <div class="user-card">
                                                                        <div class="user-avatar bg-primary">
                                                                            <img src="<?php echo $data['google_image'] ?>" alt="">
                                                                        </div>
                                                                        <div class="user-info">
                                                                            <span class="tb-lead h6">
                                                                                <?php echo $data['google_first_name'].' '.$data['google_last_name'] ?> 
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col"><?php echo $data['google_email_address'] ?></td>
                                                            <td class="nk-tb-col">
                                                                <?php 
                                                                    $arr = explode(",", $data['user_level']);
                                                                    if (in_array(1, $arr)) { 
                                                                        echo '<span class="badge bg-light m-1">Broadcast</span>';
                                                                    }
                                                                    if (in_array(2, $arr)) { 
                                                                        echo '<span class="badge bg-warning m-1">HR</span>';
                                                                    }
                                                                    if (in_array(3, $arr)) { 
                                                                        echo '<span class="badge bg-info m-1">Recruitment</span>';
                                                                    }
                                                                    if (in_array(4, $arr)) { 
                                                                        echo '<span class="badge bg-dark m-1">Finance</span>';
                                                                    }
                                                                    if (in_array(5, $arr)) { 
                                                                        echo '<span class="badge bg-gray m-1">CyberTech</span>';
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <?php
                                                                    if (in_array(99, $arr)) { 
                                                                        echo '<span class="badge bg-success m-1">Yes</span>';
                                                                    } 
                                                                ?>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="nk-tb-col tb-col-md">
                                                                    <?php 
                                                                       
                                                                        if ($data['status'] == 0) { 
                                                                            echo ' <span class="tb-status text-success">Active</span>';
                                                                        } else if($data['status'] == 1) {
                                                                            echo ' <span class="tb-status text-danger">Blocked</span>';
                                                                        }
                                                                    ?>
                                                                   
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <li>
                                                                        <div class="drodown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                   
                                                                                    
                                                                                    <li>
                                                                                        <a href="#" class="showUpdateModal" id="">
                                                                                            <em class="icon ni ni-edit"></em><span>Edit Access</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <?php 
                                                                                        if($data['google_id'] != $_SESSION['google_id']) {
                                                                                            if ($data['status'] == 0) { 
                                                                                                echo'<li>
                                                                                                        <a href="#" class="block" id="'.$data['google_id'].'">
                                                                                                        <em class="icon ni ni-na"></em>Block User</span>
                                                                                                        </a>
                                                                                                    </li>';
                                                                                            } else if($data['status'] == 1) {
                                                                                                echo'<li>
                                                                                                        <a href="#" class="unblock" id="'.$data['google_id'].'"">
                                                                                                        <em class="icon ni ni-check-circle"></em><span>Unblock User</span>
                                                                                                        </a>
                                                                                                    </li>';
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                          <?php } ?>
                                                    </tbody>
                                                </table>
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
    <script>
        $(document).ready(function() {
            //dataTable 
            $('#example').DataTable();

        });
    </script>
</body>

</html>