
  <form method="post">
    <h2 class="form-login-heading">Sing up</h2>
    <div class="login-wrap">
      <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required="required" autofocus="autofocus">
      <br>
      <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prenom" required="required">
      <br>
      <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required" >
      <br>
      <input type="password" id="inputPassword" name="mdp" class="form-control" placeholder="Password" required="required">
      <br>
      <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> Sing up </button>
      <hr>
      <div class="registration">
        have an account yet?<br/>
        <a class="" href="login">
          Sing in
          </a>
      </div>
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
