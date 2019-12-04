<!-- formulaire de modification d'annonce -->
<div class="card background_profil">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <h1 class="display-4 font-weight-bold">Modifier une annonce</h1>
        </div>
    </div>
    <div class="card-body text-dark">
        <form method="POST" action="">
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="intitule">Intitulé *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="intitule" id="intitule" placeholder="Entrer l'intitulé de votre annonce" required>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="domaine">Domaine *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="domaine" id="domaine" placeholder="Entrer le domaine de votre annonce" required>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="dateD">Date de début *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="date" name="dateD" id="dateD" required>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="dateF">Date de fin *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="date" name="dateF" id="dateF" required>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="description">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" rows="10" cols="60" placeholder="Entrer une description de votre annonce"></textarea>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="salaire">Salaire *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="salaire" id="salaire" placeholder="Entrer le salaire de votre annonce" required>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="tempsTravail">Temps de travail *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="tempsTravail" id="tempsTravail" placeholder="Entrer le temps de travail de votre annonce"required>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="ville">Ville *</label>
                <div class="col-sm-10">
                    <select class="form-control" name="ville" required>
                        <?php foreach ($listeVilles as $v) { ?>
                            <option value="<?= $v->getId() ?>" <?php if($v==$ville){?>selected<?php } ?> ><?= $v->getNom() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="typeContrat">Type de contrat *</label>
                <div class="col-sm-10">
                    <?php $i=0;
                    foreach ($listeContrats as $typeContrat) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeContrat" id="typeContrat<?= $i ?>" value="<?= $typeContrat->getId() ?>" <?php if($typeContrat==$contrat){?>checked<?php } ?> >
                            <label class="form-check-label" for="typeContrat<?= $i ?>"><?= $typeContrat->getNom() ?></label>
                        </div>
                        <?php $i++;
                    } ?>
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button class="btn btn-primary btn-success" type="submit">Modifier</button>
                    <button class="btn btn-primary btn-danger" type="reset">Annuler</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById("intitule").value="<?= $annonce->getIntitule() ?>";
    document.getElementById("domaine").value="<?= $annonce->getDomaine() ?>";
    document.getElementById("dateD").value="<?= $annonce->getDateDebut() ?>";
    document.getElementById("dateF").value="<?= $annonce->getDateFin() ?>";
    document.getElementById("description").value="<?= $annonce->getDescription() ?>";
    document.getElementById("salaire").value="<?= $annonce->getSalaire() ?>";
    document.getElementById("tempsTravail").value="<?= $annonce->getTempsTravail() ?>";
</script>
<!-- fin formulaire de modification d'annonce -->