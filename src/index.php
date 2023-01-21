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
    <title>Les Monuments du Monde </title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <script type="text/javascript" src="https://ignf.github.io/geoportal-extensions/leaflet-latest/dist/GpPluginLeaflet.js"> </script>

    <link rel="stylesheet" type="text/css" href="https://ignf.github.io/geoportal-extensions/leaflet-latest/dist/GpPluginLeaflet.css">	

    <link rel="stylesheet" href="style.css">
    <script src="scriptJS"></script>


  <link rel="stylesheet" href="main.css">


   <script
     src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js"
     integrity="sha512-cMQ5e58BDuu1pr9BQ/eGRn6HaR6Olh0ofcHFWe5XesdCITVuSBiBZZbhCijBe5ya238f/zMMRYIMIIg1jxv4sQ=="
     crossorigin=""
   ></script>

    
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


</head>
<body>
  <h1>Les Différents Monuments dans le Monde </h1>
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
  
    <div id="map"></div>
    <br>
    <div class="recherche">
        <input type="text" id="cp" value=""/>
        <input  type="submit" id="valider" value="Trouver"/></br>
        <input id="affiche" type="button" value="Afficher tous les monuments">
        <input id="retirer" type="button" value="Retirer tous les monuments">

    </div>
    <button id="open-button" onclick="openForm()"> Ajouter un monument </button>
    <div class="ajout" id="myForm">
        <p>
            <label for="Name"> Monuments </label>
            <input id="monument" type="text" placeholder="Nom du monuments" name="monuments" required/>
        </p>
        <p>
            <label for="Name"> Taille </label>
            <input id="taille" type="text" placeholder="Taille" name="taille"/>
        </p>
        <p>
            <label for="Lieu">Lieu</label>
            <input id="lieu" name="lieu"  placeholder="Lieu du Monuments" type="text" required />
        <p>
            <label for="Coordonnees"> Coordonnees </label>
            <input id="lot" name="Coordonnees"  placeholder="Coordonnees lot" type="code" required />
        </p>
        <p>
            <label for="Coordonnees"> Coordonnees </label>
            <input id="lat" name="Coordonnees"  placeholder="Coordonnees lat" type="code" required />
        </p>
        <p>
            <label for="Postal">Commentaire</label>
            <input id="avis" name="commentaire"  placeholder="Votre Avis" type="text" required />
        </p>
        <button type="submit" id="ajouter"> Valider </button>
        <button type="button" class="btn-cancel" onclick="closeForm()"> Annuler </button>


    

      <!-- Scripts below are for demo only -->
<script type="text/javascript" src="main.min.js?v=1628755089081"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="chart.sample.min.js"></script>


<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">


</body>
</html>

