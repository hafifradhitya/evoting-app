<?php

class Dash_model extends CI_Model {
    public function check_vote($id) {
        $result = $this->db->select('*')->from('votes')
                ->where('user_id', $id)
                ->where('YEAR(created)', date('Y'))
                ->get();
        
        if ($result->num_rows()> 0){
            return false;
        }
        return true;
    }
    
    public function get_candidates() {
        $result = $this->db->select('*')->from('candidates')->where('YEAR(created)', date('Y'))->get();
        
        if($result->num_rows()>0){
            return $result->result_array();
        }
        
        return [];
    }
    
    public function vote($data){
        $this->db->trans_begin();
        
        $data['created'] = date('Y-m-d');
        $this->db->insert('votes', $data);
        
        if ($this->db->trans_status()){
            $this->db->trans_commit();
            log_message('error', json_encode($data));
            return true;
        }
        
        $this->db->trans_rollback();
        return false;
    }
    
    public function votes($id){
        return $this->db
                ->where('candidate_id', $id)
                ->where('YEAR(created)', date('Y'))
                ->from('votes')
                ->count_all_results();
        //return $id;
    }
    
    
        
}

