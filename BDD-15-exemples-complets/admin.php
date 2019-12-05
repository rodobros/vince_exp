<?php
require_once("inc/sessionUtilisateur.php");
require_once("inc/connectDB.php");
require_once("inc/sql.php");

$liste = sqlListerFilms($conn);

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Liste des films">
    <title>Liste des films</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
   <header>
       <a href="deconnexion.php">Déconnexion</a>
        <nav>
            <ul>
                <li><a href="admin.php" class="active">Films</a></li>
                <li><a href="genresListe.php" >Genres</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Liste des films</h1>

        <table>
            <tr>
                <th>Titre</th>
                <th>Durée</th>
                <th>Année de sortie</th>
                <th>Réalisateur(s)</th>
                <th>acteurs(s)</th>
                <th>genre(s)</th>
            </tr>	
            
            <?php foreach ($liste as $film) : ?>
            <tr>
                <td><?php echo $film['film_titre'] ?></td>
                <td><?php echo $film['film_duree'] ?></td>
                <td><?php echo $film['film_annee_sortie'] ?></td>
                <td><?php echo implode("<br>", $film['realisateurs']) ?></td>
                <td><?php echo implode("<br>", $film['acteurs']) ?></td>
                <td><?php echo implode("<br>", $film['genres']) ?></td>
            </tr>
            <?php endforeach; ?>
            
        </table>    
 
    </main>
</body>
</html>	
