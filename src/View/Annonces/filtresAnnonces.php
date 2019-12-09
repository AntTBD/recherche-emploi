<!-- filtres des annonces -->
<form method="post" id="form" onchange="majAnnonces()">
    <div class="form-group form-row">
        <label class="col-sm-2 col-form-label" for="idTypeContrat">Type de Contrat</label>
        <div class="col-sm-10">
            <select class="custom-select mr-sm-2" id="idTypeContrat" name="idTypeContrat">
                <option value="" <?php
                    if(!in_array("idTypeContrat", $parametres)){ ?>
                        selected
                    <?php } ?>>Choisir...</option>
                <?php foreach ($listeTypesContrat as $typeContrat) { ?>
                    <option value="<?= $typeContrat->getId() ?>"
                    <?php for ($i=0; $i < sizeof($parametres); $i++) {
                        if($parametres[$i] == "idTypeContrat"){
                            if($values[$i]==$typeContrat->getId())
                                echo "selected";
                        }
                    }?>
                    ><?= $typeContrat->getNom() ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group form-row">
        <label class="col-sm-2 col-form-label" for="domaine">Domaine</label>
        <div class="col-sm-10">
            <select class="custom-select mr-sm-2" id="domaine" name="domaine">
                <option value="" <?php
                if(!in_array("domaine", $parametres)){ ?>
                    selected
                <?php } ?>>Choisir...</option>
                <?php foreach ($listeDomaines as $domaine) { ?>
                    <option value="<?= $domaine ?>"
                        <?php for ($i=0; $i < sizeof($parametres); $i++) {
                            if($parametres[$i] == "domaine"){
                                if($values[$i]==$domaine)
                                    echo "selected";
                            }
                        }?>
                    ><?= $domaine ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group form-row">
        <label class="col-sm-2 col-form-label" for="idVille">Ville</label>
        <div class="col-sm-10">
            <select class="custom-select mr-sm-2" id="idVille" name="idVille">
                <option value="" <?php
                if(!in_array("idVille", $parametres)){ ?>
                    selected
                <?php } ?>>Choisir...</option>
                <?php foreach ($listeVilles as $ville) { ?>
                    <option value="<?= $ville->getId() ?>"
                        <?php for ($i=0; $i < sizeof($parametres); $i++) {
                            if($parametres[$i] == "idVille"){
                                if($values[$i]==$ville->getId())
                                    echo "selected";
                            }
                        }?>
                    ><?= $ville->getNom() ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group form-row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input class="btn btn-primary" type="submit" id="rechercher" value="Rechercher">
            <input class="btn btn-primary btn-danger" type="reset" value="Reset">
        </div>
    </div>
</form>
<script type="text/javascript">
    $("#idTypeContrat").change(function () {
        $("#form").submit();
    });
    $("#domaine").change(function () {
        $("#form").submit();
    });
    $("#idVille").change(function () {
        $("#form").submit();
    });
</script>
<!-- fin filtres des annonces -->