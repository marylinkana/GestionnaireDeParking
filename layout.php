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
               echo '
                    <div class="top-menu">
                    <a style="margin-left:400px;" class="logo"><b> Bienvenue <span> '.$_SESSION['id_u'].'</span></b></a>
                        <ul class="nav pull-right top-menu">
                            <li><a class="logout" href="logout">Logout</a></li>
                        </ul>
                     </div>';
            }
            else{
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
           if (isset($_SESSION['connecte'])){
    ?>
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile"><img src="img/logo.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Parking M2L</h5>
          <li class="mt">
            <a class="active" href="admin">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>UI Elements</span>
              </a>
            <ul class="sub">
              <li><a href="general.html">General</a></li>
              <li><a href="buttons.html">Buttons</a></li>
              <li><a href="panels.html">Panels</a></li>
              <li><a href="font_awesome.html">Font Awesome</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Components</span>
              </a>
            <ul class="sub">
              <li><a href="grids.html">Grids</a></li>
              <li><a href="calendar.html">Calendar</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="todo_list.html">Todo List</a></li>
              <li><a href="dropzone.html">Dropzone File Upload</a></li>
              <li><a href="inline_editor.html">Inline Editor</a></li>
              <li><a href="file_upload.html">Multiple File Upload</a></li>
            </ul>
          </li>
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
