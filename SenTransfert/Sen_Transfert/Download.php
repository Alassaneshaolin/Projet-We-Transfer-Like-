<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Yakhya Sadio
 * Date: 16/11/2018
 * Time: 16:28
 */

include ('Controler/Connexion.php');
$_SESSION['filename'];
var_dump($_SESSION['filename']);

echo '<a href="http://localhost/Sen_Transfert/Fichier/'.$_SESSION['filename'].'">Telecharger</a>';