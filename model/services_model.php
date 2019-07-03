<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 25/06/2019
 * Time: 14:22
 */


require_once('./model/tools.php');

function getServices($serviceid = false){
    $db = dbConnect();

    $queryString = 'SELECT s.id, s.name,';
    $queryParameters=[];

    if ($serviceid){
        $queryString .= ' s.lat, s.longi, s.categorie, s.schedule, s.address from services s WHERE s.id =?';
        $queryParameters[]= $serviceid;

    }else{
        $queryString .=' sc.name as catName from services s inner join services_cat sc on s.categorie = sc.id';
    }
    $query_service = $db->prepare($queryString);
    $query_service->execute($queryParameters);
    return $result = $serviceid ? $query_service->fetch() : $query_service->fetchAll();

  //  $query_service = $db->prepare('SELECT s.id, s.name, sc.name as catName from services s inner join services_cat sc on s.categorie = sc.id;');

}

function getServiceCategorie(){
    $db = dbConnect();
    $query_article = $db->prepare('SELECT id, name FROM services_cat');
    $query_article->execute();
    return $query_article->fetchAll();
}

function addService($name, $categorie, $lat, $longi, $schedule, $address){
    $db = dbConnect();
    if (!$name){
        return $message ="Nom non renseigné";
    }
    else if (!$categorie){
        return $message ="Catégorie non renseigné";
    }
    else if (!$lat){
        return $message ="Latitude non renseignée";
    }
    else if (!$longi){
        return $message ="Longitude non renseigné";
    }
    else if (!$schedule){
        return $message ="Horaires non renseigné";
    }
    else if (!$address){
        return $message ="Adresse non renseignée";
    }
    else{
        $reqPrep = $db->prepare("INSERT INTO services (id, name, categorie, lat, longi, schedule, address) VALUES (default, ?,?,?,?,?,?)");
        $reqPrep->execute(array($name, $categorie, $lat, $longi, $schedule, $address));
        header('location:?page=admin&param=services_list');
        exit();
    }
}

function updateService($id, $name, $categorie, $lat, $longi, $schedule, $address){

    $db = dbConnect();
    //début de la chaîne de caractères de la requête de mise à jour
    $queryString = 'UPDATE services SET name = :name, categorie = :categorie, lat = :lat, longi= :longi, schedule= :schedule, address= :address WHERE id= :id';
    //début du tableau de paramètres de la requête de mise à jour
    $queryParameters = [
        'name' => htmlspecialchars($name),
        'categorie' => htmlspecialchars($categorie),
        'lat' => htmlspecialchars($lat),
        'longi' => htmlspecialchars($longi),
        'schedule' => htmlspecialchars($schedule),
        'address' => htmlspecialchars($address),
        'id'=> $id
    ];

    //préparation et execution de la requête avec la chaîne de caractères et le tableau de données
    $query = $db->prepare($queryString);
    $result = $query->execute($queryParameters);

    if($result){
        header('location:?page=admin&param=services_list');
        exit;
    }
    else{
        return  $message = 'Erreur.';
    }
}

function deleteServices($id){
    $db = dbConnect();
    $query = $db->prepare('DELETE FROM services WHERE id = ?');
    $result = $query->execute(array($id));

    if($result){
        return $message = "Suppression efféctuée.";
    }
    else {
        return $message = "Impossible de supprimer la séléction.";
    }
}



