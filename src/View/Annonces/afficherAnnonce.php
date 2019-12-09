<!-- affichage d'une annonce -->
<div class="card background_profil">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <h1 class="display-4 font-weight-bold card-title"><?= $annonce->getIntitule() ?></h1>
        </div>
    </div>
    <div class="card-body text-dark">
        <h2 class="display-5"><?= $annonce->getDomaine() ?></h2>
    </div>
    <ul class="list-group list-group-flush text-dark">
        <li class="list-group-item">
            <p class="card-text"><b>Entreprise : </b><?= $entreprise->getNom() ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Annonce postée le : </b><?= $dateDebut ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Type de contrat : </b><?= $contrat->getNom() ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Description : </b></p>
            <p class="card-text"><?= $annonce->getDescription() ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Salaire : </b><?= $annonce->getSalaire() ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Temps de travail : </b><?= $annonce->getTempsTravail() ?></p>
        </li>
        <li class="list-group-item">
            <p class="card-text"><b>Ville : </b><?= $ville->getNom() ?></p>
        </li>
    </ul>
    <?php if(isset($_SESSION['type']) && $_SESSION['type']==="Entreprise" && $_SESSION["id"]===$entreprise->getId()){?>
        <div class="card-body">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <a class="btn btn-primary btn-danger" href="<?= $del ?>" class="card-link">Supprimer</a>
                <a class="btn btn-primary btn-warning" href="<?= $modif ?>" class="card-link">Modifier</a>
            </div>
        </div>
    <?php } elseif(isset($_SESSION['type']) && $_SESSION['type']==="Candidat") {?>
        <div class="card-body">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <a class="btn btn-primary btn-success" href="<?= $postuler ?>" class="card-link">Postuler</a>
                <!--<a class="btn btn-primary btn-warning" href="<?= $favori ?>" class="card-link">Ajouter aux favoris</a> -->
            </div>
        </div>
    <?php    } ?>
</div>
<!-- fin affichage d'une annonce -->
