<?php
$pagetitle = "News & Announcements";
$pageuserlevel=array("1","2","3","4","5");


include_once "controller/onLoadController.php";
require ("../functions/userlevel.php");
$onloadData = new onLoadController();
$getAnnouncement = $onloadData->getAnnouncement();
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
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle"><a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">

                                                        <li class="nk-block-tools-opt d-none d-sm-block"><a data-bs-toggle="modal" href="#addAnnouncement" data-bs-placement="top" href="#" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add News/Announcement</span></a></li>
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
                                                            <th class="nk-tb-col tb-col-mb">
                                                                <span class="sub-text">Posted Date</span>
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
                                                                <td class="nk-tb-col" style="cursor: pointer;">
                                                                    <?php if ($data['post_pin'] == 1) { ?>
                                                                        <em class="icon ni ni-star-fill text-warning unpin" id="pin_<?php echo $data['id']?>"></em>
                                                                    <?php } else { ?>
                                                                        <em class="icon ni ni-star pin" id="pin_<?php echo $data['id']?>"></em>
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
                                                                        
                                                                    <?php } else { ?>
                                                                        <span class="badge badge-dim bg-danger">Hidden</span></td>
                                                                    <?php } ?>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-lg"><?php echo date("M d, Y", strtotime($data['post_postedon']))?></td>
                                                                <td class="nk-tb-col nk-tb-col-tools">
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

                                                                                        if($onloadData->checkPostCategories($data['post_category'])) { ?>
                                                                                            <li>
                                                                                                <a href="#" class="showUpdateModal" id="edit-news_<?php echo $data['id']; ?>">
                                                                                                    <em class="icon ni ni-edit"></em><span>Edit Announcement</span>
                                                                                                </a>
                                                                                            </li>
                                                                                        <?php } ?>





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

    <!-- add news or Announcements -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addAnnouncement">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"><a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Add News/Announcement</h5>
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
                                                if (in_array($cat['id'], $arr) && $cat['id'] != '99' && $cat['id'] != '5') { ?>
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
                                            <option value="0">Hide</option>
                                            <option value="1">Display</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-label">Thumbnail</div>
                                <input type="file" class="form-control mt-3" accept="*.jpg, *.png" name="thumbnail" id="thumbnail" placeholder="Paste the link here" >
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-label">Thumbnail</div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="thumbnail-check">
                                            <label class="custom-control-label" for="thumbnail-check">Add Thumbnail</label>
                                        </div>                  
                                    </div>
                                    <div class="col-md-8 align-center">
                                        <input type="file" class="form-control d-none mt-3" accept="image/*" name="thumbnail" id="thumbnail" placeholder="Paste the link here" >
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-label">Embed Post</div>
                                <div class="custom-control custom-switch pb-3">
                                    <input type="checkbox" class="custom-control-input" id="embed_post">
                                    <label class="custom-control-label" for="embed_post">Embed Link</label>
                                </div>
                                <input type="file" class="form-control" accept="*.jpg, *.png" name="image" id="image" placeholder="Paste the link here" >
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
    
    <!-- update selected  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="showUpdateAnnouncement">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"><a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Update News/Announcement</h5>
                    <form action="#" id="submitUpdateAnnouncement" class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="u_title">Title</label>
                                    <input type="text" class="form-control" id="u_title" name="u_title" placeholder="Title" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Type </label>
                                    <div class="form-control-wrap">
                                        <select name="u_types" id="u_types" class="form-select" data-placeholder="Select Type">
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
                                        <select name="u_category" id="u_category" class="form-select" data-placeholder="Select Category">
                                            <option value="" selected hidden >-- Select Category --</option>
                                            <?php
                                            $arr = explode(",", $_SESSION['user_level']);
                                            while ($cat = $getUserCategories2->fetch(PDO::FETCH_ASSOC)) { 
                                                if (in_array($cat['id'], $arr) && $cat['id'] != '99') { ?>
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
                                        <select name="u_status" id="u_status" class="form-select" data-placeholder="Status">
                                            <option value="0">Hide</option>
                                            <option value="1">Display</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-label">Thumbnail</div>
                                <div id="thumbnail-link" class="mb-1"></div>
                                <input type="hidden" name="ex_thumbnail" id="ex_thumbnail">
                                <input type="file" class="form-control mt-3" accept="image/*" name="u_thumbnail" id="u_thumbnail" placeholder="Paste the link here" >
                            </div>


                            <!-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-label">Thumbnail</div>
                                        <div id="thumbnail-link" class="mb-1"></div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="u_thumbnail-check">
                                            <label class="custom-control-label" for="u_thumbnail-check">Add Thumbnail</label>
                                        </div>                  
                                    </div>
                                    <div class="col-md-8 align-center">
                                        <input type="hidden" name="ex_thumbnail" id="ex_thumbnail">
                                        <input type="file" class="form-control d-none mt-3" accept="image/*" name="u_thumbnail" id="u_thumbnail" placeholder="Paste the link here" >
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-label">Embed Post</div>
                                <div id="embedded-link" class="mb-1"></div>
                                <div class="custom-control custom-switch pb-3">
                                    <input type="checkbox" class="custom-control-input" id="u_embed_post">
                                    <label class="custom-control-label" for="u_embed_post">Embed Link</label>
                                </div> 
                                <input type="hidden" name="ex_embed_post" id="ex_embed_post">
                                <input type="file" class="form-control" accept="image/*" name="u_image" id="u_image" placeholder="Paste the link here" >
                                <input type="text" class="form-control d-none" name="u_link" id="u_link" placeholder="Paste the link here" >
                                <label for="type" class="error" style="display: none;"  id="u_embed-post-error">This is required field.</label>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Content</label>
                                    <!-- Create the editor container -->
                                    <div id="u_editor" style="min-height:100px;"> </div>
                                    <label for="type" class="error" style="display: none;"  id="u_editor-error">This is required field.</label>
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
            //dataTable 


            $('#example').DataTable({ "aaSorting": [[6,'desc']],});

            var id_to_update = '';
            var astigo_status = '';
            var url = 'controller/announcementController.php';
            //value of content
            var editor = new Quill('#editor', {
                theme: 'snow',
                placeholder: `What's on your mind?`
            });
            var u_editor = new Quill('#u_editor', {
                theme: 'snow',
                placeholder: `What's on your mind?`
            });

            
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
            

            function broadcastToAstigo(title, message, image){
                let link = 'https://dev.astigo.agc.com.ph/purego_api/isearch_notification.php';
                let astigoData = {
                    "title": title,
                    "message": message,
                    "image_path": image,
                }
                
                $.SystemScript.executePost(link, astigoData).done((response) => {
                    console.log(response)
                });
            }
            
            //onchange embedded input
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

            $('#u_embed_post').change(function() {
                $('#u_image').val('');
                $('#u_link').val('');
                if(this.checked) {
                    $('#u_image').addClass('d-none');
                    $('#u_link').removeClass('d-none');
                } else {
                    $('#u_image').removeClass('d-none');
                    $('#u_link').addClass('d-none');
                } 
            });

            //toggle for choosing thumbnail type
            // $('#thumbnail-check').change(function() {
            //     if(this.checked) {
            //         $('#thumbnail').removeClass('d-none');
            //     } else {
            //         $('#thumbnail').addClass('d-none');
            //     } 
            // });

            // $('#u_thumbnail-check').change(function() {
            //     if(this.checked) {
            //         $('#u_thumbnail').removeClass('d-none');
            //     } else {
            //         $('#u_thumbnail').addClass('d-none');
            //     } 
            // });



            // adding news/announcement
            $("#submitAnnouncement").submit(function(e) {
                e.preventDefault();
            }).validate({
                rules: {
                    title: "required",
                    types : "required",
                    category : "required",
                    status : "required",
                    thumbnail : "required"
                },
                messages: {
                    title: "This is required field.",
                    types: "This is required field.",
                    category: "This is required field.",
                    status: "This is required field.",
                    thumbnail: "This is required field.",
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
                        let path = url + '?command=addAnnouncement';
                        let content = editor.root.innerHTML;
                        data.append('content', content);
                        $.SystemScript.executePost(path, data).done((response) => {
                            console.log(response.data);
                            if(response.data.message == 'success') {
                                if($('#status').val() == '1'){
                                    let image_link = `https://${window.location.hostname}/uploads/posts/${response.data.image}`;
                                    if(response.data.image == 0) {
                                        image_link = '';
                                    }
                                    let str = response.data.content;
                                    let regex = /<br\s*[\/]?>/gi;
                                    let cont = str.replace(regex, " ");
                                    console.log(image_link);
                                    broadcastToAstigo($('#title').val(), cont, image_link);
                                }
                                $.SystemScript.swalAlertMessage('Successfully',`Added Announcement/News Post`, 'success');
                                $('.swal2-confirm').click(function(){
                                    location.reload();
                                });
                                
                            }   
                            
                        });
                    }

                    $('.btn-submit').prop('disabled', false);
                    $('.btn-submit').html('Submit');
                    
                }
            });


            function validateURL(link)
            {
                if (link.indexOf("http://") == 0 || link.indexOf("https://") == 0) {
                    return true;
                }
                else{
                    return false;
                }
            }
            //showing modal for updating news/announcement
            $(document).on('click', '.showUpdateModal', function() {
                const id = this.id.split('_')[1];
                let path = url + `?command=showAnnouncement&post_id=${id}`;
                $.SystemScript.executeGet(path).done((res) => {
                    astigo_status = res.data.astigo_status; 
                    id_to_update = res.data.id;
                    $('#u_title').val(res.data.post_title);
                    $(`#u_types option[value="${res.data.post_type}"]`).prop('selected', true);
                    $(`#u_category option[value="${res.data.post_category}"]`).prop('selected', true);
                    $(`#u_status option[value="${res.data.display_status}"]`).prop('selected', true);
                    $("#ex_thumbnail").val(res.data.post_thumb);
                    if(res.data.post_thumb != 0) {
                        $("#thumbnail-link").html('');
                        $("#thumbnail-link").append(`<b>Click to view: </b><a href="../uploads/posts/${res.data.post_thumb}" target="_blank" >${res.data.post_thumb}</a>`);
                    }
                    let is_link = validateURL(res.data.post_embed);
                    $("#embedded-link").html('');
                    $("#ex_embed_post").val(res.data.post_embed);
                    $("#embedded-link").append(`<b>Click to view: </b><a href="${!is_link ? '../uploads/posts/'+res.data.post_embed : res.data.post_embed}" target="_blank" >${res.data.post_embed}</a>`);
                    u_editor.root.innerHTML = res.data.post_content;

                    
                });
                $('#showUpdateAnnouncement').modal('show');
            });

             // updating news/announcement
             $("#submitUpdateAnnouncement").submit(function(e) {
                e.preventDefault();
            }).validate({
                rules: {
                    u_title: "required",
                    u_types : "required",
                    u_category : "required",
                    u_status : "required",
                },
                messages: {
                    u_title: "This is required field.",
                    u_types: "This is required field.",
                    u_category: "This is required field.",
                    u_status: "This is required field.",
                },
                submitHandler: function(form) {
                    $('.btn-submit').prop('disabled', true);
                    $('.btn-submit').html('Please wait...');
                    $('#u_embed-post-error').css('display', 'none');
                    $('#u_editor-error').css('display', 'none');

                    $valid = true;
                    if(u_editor.root.innerHTML == '<p><br></p>') {
                        $('#u_editor-error').css('display', 'block');
                        $valid = false;
                    } 

                    if($valid){
                        if($('#u_thumbnail').val() != '') {
                            $('#ex_thumbnail').val('');
                        }

                        if($('#u_image').val() != '' || $('#u_link').val() != '') {
                            $('#ex_embed_post').val('');
                        }
                        
                        var astigo_broadcast = 0;
                        if(astigo_status == 1 && $('#u_status').val() == '1') {
                            $.SystemScript.swalConfirmMessage('Are you sure?', 
                                'This post was already broadcasted on go mobile, do you want to broadcast it again?', 'question').done(function(response) {
                                    if(response) {
                                        astigo_broadcast = 1;
                                    } 
                                    executeFunction();
                                });
                            } else {
                                executeFunction();
                            }

                            function executeFunction() {
                                var data = new FormData(form);
                                let path = url + `?command=updateAnnouncement&post_id=${id_to_update}`;
                                let u_content = u_editor.root.innerHTML;
                                data.append('content', u_content);
                                if($('#u_status').val() == '1') {
                                    astigo_broadcast = 1;
                                    data.append('astigo_status', astigo_broadcast);
                                } else {
                                    data.append('astigo_status', astigo_status);
                                }

                                $.SystemScript.executePost(path, data).done((response) => {
                                    if(response.data.message == 'success') {
                                        if(astigo_broadcast){
                                            let image_link = `https://${window.location.hostname}/uploads/posts/${response.data.image}`;
                                            if(response.data.image == 0) {
                                                image_link = '';
                                            }
                                            let str = response.data.content;
                                            let regex = /<br\s*[\/]?>/gi;
                                            let cont = str.replace(regex, " ");
                                            broadcastToAstigo($('#u_title').val(), cont, image_link);
                                        }
                                        $.SystemScript.swalAlertMessage('Successfully',`Updated a Announcement/News Post`, 'success');
                                        $('.swal2-confirm').click(function(){
                                            location.reload();
                                        });
                                    }   
                                    $('.btn-submit').prop('disabled', false);
                                    $('.btn-submit').html('Submit');
                                });
                            }

                        }

                    }
                });
});
</script>
</body>

</html>
