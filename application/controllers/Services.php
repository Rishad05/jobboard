<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {	
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
        $this->data['services'] = $this->site->whereRows('services','status',1,'ASC');
        $bc = array(array('link' => '#', 'page' => humanize('about_us')));
        $meta = array('page_title' => humanize('about_us'), 'bc' => $bc);         
        $this->frontend_construct('services/index', $this->data, $meta);
	}
    public function details($url){ 
        $url = str_replace('_',' ',$url);
        $services = $this->site->whereRow('services','title',$url);
        $this->data['services'] = $services;
        $bc = array(array('link' => '#', 'page' => humanize('about_us')));
        $meta = array('page_title' => humanize('about_us'), 'bc' => $bc);         
        $this->frontend_construct('services/details', $this->data, $meta);
    }
}
