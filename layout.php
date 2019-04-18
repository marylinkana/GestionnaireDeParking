<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>PARKING M2L</title>

  <!-- Favicons -->
  <link href="img/logo.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <script src="lib/jquery/jquery.js"></script>


</head>

<body>
  <section id="container">

    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Navigation"></div>
      </div>
      <!--logo start-->
      <a href="accueil" class="logo"><b>PARKING <span> M2L </span></b></a>
      <?php
           if (isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){
               //var_dump($_SESSION);
               echo '
                    <div class="top-menu">
                    <div class="text-center">
                      <p>
                        <a style="margin-left:340px;" class="logo"><b> Bienvenue <span> '.$_SESSION['nom'].'</span></b></a>
                      </p>
                    </div>
                        <ul class="nav pull-right top-menu">
                            <li><a class="logout" href="logout">Logout</a></li>
                        </ul>
                     </div>';
            }
            else{ //var_dump($_SESSION);
                echo '<div class="top-menu">
                        <ul class="nav pull-right top-menu">
                            <li><a class="logout" href="login">Login</a></li>
                        </ul>
                     </div>';
            }
      ?>

    </header>
    <!--sidebar start-->
    <?php
           if (isset($_SESSION['connecte']) && $_SESSION['connecte'] == true ){
    ?>
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profil"><img src="img/logo.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Mon profil</h5>
          <!-- <li class="mt">
            <a class="javascript:;" id="accu" href="accueil" onclick="ActiveDesactive('accu')">
              <i class="fa fa-home"></i>
              <span>Accueil</span>
              </a>
          </li> -->
          <li class="sub-menu">
            <a class="javascript:;"  href="accueil">
              <i class="fa fa-user"></i>
              <span>Accueil</span>
              </a>
          </li>
          <?php
                 if (isset($_SESSION['connecte']) && isset($_SESSION['connecte']) && $_SESSION['connecte'] == true && $_SESSION['niveau'] == 2){
          ?>
          <li class="javascript:;" >
              <a class="javascript:;" href="admin" onclick="ActiveDesactive('admi')">
                <i class="fa fa-dashboard"></i>
                <span>Admin</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" onclick="ActiveDesactive('memb')">
              <i class="fa fa-users"></i>
              <span>Membres</span>
              </a>
            <ul class="">
              <li><button id="afficherMasquer" type="button" class="btn btn-theme" style="width:140px" onclick="AfficherMasquer('insc')">Inscriptions</button></li>
              <li><button id="afficherMasquer" type="button" class="btn btn-theme" style="width:140px"  onclick="AfficherMasquer('user')">Utilisateur</button></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" onclick="ActiveDesactive('park')">
              <i class="fa fa-car"></i>
              <span>Parking</span>
              </a>
            <ul class="">
              <li><button id="afficherMasquer" type="button" class="btn btn-theme" style="width:140px" onclick="AfficherMasquer('resv')">Reservations</button></li>
              <li><button id="afficherMasquer" type="button" class="btn btn-theme" style="width:140px" onclick="AfficherMasquer('file')">File</button></li>
              <li><button id="afficherMasquer" type="button" class="btn btn-theme" style="width:140px" onclick="AfficherMasquer('disp')">Disponibilités</button></li>
              <li><button id="afficherMasquer" type="button" class="btn btn-theme" style="width:140px" onclick="AfficherMasquer('cree')">Créer</button></li>
            </ul>
          </li>
          <?php } ?>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <?php } ?>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <div class="row mt">
                <?php
                    echo $content;
                ?>
                <!--footer class="site-footer">
                  <div class="text-center">
                    <p>
                      &copy; Copyrights <strong>Baudoin KANA</strong>. All Rights Reserved
                    </p>
                    <a href="index.html#" class="go-top">
                      <i class="fa fa-angle-up"></i>
                      </a>
                  </div>
                </footer-->
              </div>
            </div>
          </div>
        </section>
      </section>

      <!-- js placed at the end of the document so the pages load faster -->
      <script src="lib/jquery/jquery.min.js"></script>

      <script src="lib/bootstrap/js/bootstrap.min.js"></script>
      <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
      <script src="lib/jquery.scrollTo.min.js"></script>
      <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
      <script src="lib/jquery.sparkline.js"></script>
      <!--common script for all pages-->
      <script src="lib/common-scripts.js"></script>
      <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
      <script type="text/javascript" src="lib/gritter-conf.js"></script>
      <!--script for this page-->
      <script src="lib/sparkline-chart.js"></script>
      <script src="lib/zabuto_calendar.js"></script>
      <!-- js placed at the end of the document so the pages load faster -->
      <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
      <script>
        function AfficherMasquer($id)
        {
          if ( 'resv' != $id){
            divInfo = document.getElementById('resv');
            divInfo.style.display = 'none';
          }
          if ( 'file' != $id){
            divInfo = document.getElementById('file');
            divInfo.style.display = 'none';
          }
          if ( 'disp' != $id){
            divInfo = document.getElementById('disp');
            divInfo.style.display = 'none';
          }
          if ( 'cree' != $id){
            divInfo = document.getElementById('cree');
            divInfo.style.display = 'none';
          }
          if ( 'insc' != $id){
            divInfo = document.getElementById('insc');
            divInfo.style.display = 'none';
          }
          if ( 'user' != $id){
            divInfo = document.getElementById('user');
            divInfo.style.display = 'none';
          }
          divInfo = document.getElementById($id);
          divInfo.style.display = 'block';
        }

        function ActiveDesactive($id)
        {
        divInfo = document.getElementById($id);

        if (divInfo.class == 'active')
        divInfo.class = 'javascript:;';
        else
        divInfo.class = 'active';
        }
      </script>
      <script>
      $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
      })
      </script>
      <script> $('.alert').alert(); </script>
      <?php
          if (isset($_SESSION['connecte'])){
            ?><script>
              $.backstretch("img/backgroundadmin.jpg", {
                speed: 500
              });
            </script><?php
           }
           else{
             ?><script>
               $.backstretch("img/backgroundaccueil.jpg", {
                 speed: 500
               });
             </script><?php
           }
      ?>

</section>
</body>
</html>
