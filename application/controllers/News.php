<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {	
	function __construct() {
        parent::__construct(); 
        $this->load->library('form_validation');  
        $this->load->helper('inflector');
        $this->load->helper('text');
        $this->load->model('News_model');
    }
	public function index($term=NULL){
        $this->load->library('pagination');   
        $term = $this->input->post('search_input') ? $this->input->post('search_input') : NULL;  
        $per_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = site_url('news/index');
        $config['total_rows'] = $this->site->count('news',array('status'=>1, 'trash_status'=>0)); 
        $config['per_page'] =3; 
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
        $this->data['allNews'] = $this->News_model->allNews($config['per_page'], $per_page,$term);  
		$this->data['page_title'] = humanize('news');         
        $bc = array(array('link' => '#', 'page' => humanize('news')));
        $meta = array('page_title' => humanize('news'), 'bc' => $bc); 
        $this->frontend_construct('news/index', $this->data, $meta);
	}
    public function category($slug=NULL,$term=NULL){ 
        if($slug){
            $mkurl = str_replace('_',' ',$slug);
            $category =  $this->site->whereRow('news_category','title',$mkurl);
            $this->data['page_title'] = humanize($category->title);
            $this->load->library('pagination');   
            $term = $this->input->post('search_input') ? $this->input->post('search_input') : NULL;  
            $per_page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0; 
            $config['base_url'] = site_url('news/category/business');
            $config['total_rows'] = $this->site->count('news',array('category_id'=>$category->id,'status'=>1, 'trash_status'=>0)); 
            $config['per_page'] = 2; 
            $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
            $config['full_tag_close'] = '</ul>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['next_link'] = 'Next';  
            $config['prev_link'] = 'Previous'; 
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';         
            $this->pagination->initialize($config); 
            $this->data['allNews'] = $this->News_model->categoryWiseNews($config['per_page'], $per_page,$term,$category->id);
            $bc = array(array('link' =>base_url('news'), 'page' => humanize('news')),array('link' => '#', 'page' => humanize($mkurl)));
            $meta = array('page_title' => humanize('news'), 'bc' => $bc); 
            $this->frontend_construct('news/category', $this->data, $meta);
        } else{
            redirect($_SERVER['HTTP_REFERAR']);
        } 
    }
	function details($slug){
        //$mkurl = str_replace('_',' ',$slug);  
        $news = $this->site->whereRow('news','slug',$slug);
		$this->data['page_title'] = humanize('news');
        $this->data['news'] = $news; 
        $bc = array(array('link' => '#', 'page' => ucfirst($news->title)));
        $meta = array('page_title' => humanize('news'), 'bc' => $bc);
        $this->frontend_construct('news/details', $this->data, $meta);
	} 
    function news_details($id){   
        $this->data['page_title'] = humanize('news');
        $this->data['news'] = $this->site->whereRow('news','id',$id);
        $news = $this->site->whereRow('news','id',$id);
        $bc = array(array('link' => '#', 'page' => ucfirst($news->title)));
        $meta = array('page_title' => humanize('news'), 'bc' => $bc);
        $this->frontend_construct('news/details', $this->data, $meta);
    } 
}
