<?php

    class Discussion_model extends CI_Model {
        
        public function get_project_discussion($id) {
            
            $this->db->select('*');
            $this->db->from('project_discussions');
            $this->db->where('project_id',$id);
            $query = $this->db->get();

            return $query->result();
        }


        public function add($data){

            $this->db->insert('project_discussions', $data);

            return $this->db->insert_id();
        }
    
    }
?>