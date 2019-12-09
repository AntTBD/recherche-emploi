<?php


namespace App\Controller;
use App\Model\Repository\TypeContratRepository;
use App\Model\Repository\VilleRepository;
use App\Model\Repository\EntrepriseRepository;
use App\Model\Repository\AnnonceRepository;
use App\Model\Annonce;


class AnnonceController
{
    public static function ajoutAnnonce($base){
        $annonceRepository = new AnnonceRepository($base);
        $typeContratRepository = new TypeContratRepository($base);
        $villeRepository = new VilleRepository($base);
        $entrepriseRepository = new EntrepriseRepository($base);


        $listeTypesContrat = $typeContratRepository->findAll();
        $listeVilles = $villeRepository->findAll();
        $listeEntreprises = $entrepriseRepository->findAll();
        $dateActuelle = date("Y-m-d");

        $annonce = null;
        if (isset($_POST['intitule']) && isset($_POST['domaine']) && isset($_POST['dateD']) && isset($_POST['dateF'])) {
            $annonce = new Annonce([
                'intitule' => $_POST['intitule'],
                'domaine'   => $_POST['domaine'],
                'dateDebut' => $_POST['dateD'],
                'dateFin' => $_POST['dateF'],
                'description' => $_POST['description'],
                'salaire' => $_POST['salaire'],
                'tempsTravail' => $_POST['tempsTravail'],
                'idEntreprise' => $_SESSION['id'],
                'idVille' => $_POST['ville'],
                'idTypeContrat' => $_POST['typeContrat']
            ]);

            $annonce_result = $annonceRepository->add($annonce);
            if(!$annonce_result){
                //envoi d'un message
                $typeAlert="danger";
                $messageAlert="Une erreur s'est produite. Veuillez nous en excuser.";
                require __DIR__ . '/../View/messages.php';
            }else{
                //envoi d'un message
                $typeAlert="success";
                $messageAlert="L'annonce a bien été ajouté.";
                require __DIR__ . '/../View/messages.php';
            }
        }
        require __DIR__.'/../view/Annonces/ajoutAnnonce.php';
    }

    public static function voirMesAnnonces($base){
        $annonceRepository = new AnnonceRepository($base);
        $entrepriseRepository = new EntrepriseRepository($base);
        $villeRepository = new VilleRepository($base);
        if (isset($_SESSION['type']) && $_SESSION['type'] == 'Entreprise'){
            $listeAnnonces = $annonceRepository->findByEntreprise($_SESSION['id']);
            if(sizeof($listeAnnonces)==0){
                //envoi d'un message
                $typeAlert="warning";
                $messageAlert="Vous n'avez pas ou plus d'annonces";
                require __DIR__ . '/../View/messages.php';
            }
        }else{
            //envoi d'un message
            $typeAlert="warning";
            $messageAlert="Vous n'êtes pas autoriser à accéder à cette page";
            require __DIR__ . '/../View/messages.php';
        }

        require __DIR__.'/../view/Annonces/listeAnnonces.php';
    }

    public static function voirAllAnnonces($base){
        $annonceRepository = new AnnonceRepository($base);
        $typeContratRepository = new TypeContratRepository($base);
        $villeRepository = new VilleRepository($base);
        $entrepriseRepository = new EntrepriseRepository($base);
        $listeTypesContrat = $typeContratRepository->findAll();
        $listeDomaines = array();
        $listeVilles = array();

        $parametres=array();
        $values=array();

        foreach ($annonceRepository->findAll() as $annonce){
            array_push($listeDomaines, $annonce->getDomaine());

            foreach ($villeRepository->findAll() as $ville)
            array_push($listeVilles, $ville);
        }


        if(isset($_POST['idTypeContrat']) && $_POST['idTypeContrat']!=null){
            array_push($parametres,"idTypeContrat");
            array_push($values,$_POST['idTypeContrat']);
        }
        if(isset($_POST['domaine']) && $_POST['domaine']!=null){
            array_push($parametres,"domaine");
            array_push($values,$_POST['domaine']);
        }
        if(isset($_POST['idVille']) && $_POST['idVille']!=null){
            array_push($parametres,"idVille");
            array_push($values,$_POST['idVille']);
        }
        if(sizeof($parametres)>0){
            $listeAnnonces = $annonceRepository->findByParam($parametres,$values);
        }else{
            $listeAnnonces = $annonceRepository->findAll();
        }


        require __DIR__.'/../view/Annonces/filtresAnnonces.php';

        if(sizeof($listeAnnonces)==0){
            //envoi d'un message
            $typeAlert="warning";
            $messageAlert="Il n'y a pas d'annonces à votre convenance. Veuillez nous en excuser.";
            require __DIR__ . '/../View/messages.php';
        }else{
            require __DIR__.'/../view/Annonces/listeAnnonces.php';
        }
    }

    public static function voirLastAnnonces($base){
        $annonceRepository = new AnnonceRepository($base);
        $listeAnnonces = $annonceRepository->findLastThree();

        $entrepriseRepository = new EntrepriseRepository($base);
        $villeRepository = new VilleRepository($base);

        if(sizeof($listeAnnonces)==0){
            //envoi d'un message
            $typeAlert="warning";
            $messageAlert="Il n'y a pas d'annonces pour le moment. Veuillez nous en excuser.";
            require __DIR__ . '/../View/messages.php';
        }

        require __DIR__.'/../view/Annonces/listeLastAnnonces.php';
    }

