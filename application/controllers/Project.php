<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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
		
		$this->load->model("project_model");
		$data['projects'] = $this->project_model->get_all();
		
		$this->load->view('header');
		$this->load->view('project/list', $data);
		$this->load->view('footer');

	}

	public function add(){

		//If not logged in redirect to login
		if(is_null($this->session->userdata('user')))
			redirect('/login', 'refresh');
		
		$this->load->model("client_model");
		$data['clients'] = $this->client_model->get_all();
		
		$this->load->view('header');
		$this->load->view('project/add', $data);
		$this->load->view('footer');

	}
	
	public function save(){
	
		$this->load->model("project_model");
		$id = $this->project_model->add($this->input->post());
		redirect('/project/edit/'.$id, 'refresh');
	}
	
	public function edit($id){

		$this->load->model("project_model");
		$data['project'] = $this->project_model->get($id);
		$data['project_notes'] = $this->project_model->get_project_notes($id);
		// var_dump($data['project_notes']);
		// exit();
		
		$this->load->model("client_model");
		$data['clients'] = $this->client_model->get_all();
		
		
		$this->load->view('header');
		$this->load->view('project/edit', $data);
		$this->load->view('footer');

	}
	
	public function delete($id){

		$this->load->model("project_model");
		$this->project_model->delete($id);

		redirect('/project', 'refresh');
	}

	public function schedule_meeting()
	{
		if (!empty($_POST)) {
            $date = $this->input->post('date');
            $time = $this->input->post('time');
            $project_id = $this->input->post('project_id');
            
            if ($date && $time && $project_id) {
                
                $this->load->model('calender_model');
                $data = array(
                    'meeting_date' => $date,
                    'meeting_time' => $time,
                    'lead_id' => 0,
					'client_id' => 0,
					'project_id' => $project_id
                );

                
                $id = $this->calender_model->insert($data);

                redirect('/project/edit/'.$project_id, 'refresh');
            }
        }
	}

	public function upload_file()
	{
	
		$config['upload_path']          = 'uploads/project';
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
				$project_id = $this->input->post('project_id');
				$attachment = $data["upload_data"]["file_name"];
				
				
				if ($contant && $project_id && $attachment) {
					
					$this->load->model('project_model');
					$data = array(
						'contant' => $contant,
						'project_id' => $project_id,
						'attachment' => $attachment
					);

					
					$id = $this->project_model->project_note($data);

					redirect('/project/edit/'.$id, 'refresh');
				}
        }
				
		}
		
	}
	
	
	public function delete_note($note_id,$project_id,$attachment)
	{
		if(file_exists("uploads/project/".$attachment )){
			unlink("uploads/project/".$attachment );
			}
		$this->load->model("project_model");
		$this->project_model->delete_note($note_id);

		redirect('/project/edit/'.$project_id);
	}
	
	public function update_info(){

		
		$this->load->model("project_model");
		$id = $this->project_model->update($this->input->post());

		redirect('/project/edit/'.$id, 'refresh');

	}

	public function update_credential(){

		
		$this->load->model("project_model");
		$id = $this->project_model->update_credential($this->input->post());

		redirect('/project/edit/'.$id, 'refresh');

	}
	public function update_status(){

		
		$this->load->model("project_model");
		$id = $this->project_model->update_status($this->input->post());

		redirect('/project/edit/'.$id, 'refresh');

	}

}
