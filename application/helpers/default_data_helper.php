<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function loadBackendData() {
    $CI = &get_instance();
    $data['user'] = $CI->backend->get_one_record('users', $_SESSION['id']);  

    return $data;

}

function loadFrontendData() {
    $CI = &get_instance();
    $data['user'] = $CI->backend->get_one_record('users', $_SESSION['id']);  
    $data['settings'] = $CI->backend->get_one_record('settings', 1);

    return $data;

}