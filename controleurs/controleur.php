<?php
require('./modeles/modele.php');

function afficher_login(){
    require('./vues/GSB_login.php');
}
function test_login(){
    if(isset($_POST['login'])&&isset($_POST['mdp'])){
        $userexist=test_connexion(); 
        if($userexist){
            session_start();
            $_SESSION['nom'] = $userexist['nom'];
            $_SESSION['prenom'] = $userexist['prenom'];
            $_SESSION['id_Visiteur'] = $userexist['id_Visiteur'];
            require('./vues/GSB_compte.php');
        }
        else{
            $erreur = "Mauvais login ou mot de passe";
        }
    }
}
function frais_forfait(){
    require('./vues/GSB_nouveau_frais_forfait.php');
}
function insertion_FF(){
    print_r("test");
    if (isset($_SESSION['id_Visiteur']) && isset($_POST['KM']) && isset($_POST['ETP']) && isset($_POST['NUI']) && isset($_POST['REP'])) {
        insertion_FF_BDD();
    }
    require('./vues/GSB_nouveau_frais_forfait.php');
}
function frais_hors_forfait(){
    require('./vues/GSB_nouveau_frais_hors_forfait.php');
}
function insertion_FHF(){
    if (isset($_SESSION['id_Visiteur']) && isset($_POST['dateHF']) && isset($_POST['libelle'])&& isset($_POST['montant'])) {
        insertion_FHF_BDD();
    }
    require('./vues/GSB_nouveau_frais_hors_forfait.php');
}
function afficher_compte(){
    require('./vues/GSB_compte.php');
}
function consultation_frais(){
    require('./vues/GSB_fiche_frais.php');
}
function resultat()
{
    require './vues/Resultat.php';
}
function recup_donnees(){

    $NbreDataFF = donneesConsulterNbrFF();
    $rowAllFF = nb_lignes();
    if (($NbreDataFF) != 0) {
?>
<table border="1" id="table">
    <thead>
        <tr>
            <th>FraisForfait</th>
            <th>Quantite</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // pour chaque ligne (chaque enregistrement)
        foreach ($rowAllFF as $row) {
            // DONNEES A AFFICHER dans chaque cellule de la ligne
        ?>
        <tr>
            <td>
                <?php
            $rest = $row['id_FraisForfait'];
            if ($rest == "KM") {
                echo $rest = "Forfait kilométrique";
            } elseif ($rest == "NUI") {
                echo $rest = "Nuités hôtel";
            } elseif ($rest == "REP") {
                echo $rest = "Repas restaurant";
            } elseif ($rest == "ETP") {
                echo $rest = "Forfait étape";
            }
                ?>
            </td>
            <td><?= $row['quantite']; ?></td>
        </tr>
        <?php
        } // fin foreach
        ?>
    </tbody>
</table>        
<?php
    } else { ?>
pas de données à afficher
<?php
    }
}
?>