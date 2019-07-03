<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 25/06/2019
 * Time: 14:23
 */
require_once('./model/tools.php');

function getFaqCategorie(){
    $db = dbConnect();
    $query_article = $db->prepare('SELECT id, name FROM faq_category');
    $query_article->execute();
    return $query_article->fetchAll();
}

function getFaq($id = null){
    $db = dbConnect();

    $queryString = 'SELECT f.id, f.question, fc.name ';
    $queryParameters=[];

    if ($id){
        $queryString .= ' ,f.answer, f.category ';
        $queryParameters[]= $id;
    }
    $queryString .='from faq f inner join faq_category fc on f.category = fc.id';
      if ($id){
          $queryString .= ' WHERE f.id = ?';
      }

    $query_faq = $db->prepare($queryString);
    $query_faq->execute($queryParameters);
    return $result = $id ? $query_faq->fetch() : $query_faq->fetchAll();

}

function addFaq($question, $answer, $category){
    $db = dbConnect();
    if (!$question){
        return $message ="Question non renseigné";
    }
    else if (!$answer){
        return $message ="Réponse non renseignée";
    }
    else if (!$category){
        return $message ="Catégorie non renseignée";
    }

    else{
        $reqPrep = $db->prepare("INSERT INTO faq (id, question, answer, category) VALUES (default, ?,?,?)");
        $reqPrep->execute(array($question, $answer, $category));
        header('location:?page=admin&param=faq_list');
        exit();
    }
}

function updateFaq($id, $question, $answer, $category){

    $db = dbConnect();
    //début de la chaîne de caractères de la requête de mise à jour
    $queryString = 'UPDATE faq SET question = :question, answer = :answer, category = :category WHERE id= :id';
    //début du tableau de paramètres de la requête de mise à jour
    $queryParameters = [
        'question' => htmlspecialchars($question),
        'answer' => htmlspecialchars($answer),
        'category' => htmlspecialchars($category),
        'id'=> $id
    ];

    //préparation et execution de la requête avec la chaîne de caractères et le tableau de données
    $query = $db->prepare($queryString);
    $result = $query->execute($queryParameters);

    if($result){
        header('location:?page=admin&param=faq_list');
        exit;
    }
    else{
        return  $message = 'Erreur.';
    }
}

function deleteFaq($id){
    $db = dbConnect();
    $query = $db->prepare('DELETE FROM faq WHERE id = ?');
    $result = $query->execute(array($id));

    if($result){
        return $message = "Suppression efféctuée.";
    }
    else {
        return $message = "Impossible de supprimer la séléction.";
    }
}
