<?php

    class Calender extends CI_Controller{

        public function reschedule_meeting(){

            if(is_null($this->session->userdata('user'))){
                redirect('/login', 'refresh');
            }

            if(!empty($_POST)){
                
                $id = $this->input->post('id');
                $date = $this->input->post('date');
                $time = $this->input->post('time');
                
                if($id && $date && $time){
    
                    $this->load->model("calender_model");
    
                    $row = $this->calender_model->get_meeting($id);
    
                    $data = array(
                        'meeting_date' => $date,
                        'meeting_time' => $time,
                        'lead_id' => $row->lead_id,
                        'client_id' => $row->client_id,
                        'project_id' => $row->project_id,
                    );

                    $meeting_id = $this->calender_model->insert($data);

                    $data = array(
                        'status' => 2
                    );

                    $this->calender_model->update($id,$data);

                    redirect('dashboard', 'refresh');
    
                }
            } 
        }

        public function change_status(){

            if(!empty($_POST)){
                $id = $this->input->post('id');
                $this->load->model("calender_model");
                $row = $this->calender_model->get_status($id);
                
                if($row->status == 1){
                    $data = array(
                        'status' => 2
                    );
                    $this->calender_model->update($id,$data);
                }else{
                    $data = array(
                        'status' => 1
                    );
                    $this->calender_model->update($id,$data);
                }

            }
           
        }
    }
?>