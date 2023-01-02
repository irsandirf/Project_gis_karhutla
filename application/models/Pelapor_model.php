<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Pelapor_model extends CI_Model{
    
    public $table = 'laporan'; 
    public $id = 'laporan.id';
    public function _construct(){
        
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);;
        $query = $this->db->get();
        return $query->row_array();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
}