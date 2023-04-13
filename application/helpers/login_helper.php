<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $pass[] = 1;
        return implode($pass);
    }

    function hashPassword($password) {
        $options = ['cost' => 12];
        $encripted_pass = password_hash($password, PASSWORD_BCRYPT, $options);
        return $encripted_pass;
    }