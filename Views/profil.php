
  <form method="post">
    <h2 class="form-login-heading">Mon profil</h2>
    <div class="login-wrap">
      <input type="text" id="nom" name="nom" class="form-control" value="<?= $_SESSION['nom']?>" > <br>
      <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $_SESSION['prenom']?>"> <br>
      <input type="email" id="email" name="email" class="form-control" value="<?= $_SESSION['email']?>" > <br>
      <input type="password" id="inputPassword" name="mdp" class="form-control" value="<?= $_SESSION['mdp']?>"> <hr>
      <!-- <input type="text" class="form-control" value="<?='Nom : '.$_SESSION['nom']?>" ><br>
      <input type="text" class="form-control" value="<?='Prenom : '.$_SESSION['prenom']?>"><br>
      <input type="email" class="form-control" value="<?='Email : '.$_SESSION['email']?>" ><br>
      <input type="password" class="form-control" placeholder="Your password"><hr> -->
      <button class="btn btn-theme btn-block" name="registerProfil" type="submit"><i class="fa fa-register"></i> Enregister </button>
    </div>
  </form>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/backgroundaccueil.jpg", {
      speed: 500
    });
  </script>
