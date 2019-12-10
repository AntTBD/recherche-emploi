<!-- affichage d'un profil Candidat -->
<div class="card background_profil_candidat">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <?php
            $photoDeProfil="DocumentsUtilisateurs/PhotoDeProfil/".$user->getId();
            if(file_exists ($photoDeProfil.".png")){ $photoDeProfil=$photoDeProfil.".png"; }
            else if(file_exists ($photoDeProfil.".jpg")){ $photoDeProfil=$photoDeProfil.".jpg"; }
            else if(file_exists ($photoDeProfil.".jpeg")){ $photoDeProfil=$photoDeProfil.".jpeg"; }
            if($photoDeProfil==="DocumentsUtilisateurs/PhotoDeProfil/".$user->getId()){  ?>
                <img class="d-inline-block align-middle" src="<?php
                if ($user->getCivilite() == "Mr") { ?>
                                /fichiers/avatars/avatarH.png
                            <?php } elseif ($user->getCivilite()  == "Mme") { ?>
                                /fichiers/avatars/avatarF.png
                            <?php } ?>" alt="" width="50" height="50"
                     style="border-radius: 50%;border-color: black;">
            <?php }else{?>
                <img class="d-inline-block align-middle"
                     src="/<?= $photoDeProfil ?>" alt="" width="auto" height="100"
                     style="order-color: black;">
                <?php
            }?>
            <h1 class="display-4 font-weight-bold card-title"><?= $user->getNom() ?> <?= $user->getPrenom() ?></h1>
        </div>
    </div>
    <ul class="list-group list-group-flush text-dark">
        <li class="list-group-item">
            <p class="card-text"><b>Téléphone : </b><?php if($user->getTel()!=""){ echo $user->getTel(); }else{echo "Non communiqué";} ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Email : </b><?php if($user->getMail()!=""){ echo $user->getMail(); }else{echo "Non communiqué";} ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text">
                <b>CV : </b>
                <?php
                $CV="DocumentsUtilisateurs/CV/".$user->getId();
                $file=null;
                if(file_exists ($CV.".png")) {
                    $file = $CV . ".png";
                }else if(file_exists ($CV.".jpg")){
                    $file=$CV.".jpg";
                }else if(file_exists ($CV.".jpeg")){
                    $file=$CV.".jpeg";
                }else if(file_exists ($CV.".pdf")){
                    $file=$CV.".pdf";
                }
                if($file!=null){ ?>
                    <a href="../<?= $file ?>">Télécharger</a>
                <?php }else{ ?>
                    Non communiqué
                <?php } ?>
            </p>
        </li>
        <li class="list-group-item">
            <p class="card-text">
                <b>Lettre de motivation : </b>
                <?php
                $LM="DocumentsUtilisateurs/LettreMotivation/".$user->getId();
                $file=null;
                if(file_exists ($LM.".png")) {
                    $file = $LM . ".png";
                }else if(file_exists ($LM.".jpg")){
                    $file=$LM.".jpg";
                }else if(file_exists ($LM.".jpeg")){
                    $file=$LM.".jpeg";
                }else if(file_exists ($LM.".pdf")){
                    $file=$LM.".pdf";
                }
                if($file!=null){ ?>
                    <a href="../<?= $file ?>">Télécharger</a>
                <?php }else{ ?>
                    Non communiqué
                <?php } ?>
            </p>
        </li>
    </ul>
<!-- fin affichage d'un profil Candidat -->
