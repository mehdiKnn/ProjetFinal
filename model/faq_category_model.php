<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 30/06/2019
 * Time: 17:21
 */
require_once('./model/tools.php');

function getFaqCategory($id = false){
    $db = dbConnect();

    $queryString = 'SELECT id, name FROM faq_category';
    $queryParameters=[];

    if ($id){
        $queryString .= ' WHERE id =?';
        $queryParameters[]= $id;

    }
    $query_service = $db->prepare($queryString);
    $query_service->execute($queryParameters);
    return $result = $id ? $query_service->fetch() : $query_service->fetchAll();

    //  $query_service = $db->prepare('SELECT s.id, s.name, sc.name as catName from services s inner join services_cat sc on s.categorie = sc.id;');

}

function addFaqCategory($name){
    $db = dbConnect();
    if (!$name){
        return $message ="Nom non renseigné";
    }
    else{
        $reqPrep = $db->prepare("INSERT INTO faq_category (id, name) VALUES (default, ?)");
        $reqPrep->execute(array($name));
        header('location:?page=admin&param=faq_category_list');
        exit();
    }
}

function updateFaqCategory($id, $name){

    $db = dbConnect();
    //début de la chaîne de caractères de la requête de mise à jour
    $queryString = 'UPDATE faq_category SET name = :name WHERE id= :id';
    //début du tableau de paramètres de la requête de mise à jour
    $queryParameters = [
        'name' => htmlspecialchars($name),
        'id'=> $id
    ];
    //préparation et execution de la requête avec la chaîne de caractères et le tableau de données
    $query = $db->prepare($queryString);
    $result = $query->execute($queryParameters);

    if($result){
        header('location:?page=admin&param=faq_category_list');
        exit;
    }
    else{
        return  $message = 'Erreur.';
    }
}

function deleteFaqCategory($id){
    $db = dbConnect();
    $query = $db->prepare('DELETE FROM faq_category WHERE id = ?');
    $result = $query->execute(array($id));

    if($result){
        return $message = "Suppression efféctuée.";
    }
    else {
        return $message = "Impossible de supprimer la séléction.";
    }
}