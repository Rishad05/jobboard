<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Training extends MY_Controller
{
    function __construct() {
        parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->model('training_model');
    }
    function index($term=NULL){
        $this->load->library('pagination');   
        $term = $this->input->post('search_input') ? $this->input->post('search_input') : NULL;  
        $per_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = site_url('training/index');
        $config['total_rows'] = $this->site->count('training_program',array('status'=>1)); 
        $config['per_page'] =2; 
        $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Next'; 
        $config['prev_link'] = 'Previous'; 
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';        
        $this->pagination->initialize($config); 
        $this->data['allTraining'] = $this->training_model->allTraining($config['per_page'], $per_page,$term); 

        
        $this->data['page_title'] = 'Training Programme';
        $bc = array(array('link' => '#', 'page' => 'Training Programme'));
        $meta = array('page_title' => 'Training Programme', 'bc' => $bc);		
       	$this->frontend_construct('training/index', $this->data, $meta);		
    }

    function details($url=NULL) {
        if(!$url)
        {
            redirect('training');
        } 
        $url = str_replace('_',' ',$url);
        $trainers = $this->site->whereRow('training_program','slug',$url);
        $this->data['trainers'] = $trainers;
        $this->data['sitebarTraining'] = $this->training_model->getSitebarTraining();
        //$this->data['trainers'] = $this->site->whereRows('training_program', 'id', $id); 
        $this->data['page_title'] = $trainers->title;
        $bc = array(array('link' => '#', 'page' =>  $trainers->title));
        $meta = array('page_title' =>  $trainers->title, 'bc' => $bc); 
        $this->frontend_construct('training/details', $this->data, $meta);
        
    }
    function detail($id=NULL) {
        if(!$id)
        {
            redirect('training');
        } 
        $id = str_replace('_',' ',$id);
        $trainers = $this->site->whereRow('training_program','id',$id);
        $this->data['trainers'] = $trainers;
        $this->data['page_title'] = $trainers->title;
        $bc = array(array('link' => '#', 'page' =>  $trainers->title));
        $meta = array('page_title' =>  $trainers->title, 'bc' => $bc); 
        $this->frontend_construct('training/details', $this->data, $meta);
        
    }

     function calendar($id=NULL) { 
        
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = 'Job board'; 
        $bc = array(array('link' => '#', 'page' => 'Job board'));
        $meta = array('page_title' => 'Job board', 'bc' => $bc);
        $this->frontend_construct('training/calendar', $this->data, $meta);
        
    }

}

