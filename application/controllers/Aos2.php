<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aos2 extends MY_Controller {	
	function __construct() {
        parent::__construct(); 
        $this->load->library('form_validation');  
        $this->load->helper('inflector');
        $this->load->helper('array');
        $this->load->helper('string');
        $this->load->helper('directory');
        $this->load->library('user_agent');
    }
	public function index(){  
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        $this->form_validation->set_rules('email', lang("email"), 'trim|required');
        $this->form_validation->set_rules('subject', lang("subject"), 'trim|required');
        $this->form_validation->set_rules('message', lang("message"), 'trim|required');
        if ($this->form_validation->run() == true) {  
           $email = $this->input->post('email');
           $from_name = $this->input->post('name');
           $subject = $this->input->post('subject');
            //$message = '';
            //$message .= 'Name : '.$from_name.'<br>';
            //$message .= 'Email : '.$email.'<br>';
            // $message .= 'Phone : '.$this->input->post('phone').'<br>';
            //$message .= 'Message : '.$this->input->post('message').'<br>';
           $data = array(
                'name' => $from_name,
                'email' => $email,
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'phone' => $this->input->post('phone'),
           );
            $this->data['mailData'] = $data;

            $message = $this->load->view($this->frontend_theme . 'email_templates/sendidea', $this->data, TRUE);
           
           if($email){ 
            $this->tec->send_email($this->Settings->default_email, "Visitor email from AOS page FDB", $message, $email, $from_name = NULL, $attachment = NULL, $cc = NULL, $bcc = NULL);
            $this->session->set_flashdata('message', 'Successfully! send your message.'); 
            redirect("aos2#ideaform_aospage");  

           }
        }


        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['clients'] = $this->site->whereRows('company','status',1,'ASC');
        $this->data['about'] = $this->site->whereRow('pages','id',9);
        $this->data['companies'] = $this->site->selectQuery('company', 8);
		$this->data['page_title'] = humanize('aos'); 
        $bc = array(array('link' => '#', 'page' => humanize('aos')));
        $meta = array('page_title' => humanize('aos'), 'bc' => $bc);         
        $this->frontend_construct('about/aos2', $this->data, $meta);
	} 


}
