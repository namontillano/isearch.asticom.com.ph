<?php
$pagetitle = "Call Tree";
$pageuserlevel = array("99");
require '../core/dbcon.php';
require "../functions/session.php";
require "../functions/userlevel.php";
$initiatestatus = "";
?>

<?php


$actionItem = '';
$pathURL = "";
$data = "";

if (isset($_POST['calltreeType'])) {
  $calltreeType = $_POST['calltreeType'];
} else {
  $calltreeType = "";
}
if (isset($_POST['disName'])) {
  $disasterName = $_POST['disName'];
} else {
  $disasterName = "";
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/attendance/getinformation',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);

$responseData = json_decode($response);

$resp = array();

foreach ($responseData as $user) {
  array_push($resp, $user->token);
}

$datas = '{
  "data": {
    "notif_type": "Call_Tree"
    },
    "notification": {
      "body": "SOMEONE NEEDS YOUR ATTENTION!",
      "title": "Please click this notification to view!"
      },
      "registration_ids": ' . json_encode($resp) . '
    }';



$datacalltree = '{
      "calltreetype": "' . $calltreeType . '",
      "disastername": "' . $disasterName . '"
    }';


// echo json_encode($resp);


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  //Save data
  $curl3 = curl_init();

  curl_setopt_array($curl3, array(
    CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/caltreeresponse/savecalltree',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $datacalltree,
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  ));

  $response3 = curl_exec($curl3);
  curl_close($curl3);
  echo json_decode($response3);



  // //Send  
  $curl1 = curl_init();

  curl_setopt_array($curl1, array(
    CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $datas,
    CURLOPT_HTTPHEADER => array(
      'Authorization: key=AAAAGtdR-KM:APA91bGvldY29V46yeVGDM_7CYvsQu6K10Fs8L2HvUbuKlxfcYPc0pP743WKMSBDlnOo936XGqTv1noqYBhowHBfKi3zssT5xcU5SqYXLyqRnBCH-1n4hJ4jQIANnrB1V0pBvY-eILk6',
      'Content-Type: application/json'
    ),
  ));

  $response1 = curl_exec($curl1);

  curl_close($curl1);
  $initiatestatus = "success";
}


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/caltreeresponse/savecalltree/',
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
if (json_encode($httpcode) == "200" || json_encode($httpcode) == "201") {
  $disaster_data = json_decode($response);
} else {
  header('location: error_pages/error_saving.html');
}




$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://f0j3ofwbmf.execute-api.ap-southeast-1.amazonaws.com/latest/items/purego/calltree/',
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
if (json_encode($httpcode) == "200" || json_encode($httpcode) == "201") {
  $calltree_data = json_decode($response);
  $calltreejson = $response;
} else {
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
    .error {
      color: #e85347;
      font-size: 11px;
      font-style: italic;
    }

    div.dataTables_wrapper div.dataTables_length select {
      margin-left: 10px;
      margin-right: 10px;
    }


    html,
    body,
    #container {
      width: 100%;
      height: 70vh;
      margin: 0;
      padding: 0;
    }

    .anychart-credits {
      display:none;
    }
  </style>
</head>

