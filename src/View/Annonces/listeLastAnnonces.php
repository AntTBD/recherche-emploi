<!-- liste des annonces -->
<?php if(sizeof($listeAnnonces)>0){ ?>
    <div class="row justify-content-center mb-3">
        <div class="col-6"><h3 style="">A la une</h3></div>
        <div class="col-6 text-right"><a href="/index.php/voirAllAnnonces" ><button class="btn btn-secondary">Voir toutes les annonces</button></a></div>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($listeAnnonces as $annonce) {
            $entreprise = $entrepriseRepository->find($annonce->getIdEntreprise());
            $ville = $villeRepository->find($annonce->getIdVille()); ?>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title"><?= $annonce->getIntitule(); ?></h1>
                    </div>
                    <div class="card-body">
                        <h2 class="display-5"><?= $annonce->getDomaine() ?></h2>
                        <p class="card-text"><b>Entreprise : </b><?= $entreprise->getNom() ?></p>
                        <p class="card-text"><b>Ville : </b><?= $ville->getNom() ?></p>
                        <a href="/index.php/afficherAnnonce?id=<?= $annonce->getId() ?>" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<!-- fin liste des annonces -->