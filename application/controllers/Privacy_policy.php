<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends MY_Controller {	
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
		$this->data['page_title'] = humanize('about_us');
        $this->data['about'] = $this->site->whereRow('pages','id',6);
        $bc = array(array('link' => '#', 'page' => humanize('about_us')));
        $meta = array('page_title' => humanize('about_us'), 'bc' => $bc);         
        $this->frontend_construct('pages/privacy_policy', $this->data, $meta);
	}
}
