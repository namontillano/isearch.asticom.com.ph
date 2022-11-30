<?php
$pagetitle = "Daily Tips";
$pageuserlevel=array("99");
require '../core/dbcon.php';
require "../functions/session.php";
require ("../functions/userlevel.php");

?>

<?php
include('purego_functions/generate_uuid.php');


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/viber_cms/dailytips',
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
                      <h4 class="nk-block-title">Daily Tips</h4>
                    </div>
                    <a data-bs-toggle="modal" href="#addnewtips" data-bs-placement="top" class="btn btn-primary  pull-end float-end float-right"><em class="icon ni ni-plus"></em><span>Add New Tips</span></a>
                    <div class="modal fade" tabindex="-1" id="addnewtips">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Add New Tips</h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                          </div>
                          <form method="post" id="myForm" action="purego_actions/add_tips.php">
                            <div class="modal-body">   
                              <div class="row g-3">
                                <div class="col-12">
                                  <div class="form-group">
                                    <label class="form-label" for="textQoute">Tips</label>
                                    <div class="form-control-wrap">
                                      <textarea id="textTips" name="textTips" class="form-control" rows="5" placeholder="Enter Tips..." spellcheck="false" required></textarea>
                                    </div>
                                  </div>
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
                      <div class="card-inner p-4 table-responsive">
                        <table id="example" class="table table-hover p-0 ">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Tips of the day</th>
                              <th>Date Created</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($user_data)) { ?>
                              <?php foreach($user_data as $user){ ?>
                                <tr>
                                  <td><?php echo ++$counter; ?></td>
                                  <td><?php echo $user->dailytips; ?></td>
                                  <td><?php echo $user->createdAt; ?></td>
                                  <td>
                                    <ul class="nk-tb-actions gx-1">
                                      <li>
                                        <div class="drodown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                          <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                              <li><a class="action-edit" data-bs-toggle="modal" href="#modal-edit" data-bs-placement="top" data-id="<?php echo $user->id; ?>" data-value="<?php echo $user->dailytips; ?>"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
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
        <form method="POST" action="purego_actions/edit_tips.php">
          <div class="modal-body">   
            <div class="row g-3">
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="tipsoftheday">Tips</label>
                  <div class="form-control-wrap">
                    <input type="hidden" class="form-control" id="edit_itemid" name="edit_itemid" readonly>
                    <textarea id="tipsoftheday" name="tipsoftheday" class="form-control" rows="5" placeholder="Enter Tips..." spellcheck="false" required></textarea>
                  </div>
                </div>
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


  <div class="modal fade" tabindex="-1" id="modal-delete">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete</h5>
          <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
        </div>
        <form method="POST" action="purego_actions/delete_tips.php">
          <div class="modal-body">   
            <div class="row g-3">
              <div class="col-12">
                <input type="hidden" id="deleteid" name="deleteid" ?>
                <p class="text-center">Are you sure do you want to delete this daily tips?</p>
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
    echo "<script>Swal.fire( 'Success!', 'New tips added!', 'success');</script>";
  } elseif(!empty($_GET['delete']) && $_GET['delete'] == 'success'){
    echo "<script>Swal.fire( 'Success!', 'Daily tips deleted!', 'success');</script>";
  } elseif(!empty($_GET['update']) && $_GET['update'] == 'success'){
    echo "<script>Swal.fire( 'Success!', 'Daily tips updated!', 'success');</script>";
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
      var tips = $(this).attr('data-value');
      $('#edit_itemid').val(id);
      $('#tipsoftheday').val(tips);
    });

    $('.action-delete').on('click',function() {
      var delID = $(this).attr('data-id');
      console.log(delID);
      $('#deleteid').val(delID);
    });

  </script>
</body>

</html>