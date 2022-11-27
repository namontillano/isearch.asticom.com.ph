    <div class="modal fade" id="addcommunitypostmodal" tabindex="-1" aria-labelledby="addcommunitypostmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modal-header-bg">
                    <h5 class="modal-title" id="addcommunitypostmodalLabel">What's on your mind, <?php echo $_SESSION['google_first_name'];?>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addcommunitypostform" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea id="communitypostmessage" class="form-control" rows="5" placeholder="Your message here..." name="communitypostmessage" style="resize: none"></textarea>
                            </div>
                            <div class="col-md-12 mt-3">
                                <input id="communitypostattach" type="file" accept=".jpg, .jpeg" class="form-control communitypostattach" name="communitypostattach">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION["csrf_token"]);?>">
                                <center><button class="btn bg-blue4 fw-bold text-white addcommunitypostsubmit" type="submit" >Post</button></center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="postmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modal-header-bg" style="justify-content: normal; width: 100%;display: block">
                <h5 class="modal-title float-start" id="exampleModalLabel" style="margin-top:5px;">Community Post</h5>
                <button type="button" class="float-end close-post-details" aria-label="Close" style="background: none; color:white;font-size: 25px;font-weight: bold; border: none"> <i class='bi bi-x'></i></button>
                <a class="opentablink" href="<?=URL_ROOT;?>post.php?view=0" style="display: block"><button type="button" class="float-end"  style="background: none; color:white;font-size: 25px;font-weight: bold; border: none"> <i class='bi bi-window-fullscreen'></i></button></a>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info">
                                <div class="d-flex align-items-center justify-content-between op-9">
                                    <div class="d-flex">
                                        <span class="info-group modal-span-googlepic"></span>
                                        <h6 class="fw-bold" style="color: #000;"><span class="info-group modal-span-firstname"></span> <span class="info-group modal-span-lastname"></span></h6>
                                    </div>
                                    <div class="d-flex">
                                        <small><span class="text-muted"><i class="bi bi-calendar me-1"></i> <span class="info-group modal-span-postedon"></span></span></small>
                                    </div>

                                </div>
                                <div id="profile-description" style="margin-top:10px;margin-bottom:10px">
                                    <div class="profile-description-text">
                                        <span class="info-group modal-span-contenttype"></span>
                                    </div>
                                </div>


                                <div class="community-leftpanel">
                                    <div class="info-group modal-span-content"></div>
                                    <div class="info-group modal-div-photos"></div>
                                </div>


                                <div class="row text-center mt-10 pb-10 pt-10 border-bottom postembedtyle border-top brd-gray border-1" style="margin:0">
                                    <div class="col-md-6">
                                        <div class="info-group modal-div-reacts"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-group"><i class='bi bi-chat-left-text'></i> <span class="modal-div-comments"></span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-group modal-div-views"></div>
                                    </div>
                                </div>
                                <?php if(isset($_SESSION['google_id'])){ ?>
                                    <form id="addcommentform" class="pb-20 pt-20" novalidate>
                                        <textarea placeholder="Leave your comments here..." id="comment" name="comment" rows="1" class="form-control radius-4 textarea resize-ta w-100" style="resize: none;overflow: hidden;" required></textarea>
                                        <input type="hidden" id="postid" class="postid" name="postid">
                                        <input type="hidden" id="userid" class="userid" name="userid" value="<?php echo $_SESSION['google_id'];?>">
                                        <input type="hidden" class="csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION["csrf_token"]);?>">
                                        <button type="submit" class="btn btn-sm w-100 mt-10 btn-danger btn-label ms-auto" name="submit">Post Comment</button>
                                    </form>
                                <?php } else { ?>
                                    <div class=" pt-20 border-top border-1 brd-gray">
                                        <div class="alert alert-danger text-center" role="alert">
                                            You must be <strong>logged in</strong> to post a comment.
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="overflow-auto w-100 over-scroll view-side-right">
                                <div class="info-group modal-div-usercomments comments-content"></div>
                                <center><a class="load-morecomments text-center mb-10">View more comments</a></center>
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


