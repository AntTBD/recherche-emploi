<!-- formulaire profil entreprise -->
<div class="card background_profil_entreprise">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <h1 class="display-4 font-weight-bold">Information sur vous</h1>
        </div>
    </div>
    <div class="card-body text-dark">
        <form method="post" action="" id="formEntreprise" enctype="multipart/form-data">
          <div class="form-group form-row">
              <label class="col-sm-2 col-form-label" for="nom">Logo de l'entreprise</label>
              <div class="col-sm-10">
                <div class="custom-file">
                  <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                    <input type="file" name = "USERFILE">
                    <input type="file" class="custom-file-input" id="Logo" name="Logo" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="Logo" data-browse="Partager">Indiquez le logo que vous souhaitez utiliser</label>
                </div>
              </div>
          </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Nom</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nom" type="text" name="nom">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="tel">Telephone</label>
                <div class="col-sm-10">
                    <input class="form-control" id="tel" type="text" name="tel">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="mail">E-mail</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id="email">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="adresse">Adresse</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="adresse" id="adresse">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="siteInternet">Site Web</label>
                <div class="col-sm-10">
                    <input class="form-control" type="url" name="siteInternet" id="siteInternet">
                </div>
            </div>
            <div class="form-group form-row">
            <label class="col-sm-2 col-form-label" for="description">Description</label>
                <div class="col-sm-10">
                    <textarea form="formEntreprise" class="form-control" rows="5" name="description" id="description"></textarea>
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-20">
                    <button class="btn btn-primary btn-success" type="submit">Modifier mes informations</button>
                    <button class="btn btn-primary btn-danger" type="reset">Annuler</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
    <script>
        document.getElementById("nom").value="<?= $user->getNom() ?>";
        document.getElementById("tel").value="<?= $user->getTel() ?>";
        document.getElementById("email").value="<?= $user->getMail() ?>";
        document.getElementById("adresse").value="<?= $user->getAdresse() ?>";
        document.getElementById("siteInternet").value="<?= $user->getSiteInternet() ?>";
        document.getElementById("description").innerHTML="<?= $user->getDescription() ?>";
    </script>
<!-- formulaire profil entreprise -->

<script>
    // https://www.w3schools.com/bootstrap4/bootstrap_forms_custom.asp#Custom%20File%20Upload
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
