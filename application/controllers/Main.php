<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
	
	 public function index()
	{
		//If user already logged-in and is an admin
		if($this->session->userdata('user') && $this->session->userdata('user') == 'admin'){

			redirect('/dashboard', 'refresh');

		}		//If user already logged-in and is a client
		elseif($this->session->userdata('user') && $this->session->userdata('user') != 'admin'){
			redirect('client/dashboard', 'refresh');

		}		//If no user is logged-in
		else{

			redirect('/login', 'refresh');
		}
	}

	public function login(){

		//If user already logged-in and is an admin
		if($this->session->userdata('user') && $this->session->userdata('user') == 'admin'){

			redirect('/dashboard', 'refresh');

		}	

			//If user already logged-in and is a client
		if($this->session->userdata('user') && $this->session->userdata('user') != 'admin'){
			redirect('client/dashboard', 'refresh');

		}

		//	Check if requesting user is admin 
		if($this->input->post("username") == "admin" && $this->input->post("password") == "admin"){

			$this->session->set_userdata('user', 'admin');
			$this->session->set_userdata('user_id', 0);
			redirect('/dashboard', 'refresh');

		}else //	Check if requesting user is a client
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('login_model');

			$data = $this->login_model->get($username);

			if($data){
				$salt = $data->login_salt;
				$check_pass = md5($salt . $password . $salt);

				if($check_pass == $data->login_pass){

					$this->session->set_userdata('user', $username);
					$this->session->set_userdata('user_id', $data->login_id);
					redirect('client/dashboard', 'refresh');
				}
				 
			}
		}

		$this->load->view('login');
	}

	public function dashboard(){

		//If not logged in redirect to login
		if(is_null($this->session->userdata('user')))
			redirect('/login', 'refresh');
		
		//If user already logged-in and is a client redirect to client dashboard
		if($this->session->userdata('user') && $this->session->userdata('user') != 'admin'){
			redirect('client/dashboard', 'refresh');

		}
		
		$this->load->model("calender_model");
		$this->load->model("project_model");

		$data['calender_lead'] = $this->calender_model->get_all_lead();
		$data['calender_client'] = $this->calender_model->get_all_client();
		$data['calender_project'] = $this->calender_model->get_all_project();
		
		// var_dump($data['calender_project']);
		// exit();
		
		$data['pending_projects'] = $this->project_model->get_all(2);
		$data['active_projects'] = $this->project_model->get_all(1);
		$this->load->view('header');
		$this->load->view('dashboard',$data);
		$this->load->view('footer');

	}

	public function logout(){

		$this->session->unset_userdata('user');

		$this->session->sess_destroy();

		redirect('/login', 'refresh');
	}

}
