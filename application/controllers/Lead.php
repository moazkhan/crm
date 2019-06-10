<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {

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

	public function index(){

		//If not logged in redirect to login
		if(is_null($this->session->userdata('user')))
			redirect('/login', 'refresh');

		$this->load->model("lead_model");
		$data['leads'] = $this->lead_model->get_all();

		$this->load->view('header');
		$this->load->view('lead/list',$data);
		$this->load->view('footer');

	}

	public function add(){

		//If not logged in redirect to login
		if(is_null($this->session->userdata('user')))
			redirect('/login', 'refresh');

		$this->load->view('header');
		$this->load->view('lead/add');
		$this->load->view('footer');

	}

	public function save(){

		$this->load->model("lead_model");
		
		$id = $this->lead_model->add($this->input->post());

		redirect('/lead/edit/'.$id, 'refresh');

	}

	public function edit($id){

		$this->load->model("lead_model");
		$data['lead'] = $this->lead_model->get($id);
		$data['lead_notes'] = $this->lead_model->get_lead_notes($id);

		$this->load->view('header');
		$this->load->view('lead/edit',$data);
		$this->load->view('footer');

	}
	public function update(){

		
		$this->load->model("lead_model");
		$id = $this->lead_model->update($this->input->post());

		redirect('/lead/edit/'.$id, 'refresh');

	}
	
	public function schedule_meeting()
	{
		
		if (!empty($_POST)) {
            $date = $this->input->post('date');
            $time = $this->input->post('time');
            $lead_id = $this->input->post('lead_id');
            
            if ($date && $time && $lead_id) {
                
                $this->load->model('calender_model');
                $data = array(
                    'meeting_date' => $date,
                    'meeting_time' => $time,
                    'lead_id' => $lead_id,
					'client_id' => 0,
					'project_id' => 0
                );

                
                $id = $this->calender_model->insert($data);

                redirect('/lead/edit/'.$id, 'refresh');
            }
        }
	}
	
	public function upload_file()
	{
	
		$config['upload_path']          = 'uploads/lead';
		$config['allowed_types']        = 'gif|jpg|png|pdf|csv|doc';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		
		if ( ! $this->upload->do_upload('filename'))
		{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				exit();
				
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				
				if (!empty($_POST)) {
				$contant = $this->input->post('contant');
				$lead_id = $this->input->post('lead_id');
				$attachment = $data["upload_data"]["file_name"];
				
				if ($contant && $lead_id && $attachment) {
					
					$this->load->model('lead_model');
					$data = array(
						'contant' => $contant,
						'lead_id' => $lead_id,
						'attachment' => $attachment
					);

					
					$id = $this->lead_model->lead_note($data);

					redirect('/lead/edit/'.$id, 'refresh');
				}
        }
				
		}
		
	}
	

	public function delete($id){

		$this->load->model("lead_model");
		$this->lead_model->delete($id);

		redirect('/lead', 'refresh');
	}
	
	public function transfertoclient($id){

	
		$this->load->model("lead_model");
		$val = $this->lead_model->get($id);
		$lead =  json_decode(json_encode($val), True);
			
		$row = array(
					'client_name' => $lead['lead_name'],
					'client_email' => $lead['lead_email'],
					'client_phone' => $lead['lead_phone'],
					'client_address' => $lead['lead_address'],
					'client_city' => $lead['lead_city'],
					'client_state' => $lead['lead_state'],
					'client_zip' => $lead['lead_zip'],
					'client_country' => $lead['lead_country'],
					'client_source' => $lead['lead_source'],
					'client_skype_id' => $lead['lead_skype_id'],
					'client_status' => $lead['lead_status']
					
				);
		$data['client'] = json_decode(json_encode($row));
		
		$this->load->view('header');
		$this->load->view('client/add',$data);
		$this->load->view('footer');
		
	}

	public function delete_note($note_id,$lead_id,$attachment)
	{
		if(file_exists("uploads/lead/".$attachment )){
			unlink("uploads/lead/".$attachment );
			}
		$this->load->model("lead_model");
		$this->lead_model->delete_note($note_id);

		redirect('/lead/edit/'.$lead_id);
	}
}
