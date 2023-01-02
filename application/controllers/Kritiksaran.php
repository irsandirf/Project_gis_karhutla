<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritiksaran extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kritiksaran_model');

    }

	public function index()
	{
        $this->load->view("index");
    }

    public function masukdata(){
        $data = [

             'isi' =>  $this->input->post('isi'),

        ];
        $this->kritiksaran_model->insert($data);
        redirect('Home');
    
}
}
