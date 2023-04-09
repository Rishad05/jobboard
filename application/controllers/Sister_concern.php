<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sister_concern extends MY_Controller {	
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
		$this->data['page_title'] = humanize('sister_concern'); 
        $bc = array(array('link' => '#', 'page' => humanize('sister_concern')));
        $meta = array('page_title' => humanize('sister_concern'), 'bc' => $bc);         
        $this->frontend_construct('about/sister_concern', $this->data, $meta);
	} 
}
