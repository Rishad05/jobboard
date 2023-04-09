<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{

   
    function __construct()
    {
        parent::__construct();
	   $this->load->library('form_validation');
	   $this->load->model('employee_model');
    }


    function index() {
		
        $this->data['page_title'] = 'Home Page';
        $bc = array(array('link' => '#', 'page' => 'Home Page'));
        $meta = array('page_title' => 'Home Page', 'bc' => $bc);
        $this->frontend_construct('home', $this->data, $meta);

    }
	
	  function login() {
		 $this->data['valid_mail'] ='';
		 $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		 $this->form_validation->set_rules('password', 'Password', 'trim|required');
		 if ($this->form_validation->run() == true) {
			 $data = array(
			 'email' => $this->input->post('email'),
			 'password' => md5($this->input->post('password')),
			); 
			 
			$is_login = $this->employee_model->loginEmp($data);
			
			if( $is_login == FALSE){
			 $this->data['valid_mail'] = 'Login Failed, Please try again';
			}else{
			  redirect('assessmen');
			}
			
		  }
        $this->data['page_title'] = 'Employee login';
        $bc = array(array('link' => '#', 'page' => 'Employee login'));
        $meta = array('page_title' => 'Employee login', 'bc' => $bc);
        $this->frontend_construct('login', $this->data, $meta);

    }

}
