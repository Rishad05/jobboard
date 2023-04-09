<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller

{

  function __construct() {

        parent::__construct();
        if (!$this->loggedIn) {
            redirect('login');
        } 
        $this->load->library('form_validation');
        $this->load->library('upload'); 
    } 
    function index() {  
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = 'Services List'; 
        $bc = array(array('link' => '#', 'page' => 'List')); 
        $meta = array('page_title' => 'Services List', 'bc' => $bc); 
        $this->page_construct('services/index', $this->data, $meta); 
    }

    function  get_services(){  
        $this->load->library('datatables'); 
        $this->datatables->select($this->db->dbprefix('services') . ".id as id , 
            ".$this->db->dbprefix('services') . ".icon ,
            ".$this->db->dbprefix('services') . ".thumbnail , 
            ".$this->db->dbprefix('services') . ".title ,  
            ".$this->db->dbprefix('services') . ".order_by ,  
            ".$this->db->dbprefix('services') . ".short_descriptions ,  
            ".$this->db->dbprefix('services') . ".created_at, status, home_page ");
        $this->datatables->from('services');  
        $this->fild = '';   
        if($this->UserType == 'admin'){   
        	$popUp = '"' . site_url('admin/services/details/$1') . '"';
			$this->fild .= "<a class='tip btn btn-primary btn-xs' onclick='popUp(" . $popUp . ")' href='javascript:;' title='View Details'><i class='fa fa-list'></i></a> ";
            $this->fild .="<a href='" . site_url('admin/services/edit/$1') . "' title='Edit' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>";  
            $this->fild .="<a href='" . site_url('admin/services/delete/$1') . "' onClick=\"return confirm('You are going to delete this request, please click ok')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";  
        } 
        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'> 
        ".$this->fild." 
        </div></div>", "id");  
        //$this->datatables->unset_column('id'); 
        echo $this->datatables->generate();
    } 
    function add(){   
        $this->form_validation->set_rules('title', lang('title'), 'required');  
        if ($this->form_validation->run() == true) {  
            $this->load->library('upload');  
            if(!empty($_FILES['userfile']['name'])){
                $config['upload_path'] = 'uploads/services/'; 
                $config['allowed_types'] = 'gif|jpg|png|jpeg';   
                $config['overwrite'] = FALSE; 
                $config['encrypt_name'] = TRUE; 
                $this->upload->initialize($config); 
                if (!$this->upload->do_upload()) { 
                    $error = $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $error); 
                    redirect('admin/trainers');
                    }
                $photo = $this->upload->file_name;  
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/services/' . $photo;
                $config['new_image'] = 'uploads/services/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '350';
                $config['height'] = '195';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }
            }else{$photo='';}
            $data = array(
                'icon'=> $this->input->post('html_icon'),
                'thumbnail'=> $photo,
                'title' => $this->input->post('title'),
                'status' => $this->input->post('status'),
                'order_by' => $this->input->post('order_by'),     
                'short_descriptions' => $this->input->post('short_descriptions'),
                'descriptions' => $this->input->post('descriptions'),
                'home_page' => $this->input->post('home_page'),
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('user_id'),
            ); 
            if ($this->form_validation->run() == true && $this->site->insertQuery('services',$data)){  
                $this->session->set_flashdata('message', 'Successfully added! ');
                redirect('admin/services');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Add services');
        $bc = array(array('link' => site_url('admin/services'), 'page' => lang('services')), array('link' => '#', 'page' => lang('Add services')));
        $meta = array('page_title' => lang('Add services'), 'bc' => $bc);
        $this->page_construct('services/add', $this->data, $meta); 
    }
    function edit($id){   
        $this->form_validation->set_rules('title', lang('title'), 'required');   
        if ($this->form_validation->run() == true) {  
            $this->load->library('upload');  
            $data = array( 
            	'icon'=> $this->input->post('icon'), 
                'title' => $this->input->post('title'),
                'status' => $this->input->post('status'),
                'order_by' => $this->input->post('order_by'),     
                'short_descriptions' => $this->input->post('short_descriptions'), 
                'descriptions' => $this->input->post('descriptions'),   
                'home_page' => $this->input->post('home_page'),  
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('user_id') 
            );
            if(!empty($_FILES['userfile']['name'])){
                $config['upload_path'] = 'uploads/services/'; 
                $config['allowed_types'] = 'gif|jpg|png|jpeg';   
                $config['overwrite'] = FALSE; 
                $config['encrypt_name'] = TRUE; 
                $this->upload->initialize($config); 
                if (!$this->upload->do_upload()) { 
                    $error = $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $error); 
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                    }
                $photo = $this->upload->file_name;
                $data['thumbnail'] = $photo;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/services/' . $photo;
                $config['new_image'] = 'uploads/services/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '350';
                $config['height'] = '195';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }
            } 
            if($this->site->updateQuery('services',$data, array('id'=>$id))){  
                $this->session->set_flashdata('message', 'Successfully Updated! ');
                redirect('admin/services');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Edit services');
        $this->data['info'] = $this->site->whereRow('services','id',$id);
        $bc = array(array('link' => site_url('admin/services'), 'page' => lang('services')), array('link' => '#', 'page' => lang('Edit services')));
        $meta = array('page_title' => lang('Edit services'), 'bc' => $bc);  
        $this->page_construct('services/edit', $this->data, $meta); 
    }
    function details($id) {
		$info = $this->site->whereRow('services', 'id', $id); 
		//$users = $this->site->whereRow('users', 'id', $info->created_by);
		$this->data['info'] = $info;
		//$this->data['users'] = $users;
		$this->data['title'] = 'Details';
		$this->load->view($this->theme . 'services/details', $this->data);
	}
    function delete($id){ 
        if($this->site->delete('services', array('id'=>$id))){
            $this->session->set_flashdata('message', 'Successfully! Deleted'); 
            redirect('admin/services');
        }
    } 
}