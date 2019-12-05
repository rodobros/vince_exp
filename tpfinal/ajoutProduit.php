<?php
    require_once("include/sql.php");
    $liste = listeCategorie();
    $listeMarque = listeMarque();
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
        <header>

        </header>

        <form action="" method="get">
            <input type="text" name="marque_nom" placeholder="marque nom">
            <input type="submit" name="enregistrerMarque" value="enregistrer">
        </form>

        <form action="" method="get">

            <input type="text" name="categorie_nom" placeholder="categorie nom">
            <input type="submit" name="enregistrerCategorie" value="enregistrer">
        </form>

        <form action="" method="get">
            <input type="text" name="produit_nom" placeholder="produit nom">
            <input type="text" name="produit_description" placeholder="produit description">
            <input type="text" name="produit_prix" placeholder="produit prix">
            <select name="categorie" id="">

                <?php 
                         foreach($liste as $row){
                            echo "<option value = ".$row["categorie_id"].">";
                            echo $row["categorie_nom"];                                
                            echo "</option>";
                         }
                            
                    ?>

            </select>

            <select name="marque" id="">

                <?php 
                         foreach($listeMarque as $row){
                            echo "<option value=".$row["marque_id"].">";
                            echo $row["marque_nom"];
                            echo "</option>";

                         }
                ?>
            </select>

            <input type="submit" name="enregistrerProduit" value="enregistrer">
        </form>

    </main>


</body>

</html>


<?php   
    if (isset($_GET["enregistrerMarque"])){  
        
     ajoutCategorie($_GET['marque_nom']);
    
    };
        
      if (isset($_GET["enregistrerCategorie"])){  
    ajoutMarque($_GET['categorie_nom']);    
    };

    if (isset($_GET["enregistrerProduit"])){    
    ajoutProduit($_GET['produit_nom'],$_GET['produit_description'],$_GET['produit_prix'],$_GET['categorie'],$_GET['marque']);
    }    
        
        
?>
