<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_commentaire; charset=utf8', 'root','');


if(isset($_GET['id']) AND !empty($_GET['id']))
{
    $getid = htmlspecialchars($_GET['id']);

    $monument = $bdd->prepare('SELECT * FROM monuments WHERE id = ?');
    $monument->execute(array($getid));
    $monument = $monument->fetch();



    if(isset($_POST['submit_commentaire']))
    {
        if(isset($_POST['pseudo'], $_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire']))
        {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $commentaire = htmlspecialchars($_POST['commentaire']);

            $ins = $bdd->prepare('INSERT INTO commentaires (pseudo, commentaire, id_monument) VALUES (?,?,?)');
            $ins->execute(array($pseudo,$commentaire,$getid));
            $msg = "Votre commentaire à bien été envoyé";
        }
        else
        {
            $msg = "Tous les champs doivent être complétés";
        }
    }

    $commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE id_monument = ? ORDER BY id DESC');
    $commentaires->execute(array($getid));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times Square</title>
    <link rel="stylesheet" href="monuments.css">


 
</head>
<body>
<a title="Home" class="navbar-item desktop-icon-only" href="index.php">
                <span class="icon"><i class="mdi mdi-home"></i></span>
                <span>Home</span>
            </a>
            <br>
            <a title="Home" class="navbar-item desktop-icon-only" href="commentaires.php">
                <span class="icon"><i class="mdi mdi-keyboard-return"></i></span>
                <span>Return</span>
            </a>

    <h1>Times Square</h1>



    <h2>Description:<h2>
    <h3><?= $monument['description']; ?></h3>

    <h2>Commentaires:<h2>
    <form method="POST">
        <input type="text" name="pseudo" placeholder="Votre pseudo"><br>
        <textarea name="commentaire" placeholder="Votre commentaire..."></textarea><br>
        <input type="submit" value="Envoyer" name="submit_commentaire">
    </form>
    <?php if (isset($msg)) { echo $msg;} ?>
    <br>
    <?php while($c = $commentaires->fetch()){ ?>
        <b><?= $c['pseudo'] ?> :</b> <?= $c['commentaire'] ?><br>
    <?php } ?>



                 <!-- Scripts below are for demo only -->
<script type="text/javascript" src="main.min.js?v=1628755089081"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="chart.sample.min.js"></script>


<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">


</body>
</html>

<?php
}
?>
