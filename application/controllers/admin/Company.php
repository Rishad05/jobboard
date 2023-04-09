<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends MY_Controller {

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
		$this->data['page_title'] = 'Company List';
		$bc = array(array('link' => '#', 'page' => 'List'));
		$meta = array('page_title' => 'Company List', 'bc' => $bc);
		$this->page_construct('company/index', $this->data, $meta);
	}

	function get_companies() {
		$this->load->library('datatables');
		$this->datatables->select($this->db->dbprefix('company') . ".id as id ," .
			$this->db->dbprefix('company') . ".logo," .
			$this->db->dbprefix('company') . ".name," .
			$this->db->dbprefix('company') . ".email," .
			$this->db->dbprefix('company') . ".phone," . 
			$this->db->dbprefix('company') . ".address," .
			$this->db->dbprefix('company') . ".order_by," .
			$this->db->dbprefix('company') . ".status," .
			$this->db->dbprefix('company') . ".created_at ");
		$this->datatables->from('company');

		$this->fild = '';
		if ($this->UserType == 'admin') { 

			$this->fild .= "<a href='" . site_url('admin/company/edit/$1') . "' title='Edit' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>";

			$this->fild .= "<a href='" . site_url('admin/company/delete/$1') . "' onClick=\"return confirm('You are going to delete this request, please click ok')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";
		}
		$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
        " . $this->fild . "
        </div></div>", "id");
		$this->datatables->unset_column('id');
		echo $this->datatables->generate();
	}
	function add() {
		$this->form_validation->set_rules('name', lang('name'), 'required');
		$this->form_validation->set_rules('phone', lang('phone'), 'required');
		$this->form_validation->set_rules('status', lang('status'), 'required');
		$this->form_validation->set_rules('email', lang("email"), 'required|trim|is_unique[company.email]|valid_email'); 
		if (!empty($_FILES['userfile']['name'])) {
			$config['upload_path'] = 'uploads/company/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['overwrite'] = FALSE;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload()) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				$this->form_validation->set_rules('imagee', lang('image'), 'required');
			}
			$photo = $this->upload->file_name;
			$this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'uploads/company/' . $photo;
            $config['new_image'] = 'uploads/company/' . $photo;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = '260';
            $config['height'] = '160';
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                $this->session->set_flashdata('error', $this->image_lib->display_errors());
                $this->form_validation->set_rules('imagee', lang('image'), 'required');
            } 
		} else {
			$photo = '';
		}
		if ($this->form_validation->run() == true) {
			$this->load->library('upload');
			$data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'), 
				'status' => $this->input->post('status'), 
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'order_by' => $this->input->post('order_by'), 
				'logo' => $photo,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('user_id'),
			);  
			if ($this->site->insert('company', $data)) {
				$this->session->set_flashdata('message', 'Successfully added! ');
				redirect('admin/company');
			} 
		}
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = lang('Add company');
		$bc = array(array('link' => site_url('admin/company'), 'page' => lang('company')), array('link' => '#', 'page' => lang('Add company')));
		$meta = array('page_title' => lang('Add company'), 'bc' => $bc);
		$this->page_construct('company/add', $this->data, $meta);
	}
	function edit($id) {
		$info = $this->site->whereRow('company','id',$id);
		$this->form_validation->set_rules('name', lang('name'), 'required');
		$this->form_validation->set_rules('phone', lang('phone'), 'required');
		$this->form_validation->set_rules('status', lang('status'), 'required');
		$this->form_validation->set_rules('email', lang("email"), 'trim|valid_email|required');
		$email = $this->input->post('email');
		if($email != $info->email){
			$this->form_validation->set_rules('email', lang("email"), 'required|trim|is_unique[company.email]|valid_email');
		} 
		if (!empty($_FILES['userfile']['name'])) {
			$config['upload_path'] = 'uploads/company/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['overwrite'] = FALSE;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload()) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				$this->form_validation->set_rules('imagee', lang('image'), 'required');
			}
			$photo = $this->upload->file_name;
			$this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'uploads/company/' . $photo;
            $config['new_image'] = 'uploads/company/' . $photo;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = '260';
            $config['height'] = '160';
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                $this->session->set_flashdata('error', $this->image_lib->display_errors());
                $this->form_validation->set_rules('imagee', lang('image'), 'required');
            } 
		} else {
			$photo ='';
		}
		if ($this->form_validation->run() == true) { 
			$this->load->library('upload');
			$data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'), 
				'status' => $this->input->post('status'), 
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'), 
				'order_by' => $this->input->post('order_by'), 
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->session->userdata('user_id'),
			); 
			if($photo){
				$data['logo'] = $photo;
			}

			if ($this->site->updateQuery('company', $data, array('id' => $id))) {
				$this->session->set_flashdata('message', 'Successfully Updated! ');
				redirect('admin/company');
			}
		}
		$this->data['info'] = $this->site->whereRow('company', 'id', $id);
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = lang('Edit company');
		$bc = array(array('link' => site_url('admin/company'), 'page' => lang('company')), array('link' => '#', 'page' => lang('Edit company')));
		$meta = array('page_title' => lang('Edit company'), 'bc' => $bc);
		$this->page_construct('company/edit', $this->data, $meta);
	}
	function delete($id) { 
		if ($this->site->delete('company', array('id' => $id))) {
			$this->session->set_flashdata('message', 'Successfully! Deleted');
			redirect('admin/company');
		}
	}
}