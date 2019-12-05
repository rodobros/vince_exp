<?php
require_once("inc/sessionUtilisateur.php");
require_once("inc/connectDB.php");
require_once("inc/sql.php");

$genre_nom_recherche = isset($_POST['recherche']) ? trim($_POST['genre_nom_recherche']) : "";
$tri_critere         = isset($_POST['tri']) ? trim($_POST['tri_critere']) : "genre_id";
$tri_sens            = isset($_POST['tri']) ? trim($_POST['tri_sens']) : "ASC";
$liste = sqlListerGenres($conn, $genre_nom_recherche, $tri_critere, $tri_sens);
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
        <h1>Liste des genres</h1>
        
        <form id="recherche" action="genresListe.php" method="post">
            <label>Genre</label>
            <input type="text"
                   name="genre_nom_recherche"
                   value="<?php echo $genre_nom_recherche ?>"
                   placeholder = "contient cette chaîne de caractères">
            <input type="submit" name="recherche" value="Recherchez"> 
        </form>
        
        <form id="tri" action="genresListe.php" method="post">
            <label>Critère de tri</label>
            <select name="tri_critere">
                <option value="genre_id"  <?php echo $tri_critere === "genre_id" ? "selected" : "" ?>>ID</option>
                <option value="genre_nom" <?php echo $tri_critere === "genre_nom" ? "selected" : "" ?>>Genre</option>
            </select>
            <input type="radio" name="tri_sens" value="ASC" <?php echo $tri_sens === "ASC" ? "checked" : "" ?>>
            <label>croissant</label>
            <input type="radio" name="tri_sens" value="DESC" <?php echo $tri_sens === "DESC" ? "checked" : "" ?>>
            <label>décroissant</label>
            <input type="submit" name="tri" value="Triez"> 
        </form>

        <p><a href="genresAjout.php">Ajouter un genre</a></p>    
        
    <?php if (count($liste) > 0) : ?>
        <table>
            <tr><th>ID</th><th>Nom</th><th>Actions</th></tr>
            <?php foreach ($liste as $row) : ?>
            <tr>
                <td><?php echo $row['genre_id'] ?></td>
                <td><?php echo $row['genre_nom'] ?></td>
                <td>
                    <a href="genresModification.php?id=<?php echo $row['genre_id'] ?>">Modifier</a>
                <?php if ($row['nb_films'] === '0') : ?>
                    <a href="genresSuppression.php?id=<?php echo $row['genre_id'] ?>">Supprimer</a>
                <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>Aucun genre trouvé.</p>
    <?php endif; ?>

    </main>
</body>
</html>	
