<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('inflector');
		$this->load->helper('array');
		$this->load->helper('string');
		$this->load->library('user_agent');
		$this->load->helper(array('form', 'url'));
	}
	public function index() {
		$attachment = NULL;
		$this->form_validation->set_rules('name', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('phone', 'phone', 'required');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		if ($this->form_validation->run() == true) {
			if (!empty($_FILES['userfile']['name'])) {
                $this->load->library('upload');
				$config['upload_path'] = 'uploads/cv/';
				$config['allowed_types'] = 'doc|docx|pdf';
				$config['max_width'] = '300';
				$config['max_height'] = '300';
				$config['overwrite'] = FALSE;
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload()) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect($_SERVER['HTTP_REFERER']);
				}
				$attachment = base_url('uploads/cv/') . $this->upload->file_name;
			}
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'subject' => $this->input->post('subject'),
				'message' => $this->input->post('message'),
			);
			if ($this->input->post('email')) {
				$email = $this->input->post('email');
				$subject = $this->input->post('subject');
				$from_name = 'Frontdesk(FDB)';
				$to = $this->input->post('email'); //$this->Settings->default_email;
				$from = $this->input->post('email');
				$this->data['mailData'] = $data;
				$message = $this->load->view($this->frontend_theme . 'email_templates/contacts', $this->data, TRUE);
				$this->tec->send_email($to, $subject, $message, $from, $from_name, $attachment, $email, NULL);
				$this->session->set_flashdata('message', 'Mail Send Successfully, We are soon contact with you! ');
			}
			/*if($this->site->insertQuery('contact_message')){
				$this->session->set_flashdata('error', 'Contact Successfully Submited, We will contact you as soon as possible');
				redirect('contact');
			*/
		}
		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		$this->data['page_title'] = humanize('Contact_Us');
		$bc = array(array('link' => '#', 'page' => humanize('contact_Us')));
		$meta = array('page_title' => humanize('contact_Us'), 'bc' => $bc);
		$this->frontend_construct('contact/index', $this->data, $meta);
	}
	public function sendMessage() {
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
		$this->form_validation->set_rules('last_name', 'last_name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('phone', 'phone', 'required');
		if ($this->form_validation->run() == true) {
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'message' => $this->input->post('message'),
			);
		}
		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		redirect($_SERVER["HTTP_REFERER"], $this->data['error']);
		/*$this->data['page_title'] = humanize('Contact_Us');
			        $bc = array(array('link' => '#', 'page' => humanize('contact_page')));
			        $meta = array('page_title' => humanize('contact_page'), 'bc' => $bc);
		*/
	}
}
