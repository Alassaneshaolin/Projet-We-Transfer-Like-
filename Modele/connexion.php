<?php
function Connexion()
{
    $db = NULL;
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=sen_transfert;charset=utf8','root','');
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch(PDOException $e)
    {
        die("La connexion à la base de données est impossible".$e->getMessage());
    }
}
Connexion();
?>