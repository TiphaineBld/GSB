<?php
require('./controleurs/controleur.php');

if(isset($_GET['etat'])){
    if(!session_id()){
        session_start();
    }
    if($_GET['etat']=='login'){
        test_login();         
    }
    else if($_GET['etat']=='ajoutFF'){
        frais_forfait();
    }
    else if($_GET['etat']=='insertionFF'){
        insertion_FF();
    }
    else if($_GET['etat']=='ajoutFHF'){
        frais_hors_forfait();
    }
    else if($_GET['etat']=='insertionFHF'){
        insertion_FHF();
    }
    else if($_GET['etat']=='consultCF'){
        consultation_frais();
    }
    else if($_GET['etat']=='consult'){
        resultat();
    }
    else if($_GET['etat']=='compte'){
        afficher_compte();
    } 
}
else{
    afficher_login();    
}
?>