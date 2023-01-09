<div class="modal fade" id="postmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-header-bg" style="justify-content: normal; width: 100%;display: block">
                <h5 class="modal-title float-start" id="exampleModalLabel" style="margin-top:5px;"><span class="info-group modal-span-announce"></span> Post</h5>
                <button type="button" class="float-end close-post-details" aria-label="Close" style="background: none; color:white;font-size: 25px;font-weight: bold; border: none"> <i class='bi bi-x'></i></button>
                <a class="opentablink" href="<?=URL_ROOT;?>post.php?view=0" style="display: block"><button type="button" class="float-end"  style="background: none; color:white;font-size: 25px;font-weight: bold; border: none"> <i class='bi bi-window-fullscreen'></i></button></a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="leftpanel">
                            <div class="info-group modal-span-content"></div>
                            <div class="info-group modal-div-photos"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- <div class="overflow-auto w-100 over-scroll view-side-right"> -->
                        <div class="w-100 over-scroll view-side-right">
                            <div id="profile-description">
                                <small class="d-block date fs-10px fw-bold">
                                    <a class="text-uppercase border-end brd-gray pe-3 me-3 color-blue5"><span class="info-group modal-span-announce"></span></a>
                                    <i class="bi bi-calendar me-1"></i>
                                    <a class="op-8"><span class="info-group modal-span-postedon"></span></a>
                                </small>                                

                                <h5 class="fw-bold mt-10 mb-10 title" id="post-title">
                                    <span class="info-group modal-span-title"></span>
                                </h5>
                                <!-- <div class="profile-description-text show-more-height"> -->
                                <div class="profile-description-text">
                                    <span class="info-group modal-span-contenttype" style="word-break: break-word;"></span>
                                </div>
                                <!-- <div class="show-more text-center">(See More)</div> -->
                            </div>
                            <div class="row text-center mt-10 border-top border-bottom pb-10 border-1 brd-gray pt-10" style="margin:0">
                                <div class="col-md-6 col-6">
                                    <div class="info-group modal-div-reacts"></div>
                                </div>
                                <div class="col-md-3 col-3 d-none">
                                    <div class="info-group"><i class='bi bi-chat-left-text'></i> <span class="modal-div-comments"></span></div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="info-group modal-div-views"></div>
                                </div>
                            </div>

                            <?php if(isset($_SESSION['google_id'])){ ?>
                                <form id="addcommentform" class="pb-20 pt-20 d-none" style='margin-right: 15px;' novalidate>
                                    <textarea placeholder="Leave your comments here..." id="comment" name="comment" rows="1" class="form-control radius-4 textarea resize-ta w-100" style="resize: none;overflow: hidden;" required></textarea>
                                    <input type="hidden" id="postid" class="postid" name="postid">
                                    <input type="hidden" id="userid" class="userid" name="userid" value="<?php echo $_SESSION['google_id'];?>">
                                    <input type="hidden" class="csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION["csrf_token"]);?>">
                                    <button type="submit" class="btn btn-sm w-100 mt-10 btn-danger btn-label ms-auto" name="submit">Post Comment</button>
                                </form>
                            <?php } else { ?>
                                <div class=" pt-20 border-top border-1 brd-gray d-none">
                                    <div class="alert alert-danger text-center" role="alert">
                                     You must be <strong>logged in</strong> to post a comment.
                                 </div>
                             </div>
                         <?php }?>
                         <div class="info-group modal-div-usercomments comments-content d-none"></div>
                         <center><a class="load-morecomments text-center mb-10 d-none">View more comments</a></center>
                         <input type="hidden" id="commentrow" value="0">
                         <input type="hidden" class="commentpostid" id="commentpostid" value="0">
                         <input type="hidden" id="commentall" class="modal-div-comments">
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>

<div class="modal fade zoomIn" id="Modaldeletecomments" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to delete your comment ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <form id="deletecommentform" novalidate>
                        <input type="hidden" class="deletecommentid" id="deletecommentid" name="deletecommentid">
                        <input type="hidden"  class="deleteuserid" id="deleteuserid" name="deleteuserid" value="<?php echo $_SESSION['google_id'];?>">
                        <input type="hidden" class="deletepostid" id="deletepostid" name="deletepostid">
                        <input type="hidden" class="csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION["csrf_token"]);?>">
                        <button type="submit" class="btn btn-danger">Yes, Delete It!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade zoomIn" id="modalviewers" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-header-bg">
                <h5 class="modal-title" id="exampleModalLabel">Viewer(s)</h5>
                <button type="button" class="btn-close close-modal-viewers" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="div-viewers-list"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade zoomIn" id="modalreactors" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-header-bg">
                <h5 class="modal-title" id="exampleModalLabel">Reactor(s)</h5>
                <button type="button" class="btn-close close-modal-reactors" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="div-reactors-list"></div>
            </div>
        </div>
    </div>
</div>