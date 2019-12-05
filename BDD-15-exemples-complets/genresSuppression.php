<?php
require_once("inc/sessionUtilisateur.php");
require_once("inc/connectDB.php");
require_once("inc/sql.php");

// retour du formulaire de confirmation
// ------------------------------------
        
$confirme = isset($_POST['confirme']) ? $_POST['confirme'] : "";

if ($confirme !== "") {

    if ($confirme === "OUI") {
        $id = $_POST['genre_id'];
        $codRet = sqlSupprimerGenre($conn, $id);
        if      ($codRet === 1)  $message = "Suppression effectuée.";
        elseif  ($codRet === 0)  $message = "Aucune supression.";
    } else {
        $message = "Suppression non effectuée.";
    }

} else {
    
    // lecture du genre à supprimer
    // ----------------------------

    $id = isset($_GET['id']) ? $_GET['id'] : "";                
    $row = array();
    if ( $id !== "" ) $row = sqlLireGenre($conn, $id);
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Liste des genres">
    <title>Liste des genres</title>
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
        <h1>Suppression d'un genre</h1>

        <p><?php echo isset($message) ? $message : "&nbsp;" ?></p>
    
<?php if (isset($row)) : ?>
    <?php if (count($row) > 0) : ?>
        <section>
            <p>Confirmez la suppression du genre <?php echo $row['genre_nom'] ?></p>
            <form class="form-suppression" action="genresSuppression.php" method="post"> 
                <input type="hidden" name="genre_id" value="<?php echo $id ?>">
                <input type="submit" name="confirme" value="OUI"> 
                <input type="submit" name="confirme" value="NON">
            </form>
        </section>
    <?php else : ?>
        <p>Il n'y a pas de genre pour cet identifiant.</p>
    <?php endif; ?>
<?php endif; ?>
        
    </main>
</body>
</html>	
