<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aos extends MY_Controller {	
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
		$this->data['page_title'] = humanize('aos'); 
        $bc = array(array('link' => '#', 'page' => humanize('aos')));
        $meta = array('page_title' => humanize('aos'), 'bc' => $bc);         
        $this->frontend_construct('about/aos', $this->data, $meta);
	} 
}
