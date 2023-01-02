<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->model('Koneksi');
	}

    public function index() {
        
        $data['maps'] = $this->Koneksi->get();
        $this->load->view("index", $data);
    }

    public function search(){
        
        $key = $this->input->post('key');
        $data['maps'] = $this->Koneksi->getById($key);
        $this->load->view("index", $data);
    }

    public function log() {
        $data=['email'=> null,
			'username'=> null,
			'id'=> null,
			];
            $this->session->set_userdata($data);
        $data['maps'] = $this->Koneksi->get();
        $this->load->view("index", $data);
    }
}
?>