    public static function afficherAnnonce($base){
        if(isset($_GET['id'])){
            $annonceRepository = new AnnonceRepository($base);
            $annonce = $annonceRepository->findById($_GET['id']);
            if(!$annonce){
                //envoi d'un message
                $typeAlert="warning";
                $messageAlert="Cette annonce n'existe pas ! Veuillez en choisir une autre.";
                require __DIR__ . '/../View/messages.php';
            }else{
                if(isset($_GET["success"])){
                    if($_GET["success"]=="true"){
                        //envoi d'un message
                        $typeAlert="success";
                        $messageAlert="Felicitation ! Vous venez de postuler à cette annonce.";
                        require __DIR__ . '/../View/messages.php';
                    }else if($_GET["success"]=="false"){
                        //envoi d'un message
                        $typeAlert="warning";
                        $messageAlert="Une erreur est survenu !";
                        require __DIR__ . '/../View/messages.php';
                    }else if($_GET["success"]=="dejaPostule") {
                        //envoi d'un message
                        $typeAlert = "warning";
                        $messageAlert = "Il semble que vous avez déjà postulé à cette annonce.";
                        require __DIR__ . '/../View/messages.php';
                    }
                }
                $dateDebut = date("d/m/Y", strtotime($annonce->getDateDebut()));

                $entrepriseRepository = new EntrepriseRepository($base);
                $entreprise = $entrepriseRepository->find($annonce->getIdEntreprise());

                $typeContratRepository = new TypeContratRepository($base);
                $contrat = $typeContratRepository->find($annonce->getIdTypeContrat());

                $villeRepository = new VilleRepository($base);
                $ville = $villeRepository->find($annonce->getIdVille());

                $del = '/index.php/supprimerAnnonce?id='.$annonce->getId();
                $modif = '/index.php/modifierAnnonce?id='.$annonce->getId();
                $postuler = '/index.php/postuler?id='.$annonce->getId();

                require __DIR__.'/../view/Annonces/afficherAnnonce.php';
            }


        }else{
            //envoi d'un message
            $typeAlert="warning";
            $messageAlert="Veuillez selectionner une annonce.";
            require __DIR__ . '/../View/messages.php';
        }
    }


    public static function supprimerAnnonce($base){
        if(isset($_GET['id'])){
            $annonceRepository = new AnnonceRepository($base);
            $exist = $annonceRepository->findById($_GET['id']);
            if($exist){
                $result = $annonceRepository->delete($_GET['id']);
                if($result){
                    header('Location: /index.php/voirAnnonces');
                }else{
                    //envoi d'un message
                    $typeAlert="danger";
                    $messageAlert="L'annonce n'a pas été supprimée. Nous en somme désolé.";
                    require __DIR__ . '/../View/messages.php';
                }
            }else{
                //envoi d'un message
                $typeAlert="danger";
                $messageAlert="Cette annnonce n'existe pas.";
                require __DIR__ . '/../View/messages.php';
            }
        }else{
            //envoi d'un message
            $typeAlert="warning";
            $messageAlert="Veuillez selectionner une annonce avant de la supprimer.";
            require __DIR__ . '/../View/messages.php';
        }

    }

    public static function modifierAnnonce($base){
        if(isset($_GET['id'])){
            $annonceRepository = new AnnonceRepository($base);
            $typeContratRepository = new TypeContratRepository($base);
            $villeRepository = new VilleRepository($base);
            $entrepriseRepository = new EntrepriseRepository($base);

            $annonce = $annonceRepository->findById($_GET['id']);
            if($annonce){
                $listeContrats = $typeContratRepository->findAll();

                $listeVilles = $villeRepository->findAll();

                $ville = $villeRepository->find($annonce->getIdVille());

                $contrat = $typeContratRepository->find($annonce->getIdTypeContrat());

                $entreprise = $entrepriseRepository->find($annonce->getIdEntreprise());

                $annonce2 = null;
                if (isset($_POST['intitule']) && isset($_POST['domaine']) && isset($_POST['dateD']) && isset($_POST['dateF'])) {
                    $annonce2 = new Annonce([
                        'intitule' => $_POST['intitule'],
                        'domaine'   => $_POST['domaine'],
                        'dateDebut' => $_POST['dateD'],
                        'dateFin' => $_POST['dateF'],
                        'description' => $_POST['description'],
                        'salaire' => $_POST['salaire'],
                        'tempsTravail' => $_POST['tempsTravail'],
                        'idEntreprise' => $annonce->getIdEntreprise(),
                        'idVille' => $_POST['ville'],
                        'idTypeContrat' => $_POST['typeContrat']
                    ]);

                    $result = $annonceRepository->modify($annonce->getId(),$annonce2);
                    if($result){
                        //envoi d'un message
                        $typeAlert="success";
                        $messageAlert="Votre annonce a bien été modifié.";
                        require __DIR__ . '/../View/messages.php';
                    }else{
                        //envoi d'un message
                        $typeAlert="danger";
                        $messageAlert="Une erreur s'est produite. Veuillez nous en excuser.";
                        require __DIR__ . '/../View/messages.php';
                    }
                }

                require __DIR__.'/../view/Annonces/modifierAnnonce.php';

            }else{
                //envoi d'un message
                $typeAlert="danger";
                $messageAlert="Cette annnonce n'existe pas.";
                require __DIR__ . '/../View/messages.php';
            }
        }else{
            //envoi d'un message
            $typeAlert="warning";
            $messageAlert="Veuillez selectionner une annonce avant de la modifier.";
            require __DIR__ . '/../View/messages.php';
        }

    }
}