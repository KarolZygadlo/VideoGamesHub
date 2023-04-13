<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function sendActive($login, $email, $secret_key) {
    require 'application/libraries/mailer/config.php';
    require 'application/libraries/mailer/functions.php';
    require 'application/libraries/mailer/PHPMailerAutoload.php';
    $CI = &get_instance();

    $_POST['base_url'] = base_url(); 
    $_POST['secret_key'] = $secret_key;
    $_POST['login'] = $login;


    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = $cfg['smtp_host'];
    $mail->SMTPAuth = true;         
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Username = $cfg['smtp_user'];
    $mail->Password = $cfg['smtp_pass'];
    $mail->Port = $cfg['smtp_port'];
    $mail->setFrom($cfg['smtp_user'], 'VideoGamesHub - aktywacja konta');
    $mail->AddBCC($email);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'VideoGamesHub - aktywacja konta';
    $mail->Body = build_mail_body($_POST, 'active_account.php');
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
}

function send_new_password($id, $login, $email) {
    require 'application/libraries/mailer/config.php';
    require 'application/libraries/mailer/functions.php';
    require 'application/libraries/mailer/PHPMailerAutoload.php';
    $CI = &get_instance();

    $_POST['base_url'] = base_url(); 
    $_POST['secret_key'] = $secret_key;
    $_POST['login'] = $login;
    $_POST['new_password'] = randomPassword();
    $_POST['name'] = $name;
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = $cfg['smtp_host'];
    $mail->SMTPAuth = true;         
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Username = $cfg['smtp_user'];
    $mail->Password = $cfg['smtp_pass'];
    $mail->Port = $cfg['smtp_port'];
    $mail->setFrom($cfg['smtp_user'], 'VideoGamesHub - resetowanie hasła');
    $mail->AddBCC($email);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'VideoGamesHub - resetowanie hasła';
    $mail->Body = build_mail_body($_POST, 'reset_password.php');
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    $update['password'] = hashPassword($_POST['new_password']);
    $CI->backend->update('users', $update, $id);
    return true;
}