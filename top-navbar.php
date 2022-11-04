    <div class="top-navbar style-4">
        <div class="container" style="position: initial;">
            <div class="row">
                <div class="col-md-4">
                   <div class="searchbar">
                      <input type="text" class="searchbarTerm" name="keyword" id="findkeyword" placeholder="What are you looking for?">
                      <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                      <div id="search_items"></div>
                  </div>

              </div>

              <div class="col-md-4">
                <div class="text-white text-center">
                    <a title="Asticom DigiOffice" href="https://www.google.com/url?q=https%3A%2F%2Fasticom.digiofficeapp.com&sa=D&sntz=1&usg=AOvVaw1FosEvbo8H1tzoEvFXzZpt" target="_blank" class="btn sm-butn bg-white py-0 px-2 me-2 fs-10px"><img src="<?=ASSETS?>custom/img/digioffice-button.png" style="max-height: 30px;"></a>
                    <a title="i-Serve" href="https://www.google.com/url?q=https%3A%2F%2Fasticom.atlassian.net%2Fservicedesk%2Fcustomer%2Fportals&amp;sa=D&amp;sntz=1&amp;usg=AOvVaw1cqRpYE4pblmFQd9FP844M" data-url="https://www.google.com/url?q=https%3A%2F%2Fasticom.atlassian.net%2Fservicedesk%2Fcustomer%2Fportals&amp;sa=D&amp;sntz=1&amp;usg=AOvVaw1cqRpYE4pblmFQd9FP844M" target="_blank" class="btn sm-butn bg-white py-0 px-2 me-2 fs-10px"><img src="<?=ASSETS?>custom/img/i-serve-button.png" style="max-height: 30px;"></a>
                </div>
            </div>

            <div class="col-md-4">
                <?php
                if(!isset($_SESSION['google_id'])){
                    ?>
                    <span class="usernav text-end dropdown-toggle" id="usermenubutton" data-bs-toggle="dropdown" aria-expanded="false" style="padding-top:5px">
                        <i class="bi bi-person text-white"></i>
                        <b class="text-white fs-12px" >Guest</b>
                    </span>
                    <ul class="dropdown-menu" aria-labelledby="usermenubutton" style="border-radius: 5px;">
                        <li><a class="dropdown-item" href="<?=URL_ROOT;?>login.php">Sign In</a></li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <span class="usernav text-end dropdown-toggle" id="usermenubutton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="icon-30 rounded-circle p-0 border-0 bg-transparent text-white " src="<?php echo $_SESSION["google_image"]; ?>">
                        <b class="text-white fs-12px" ><?php echo $_SESSION["google_first_name"]; ?> <?php echo $_SESSION["google_last_name"]; ?></b>
                    </span>
                    <ul class="dropdown-menu" aria-labelledby="usermenubutton" style="border-radius: 5px;">
                        <?php if (array_intersect(array(1,2,3,4,5,99), preg_split ("/\,/", trim($_SESSION['user_level'])))){ ?>
                            <li><a class="dropdown-item" href="<?=URL_ROOT;?>admin-cpanel/news-and-announcement.php">Dashboard</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item" href="<?=URL_ROOT;?>logout.php">Logout</a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>