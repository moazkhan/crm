<?php 

class Project_model extends CI_Model {

        public function add($data)
        {

            $this->db->insert('project', $data);
            return $this->db->insert_id();
        }
		
		public function get($id)
        {
            $this->db->where("project_id",$id);
            $query = $this->db->get('project');
				
			return $query->row();
        }
		
		public function get_all($status=null){
			
			$this->db->select('p.project_id, p.project_name, p.client_id, p.project_definition, p.project_credential, p.project_status, i.client_name');
            $this->db->from('project p');
			$this->db->join('client i', 'i.client_id = p.client_id');
			
			if($status)
				$this->db->where('p.project_status',$status);
			
			$query = $this->db->get();
			
			return $query->result();
			
                // $query = $this->db->get('project');
                // return $query->result();
        }
		
		public function delete($id){

                $this->db->where('project_id', $id);
                $this->db->delete('project');
        }
		
		public function project_note($data){
			
			$this->db->insert('project_notes', $data);
            return $data['project_id'];
			
		}
		public function get_project_notes($id)
        {
                $this->db->where("project_id",$id);
                $query = $this->db->get('project_notes');
                return $query->result();
        }
		public function delete_note($id)
		{
			$this->db->where('note_id', $id);
            $this->db->delete('project_notes');
		}
		
		public function update($data)
		{
			$this->db->where('project_id', $data['project_id']);
			$this->db->update('project', $data);
            return  $data['project_id'];
		}
		public function update_credential($data)
		{
			$this->db->where('project_id', $data['project_id']);
			$this->db->update('project', $data);
            return  $data['project_id'];
		}
		public function update_status($data)
		{
			$this->db->where('project_id', $data['project_id']);
			$this->db->update('project', $data);
            return  $data['project_id'];
		}
}
