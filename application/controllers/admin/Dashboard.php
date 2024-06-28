<?php

class Dashboard extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('dash_model');
    }
    
    public function index(){
        $data['nama_user'] = $this->session->userdata('nama');
            
        $vote = $this->dash_model->get_candidates();
        $data['page_tittle'] = 'Hasil Pemilihan Sementara';
        $data['candidate'] = result_candidate($vote);
        
        $this->view('dashboard', $data);
    }
    
    public function logout(){
        $this->session->unset_userdata('admin-id');
        $this->session->unset_userdata('admin-nama');
        $this->session->unset_userdata('admin-email');
        redirect(site_url('admin/dashboard'));
    }
    
    public function vote(){
        $data['user_id'] = $this->session->userdata('id');
        $data['candidate_id'] = $this->post('candidate');
        
        if ($this->dash_model->vote($data)){
            $output = [
                'url' => site_url('dashboard'),
                'error' => false,
                ];
        }else{
            $output = [
                'error' => true,
                'pesan' => 'User Gagal Disimpan'
                ];
        }
        
        $this->output($output);
    }
}