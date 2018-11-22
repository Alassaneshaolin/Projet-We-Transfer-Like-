<?php

/**
 * Created by PhpStorm.
 * User: Yakhya Sadio
 * Date: 16/11/2018
 * Time: 11:01
 */
    include('Controler/Connexion.php');
    $db = Connexion();
    ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="Modele/Requete.php" enctype="multipart/form-data">
    <div>
        <input type="email" name="email_sender" placeholder="Votre Email">
    </div>

    <div>
        <input type="email" name="email_receiver" placeholder="Email Recepteur">
    </div>
    
    <div>
        <textarea name="message" id="" cols="30" rows="10" placeholder="Votre message"></textarea>
    </div>
    
    <div>
        <input type="file" name="filename" value="">
    </div>
    
    <div>
        <input type="submit" name="Envoyer" value="Envoyer">
    </div>
</form>
</body>
</html>
