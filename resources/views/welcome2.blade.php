<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Gt-stock</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="plugins/Venobox/venobox.css">
  <!-- aos -->
  <link rel="stylesheet" href="plugins/aos/aos.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>


<!-- navigation -->
<section class="fixed-top navigation">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      
      <!-- navbar -->
      <div class="collapse navbar-collapse text-center" id="navbar">

    @if (Route::has('login'))
        <ul class="navbar-nav ml-auto">
            @auth
              <li class="nav-item">
               <a class="btn btn-primary ml-lg-3 primary-shadow" href="{{ url('/home') }}">Home</a>
               </li>
            @else
               <li class="nav-item">
               <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
              </li>
              @if (Route::has('register'))
                <li class="nav-item">
                 <a  class="btn btn-primary ml-lg-3 primary-shadow" href="{{ route('register') }}">S'inscrire</a>
               </li>
               @endif
             @endauth
        </ul>
    @endif
       <!-- <a href="{{ route('login') }}" class="btn btn-primary ml-lg-3 primary-shadow">Espace Administrative</a> -->
      </div>
    </nav>
  </div>

</section>
<!-- /navigation -->

<!-- hero area -->
<section class="hero-section hero" data-background="" style="background-image: url(images/hero-area/banner-bg.png);">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center zindex-1">
        <h1 class="mb-3">Bienvenue<br>
            Notre Gestionnaire </h1>
        <p class="mb-4">Votre espace de travail<br>
            Améliorez vos performances avec un logiciel de gestion des stocks simple.</p>

      </div>
    </div>
  </div>
  <!-- background shapes -->
  <div id="scene">
    <img class="img-fluid hero-bg-1 up-down-animation" src="images/background-shape/feature-bg-2.png" alt="">
    <img class="img-fluid hero-bg-2 left-right-animation" src="images/background-shape/seo-ball-1.png" alt="">
    <img class="img-fluid hero-bg-3 left-right-animation" src="images/background-shape/seo-half-cycle.png" alt="">
    <img class="img-fluid hero-bg-4 up-down-animation" src="images/background-shape/green-dot.png" alt="">
    <img class="img-fluid hero-bg-5 left-right-animation" src="images/background-shape/blue-half-cycle.png" alt="">
    <img class="img-fluid hero-bg-6 up-down-animation" src="images/background-shape/seo-ball-1.png" alt="">
    <img class="img-fluid hero-bg-7 left-right-animation" src="images/background-shape/yellow-triangle.png" alt="">
    <img class="img-fluid hero-bg-8 up-down-animation" src="images/background-shape/service-half-cycle.png" alt="">
    <img class="img-fluid hero-bg-9 up-down-animation" src="images/background-shape/team-bg-triangle.png" alt="">
  </div>
</section>
<!-- /hero-area -->

<!-- feature -->

<!-- /feature -->

<!-- marketing -->

<!-- /marketing -->

<!-- service -->

<!-- /service -->

<!-- team -->

<!-- /team -->

<!-- pricing -->

<!-- /pricing -->

<!-- client logo slider -->

<!-- /client logo slider -->

<!-- newsletter -->

<!-- /newsletter -->

<!-- footer -->

<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="plugins/Venobox/venobox.min.js"></script>
<!-- aos -->
<script src="plugins/aos/aos.js"></script>
<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>



