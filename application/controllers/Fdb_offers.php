<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fdb_offers extends MY_Controller {  
    function __construct() {
        parent::__construct(); 
        $this->load->library('form_validation');  
        $this->load->helper('inflector');
        $this->load->helper('array');
        $this->load->helper('string');
        $this->load->helper('directory');
        $this->load->library('user_agent');
    }
    public function index($id=NULL){
        $this->data['page_title'] = humanize('fdb_offers'); 
        $this->data['offers'] = $this->site->whereRows('fdb_offers','status',1,'ASC');
        $bc = array(array('link' => '#', 'page' => humanize('fdb_offers')));
        $meta = array('page_title' => humanize('fdb_offers'), 'bc' => $bc);         
        $this->frontend_construct('training/fdb_offers', $this->data, $meta);
    } 
}
