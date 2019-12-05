<?php
    require_once("include/sql.php");
$liste = afficherProduit();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title> exercice 4</title>

    <style>
        body {
            padding-left: 20px;
        }

        body>main>header>h2 {
            padding-left: 20px;
        }

        body>main>h2 {
            padding-left: 20px;
        }

    </style>
</head>

<body>

    <header>
        <?php require_once("header.php")?>
    </header>

    <main>
        <table>
        <tr>
        <th>nom</th>
        <th>description</th>
        <th>prix</th>
        <th>categorie</th>
        <th>marque</th>
        </tr>
            <?php 
                foreach($liste as $row){
                    
                    echo"<tr>";
                    echo "<td>".$row["produit_nom"]."</td>";
                    echo "<td>".$row["produit_description"]."</td>";
                    echo "<td>".$row["produit_prix"]."</td>";
                    echo "<td>".$row["categorie_nom"]."</td>";
                    echo "<td>".$row["marque_nom"]."</td>";
                    echo "</tr>";
                }
            
            ?>
        </table>

    </main>


</body>




</html>
