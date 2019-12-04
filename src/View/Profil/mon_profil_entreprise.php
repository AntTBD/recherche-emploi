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
                  <!--<div class="custom-file">
                      <input type="file" class="custom-file-input" id="CV" name="CV" required>
                      <label class="custom-file-label" for="CV">Choose file...</label>
                      <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div>-->
                <div class="custom-file">
                  <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                    <input type="file" name = "USERFILE">
                    <input type="file" class="custom-file-input" id="CV" name="CV" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="CV" data-browse="Partager">Indiquez le logo que vous souhaitez utiliser</label>
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

    <?php
    if(isset($_FILES['CV']))
    {
      $dossier = 'upload/';
      $fichier = basename($_FILES['CV']['name']);
      $taille_maxi = 100000;
      $taille = filesize($_FILES['CV']['tmp_name']);
      $extensions = array('.png', '.gif', '.jpg', '.jpeg');
      $extension = strrchr($_FILES['CV']['name'], '.');
      //Verification du fichier uploadé
      if(!in_array($extension, $extensions)) //Verification de l'extention
      {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
      }
      if($taille>$taille_maxi) //Verification de la taille
      {
        $erreur = 'Le fichier est trop gros...';
      }
      if(!isset($erreur))
      {
        //On remplace les caractères spéciaux
        $fichier = strtr($fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES['CV']['tmp_name'], $dossier . $fichier))
            {
              echo 'Upload effectué avec succès !';
            }
            else
            {
              echo 'Echec de l\'upload !';
            }
          }
          else
          {
            echo $erreur;
          }
        }

/*
     //https://www.w3schools.com/php/php_file_upload.asp
    $target_dir = "./upload/";
    $target_file = $target_dir . basename($_FILES["CV"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["CV"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["CV"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["CV"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["CV"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
*/



    ?>