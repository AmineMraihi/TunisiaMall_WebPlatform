<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 22/11/2017
 * Time: 00:42
 */

$nom = $_POST['nom'];
$subject = $_POST['subject'];
$content = $_POST['content'];

$sid = 'ACe536b5d8c342cfe446051ad47375f64c';
$token = 'db999810711e6a7b5c9e4134e418a15c';
$client = new Client($sid, $token);
$client->messages->create(
// the number you'd like to send the message to
    '+2160'.$nom ,
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+12028049038',
        // the body of the text message you'd like to send
        $subject => $content
    )

);
return $this->redirectToRoute('tunisia_mall_admin_homepage');