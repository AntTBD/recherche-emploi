      </div>
    </div>
  </div>
  <!-- footer -->
  <footer style="position: fixed;bottom: 0;width:100%;background-color:#f1f1f1;" id="myFooter">
    <div class="container-fluid">
      <div class="row">
        <div id="footer-copyright" class="col text-center">
          <hr>
          <p>&copy; <?= date('Y') ?> Copyright : TABARAUD Antoine  - MORAND Martin - FRANCESHI Jonas. Tous droits réservés.</p>
          <p><i><a href="/index.php/mentionsLegales">Mentions Légales</a></i></p>
        </div>
      </div>
    </div>
  </footer>
  <!-- fin footer -->

  <script>
  //changement de la hauteur du body pour avoir le footer en bas de page tout le temps
  var hauteurFooter=document.getElementById("myFooter").offsetHeight;
  document.getElementById("myBody").style.paddingBottom = hauteurFooter+"px";

  setInterval(function(){
    hauteurFooter=document.getElementById("myFooter").offsetHeight;
    document.getElementById("myBody").style.paddingBottom = hauteurFooter+"px";
  }, 1000);

  </script>
</body>
</html>
