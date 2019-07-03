<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 25/06/2019
 * Time: 14:22
 */


require_once('./model/tools.php');

function getEvents($id =null){
    $db = dbConnect();

    $queryString = 'SELECT event.id, event.name ,event.date, event.published,event.content, event.summary ';
    $queryParameters = [];
    if ($id){
        $queryString .=',em.name as image FROM event INNER JOIN event_media em on event.id = em.event_id WHERE event.id = ?';
        $queryParameters[] = $id;
    }else{
        $queryString .='FROM event';
    }
    $query_service = $db->prepare($queryString);
    $query_service->execute($queryParameters);
    return $result =$id ? $query_service->fetch() : $query_service->fetchAll();
}

function addEvent($name, $date, $content, $published,$summary, $image, $tmp){
    $db = dbConnect();
    if (!$name){
        return $message ="Nom non renseigné";
    }
    else if (!$date){
        return $message ="Date non renseigné";
    }
    else if (!$content){
        return $message ="Content non renseignée";
    }
    else if (!$summary){
        return $message ="Résumé non renseigné";
    }
    else{
        $reqPrep = $db->prepare("INSERT INTO event (id, name,date, content, published, summary) VALUES (default, ?,?,?,?,?)");
        $reqPrep->execute(array($name, $date, $content, $published,$summary ));
        $lastInsertedArticleId = $db->lastInsertId();
        addImage($lastInsertedArticleId,$image,$tmp);
    }
}

function updateEvent($id,$name, $date, $content, $published,$summary, $image=null, $tmp=null){

    $db = dbConnect();
    //début de la chaîne de caractères de la requête de mise à jour
    $queryString = 'UPDATE event SET name = :name, date = :date, content = :content, published = :published, summary = :summary WHERE id = :id';
    //début du tableau de paramètres de la requête de mise à jour
    $queryParameters = [
        'name' => htmlspecialchars($name),
        'date' => htmlspecialchars($date),
        'content' => htmlspecialchars($content),
        'published' => htmlspecialchars($published),
        'summary' => htmlspecialchars($summary),
        'id'=> $id
    ];

    //préparation et execution de la requête avec la chaîne de caractères et le tableau de données
    $query = $db->prepare($queryString);
    $result = $query->execute($queryParameters);

    deleteImg($id);
    addImage($id, $image, $tmp);


    if($result){
       header('location:?page=admin&param=event_list');
        exit;
    }
    else{
        return  $message = 'Erreur.';
    }
}

function deleteImg($id){
    $db = dbConnect();
    $query = $db->prepare('SELECT name FROM event_media WHERE event_id = ?');
    $query->execute(array($id));
    $ImgToUnlink = $query->fetch();

    if ($ImgToUnlink) {

        unlink('./assets/img/event/' . $ImgToUnlink['name']);

        $queryDelete = $db->prepare('DELETE FROM event_media WHERE event_id=?');
        $queryDelete->execute(array($id));

    }
}

function addImage($id,$image,$tmp){
    $db = dbConnect();
    if($image){

        //tableau des extentions que l'on accepte d'uploader
        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        //extension dufichier envoyé via le formulaire
        $my_file_extension = pathinfo( $image , PATHINFO_EXTENSION);
        //si l'extension du fichier envoyé est présente dans le tableau des extensions acceptées
        if ( in_array($my_file_extension , $allowed_extensions) ){

            //je génrère une chaîne de caractères aléatoires qui servira de nom de fichier
            //le but étant de ne pas écraser un éventuel fichier ayant le même nom déjà sur le serveur
            $new_file_name = md5(rand());
            //destination du fichier sur le serveur (chemin + nom complet avec extension)
            $destination = './assets/img/event/' . $new_file_name . '.' . $my_file_extension;
            //déplacement du fichier à partir du dossier temporaire du serveur vers sa destination
            $result = move_uploaded_file( $tmp, $destination);

            //mise à jour de l'article enregistré ci-dessus avec le nom du fichier image qui lui sera associé
            $query = $db->prepare('INSERT INTO event_media (event_id, name) values (?,?)');


            $resultUpdateImage = $query->execute(
                [
                    $id,
                    $new_file_name . '.' . $my_file_extension
                ]
            );
        }

    }else{
        return $message ="Image non renseigné";
    }
}