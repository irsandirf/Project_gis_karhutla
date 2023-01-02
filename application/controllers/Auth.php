<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }
    function index() {
        $this->load->view("auth/login");
       
    }
    function regis(){
        $this->load->view("auth/regis");
    }

    public function cek_regis() {
        $user = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $this->userrole->insert($user);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Selamat Akunmu telah berhasil terdaftar, Silahkan Login!</div>');
        redirect('Auth');
    }

     public function cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user){
            if (password_verify($password, $user['password']) ){
                $data = [
                    'email' => $user['email'],
                    'username' => $user['username'],
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);

                redirect('Home');

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar!</div>');
                redirect('auth');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
            redirect('Home/log');
    }

    public function login()
    {
      
        $this->load->view('auth/login');
     
}
public function lapor()
{
  
    $this->load->view('pelapor/laporankarhutla');
 
}
public function register()
{
  
    $this->load->view('auth/regis');
 
}
}

?>
