<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MY_Controller
{

    function __construct() {
        parent::__construct();

        if (!$this->loggedIn) {
            redirect('admin/login');
        } 
        $this->load->library('form_validation'); 
    }

    function index() { 	 
        $this->data['page_title'] = 'Group list'; 
        $bc = array(array('link' => '#', 'page' => 'Group list'));
        $meta = array('page_title' => 'Group list', 'bc' => $bc);
        $this->page_construct('tgroups/index',$this->data,$meta);
    } 
    function get_group(){ 
        $this->load->library('datatables');
        $this->datatables->select(
            $this->db->dbprefix('group'). ".id as id, ".
            $this->db->dbprefix('group'). ".id as serial, ".
            $this->db->dbprefix('group'). ".group_name, ".
            $this->db->dbprefix('group'). ".order_by, "
        ); 
        $this->datatables->from('group');
        $popUp = '"'.site_url('admin/group/details/$1').'"';
        $actions ="  
            <a class='tip btn btn-primary btn-xs' onclick='popUp(" . $popUp . ")' href='javascript:;' title='View Details'><i class='fa fa-list'></i></a>
            <a href='" . site_url('admin/group/edit/$1') . "' title='" . lang("Edit") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>
            <a href='" . site_url('admin/group/delete/$1') . "' onClick=\"return confirm('" . lang('You are going to move to delete, please click ok to delete') . "')\" title='" . lang("Delete") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>"; 
        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
            $actions             
            </div></div>", "id");
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }
    function add() {  

        $this->form_validation->set_rules('group_name', lang('group_name'), 'required');  
        if ($this->form_validation->run() == true) { 
            $data = array( 
                'group_name' => $this->input->post('group_name'),
                'order_by' => $this->input->post('order_by'),

                'created_at' => date('Y-m-d H:i:s'),
            );  

            // echo "<pre>"; print_r($data);exit;

            if ($this->form_validation->run() == true && $this->site->insertQuery('group',$data)){   
                $this->session->set_flashdata('message', 'Group Create Successfully! ');
                redirect('admin/group');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Add Group'); 
        $bc = array(array('link' => site_url('admin/group'), 'page' => lang('Group')), array('link' => '#', 'page' => lang('Add Group Memeber')));
        $meta = array('page_title' => lang('Add Group'), 'bc' => $bc);
        
        
       // echo "<pre>"; print_r($meta);exit;
         
        $this->page_construct('tgroups/add', $this->data, $meta); 
    }
    function edit($id) { 

        $this->form_validation->set_rules('group_name', lang('group_name'), 'required');  
        $this->data['info'] = $this->site->whereRow('group','id',$id);
       
        if ($this->form_validation->run() == true) { 
            $data = array( 
                'group_name' => $this->input->post('group_name'),
                'order_by' => $this->input->post('order_by'),
                'created_at' => date('Y-m-d H:i:s'),
            ); 

            // echo "<pre>"; print_r($data);exit;
            
            if ($this->form_validation->run() == true && $this->site->updateQuery('group',$data, array('id'=>$id))) {   
                $this->session->set_flashdata('message', 'Group Updated Successfully! ');
                redirect('admin/group');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Edit Group '); 
        $bc = array(array('link' => site_url('admin/group'), 'page' => lang('Group')), array('link' => '#', 'page' => lang('Edit Group ')));
        $meta = array('page_title' => lang('Edit Group '), 'bc' => $bc);
        $this->page_construct('tgroups/edit', $this->data, $meta); 
    } 
    function details($id){    
        $this->data['info'] = $this->site->whereRow('group','id',$id);
        $this->data['title'] = 'Group Details';
        $this->load->view($this->theme.'tgroups/details', $this->data);
    }
    function delete($id){ 
        $driverInfo = $this->site->whereRow('group','id',$id);        
        $this->site->deleteQuery('group',array('id'=>$id)); 
        $this->session->set_flashdata('message', 'This Group Delete Successfully');
        redirect('admin/group');
    }  
}

