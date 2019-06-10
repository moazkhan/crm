<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
        {
            parent::__construct();
			   
			//If not logged in redirect to login
			if(is_null($this->session->userdata('user')))
			redirect('/login', 'refresh');
            
        }
	
	public function index(){
		
		$this->load->model("client_model");
		$data['clients'] = $this->client_model->get_all();

		$this->load->view('header');
		$this->load->view('client/list',$data);
		$this->load->view('footer');
	

	}

	public function dashboard(){

		$this->load->model("client_model");
		$id = $this->session->userdata('user_id');
		$data['client_project'] = $this->client_model->get_client_project($id);
		// var_dump($data['client_project']);
		// exit();
		$this->load->view('header');
		$this->load->view('client/dashboard',$data);
		$this->load->view('footer');
	}



	public function delete($id){

		$this->load->model("client_model");
		$data['client'] = $this->client_model->get($id);
		
		$array = json_decode(json_encode($data['client']), true);
		
		// var_dump($array['client_login_id']);
		// exit();
		$this->load->model("client_model");
		$this->client_model->delete($id);

		$this->load->model("login_model");
		$this->login_model->delete($array['client_login_id']);
		
		redirect('/client', 'refresh');
	}
	
	public function add(){

		$this->load->view('header');
		$this->load->view('client/add');
		$this->load->view('footer');

	}

	public function save(){
		
		$salt=substr(md5(mt_rand()), 0, 4);
		$password = md5($salt . $this->input->post("client_password") . $salt);

		$row = array(
					'login_user' => $this->input->post("client_username"),
					'login_pass' => $password,
					'login_salt' => $salt
				);
		
		$this->load->model("login_model");
		$id = $this->login_model->add($row);
	
		$details = array(
					'client_name' => $this->input->post("client_name"),
					'client_email' => $this->input->post("client_email"),
					'client_phone' => $this->input->post("client_phone"),
					'client_address' => $this->input->post("client_address"),
					'client_city' => $this->input->post("client_city"),
					'client_state' => $this->input->post("client_state"),
					'client_zip' => $this->input->post("client_zip"),
					'client_country' => $this->input->post("client_country"),
					'client_source' => $this->input->post("client_source"),
					'client_skype_id' => $this->input->post("client_skype_id"),
					'client_status' => $this->input->post("client_status"),
					'client_login_id' =>$id
					
				);
		$this->load->model("client_model");
		$id = $this->client_model->add($details);

		
		redirect('/client', 'refresh');
		
	}
	
	public function edit($id){

		$this->load->model("client_model");
		$data['client'] = $this->client_model->get($id);
		$data['client_notes'] = $this->client_model->get_client_notes($id);
		
		$array = json_decode(json_encode($data['client']), true);
		$this->load->model("login_model");
		$data['login']= $this->login_model->get($array['client_login_id']);
		
		
		$this->load->view('header');
		$this->load->view('client/edit',$data);
		$this->load->view('footer');

	}
	
	public function update_info()
	{
		$details = array(
					'client_id' => $this->input->post("client_id"),
					'client_name' => $this->input->post("client_name"),
					'client_email' => $this->input->post("client_email"),
					'client_phone' => $this->input->post("client_phone"),
					'client_address' => $this->input->post("client_address"),
					'client_city' => $this->input->post("client_city"),
					'client_state' => $this->input->post("client_state"),
					'client_zip' => $this->input->post("client_zip"),
					'client_country' => $this->input->post("client_country"),
					'client_source' => $this->input->post("client_source"),
					'client_skype_id' => $this->input->post("client_skype_id"),
					'client_status' => $this->input->post("client_status")
					
				);
				
		$this->load->model("client_model");
		$client_id = $this->client_model->update($details);

		redirect('/client/edit/'.$client_id);
		
	}
	public function update_login()
	{
		if($this->input->post("client_password") == "")
		{
			$row = array(
					'login_id' => $this->input->post("client_login_id"),
					'login_user' => $this->input->post("client_username")
					
				);
			$this->load->model("login_model");
			$id = $this->login_model->update($row);

		}
		else{
			
			$salt=substr(md5(mt_rand()), 0, 4);
			$password = md5($salt . $this->input->post("client_password") . $salt);

			$row = array(
					'login_id' => $this->input->post("client_login_id"),
					'login_user' => $this->input->post("client_username"),
					'login_pass' => $password,
					'login_salt' => $salt
					
				);
			$this->load->model("login_model");
			$id = $this->login_model->update($row);
		}
		redirect('/client/edit/'.$this->input->post("client_id"));
	}

	public function schedule_meeting()
	{
		if (!empty($_POST)) {
            $date = $this->input->post('date');
            $time = $this->input->post('time');
            $client_id = $this->input->post('client_id');
            
            if ($date && $time && $client_id) {
                
                $this->load->model('calender_model');
                $data = array(
                    'meeting_date' => $date,
                    'meeting_time' => $time,
                    'client_id' => $client_id,
					'lead_id' => 0
                );

                
                $id = $this->calender_model->insert($data);

                redirect('/client/edit/'.$id, 'refresh');
            }
        }
	}
	
	public function upload_file()
	{
	
		$config['upload_path']          = 'uploads/client';
		$config['allowed_types']        = 'gif|jpg|png|pdf|csv|doc';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		
		if ( !$this->upload->do_upload('filename'))
		{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				exit();
				
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				
				
				if (!empty($_POST)) {
					$content = $this->input->post('content');
					$client_id = $this->input->post('client_id');
					$attachment = $data["upload_data"]["file_name"];
					
					
					if ($content && $client_id && $attachment) {
						
						// var_dump("agaya");
						// exit();	
						$data = array(
							'content' => $content,
							'client_id' => $client_id,
							'attachment' => $attachment
						);

						$this->load->model('client_model');
						$id = $this->client_model->client_note($data);
						
						// var_dump($id);
						// exit();
						redirect('/client/edit/'.$id);
					}
        }
				
		}
		
	}
	public function delete_note($note_id,$client_id,$attachment)
	{
		if(file_exists("uploads/client/".$attachment )){
			unlink("uploads/client/".$attachment );
			}
		$this->load->model("client_model");
		$this->client_model->delete_note($note_id);

		redirect('/client/edit/'.$client_id);
	}
}
