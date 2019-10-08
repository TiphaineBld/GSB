<?php
function data_base(){
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=gsbV2","admindb","password");
    return $bdd;
}

function test_connexion(){
    $bdd = data_base();
    $userexist = false;

    if($bdd)
    {
        $login = htmlspecialchars($_POST['login']);
        $mdp = htmlspecialchars($_POST['mdp']);

        if(!empty($login) and !empty($mdp))
        {
            $requser = $bdd->prepare("SELECT * FROM `Visiteur` WHERE login = ? AND mdp = ?");
            $requser->execute(array($login, $mdp));
            $userexist = $requser->fetch();
        }
    }                   
    return $userexist;
}   

function insertion_FF_BDD(){
    $bdd = data_base();
    $date =date("F")." ".date("Y");
    $id_Visiteur = $_SESSION['id_Visiteur'];
    $KM = "KM";
    $ETP = "ETP";
    $NUI = "NUI";
    $REP = "REP";
print_r($date);
    if($bdd)
    {   
        $req = $bdd -> prepare('INSERT INTO LigneFraisForfait (id_Visiteur, mois, id_FraisForfait, quantite)
   VALUES(?,?,?,?)');

        $req->execute(array($id_Visiteur, $date, $KM, $_POST["KM"]));
        
        $req = $bdd -> prepare('INSERT INTO LigneFraisForfait (id_Visiteur, mois, id_FraisForfait, quantite)
   VALUES(?,?,?,?)');

        $req->execute(array($id_Visiteur, $date, $ETP, $_POST["ETP"]));
        
        $req = $bdd -> prepare('INSERT INTO LigneFraisForfait (id_Visiteur, mois, id_FraisForfait, quantite)
   VALUES(?,?,?,?)');

        $req->execute(array($id_Visiteur, $date, $NUI, $_POST["NUI"]));
        
        $req = $bdd -> prepare('INSERT INTO LigneFraisForfait (id_Visiteur, mois, id_FraisForfait, quantite)
   VALUES(?,?,?,?)');

        $req->execute(array($id_Visiteur, $date, $REP, $_POST["REP"]));
    }              
}
function insertion_FHF_BDD(){
    $bdd = data_base();
    $id_Visiteur = $_SESSION['id_Visiteur'];
    $datem = date("m");
    $libelle = ( $_POST['libelle']);
    $dateHF = ($_POST['dateHF']);
    $montant = ($_POST['montant']);

    $bdd -> exec("INSERT INTO LigneFraisHorsForfait (id_Visiteur,mois, libelle, dateHF, montant)
   VALUES('$id_Visiteur', '$libelle', '$dateHF', '$montant')");
    if($bdd)
    {
        $req = $bdd -> prepare('INSERT INTO LigneFraisHorsForfait (id_Visiteur, mois, libelle, dateHF, montant)
   VALUES(?,?,?,?)');

        $req->execute(array(
            ':id_Visiteur' -> $id_Visiteur,
            ':mois' -> $datem,
            ':libelle' -> $libelle,
            ':dateHF' -> $dateHF,
            ':montant' -> $montant
        ));

    }              

}
function donneesConsulterNbrFF(){
    $bdd = data_base();
    $id_Visiteur = $_SESSION['id_Visiteur'];
    $mois = $_POST['mois'];

    $query = "SELECT * FROM lignefraisforfait WHERE ID_Visiteur='$id_Visiteur' and Mois = '$mois'";
    try {
        $pdo_select = $bdd->prepare($query);
        $pdo_select->execute();
        $NbreDataFF = $pdo_select->rowCount();
    } catch (PDOException $e) {
        echo 'Erreur SQL : ' . $e->getMessage() . '<br/>';
        die();
    }
    return $NbreDataFF;
}

function nb_lignes(){
    $bdd = data_base();
    $mois =$_POST['mois'];
    $id_Visiteur = $_SESSION['id_Visiteur'];

    $query = "SELECT * FROM lignefraisforfait WHERE ID_Visiteur='$id_Visiteur' and Mois = '$mois'";
    try {
        $pdo_select = $bdd->prepare($query);
        $pdo_select->execute();
        $rowAllFF = $pdo_select->fetchAll();
    } catch (PDOException $e) {
        echo 'Erreur SQL : ' . $e->getMessage() . '<br/>';
        die();
    }
    return $rowAllFF;
}

?>