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
                                /fichiers/avatars/defaultF.png
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

      <!-- affichage d'un profil entreprise -->
      <div class="card background_profil">
          <div class="card-body text-dark">
              <h5 class="display-5">Téléphone : <?= $user->getTel() ?></h5>
          </div>
          <div class="card-body text-dark">
              <h5 class="display-5">Email : <?= $user->getMail() ?></h5>
          </div>
          <div class="card-body text-dark">
            <?php
            $CV="DocumentsUtilisateurs/CV/".$user->getId();
            if(file_exists ($CV.".png")){
               $file=$CV.".png";
               ?>
                   <h5 class="display-5">CV : <a href="../<?= $file ?>">Télécharger</a></h5>
               <?php
              }else if(file_exists ($CV.".jpg")){
              ?>
                  <h5 class="display-5">CV : <a href="../<?= $file ?>">Télécharger</a></h5>
              <?php
               $file=$CV.".jpg";
              }else if(file_exists ($CV.".jpeg")){
              ?>
                  <h5 class="display-5">CV : <a href="../<?= $file ?>">Télécharger</a></h5>
              <?php
               $file=$CV.".jpeg";
              }else if(file_exists ($CV.".pdf")){
              ?>
                  <h5 class="display-5">CV : <a href="../<?= $file ?>">Télécharger</a></h5>
              <?php
               $file=$CV.".pdf";
              }
              else{
              ?>
                <h5 class="display-5">CV : non communiquée</h5>
          <?php  } ?>
          </div>
          <div class="card-body text-dark">
            <?php
            $LM="DocumentsUtilisateurs/LettreMotivation/".$user->getId();
            if(file_exists ($LM.".png")){
               $file=$LM.".png";
               ?>
                   <h5 class="display-5">Lettre de motivation : <a href="../<?= $file ?>">Télécharger</a></h5>
               <?php
              }else if(file_exists ($LM.".jpg")){
              ?>
                  <h5 class="display-5">Lettre de motivation : <a href="../<?= $file ?>">Télécharger</a></h5>
              <?php
               $file=$LM.".jpg";
              }else if(file_exists ($LM.".jpeg")){
              ?>
                  <h5 class="display-5">Lettre de motivation : <a href="../<?= $file ?>">Télécharger</a></h5>
              <?php
               $file=$LM.".jpeg";
              }else if(file_exists ($LM.".pdf")){
              ?>
                  <h5 class="display-5">Lettre de motivation : <a href="../<?= $file ?>">Télécharger</a></h5>
              <?php
               $file=$LM.".pdf";
              }
              else{
              ?>
                <h5 class="display-5">Lettre de motivation : non communiquée</h5>
          <?php  } ?>
          </div>
      </div>
    </ul>
<!-- fin affichage d'un profil Candidat -->
