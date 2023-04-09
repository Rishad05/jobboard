<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Trainers extends MY_Controller {

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
		$this->data['page_title'] = 'Trainers List';
		$bc = array(array('link' => '#', 'page' => 'List'));
		$meta = array('page_title' => 'Trainers List', 'bc' => $bc);
		$this->page_construct('trainers/index', $this->data, $meta);
	}

	function get_trainers() {
		$this->load->library('datatables');
		$this->datatables->select($this->db->dbprefix('trainer') . ".id as id ," .
			$this->db->dbprefix('trainer') . ".image," .
			$this->db->dbprefix('trainer') . ".name," .
			$this->db->dbprefix('trainer') . ".email," .
			$this->db->dbprefix('trainer') . ".phone," .
			$this->db->dbprefix('trainer') . ".designation," .
			$this->db->dbprefix('trainer') . ".details," .
			$this->db->dbprefix('trainer') . ".created_at ");
		$this->datatables->from('trainer');

		$this->fild = '';
		if ($this->UserType == 'admin') {
			/*$this->fild .="<a href='javascript:;' title='Details'onClick='contact_users_details($1)' class='tip btn btn-primary btn-xs'><i class='fa fa-file-text'></i></a>"; */

			$this->fild .="<a target='_blank' href='" . site_url() . "'  title='Details ' class='tip btn btn-warning btn-xs'><i class='fa fa-list'></i></a>";

			$this->fild .= "<a href='" . site_url('admin/trainers/edit/$1') . "' title='Edit' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>";

			$this->fild .= "<a href='" . site_url('admin/trainers/delete/$1') . "' onClick=\"return confirm('You are going to delete this request, please click ok')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";
		}
		$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
        " . $this->fild . "
        </div></div>", "id");
		//$this->datatables->unset_column('id');
		echo $this->datatables->generate();
	}
	function add() {
		$this->form_validation->set_rules('name', lang('name'), 'required');
		$this->form_validation->set_rules('phone', lang('phone'), 'required');
		$this->form_validation->set_rules('email', lang("email"), 'trim|valid_email|required');
		$this->form_validation->set_rules('designation', lang("designation"), 'required');
		if ($this->form_validation->run() == true) {
			$this->load->library('upload');
			if (!empty($_FILES['userfile']['name'])) {
			    $this->load->library('image_lib');
				$config['upload_path'] = 'uploads/trainer/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
				$config['overwrite'] = FALSE;
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload()) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $this->image_lib->display_errors());
	                $this->form_validation->set_rules('imagee', lang('image'), 'required');
				}
				$photo = $this->upload->file_name; 
	            $config['image_library'] = 'gd2';
	            $config['source_image'] = 'uploads/trainer/' . $photo;
	            $config['new_image'] = 'uploads/trainer/' . $photo;
	            $config['maintain_ratio'] = TRUE;
	            $config['width'] = '300';
	            $config['height'] = '300';
	            $this->image_lib->clear();
	            $this->image_lib->initialize($config);
	            if (!$this->image_lib->resize()) {
	                $this->session->set_flashdata('error', $this->image_lib->display_errors());
	                $this->form_validation->set_rules('imagee', lang('image'), 'required');
	            } 
			} else { $photo = '';}
			$data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'designation' => $this->input->post('designation'),
				'details' => $this->input->post('description'),
				'email' => $this->input->post('email'),
				'image' => $photo,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('user_id'),
			);
			if ($this->form_validation->run() == true && $this->site->insert('trainer', $data)) {
				$this->session->set_flashdata('message', 'Successfully added! ');
				redirect('admin/trainers');
			}
		}
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = lang('Add trainer');
		$bc = array(array('link' => site_url('admin/trainer'), 'page' => lang('trainer')), array('link' => '#', 'page' => lang('Add trainer')));
		$meta = array('page_title' => lang('Add trainer'), 'bc' => $bc);
		$this->page_construct('trainers/add', $this->data, $meta);
	}
	function edit($id) {
		$this->form_validation->set_rules('name', lang('name'), 'required');
		$this->form_validation->set_rules('phone', lang('phone'), 'required');
		$this->form_validation->set_rules('email', lang("email"), 'trim|valid_email|required');
		$this->form_validation->set_rules('designation', lang("designation"), 'required');
		if ($this->form_validation->run() == true) {
			$this->load->library('upload');
			$data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'designation' => $this->input->post('designation'),
				'details' => $this->input->post('description'),
				'email' => $this->input->post('email'), 
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->session->userdata('user_id'),
			);
			if (!empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = 'uploads/trainer/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
				$config['overwrite'] = FALSE;
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload()) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $this->image_lib->display_errors());
	                $this->form_validation->set_rules('imagee', lang('image'), 'required');
				}
				$photo = $this->upload->file_name; 
				$this->load->library('image_lib');
	            $config['image_library'] = 'gd2';
	            $config['source_image'] = 'uploads/trainer/' . $photo;
	            $config['new_image'] = 'uploads/trainer/' . $photo;
	            $config['maintain_ratio'] = TRUE;
	            $config['width'] = '300';
	            $config['height'] = '300';
	            $this->image_lib->clear();
	            $this->image_lib->initialize($config);
	            if (!$this->image_lib->resize()) {
	                $this->session->set_flashdata('error', $this->image_lib->display_errors());
	                $this->form_validation->set_rules('imagee', lang('image'), 'required');
	            }
	            $data['image'] = $photo;
			}

			if ($this->site->updateQuery('trainer', $data, array('id' => $id))) {
				$this->session->set_flashdata('message', 'Successfully Updated! ');
				redirect('admin/trainers');
			}
		}
		$this->data['info'] = $this->site->whereRow('trainer', 'id', $id);
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = lang('Edit trainer');
		$bc = array(array('link' => site_url('admin/trainer'), 'page' => lang('trainer')), array('link' => '#', 'page' => lang('Edit trainer')));
		$meta = array('page_title' => lang('Edit trainer'), 'bc' => $bc);
		$this->page_construct('trainers/edit', $this->data, $meta);
	}
	function delete($id) {
		if (DEMO) {
			$this->session->set_flashdata('error', lang('disabled_in_demo'));
			redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'home');
		}

		if ($this->site->delete('trainer', array('id' => $id))) {
			$this->session->set_flashdata('message', 'Successfully! Deleted');
			redirect('admin/trainer');
		}
	}
}