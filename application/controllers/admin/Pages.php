<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller
{

    function __construct() {
        parent::__construct();

        if (!$this->loggedIn) {
            redirect('admin/login');
        } 
        $this->load->library('form_validation'); 
    }

    function index() { 	 
        $this->data['page_title'] = 'Pages list'; 
        $bc = array(array('link' => '#', 'page' => 'Pages list'));
        $meta = array('page_title' => 'Pages list', 'bc' => $bc);
        $this->page_construct('pages/index', $this->data, $meta);
    } 
    function get_pages(){ 
        $this->load->library('datatables');
        $this->datatables->select(
            $this->db->dbprefix('pages'). ".id as id, " .
            $this->db->dbprefix('pages'). ".title, status, ", FALSE); 
        $this->datatables->from('pages');     
        $popUp = '"'.site_url('admin/pages/details/$1').'"';
        $actions =" 
            <a onclick='popUp(".$popUp.")' href='javascript:;'  title='" . lang("View Deatils") . "' class='tip btn btn-success btn-xs'><i class='fa fa-list'></i></a></a>
            <a href='" . site_url('admin/pages/edit/$1') . "' title='" . lang("Edit") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>
            <a href='" . site_url('admin/pages/delete/$1') . "' onClick=\"return confirm('" . lang('You are going to move to delete, please click ok to delete') . "')\" title='" . lang("Trash") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>"; 
        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
            $actions             
            </div></div>", "id");
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }
    function add() {  
        $this->form_validation->set_rules('title', lang('Title'), 'required');  
        if ($this->form_validation->run() == true) {   
            $data = array( 
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),                  
                'status' => $this->input->post('status'), 
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('user_id'),
            );  

            if($this->site->insertQuery('pages',$data)){   
                $this->session->set_flashdata('message', 'Pages Create Successfully! ');
                redirect('admin/pages');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Add Page'); 
        $bc = array(array('link' => site_url('admin/pages'), 'page' => lang('Pages')), array('link' => '#', 'page' => lang('Add Page')));
        $meta = array('page_title' => lang('Add Page'), 'bc' => $bc);
        $this->page_construct('pages/add', $this->data, $meta); 
    }
    function edit($id) {   
        $this->form_validation->set_rules('title', lang('Title'), 'required');  
        $this->data['info'] = $this->site->whereRow('pages','id',$id);
        if ($this->form_validation->run() == true) { 
            $data = array( 
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),                    
                'status' => $this->input->post('status'), 
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
            );   
            if($this->site->updateQuery('pages',$data, array('id'=>$id))) {   
                $this->session->set_flashdata('message', 'Pages Updated Successfully! ');
                redirect('admin/pages');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Edit Page'); 
        $bc = array(array('link' => site_url('admin/pages'), 'page' => lang('Pages')), array('link' => '#', 'page' => lang('Edit Page')));
        $meta = array('page_title' => lang('Edit Page'), 'bc' => $bc);
        $this->page_construct('pages/edit', $this->data, $meta); 
    } 
    function details($id){ 
        $rentalInfo = $this->site->whereRow('pages','id',$id);  
        $this->data['info'] = $rentalInfo; 
        $this->data['title'] = 'Details';
        $this->load->view($this->theme.'pages/details', $this->data);
    }
    function delete($id){ 
        $driverInfo = $this->site->whereRow('pages','id',$id);        
        $this->site->deleteQuery('pages',array('id'=>$id)); 
        $this->session->set_flashdata('message', 'This Pages Delete Successfully');
        redirect('admin/pages');
    }  
}

