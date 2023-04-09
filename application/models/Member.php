<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends MY_Controller
{
    function __construct() {
        parent::__construct();
		
		$this->load->library('form_validation');
        $this->load->library('session');
		$this->load->model('home_model');
        if (! $this->memberLoggedIn) { 
           redirect('member-login'); 
        }
        
    }
    function index()
	{ 
       if (! $this->memberLoggedIn) { 
           redirect('member-login'); 
        }
        
        $this->data['page_title'] = 'Programs Training';
        $bc = array(array('link' => '#', 'page' => 'Programs Training'));
        $meta = array('page_title' => 'Programs Training', 'bc' => $bc);
        
       // $this->data['right_bar'] = $this->frontend_construct('right_bar',  $this->data, $meta); 
        $this->frontend_construct('pages/memberdashboard', $this->data, $meta);
		
    }

    function dashboard(){
        if (! $this->memberLoggedIn) { 
           redirect('member-login'); 
        }   

        $this->data['info'] = $this->home_model->membearProfile($this->session->userdata('member_id'));
        $this->data['qualification'] = $this->home_model->quInfo($this->session->userdata('member_id'));

        $this->data['page_title'] = 'Dashboard';
        $bc = array(array('link' => '#', 'page' => 'Dashboard'));
        $meta = array('page_title' => 'Dashboard', 'bc' => $bc);
         
        $this->frontend_construct('member/memberdashboard', $this->data, $meta); 
    }

     function change_password() {
        $this->load->model('auth_model'); 
       
        if (!$this->memberLoggedIn) { 
            redirect('member-login');
        }

        $this->form_validation->set_rules('old_password', lang('old_password'), 'required');

        $this->form_validation->set_rules('new_password', lang('new_password'), 'required|max_length[25]|min_length[8]');

        $this->form_validation->set_rules('new_password_confirm', lang('confirm_password'), 'required|matches[new_password]');



        $user = $this->home_model->user();
 
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('error', validation_errors());

            redirect('member/dashboard/changepass');

        } else {

            if(DEMO) {

                $this->session->set_flashdata('error', lang('disabled_in_demo'));

                redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');

            }



            $identity = $this->session->userdata('identity');


            
            $change = $this->auth_model->change_password($identity, $this->input->post('old_password'), $this->input->post('new_password'));



            if ($change) {

                $this->session->set_flashdata('message', $this->auth_model->messages());

                redirect('logout-home');

            } else {

                $this->session->set_flashdata('error', $this->auth_model->errors());

                redirect('member/dashboard/changepass');

            }

        } 

    }

}