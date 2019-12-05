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
    
    $row['genre_id'] = $_POST['genre_id'];
    
    $row['genre_nom'] = trim($_POST['genre_nom']);
    if (!preg_match('/^[a-z àéèêô]+$/i', $row['genre_nom'])) {
        $erreurs['genre_nom'] = "Nom incorrect.";
    }
    
    // modification dans la table genres si aucune erreur
    // --------------------------------------------------
    
    if (count($erreurs) === 0) {
        if (sqlModifierGenre($conn, $row['genre_id'], $row['genre_nom']) === 1) {
            $retSQL="Modification effectuée.";    
        } else {
            $retSQL ="Modification non effectuée.";    
        }
    }
    
} else {
    // lecture du genre à modifier, à la première ouverture de la page
    // ---------------------------------------------------------------

    $id = isset($_GET['id']) ? $_GET['id'] : "";                
    $row = array();
    if ( $id !== "" ) $row = sqlLireGenre($conn, $id);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Modification d'un genre">
    <title>Modification d'un genre</title>
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
        <h1>Modification d'un genre</h1>

        <p><?php echo isset($retSQL) ? $retSQL : "&nbsp;" ?></p>
 
    <?php if (count($row) > 0) : ?>        
        <form action="genresModification.php" method="post">
            <label>Nom du genre</label>
            <input type="text"   name="genre_nom" value="<?php echo $row['genre_nom'] ?>" required>
            <span><?php echo isset($erreurs['genre_nom']) ? $erreurs['genre_nom'] : "&nbsp;"  ?></span>
            <input type="hidden" name="genre_id" value="<?php echo $row['genre_id'] ?>">
            <input type="submit" name="envoi" value="Envoyez"> 
        </form>
    <?php else : ?>
        <p>Il n'y a pas de genre pour cet identifiant.</p>
    <?php endif; ?>
        
    </main>
</body>
</html>	
