<?php 

class Calender_model extends CI_Model {

        public function insert($data)
        {

        	$this->db->insert('calender', $data);
			if($data['lead_id']!= 0)
				return $data['lead_id'];
			elseif($data['client_id']!= 0)
				return $data['client_id'];
			else
				return $data['project_id'];
		}

		public function update($id, $data){
				
			$this->db->where('id', $id);	
			$this->db->update('calender',$data);
			
		}

		public function get_status($id){
			$this->db->select('status');
			$this->db->from('calender');
			$this->db->where('id',$id);

			$query = $this->db->get();

			return $query->row();
		}
		
		public function get_meeting($id){

			$this->db->select('*');
			$this->db->from('calender');
			$this->db->where('id',$id);
			$query = $this->db->get();

			return $query->row();

		}
		
		public function get_all_lead(){

			$this->db->select('c.*,lead.lead_name'); 
			$this->db->from('calender c');
			$this->db->join('lead', 'lead.lead_id = c.lead_id', 'inner'); 
			$this->db->where ('DATE(c.meeting_date)', date("Y-m-d"));
			$query = $this->db->get();
			//var_dump($query->result());
			return $query->result();
			
			// var_dump($query->result());
			// exit();
                

        }
		public function get_all_project(){
			
			$this->db->select('c.*,project.project_name'); 
			$this->db->from('calender c');
			$this->db->join('project', 'project.project_id = c.project_id', 'inner'); 
			$this->db->where ('DATE(c.meeting_date)', date("Y-m-d"));
			$query = $this->db->get();
			//var_dump($query->result());

			// echo $this->db->last_query();
			// exit();
			return $query->result();
			 
			// exit();
		}
		public function get_all_client(){
			
			$this->db->select('c.*,client.client_name'); 
			$this->db->from('calender c');
			$this->db->join('client', 'client.client_id = c.client_id', 'inner'); 
			$this->db->where ('DATE(c.meeting_date)', date("Y-m-d"));
			$query = $this->db->get();
			//var_dump($query->result());
			return $query->result();
		}
}
