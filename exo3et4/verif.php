<?php
$verif = true;
$falsecolor = "red";
$verifage = $verifmail = $verifmdp = true;
error_reporting(0); //permet de cacher une erreur concernant l'exploration du fichier cours.txt que je n'arrive pas a regler mais qui n'affecte pas le fonctionnement du code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $mail = $_POST["adresse_e_mail"];
    $mdp = $_POST["mdp"];
    $mdp2 = $_POST["re_mdp"];
    $profession = $_POST["activité_prin"];
    $hobbies = $_POST["sport"];
    $transport = $_POST["transport"];
    $commentaires = $_POST["informations"];

    $verif = true;
    $falsecolor = "red";
    $verifage = $verifmail = $verifmdp = true;

    if ($age < 0 || $age > 150) {
        $verif = false;
        $verifage = false;
    } else{
        $verifage = true;
    }

    if (!preg_match('/^[a-zA-Z0-9._%+-]+@alumni\.univ-avignon\.fr$/', $mail)) {
        $verif = false;
        $verifmail = false;
    } else{
        $verifmail = true;
    }

    if ($mdp != $mdp2) {
        $verif = false;
        $verifmdp = false;
    } elseif (empty($mdp) || empty($mdp2)) {
        $verif = false;
        $verifmdp = false;
    } else{
        $verifmdp = true;
    }
} else { //valeurs par défaut pour éviter les erreurs
    $nom = '';
    $prenom = '';
    $age = '';
    $mail = '';
    $mdp = '';
    $mdp2 = '';
    $profession = '';
    $hobbies = '';
    $transport = '';
    $commentaires = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP4</title>
    <meta name = "viewport" content = "width =  device-width, initial-scale = 1">
    <link rel = "stylesheet" href = "https://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-cyan.css">
</head>
<body>
<div>
    <header class="w3-theme-d4" ><h1 class="w3-center" style="margin: 0">Bienvenue sur la page de renseignement</h1></header>
    <div class="w3-card-2 w3-padding-large w3-margin w3-text-theme">
        <form action="verif.php" method="POST">
            <label>Prenom </label><br/><input class ="w3-row-padding w3-input" type="text" name="prenom" value="<?php echo !$verif? isset($_POST['prenom'])?$_POST['prenom']:'':'';?>"/><br/>
            <label>Nom </label><br/><input class ="w3-row-padding w3-input" type="text" name="nom" value="<?php echo !$verif? isset($_POST['nom'])?$_POST['nom']:'':'';?>"/><br/>
            <label style="color:<?php if (!$verifage) echo $falsecolor?>">Âge </label><br/><input class ="w3-row-padding w3-input" type="text" name="age" value="<?php echo !$verif? isset($_POST['age'])?$_POST['age']:'':'';?>" style="color:<?php if (!$verifage) echo $falsecolor?>"/><br/>
            <label style="color:<?php if (!$verifmail) echo $falsecolor?>" >Adresse e-mail</label><br/><input class ="w3-row-padding w3-input"  type="text" name="adresse_e_mail" placeholder="nom.prenom@univ-avignon.fr" value="<?php echo !$verif? isset($_POST['adresse_e_mail'])?$_POST['adresse_e_mail']:'':'';?>" style="color:<?php if (!$verifmail) echo $falsecolor?>"/><br/>
            <label style="color:<?php if (!$verifmdp) echo $falsecolor?>">Mot de passe</label><br/><input class ="w3-row-padding w3-input"  type="password" name="mdp" value="<?php echo !$verif? isset($_POST['mdp'])?$_POST['mdp']:'':'';?>" style="color:<?php if (!$verifmdp) echo $falsecolor?>"/> <br/>
            <label style="color:<?php if (!$verifmdp) echo $falsecolor?>">Retapez votre mot de passe</label><br/><input class ="w3-row-padding w3-input" type="password" name="re_mdp" value="<?php echo !$verif? isset($_POST['re_mdp'])?$_POST['re_mdp']:'':'';?>" style="color:<?php if (!$verifmdp) echo $falsecolor?>"/><br/>
            <label>Genre</label><br/>
            <div class="w3-text-black w3-radio w3-padding-small"><input class ="w3-row-padding w3-radio"  type="radio" name="genre" value="homme">Homme</div>
            <div class="w3-text-black w3-radio w3-padding-small"><input class ="w3-row-padding w3-radio"  type="radio" name="genre" value="femme">Femme</div>
            <div class="w3-text-black w3-radio w3-padding-small"><input class ="w3-row-padding w3-radio"  type="radio" name="genre" value="Non_Binaire">Non Binaire</div><br/>
            <label>Sports pratiqués régulièrement</label><br/>
            <div class="w3-half w3-text-black w3-padding-small"><input class="w3-check" type="checkbox" name="sport[]" value="Football">Football</div>
            <div class="w3-half w3-text-black w3-padding-small"><input class="w3-check" type="checkbox" name="sport[]" value="Equitation">Equitation </div><br/>
            <div class="w3-half w3-text-black w3-padding-small"><input class="w3-check" type="checkbox" name="sport[]" value="Basket">Basket</div>
            <div class="w3-half w3-text-black w3-padding-small"><input class="w3-check" type="checkbox" name="sport[]" value="Natation">Natation</div> <br/>
            <div class="w3-half w3-text-black w3-padding-small"><input class="w3-check" type="checkbox" name="sport[]" value="Vélo">Vélo</div>
            <div class="w3-half w3-text-black w3-padding-small"><input class="w3-check" type="checkbox" name="sport[]" value="Autre">Autre</div><br/><br/>
            <label>Activité principale </label><br/>
            <SELECT name="activité_prin" class="w3-input">
                <OPTION value="étudiant">étudiant</OPTION>
                <OPTION value="indépendant">indépendant</OPTION>
                <OPTION value="salarié">salarié</OPTION>
                <OPTION value="patron">patron</OPTION>
            </SELECT> <br/><br/>
            <label>Transport pour se rendre au stage </label><br/>
            <SELECT name="transport" size="5"  class="w3-input" style="overflow-y: auto;">
                <OPTION value="voiture">Voiture</OPTION>
                <OPTION value="trotinette">Trotinette</OPTION>
                <OPTION value="vélo">Vélo</OPTION>
                <OPTION value="bus">Bus</OPTION>
                <OPTION value="autre">Autre</OPTION>
            </SELECT> <br/><br/>
            <label>Autres informations </label><br/><textarea class="w3-input" name="informations" rows="3"><?php echo !$verif? isset($_POST['informations'])?$_POST['informations']:'':'';?> </textarea><br/><br/>
            <?php
            $fichier = fopen('cours.txt', 'r');

            $intitules = array();
            while (!feof($fichier)) {
                $ligne = fgets($fichier);
                $enregistrement = explode('|', $ligne);
                $intitule = $enregistrement[2];
                if (!in_array($intitule, $intitules)) {
                    $intitules[] = $intitule;
                }
            }

            fclose($fichier);

            echo '<label>Intitulé du cours a rechercher:</label>';
            echo '<select name="intitule" class="w3-input">'."<br/>";
            foreach ($intitules as $intitule) {
                echo '<option value="' . $intitule . '">' . $intitule . '</option>';
            }
            echo '</select>';
            ?>
            <input class="w3-btn w3-theme" type="submit" value="Envoyer le formulaire">
            <input class="w3-btn w3-theme" type="reset" value="Recommencer">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($verif) {
                $sexe = "";
                if (isset($_POST["sexe"])) {
                    $sexe = $_POST["sexe"];
                }

                echo "<br>"."Bienvenue ";
                if ($sexe == "homme") {
                    echo "M. ";
                } else if ($sexe == "femme") {
                    echo "Mme ";
                }
                echo $nom . " " . $prenom . ", votre âge est de " . $age . " ans et vous travaillez en tant que " . $profession . ".<br>";
                echo "Vous pratiquez le(s/a) ";
                for ($i = 0; $i < count($hobbies); $i++) {
                    if ($i == count($hobbies) - 1) {
                        echo $hobbies[$i] . " ";
                    } else {
                        echo $hobbies[$i] . ", ";
                    }
                }
                echo "et vous préférez vous déplacer en " . $transport . ".<br>";
                echo "Nous avons bien noté votre commentaire : \"" . $commentaires . "\".";

                $intitule = $_POST['intitule'];

                $fichier = fopen('cours.txt', 'r');

                while (!feof($fichier)) {
                    $ligne = fgets($fichier);
                    $enregistrement = explode('|', $ligne);

                    if ($enregistrement[2] == $intitule) {
                        echo "<br>".'<table class="w3-table-all w3-hoverable">';
                        echo '<tr><th>Prénom du prof</th><th>Nom du prof</th><th>Intitulé du cours</th><th>Niveau</th><th>Semestre</th><th>Nombre d\'heures</th></tr>';
                        echo '<tr>';
                        for ($i = 0; $i < count($enregistrement); $i++) {
                            echo '<td>' . $enregistrement[$i] . '</td>';
                        }
                        echo '</tr>';
                        echo '</table>';
                        break;
                    }
                }
                fclose($fichier);
            }
        }
        ?>
    </div>
</div>
</body>
</html>
