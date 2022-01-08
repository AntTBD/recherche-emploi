# recherche-emploi
Projet TechnologieWeb FST 2019
 
recherche-emploi
 
	|_ includes
		|_ fichiers de config ou fonctions exterieurs
	|_ public
		|_ css
			|_ styles.css
		|_ images

			|_ les images
		|_ js
			|_ javascript.js
		|_ index.php (avec un genre de routeur entre les includes du header et du footer)
	|_ src
		|_ Controller
			|_ controllers qui retournent les bons fichiers
		|_ Model
			|_ Repository
				|_ Repository.php
				|_ autres fiichiers repository des differents class pour connection à la BDD
			|_les class
		|_ View
			|_ Commons
				|_ header / navbar / footer
			|_ les differentes pages du site
	|_ vendor
	|_ composer.json / .phar
	|_ BDD.sql
	|_ README.txt

---

pour que le projet fonction, il vous faut composer d'installé sur votre PC

dans le dossier du projet executer avec le cmd:
"php composer.phar"

puis 

"composer dump-autload"

---

Pour importer une base de donnée exemple, via phpmyadmin:
* creer une BDD recherche_emploi
* puis importer :
	* recherche_emploi structure.sql
	* recherche_emploi insertions datas de bases.sql
	* recherche_emploi datas exemple.sql (il faut mettre la VARIABLE globale foreign key checks à OFF, seulement le temps de l'import)

Les utilisateurs/mdp par default sont : 
* candidat_a@gmail.com
* candidate_b@gmail.com
* entreprise_a@gmail.com
* entreprise_b@gmail.com

<img src="public/images/logo.png" height=100>
