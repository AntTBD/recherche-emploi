<!-- affichage d'un profil Candidat -->
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

        <!-- reprend l'affichage d'une annonce en faite -->

    </ul>
</div>
<!-- fin affichage d'un profil Candidat -->