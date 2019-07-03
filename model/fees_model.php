<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 25/06/2019
 * Time: 14:22
 */


require_once('./model/tools.php');

function getFees($id =null){
    $db = dbConnect();

    $queryString = 'SELECT f.id, f.name ,f.date, f.amount, u.mail ';
    $queryParameters = [];
    if ($id){
        $queryString .=',f.file FROM fees f INNER JOIN user u on f.user = u.id WHERE f.id = ?';
        $queryParameters[] = $id;
    }else{
        $queryString .='FROM fees f INNER JOIN user u on f.user = u.id';
    }
    $query_service = $db->prepare($queryString);
    $query_service->execute($queryParameters);
    return $result =$id ? $query_service->fetch() : $query_service->fetchAll();
}

function addFees($name, $date, $amount, $file, $tmpFile,$user){
    $db = dbConnect();
    if (!$name){
        return $message ="Nom non renseigné";
    }
    else if (!$date){
        return $message ="Date non renseigné";
    }
    else if (!$amount){
        return $message ="Somme non renseignée";
    }
    else if (!$user){
        return $message ="User non renseigné";
    }
    else{
        $reqPrep = $db->prepare("INSERT INTO fees (id, name,date, amount, file, user) VALUES (default, ?,?,?,?,?)");
        $reqPrep->execute(array($name, $date, $amount, $file,$user ));
        $lastInsertedArticleId = $db->lastInsertId();
        addFileFees($lastInsertedArticleId,$file,$tmpFile);
    }
}

function updateFees($id,$name, $date, $amount, $user, $file=null, $tmpFile=null){

    $db = dbConnect();
    //début de la chaîne de caractères de la requête de mise à jour
    $queryString = 'UPDATE fees SET name = :name, date = :date, amount = :amount, user = :user WHERE id = :id';
    //début du tableau de paramètres de la requête de mise à jour
    $queryParameters = [
        'name' => htmlspecialchars($name),
        'date' => htmlspecialchars($date),
        'amount' => htmlspecialchars($amount),
        'user' => htmlspecialchars($user),
        'id'=> $id
    ];

    //préparation et execution de la requête avec la chaîne de caractères et le tableau de données
    $query = $db->prepare($queryString);
    $result = $query->execute($queryParameters);

    if ($file){
        deleteFees($id);
        addFileFees($id, $file, $tmpFile);
    }


    if($result){
        header('location:?page=admin&param=fees_list');
        exit;
    }
    else{
        return  $message = 'Erreur.';
    }
}

function deleteFees($id){
    $db = dbConnect();
    $query = $db->prepare('SELECT file FROM fees WHERE id = ?');
    $query->execute(array($id));
    $ImgToUnlink = $query->fetch();

    if ($ImgToUnlink) {
        unlink('./assets/facture/' . $ImgToUnlink['file']);
    }
}

function addFileFees($id,$file,$tmp){
    $db = dbConnect();
    if($file){

        //tableau des extentions que l'on accepte d'uploader
        $allowed_extensions = array( 'pdf' );
        //extension dufichier envoyé via le formulaire
        $my_file_extension = pathinfo( $file , PATHINFO_EXTENSION);
        //si l'extension du fichier envoyé est présente dans le tableau des extensions acceptées
        if ( in_array($my_file_extension , $allowed_extensions) ){

            //je génrère une chaîne de caractères aléatoires qui servira de nom de fichier
            //le but étant de ne pas écraser un éventuel fichier ayant le même nom déjà sur le serveur
            $new_file_name = md5(rand());
            //destination du fichier sur le serveur (chemin + nom complet avec extension)
            $destination = './assets/facture/' . $new_file_name . '.' . $my_file_extension;
            //déplacement du fichier à partir du dossier temporaire du serveur vers sa destination
            $result = move_uploaded_file( $tmp, $destination);

            //mise à jour de l'article enregistré ci-dessus avec le nom du fichier image qui lui sera associé
            $query = $db->prepare('UPDATE fees SET file = ? where id =?');


            $resultUpdateImage = $query->execute(
                [
                    $new_file_name . '.' . $my_file_extension,
                    $id
                ]
            );
        }

    }else{
        return $message ="Image non renseigné";
    }
}