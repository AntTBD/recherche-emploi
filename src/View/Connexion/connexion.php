<!-- formulaire de connexion -->
<div class="card background_profil_<?= strtolower($class) ?>">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <img src="/images/logo.png" alt="Logo" style="width:100px;">
            <h1 class="display-4 font-weight-bold">Connexion <?= $class ?></h1>
        </div>
    </div>
    <div class="card-body text-dark">
        <form method='post' action="">
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="mail">E-mail *</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id="mail" placeholder="Entrer votre e-mail" required>
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
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button class="btn btn-primary btn-success" type="submit">Se connecter</button>
                    <button class="btn btn-primary btn-danger" type="reset">Annuler</button>
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 form-text">
                    Vous n'avez pas de compte? <a href="/index.php/inscription_<?= strtolower($class) ?>"><span class="">S'inscrire</span></a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- fin formulaire de connexion -->