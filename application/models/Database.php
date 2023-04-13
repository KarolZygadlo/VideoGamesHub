<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Model   {

    public function create_table($table) {
	    return $this->db->query('CREATE TABLE '.$table.' (
	    	id int NOT NULL AUTO_INCREMENT,
	    	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
	    	title TEXT,
	    	subtitle TEXT,
	    	description TEXT,
	    	photo TEXT,
	    	alt TEXT,
	    	PRIMARY KEY(id)
	    );');  
    }
    
    public function create_column($table, $name) {
	    return $this->db->query('ALTER TABLE '.$table.' ADD '.$name.' text; ');  
    }

    public function create_base() {

        $query = $this->db->query('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');  
        $query = $this->db->query('SET AUTOCOMMIT = 0;');  
        $query = $this->db->query('START TRANSACTION;');  
        $query = $this->db->query('SET time_zone = "+00:00";');

        $query = $this->db->query('CREATE TABLE `users` (
            `id` int(11) NOT NULL,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `active` int(11) NOT NULL,
            `login` text COLLATE utf8_polish_ci NOT NULL,
            `email` text COLLATE utf8_polish_ci NOT NULL,
            `password` text COLLATE utf8_polish_ci NOT NULL,
            `first_name` text COLLATE utf8_polish_ci NOT NULL,
            `last_name` text COLLATE utf8_polish_ci NOT NULL,
            `avatar` text COLLATE utf8_polish_ci NOT NULL,
            `group` text COLLATE utf8_polish_ci NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  

        $query = $this->db->query('CREATE TABLE `gallery` (
            `id` int(11) NOT NULL,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `photo` text COLLATE utf8_polish_ci NOT NULL,
            `alt` text COLLATE utf8_polish_ci NOT NULL,
            `table_name` text COLLATE utf8_polish_ci NOT NULL,
            `item_id` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  

        $query = $this->db->query('INSERT INTO `users` (`id`, `created`, `active`, `login`, `email`, `password`, `first_name`, `last_name`, `avatar`, `group`) VALUES
            (1, "2019-04-10 13:48:15", 1, "admin", "karol.zygadlo@gmail.com", "$2y$12$KctJz0aVFYzrBNXpQ2xvve8CPzf6BDVgv7MnLmjp/ri2sI1jOutK.", "Karol", "Zygadło", "", "administration");');

        $query = $this->db->query('ALTER TABLE `users` ADD PRIMARY KEY (`id`);'); 

        $query = $this->db->query('ALTER TABLE `gallery` ADD PRIMARY KEY (`id`);');  

        $query = $this->db->query('ALTER TABLE `gallery` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;');  

        $query = $this->db->query('ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;');  

        return $query;

    }
}