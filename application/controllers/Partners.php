<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends MY_Controller {	
	function __construct() {
        parent::__construct(); 
        $this->load->library('form_validation');  
        $this->load->helper('inflector');
        $this->load->helper('array');
        $this->load->helper('string');
        $this->load->helper('directory');
        $this->load->library('user_agent');
    }
    public function index($term=NULL){
        $this->load->library('pagination');      
        $per_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = site_url('partners/index');
        $config['total_rows'] = $this->site->count('company',array('status'=>1)); 
        $config['per_page'] =12; 
        $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item disabled">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Next'; 
        $config['prev_link'] = 'Previous'; 
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';        
        $this->pagination->initialize($config); 
        $this->data['partners'] = $this->site->fetch('company',$config['per_page'], $per_page,'ASC'); 
        $this->data['page_title'] = humanize('partners');         
        $bc = array(array('link' => '#', 'page' => humanize('partners')));
        $meta = array('page_title' => humanize('partners'), 'bc' => $bc); 
        $this->frontend_construct('about/partners', $this->data, $meta);
    }
	/*public function index(){
		$this->data['page_title'] = humanize('Partners');
        $this->data['clients'] = $this->site->whereRows('company','status',1);
        $bc = array(array('link' => '#', 'page' => humanize('Partners')));
        $meta = array('page_title' => humanize('Partners'), 'bc' => $bc);         
        $this->frontend_construct('about/partners', $this->data, $meta);
	}*/
}
