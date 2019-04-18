
  <form method="post">
    <h2 class="form-login-heading">Reset password</h2>
    <div class="login-wrap">
      <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required" >
      <br>
      <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Mot de passe" required="required" >
      <br>
      <button class="btn btn-theme btn-block" name="reset" type="submit"><i class="fa fa-lock"></i> reset </button>
      <hr>
      <div class="registration">
        retour à la connetion<br/>
        <a class="btn btn-theme" href="login">
          Login
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
