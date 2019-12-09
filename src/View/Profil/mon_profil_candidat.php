<!-- formulaire profil candidat -->
<div class="card background_profil_candidat">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <h1 class="display-4 font-weight-bold">Information sur vous</h1>
        </div>
    </div>
    <div class="card-body text-dark">
        <form method='post' action="" enctype="multipart/form-data">
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Photo de Profil</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                        <input type="file" name = "PP">
                        <input type="file" class="custom-file-input" id="PP" name="PP" aria-describedby="Photo de profil">
                        <label class="custom-file-label" for="PP" data-browse="Choisir">Indiquez votre photo de profil que vous souhaitez utiliser</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Nom</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nom" type="text" name="nom" value="<?=  $user->getNom(); ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="prenom">Prenom</label>
                <div class="col-sm-10">
                    <input class="form-control" id="prenom" type="text" name="prenom" value="<?= $user->getPrenom() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="mail">E-mail</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id="email" value="<?=  $user->getMail() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="tel">Téléphone</label>
                <div class="col-sm-10">
                    <input class="form-control" type="tel" name="tel" id="tel" value="<?=  $user->getTel() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Curriculum vitæ</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                        <input type="file" name = "CV">
                        <input type="file" class="custom-file-input" id="CV" name="CV" aria-describedby="CV">
                        <label class="custom-file-label" for="CV" data-browse="Choisir">Indiquez le CV que vous souhaitez utiliser</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Lettre de motivation</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                        <input type="file" name = "LM">
                        <input type="file" class="custom-file-input" id="LM" name="LM" aria-describedby="Lettre de motivation">
                        <label class="custom-file-label" for="LM" data-browse="Choisir">Indiquez la lettre de motivation que vous souhaitez utiliser</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button class="btn btn-primary btn-success" type="submit">Modifier mes informations</button>
                    <button class="btn btn-primary btn-danger" type="reset">Annuler</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // https://www.w3schools.com/bootstrap4/bootstrap_forms_custom.asp#Custom%20File%20Upload
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<!-- fin formulaire profil candidat -->
