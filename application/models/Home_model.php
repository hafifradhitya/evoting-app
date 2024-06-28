<?php

class Home_model extends CI_Model {
    
    public function get_class(){
        $result = $this->db->select('*')->from('classes')->get();
        
        if ($result->num_rows()> 0){
            return $result->result_array();
        }
        
        return [];
    }
    
    public function get_candidate($id) {
        $result = $this->db->select('*')->from('candidates')->where('id', $id)->get();
    
        if ($result->num_rows()> 0){
            return $result->row_array();
        }
    
        return [];
    }
    
    public function get_winner() {
        $result = $this->db->select('id, candidate_id, COUNT(candidate_id) as total')->from('votes')
                ->where('YEAR(created)', date('Y'))
                ->group_by('candidate_id')
                ->limit(3)
                ->order_by('total', 'desc')
                ->get();
    
        if ($result->num_rows()> 0){
            
            return $result->result_array();
        }
    
        return null;
    }
    
    public function total_candidate() {
        return $this->db->from('candidates')->where('YEAR(created)', date('Y'))->count_all_results();
    }
    
    public function total_user() {
        return $this->db->from('users')->where('level', 'student')->count_all_results();
    }
    
    public function total_vote() {
        return $this->db->from('votes')->where('YEAR(created)', date('Y'))->count_all_results();
    }
}