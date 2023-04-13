<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends CI_Model  
{
    public function check_login($login, $password) {
        $data['users'] = $this->backend->get_all_records('users');
        
		foreach($data['users'] as $check) {
			if(($login == $check->login || $login == $check->email) && (password_verify($password, $check->password)) &&$check->active == '1') {
				$session_data['id'] = $check->id;
				$session_data['first_name'] = $check->first_name;
				$session_data['last_name'] = $check->last_name;
				$session_data['email'] = $check->email;
				$session_data['name'] = $check->login;
				$session_data['group'] = $check->group;
				$session_data['login'] = TRUE;
				$this->session->set_userdata($session_data);
				$logged = true;
                break;
            } else {
				$logged = false;
            }
        }
            
		if($logged == false) {
			$this->session->set_flashdata('flashdata_false', 'Błędny login lub hasło, bądź konto nie zostało aktywowane');
            return false;
		} else {
			$this->session->set_flashdata('flashdata_success', 'Zostałeś poprawnie zalogowany');
            return true;
        }
    }

    public function register($post) {
        $post['password'] = hashPassword($post['password']);
        $post['secret_key'] = md5($post['email'].'|'.$post['password']);
        $post['group'] = 'users';
        if ($this->backend->insert('users', $post)) {
            sendActive($post['login'], $post['email'], $post['secret_key']);
            return true;
        }
        return false;
    }

    public function reset_password($post) {
        $users = $this->backend->get_all_records('users');
		foreach($users as $check) {
			if($post['login'] == $check->login && $post['email'] == $check->email && $check->active == '1') {
				if(send_new_password($check->id, $check->login, $check->email)){
                    return true;
                } else {
                    return false;
                }
                $reset = true;
                break;
            } else {
                $reset = false;
            }
        } 
        if($reset == false) {
            $this->session->set_flashdata('login_false', 'Błędne dane lub Twoje konto nie zostało aktywowane');
            return false;
        } else {
            return true;
        }
    }

    public function active_account($table,  $data, $secret_key) {
        $data = $this->security->xss_clean($data);
        $this->db->where(['secret_key' => $secret_key]);
        $query = $this->db->update($table, $data);
        return $query;
    }
}
