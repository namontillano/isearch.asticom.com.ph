<?php
if(!isset($_COOKIE['broadcastdigioffice'])) {
    ?>
    <div class='modal fade zoomIn' id='broadcastdigiofficemodal' data-bs-backdrop='static' tabindex='-1' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content'>
                <form id='digiofficereminderform' novalidate>
                    <div class='modal-header modal-header-bg'>
                        <h5 class='modal-title' id='exampleModalLabel'>DigiOffice Reminder</h5>
                        <button type='submit' class='float-end btn-close submitdigiofficereminderform'></button>
                    </div>
                    <div class='modal-body'>
                        <div class='mt-2 text-center'>
                            <lord-icon src='https://cdn.lordicon.com/gsqxdxog.json' trigger='loop' colors='primary:#f7b84b,secondary:#f06548' style='width:100px;height:100px'></lord-icon>
                            <h2 class='mb-10' style='color:#252569'>HELLO, ASTI FAM!</h2>
                            <p class='text-muted mx-4 mb-0'>
                                <b style='color:#252569'>Punch IN</b> your attendance to DigiOffice Now!<br>
                                and before you LEAVE...<br>
                                Don't forget to <b style='color:#252569'>Punch OUT</b>
                            </p>
                        </div>
                        <div class='d-flex gap-2 justify-content-center mt-4 mb-2'>
                            <a href='https://asticom.digiofficeapp.com/#/Login' target='_blank' class='btn rounded-pill bg-blue4 fw-bold mt-10 text-white'>Punch In to DigiOffice Now!</a>
                        </div>
                    </div>
                    <div class='modal-footer d-block text-center'>
                        <div class='form-check'>
                            <input type='hidden' value='0' name='remindmecheckbox'/>
                            <input class='form-check-input float-none' type='checkbox' value='1' id='remindmecheckbox' name='remindmecheckbox'>
                            <label class='form-check-label' for='remindmecheckbox'>
                                Don't show this and remind me again tommorow!
                            </label>
                        </div>
                        <input type='hidden' class='csrf_token' name='csrf_token' value='<?php echo htmlspecialchars($_SESSION['csrf_token'])?>'>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type='text/javascript'> $(function () { setTimeout(function () { $('#broadcastdigiofficemodal').modal('show'); }, 3000); }); </script>";


    <script type='text/javascript'>
        $('#digiofficereminderform').submit(function (e) {
            e.preventDefault();
            var digiofficereminderform = $(this).serialize();
            $.ajax({
                method: 'POST',
                url: 'functions/reminders.php',
                data: digiofficereminderform,
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        alert_status(response.status);
                        renew_token();
                    } else {
                        if (response.status == 'reminders-success') {
                            $('#broadcastdigiofficemodal').modal('hide');
                        } else if (response.status == 'reminders-close') {
                            $('#broadcastdigiofficemodal').modal('hide');
                        } else {
                            alert_status(response.status);
                            renew_token();
                        }
                    }
                }
            });
        });
    </script>
<?php } ?>