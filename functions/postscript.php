<script type="text/javascript">
    $(document).ready(function(){

        $('.load-morecomments').click(function(){
            var commentrow = Number($('#commentrow').val());
            var commentallcount = Number($('#commentall').val());
            commentrow = commentrow + 5;

            if(commentrow <= commentallcount){
                $("#commentrow").val(commentrow);
                $.ajax({
                    url: 'functions/loadmorecomment.php',
                    type: 'post',
                    data: {commentrow:commentrow},
                    beforeSend:function(){
                        $(".load-morecomments").text("Loading...");
                    },
                    success: function(response){

                        setTimeout(function() {
                            $(".commentlist:last").after(response).show().fadeIn("slow");

                            var commentrowno = commentrow + 5;

                            if(commentrowno > commentallcount){

                                $('.load-morecomments').text("Hide comments");
                            }else{
                                $(".load-morecomments").text("View more comments");
                            }
                        }, 2000);
                    }
                });
            } else {
                $('.load-morecomments').text("Loading...");
                setTimeout(function() {
                    $('.commentlist:nth-child(5)').nextAll('.commentlist').remove().fadeIn("slow");
                    $("#commentrow").val(0);
                    $('.load-morecomments').text("View more comments");
                }, 2000);
            }
        });
    });
</script>

<script type="text/javascript">

  function calcHeight(value) {
      let numberOfLineBreaks = (value.match(/\n/g) || []).length;
      let newHeight = 38 + numberOfLineBreaks * 20;
      return newHeight;
  }
  
  let textarea = document.querySelector(".resize-ta");
  textarea.addEventListener("keyup", () => {
      textarea.style.height = calcHeight(textarea.value) + "px";
  });






  $(".show-more").click(function () {
    if($(".profile-description-text").hasClass("show-more-height")) {
        $(this).text("(See Less)");
    } else {
        $(this).text("(See More)");
    }
    $(".profile-description-text").toggleClass("show-more-height");
});


  $(document).on('click', '.view-post-details', function () {
    var postid = $(this).data('postid'), posttitle = $(this).data('posttitle'), posttype = $(this).data('posttype'), postsrc = $(this).data('postsrc'), postannounce = $(this).data('postannounce'), postcontent = $(this).data('postcontent'), postpostedby = $(this).data('postpostedby'), postpostedon = $(this).data('postpostedon');

    $(".modal-span-title").html('<a href="post.php?view='+postid+'">'+posttitle+'</a>');
    if (posttype == 'img') {
        $(".modal-span-content").html('<center><a href="'+postsrc+'"  title="'+posttitle+'" style="cursor:zoom-in" data-fancybox="gallery"><img class="img-fluid" src="'+postsrc+'" style=""></a></center>');
    } else {
        $(".modal-span-content").html('<div class="ratio ratio-4x3"><iframe src="'+postsrc+'" title="'+posttitle+'" id="iframecontent"></iframe></div><a href="'+postsrc+'" data-fancybox="gallery"></a>');
        var iframe = document.getElementById("iframecontent");
        iframe.onload = function(){
            iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
        }

    }

    $(".modal-span-announce").html(postannounce);
    $(".modal-span-contenttype").html(postcontent);
    $(".modal-span-postedby").html(postpostedby);
    $(".modal-span-postedon").html(postpostedon);
    $(".postid").val(postid);

    fetchreacts(postid);
    fetchcomments(postid);
    fetchviews(postid);
    fetchgallery(postid);

    $('#postmodal').modal('show');

});



  $(document).on('click', '.close-post-details', function () {
    $('#postmodal').modal('hide');
    $(".modal-span-content").html('');
});





  function fetchviews(postid) {
    $.ajax({
        method: 'POST',
        url: 'functions/fetchviews.php',
        data: {
            postid: postid
        },
        success: function (views) {
            $('.modal-div-views').html(views);
        }
    });
}

function fetchcomments(postid) {
    $.ajax({
        method: 'POST',
        url: 'functions/fetchusercomments.php',
        data: {
            postid: postid
        },
        success: function (usercomments) {
            $('.modal-div-usercomments').html(usercomments);
        }
    });

    $.ajax({
        method: 'POST',
        url: 'functions/fetchcomments.php',
        data: {
            postid: postid
        },
        success: function (comments) {
            $('.modal-div-comments').html(comments);
            $('.modal-div-comments').val(comments);

            if (comments == "0") {
                $('.load-morecomments').addClass('d-none');
            } else {
                $('.load-morecomments').removeClass('d-none');
            }
        }
    });

}


function fetchgallery(postid) {
    $.ajax({
        method: 'POST',
        url: 'functions/fetchphotos.php',
        data: {
            postid: postid
        },
        success: function (gallery) {
            $('.modal-div-photos').html(gallery);
        }
    });

}




function fetchreacts(postid) {
    $.ajax({
        method: 'POST',
        url: 'functions/fetchreacts.php',
        data: {
            postid: postid
        },
        success: function (reacts) {
            $('.modal-div-reacts').html(reacts);
        }
    });
}

$(document).on('click', '.reactstatus', function () {
    var action = $(this).data('action'), postid = $(this).data('postid'),type = $(this).data('type');

    $.ajax({
        method: 'POST',
        url: 'functions/reactstatus.php',
        data: {
            action: action, postid: postid, type: type
        },
        success: function (reactstatus) {
            if (reactstatus == 'true') {
               fetchreacts(postid);
           } else {
            console.log(reactstatus);
        }
    }
});

});







