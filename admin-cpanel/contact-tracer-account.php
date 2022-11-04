<?php
$pagetitle = "Contact Tracer Account";
$pageuserlevel=array("99");
require '../core/dbcon.php';
require "../functions/session.php";
require ("../functions/userlevel.php");

?>

<?php
include('purego_login/environment.php');
include('purego_functions/generate_uuid.php');
@session_start();

if(isset($_SESSION['user_email_address'])){ $emailAddress = $_SESSION['user_email_address']; }
if(isset($_SESSION['user_picture'])){ $userPicture = $_SESSION['user_picture']; }
if(isset($_SESSION['user_first_name'])){ $userFirstName = $_SESSION['user_first_name']; }
if(isset($_SESSION['user_last_name'])){ $userLastName = $_SESSION['user_last_name']; }

if(!isset($_SESSION['access_token'])){ header('location:'.$_ENV['REDIRECT_URI'].''); }
else {

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/purego/contact_tracer',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
  ));

  $response = curl_exec($curl);
  $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);
  if(json_encode($httpcode) == "200" || json_encode($httpcode) == "201")
  {
    $user_data = json_decode($response);
    $counter = 0;
  }
  else
  {
    header('location: error_pages/error_saving.html');  
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
                      <h4 class="nk-block-title">Contact Tracer Account</h4>
                    </div>
                    <div class="nk-block-head-content">
                      <div class="toggle-wrap nk-block-tools-toggle"><a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                          <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt d-none d-sm-block"><a data-bs-toggle="modal" href="#addnewcontacttracer" data-bs-placement="top" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New Contact Tracer Account</span></a></li>
                            <li class="nk-block-tools-opt d-block d-sm-none"><a href="#" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" tabindex="-1" id="addnewcontacttracer">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Add New Contact Tracer Account</h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                          </div>
                          <form method="post" id="myForm" action="purego_actions/add_contact_tracers.php">
                            <div class="modal-body"> 
                              <div class="row g-3">
                                <div class="col-12">
                                  <div class="form-group">
                                    <label class="form-label" for="email">Email Address</label>
                                    <div class="form-control-wrap">
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required/>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                    <label class="form-label" for="emp_id">Employee ID</label>
                                    <div class="form-control-wrap">
                                      <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Enter Employee ID" required/>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                    <label class="form-label" for="employeename">Employee Name</label>
                                    <div class="form-control-wrap">
                                      <input type="text" class="form-control" id="employeename" name="employeename" placeholder="Enter Employee Name" required/>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <p class="text-muted">Note: Please let them generate their fcm token inside the go mobile application AFTER filling out this form. Contact Tracers will be given a temporary FCM Token that needed to be replaced right away.</p>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer bg-light justify-content-center">
                              <input type="submit" class="btn btn-primary swalDefaultSuccess">
                            </div>
                          </form>
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
                            <tr>
                              <th>#</th>
                              <th class="d-none">Token</th>
                              <th>Email Address</th>
                              <th>Employee Id</th>
                              <th>Employee Name</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($user_data)) { ?>
                              <?php foreach($user_data as $user){ ?>
                                <tr>
                                  <td><?php echo ++$counter; ?></td>
                                  <td class="d-none"><?php echo $user->token; ?></td>
                                  <td><?php echo $user->email; ?></td>
                                  <td><?php echo $user->emp_id; ?></td>
                                  <td><?php echo $user->employeename; ?></td>
                                  <td>
                                    <ul class="nk-tb-actions gx-1">
                                      <li>
                                        <div class="drodown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                          <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                              <li><a class="action-edit" data-bs-toggle="modal" href="#modal-edit" data-bs-placement="top" data-id="<?php echo $user->token; ?>" data-value-id="<?php echo $user->id; ?>" data-value-empid="<?php echo $user->emp_id; ?>" data-value-email="<?php echo $user->email;?>" data-value-empname="<?php echo $user->employeename; ?>"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                              <li><a class="action-delete" data-bs-toggle="modal" href="#modal-delete" data-bs-placement="top" data-id="<?php echo $user->id; ?>"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                            </ul>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </td>
                                </tr>
                              <?php } ?>
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



  <div class="modal fade" tabindex="-1" id="modal-edit">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit</h5>
          <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
        </div>
        <form method="POST" action="purego_actions/edit_contact_tracers.php">
          <div class="modal-body">   
            <div class="row g-3">
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="edit_id">Token</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="edit_id" name="edit_id" placeholder="Enter Email Address"/>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="edit_empid">Employee ID</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="edit_empid" name="edit_empid" placeholder="Enter Email Address" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="edit_empname">Employee Name</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="edit_empname" name="edit_empname" placeholder="Enter Employee ID" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="edit_email">Email Address</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="edit_email" name="edit_email" placeholder="Enter Employee Name" readonly/>
                  </div>
                </div>
              </div>
            </div>                           
          </div>
          <div class="modal-footer bg-light justify-content-center">
            <input type="hidden" class="form-control" id="edit_itemid" name="edit_itemid" />
            <input type="submit" class="btn btn-primary swalDefaultSuccess">
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" tabindex="-1" id="modal-delete">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete</h5>
          <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
        </div>
        <form method="POST" action="purego_actions/delete_contact_tracers.php">
          <div class="modal-body">   
            <div class="row g-3">
              <div class="col-12">
                <input type="hidden" id="deleteid" name="deleteid" ?>
                <p class="text-center">Are you sure do you want to delete this contact tracer?</p>
              </div>
            </div>                           
          </div>
          <div class="modal-footer bg-light justify-content-center">
            <input type="submit" class="btn btn-primary swalDefaultSuccess">
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php include "includes/script.php" ?>

  <?php
  if(!empty($_GET['add']) && $_GET['add'] == 'success'){
    echo "<script>Swal.fire( 'Success!', 'New contact tracer added!', 'success');</script>";
  } elseif(!empty($_GET['delete']) && $_GET['delete'] == 'success'){
    echo "<script>Swal.fire( 'Success!', 'Contact tracer deleted!', 'success');</script>";
  } elseif(!empty($_GET['update']) && $_GET['update'] == 'success'){
    echo "<script>Swal.fire( 'Success!', 'Contact tracer updated!', 'success');</script>";
  }
  ?>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

  <script type="text/javascript">
    $('.action-edit').on('click', function(){
      var id = $(this).attr('data-id');
      var email = $(this).attr('data-value-email');
      var empid = $(this).attr('data-value-empid');
      var empname = $(this).attr('data-value-empname');
      var itemid = $(this).attr('data-value-id');

      $('#edit_id').val(id);
      $('#edit_email').val(email);
      $('#edit_itemid').val(itemid);
      $('#edit_empid').val(empid);
      $('#edit_empname').val(empname);

    });

    $('.action-delete').on('click',function() {
      var delID = $(this).attr('data-id');
      console.log(delID);
      $('#deleteid').val(delID);
    });
  </script>
</body>

</html>