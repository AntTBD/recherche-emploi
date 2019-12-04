<!-- mentions legales -->
<h1>Mentions Légales</h1>
<p>Ceci sont les mentions légales ...</p>
<style media="screen">
/* source : https://fr.flossmanuals.net/css3/lettrines-css/ */
  .firstLettrines::first-letter {
  font-family:lobster;
  font-size:3.5em;
  padding-right:0.2em;
  float:left;
  color:red;
  }
</style>
<?php for ($i=0; $i < 6; $i++) { ?>
  <h3>Mention <?= $i + 1 ?> :</h3>
  <p class="firstLettrines">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<?php } ?>
<!-- fin mentions legales -->
