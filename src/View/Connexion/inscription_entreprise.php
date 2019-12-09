<!-- formulaire d'inscription entreprise -->
<div class="card background_profil_entreprise">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <img src="/images/logo.png" alt="Logo" style="width:100px;">
            <h1 class="display-4 font-weight-bold">Inscription Entreprise</h1>
        </div>
    </div>
    <div class="card-body text-dark">
        <form method='post' action="" onSubmit="return validate()">
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Nom *</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nom" type="text" name="nom" placeholder="Entrer le nom de votre entreprise" required>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="mail">E-mail *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id="mail" placeholder="Entrer votre e-mail" required>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="tel">Téléphone</label>
                <div class="col-sm-10">
                    <input class="form-control" type="tel" name="tel" id="tel" placeholder="Entrer votre numéro de téléphone">
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <label class="col-sm-2 col-form-label" for="ville">Adresse</label>
                    <div class="col-sm-10">
                        <select class="form-control custom-select mr-sm-2" id="ville" name="ville">
                            <option value="">Choisir votre ville</option>
                            <?php foreach ($listeVilles as $ville) { ?>
                                <option value="<?= $ville->getNom() ?>"><?= $ville->getNom() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="siteInternet">Site Internet</label>
                <div class="col-sm-10">
                    <input class="form-control" type="url" name="siteInternet" id="siteInternet" placeholder="Entrer un lien vers votre site">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="description">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Descrir votre entreprise"></textarea>
                </div>
            </div>

            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="password">Mot de passe *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="password" id="password" placeholder="Entrer un mot de passe" aria-describedby="btn_eye" maxlength="20" minlength="8" required>
                    <small class="text-muted">
                        Doit contenir entre 8 et 20 caractères.
                    </small>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="passwordConfirm">Confirmer *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer votre mot de passe" aria-describedby="btn_eye" maxlength="20" minlength="8" required>
                    <small class="text-muted">
                        Doit contenir entre 8 et 20 caractères.
                    </small>
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button class="btn btn-primary btn-success" type="submit">Créer mon compte</button>
                    <button class="btn btn-primary btn-danger" type="reset">Annuler</button>
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 form-text">
                    Vous avez déjà un compte? <a href="/index.php/connexion_entreprise"><span class="">Se connecter</span></a>
                </div>
            </div>
        </form>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitre" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitre">Attention</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>Les mots de passe ne sont pas identique !
                        <br>Veuillez mettre le même mot de passe</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function validate() {

        var a = document.getElementById("password").value;
        var b = document.getElementById("passwordConfirm").value;

        if (a!=b) {
            $('#modal').modal('show');
            return false;
        } else {
            $('#modal').modal('hide');
            return true;
        }
    }
</script>
<!-- fin formulaire d'inscription entreprise -->