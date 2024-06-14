<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lantai_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getLantaiDetail() {
        $this->db->where('id');
        $query = $this->db->get('gudang');
        return $query->row();
    }

    public function insertLantaiDetail($data) {
        return $this->db->insert('gudang', $data); 
    }

    public function updateLantaiDetail($id, $data) {
        $this->db->where('id', $id); 
        return $this->db->update('gudang', $data); 
    }

    public function deleteLantaiDetail($id) {
        $this->db->where('id', $id); 
        return $this->db->delete('gudang'); 
    }
}
