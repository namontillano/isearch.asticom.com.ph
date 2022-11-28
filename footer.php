<footer class="style-4">
    <div class="container">
        <div class="section-head text-center style-4">
            <h2 class="mb-10"> Stay <span> Connected </span> </h2>
            <p>Join Into Our Hub.</p>
            
        </div>
        <section class="community mt-20 style-4">
            <div class="container">
             
                <div class="content">
                    <a href="https://www.facebook.com/asticominc/" target="_blank" class="commun-card">
                        <div class="icon">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div class="inf">
                            <h5>Facebook</h5>
                            <p>@asticominc</p>
                        </div>
                    </a>

                    <a href="https://www.instagram.com/asticominc/?hl=en" target="_blank" class="commun-card">
                        <div class="icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="inf">
                            <h5>Instagram</h5>
                            <p>@asticominc</p>
                        </div>
                    </a>
                    
                    <a href="https://www.linkedin.com/company/asticominc/mycompany/verification/" target="_blank" class="commun-card">
                        <div class="icon">
                            <i class="fab fa-linkedin"></i>
                        </div>
                        <div class="inf">
                            <h5>LinkedIn</h5>
                            <p>@asticominc</p>
                        </div>
                    </a>
                    

                    <a href="https://open.spotify.com/show/3m0alLSyGNEwVdv3w8XvF2?si=8bcfd53c2d85416e&nd=1" target="_blank" class="commun-card">
                        <div class="icon">
                            <i class="fab fa-spotify"></i>
                        </div>
                        <div class="inf">
                            <h5>Spotify</h5>
                            <p>Listen on Spotify</p>
                        </div>
                    </a>


                    <a href="https://www.tiktok.com/@asticominc" target="_blank" class="commun-card">
                        <div class="icon">
                            <img src="<?=ASSETS;?>custom/img/tiktok.png">
                        </div>
                        <div class="inf">
                            <h5>TikTok</h5>
                            <p>@asticominc</p>
                        </div>
                    </a>

                    

                </div>
            </div>
        </section>
        <div class="foot mt-10">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <img src="<?=ASSETS;?>custom/img/asticom-group-of-companies.png" alt="">
                    </div>
                </div>
                <div class="col-lg-10">
                    <ul class="links">
                        <li><a class="<?=($pagetitle=="Home") ? 'active':''; ?>" href="<?=URL_ROOT;?>index.php">Home</a></li>

                        <?php
                        if ($subsidiaries == true) {
                            ?>
                            <li><a class="<?=($pagetitle=="Subsidiaries") ? 'active':''; ?>" href="<?=URL_ROOT;?>subsidiaries.php">Subsidiaries</a></li>
                        <?php }
                        ?>

                        <li><a class="<?=($pagetitle=="Community") ? 'active':''; ?>" href="<?=URL_ROOT;?>community.php">Community</a></li>

                        <li><a class="<?=($pagetitle=="HR") ? 'active':''; ?>" href="<?=URL_ROOT;?>hr.php">HR</a></li>
                        <li><a class="<?=($pagetitle=="Recruitment") ? 'active':''; ?>" href="<?=URL_ROOT;?>recruitment.php">Recruitment</a></li>
                        <li><a class="<?=($pagetitle=="Finance") ? 'active':''; ?>" href="<?=URL_ROOT;?>finance.php">Finance</a></li>
                        <li><a class="<?=($pagetitle=="CyberTech") ? 'active':''; ?>" href="<?=URL_ROOT;?>cybertech.php">CyberTech</a></li>
                        <li><a class="<?=($pagetitle=="Marketing") ? 'active':''; ?>" href="<?=URL_ROOT;?>marketing.php">Marketing</a></li>
                        <li><a class="<?=($pagetitle=="About") ? 'active':''; ?>" href="<?=URL_ROOT;?>about.php">About</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <!-- <div class="dropdown">
                        <button class="icon-25 dropdown-toggle p-0 border-0 bg-transparent rounded-circle img-cover" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?=ASSETS;?>img/lang.png" alt="" class="me-2">
                            <small>English</small>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">English</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="copywrite text-center">
            <small class="small">
                &copy; <script>document.write(new Date().getFullYear())</script> Copyrights by <a href="<?=DEV_URL;?>" target="_blank" class="fw-bold text-decoration-underline"><?=DEV_COMPANY;?></a> All Rights Reserved.
            </small>
        </div>
    </div>

    <img src="<?=ASSETS;?>img/footer/footer_4_wave.png" alt="" class="wave">
</footer>

