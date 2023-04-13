<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function frontView($file_name, $data = '')  {
    $CI = &get_instance();
    return  $CI->load->view('frontend/blocks/head', $data, TRUE) . 
            $CI->load->view('frontend/blocks/header', $data, TRUE) .
            $CI->load->view('frontend/pages/'.$file_name, $data, TRUE) . 
            $CI->load->view('frontend/blocks/footer', $data, TRUE);
}

function backendDashboardView($file_name, $data = '')  {
    $CI = &get_instance();
    return  $CI->load->view('backend/blocks/head', $data, TRUE) . 
            $CI->load->view('backend/blocks/header', $data, TRUE) .
            $CI->load->view('backend/pages/'.$file_name, $data, TRUE) . 
            $CI->load->view('backend/blocks/footer', $data, TRUE);
}

function backendView($folder_name, $file_name, $data = '')  {
    $CI = &get_instance();
    return  $CI->load->view('backend/blocks/head', $data, TRUE) . 
            $CI->load->view('backend/blocks/header', $data, TRUE) .
            $CI->load->view('backend/pages/'.$folder_name.'/'.$file_name, $data, TRUE) . 
            $CI->load->view('backend/blocks/footer', $data, TRUE);
}

function frontAuthView($file_name, $data = '')  {
    $CI = &get_instance();
    return  $CI->load->view('frontend/pages/'.$file_name, $data, TRUE);
}


function loginView($file_name, $data = '') {
    $CI = &get_instance();
    return $CI->load->view('backend/login/'.$file_name, $data, TRUE);
}