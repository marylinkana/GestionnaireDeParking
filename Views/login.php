
  <form method="post">
    <h2 class="form-login-heading">Login</h2>
    <div class="login-wrap">
      <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
      <br>
      <input type="password" id="password" name="mdp" class="form-control" placeholder="Password" required="required">
      <label class="checkbox">
        <input type="checkbox" name="remember" value="remember-me"> Remember me
        <span class="pull-right">
        <a data-toggle="modal" href=""> Forgot Password?</a>
        </span>
        </label>
      <input class="btn btn-theme btn-block" type="submit" name="submit"  value="Login">
      <br>
      <div class="registration">
        Don't have an account yet?<br/>
        <a class="" href="register">
          Create an account
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