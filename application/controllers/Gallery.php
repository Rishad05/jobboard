<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {	
	function __construct() {
        parent::__construct(); 
        $this->load->library('form_validation');  
        $this->load->helper('inflector');
        $this->load->helper('array');
        $this->load->helper('string');
        $this->load->helper('directory');
        $this->load->library('user_agent');
        $this->load->model('home_model');
    }
    function index() { 
        $this->load->library('pagination'); 
        $this->data['album'] = $this->site->selectQuery('gallery_album'); 
        $this->data['page_title'] = 'Gallery';
        $bc = array(array('link' => '#', 'page' => 'Gallery'));
        $meta = array('page_title' => 'Gallery', 'bc' => $bc); 
        $this->frontend_construct('gallery/index', $this->data, $meta); 
    }
    function album($gid = 0, $offset = 0){ 
        $this->data['galleries'] = $this->site->wheresRows('gallery',array('album_id'=>$gid,'status'=>1)); 
        $this->data['album'] = $this->site->whereRow('gallery_album','id',$gid); 
        $this->data['page_title'] = 'Gallery';
        $bc = array(array('link' => '#', 'page' => 'Gallery'));
        $meta = array('page_title' => 'Gallery', 'bc' => $bc); 
        $this->frontend_construct('gallery/album', $this->data, $meta); 
    }
	/*public function index(){
		$this->data['page_title'] = humanize('gallery');
        $this->data['galleries'] = $this->site->whereRows('gallery_file','status',1);
        $bc = array(array('link' => '#', 'page' => humanize('gallery')));
        $meta = array('page_title' => humanize('gallery'), 'bc' => $bc);         
        $this->frontend_construct('gallery/index', $this->data, $meta);
	}*/
}
