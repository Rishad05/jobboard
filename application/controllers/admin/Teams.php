<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends MY_Controller
{

    function __construct() {
        parent::__construct();

        if (!$this->loggedIn) {
            redirect('admin/login');
        } 
        $this->load->library('form_validation'); 
    }

    function index() { 	 
        $this->data['page_title'] = 'Teams list'; 
        $bc = array(array('link' => '#', 'page' => 'Teams list'));
        $meta = array('page_title' => 'Teams list', 'bc' => $bc);
        $this->page_construct('teams/index', $this->data, $meta);
    } 
    function get_teams(){ 
        $this->load->library('datatables');
        $this->datatables->select(
            $this->db->dbprefix('teams'). ".id as id, ".
            $this->db->dbprefix('teams'). ".image , ".
            $this->db->dbprefix('teams'). ".name , ".
            $this->db->dbprefix('group'). ".group_name, ".
            $this->db->dbprefix('teams'). ".designation , ".
            $this->db->dbprefix('teams'). ".email , ".
            $this->db->dbprefix('teams'). ".order_by, ", FALSE); 
        $this->datatables->from('teams');
        $this->datatables->join('tec_group', 'tec_group.id = tec_teams.group_id','left');
        $popUp = '"'.site_url('admin/teams/details/$1').'"';
        $actions ="  
            <a class='tip btn btn-primary btn-xs' onclick='popUp(" . $popUp . ")' href='javascript:;' title='View Details'><i class='fa fa-list'></i></a>
            <a href='" . site_url('admin/teams/edit/$1') . "' title='" . lang("Edit") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>
            <a href='" . site_url('admin/teams/delete/$1') . "' onClick=\"return confirm('" . lang('You are going to move to delete, please click ok to delete') . "')\" title='" . lang("Delete") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>"; 
        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
            $actions             
            </div></div>", "id");
        $this->datatables->unset_column('id');


        echo $this->datatables->generate();
    }
    function add() {  

        $this->form_validation->set_rules('name', lang('name'), 'required');  
        if ($this->form_validation->run() == true) {  
            if ($_FILES['thumbnail']['size'] > 0) {
                $this->load->library('upload');
                $config['upload_path'] = 'uploads/teams';
                $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('thumbnail')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }
                $avatar = $this->upload->file_name; 
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/teams/' . $avatar;
                $config['new_image'] = 'uploads/teams/' . $avatar;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '255';
                $config['height'] = '255';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }   
                $thumbnail = $avatar;
            } else {
                $thumbnail = '';
            }
            $data = array( 
                'name' => $this->input->post('name'),
                'group_id' => $this->input->post('group_id'),
                'designation' => $this->input->post('designation'),
                'descriptions' => $this->input->post('descriptions'),
                'image' => $thumbnail,
                'order_by' => $this->input->post('order_by'),  
                'facebook' => $this->input->post('facebook'),
                'twitter' =>  $this->input->post('twitter'),
                'linkedin' =>  $this->input->post('linkedin'),
                'googleplus' =>  $this->input->post('googleplus'), 
                'map' =>  $this->input->post('map'),  
                'address' =>  $this->input->post('address'),   
                'cell' =>  $this->input->post('cell'),
                'tel' =>  $this->input->post('tel'),
                'email' =>  $this->input->post('email'),
                'status' =>  $this->input->post('status'),  
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('user_id'),
            );  

            // echo "<pre>"; print_r($data);exit;

            if ($this->form_validation->run() == true && $this->site->insertQuery('teams',$data)){   
                $this->session->set_flashdata('message', 'Teams Create Successfully! ');
                redirect('admin/teams');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Add Teams Memeber'); 
        $bc = array(array('link' => site_url('admin/teams'), 'page' => lang('Teams')), array('link' => '#', 'page' => lang('Add Teams Memeber')));
        $meta = array('page_title' => lang('Add Teams Memeber'), 'bc' => $bc);
        
        $groupArr = $this->db->get('tec_group')->result_array();
        
        $groupList = [];
        foreach($groupArr as $group){
           $groupList[$group['id']] = $group['group_name'];
        }
       // echo "<pre>"; print_r($meta);exit;
         
        $this->page_construct('teams/add', $this->data, $meta); 
    }
    function edit($id) {   
        $this->form_validation->set_rules('name', lang('name'), 'required');  
        $this->data['info'] = $this->site->whereRow('teams','id',$id);
       
        if ($this->form_validation->run() == true) { 
            $data = array( 
                'name' => $this->input->post('name'),
                'group_id' => $this->input->post('group_id'),
                'designation' => $this->input->post('designation'),
                'descriptions' => $this->input->post('descriptions'), 
                'order_by' => $this->input->post('order_by'), 
                'facebook' => $this->input->post('facebook'),
                'twitter' =>  $this->input->post('twitter'),
                'linkedin' =>  $this->input->post('linkedin'),
                'googleplus' =>  $this->input->post('googleplus'), 
                'map' =>  $this->input->post('map'),  
                'address' =>  $this->input->post('address'),   
                'cell' =>  $this->input->post('cell'),
                'tel' =>  $this->input->post('tel'),
                'email' =>  $this->input->post('email'),
                'status' =>  $this->input->post('status'),  
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
            ); 
            if ($_FILES['thumbnail']['size'] > 0) {
                $this->load->library('upload');
                $config['upload_path'] = 'uploads/teams';
                $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('thumbnail')) { 
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }
                $avatar = $this->upload->file_name;    
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/teams/' . $avatar;
                $config['new_image'] = 'uploads/teams/' . $avatar;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '255';
                $config['height'] = '255';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }             
                $data['image'] = $avatar;
            }  
            if ($this->form_validation->run() == true && $this->site->updateQuery('teams',$data, array('id'=>$id))) {   
                $this->session->set_flashdata('message', 'Teams Updated Successfully! ');
                redirect('admin/teams');
            }
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = lang('Edit Teams '); 
        $bc = array(array('link' => site_url('admin/teams'), 'page' => lang('Teams')), array('link' => '#', 'page' => lang('Edit Teams ')));
        $meta = array('page_title' => lang('Edit Teams '), 'bc' => $bc);
        $this->page_construct('teams/edit', $this->data, $meta); 
    } 
    function details($id){    
        $this->data['info'] = $this->site->whereRow('teams','id',$id);
        $this->data['title'] = 'Details';
        $this->load->view($this->theme.'teams/details', $this->data);
    }
    function delete($id){ 
        $driverInfo = $this->site->whereRow('teams','id',$id);        
        $this->site->deleteQuery('teams',array('id'=>$id)); 
        $this->session->set_flashdata('message', 'This Teams Delete Successfully');
        redirect('admin/teams');
    }  
}

