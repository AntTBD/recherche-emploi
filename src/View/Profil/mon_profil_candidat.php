<div class="card" style="background-color: #e3e3e3">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <img src="/images/logo.png" alt="Logo" style="width:100px;">
            <h1 class="display-4 font-weight-bold">Information sur vous</h1>
        </div>
    </div>
    <div class="card-body text-dark">
        <form method='post' action="">
          <div class="form-group form-row">
              <label class="col-sm-2 col-form-label" for="nom">Photo de Profil</label>
              <div class="col-sm-10">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="CV" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="CV" data-browse="Partager">Indiquez la Photo que vous souhaitez utiliser</label>
                </div>
              </div>
          </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Nom</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nom" type="text" name="nom" value="<?php echo  $user->getNom() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="prenom">Prenom</label>
                <div class="col-sm-10">
                    <input class="form-control" id="prenom" type="text" name="prenom" value="<?php echo  $user->getPrenom() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="mail">E-mail</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo  $user->getMail() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="tel">Téléphone</label>
                <div class="col-sm-10">
                    <input class="form-control" type="tel" name="tel" id="tel" value="<?php echo  $user->getTel() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Curriculum vitæ</label>
                <div class="col-sm-10">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="cv" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="cv" data-browse="Partager">Sélectionnez votre CV</label>
                  </div>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="nom">Lettre de motivation</label>
                <div class="col-sm-10">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="lm" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="lm" data-browse="Partager">Sélectionnez votre lettre de motivation</label>
                  </div>
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button class="btn btn-primary btn-success" type="submit">Modifier mes informations</button>
                </div>
            </div>
        </form>
    </div>
</div>
