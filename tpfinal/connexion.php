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
        <form action="POST">
            <input type="text" placeholder="">
            
        </form> 
 

    </main>


</body>




</html>
