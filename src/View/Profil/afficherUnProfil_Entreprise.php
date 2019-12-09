<!-- affichage d'un profil Entreprise -->
<div class="card background_profil_entreprise">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <?php
            $photoDeProfil="DocumentsUtilisateurs/Logo/".$user->getId();
            if(file_exists ($photoDeProfil.".png")){ $photoDeProfil=$photoDeProfil.".png"; }
            else if(file_exists ($photoDeProfil.".jpg")){ $photoDeProfil=$photoDeProfil.".jpg"; }
            else if(file_exists ($photoDeProfil.".jpeg")){ $photoDeProfil=$photoDeProfil.".jpeg"; }
            if($photoDeProfil==="DocumentsUtilisateurs/Logo/".$user->getId()){  ?>
                <img class="d-inline-block align-middle" src="/fichiers/avatars/avatarEntreprise.png" alt="" width="100" height="100" style="border-radius: 50%;border-color: black;">
            <?php }else{?>
                <img class="d-inline-block align-middle"
                     src="/<?= $photoDeProfil ?>" alt="" width="auto" height="100"
                     style="order-color: black;">
                <?php
            }?>
            <h1 class="display-4 font-weight-bold card-title"><?= $user->getNom() ?></h1>
        </div>
    </div>
    <ul class="list-group list-group-flush text-dark">
        <li class="list-group-item">
            <p class="card-text"><b>Téléphone : </b><?= $user->getTel() ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Email : </b><?= $user->getMail() ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Ville : </b><?= $user->getAdresse() ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Site web : </b><a href="<?= $user->getSiteInternet() ?>"><?= $user->getSiteInternet() ?></a></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Description de la socoiété : </b><?= $user->getDescription() ?></p>
        </li>
    </ul>
</div>
<!-- fin affichage d'un profil entreprise -->
