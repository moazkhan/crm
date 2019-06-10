<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Discussion extends CI_Controller {

        public function __construct(){

            parent::__construct();

        	//If not logged in redirect to login
            if(is_null($this->session->userdata('user')))
            redirect('/login', 'refresh');
        }
      
        public function view($project_id){


            //GET DISCUSSION RELATED TO PTOJECT
            $this->load->model('discussion_model');
            $data['discussions'] = $this->discussion_model->get_project_discussion($project_id);
            $data['project_id'] = $project_id;

            //GET PTOJECT NAME
            $this->load->model('project_model');
            $query = $this->project_model->get($project_id);
            $data['project_name'] = $query->project_name;
            
            
            $this->load->view('header');
            $this->load->view('project/discussions', $data);
            $this->load->view('footer');
            
        }

        public function save(){

            $project_id = $this->input->post('project_id');
            $discus = $this->input->post('project_discussion');
            $user_id = $this->session->userdata('user_id');


            $data = array(
                'project_id' =>$project_id,
                'discussion' => $discus,
                'user_id' => $user_id
            );

            //   var_dump($data);
            
            $this->load->model('discussion_model');
            $id = $this->discussion_model->add($data);

            redirect('discussion/view/'.$project_id);

        }
    }
?>