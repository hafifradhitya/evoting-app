<?php

class Login extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
    }
    
    public function index(){
        $this->load->view('admin/login');
    }
    
    public function process(){
        $email = $this->post('email');
        $password = $this->post('password');
        if (empty($email)) {
            $output = [
                'error' => true,
                'pesan' => 'Alamat Email Wajib Diisi'
            ];
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $output = [
                'error' => true,
                'pesan' => 'Alamat Email Wajib Diisi'
            ];
        }else{
            $data = $this->auth_model->get_data($email);
            
            if(!is_array($data)) {
                $output = [
                    'error' => true,
                    'pesan' => 'Alamat Email Belum Terdaftar'
                ];
            }elseif (!password_verify($password, $data['password'])) {
                $output = [
                    'error' => true,
                    'pesan' => 'Login Gagal Silahkan Coba Lagi'
                ];
            }elseif ($data['status'] == 0) {
                $output = [
                    'error' => true,
                    'pesan' => 'Akun Anda Belum Diaktifkan'
                ];
            }else {
                $output = [
                    'url' => site_url('admin/dashboard'),
                    'error' => false,
                    'pesan' => 'Berhasil Login'
                ];
                $this->session->set_userdata([
                    'admin-id' => $data['id'],
                    'admin-nama' => $data['name'],
                    'admin-email' => $data['email'],
                    'admin-level' => 'admin'
                ]);
            }
        }
        
        $this->output($output);
    } 
}