<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Trainingprogram extends MY_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->loggedIn) {
			redirect('login');
		}
		$this->load->library('form_validation');
		$this->load->model('groups_model');
	}

	function index() {
		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = 'Training & development';
		$bc = array(array('link' => '#', 'page' => 'List'));
		$meta = array('page_title' => 'Training & development', 'bc' => $bc);
		$this->page_construct('training/index', $this->data, $meta);
	}

	function get_training() {
		$overTime = date('H:i:s');
		$overDate = date('Y-m-d');
		$this->load->library('datatables');
		$this->datatables->select(
			$this->db->dbprefix('training_program') . ".id  as id ,
            " . $this->db->dbprefix('training_program') . ".title ,
            " . $this->db->dbprefix('training_program') . ".start_date,
            " . $this->db->dbprefix('training_program') . ".end_date,
            " . $this->db->dbprefix('training_program') . ".home_page,
            " . $this->db->dbprefix('training_program') . ".status,
             ");
		$this->datatables->from('training_program');
		$this->fild = '';
		/*<a href='" . site_url('admin/trainingprogram/sendmail/$1') . "' title='Send email' class='tip btn btn-success btn-xs'><i class='fa fa-envelope-o'></i></a>*/

		$this->fild .= "
        <a target='_blank' href='" . site_url('training/detail/$1') . "' class='tip btn btn-warning btn-xs' title='" . $this->lang->line("View") . "'><i class='fa fa-file-text'></i></a>

        <a href='" . site_url('admin/trainingprogram/edit/$1') . "' class='tip btn btn-warning btn-xs' title='" . $this->lang->line("Edit") . "'><i class='fa fa-edit'></i></a>
        <a href='" . site_url('admin/trainingprogram/delete/$1') . "' onClick=\"return confirm('You are going to delete this training, please click ok to delete')\" class='tip btn btn-danger btn-xs' title='" . $this->lang->line("Delete") . "'><i class='fa fa-trash-o'></i></a>

        ";
		$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
	    " . $this->fild . "
		  </div></div>", "id");
		// $this->datatables->where('end_date <',$overDate);
		//$this->datatables->unset_column('id');
		echo $this->datatables->generate();
	}

	function add() {
		$this->form_validation->set_rules('start_date', $this->lang->line("start date"), 'required');
		$this->form_validation->set_rules('start_time', $this->lang->line("start time"), 'required');
		$this->form_validation->set_rules('end_date', $this->lang->line("start time"), 'required');
		$this->form_validation->set_rules('end_time', $this->lang->line("start time"), 'required');
		$this->form_validation->set_rules('title', $this->lang->line("title "), 'required');
		$this->form_validation->set_rules('venue', $this->lang->line("venue "), 'required');

		$end_date = $this->input->post('end_date');
		$start_date = $this->input->post('start_date');
		$end_date = date('Y-m-d', strtotime($end_date));
		$start_date = date('Y-m-d', strtotime($start_date));

		if ($this->form_validation->run() == true) {
			if ($_FILES['userfile']['size'] > 0) {
				$this->load->library('upload');
				$config['upload_path'] = 'uploads/training/';
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
	            $config['source_image'] = 'uploads/training/' . $photo;
	            $config['new_image'] = 'uploads/training/' . $photo;
	            $config['maintain_ratio'] = TRUE;
	            $config['width'] = '398';
	            $config['height'] = '264';
	            $this->image_lib->clear();
	            $this->image_lib->initialize($config);
	            if (!$this->image_lib->resize()) {
	                $this->session->set_flashdata('error', $this->image_lib->display_errors());
	                $this->form_validation->set_rules('imagee', lang('image'), 'required');
	            } 
			} else { $photo = '';} 
			$string = str_replace(' ', '-', $this->input->post('title')); // Replaces all spaces.
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

			$data = array(
				'image' => $photo,
				'start_date' => $start_date,
				'end_date' => $end_date,
				'start_time' => $this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'participant' => $this->input->post('participant'),
				'total_class' => $this->input->post('total_class'),
				'total_hours' => $this->input->post('total_hours'),
				'class_schedule' => $this->input->post('class_schedule'),
				'venue' => $this->input->post('venue'),
				'course_objectives' => $this->input->post('course_objectives'),
				'course_outline' => $this->input->post('training_description'),
				'status' => $this->input->post('status'),
				'home_page' => $this->input->post('home_page'),
				'slug' => strtolower($slug),
				'created_by' => $this->session->userdata('user_id'),
				'created_at' => date('Y-m-d H:i:s'),
			);
			if ($this->form_validation->run() == true && $id = $this->site->insert('training_program', $data)) {
		        $trainers = $this->input->post('trainer_id');
		        for ($i=0; $i < sizeof($trainers) ; $i++) { 
		          $trainer_id = $this->input->post('trainer_id')[$i];
		          $data = array('trainer_id'=>$trainer_id,'training_id' => $id);
		          $this->site->insertQuery('training_trainer', $data);
		        }
				$this->session->set_flashdata('message', 'Successfully added');
				redirect('admin/trainingprogram/');
			}
		}

		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
		$this->data['page_title'] = 'Add Training & development';
		$this->data['trainers'] = $this->site->whereRows('trainer', 'status', 1);
		$bc = array(array('link' => '#', 'page' => 'Add'));
		$meta = array('page_title' => 'Add Training & development', 'bc' => $bc);
		$this->page_construct('training/add', $this->data, $meta);

	}

	function edit($id = NULL) {
		$this->form_validation->set_rules('start_date', $this->lang->line("start date"), 'required');
		$this->form_validation->set_rules('start_time', $this->lang->line("start time"), 'required');
		$this->form_validation->set_rules('end_date', $this->lang->line("start time"), 'required');
		$this->form_validation->set_rules('end_time', $this->lang->line("start time"), 'required');
		$this->form_validation->set_rules('title', $this->lang->line("title "), 'required');
		$this->form_validation->set_rules('venue', $this->lang->line("venue "), 'required');

		$end_date = $this->input->post('end_date');
		$start_date = $this->input->post('start_date');
		$end_date = date('Y-m-d', strtotime($end_date));
		$start_date = date('Y-m-d', strtotime($start_date));

		if ($this->form_validation->run() == true) {
			if ($_FILES['userfile']['size'] > 0) {
				$this->load->library('upload');
				$config['upload_path'] = 'uploads/training/';
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
	            $config['source_image'] = 'uploads/training/' . $photo;
	            $config['new_image'] = 'uploads/training/' . $photo;
	            $config['maintain_ratio'] = TRUE;
	            $config['width'] = '398';
	            $config['height'] = '264';
	            $this->image_lib->clear();
	            $this->image_lib->initialize($config);
	            if (!$this->image_lib->resize()) {
	                $this->session->set_flashdata('error', $this->image_lib->display_errors());
	                $this->form_validation->set_rules('imagee', lang('image'), 'required');
	            } 
			} else { $photo = '';}
			$string = str_replace(' ', '-', $this->input->post('title')); // Replaces all spaces.
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

			$data = array( 
				'start_date' => $start_date,
				'end_date' => $end_date,
				'start_time' => $this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'),
				'participant' => $this->input->post('participant'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'total_class' => $this->input->post('total_class'),
				'total_hours' => $this->input->post('total_hours'),
				'class_schedule' => $this->input->post('class_schedule'),
				'venue' => $this->input->post('venue'),
				'course_objectives' => $this->input->post('course_objectives'),
				'course_outline' => $this->input->post('course_outline'),
				'status' => $this->input->post('status'),
				'home_page' => $this->input->post('home_page'),
				'slug' => strtolower($slug),
			);
			if ($photo) {
				$data['image'] = $photo;
			}
		    if ($this->form_validation->run() == true && $this->site->updateQuery('training_program',$data,array('id'=>$id))){
		        $this->site->deleteQuery('training_trainer',array('training_id' => $id));
		        $trainers = $this->input->post('trainer_id');
		        for ($i=0; $i < sizeof($trainers) ; $i++) { 
		          $trainer_id = $this->input->post('trainer_id')[$i];
		          $data = array('trainer_id'=>$trainer_id,'training_id' => $id);
		          $this->site->insertQuery('training_trainer', $data);
		        }
		        $this->session->set_flashdata('message', 'Successfully updated');
		    } 
		}

		$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

		//$this->data['trainers'] = $this->site->wheres_rows('trainer', array('training_id' => $id));
		$this->data['info'] = $this->site->wheres_row('training_program', array('id' => $id));
		$this->data['page_title'] = 'Update Training & development';
	    $this->data['trainers'] = $this->site->whereRows('trainer', 'status', 1);
	    $this->data['ttrainer'] = $this->site->whereRows('training_trainer', 'training_id', $id);
		$bc = array(array('link' => '#', 'page' => 'Add'));
		$meta = array('page_title' => 'Update Training & development', 'bc' => $bc);
		$this->page_construct('training/edit', $this->data, $meta);
	}

	function delete($id = NULL) {
		if (DEMO) {
			$this->session->set_flashdata('error', lang('disabled_in_demo'));
			redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
		}
		if (!$this->Admin) {
			$this->session->set_flashdata('error', lang('access_denied'));
			redirect('admin/event');
		}
		if (!$id) {
			$this->session->set_flashdata('error', lang('access_denied'));
			redirect('admin/event');
		}
		if ($this->site->delete('training_program', array('id' => $id))) {
			$this->session->set_flashdata('message', 'Successfully deleted');
			redirect('admin/trainingprogram');
		}
	}

	function sendmail($tid) {
		$event_id = 2;

		$this->load->library('email');

		$this->form_validation->set_rules('users[]', $this->lang->line("users"), 'required');

		if ($this->form_validation->run() == true) {
			$arr = '';
			if ($this->input->post('users')[0] == 'all') {
				$data = $this->groups_model->get_members();

				foreach ($data as $key => $value) {
					$arr .= $value->email . ', ';
				}
				$to = rtrim($arr, ', ');
			} else {
				$udata = $this->input->post('users');
				foreach ($udata as $key => $value2) {
					$arr .= $value2 . ', ';
				}
				$to = rtrim($arr, ', ');

			}
			$trainingDetails = $this->site->wheres_row('training_program', array('id' => $tid));

			$from_email = $this->Settings->default_email;
			$subject = 'BOS Training';

			// $message = 'Training Title: '.$trainingDetails->title.'<br>';
			// $message .= 'Training Description: '.$trainingDetails->description.'<br>';
			// $message .= $trainingDetails->start_date.' '. $trainingDetails->start_time.' - '.$trainingDetails->end_date.' '.$trainingDetails->end_time;
			// $message .= 'Total Dayes : '.$trainingDetails->total_class.'<br>';
			// $message .= 'Total Hours : '.$trainingDetails->total_hours.'<br>';
			// $message .= 'Class Schedule : '.$trainingDetails->class_schedule.'<br>';
			// $message .= 'Venue : '.$trainingDetails->venue.'<br><br>';
			// $message .= 'Click <a href='.base_url('training/details/'.$tid).'>here</a> to see this training details.';

			$this->data['site_link'] = base_url();
			$this->data['logo'] = base_url('themes/frontend/bos_theme/assets/images/mail_logo.png'); //

			$this->data['trainingInfo'] = array(
				'title' => $trainingDetails->title,
				'description' => $trainingDetails->description,
				'duration' => $this->tec->hrld($trainingDetails->start_date . ' ' . $trainingDetails->start_time) . '<b> - </b>' . $this->tec->hrld($trainingDetails->end_date . ' ' . $trainingDetails->end_time),
				'total_day' => $trainingDetails->total_class,
				'total_hour' => $trainingDetails->total_hours,
				'class_schedule' => $trainingDetails->class_schedule,
				'venu' => $trainingDetails->venue,
				'link' => base_url('training/details/' . $tid),
			);

			$message = $this->load->view($this->frontend_theme . 'email_templates/training_temp', $this->data, TRUE);

			if ($to) {
				if ($this->tec->send_email($to, $subject, $message, $from_email, $this->Settings->site_name, NULL, Null)) {

					$this->session->set_flashdata('message', 'Successfully send.');
					redirect('admin/trainingprogram/');
				}
			}

		}
		$this->data['users'] = $this->groups_model->get_members();
		$this->data['tid'] = $tid;
		$this->data['page_title'] = 'Send email users';
		$bc = array(array('link' => site_url('admin/event'), 'page' => 'Send E-mail'), array('link' => '#', 'page' => 'Send E-mail '));
		$meta = array('page_title' => 'Send email users', 'bc' => $bc);
		$this->page_construct('training/mailsend', $this->data, $meta);
	}

}