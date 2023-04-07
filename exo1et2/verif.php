<?php
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

    if ($age < 0 || $age > 150) {
        $verif = false;
        echo "L'âge doit être compris entre 0 et 150.<br>";
    }

    if (!preg_match('/^[a-zA-Z0-9._%+-]+@alumni\.univ-avignon\.fr$/', $mail)) {
        echo "Adresse e-mail invalide.<br>";
        $verif = false;
    }

    if ($mdp != $mdp2) {
        echo "Les mots de passe ne correspondent pas.<br>";
        $verif = false;
    } elseif (empty($mdp) || empty($mdp2)) {
        echo "Veuillez remplir les champs de mot de passe.<br>";
        $verif = false;
    }


    if ($verif){
        $sexe = "";
        if (isset($_POST["sexe"])) {
            $sexe = $_POST["sexe"];
        }

        echo "Bienvenue ";
        if ($sexe == "homme") {
            echo "M. ";
        } else if ($sexe == "femme") {
            echo "Mme ";
        }
        echo $nom . " " . $prenom . ", votre âge est de " . $age . " ans et vous travaillez en tant que " . $profession . ".<br>";
        echo "Vous pratiquez le(s/a) ";
        for($i = 0; $i < count($hobbies); $i++) {
            if ($i == count($hobbies) - 1) {
                echo $hobbies[$i]. " ";
            } else {
                echo $hobbies[$i] . ", ";
            }
        }
        echo "et vous préférez vous déplacer en " . $transport . ".<br>";
        echo "Nous avons bien noté votre commentaire : \"" . $commentaires . "\".";
    } else {
        echo "Veuillez remplir correctement le formulaire.";
    }

}
?>