<body class="nk-body npc-default has-sidebar ">
  <div class="nk-app-root">
    <div class="nk-main ">
      <div class="nk-wrap ">
        <?php include "includes/menu-header-sidebar.php"; ?>



        <div class="nk-content">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h4 class="nk-block-title">Call Tree</h4>
                    </div>
                    <a data-bs-toggle="modal" href="#addnewmanagement" data-bs-placement="top" class="btn btn-primary  pull-end float-end float-right"><em class="icon ni ni-info"></em><span>Initiate Call Tree</span></a>
                    <div class="modal fade" tabindex="-1" id="addnewmanagement">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Initiate Call Tree</h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                          </div>
                          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="modal-body">
                              <div class="row g-3">
                                <div class="col-12">
                                  <div class="form-group">
                                    <label class="form-label" for="edit_id">Calltree Type</label>
                                    <div class="form-control-wrap">
                                      <input class="form-control" name="calltreeType" type="text" placeholder="e.g (Typhoon , Earthquake, etc.)" required />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                    <label class="form-label" for="edit_id">Catastrophe Name</label>
                                    <div class="form-control-wrap">
                                      <input class="form-control" name="disName" type="text" placeholder="Only if available" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer bg-light justify-content-center">
                              <input type="submit" class="btn btn-primary swalDefaultSuccess" value="Initiate Now">
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
                        <div class="form-group" data-select2-id="44">
                          <label class="form-label">Select Calamity</label>
                          <div class="form-control-wrap" data-select2-id="43">
                            <select class="form-select" id="calamity">
                              <option value="All Calamity" data-select2-id="5">All Calamity</option>
                              <?php 
                                if(!empty($disaster_data)) {
                                  foreach ($disaster_data as $disaster) {
                              ?>
                                  <option value="<?php echo substr($disaster->cdate, 0, 10); ?>">
                                    <?php echo $disaster->calltreetype; ?> : <?php echo $disaster->disastername; ?>
                                  </option>
                              <?php 
                                    }
                                  } ?>
                            </select>
                          </div>
                        </div>
                        <h4 class="text-center">Attended: <span id="attend_to" class="text-danger">0</span></h4>
                        <div id="container"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h4 class="nk-block-title">List of Call Tree Response (<span id="calamity_name">All Calamity</span>)</h4>
                    </div>
                  </div>
                </div>
                <div class="nk-block">
                  <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                      <div class="card-inner p-4 table-responsive">
                        <table id="example1" class="table table-hover p-0 nk-tb-list nk-tb-ulist" style="width:100%">
                          <thead>
                            <tr>
                              <th>Calamity Date</th>
                              <th>Employee Name</th>
                              <th>Employee Email</th>
                              <th>Status</th>
                              <th>Response</th>
                              <th>Supervisor Name</th>
                              <th>Supervisor Email</th>
                            </tr>
                          </thead>
                          <tbody id="call_tree">
                            <?php if (!empty($calltree_data)) { ?>
                              <?php foreach ($calltree_data as $calltree) { ?>
                                <tr>
                                  <td><?php echo substr($calltree->cdate, 0, 10); ?></td>
                                  <td><?php echo $calltree->employeename; ?></td>
                                  <td><?php echo $calltree->email; ?></td>
                                  <td>
                                    <?php
                                    if ($calltree->status == "Not Done") {
                                      echo "Ongoing";
                                    } else {
                                      echo $calltree->status;
                                    }
                                    ?>
                                      
                                    </td>
                                  <td>
                                    <?php 
                                    if($calltree->response == 'I Need Help') {
                                      echo '<span class="badge bg-danger">I Need Help</span>';
                                    } else {
                                      echo $calltree->response;
                                    }
                                    ?>
                                  </td>
                                  <td><?php echo $calltree->supervisor_email; ?></td>
                                  <td><?php echo $calltree->supervisor_name; ?></td>
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

  <?php include "includes/script.php" ?>
  <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-core.min.js"></script>
  <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-pie.min.js"></script>
  <?php
  if (!empty($initiatestatus) && $initiatestatus == 'success') {
    echo "<script>Swal.fire( 'Success!', 'Call Tree Initiated!', 'success');</script>";
  }
  ?>

  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        "aaSorting": [
          [0, 'desc']
        ],
      });
      $('#example1').DataTable({
        "aaSorting": [
          [0, 'desc']
        ],
      });


      $(function() {
        var myRows = $("#example1 tr:contains('Done')");
        console.log(myRows.length + " Done");
      });


      var calltree_list = JSON.parse(<?php echo json_encode($calltreejson) ?>);
      var tabledata = [];

      chartReload(calltree_list);
      $('#calamity').on('change', function() {
        $('#calamity_name').html($("#calamity option:selected").text()) 
        tabledata = [];
        calltree_list.forEach(item => {
          var date = (item.cdate).substring(0, 10);
          if(this.value == 'All Calamity'){
            tabledata = calltree_list;
          }
          else if(this.value == date) {
            tabledata.push(item)
          } 
        })
        reloadTable(tabledata);
        chartReload(tabledata);
      });
        
      // reloadTable();
      function reloadTable(data) {
        $('#example1').dataTable().fnClearTable();
        $('#call_tree').html('');
        data.forEach(item => {
          $( "#call_tree" ).append(`
            <tr>
              <td>${(item.cdate).substring(0, 10)}</td>
              <td>${item.employeename}</td>
              <td>${item.email}</td>
              <td>${item.status == "Not Done" ? 'Ongoing' : item.status}</td>
              <td>${item.response == "I Need Help" ? '<span class="badge bg-danger">I Need Help</span>' : item.response}</td>
              <td>${item.supervisor_email}</td>
              <td>${item.supervisor_name}</td>
            </tr>
          `);
        })
        
      }
    
      function chartReload(chart_data){
        $('#container').html('');
        var safe = 0;
        var need_help = 0;
        var attended = 0;
        var total_response = 0;
        chart_data.forEach(item => {
            if (item.response === "I'm Safe") {
                safe++;
            }
            if (item.response === "I Need Help") {
              need_help++;
            }
            if (item.status === "Done" && item.response === "I Need Help") {
              attended++;
            }
        });
        $('#attend_to').text(attended);
        total_response = safe + need_help;
        // add data
          var data = anychart.data.set([
            ['Safe', safe],
            ['Need Help', need_help],
          ]);

          // create a pie chart with the data
          var chart = anychart.pie(data);

          // set the chart radius making a donut chart
          chart.innerRadius('55%')

          // create a color palette
          var palette = anychart.palettes.distinctColors();

          // set the colors according to the brands
          palette.items([
            {color: '#1dd05d'},
            {color: '#f60000'},
            // {color: '#FFE135'},
          ]);

          // apply the donut chart color palette
          chart.palette(palette);

          // set the position of labels
          // chart.labels().format('{%x} — {%y}%').fontSize(16);

          // disable the legend
          chart.legend(true);

          // format the donut chart tooltip
          chart.tooltip().format('Respondents: {%value}');

          // create a standalone label
          var label = anychart.standalones.label();

          // configure the label settings
          label
            .useHtml(true)
            .text(
              `<span style = "color: #313136; font-size:20px;"><b style = "color:red; font-size:29px;">${total_response}</b><br/> Emergency <br/>Response </span>`
            )
            .position('center')
            .anchor('center')
            .hAlign('center')
            .vAlign('middle');

          // set the label as the center content
          chart.center().content(label);

          // set container id for the chart
          chart.container('container');

          // initiate chart drawing
          chart.draw();
      }

      

    });
  </script>

</body>

</html>