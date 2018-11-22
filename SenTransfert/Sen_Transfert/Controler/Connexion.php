<?php
/**
 * Created by PhpStorm.
 * User: Yakhya Sadio
 * Date: 16/11/2018
 * Time: 11:09
 */
function Connexion()
{
    $db = NULL;
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=yayas_database;charset=utf8','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch(PDOException $e)
    {
        die('La connexion à la base de données est impossible'.$e->getMessage());
    }
}
Connexion();
