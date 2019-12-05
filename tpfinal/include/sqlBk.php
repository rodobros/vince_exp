<?php 
    function connectDb(){
        
        $connexion = mysqli_connect("localhost","root","","magasin_de_sport");
        
        if(!$connexion){
            
            trigger_error("erreur de connection : ".mysqli_connect_error());
        }
        
        mysqli_query($connexion, "SET NAMES 'utf8'");
		return $connexion;
    }

$connexion = connectDb();

function afficherProduit(){
    
    global $connexion;
    
    
    $requete = "SELECT * FROM produit";
    
        if($resultat = mysqli_query($connexion,$requete)){
        $nbResultat = mysqli_num_rows($resultat);
        $liste = array();
        if($nbResultat){
            mysqli_data_seek($resultat,0);
            while($row = mysqli_fetch_array($resultat,MYSQLI_ASSOC)){
                $liste[]= $row;
            }
        }
        mysqli_free_result($resultat);
        return $liste;
        
    }else{
        errSQL($connexion);
        exit;
    }
}

function ajoutCategorie($categorie_nom){
    global $connexion;
    
    $requete = "INSERT INTO categorie (categorie_nom) VALUES('$categorie_nom')";    
    $resultat = mysqli_query($connexion,$requete); 
    
}


function ajoutMarque($marque_nom){
    global $connexion;
    
    $requete = "INSERT INTO marque (marque_nom) VALUE ('$marque_nom')";
    $resultat = mysqli_query($connexion,$requete);
    
}



function ajoutProduit($produit_nom,$produit_description,$produit_prix,$produit_categorie,$produit_marque){
    global $connexion;
    
    $requete = "INSERT INTO produit (produit_nom,produit_description,produit_prix,categorie_categorie_id,marque_marque_id) VALUES ('$produit_nom','$produit_description','$produit_prix','$produit_categorie','$produit_marque')";
    $resultat = mysqli_query($connexion,$requete);
    
}

function listeCategorie(){
    global $connexion;
    $requete = "SELECT * FROM categorie";
    $resultat = mysqli_query($connexion,$requete);
    
    return $resultat;
    
}

function listeMarque(){
    global $connexion;
    $requete = "SELECT * FROM marque";
    $resultat = mysqli_query($connexion,$requete);
    
    return $resultat;
    
}




?>
