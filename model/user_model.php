<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 24/06/2019
 * Time: 19:40
 */

require_once('./model/tools.php');

function getUser($userid =false){
    $db = dbConnect();

    $queryString= 'SELECT * from user';
    $queryParameters=[];

    if($userid){
        $queryString .= ' WHERE id = ?';
        $queryParameters[] = $userid;
    }

    $query_user = $db->prepare($queryString);
    $query_user->execute($queryParameters);
    return $result = $userid ? $query_user->fetch() : $query_user->fetchAll();

}

function addUser($lastname = false, $firstname =false, $password=false, $birthdate=false, $adress=false, $mail=false,$phone_number=false){
        $db = dbConnect();
        if (!$lastname){
            return $message ="Prénom non renseigné";
        }
        else if (!$firstname){
           return $message ="Nom de famille non renseigné";
        }
        else if (!$mail){
            return $message ="Adresse mail non renseignée";
        }
        else if (!$password){
           return $message ="Mot de passe non renseigné";
        }
        else if (!$phone_number){
            return $message ="Numéro de téléphone non renseigné";
        }
        else if (!$adress){
            return $message ="Adresse non renseignée";
        }
        else if (!$birthdate){
            return $message ="Date de naissance non renseignée";
        }
       else{
            $reqPrep = $db->prepare("INSERT INTO user (id, lastname, firstname, password, birthdate, adresse, mail,phone_number, admin) VALUES (default,?,?,?,?,?,?,?,default)");
            $reqPrep->execute(array($lastname, $firstname, $password, $birthdate, $adress,$mail,$phone_number));
            header('location:?page=admin&param=user_list');
            exit();
        }
}

function updateUser($lastname = false, $firstname =false, $password=false, $birthdate=false, $adress=false, $mail=false,$phone_number=false, $id =false){

    $db = dbConnect();
    //début de la chaîne de caractères de la requête de mise à jour
    $queryString = 'UPDATE user SET firstname = :firstname, lastname = :lastname, mail = :mail, birthdate = :birthdate, phone_number = :phone_number,adresse =:adress ';
    //début du tableau de paramètres de la requête de mise à jour
    $queryParameters = [
        'firstname' => htmlspecialchars($firstname),
        'lastname' => htmlspecialchars($lastname),
        'mail' => htmlspecialchars($mail),
        'birthdate' => htmlspecialchars($birthdate),
        'adress' => htmlspecialchars($adress),
        'phone_number' => htmlspecialchars($phone_number)
    ];

    //uniquement si l'admin souhaite modifier le mot de passe
    if( !empty($_POST['password'])) {
        //concaténation du champ password à mettre à jour
        $queryString .= ', password = :password ';
        //ajout du paramètre password à mettre à jour
        $queryParameters['password'] = hash('md5', $_POST['password']);
    }



    //fin de la chaîne de caractères de la requête de mise à jour
    $queryString .= 'WHERE id = :id';
    $queryParameters['id'] = $id;

    //préparation et execution de la requête avec la chaîne de caractères et le tableau de données
    $query = $db->prepare($queryString);
    $result = $query->execute($queryParameters);

    if($result){
        header('location:?page=admin&param=user_list');
        exit;
    }
    else{
     return  $message = 'Erreur.';
    }
}
function deleteUser($id){
    $db = dbConnect();
        $query = $db->prepare('DELETE FROM user WHERE id = ?');
        $result = $query->execute(array($id));

        if($result){
             return $message = "Suppression efféctuée.";
        }
        else {
            return $message = "Impossible de supprimer la séléction.";
        }
}

?>
