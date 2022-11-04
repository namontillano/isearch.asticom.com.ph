<?php
$pagetitle = "Home";
$pageuserlevel=array("1","2","3","4","5");
require '../core/dbcon.php';
require "../functions/session.php";
require ("../functions/userlevel.php");


include_once "controller/onLoadController.php";
$onloadData = new onLoadController();
$getAnnouncement = $onloadData->getAnnouncement();
$getUserCategories = $onloadData->getUserCategories();

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
        .error {
            color: #e85347;
            font-size: 11px;
            font-style: italic;
        }
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
                                            <h4 class="nk-block-title">News & Announcements</h4>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle"><a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">

                                                        <li class="nk-block-tools-opt d-none d-sm-block"><a data-bs-toggle="modal" href="#addAnnouncement" data-bs-placement="top" href="#" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add
                                                                    Announcement</span></a></li>
                                                        <li class="nk-block-tools-opt d-block d-sm-none"><a href="#" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a></li>
                                                    </ul>
                                                </div>
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
                                                            <th class="nk-tb-col d-none">ID</th>
                                                            <th class="nk-tb-col"></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                                                            <th class="nk-tb-col tb-col-lg">
                                                                <span class="sub-text">Type</span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-lg">
                                                                <span class="sub-text">Category</span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-lg">
                                                                <span class="sub-text">Views</span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-mb">
                                                                <span class="sub-text">Status</span>
                                                            </th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($data = $getAnnouncement->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <tr class="nk-tb-item">
                                                                <td class="d-none"><?php echo $data['id']; ?></td>
                                                                <td class="nk-tb-col">
                                                                    <?php if ($data['post_pin'] == 1) { ?>
                                                                        <em class="icon ni ni-star-fill text-warning"></em>
                                                                    <?php } else { ?>
                                                                        <em class="icon ni ni-star"></em>
                                                                    <?php } ?>

                                                                </td>
                                                                <td class="nk-tb-col"><a href="#" class="project-title">
                                                                        <div class="project-info">
                                                                            <strong class="text-dark"><?php echo $data['post_title']; ?></strong>
                                                                        </div>
                                                                    </a></td>
                                                                <td class="nk-tb-col tb-col-lg"><span><?php echo $data['post_type']; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-lg"><span><?php echo $data['post_category']; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-lg"><span><?php echo $data['post_views']; ?></span></td>
                                                                <td class="nk-tb-col tb-col-mb">
                                                                    <?php if ($data['display_status'] == 1) { ?>
                                                                        <span class="badge badge-dim bg-success">Displayed</span>
                                                                </td>
                                                            <?php } else { ?>
                                                                <span class="badge badge-dim bg-danger">Hidden</span></td>
                                                            <?php } ?>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <li>
                                                                        <div class="drodown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li>
                                                                                        <a href="project-kanban.html"><em class="icon ni ni-eye"></em><span>View
                                                                                            </span></a>
                                                                                    </li>
                                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit
                                                                                                Announcement</span></a></li>
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

    

    <div class="modal fade" tabindex="-1" role="dialog" id="addAnnouncement">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"><a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Add Announcement</h5>
                    <form action="#" id="submitAnnouncement" class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Type </label>
                                    <div class="form-control-wrap">
                                        <select name="types" id="types" class="form-select" data-placeholder="Select Type">
                                            <option value="" selected hidden >-- Select Type --</option>
                                            <option value="Announcements">Announcements</option>
                                            <option value="News">News</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Categories</label>
                                    <div class="form-control-wrap">
                                        <select name="category" id="category" class="form-select" data-placeholder="Select Category">
                                                <option value="" selected hidden >-- Select Category --</option>
                                                <?php
                                                    $arr = explode(",", $_SESSION['user_level']);
                                                    while ($cat = $getUserCategories->fetch(PDO::FETCH_ASSOC)) { 
                                                        if (in_array($cat['id'], $arr)) { ?>
                                                            <option value="<?php echo $cat['categories_code'] ?>"><?php echo $cat['categories_name'] ?></option>
                                                <?php   }  
                                                    }  
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <div class="form-control-wrap">
                                        <select name="status" id="status" class="form-select" data-placeholder="Status">
                                            <option value="1">Display</option>
                                            <option value="0">Hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-label">Thumbnail</div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="thumbnail-check">
                                            <label class="custom-control-label" for="thumbnail-check">Add Thumbnail</label>
                                        </div>                  
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control d-none mt-3" accept="image/*" name="thumbnail" id="thumbnail" placeholder="Paste the link here" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-label">Embed Post</div>
                                <div class="custom-control custom-switch pb-3">
                                    <input type="checkbox" class="custom-control-input" id="embed_post">
                                    <label class="custom-control-label" for="embed_post">Embed Link</label>
                                </div>
                                <input type="file" class="form-control" name="image" id="image" placeholder="Paste the link here" >
                                <input type="text" class="form-control d-none" name="link" id="link" placeholder="Paste the link here" >
                                <label for="type" class="error" style="display: none;"  id="embed-post-error">This is required field.</label>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Content</label>
                                    <!-- Create the editor container -->
                                    <div id="editor" style="min-height:100px;"> </div>
                                    <label for="type" class="error" style="display: none;"  id="editor-error">This is required field.</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li><button type="submit" class="btn btn-primary btn-submit">Submit</button></li>
                                    <li><a href="#" class="link link-light" data-bs-dismiss="modal">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/script.php" ?>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            var editor = new Quill('#editor', {
                theme: 'snow',
                placeholder: `What's on your mind?`
            });

            $('#embed_post').change(function() {
                $('#image').val('');
                $('#link').val('');
                if(this.checked) {
                    $('#image').addClass('d-none');
                    $('#link').removeClass('d-none');
                } else {
                    $('#image').removeClass('d-none');
                    $('#link').addClass('d-none');
                } 
            });

            $('#thumbnail-check').change(function() {
                if(this.checked) {
                    $('#thumbnail').removeClass('d-none');
                } else {
                    $('#thumbnail').addClass('d-none');
                } 
            });

            $("#submitAnnouncement").submit(function(e) {
                e.preventDefault();
            }).validate({
                rules: {
                    title: "required",
                    types : "required",
                    category : "required",
                    status : "required",
                },
                messages: {
                    title: "This is required field.",
                    types: "This is required field.",
                    category: "This is required field.",
                    status: "This is required field.",
                },
                submitHandler: function(form) {
                    $('.btn-submit').prop('disabled', true);
                    $('.btn-submit').html('Please wait...');
                    $('#embed-post-error').css('display', 'none');
                    $('#editor-error').css('display', 'none');
                
                    $valid = true;
                    if($('#image').val() == '' && $('#link').val() == '') {
                        $('#embed-post-error').css('display', 'block');
                        $valid = false;
                    } 
                    if(editor.root.innerHTML == '<p><br></p>') {
                        $('#editor-error').css('display', 'block');
                        $valid = false;
                    } 
                    
                    if($valid){
                        var data = new FormData(form);
                        let url = 'controller/announcementController.php';
                        let path = url + '?command=addAnnouncement';
                        let content = editor.root.innerHTML;
                        data.append('content', content);
                        $.SystemScript.executePost(path, data).done((response) => {
                            console.log(response.data);
                            if(response.data == 'success') {
                                $.SystemScript.swalAlertMessage('Successfully',`Added Announcement/News Post`, 'success');
                                $('.swal2-confirm').click(function(){
                                    location.reload();
                                })
                            }   
                            $('.btn-submit').prop('disabled', false);
                            $('.btn-submit').html('Submit');
                        });
                    }
                    
                }
            });
        });
    </script>
</body>

</html>