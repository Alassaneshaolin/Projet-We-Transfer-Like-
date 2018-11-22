<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Yakhya Sadio
 * Date: 16/11/2018
 * Time: 11:16
 */
include('../Controler/Connexion.php');
$db = Connexion();
function insertion()
{
    GLOBAL $db;

    $Requete = "INSERT INTO user(email_sender, email_receiver, message, filename) VALUES(:email_sender, :email_receiver, :message, :filename)";
    $Insertion = $db -> prepare($Requete);
    $Insertion->bindParam('email_sender',$_POST['email_sender']);
    $Insertion->bindParam('email_receiver',$_POST['email_receiver']);
    $Insertion->bindParam('message',$_POST['message']);
    $Insertion->bindParam('filename',$_POST['filename']);
    $Insertion->execute();
}

/******================ Uploader plusieurs fichers ===================*****/

if (!empty($_FILES)) {
    $file_name = $_FILES['filename']['name'];
    $file_extension = strrchr($file_name, ".");
    $file_tmp_name = $_FILES['filename']['tmp_name'];
    $file_dest = '../Fichier/'.$file_name;
    $_SESSION['filename'] = $file_name;
    var_dump($_SESSION['filename']);
    //   $extension_autorisees = array('.png', '.PNG','.jpg', '.JPG');
//    if (in_array($file_extension, $extension_autorisees)) {
    if(move_uploaded_file($file_tmp_name, $file_dest)) {
        $requete = $db->prepare('INSERT INTO fichier(name, file_url) VALUES(?,?)');
        $requete->execute(array($file_name, $file_dest));

    }
    // }else {
    //    echo "seul les fichiers  sont autorisés";
}


$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["Envoyer"]))
{
    if(empty($_POST["email_sender"]))
    {
        $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    }
    else
    {
        $email = clean_text($_POST["email_sender"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }

    if(empty($_POST["email_receiver"]))
    {
        $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    }
    else
    {
        $email = clean_text($_POST["email_receiver"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }

    if(empty($_POST["message"]))
    {
        $error .= '<p><label class="text-danger">Message is required</label></p>';
    }
    else
    {
        $message = clean_text($_POST["message"]);
    }

    if($error == '')
    {
        require '../Controler/Traitement/class.phpmailer.php';

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'ssl://smtp.gmail.com';
        $mail->Port = '465';
        $mail->SMTPAuth = true;
        $mail->Username = 'adjagarail@gmail.com';
        $mail->Password = 'koenigsegg';
        $mail->SMTPSecure = '';
        $mail->From = $_POST["email_sender"];
        //  $mail->AddAddress('abc@xyz.com', 'Name');
        $mail->AddCC($_POST["email_sender"], $_POST["email_sender"]);
        //  $mail->addAttachment($_FILES['fichier']['tmp_name']);
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Subject = $_POST["message"];
        $mail->Body ="<div><h1>http://localhost/Sen_Transfert/Download.php</h1></div>";


        if($mail->Send())
        {
            $error = '<label class="text-success">Votre message a été délivrer avec succés</label>';
        }
        else
        {
            $error = '<label class="text-danger">There is an Error</label>';
        }
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}