$('#addcommentform').submit(function (e) {
    e.preventDefault();
    var addcommentform = $(this).serialize();
    $.ajax({
        method: 'POST',
        url: 'functions/addcomment.php',
        data: addcommentform,
        dataType: 'json',
        success: function (response) {
            if (response.error) {
                alert_status(response.status);
                renew_token();
            } else {
                if (response.status == 'addcomment-success') {
                    $('#addcommentform').removeClass('was-validated');
                    $('#addcommentform').find('button:submit').attr('disabled', true);
                    $('#addcommentform')[0].reset();
                    alert_status(response.status);
                    fetchcomments(response.postid);
                } else if (response.status == 'badwords-exist') {
                    $('#comment').val(response.comment);
                    alert_status(response.status);
                } else {
                    alert_status(response.status);
                    renew_token();
                }
            }
        }
    });
});


$(document).on('click', '.signinrequired', function () {
    alert_status('sign-in-required');
});

$(document).on('click', '.deletecomment', function () {
    var deletecommentid = $(this).data('deletecommentid'), deletepostid = $(this).data('deletepostid');

    $('#deletecommentid').val(deletecommentid);
    $('#deletepostid').val(deletepostid);

});


$(document).on('click', '.editcomment', function () {
    var editcommentid = $(this).data('editcommentid'), editpostid = $(this).data('editpostid'), editmessage = $(this).data('editmessage');


    if ($('div.activeedit').length == '0') {
     $('#commentcontainer'+editcommentid).addClass( "activeedit");
 } else {
    $('div.activeedit').html(editmessage);
    $('div.activeedit').removeClass( "activeedit");
    $('#commentcontainer'+editcommentid).addClass( "activeedit");
}

$('#commentcontainer'+editcommentid).html('<form id="editcommentform" class="pb-20" novalidate><textarea placeholder="Leave your comments here..." id="editcommentarea" name="editcommentarea" rows="1" class="form-control radius-4 resize-ta-edit" style="resize: none; width:100%; overflow: hidden;display: inline-block;" required>'+editmessage+'</textarea><input type="hidden" id="editcommentid" class="editcommentid" name="editcommentid" value="'+editcommentid+'"><input type="hidden" id="editpostid" class="editpostid" name="editpostid" value="'+editpostid+'"><input type="hidden" class="csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION["csrf_token"]);?>"><button type="submit" class="btn btn-sm w-100 mt-10 btn-danger btn-label ms-auto" name="submit">Update Comment</button></form>');


function calcHeightedit(value) {
  let numberOfLineBreaksedit = (value.match(/\n/g) || []).length;
  let newHeightedit = 38 + numberOfLineBreaksedit * 20;
  return newHeightedit;
}

let textareaedit = document.querySelector(".resize-ta-edit");
textareaedit.addEventListener("keyup", () => {
  textareaedit.style.height = calcHeightedit(textareaedit.value) + "px";
});

$('#editcommentarea').focus();


$('#editcommentform').submit(function (e) {
    e.preventDefault();
    var editcommentform = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: 'functions/editcomment.php',
        data: editcommentform,
        dataType: 'json',
        success: function (response) {
            if (response.error) {
                alert_status(response.status);
                renew_token();
            } else {
                if (response.status == 'editcomment-success') {
                    alert_status(response.status);
                    fetchcomments(response.postid);
                } else if (response.status == 'badwords-exist') {
                    $('#editcommentarea').val(response.editcommentarea);
                    alert_status(response.status);
                } else {
                    alert_status(response.status);
                    renew_token();
                }
            }
        }
    });
});

});




$('#deletecommentform').submit(function (e) {
    e.preventDefault();
    var deletecommentform = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: 'functions/deletecomment.php',
        data: deletecommentform,
        dataType: 'json',
        success: function (response) {
            if (response.error) {
                alert_status(response.status);
                renew_token();
            } else {
                if (response.status == 'deletecomment-success') {
                    $('#Modaldeletecomments').modal('hide');
                    document.getElementById('deletecommentform').reset();
                    alert_status(response.status);
                    fetchcomments(response.postid);
                } else {
                    alert_status(response.status);
                    renew_token();
                }
            }
        }
    });
});


function renew_token() {
    $.ajax({
        method: 'POST',
        url: 'functions/renewtoken.php',
        success: function (token) {
            if (token == false) {
                renew_token();
            } else {
                $('.csrf_token').val(token);
            }
        }
    });
}

$('#addcommentform, #editcommentform').each(
    function () { $(this).data('serialized', $(this).serialize())}).on('change input',
    function () { $(this).find('button:submit').attr('disabled', $(this).serialize() == $(this).data('serialized'));
}).find('button:submit').attr('disabled', true);


    function alert_status(status) {
        switch (status) {
            case "request-invalid": type = "error"; header = "Error!"; message = "Invalid request. Please refresh your page and try again!"; break;
            case "request-error": type = "error"; header = "Error!"; message = "Error processing your request. Please refresh your page and try again!"; break;
            case "request-errorfields": type = "error"; header = "Error!"; message = "Please check your form and try again!"; break;
            case "sign-in-required": type = "error"; header = "Login Required!"; message = "You must be logged in to post a reaction."; break;
            case "addcomment-success": type = "success"; header = "Success!"; message = "Comment has been added."; break;
            case "editcomment-success": type = "success"; header = "Success!"; message = "Comment has been updated."; break;
            case "deletecomment-success": type = "success"; header = "Success!"; message = "Comment has been deleted."; break;
            case "badwords-exist": type = "error"; header = "Error!"; message = "Invalid comment. Your comment contains words that are forbidden!"; break;
            

            default: type = "error"; header = "Error!"; message = "No error description found."; break;
        }

        Swal.fire(header, message, type);
    }
</script>

