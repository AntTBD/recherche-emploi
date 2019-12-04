<!-- liste des annonces -->
<?php
use App\Model\Repository\EntrepriseRepository;

foreach ($listeAnnonces as $annonce) {
    $entrepriseRepository = new EntrepriseRepository($base);
    $entreprise = $entrepriseRepository->find($annonce->getIdEntreprise()); ?>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= $annonce->getIntitule(); ?></h1>
            </div>
            <div class="card-body">
                <h2 class="display-5"><?= $annonce->getDomaine() ?></h2>
                <p class="card-text"><b>Entreprise : </b><?= $entreprise->getNom() ?></p>
                <a href="/index.php/afficherAnnonce?id=<?= $annonce->getId() ?>" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
    </div>
<?php } ?>
<!-- fin liste des annonces -->
