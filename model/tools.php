<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 17/04/2019
 * Time: 16:47
 */

function dbConnect(){
    try{
           return $db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $exception)
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }
}