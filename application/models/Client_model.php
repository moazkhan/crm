<?php 

class Client_model extends CI_Model {

        public function add($data)
        {

            $this->db->insert('client', $data);
            return $this->db->insert_id();
        }
		
        public function get($id)
        {
            $this->db->where("client_id",$id);
            $query = $this->db->get('client');
				
			return $query->row();
        }

        public function get_client_project($id){

            $this->db->where("client_id",$id);
            $query = $this->db->get('project');
           
			return $query->result();
        }
		
		public function get_all()
        {
            $query = $this->db->get('client');
			return $query->result();
        }
		
		public function delete($id){

                $this->db->where('client_id', $id);
                $this->db->delete('client');
        }
		
		public function update($data)
		{
			$this->db->where('client_id', $data['client_id']);
			$this->db->update('client', $data);
            return  $data['client_id'];
		}

        public function client_note($data){
			
			$this->db->insert('client_notes', $data);
            return $data['client_id'];
			
		}
		public function get_client_notes($id)
        {
                $this->db->where("client_id",$id);
                $query = $this->db->get('client_notes');
                return $query->result();
        }
		public function delete_note($id)
		{
			$this->db->where('note_id', $id);
            $this->db->delete('client_notes');
		}
		

}