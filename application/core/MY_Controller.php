<?php

class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    protected function get($name){
        return $this->input->get($name, true);
    }
    
    protected function get_post($name) {
        return $this->input->get_post($name, true);
    }
    protected function output($output) {
        $type = gettype($output);
        if ($type === 'array'){
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
        
        if ($type === "string") {
            $this->output->set_content_type('text/plain')->set_output($output);
            
        }
    }
    
    protected function post($name) {
        return $this->input->post($name, true);
    }
    
    protected function post_get($name) {
        return $this->input->post_get($name, true);
    }
    
    
    
    
}

class Admin_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->validate_user();
    }
    
    protected function view($view, $data = []){
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/'.$view, $data);
        $this->load->view('admin/layout/footer', $data);
    }
    
    protected function validate_user() {
        if (!$this->session->userdata('admin-email')){
            if ($this->uri->segment(1)!== 'login'){
                redirect(site_url('admin/login'));
            }
        }
    }
}

class Site_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    protected function view($view, $data = []){
        $this->load->view('layout/header', $data);
        $this->load->view($view, $data);
        $this->load->view('layout/footer', $data);
    }
    
    protected function validate_user() {
//        if (!$this->session->userdata('email')){
//            if ($this->uri->segment(1)!== 'login'){
//                redirect(site_url('login'));
//            }
//        }
    }
}

if(!function_exists('ci')){
    function ci(){
        return get_instance();
    }
}
        
    