<div class="card" style="background-color: #e3e3e3">
    <div class="card-header">
        <div class="text-center justify-content-center">
            <img src="/images/logo.png" alt="Logo" style="width:100px;">
            <h1 class="display-4 font-weight-bold">Information sur vous</h1>
        </div>
    </div>
    <div class="card-body text-dark">
        <form method='post' action="" id="formEntreprise">
          <div class="form-group form-row">
              <label class="col-sm-2 col-form-label" for="nom">Logo de l'entreprise</label>
              <div class="col-sm-10">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="CV" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="CV" data-browse="Partager">Indiquez le logo que vous souhaitez utiliser</label>
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
                <label class="col-sm-2 col-form-label" for="tel">Telephone</label>
                <div class="col-sm-10">
                    <input class="form-control" id="tel" type="text" name="tel" value="<?php echo  $user->getTel() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="mail">E-mail</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo  $user->getMail() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="adresse">Adresse</label>
                <div class="col-sm-10">
                    <input class="form-control" type="adresse" name="adresse" id="adresse" value="<?php echo  $user->getAdresse() ?>">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label" for="siteInternet">Site Web</label>
                <div class="col-sm-10">
                    <input class="form-control" type="siteInternet" name="siteInternet" id="siteInternet" value="<?php echo  $user->getSiteInternet() ?>">
                </div>
            </div>
            <div class="form-group form-row">
            <label class="col-sm-2 col-form-label" for="description">Description</label>
              <textarea form="formEntreprise" class="form-control" rows="5" type="description" name="description" id="description"><?php echo  $user->getDescription() ?></textarea>
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
</div>
