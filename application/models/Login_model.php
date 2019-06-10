<?php 

class Login_model extends CI_Model {

        public function add($data)
        {

                $this->db->insert('login', $data);
                return $this->db->insert_id();
        }
		
	public function get($username)
        {
                $this->db->where("login_user",$username);
                $query = $this->db->get('login');
				
                return $query->row();
        }
		
        public function delete($id)
        {
                $this->db->where('login_id', $id);
                $this->db->delete('login');
        }

	public function update($data)
        {
                $this->db->where('login_id', $data['login_id']);
                $this->db->update('login', $data);
                return  $data['login_id'];
        }
        

}