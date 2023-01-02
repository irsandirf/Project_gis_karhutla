<?php defined('BASEPATH') or exit('No direct script access allowed');
class Koneksi extends CI_Model {
    public $table='hotspot';

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $this->db->from($this->table);
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getJson() {
        $this->db->from($this->table);
        $query=$this->db->get();
        return json_encode($query->result_array());
    }

    public function getById($key) {
        $this->db->from($this->table);
		$this->db->where('TK like "%'.$key.'%" or Kecamatan like "%'.$key.'%" or Kabupaten like "%'.$key.'%"'); 
		$query=$this->db->get();
		return $query->result_array();
    }
}
?>