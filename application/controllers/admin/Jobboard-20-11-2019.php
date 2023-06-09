<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jobboard extends MY_Controller {

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
		$this->data['page_title'] = 'Jobboard List';
		$bc = array(array('link' => '#', 'page' => 'List'));
		$meta = array('page_title' => 'Jobboard List', 'bc' => $bc);
		$this->page_construct('jobboard/index', $this->data, $meta);
	}

	function get_jobboards() {
		$this->load->library('datatables');
		$this->datatables->select($this->db->dbprefix('job_board') . ".id as id ," .
			$this->db->dbprefix('company') . ".name,  " .
			$this->db->dbprefix('job_board') . ".positions,DATE_FORMAT( " .
			$this->db->dbprefix('job_board') . ". last_date,  '%d-%m-%Y' ) as date," .
			$this->db->dbprefix('job_board') . ".vacancy," .
			$this->db->dbprefix('company') . ".phone," .
			$this->db->dbprefix('job_board') . ".home_page," .
			$this->db->dbprefix('job_board') . ". created_at, ");
		$this->datatables->from('job_board');
		$this->datatables->join('company', 'company.id=job_board.companey_id');
		$this->fild = '';
		if ($this->UserType == 'admin') {
			$popUp = '"' . site_url('admin/jobboard/details/$1') . '"';

			$this->fild .= "<a href='" . site_url('admin/jobboard/applyjob/$1') . "' title='Apply List' class='tip btn btn-warning btn-xs'><i class='fa fa-tasks'></i></a>";

			$this->fild .= "<a class='tip btn btn-primary btn-xs' onclick='popUp(" . $popUp . ")' href='javascript:;' title='View Details'><i class='fa fa-list'></i></a> ";

			$this->fild .= "<a href='" . site_url('admin/jobboard/edit/$1') . "' title='Edit' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>";

			$this->fild .= "<a href='" . site_url('admin/jobboard/delete/$1') . "' onClick=\"return confirm('You are going to delete this request, please click ok')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";
		}
		$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
        " . $this->fild . "
        </div></div>", "id");
		//$this->datatables->unset_column('id');
		echo $this->datatables->generate();
	}
	function add() {
		$this->form_validation->set_rules('companey_id', lang('companey_name'), 'required');
		$this->form_validation->set_rules('positions', lang('positions'), 'required');
		$this->form_validation->set_rules('vacancy', lang("vacancy"), 'required');
		$this->form_validation->set_rules('last_date', lang("last_date"), 'required');
		if ($this->form_validation->run() == true) {
			$this->load->library('upload');
			$data = array(
				'companey_id' => $this->input->post('companey_id'),
				'industry' => $this->input->post('industry'),
				'positions' => $this->input->post('positions'),
				'vacancy' => $this->input->post('vacancy'),
				'location' => $this->input->post('locations'),
				'last_date' => $this->input->post('last_date'),
				'descriptions' => $this->input->post('descriptions'),
				'education_experience' => $this->input->post('education_experience'),
				'experience' => $this->input->post('experience'),
				'additional_requirement' => $this->input->post('education_experience2'),
				'job_category_id' => $this->input->post('job_category'),
				'job_type_id' => $this->input->post('job_type'),
				'minimum_requirement' => json_encode($this->input->post('minimum_requirement')),
				'home_page' => $this->input->post('home_page'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('user_id'),

			);
			if (!empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = 'uploads/jobs/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['overwrite'] = FALSE;
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload()) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('admin/jobboard');
				}
				$photo = $this->upload->file_name; 
				$this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/jobs/' . $photo;
                $config['new_image'] = 'uploads/jobs/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '348';
                $config['height'] = '250';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                } 
                $data['featured_image'] = $photo;
			}
			if ($this->form_validation->run() == true && $job_id = $this->site->insertQuery('job_board', $data)) {  
				$this->session->set_flashdata('message', 'Successfully added! ');
				redirect('admin/jobboard');
			}
		}
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = lang('Add New Job');
		$bc = array(array('link' => site_url('admin/jobboard'), 'page' => lang('job_board')), array('link' => '#', 'page' => lang('Add New Job')));
		$meta = array('page_title' => lang('Add New Job'), 'bc' => $bc);
		$this->page_construct('jobboard/add', $this->data, $meta);
	}
	function edit($id) {
		$this->form_validation->set_rules('companey_id', lang('companey_name'), 'required');
		$this->form_validation->set_rules('positions', lang('positions'), 'required');
		$this->form_validation->set_rules('vacancy', lang("vacancy"), 'required');
		$this->form_validation->set_rules('last_date', lang("last_date"), 'required');
		if ($this->form_validation->run() == true) {
			$this->load->library('upload');
			$data = array(
				'companey_id' => $this->input->post('companey_id'),
				'industry' => $this->input->post('industry'),
				'positions' => $this->input->post('positions'),
				'vacancy' => $this->input->post('vacancy'),
				'location' => $this->input->post('location'),
				'last_date' => $this->input->post('last_date'),
				'descriptions' => $this->input->post('descriptions'),
				'minimum_requirement' => json_encode($this->input->post('minimum_requirement')),
				'education_experience' => $this->input->post('education_experience'),
				'experience' => $this->input->post('experience'),
				'additional_requirement' => $this->input->post('additional_requirement'),
				'job_category_id' => $this->input->post('job_category'),
				'job_type_id' => $this->input->post('job_type'),
				'home_page' => $this->input->post('home_page'),
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->session->userdata('user_id'),
			);
			if (!empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = 'uploads/jobs/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
				$config['overwrite'] = FALSE;
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload()) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('admin/jobboard/'.$id);
				}
				$photo = $this->upload->file_name;
				$data['featured_image'] = $photo;
				$thumbnail = $this->upload->file_name; 

                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/jobs/' . $thumbnail;
                $config['new_image'] = 'uploads/jobs/thumbs/' . $thumbnail;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '400';
                $config['height'] = '300';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    redirect('admin/jobboard/'.$id);
                } 
                $data['featured_image'] = $thumbnail; 
			}
			if ($this->site->updateQuery('job_board', $data, array('id' => $id))) {
				$this->site->deleteQuery('job_board_type', array('job_id'=>$id)); 
				$this->session->set_flashdata('message', 'Successfully Updated! ');
				redirect('admin/jobboard');
			}
		}
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = lang('Edit Job ');
		$this->data['info'] = $this->site->whereRow('job_board', 'id', $id);
		$bc = array(array('link' => site_url('admin/jobboard'), 'page' => lang('job_board')), array('link' => '#', 'page' => lang('Edit Job')));
		$meta = array('page_title' => lang('Edit Job'), 'bc' => $bc);
		$this->page_construct('jobboard/edit', $this->data, $meta);
	}
	function details($id) {
		$category = array();
		$info = $this->site->whereRow('job_board', 'id', $id);
		$users = $this->site->whereRow('company', 'id', $info->companey_id);
		if($info->job_category_id){
			$category = $this->site->whereRow('job_category', 'id', $info->job_category_id);
		}		
		$job_board_type = $this->site->whereRows('job_board_type','job_id',$id);
		$this->data['info'] = $info;
		$this->data['users'] = $users;
		$this->data['category'] = $category;
		$this->data['job_board_type'] = $job_board_type;
		$this->data['title'] = 'Details';
		$this->load->view($this->theme . 'jobboard/details', $this->data);
	}
	function applyjob($id) {
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = 'List of applicants';
		$this->data['job_board_id'] = $id;
		$bc = array(array('link' => '#', 'page' => 'List'));
		$meta = array('page_title' => 'List of applicants', 'bc' => $bc);
		$this->page_construct('jobboard/applyjob', $this->data, $meta);
	}
	function get_applyjob($id) {
		$this->load->library('datatables');
		$this->datatables->select($this->db->dbprefix('apply_job') . ".id as id ,CONCAT(" .
			$this->db->dbprefix('users') . ".first_name,' ', " .
			$this->db->dbprefix('users') . ".last_name) as name, " .
			$this->db->dbprefix('apply_job') . ".name," .
			$this->db->dbprefix('apply_job') . ".email," .
			$this->db->dbprefix('apply_job') . ".phone," .
			$this->db->dbprefix('job_board') . ".positions," .
			$this->db->dbprefix('job_board') . ".last_date," .
			$this->db->dbprefix('job_board') . ".vacancy," .
			$this->db->dbprefix('users') . ".phone," .
			$this->db->dbprefix('apply_job') . ".created_at ");
		$this->datatables->from('apply_job');
		$this->datatables->join('users', 'users.id=apply_job.client_id');
		$this->datatables->join('job_board', 'job_board.id=apply_job.job_board_id');
		$this->fild = '';
		if ($this->UserType == 'admin') {
			$popUp = '"' . site_url('admin/jobboard/apply_details/$1') . '"';

			$this->fild .= "<a class='tip btn btn-primary btn-xs' onclick='popUp(" . $popUp . ")' href='javascript:;' title='View Details'><i class='fa fa-list'></i></a> ";

			$this->fild .= "<a href='" . site_url('admin/jobboard/delete/$1') . "' onClick=\"return confirm('You are going to delete this request, please click ok')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";
		}
		$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
        " . $this->fild . "
        </div></div>", "id");
		//$this->datatables->unset_column('id');
		echo $this->datatables->generate();
	}
	function apply_details($id) {
		$info = $this->site->whereRow('apply_job', 'id', $id);
		$job_board = $this->site->whereRow('job_board', 'id', $info->job_board_id);
		$users = $this->site->whereRow('users', 'id', $info->companey_id);
		$this->data['info'] = $info;
		$this->data['job_board'] = $job_board;
		$this->data['users'] = $users;
		$this->data['title'] = 'Details';
		$this->load->view($this->theme . 'jobboard/apply_details', $this->data);
	}
	function delete($id) {
		if (DEMO) {
			$this->session->set_flashdata('error', lang('disabled_in_demo'));
			redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'home');
		}

		if ($this->site->delete('job_board', array('id' => $id))) {
			$this->session->set_flashdata('message', 'Successfully! Deleted');
			redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'home');
		}
	}
	function minimum_requirement($id = NULL) {
		$this->form_validation->set_rules('title', lang("title"), 'required');
		$info = '';
		if ($id) {
			$info = $this->site->whereRow('minimum_requirement', 'id', $id);
		}
		if ($this->form_validation->run() == true) {
			if ($id) {
				$data = array(
					'title' => $this->input->post('title'),
					'order_by' => $this->input->post('order_by'),
					'updated_at' => date('Y-m-d H:i:s'),
				);
				if ($this->site->updateQuery('minimum_requirement', $data, array('id' => $id))) {
					$this->session->set_flashdata('message', 'Minimum Requirement Successfully Updated');
					redirect('admin/jobboard/minimum_requirement');
				}
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'order_by' => $this->input->post('order_by'),
					'created_at' => date('Y-m-d H:i:s'),
				);
				if ($this->site->insertQuery('minimum_requirement', $data)) {
					$this->session->set_flashdata('message', 'Minimum Requirement Successfully Added');
					redirect('admin/jobboard/minimum_requirement');
				}
			}
		}
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = 'Minimum Requirement List';
		$this->data['info'] = $info;
		$bc = array(array('link' => '#', 'page' => 'List'));
		$meta = array('page_title' => 'Minimum Requirement List', 'bc' => $bc);
		$this->page_construct('jobboard/minimum_requirement', $this->data, $meta);
	}
	function get_minimum_requirement() {
		$this->load->library('datatables');
		$this->datatables->select($this->db->dbprefix('minimum_requirement') . ".id as id, " .
			$this->db->dbprefix('minimum_requirement') . ".title," .
			$this->db->dbprefix('minimum_requirement') . ".order_by," .
			$this->db->dbprefix('minimum_requirement') . ".created_at ");
		$this->datatables->from('minimum_requirement');
		$this->db->order_by('order_by', 'ASC');
		$this->fild = '';
		if ($this->UserType == 'admin') {
			$this->fild .= "<a href='" . site_url('admin/jobboard/minimum_requirement/$1') . "' title='Edit' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>";

			/*$this->fild .="<a href='" . site_url('admin/jobboard/minimum_requirement_delete/$1') . "' onClick=\"return confirm('You are going to delete this request, please click ok')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";*/
		}
		$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
        " . $this->fild . "
        </div></div>", "id");
		$this->datatables->unset_column('id');
		echo $this->datatables->generate();
	}
	function minimum_requirement_add($id = NULL) {
		$this->form_validation->set_rules('title', lang("title"), 'required');
		if ($this->form_validation->run() == true) {
			if ($id) {
				$date = array(
					'title' => $this->input->post('title'),
					'order_by' => $this->input->post('order_by'),
				);
				if ($this->site->updateQuery('minimum_requirement', $data, array('id' => $id))) {
					$this->session->set_flashdata('message', 'Minimum Requirement Successfully Updated');
					redirect('admin/minimum_requirement');
				}
			} else {
				$date = array(
					'title' => $this->input->post('title'),
					'order_by' => $this->input->post('order_by'),
				);
				if ($this->site->insertQuery('minimum_requirement', $data, array('id' => $id))) {
					$this->session->set_flashdata('message', 'Minimum Requirement Successfully Added');
					redirect('admin/minimum_requirement');
				}
			}
		}
	}
	function category($id = NULL) {
		$this->form_validation->set_rules('title', lang("title"), 'required');
		$info = '';
		if ($id) {
			$info = $this->site->whereRow('job_category', 'id', $id);
		}
		if ($this->form_validation->run() == true) {
			if ($id) {
				$data = array(
					'name' => $this->input->post('title'),
				);
				if ($this->site->updateQuery('job_category', $data, array('id' => $id))) {
					$this->session->set_flashdata('message', 'Job Category Successfully Updated');
					redirect('admin/jobboard/category');
				}
			} else {
				$data = array(
					'name' => $this->input->post('title'),
				);
				if ($this->site->insertQuery('job_category', $data)) {
					$this->session->set_flashdata('message', 'Job Category Successfully Added');
					redirect('admin/jobboard/category');
				}
			}
		}
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = 'Job category List';
		$this->data['info'] = $info;
		$bc = array(array('link' => '#', 'page' => 'List'));
		$meta = array('page_title' => 'Job  category List', 'bc' => $bc);
		$this->page_construct('jobboard/job_category', $this->data, $meta);
	}
	function get_category() {
		$this->load->library('datatables');
		$this->datatables->select($this->db->dbprefix('job_category') . ".id as id, " .
			$this->db->dbprefix('job_category') . ".name,");
		$this->datatables->from('job_category');
		$this->fild = '';
		if ($this->UserType == 'admin') {
			$this->fild .= "<a href='" . site_url('admin/jobboard/category/$1') . "' title='Edit' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>";

			/*$this->fild .="<a href='" . site_url('admin/jobboard/minimum_requirement_delete/$1') . "' onClick=\"return confirm('You are going to delete this request, please click ok')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";*/
		}
		$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
        " . $this->fild . "
        </div></div>", "id");
		$this->datatables->unset_column('id');
		echo $this->datatables->generate();
	}
	function job_type($id = NULL) {
		$this->form_validation->set_rules('title', lang("title"), 'required');
		$info = '';
		if ($id) {
			$info = $this->site->whereRow('job_type', 'id', $id);
		}
		if ($this->form_validation->run() == true) {
			if ($id) {
				$data = array(
					'name' => $this->input->post('title'),
				);
				if ($this->site->updateQuery('job_type', $data, array('id' => $id))) {
					$this->session->set_flashdata('message', 'Job Type Successfully Updated');
					redirect('admin/jobboard/job_type');
				}
			} else {
				$data = array(
					'name' => $this->input->post('title'),
				);
				if ($this->site->insertQuery('job_type', $data)) {
					$this->session->set_flashdata('message', 'Job Type Successfully Added');
					redirect('admin/jobboard/job_type');
				}
			}
		}
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = 'Job Type List';
		$this->data['info'] = $info;
		$bc = array(array('link' => '#', 'page' => 'List'));
		$meta = array('page_title' => 'Job  Type List', 'bc' => $bc);
		$this->page_construct('jobboard/job_type', $this->data, $meta);
	}
	function get_job_type() {
		$this->load->library('datatables');
		$this->datatables->select($this->db->dbprefix('job_type') . ".id as id, " .
			$this->db->dbprefix('job_type') . ".name,");
		$this->datatables->from('job_type');
		$this->fild = '';
		if ($this->UserType == 'admin') {
			$this->fild .= "<a href='" . site_url('admin/jobboard/job_type/$1') . "' title='Edit' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>";

			/*$this->fild .="<a href='" . site_url('admin/jobboard/minimum_requirement_delete/$1') . "' onClick=\"return confirm('You are going to delete this request, please click ok')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";*/
		}
		$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
        " . $this->fild . "
        </div></div>", "id");
		$this->datatables->unset_column('id');
		echo $this->datatables->generate();
	}
}