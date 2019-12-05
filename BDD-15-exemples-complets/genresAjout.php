<?php
require_once("inc/sessionUtilisateur.php");
require_once("inc/connectDB.php");
require_once("inc/sql.php");

// test retour de saisie du formulaire
// -----------------------------------        

if (isset($_POST['envoi'])) {
    
    // contrôles des champs saisis
    // ---------------------------
    
    $erreurs = array();
    
    $genre_nom = trim($_POST['genre_nom']);
    if (!preg_match('/^[a-z àéèêô]+$/i', $genre_nom)) {
        $erreurs['genre_nom'] = "Nom incorrect.";
    }
    
    // insertion dans la table genres si aucune erreur
    // -----------------------------------------------
    
    if (count($erreurs) === 0) {
        if (sqlAjouterGenre($conn, $genre_nom) === 1) {
            $retSQL="Ajout effectué.";    
        } else {
            $retSQL ="Ajout non effectué.";    
        }
        $genre_nom = ""; // réinit pour une nouvelle saisie
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ajout d'un genre">
    <title>Ajout d'un genre</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <a href="deconnexion.php">Déconnexion</a>
        <nav>
            <ul>
                <li><a href="admin.php">Films</a></li>
                <li><a href="genresListe.php" class="active">Genres</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Ajout d'un genre</h1>

        <p><?php echo isset($retSQL) ? $retSQL : "&nbsp;" ?></p>
        
        <form action="genresAjout.php" method="post">
            <label>Nom du genre</label>
            <input type="text"   name="genre_nom" value="<?php echo isset($genre_nom) ? $genre_nom : "" ?>" required>
            <span><?php echo isset($erreurs['genre_nom']) ? $erreurs['genre_nom'] : "&nbsp;"  ?></span>
            <input type="submit" name="envoi" value="Envoyez"> 
        </form>

    </main>
</body>
</html>	
