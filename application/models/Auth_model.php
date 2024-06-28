<?php

class Auth_model extends CI_Model{
    public function check_email($email) {
        $result = $this->db->select('*')->from('users')->where('email', $email)->get();
        
        if ($result->num_rows()> 0){
            return false;
        }
        return true;
    }
    
    public function get_data($email) {
        $result = $this->db->select('*')->from('users')->where('email', $email)->get();
        
        if($result->num_rows()>0){
            return $result->row_array();
        }
        
        return false;
    }
    
    public function login($email) {
        $result = $this->db->select('*')->from('users')->where('email', $email)->get();
        
        if($result->num_rows()>0){
            return true;
        }
        
        return false;
    }
    
    public function register($data) {
        log_message('error', json_encode($data));
        //$this->db->trans_begin();
        $data['created'] = date('Y-m-d');
        $data['modified'] = date('Y-m-d');
        $this->db->insert('users', $data);
    
        if ($this->db->affected_rows()>0){
            //this->db->trans_commit();
            return true;
        }
    
        //$this->db->trans_rollback();
        return false;
    }
}
