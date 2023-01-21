<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');

if(isset($_POST['forminscription']))
{ 
    $identifiant = htmlspecialchars($_POST['identifiant']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    $reqidentifiant = $bdd->prepare("SELECT * FROM membres WHERE identifiant = ?");
    $reqidentifiant->execute(array($identifiant));
    $identifiantexist = $reqidentifiant->rowCount();
    if($identifiantexist == 0)
    {
        if(!empty($identifiant) AND !empty($mdp) AND !empty($mdp2) AND !empty($email))
        {
            

            $identifiantlenght = strlen($identifiant);
            if($identifiantlenght <= 255)
            {
                $reqemail = $bdd->prepare("SELECT * FROM membres WHERE email = ?");
                $reqemail->execute(array($email));
                $emailexist = $reqemail->rowCount();
                if($emailexist == 0)
                {
                    if($mdp == $mdp2)
                    {
                        $insertmbr = $bdd->prepare("INSERT INTO membres(identifiant,email,mdp) VALUES(?,?,?)");
                        $insertmbr->execute(array($identifiant,$email,$mdp));
                        $erreur1 = "Votre compte a bien été crée ! <a href=\"connexion.php\"> Me connecter</a>";
                    }
                    else
                    {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                    }
                }
                else
                {
                    $erreur = "Email déjà utilisée !";
                }
            }
            else
            {
                $erreur = "Votre identifiant ne doit pas dépasser 255 caractères !";
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être complétés";
        }
    }
    else
    {
        $erreur = "Identifiant déjà utilisée !";
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

    <title>Inscription</title>
</head>
<body>

    <section class="vh-100 gradient-custom">
        <form method="POST">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
    
                    <div class="mb-md-2.8 mt-md-2.8 pb-2.8">
    
                    <h2 class="fw-bold mb-2 text-uppercase">Inscription</h2>
                    <?php if(isset($erreur)){echo '<font color="red">'.$erreur.'</font>';}?>
                    <?php if(isset($erreur1)){echo '<font color="green">'.$erreur1.'</font>';}?>
                    <p class="text-white-50 mb-5">Choisissez votre identifiant et votre mot de passe!</p>
    
                    <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeLogin">Identifiant</label>
                    <input type="login" id="typeLogin" class="form-control form-control-lg" name="identifiant" value="<?php if(isset($identifiant)) { echo $identifiant; }?>"/>
                    
                    </div>

                    <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeLogin">Email</label>
                    <input type="email" id="typeEmail" class="form-control form-control-lg" name="email" value="<?php if(isset($email)) { echo $email; }?>"/>
                    
                    </div>
    
                    <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Mot de Passe</label>
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="mdp"/>
                    
                    </div>

                    <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Confirmation du mot de passe</label>
                    <input type="password" id="typePasswordX2" class="form-control form-control-lg" name="mdp2"/>
                    
                    </div>
    
    
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="forminscription">Valider</button><br><br>
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="formconnexion"><a href="connexion.php">Connexion</a></button>
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