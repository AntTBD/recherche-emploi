<!-- liste des candidats -->
<?php
foreach ($listeCandidats as $candidat) { ?>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <center>
                    <?php
                    $photoDeProfil="DocumentsUtilisateurs/PhotoDeProfil/".$candidat->getId();
                    if(file_exists ($photoDeProfil.".png")){ $photoDeProfil=$photoDeProfil.".png"; }
                    else if(file_exists ($photoDeProfil.".jpg")){ $photoDeProfil=$photoDeProfil.".jpg"; }
                    else if(file_exists ($photoDeProfil.".jpeg")){ $photoDeProfil=$photoDeProfil.".jpeg"; }
                    if($photoDeProfil==="DocumentsUtilisateurs/PhotoDeProfil/".$candidat->getId()){  ?>
                        <img class="d-inline-block align-middle" src="<?php
                        if ($candidat->getCivilite() == "Mr") { ?>
                                /fichiers/avatars/avatarH.png
                            <?php } elseif ($candidat->getCivilite()  == "Mme") { ?>
                                /fichiers/avatars/defaultF.png
                            <?php } ?>" alt="" width="50" height="50"
                             style="border-radius: 50%;border-color: black;">
                    <?php }else{?>
                        <img class="d-inline-block align-middle"
                             src="/<?= $photoDeProfil ?>" alt="" width="auto" height="50"
                             style="order-color: black;">
                        <?php
                    }?>
                    <h1 class="card-title"><?= $candidat->getNom() ?> <?= $candidat->getPrenom() ?></h1>
                </center>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Email : </b><?= $candidat->getMail() ?></p>
                <p class="card-text"><b>Téléphone : </b><?= $candidat->getTel() ?></p>
                <a href="/index.php/afficherProfil?id=<?= $candidat->getId() ?>&type=<?= $candidat->getClassName() ?>" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
    </div>
<?php } ?>
<!-- fin liste des candidats -->