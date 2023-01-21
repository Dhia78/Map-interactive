<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');

if(isset($_POST['formconnexion']))
{
    $identifiantconnect = htmlspecialchars($_POST['identifiantconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($identifiantconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE identifiant = ? AND mdp = ?");
        $requser->execute(array($identifiantconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['identifiant'] = $userinfo['identifiant'];
            $_SESSION['email'] = $userinfo['email'];
            function Redirect($url, $code = 302){
                if (strncmp('cli', PHP_SAPI, 3) !== 0) {
                  if (headers_sent() !== true) {
                    if (strlen(session_id()) > 0) {// if using sessions
               
                    session_regenerate_id(true); // avoids session fixation      attacks
               
                    session_write_close(); // avoids having sessions lock other requests
               
                    }
               
                    if (strncmp('cgi', PHP_SAPI, 3) === 0) {
                      header(sprintf('Status: %03u', $code), true, $code);
                    }
               
                    header('Location: ' . $url, true, (preg_match('~^30[1237]$~', $code) >  0) ? $code : 302);
                  }
                  exit();
                }
              }
              Redirect('index.php?id='.$_SESSION['id']);
        }
        else
        {
            $erreur = "Mauvais identifiant ou mot de passe";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <base target="_top">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./co-inscrip.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <title>Connexion</title>
</head>
<body>

    <section class="vh-100 gradient-custom">
        <form method="POST">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
    
                    <div class="mb-md-3 mt-md-3 pb-3">
    
                    <h2 class="fw-bold mb-2 text-uppercase">Connexion</h2>
                    <?php if(isset($erreur)){echo '<font color="red">'.$erreur.'</font>';}?>
                    <?php if(isset($erreur1)){echo '<font color="green">'.$erreur1.'</font>';}?>
                    <p class="text-white-50 mb-5">Choisissez votre identifiant et votre mot de passe!</p>
    
                    <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeLogin">Identifiant</label>
                    <input type="login" id="typeLogin" class="form-control form-control-lg" name="identifiantconnect" placeholder=""/>
                    
                    </div>

                    <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Mot de Passe</label>
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="mdpconnect" placeholder=""/>
                    
                    </div>

    
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="formconnexion">Connecter</button><br><br>
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="forminscription"><a href="inscription.php">S'inscrire</a></button>
                </div>
    
                </div>
                </div>
             </div>
            </div>
        </div>
        </form>
    </section>

</body>
</html>