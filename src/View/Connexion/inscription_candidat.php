<?php if (isset($_GET['success'])) { ?>
    <div class="content text-center">
        <div class="row justify-content-center mt-3">
            <div class="alert alert-success col-10 col-lg-6">
                <?php if ($_GET['success'] == 'inscrit') { ?>
                    Votre compte a bien été créé.<br>
                    Bienvenu <?php if(isset($_SESSION['nom'])){ echo $_SESSION['nom']; }  ?> !
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- formulaire d'inscription -->
<div class="card" style="background-color: #e3e3e3">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <img src="/images/logo.png" alt="Logo" style="width:100px;">
            <h1 class="display-4 font-weight-bold">Inscription Candidat</h1>
        </div>
    </div>
    <div class="card-body text-dark">
        <form method='post' action="" onSubmit="return validate()">
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="civilite">Civilité *</label>
                <div class="col-sm-10" id="civilite">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" id="civilite1" type="radio" name="civilite" value="Mr" required>
                        <label class="custom-control-label" for="civilite1">Mr.</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" id="civilite2" type="radio" name="civilite" value="Mme" required>
                        <label class="custom-control-label" for="civilite2">Mme.</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Nom *</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nom" type="text" name="nom" placeholder="Entrer votre nom" required>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="prenom">Prénom *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="prenom" id="prenom" placeholder="Entrer votre prénom" required>
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
                    Vous avez déjà un compte? <a href="/index.php/connexion_candidat"><span class="">Se connecter</span></a>
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