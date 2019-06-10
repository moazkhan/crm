<?php 

class Lead_model extends CI_Model {

        public function add($data)
        {

                $this->db->insert('lead', $data);
                return $this->db->insert_id();
        }
		
		public function update($data)
		{
			$this->db->where('lead_id', $data['lead_id']);
			$this->db->update('lead', $data);
            return  $data['lead_id'];
		}

        public function get($id)
        {
                $this->db->where("lead_id",$id);
                $query = $this->db->get('lead');
				
                return $query->row();
        }
		public function get_lead_notes($id)
        {
                $this->db->where("lead_id",$id);
                $query = $this->db->get('lead_notes');
                return $query->result();
        }
		
		
		public function lead_note($data){
			
			$this->db->insert('lead_notes', $data);
            return $data['lead_id'];
			
		}

        public function get_all(){

                $query = $this->db->get('lead');
                return $query->result();
        }

        public function delete($id){

                $this->db->where('lead_id', $id);
                $this->db->delete('lead');
        }
		
		public function delete_note($id)
		{
			$this->db->where('note_id', $id);
            $this->db->delete('lead_notes');
		}

        

}