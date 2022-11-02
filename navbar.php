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

                <li class="nav-item"><a class="nav-link <?=($pagetitle=="Community") ? 'active':''; ?>" href="<?=URL_ROOT;?>community.php">Community</a></li>
                
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
                <li class="nav-item"><a class="nav-link <?=($pagetitle=="Management") ? 'active':''; ?>" href="<?=URL_ROOT;?>management.php">Management</a></li>
                <li class="nav-item"><a class="nav-link <?=($pagetitle=="About") ? 'active':''; ?>" href="<?=URL_ROOT;?>about.php">About</a></li>
            </ul>


        </div>
    </div>
</nav>