<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');

if(isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['newidentifiant']) AND !empty($_POST['newidentifiant']) AND $_POST['newidentifiant'] != $user['identifiant'])
    {
      $newidentifiant = htmlspecialchars($_POST['newidentifiant']);
      $insertidentifiant = $bdd->prepare("UPDATE membres SET identifiant = ? WHERE id = ?");
      $insertidentifiant->execute(array($newidentifiant, $_SESSION['id']));
      function Redirect($url, $code = 302){
        if (strncmp('cli', PHP_SAPI, 3) !== 0) {
          if (headers_sent() !== true) {
            if (strlen(session_id()) > 0) {// if using sessions
       
            session_regenerate_id(true); // avoids session fixation attacks
       
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

    if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email'])
    {
      $newemail = htmlspecialchars($_POST['newemail']);
      $insertemail = $bdd->prepare("UPDATE membres SET email = ? WHERE id = ?");
      $insertemail->execute(array($newemail, $_SESSION['id']));
      function Redirect($url, $code = 302){
        if (strncmp('cli', PHP_SAPI, 3) !== 0) {
          if (headers_sent() !== true) {
            if (strlen(session_id()) > 0) {// if using sessions
       
            session_regenerate_id(true); // avoids session fixation attacks
       
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

    if(isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
    {
      $mdp = sha1($_POST['newmdp']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp == $mdp2)
      {
          $insertmdp = $bdd->prepare("UPDATE membres SET mdp = ? WHERE id = ?");
          $insertmdp->execute(array($mdp, $_SESSION['id']));
          function Redirect($url, $code = 302){
            if (strncmp('cli', PHP_SAPI, 3) !== 0) {
              if (headers_sent() !== true) {
                if (strlen(session_id()) > 0) {// if using sessions
           
                session_regenerate_id(true); // avoids session fixation attacks
           
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
          $msg = "Vos mots de passe ne correspondent pas";
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile - Admin One Tailwind CSS Admin Dashboard</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="main.css?v=1628755089081">
</head>
<body>

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
              <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
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
    
        <a title="Log out" class="navbar-item desktop-icon-only" href="index.php">
               <span class="icon"><i class="mdi mdi-home"></i></span>
               <span>Log out</span>
             </a>
      </div>
    </div>
  </nav>


<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Profile</li>
    </ul>
   
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Profile
    </h1>
  </div>
</section>

  <section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            Edit Profile
          </p>
        </header>
        <div class="card-content">
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="field">
              <label class="label">Avatar</label>
              <div class="field-body">
                <div class="field file">
                  <label class="upload control">
                    <a class="button blue">
                      Upload
                    </a>
                    <input type="file" name="avatar">
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <?php if(isset($msg)) {echo '<font color="red">'.$msg.'</font>';} ?>
            <div class="field">
              <br>
              <label class="label">Identifiant</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="text"  name="newidentifiant" class="input">
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Email</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="email"  name="newemail" class="input">
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Mot de passe</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="password"  name="newmdp" class="input">
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Confirmation du mot de passe</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="password"  name="newmdp2" class="input">
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="field">
              <div class="control">
                <input type="submit" class="button green" value = "Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            Profile
          </p>
        </header>
        <div class="card-content">
          <div class="image w-48 h-48 mx-auto">
            <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" class="rounded-full">
          </div>
          <hr>
          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input type="text" name="identifiant" value="<?php echo $user['identifiant']; ?>">
            </div>
          </div>
          <hr>
          <div class="field">
            <label class="label">E-mail</label>
            <div class="control">
              <input type="text" name="email" value="<?php echo $user['email']; ?>">
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript" src="main.min.js?v=1628755089081"></script>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
<?php
}
else
{
    header("Location: connexion.php");
}
