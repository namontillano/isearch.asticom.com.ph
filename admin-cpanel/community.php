<?php
$pagetitle = "Community";
$pageuserlevel=array("1","2","3","4","5");


include_once "controller/onLoadController.php";
require ("../functions/userlevel.php");
$onloadData = new onLoadController();
$getCommunity = $onloadData->getCommunity();
$getUserCategories = $onloadData->getUserCategories();
$getUserCategories2 = $onloadData->getUserCategories();

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
                                            <div class="card-inner p-4 table-responsive">
                                                <table id="example" class="table table-hover p-0 " style="">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="d-none">ID</th>
                                                            <th class=""></th>
                                                            <th class="">
                                                                <span class="sub-text">User</span>
                                                            </th>
                                                            <th class="">
                                                                <span class="sub-text">Post</span>
                                                            </th>

                                                            <th class="">
                                                                <span class="sub-text">Views</span>
                                                            </th>
                                                            
                                                            <th class="">
                                                                <span class="sub-text">Posted Date</span>
                                                            </th>
                                                            <th class="">
                                                                <span class="sub-text">Status</span>
                                                            </th>
                                                            <th class=" text-end">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($data = $getCommunity->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <tr class="nk-tb-item">
                                                                <td class="d-none"><?php echo $data['id']; ?></td>
                                                                <td class="" style="cursor: pointer;">
                                                                    <?php if ($data['post_pin'] == 1) { ?>
                                                                        <em class="icon ni ni-star-fill text-warning unpin" id="pin_<?php echo $data['id']?>"></em>
                                                                    <?php } else { ?>
                                                                        <em class="icon ni ni-star pin" id="pin_<?php echo $data['id']?>"></em>
                                                                    <?php } ?>

                                                                </td>
                                                               
                                                                <td class="">
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
                                                                </td>
                                                                <td class=""><span><?php echo substr_replace(strip_tags($data['post_content']), "...", 75); ?></span></td>
                                                                <td class=""><span><?php echo $data['post_views']; ?></span></td>
                                                                
                                                                <td class=""><?php echo date("M d, Y", strtotime($data['post_postedon']))?></td>
                                                                <td class="">
                                                                    <?php 
                                                                    if ($data['post_approval'] == 0) { 
                                                                        echo '<span class="badge bg-info m-1">For approval</span>';
                                                                    } elseif ($data['post_approval'] == 1) { 
                                                                        echo '<span class="badge bg-success  m-1">Approved</span>';
                                                                    } else { 
                                                                        echo '<span class="badge bg-danger m-1">Rejected</span>';
                                                                    }
                                                                    ?>        
                                                                </td>
                                                                <td class="-tools">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        <li>
                                                                            <div class="drodown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                        <li>
                                                                                            <a href="../post.php?view=<?php echo $data['id'] ?>" target="_blank"><em class="icon ni ni-eye"></em><span>View
                                                                                            </span></a>
                                                                                        </li>

                                                                                        <?php 
                                                                                        if ($data['post_approval'] == 0) {
                                                                                        ?>
                                                                                            <li>
                                                                                                <a href="#" class="approve_status" id="status_<?php echo $data['id']?>">
                                                                                                    <em class="icon ni ni-check"></em><span>Approve</span>
                                                                                                </a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="del_status" id="del_<?php echo $data['id']?>">
                                                                                                    <em class="icon ni ni-trash"></em><span>Delete</span>
                                                                                                </a>
                                                                                            </li>
                                                                                        <?php
                                                                                        } elseif ($data['post_approval'] == 1) {
                                                                                        ?>
                                                                                        <?php if ($data['deleted_status'] == 1) { ?>
                                                                                            <li>
                                                                                                <a href="#" class="undel_status" id="del_<?php echo $data['id']?>">
                                                                                                    <em class="icon ni ni-trash"></em><span>Retrieve</span>
                                                                                                </a>
                                                                                            </li>
                                                                                        <?php } else { ?>
                                                                                            <li>
                                                                                                <a href="#" class="del_status" id="del_<?php echo $data['id']?>">
                                                                                                    <em class="icon ni ni-trash"></em><span>Delete</span>
                                                                                                </a>
                                                                                            </li>
                                                                                        <?php } ?>                                                                                        
                                                                                        <?php
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

            $('#example').DataTable({ "aaSorting": [[5,'desc'],[0,'desc']]});


            var url = 'controller/announcementController.php';



            $(document).on('click', '.pin', function() {
                const id = this.id.split('_')[1]; 
                $(`#${this.id}`).removeClass('ni-star pin').addClass('ni-star-fill text-warning unpin');
                let status_to = 1;
                pinStatus(id, status_to);
            });

            $(document).on('click', '.unpin', function() {
                const id = this.id.split('_')[1]; 
                $(`#${this.id}`).addClass('ni-star pin').removeClass('ni-star-fill text-warning unpin');
                let status_to = 0;
                pinStatus(id, status_to);
            });

            const pinStatus = (id, status) => {
                let path = url + `?command=updatePinStatus&post_id=${id}&status=${status}`;
                $.SystemScript.executeGet(path).done((res) => {
                    console.log(res);
                });
            }


            // delete
            $(document).on('click', '.del_status', function() {
                const id = this.id.split('_')[1]; 
                $.SystemScript.swalConfirmMessage('Are you sure?', 
                    'Do you want to delete this post?', 'question').done(function(response) {
                        if(response) {
                            let status_to = 1;
                            delStatus(id, status_to, 'Deleted');
                        }
                    });

                });

            $(document).on('click', '.undel_status', function() {
                const id = this.id.split('_')[1]; 
                $.SystemScript.swalConfirmMessage('Are you sure?', 
                    'Do you want to Retrieve this post?', 'question').done(function(response) {
                        if(response) {
                            let status_to = 0;
                            delStatus(id, status_to, 'Retrieved');
                        }
                    });
                });

            const delStatus = (id, status, action) => {
                let path = url + `?command=updateDelStatus&post_id=${id}&status=${status}`;
                $.SystemScript.executeGet(path).done((res) => {
                    console.log(res);
                    if(res.data.message == 'success') {                   
                        $.SystemScript.swalAlertMessage('Successfully',`Post Successfully ${action}`, 'success');
                        $('.swal2-confirm').click(function(){
                            location.reload();
                        });
                    }
                });
            }



            $(document).on('click', '.approve_status', function() {
                const id = this.id.split('_')[1]; 
                $.SystemScript.swalConfirmMessage('Are you sure?', 
                    'Do you want to approve this post?', 'question').done(function(response) {
                        if(response) {
                            let status_to = 1;
                            approveStatus(id, status_to, 'Approved');
                        }
                    });

            });

            $(document).on('click', '.reject_status', function() {
                const id = this.id.split('_')[1]; 
                $.SystemScript.swalConfirmMessage('Are you sure?', 
                    'Do you want to reject this post?', 'question').done(function(response) {
                        if(response) {
                            let status_to = 2;
                            approveStatus(id, status_to, 'Rejected');
                        }
                    });

            });

          
            const approveStatus = (id, status, action) => {
                let path = url + `?command=updateApproveStatus&post_id=${id}&status=${status}`;
                $.SystemScript.executeGet(path).done((res) => {
                    console.log(res);
                    if(res.data.message == 'success') {                   
                        $.SystemScript.swalAlertMessage('Successfully',`Post Successfully ${action}`, 'success');
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
