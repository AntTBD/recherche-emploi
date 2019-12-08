<?php
include __DIR__ . '/../../../includes/menus.php';
include __DIR__ . '/../../../includes/function.php';
?>
<header>
    <!-- NavBar -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark" id="myNavBar">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand" href="<?php if ($menu[0]['link'] != null) {
                echo "/" . $menu[0]['link'];
            } else {
                echo "#";
            } ?>">
                <img class="d-inline-block align-middle" src="/images/logo.png" alt="Logo" style="width:40px;">
            </a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <?php foreach ($menu as $menuIndividuel) {
                        if (!empty($menuIndividuel['link']) && $menuIndividuel['link'] != 'index.php') { ?>
                            <li class="nav-item <?php if (isActive($menuIndividuel['link'])) { ?>active<?php } ?>">
                                <a class="nav-link" href="/<?= $menuIndividuel['link'] ?>"><?= $menuIndividuel['nom'] ?></a>
                            </li>
                        <?php }
                    } ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <?php if (isset($_SESSION['id'])) {
                                $photoDeProfil="DocumentsUtilisateurs/PhotoDeProfil/".$_SESSION['id'];
                                if(file_exists ($photoDeProfil.".png")){ $photoDeProfil=$photoDeProfil.".png"; }
                                else if(file_exists ($photoDeProfil.".jpg")){ $photoDeProfil=$photoDeProfil.".jpg"; }
                                else if(file_exists ($photoDeProfil.".jpeg")){ $photoDeProfil=$photoDeProfil.".jpeg"; }
                                if($photoDeProfil==="DocumentsUtilisateurs/PhotoDeProfil/".$_SESSION['id']){
                                    if($_SESSION['type']=="Candidat"){
                                        if (isset($_SESSION['civilite'])) { ?>
                                        <img class="d-inline-block align-middle" src="<?php
                                            if ($_SESSION['civilite'] == "Mr") { ?>
                                                /fichiers/avatars/avatarH.png
                                            <?php } elseif ($_SESSION['civilite'] == "Mme") { ?>
                                                /fichiers/avatars/defaultF.png
                                            <?php } ?>" alt="" width="35" height="35"
                                             style="border-radius: 50%;border-color: black;">
                                        <?php }
                                    }elseif($_SESSION['type']=="Entreprise") {
                                        if (!file_exists("DocumentsUtilisateurs/PhotoDeProfil/" . $_SESSION['id'] . ".png")) { ?>
                                            <img class="d-inline-block align-middle"
                                                 src="/fichiers/avatars/avatarEntreprise.png" alt="" width="35" height="35"
                                                 style="order-color: black;">
                                        <?php }else{ ?>
                                            <img class="d-inline-block align-middle"
                                                 src="/DocumentsUtilisateurs/PhotoDeProfil/<?= $_SESSION['id'] ?>.png" alt="" width="35" height="35"
                                                 style="order-color: black;">
                                        <?php }
                                    }
                                }else{?>
                                <img class="d-inline-block align-middle"
                                     src="/<?= $photoDeProfil ?>" alt="" width="auto" height="35"
                                     style="order-color: black;">
                                <?php }
                                echo $_SESSION['nom'];
                            } else {
                                echo 'CONNEXION';
                            } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php foreach ($menuConnexion as $menuIndividuel2) {
                                if (!empty($menuIndividuel2['link'])) { ?>
                                    <a class="dropdown-item" href="/<?= $menuIndividuel2['link'] ?>">
                                        <i class="fa fa-<?php if ($menuIndividuel2['nom'] == "CANDIDAT" || $menuIndividuel2['nom'] == "Mon Profil") {
                                            echo 'user';
                                        } elseif ($menuIndividuel2['nom'] == "ENTREPRISE") {
                                            echo 'building';
                                        } elseif ($menuIndividuel2['nom'] == "Déconnection") {
                                            echo 'sign-out-alt';
                                        } ?>" aria-hidden="true"></i>
                                        <?= $menuIndividuel2['nom'] ?>
                                    </a>
                                <?php }
                            } ?>
                        </div>
                    </li>
                    <!-- Fin Dropdown -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fin NavBar -->
</header>
