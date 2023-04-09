<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends MY_Controller
{

    function __construct() {
        parent::__construct();

        if (!$this->loggedIn) {
            redirect('admin/login');
        } 
        $this->load->library('form_validation'); 
    }

    function index() { 	 
        $this->data['page_title'] = 'Offers list'; 
        $bc = array(array('link' => '#', 'page' => 'Offers list'));
        $meta = array('page_title' => 'Offers list', 'bc' => $bc);
        $this->page_construct('offers/index', $this->data, $meta);
    } 
    function get_offers(){ 
        $this->load->library('datatables');
        $this->datatables->select(
            $this->db->dbprefix('fdb_offers'). ".id as id, " .
            $this->db->dbprefix('fdb_offers'). ".title, order_by, status, ", FALSE); 
        $this->datatables->from('fdb_offers');     
        $popUp = '"'.site_url('admin/offers/details/$1').'"';
        $actions =" 
            <a onclick='popUp(".$popUp.")' href='javascript:;'  title='" . lang("View Deatils") . "' class='tip btn btn-success btn-xs'><i class='fa fa-list'></i></a></a>
            <a href='" . site_url('admin/offers/edit/$1') . "' title='" . lang("Edit") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>
            <a href='" . site_url('admin/offers/delete/$1') . "' onClick=\"return confirm('" . lang('You are going to move to delete, please click ok to delete') . "')\" title='" . lang("Trash") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>"; 
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
                'order_by' => $this->input->post('order_by'),
                'content' => $this->input->post('content'),                  
                'status' => $this->input->post('status'), 
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('user_id'),
            );  

            if($this->site->insertQuery('fdb_offers',$data)){   
                $this->session->set_flashdata('message', 'Offers Create Successfully! ');
                redirect('admin/offers');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Add Offers'); 
        $bc = array(array('link' => site_url('admin/offers'), 'page' => lang('Offers')), array('link' => '#', 'page' => lang('Add Offers')));
        $meta = array('page_title' => lang('Add Offers'), 'bc' => $bc);
        $this->page_construct('offers/add', $this->data, $meta); 
    }
    function edit($id) {   
        $this->form_validation->set_rules('title', lang('Title'), 'required');  
        $this->data['info'] = $this->site->whereRow('fdb_offers','id',$id);
        if ($this->form_validation->run() == true) { 
            $data = array( 
                'title' => $this->input->post('title'),
                'order_by' => $this->input->post('order_by'),
                'content' => $this->input->post('content'),                    
                'status' => $this->input->post('status'), 
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
            );   
            if($this->site->updateQuery('fdb_offers',$data, array('id'=>$id))) {   
                $this->session->set_flashdata('message', 'Offers Updated Successfully! ');
                redirect('admin/offers');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Edit Offers'); 
        $bc = array(array('link' => site_url('admin/offers'), 'page' => lang('Offers')), array('link' => '#', 'page' => lang('Edit Offers')));
        $meta = array('page_title' => lang('Edit Offers'), 'bc' => $bc);
        $this->page_construct('offers/edit', $this->data, $meta); 
    } 
    function details($id){ 
        $rentalInfo = $this->site->whereRow('fdb_offers','id',$id);  
        $this->data['info'] = $rentalInfo; 
        $this->data['title'] = 'Details';
        $this->load->view($this->theme.'offers/details', $this->data);
    }
    function delete($id){ 
        $driverInfo = $this->site->whereRow('fdb_offers','id',$id);        
        $this->site->deleteQuery('fdb_offers',array('id'=>$id)); 
        $this->session->set_flashdata('message', 'This Offers Delete Successfully');
        redirect('admin/offers');
    }  
}

