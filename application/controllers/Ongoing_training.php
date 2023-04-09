<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongoing_training extends MY_Controller {  
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
        $this->data['page_title'] = humanize('ongoing_training'); 
        $bc = array(array('link' => '#', 'page' => humanize('ongoing_training')));
        $meta = array('page_title' => humanize('ongoing_training'), 'bc' => $bc);         
        $this->frontend_construct('training/ongoing_training', $this->data, $meta);
    } 
}
