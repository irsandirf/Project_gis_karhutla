<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelapor_model');

    }

	public function index()
	{
        $this->load->view("pelapor/laporankarhutla");
    }

    public function masukdata(){
        $data = [
             'nama' =>  $this->input->post('nama'),
             'telepon' =>  $this->input->post('telepon'),
             'lokasi' =>  $this->input->post('lokasi'),
             'tglkejadian' =>  $this->input->post('tglkejadian'),
             'isi' =>  $this->input->post('isi'),

        ];
        $this->Pelapor_model->insert($data);
        redirect('Home');
    
}
}
