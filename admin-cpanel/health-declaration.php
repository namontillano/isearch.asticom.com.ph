<?php
$pagetitle = "Health Declaration";
$pageuserlevel=array("99");
require '../core/dbcon.php';
require "../functions/session.php";
require ("../functions/userlevel.php");
?>

<?php
include('purego_functions/generate_uuid.php');
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/purego/reportpositive/',
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
                      <h4 class="nk-block-title">Health Declaration</h4>
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
                              <th>Work Status</th>
                              <th>Employee ID</th>
                              <th>Employee Name</th>
                              <th>Date</th>
                              <th>Status</th>
                              <th>Address</th>
                              <th>Email Address</th>
                              <th>Segment</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($user_data)) { ?>
                              <?php foreach($user_data as $user){ ?>
                                <tr>
                                  <td><?php echo $user->workstat; ?></td>
                                  <td><?php echo $user->emp_id; ?></td>
                                  <td><?php echo $user->employeename; ?></td>
                                  <td><?php echo $user->cdate; ?></td>
                                  <td><?php echo $user->status; ?></td>
                                  <td><?php echo $user->address; ?></td>
                                  <td><?php echo $user->email; ?></td>
                                  <td><?php echo $user->bsegment; ?></td>
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
        <form method="POST" action="purego_actions/edit_quote.php">
          <div class="modal-body">   
            <div class="row g-3">
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="quoteoftheday">Tips</label>
                  <div class="form-control-wrap">
                    <input type="hidden" class="form-control" id="edit_itemid" name="edit_itemid" readonly>
                    <textarea id="quoteoftheday" name="quoteoftheday" class="form-control" rows="5" placeholder="Enter Quotes..." spellcheck="false" required></textarea>
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
        <form method="POST" action="purego_actions/delete_quote.php">
          <div class="modal-body">   
            <div class="row g-3">
              <div class="col-12">
                <input type="hidden" id="deleteid" name="deleteid" ?>
                <p class="text-center">Are you sure do you want to delete this quotes?</p>
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
    echo "<script>Swal.fire( 'Success!', 'New quotes added!', 'success');</script>";
  } elseif(!empty($_GET['delete']) && $_GET['delete'] == 'success'){
    echo "<script>Swal.fire( 'Success!', 'Daily quotes deleted!', 'success');</script>";
  } elseif(!empty($_GET['update']) && $_GET['update'] == 'success'){
    echo "<script>Swal.fire( 'Success!', 'Daily quotes updated!', 'success');</script>";
  }
  ?>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });

    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>

  <script type="text/javascript">
    $('.action-edit').on('click', function(){
      var id = $(this).attr('data-id');
      var quote = $(this).attr('data-value');

      $('#edit_itemid').val(id);
      $('#quoteoftheday').val(quote);
    });

    $('.action-delete').on('click',function() {
      var delID = $(this).attr('data-id');
      console.log(delID);
      $('#deleteid').val(delID);
    });
  </script>
</body>

</html>