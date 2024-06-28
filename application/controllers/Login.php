<?php

class Login extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function process() {
        $email = $this->post('email');
        $password = $this->post('password');
        if (empty($email)) {
            $data = [
                'error' => true,
                'pesan' => 'Alamat Email Wajib Diisi'
            ];
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data = [
                'error' => true,
                'pesan' => 'Ini Bukan Alamat Email'
            ];
        }elseif (strlen($password)) {
            $data = [
                'error' => true,
                'pesan' => 'Password Minimal 8 Huruf'
            ];
        }else{
            $data = $this->auth_model->check_email($email);

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
                    'error' => false,
                    'pesan' => 'Berhasil Login'
                ];
                $this->session->set_userdata([
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'email' => $data['email']
                ]);
            }
        }

        $this->output($output);
    }
}