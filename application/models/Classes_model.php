<?php

class Classes_model extends CI_Model{
    public function delete($id) {
        $this->db->trans_begin();
        $this->db->delete('classes', ['id'=> $id]);
        
        if ($this->db->trans_status()){
            $this->db->trans_commit();
            return true;
        }
        $this->db->trans_rollback();
        
        return false;
    }
    public function get_all(){
        $result = $this->db->select('*')->from('classes')->get();
        
        if ($result->num_rows()> 0){
            return $result->result_array();
        }
        
        return null;
    }
    
    public function get_data($id) {
        $result = $this->db->select('*')->from('classes')->where('id', $id)->get();
        
        if ($result->num_rows()> 0){
            return $result->row_array();
        }
        return true;
    }
    
    public function save($data, $id = 0) {
        $this->db->trans_begin();
        if (is_numeric($id)&& $id > 0){
            $data['modified'] = date ('Y-m-d H:i:s');
            $this->db->update('classes', $data, ['id'=> $id]);
        }else {
            $data['created'] = date ('Y-m-d H:i:s');
            $data['modified'] = date ('Y-m-d H:i:s');
            $this->db->insert('classes', $data);
        }
        
        if($this->db->trans_status()){
            $this->db->trans_commit();
            log_message('error', json_encode($data));
            return true;
        }
        
        $this->db->trans_rollback();
        return false;
    }
}