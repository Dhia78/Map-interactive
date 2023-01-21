<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');

if(isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?"); 
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Access-Control-Allow-Origin" content="*" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commentaires</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>	

    <link rel="stylesheet" href="commentaires.css">
    <script src="scriptJS"></script>


   <!-- Load Esri Leaflet from CDN -->
   <script
     src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js"
     integrity="sha512-cMQ5e58BDuu1pr9BQ/eGRn6HaR6Olh0ofcHFWe5XesdCITVuSBiBZZbhCijBe5ya238f/zMMRYIMIIg1jxv4sQ=="
     crossorigin=""
   ></script>

   <!-- Load Esri Leaflet Geocoder from CDN -->
   <link
     rel="stylesheet"
     href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css"
     integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
     crossorigin=""
   />
   <script
     src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js"
     integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ=="
     crossorigin=""
   ></script>
   
   
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>	



    <script src="/js/lib/dummy.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/result-light.css">


    <script type="text/javascript" src="https://ignf.github.io/geoportal-extensions/leaflet-latest/dist/GpPluginLeaflet.js"></script>
    <link rel="stylesheet" type="text/css" href="https://ignf.github.io/geoportal-extensions/leaflet-latest/dist/GpPluginLeaflet.css">

    <!-- Tailwind is included -->
  <link rel="stylesheet" href="main.css?v=1628755089081">



  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
 
</head>
<body>

<h1>Commentaires</h1>
    <div id="app">

       
       <nav id="navbar-main" class="navbar is-fixed-top">
         <div class="navbar-brand">
           <a class="navbar-item mobile-aside-button">
             <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
           </a>
           
         </div>
         <div class="navbar-brand is-right">
           <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
             <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
           </a>
         </div>
         <div class="navbar-menu" id="navbar-menu">
           <div class="navbar-end">
             
             
             <div class="navbar-item dropdown has-divider has-user-avatar">
               <a class="navbar-link">
                 <div class="user-avatar">
                   <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="" class="rounded-full">
                 </div>
                 <div class="is-user-name"><?php echo $user['identifiant']; ?></div>
                 <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
               </a>
               <div class="navbar-dropdown">
                 <a href="profil.php" class="navbar-item">
                   <span class="icon"><i class="mdi mdi-account"></i></span>
                   <span>Mon Profil</span>
                 </a>
                 <a href="commentaires.php" class="navbar-item">
                    <span class="icon"><i class="mdi mdi-email"></i></span>
                    <span>Commentaires</span>
                  </a>
                 <hr class="navbar-divider">
                 <a class="navbar-item" href="deconnexion.php">
                   <span class="icon"><i class="mdi mdi-logout"></i></span>
                   <span>Déconnexion</span>
                 </a>
               </div>
             </div>
             <a title="Home" class="navbar-item desktop-icon-only" href="index.php">
               <span class="icon"><i class="mdi mdi-home"></i></span>
               <span>Home</span>
             </a>
           </div>
         </div>
       </nav>
       
    </div>
    <br>
    <br>
    <div class="monuments">
        <div id='m1'><h2><a href="1.php?id=1">Statue de la Liberte</a></h2></div>
        <div id='m2'><h2><a href="2.php?id=2">Muraille de Chine</a></h2></div>
        <div id='m3'><h2><a href="3.php?id=3">Sagrada Familia</a></h2></div>
        <div id='m4'><h2><a href="4.php?id=4">Pyramide de Gizeh</a></h2></div>
        <div id='m5'><h2><a href="5.php?id=5">Christ Rédempteur</a></h2></div>
        <div id='m6'><h2><a href="6.php?id=6">Tour de Pise</a></h2></div>
        <div id='m7'><h2><a href="7.php?id=7">Tour Eiffel</a></h2></div>
        <div id='m8'><h2><a href="8.php?id=8">Taj Mahal</a></h2></div>
        <div id='m9'><h2><a href="9.php?id=9">Macchu Picchu</a></h2></div>
        <div id='m10'><h2><a href="10.php?id=10">Le temple d’Angkor Wat</a></h2></div>
        <div id='m11'><h2><a href="11.php?id=11">Opéra Sydney</a></h2></div>
        <div id='m12'><h2><a href="12.php?id=12">Lincoln Memorial</a></h2></div>
        <div id='m13'><h2><a href="13.php?id=13">Ancienne Ville Maya</a></h2></div>
        <div id='m14'><h2><a href="14.php?id=14">Notre-Dame de Paris</a></h2></div>
        <div id='m15'><h2><a href="15.php?id=15">Collisée</a></h2></div>
        <div id='m16'><h2><a href="16.php?id=16">Pont Charles</a></h2></div>
        <div id='m17'><h2><a href="17.php?id=17">Chichen Itza</a></h2></div>
        <div id='m18'><h2><a href="18.php?id=18">Big Ben</a></h2></div>
        <div id='m19'><h2><a href="19.php?id=19">Burj Khalifa</a></h2></div>
        <div id='m20'><h2><a href="20.php?id=20">Empire State Building</a></h2></div>
        <div id='m21'><h2><a href="21.php?id=21">Times Square</a></h2></div>
        <div id='m22'><h2><a href="22.php?id=22">Maison Blanche</a></h2></div>
        <div id='m23'><h2><a href="23.php?id=23">Arc de Triomphe</a></h2></div>
        <div id='m24'><h2><a href="24.php?id=24">Place Rouge</a></h2></div>
        <div id='m25'><h2><a href="25.php?id=25">Mont Fuji</a></h2></div>
        <div id='m26'><h2><a href="26.php?id=26">Buckingham Palace</a></h2></div>
        <div id='m27'><h2><a href="27.php?id=27">Mont Rushmore</a></h2></div>
        <div id='m28'><h2><a href="28.php?id=28">Sphinx de Gizeh</a></h2></div>
        <div id='m29'><h2><a href="29.php?id=29">Sacré Coeur</a></h2></div>
        <div id='m30'><h2><a href="30.php?id=30">Tour d'Afrique</a></h2></div>
        <div id='m31'><h2><a href="31.php?id=31">Montagne de la Table</a></h2></div>


    </div>
             <!-- Scripts below are for demo only -->
<script type="text/javascript" src="main.min.js?v=1628755089081"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="chart.sample.min.js"></script>


<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">


</body>
</html>