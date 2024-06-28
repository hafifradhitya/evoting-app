<?php

class Home extends Site_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dash_model');
        $this->load->model('home_model');
    }
    
    public function index(){
        $candidates = $this->dash_model->get_candidates();
        $this->view('home', [
            'hasil' => result_winner($this->home_model->get_winner()),
            'classes' => $this->home_model->get_class(),
            'candidates' => menu_candidate($candidates),
            'total_user' => $this->home_model->total_user(),
            'total_vote' => $this->home_model->total_vote(),
            'total_candidate' => $this->home_model->total_candidate()
        ]);
    }
    
    public  function register(){
        if (empty($this->post('name'))){
            $output = [
                'error' => true,
                'pesan' => 'Nama Lengkap Tidak Boleh Kosong'
            ];
        }elseif (empty ($this->post('class'))){
            $output = [
                'error' => true,
                'pesan' => 'Kelas Wajib Diisi'
            ];
        }elseif(empty ($this->post('email'))){
            $output = [
                'error' => true,
                'pesan' => 'Alamat Email Tidak Boleh Kosong'
            ];
        }elseif (!filter_var($this->post('email'), FILTER_VALIDATE_EMAIL)){
            $output = [
                'error' => true,
                'pesan' => 'Ini Bukan Alamat Email'
            ];
        }elseif (!$this->auth_model->check_email($this->post('email'))){
            $output = [
                'error' => true,
                'pesan' => 'Alamat Email Sudah Terdaftar'
            ];
        }elseif (empty ($this->post('password'))){
            $output = [
                'error' => true,
                'pesan' => 'Password Wajib Diisi'
            ];
        }else{
            $data = [
                'name' => $this->post('name'),
                'email' => $this->post('email'),
                'class_id' => $this->post('class'),
                'level' => 'student',
                'status' => '0',
                'avatar' => '',
                'password' => password_hash($this->post('password'), PASSWORD_DEFAULT)
            ];
            log_message('error', json_encode($data));
            if ($this->auth_model->register($data)){
                $output = [
                    'url' => site_url(),
                    'error' => false,
                ];
            }else{
                $output = [
                    'error' => true,
                    'pesan' => json_encode($data)
                ];
            }
        }
        $this->output($output);
    }
    
    public function vote(){
        $vote = $this->post('candidate');
        $email = $this->post('email');
        $password = $this->post('password');
        
        if(empty($email)){
            $output = [
                'error' => true,
                'pesan' => 'Email Kosong'
            ];
        }elseif(empty ($password)){
            $output = [
                'error' => true,
                'pesan' => 'Password Kosong'
            ];
        }else{
            $data = $this->auth_model->get_data($email);
            
            if($this->auth_model->check_email($email)){
                $output = [
                'error' => true,
                'pesan' => 'Akun Belum Terdaftar'
                ];
            }elseif (!password_verify($password, $data['password'])) {
                $output = [
                'error' => true,
                'pesan' => 'Alamat Email dan Kata Sandi Tidak Cocok'
                ];
            }elseif($data['status']==0){
                $output = [
                'error' => true,
                'pesan' => 'Akun Belum Diaktivasi, Silahkan hubungi operator'
                ];
            }else{
                $info['user_id'] = $data['id'];
                $info['candidate_id'] = $vote;
                
                if(!$this->dash_model->check_vote($data['id'])){
                    $output = [
                        'error' => true,
                        'pesan' => 'Cukup sekali saja'
                    ];
                }else{
                    if ($this->dash_model->vote($info)){
                    $output = [
                        'url' => site_url(),
                        'error' => false,
                    ];
                    }else{
                    $output = [
                        'error' => true,
                        'pesan' => 'User Gagal Disimpan'
                    ];
                    }
                }
                
            }
        }
        
        $this->output($output);
    }
}