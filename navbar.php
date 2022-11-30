    <nav class="navbar navbar-expand-lg navbar-light style-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="<?=ASSETS;?>custom/img/asticom-group-of-companies.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 text-uppercase">
                <li class="nav-item"><a class="nav-link <?=($pagetitle=="Home") ? 'active':''; ?>" href="<?=URL_ROOT;?>index.php">Home</a></li>

                <?php
                if (preg_match('/\b@acquiro\b/', $_SESSION['google_email_address'])) { $acquiro = true; } else { $acquiro = false; }
                if (preg_match('/\b@absi\b/', $_SESSION['google_email_address'])) { $absi = true; } else { $absi = false; }
                if (preg_match('/\b@finsi\b/', $_SESSION['google_email_address'])) { $finsi = true; } else { $finsi = false; }
                if (preg_match('/\b@hxc\b/', $_SESSION['google_email_address'])) { $hxc = true; } else { $hxc = false; }

                if (array_intersect(array(5), preg_split ("/\,/", trim($_SESSION['user_level'])))){
                    $subsidiaries = true;
                    $acquiro = true;
                    $absi = true;
                    $finsi = true;
                    $hxc = true;
                } else {
                    if ($acquiro == true || $absi == true || $finsi == true || $hxc == true) {
                        $subsidiaries = true;
                    } else {
                        $subsidiaries = false;
                    }
                }

                if ($subsidiaries == true) {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?=($pagetitle=="Subsidiaries" || $pagetitle=="Acquiro" || $pagetitle=="ABSI" || $pagetitle=="FINSI" || $pagetitle=="HCX") ? 'active':''; ?>" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Subsidiaries
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <?php
                        if ($acquiro == true) {
                        ?>
                        <li><a class="dropdown-item <?=($pagetitle=="Acquiro") ? 'active':''; ?>" href="<?=URL_ROOT;?>acquiro.php"> Acquiro </a></li>
                        <?php
                        }
                        ?> 
                        <?php
                        if ($absi == true) {
                        ?>
                        <li><a class="dropdown-item <?=($pagetitle=="ABSI") ? 'active':''; ?>" href="<?=URL_ROOT;?>absi.php"> ABSI </a></li>
                        <?php
                        }
                        ?> 
                        <?php
                        if ($finsi == true) {
                        ?>
                        <li><a class="dropdown-item <?=($pagetitle=="FINSI") ? 'active':''; ?>" href="<?=URL_ROOT;?>finsi.php"> FINSI </a></li>
                        <?php
                        }
                        ?> 
                        <?php
                        if ($hxc == true) {
                        ?>
                        <li><a class="dropdown-item <?=($pagetitle=="HCX") ? 'active':''; ?>" href="<?=URL_ROOT;?>hcx.php"> HCX </a></li>
                        <?php
                        }
                        ?> 
                    </ul>
                </li>
                <?php } ?> 


                <!-- <li class="nav-item"><a class="nav-link <?=($pagetitle=="Community") ? 'active':''; ?>" href="<?=URL_ROOT;?>community.php">Community</a></li> -->
                
                <li class="nav-item"><a class="nav-link <?=($pagetitle=="HR" || $pagetitle=="HR Offboarding") ? 'active':''; ?>" href="<?=URL_ROOT;?>hr.php">HR</a></li>
                <li class="nav-item"><a class="nav-link <?=($pagetitle=="Recruitment") ? 'active':''; ?>" href="<?=URL_ROOT;?>recruitment.php">Recruitment</a></li>
                <li class="nav-item"><a class="nav-link <?=($pagetitle=="Finance") ? 'active':''; ?>" href="<?=URL_ROOT;?>finance.php">Finance</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?=($pagetitle=="CyberTech" || $pagetitle=="Atlassiann Status" || $pagetitle=="Project Vega: Policies, Procedures and Guidelines") ? 'active':''; ?>" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        CyberTech
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item <?=($pagetitle=="Atlassian Status") ? 'active':''; ?>" href="<?=URL_ROOT;?>atlassian-status.php"> Atlassian Status </a></li>
                        <li><a class="dropdown-item <?=($pagetitle=="CyberTech") ? 'active':''; ?>" href="<?=URL_ROOT;?>cybertech.php"> CyberTech </a></li>
                        <li><a class="dropdown-item <?=($pagetitle=="Project Vega: Policies, Procedures and Guidelines") ? 'active':''; ?>" href="<?=URL_ROOT;?>project-vega.php"> Project Vega: Policies, Procedures and Guidelines </a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link <?=($pagetitle=="Marketing") ? 'active':''; ?>" href="<?=URL_ROOT;?>marketing.php">Marketing</a></li>
                <li class="nav-item"><a class="nav-link <?=($pagetitle=="About") ? 'active':''; ?>" href="<?=URL_ROOT;?>about.php">About</a></li>
            </ul>


        </div>
    </div>
</nav>