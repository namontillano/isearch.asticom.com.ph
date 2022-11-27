<?php
$pagetitle = "Post Comments";
$pageuserlevel = array("1", "2", "3", "4", "5");


include_once "controller/onLoadController.php";
require("../functions/userlevel.php");
$onloadData = new onLoadController();
$getComment = $onloadData->getComment();
?>

<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="../assets/custom/img/favicon.png" title="Favicon" sizes="16x16" />
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
                                                            <th class="nk-tb-col">Date</th>
                                                            <th class="nk-tb-col"><span class="sub-text">Users</span></th>
                                                            <th class="nk-tb-col ">
                                                                <span class="sub-text">Message</span>
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
                                                        while ($data = $getComment->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <tr>
                                                                <td class="nk-tb-col"><?php echo $data['comment_date_posted'] ?></td>
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
                                                                                <?php echo $data['google_email_address'] ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                    <span style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="<?php echo $data['comment_message']; ?>">
                                                                        <?php echo substr_replace(strip_tags($data['comment_message']), "...", 75) ?>
                                                                    </span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                    <?php 
                                                                    if ($data['comment_status'] == 0) { 
                                                                        echo '<span class="badge bg-danger m-1">Hidden</span>';
                                                                    }
                                                                    else { 
                                                                        echo '<span class="badge bg-success m-1">Active</span>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        <li>
                                                                            <div class="drodown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                     
                                                                                        
                                                                                        <li>
                                                                                            <a href="../post.php?view=<?php echo $data['comment_post_id'] ?>" target="_blank" >
                                                                                                <em class="icon ni ni-eye"></em><span>View Post</span>
                                                                                            </a>
                                                                                            <?php 

                                                                                            if ($data['comment_status'] == 0) { 
                                                                                                echo '<a style="cursor: pointer;" class="unhide_comment" id="'.$data['comment_row_id'].'">
                                                                                                <em class="icon ni ni-edit"></em><span>Unhide Comment</span>
                                                                                                </a>';
                                                                                            }
                                                                                            else { 
                                                                                                echo '<a style="cursor: pointer;" class="hide_comment" id="'.$data['comment_row_id'].'">
                                                                                                <em class="icon ni ni-edit"></em><span>Hide Comment</span>
                                                                                                </a>';
                                                                                            }
                                                                                            ?>
                                                                                            
                                                                                        </li>
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
            $('#example').DataTable({ "aaSorting": [[0,'desc']],});
            var url = 'controller/announcementController.php';
            var url = 'controller/commentsController.php';

            $(document).on('click', '.hide_comment', function(){
                const id = this.id;
                $.SystemScript.swalConfirmMessage('Are you sure?', 
                    'Do you want to hide this comment?', 'question').done(function(response) {
                        if(response) {
                            let status = 0;
                            let path = url + `?command=updateCommentStatus&comment_id=${id}&status=${status}`;
                            let action = "Hide";
                            updateStatus(path, action);
                        }
                    });
                });

            $(document).on('click', '.unhide_comment', function(){
                const id = this.id;
                $.SystemScript.swalConfirmMessage('Are you sure?', 
                    'Do you want to unhide this comment?', 'question').done(function(response) {
                        if(response) {
                            let status = 1;
                            let path = url + `?command=updateCommentStatus&comment_id=${id}&status=${status}`;
                            let action = "Unhide";
                            updateStatus(path, action);
                        }
                    });
                });

            const updateStatus  = (path, action) => {
                $.SystemScript.executeGet(path).done((res) => {
                    console.log(res);
                    if(res.data.message == 'success') {
                        $.SystemScript.swalAlertMessage('Successfully',`Comment has been ${action}`, 'success');
                        
                        $('.swal2-confirm').click(function(){
                            location.reload();
                        });
                    }
                });
            }

        });
    </script>
</body>

</html>
