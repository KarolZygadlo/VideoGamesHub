<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index() {

		if (!$this->db->table_exists($this->uri->segment(2))){
			$this->database->create_table($this->uri->segment(2));
		}

		$data = loadBackendData();

		$data['rows'] = $this->backend->get_all_records('users');
		$data['table'] = 'users';
		echo backendView($this->uri->segment(2), 'index', $data);

	}

	public function active_account() {
		$insert['active'] = $_POST['value'];
		$this->backend->update($_POST['table'], $insert, $_POST['id']);

		$data['user'] = $this->backend->get_one_record('users', $_POST['id']);

		require 'application/libraries/mailer/config.php';
        require 'application/libraries/mailer/functions.php';
        require 'application/libraries/mailer/PHPMailerAutoload.php';

        $_POST['base_url'] = base_url();
		$_POST['login'] = $data['user']->login;
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
        $mail->setFrom($cfg['smtp_user'], 'VideoGamesHub - zmiana statusu konta');

        $mail->AddBCC($data['user']->email);

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
		$mail->Subject = 'VideoGamesHub - zmiana statusu konta';
		if ($_POST['value'] == '0') :
		$mail->Body    = build_mail_body($_POST, 'user_account_blocked_message.php');
		else :
		$mail->Body    = build_mail_body($_POST, 'user_account_unlocked_message.php');
		endif;
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        } else {
            $this->session->set_flashdata('flashdata_success', 'Pomyślnie wysłałeś wiadomość!');
            redirect($_SERVER['HTTP_REFERER']);
        }


    }
    
    public function change_group() {
		$insert['group'] = $_POST['value'];
		$this->backend->update($_POST['table'], $insert, $_POST['id']);
	}



}
