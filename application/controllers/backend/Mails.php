<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mails extends CI_Controller {

	public function index() {

		$data = loadBackendData();

		$data['rows'] = $this->backend->get_all_records($this->uri->segment(2));
		echo backendView($this->uri->segment(2), 'index', $data);

    }
    
	public function show_mail($id) {

        $data = loadBackendData();
            
		$data['value'] = $this->backend->get_one_record($this->uri->segment(2), $id);
		echo backendView($this->uri->segment(2), 'show_mail', $data);

    }
    
	public function send() {
        require 'application/libraries/mailer/config.php';
        require 'application/libraries/mailer/functions.php';
        require 'application/libraries/mailer/PHPMailerAutoload.php';

        $_POST['base_url'] = base_url(); 
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
        $mail->setFrom($cfg['smtp_user'] .  'VideoGamesHub - odpowiedź');
        $mail->AddBCC($_POST['email']);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'VideoGamesHub - odpowiedź';
        $mail->Body    = build_mail_body($_POST, 'answer.php');
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        } else {
            $update['answer'] = 1;
            $this->backend->update('mails', $update, $_POST['id']);  
        }
    }
}