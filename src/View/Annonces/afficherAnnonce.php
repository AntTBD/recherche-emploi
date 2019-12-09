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
            <a class="btn btn-primary btn-success card-link" href="/index.php/afficherProfil?id=<?= $entreprise->getID() ?>&type=<?= $entreprise->getClassName() ?>">Plus de détail</a>
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
        <div class="row card-body">
            <div class="col-sm-6">
                <a class="btn btn-primary btn-danger card-link" href="<?= $del ?>">Supprimer</a>
                <a class="btn btn-primary btn-warning card-link" href="<?= $modif ?>">Modifier</a>
            </div>
            <div class="col-sm-6 mt-2">
                <div class="text-right">
                    <a class="btn btn-primary btn-success card-link" href="<?= $candidatures ?>">Voir les candidats</a>
                </div>
            </div>
        </div>
    <?php } elseif(isset($_SESSION['type']) && $_SESSION['type']==="Candidat") {?>
        <div class="row card-body">
            <div class="col-sm-12">
                <a class="btn btn-primary btn-<?= $postuler['couleur'] ?> card-link mt-1 md-1" href="<?= $postuler['lien'] ?>"><?= $postuler['text'] ?></a>
                <a class="btn btn-primary btn-<?= $favoris['couleur'] ?> card-link mt-1 md-1" href="<?= $favoris['lien'] ?>"><?= $favoris['text'] ?></a>
            </div>
        </div>
    <?php    } ?>
</div>
<!-- fin affichage d'une annonce -->
