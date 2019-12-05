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
    
    
    $requete = "SELECT produit_nom,produit_description,produit_prix,categorie_nom,marque_nom from produit
                join categorie
                on produit.categorie_categorie_id = categorie_id
                join marque
                on produit.marque_marque_id = marque_id";    
    $resultat = mysqli_query($connexion,$requete);
    return $resultat;
        

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
