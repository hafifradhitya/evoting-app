<?php

class User_model extends CI_Model{
    public function check_email($email) {
        $result = $this->db->select('email')->from('users')->where('email', $email)->get();
        
        if ($result->num_rows()> 0){
            return false;
        }
        return true;
    }
    
    public function delete($id) {
        $this->db->trans_begin();
        $this->db->delete('users', ['id'=> $id]);
        
        if ($this->db->trans_status()){
            $this->db->trans_commit();
            return true;
        }
        $this->db->trans_rollback();
        
        return false;
    }


    public function get_all(){
        $result = $this->db->select('*')->from('users')->get();
        
        if ($result->num_rows()>0){
            return $result->result_array();
        }
        
        return null;
    }
    
    public function get_class(){
        $result = $this->db->select('*')->from('classes')->get();
        
        if ($result->num_rows()> 0){
            return $result->result_array();
        }
        
        return [];
    }
    
    public function get_data($id) {
        $result = $this->db->select('*')->from('users')->where('id', $id)->get();
        
        if ($result->num_rows()> 0){
            return $result->row_array();
        }
        return true;
    }
    
    public function get_total() {
        return $this->db->count_all('users');
    }
    
    public function save($data, $id = 0) {
        $this->db->trans_begin();
        if (is_numeric($id)&& $id > 0){
            $this->db->update('users', $data, ['id'=> $id]);
        }else {
            $this->db->insert('users', $data);
        }
        
        if($this->db->trans_status()){
            $this->db->trans_commit();
            return true;
        }
        
        $this->db->trans_rollback();
        return false;
    }
        
}