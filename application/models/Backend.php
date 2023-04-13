<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Model  
{
    public function get_all_records($table)  {
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_all_active_posts($table)  {
		$this->db->order_by("created", "asc");
        $this->db->where([
            'active' => 1,
		]);
		$this->db->limit(20);
        $query = $this->db->get($table);
        return $query->result();
	}
	
	public function get_all_posts($table)  {
        $this->db->where([
            'active' => 1,
		]);
        $query = $this->db->get($table);
        return $query->result();
	}
	
	public function get_orderBy_pagging($table, $perPage, $paging = 0) {
		$this->db->order_by("created", "asc");
		$this->db->where([
            'active' => 1,
		]);
        $query = $this->db->get($table, $perPage, $paging);

        return $query->result();
    }

    public function get_all_active_user_posts($table, $id)  {
        $this->db->where([
            'active' => 1,
            'user_id' => $id
        ]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_one_record($table, $id)  {
        $this->db->where(['id' => $id]);
        $query = $this->db->get($table);
        return $query->row();
    }

    public function get_newest_articles($table) {
        $this->db->limit(3);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($table);
        return $query->result();
    }

    public function insert($table, $data) {
        $data = $this->security->xss_clean($data);
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function update($table, $data, $id) {
        $this->db->where(['id' => $id]);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function delete($table, $id) {
        $this->db->where(['id' => $id]);
        $query = $this->db->delete($table);
        return $query;
    }

    public function get_images($table, $table_name, $id) {
        $this->db->where([
            'item_id' => $id,
            'table_name' => $table_name,
            ]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_news_comments($table, $id) {
        $this->db->where(['news_id' => $id]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_post_comments($table, $id) {
        $this->db->where(['post_id' => $id]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_tutorials_comments($table, $id) {
        $this->db->where(['tutorial_id' => $id]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_reviews_comments($table, $id) {
        $this->db->where(['review_id' => $id]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_user_opinion_for_tutorials($table, $user_id, $tutorial_id) {

        $this->db->where([
            'user_id' => $user_id,
            'tutorial_id' => $tutorial_id,
            'active' => 1,
            ]);
        $query = $this->db->get($table);
        return $query->row();
    }

    public function get_user_data_from_table($table, $user_id) {
        $this->db->where(['user_id' => $user_id]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_user_tutorials($table, $user_id) {
        $this->db->where(['user_id' => $user_id]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_chapters($table, $id) {
        $this->db->where(['book_id' => $id]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_user_data($user_id) {
        $this->db->where(['id' => $user_id]);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function average_tutorial_grade($table, $tutorial_id) {

        $this->db->where([
            'tutorial_id' => $tutorial_id,
            'active' => 1,
            ]);
        $this->db->select_avg('grade');
        $query = $this->db->get($table)->row();
        return $query->grade;
    }

    public function count_comments($table, $post_id) {

        $this->db->where([
            'post_id' => $post_id,
            'active' => 1,
            ]);
        return $this->db->get($table)->num_rows();
	}
	
}
