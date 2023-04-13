<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function slug($str) {
	    $str = mb_strtolower($str,'utf-8');
	    $search = array('ą', 'ć', 'ś', 'ó', 'ż', 'ź', 'ę', 'ł', 'ń',' ', '?', '!', '(', ')', '.', ',', '/');
	    $replace = array('a', 'c', 's', 'o', 'z', 'z', 'e', 'l', 'n','-','','','','','','','','');
	    $str = str_ireplace($search, $replace, strtolower(trim($str)));
	    $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
	    return $str;
    }

    function slug_photo($str) {
	    $str = mb_strtolower($str,'utf-8');
	    $search = array('ą', 'ć', 'ś', 'ó', 'ż', 'ź', 'ę', 'ł', 'ń',' ', '?', '!', '(', ')', ',', '/');
	    $replace = array('a', 'c', 's', 'o', 'z', 'z', 'e', 'l', 'n','-','','','','','','','');
	    $str = str_ireplace($search, $replace, strtolower(trim($str)));
	    return $str;
    }

    function slug_import($str) {
	    $str = mb_strtolower($str,'utf-8');
	    $search = array('ą', 'ć', 'ś', 'ó', 'ż', 'ź', 'ę', 'ł', 'ń',' ', '?', '!', '(', ')', ',', '/');
	    $replace = array('a', 'c', 's', 'o', 'z', 'z', 'e', 'l', 'n','_','','','','','','','');
	    $str = str_ireplace($search, $replace, strtolower(trim($str)));
	    return $str;
    }

    function slugProduct($str) {
	    $str = mb_strtolower($str,'utf-8');
	    $search = array('?', '!', '(', ')', '.', ',', '/', '&');
	    $replace = array('','','','','','','',' ','');
	    $str = str_ireplace($search, $replace, strtoupper(trim($str)));
	    $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
	    return $str;
    }