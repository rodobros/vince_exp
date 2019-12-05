<?php
require_once("inc/connectDB.php");
require_once("inc/sql.php");

// test retour de saisie du formulaire
// -----------------------------------        

if (isset($_POST['envoi'])) {

    $identifiant = trim($_POST['identifiant']);
    $mot_de_passe = trim($_POST['mot_de_passe']);

    
    if (sqlControlerUtilisateur($conn, $identifiant, $mot_de_passe) === 1) {
        session_start();
        $_SESSION['identifiant_utilisateur'] = $identifiant;
        header('Location: admin.php'); 
    } else {
        $erreur = "Identifiant ou mot de passe incorrect.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Authentification">
    <title>Authentification</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
    </header>
    <main>
        <h1>Authentification</h1>
<!-- qsdvqdv  -->
        <p><?php echo isset($erreur) ? $erreur : "&nbsp;" ?></p>
        
        <form id="authentification" action="authentification.php" method="post">
            <label>Identifiant</label>
            <input type="text"   name="identifiant" value="" required>
            <label>Mot de passe</label>
            <input type="password"   name="mot_de_passe" value="" required>
            <input type="submit" name="envoi" value="Envoyez"> 
        </form>

    </main>
</body>
</html>	
