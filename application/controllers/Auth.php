<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->lang->load('auth', $this->Settings->language);
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->load->model('auth_model');
		$this->load->model('site');
		$this->load->library('ion_auth');
	}
	function index()
	{
		if (!$this->loggedIn) {
			redirect('login');
		} elseif ($this->Admin) {
			redirect('admin');
		} else {
			redirect('index');
		}
	}
	function users()
	{
		if (!$this->loggedIn) {
			redirect('login');
		}
		if (!$this->Admin) {
			$this->session->set_flashdata('warning', lang("access_denied"));
			redirect($_SERVER["HTTP_REFERER"]);
		}
		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		$this->data['users'] = $this->site->whereRows('users', 'group_id', 1);
		$bc = array(
			array(
				'link' => '#',
				'page' => lang('User_List'),
			),
		);
		$meta = array(
			'page_title' => lang('Administrator_List'),
			'bc' => $bc,
		);
		$this->data['page_title'] = lang('Administrator_List');
		$this->page_construct('auth/index', $this->data, $meta);
	}
	function user_details($id)
	{
		$this->data['info'] = $this->auth_model->membearInfo($id);
		$this->data['qualification'] = $this->auth_model->quInfo($id);
		$this->data['title'] = 'Member Details';
		$this->load->view($this->theme . 'auth/user_details', $this->data);
	}
	function profile($id = NULL)
	{
		if (!$this->ion_auth->logged_in() && !$this->Admin && $this->UserType != 'company_admin' && $this->session->userdata('user_id') != $id) {
			$this->session->set_flashdata('warning', lang("access_denied"));
			redirect($_SERVER["HTTP_REFERER"]);
		}
		if (!$id || empty($id)) {
			redirect('admin/users');
		}
		$this->data['title'] = lang('profile');
		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		$this->data['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'class' => 'form-control',
			'type' => 'password',
			'value' => '',
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id' => 'password_confirm',
			'class' => 'form-control',
			'type' => 'password',
			'value' => '',
		);
		$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
		$this->data['old_password'] = array(
			'name' => 'old',
			'id' => 'old',
			'class' => 'form-control',
			'type' => 'password',
		);
		$this->data['new_password'] = array(
			'name' => 'new',
			'id' => 'new',
			'type' => 'password',
			'class' => 'form-control',
			'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
		);
		$this->data['new_password_confirm'] = array(
			'name' => 'new_confirm',
			'id' => 'new_confirm',
			'type' => 'password',
			'class' => 'form-control',
			'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
		);
		$this->data['user_id'] = array(
			'name' => 'user_id',
			'id' => 'user_id',
			'type' => 'hidden',
			'value' => $user->id,
		);
		$this->data['id'] = $id;
		$this->data['page_title'] = lang('profile');
		$bc = array(
			array(
				'link' => site_url('users'),
				'page' => lang('users'),
			),
			array(
				'link' => '#',
				'page' => lang('profile'),
			),
		);
		$meta = array(
			'page_title' => lang('profile'),
			'bc' => $bc,
		);
		$this->page_construct('users/profile', $this->data, $meta);
	}
	public function captcha_check($cap)
	{
		$expiration = time() - 300; // 5 minutes limit
		$this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array(
			$cap,
			$this->input->ip_address(),
			$expiration,
		);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if ($row->count == 0) {
			$this->form_validation->set_message('captcha_check', lang('captcha_wrong'));
			return FALSE;
		} else {
			return TRUE;
		}
	}
	//log the user in
	function login($m = NULL)
	{
		if ($this->memberLoggedIn) {
			$this->session->set_flashdata('message', 'You are already logged In');
			redirect('member/dashboard');
		}
		if ($this->Settings->captcha) {
			$this->form_validation->set_rules('captcha', lang('captcha'), 'required|callback_captcha_check');
		}
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == true) {
			$group = $this->site->wheres_row('users', array(
				'email' => $this->input->post('identity'),
			));
			if ($group) {
				if ($group->group_id != 1 && $group->group_id != 2) {
					//$this->session->set_flashdata('message','Please login here');
					$this->session->set_flashdata('message', 'Please login here');
					redirect('member-login');
				}
			}
			$remember = (bool) $this->input->post('remember');
			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
				if ($this->Settings->mmode) {
					if (!$this->ion_auth->in_group('admin')) {
						$this->session->set_flashdata('error', lang('site_is_offline_plz_try_later'));
						redirect('auth/logout');
					}
				}
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$referrer = $this->session->userdata('requested_page') ? $this->session->userdata('requested_page') : 'admin';
				redirect($referrer);
			} else {
				$this->session->set_flashdata('error', $this->ion_auth->errors());
				redirect('login');
			}
		} else {
			$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
			$this->data['message'] = $this->session->flashdata('message');
			if ($this->Settings->captcha) {
				$this->load->helper('captcha');
				$vals = array(
					'img_path' => './assets/captcha/',
					'img_url' => site_url() . 'assets/captcha/',
					'img_width' => 150,
					'img_height' => 34,
				);
				$cap = create_captcha($vals);
				$capdata = array(
					'captcha_time' => $cap['time'],
					'ip_address' => $this->input->ip_address(),
					'word' => $cap['word'],
				);
				$query = $this->db->insert_string('captcha', $capdata);
				$this->db->query($query);
				$this->data['image'] = $cap['image'];
				$this->data['captcha'] = array(
					'name' => 'captcha',
					'id' => 'captcha',
					'type' => 'text',
					'class' => 'form-control',
					'required' => 'required',
					'placeholder' => lang('type_captcha'),
				);
			}
			$this->data['page_title'] = lang('login');
			$this->load->view($this->theme . 'auth/login', $this->data);
		}
	}
	function member_login()
	{
		if ($this->loggedIn) {
			redirect('admin');
		}
		$this->form_validation->set_rules('identity', 'Email', 'required');
		if ($this->form_validation->run() == true) {
			if ($this->input->post('password') == '') {
				$this->session->set_flashdata('error', 'The Password field is required. ');
				redirect('member-login');
			}
			if ($this->memberLoggedIn) {
				$this->session->set_flashdata('message', 'You are already logged In');
				redirect('member/dashboard');
			}
			$this->site->wheres_row('users', array(
				'email' => $this->input->post('identity'),
			));
			if ($group) {
				if ($group->group_id != 3 && $group->group_id != 4) {
					// echo 'ok';
					// die;
					//$this->session->set_flashdata('message','Please login here');
					$this->session->set_flashdata('error', 'Login Failed, Please try again1');
					redirect('member-login');
				}
			}
			$remember = (bool) $this->input->post('remember');
			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
				if ($this->Settings->mmode) {
					if (!$this->ion_auth->in_group('admin')) {
						$this->session->set_flashdata('error', lang('site_is_offline_plz_try_later'));
						redirect('auth/logout');
					}
				}
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$referrer = $this->session->userdata('requested_page') ? $this->session->userdata('requested_page') : 'member/dashboard';
				redirect($referrer);
			} else {
				$this->session->set_flashdata('error', $this->ion_auth->errors());
				redirect('member-login');
			}
		}
		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		$this->data['page_title'] = 'Member Login';
		$bc = array(
			array(
				'link' => '#',
				'page' => 'Member Login',
			),
		);
		$meta = array(
			'page_title' => 'Member Login',
			'bc' => $bc,
		);
		$this->frontend_construct('pages/member_login', $this->data, $meta);
	}
	function member_registration()
	{
		$this->form_validation->set_rules('name', lang("name"), 'required');
		$this->form_validation->set_rules('bmdc_egistration_no', lang("bmdc_egistration_no"), 'required');
		$this->form_validation->set_rules('email', lang("email"), 'required|trim|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[15]|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Re enter', 'required|matches[password]');
		if ($this->form_validation->run() == true) {
			$username = time();
			$email = strtolower($this->input->post('email'));
			$password = $this->input->post('password');
			$notify = $this->input->post('notify') ? $this->input->post('notify') : 0;
			$group_id = 4;
			$active = 0;
			if ($_FILES['userfile']['size'] > 0) {
				$this->load->library('upload');
				$config['upload_path'] = 'uploads/avatars/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_width'] = '250';
				$config['max_height'] = '250';
				$config['overwrite'] = FALSE;
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload()) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					$this->form_validation->set_rules('image_size', lang("image"), 'required');
					//die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
				}
				$photo = $this->upload->file_name;
			} else {
				$photo = '';
			}
			if ($_FILES['signature']['size'] > 0) {
				$this->load->library('upload');
				$config['upload_path'] = 'uploads/signature/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '1000';
				$config['max_width'] = '250';
				$config['max_height'] = '250';
				$config['overwrite'] = FALSE;
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('signature')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					$this->form_validation->set_rules('image_size', lang("image"), 'required');
					//die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
				}
				$signature = $this->upload->file_name;
			} else {
				$signature = '';
			}
			if ($_FILES['nidfile']['size'] > 0) {
				$this->load->library('upload');
				$config['upload_path'] = 'uploads/nid/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf';
				$config['max_size'] = '1000';
				$config['overwrite'] = FALSE;
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('nidfile')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					$this->form_validation->set_rules('image_size', lang("image"), 'required');
					//die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
				}
				$nidfile = $this->upload->file_name;
			} else {
				$nidfile = '';
			}
			$details = array(
				'nidfile' => $nidfile,
				'signature' => $signature,
				'avatar' => $photo,
				'name' => $this->input->post('name'),
				'date_of_birth' => $this->input->post('date_of_birth'),
				'designation' => $this->input->post('designation'),
				'fathers_name' => $this->input->post('fathers_name'),
				'mothers_name' => $this->input->post('mothers_name'),
				'spouse_name' => $this->input->post('spouse_name'),
				'profession_of_spouse' => $this->input->post('profession_of_spouse'),
				'no_of_children' => $this->input->post('no_of_children'),
				'nationality' => $this->input->post('nationality'),
				'nid_no' => $this->input->post('nid_no'),
				'passport_no' => $this->input->post('passport_no'),
				'd_email' => $this->input->post('email'),
				'telephone' => $this->input->post('telephone'),
				'sel_phone' => $this->input->post('sel_phone'),
				'present_address' => $this->input->post('present_address'),
				'permanent_address' => $this->input->post('permanent_address'),
				'bmdc_egistration_no' => $this->input->post('bmdc_egistration_no'),
				'created_at' => date('Y-m-d H:i:s'),
			);
			$id = $this->site->insert('user_details', $details);
			$additional_data = array(
				'avatar' => $photo,
				'details_id' => $id,
				'varify' => 0,
				'first_name' => $this->input->post('name'),
				'last_name' => '',
				'designation' => $this->input->post('designation'),
				'phone' => $this->input->post('sel_phone'),
				'group_id' => $this->input->post('group'),
			);
			$lastRegNumber = $this->site->getLastRegistertMember($this->input->post('group'))->reg_number;
			$newRegNumber = substr($lastRegNumber, 2) + 1;
			if ($this->input->post('group') == 3) {
				$additional_data['reg_number'] = 'LM' . str_pad($newRegNumber, 4, '0', STR_PAD_LEFT);
			} else {
				$additional_data['reg_number'] = 'GM' . str_pad($newRegNumber, 4, '0', STR_PAD_LEFT);
			}
		}
		$subject = 'Email verification from www.bosbd.org';
		if ($this->form_validation->run() == true && $uid = $this->ion_auth->register($username, $password, $email, $additional_data, $active, $notify)) {
			$degree = $this->input->post('degree');
			$files = $_FILES;
			for ($i = 0; $i < count($degree); $i++) {
				if ($files['certificate']['size'][$i] > 0) {
					$this->load->library('upload');
					$_FILES['certificate']['name'] = $files['certificate']['name'][$i];
					$_FILES['certificate']['type'] = $files['certificate']['type'][$i];
					$_FILES['certificate']['tmp_name'] = $files['certificate']['tmp_name'][$i];
					$_FILES['certificate']['error'] = $files['certificate']['error'][$i];
					$_FILES['certificate']['size'] = $files['certificate']['size'][$i];
					$config['upload_path'] = 'uploads/certificate/';
					$config['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config['max_size'] = '1100';
					$config['overwrite'] = FALSE;
					$config['encrypt_name'] = TRUE;
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('certificate')) {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
					}
					$certificate = $this->upload->file_name;
				} else {
					$certificate = '';
				}
				$data = array();
				$data['certificate'] = $certificate;
				$data['degree'] = $this->input->post('degree')[$i];
				$data['year'] = $this->input->post('year')[$i];
				$data['institution'] = $this->input->post('institution')[$i];
				$data['user_id'] = $uid;
				$this->site->insert('user_qualification', $data);
			}
			$key = base64_encode($email);
			$this->data['name'] = $this->input->post('name');
			$this->data['varify_url'] = base_url('auth/user_email_varification/' . $key);
			$this->data['signin_url'] = base_url();
			$message = $this->load->view($this->frontend_theme . 'email_templates/registration', $this->data, TRUE);
			$this->tec->send_email($email, $subject, $message, $this->Settings->default_email, 'BOS', NULL, NULL, NULL);
			$this->session->set_flashdata('message', 'Membership registration successfull! Please verify your mail, an email has been sent to your mail ' . $email . ', not forget to check your spam box, if you not find it on inbox.');
			$admin_message = 'A new member has been registered at www.bosbd.org';
			$admin_message = 'Member details' . "\n";
			$admin_message .= 'Name: ' . $this->input->post('name') . "\n";
			$admin_message .= 'Email: ' . $this->input->post('email') . "\n";
			$admin_message .= 'BMDC Registration No: ' . $this->input->post('bmdc_egistration_no') . "\n\n";
			$this->tec->send_email($this->Settings->default_email, $admin_message, $admin_message, $email, $this->input->post('name'), NULL, NULL, NULL);
			redirect("registration");
		} else {
			$this->data['page_title'] = 'Member Registration';
			$bc = array(
				array(
					'link' => '#',
					'page' => 'Member Login',
				),
			);
			$meta = array(
				'page_title' => 'Member Registration',
				'bc' => $bc,
			);
			$this->frontend_construct('pages/member_reg', $this->data, $meta);
		}
	}
	function user_email_varification($key)
	{
		$identity = $this->site->wheres_row('users', array(
			'email' => base64_decode($key),
		));
		if ($identity) {
			if ($this->site->updateData('users', array(
				'varify' => 1,
			), array(
				'email' => base64_decode($key),
			))) {
				$this->session->set_flashdata('message', 'Successfull! Your account verified. Our admin will cross check your information and activate ASAP, you will get email confirmation about activation. After activation you can login to your account.');
				redirect("member-login");
			}
		}
	}
	function reload_captcha()
	{
		$this->load->helper('captcha');
		$vals = array(
			'img_path' => './assets/captcha/',
			'img_url' => site_url() . 'assets/captcha/',
			'img_width' => 150,
			'img_height' => 34,
		);
		$cap = create_captcha($vals);
		$capdata = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word'],
		);
		$query = $this->db->insert_string('captcha', $capdata);
		$this->db->query($query);
		echo $cap['image'];
	}
	function logout($m = NULL)
	{
		$logout = $this->ion_auth->logout();
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		// redirect('login/' . $m);
		redirect('auth/applicant_login');
	}
	function logout_home($m = NULL)
	{
		$logout = $this->ion_auth->logout();
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect();
	}
	function change_password()
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('login');
		}
		$this->form_validation->set_rules('old_password', lang('old_password'), 'required');
		$this->form_validation->set_rules('new_password', lang('new_password'), 'required|max_length[25]');
		$this->form_validation->set_rules('new_password_confirm', lang('confirm_password'), 'required|matches[new_password]');
		$user = $this->ion_auth->user()->row();
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('auth/profile/' . $user->id . '/#cpassword');
		} else {
			if (DEMO) {
				$this->session->set_flashdata('error', lang('disabled_in_demo'));
				redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
			}
			$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));
			$change = $this->ion_auth->change_password($identity, $this->input->post('old_password'), $this->input->post('new_password'));
			if ($change) {
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			} else {
				$this->session->set_flashdata('error', $this->ion_auth->errors());
				redirect('auth/profile/' . $user->id . '/#cpassword');
			}
		}
	}
	function forgot_password()
	{
		$this->form_validation->set_rules('forgot_email', lang('email_address'), 'required|valid_email');
		if ($this->form_validation->run() == false) {
			$error = validation_errors() ? validation_errors() : $this->session->flashdata('error');
			$this->session->set_flashdata('error', $error);
			redirect("login#forgot_password");
		} else {
			$identity = $this->ion_auth->where('email', strtolower($this->input->post('forgot_email')))->users()->row();
			if (empty($identity)) {
				$this->ion_auth->set_message('forgot_password_email_not_found');
				$this->session->set_flashdata('error', $this->ion_auth->messages());
				redirect("login#forgot_password");
			}
			$forgotten = $this->ion_auth->forgotten_password($identity->email);
			if ($forgotten) {
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("login#forgot_password");
			} else {
				$this->session->set_flashdata('error', $this->ion_auth->errors());
				redirect("login#forgot_password");
			}
		}
	}
	function forgot_password2()
	{
		$this->form_validation->set_rules('forgot_email', lang('email_address'), 'required|valid_email');
		if ($this->form_validation->run() == false) {
			$error = validation_errors() ? validation_errors() : $this->session->flashdata('error');
			$this->session->set_flashdata('error', $error);
			redirect("member-login");
		} else {
			$identity = $this->ion_auth->where('email', strtolower($this->input->post('forgot_email')))->users()->row();
			if (empty($identity)) {
				$this->ion_auth->set_message('forgot_password_email_not_found');
				$this->session->set_flashdata('error', $this->ion_auth->messages());
				redirect("member-login");
			}
			//$forgotten = $this->ion_auth->forgotten_password_member($identity->email);
			$forgotten = $this->ion_auth->forgotten_password_member($identity->email);
			if ($forgotten) {
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("member-login");
			} else {
				$this->session->set_flashdata('error', $this->ion_auth->errors());
				redirect("member-login");
			}
		}
	}
	public function reset_password($code = NULL)
	{
		if (!$code) {
			show_404();
		}
		$user = $this->ion_auth->forgotten_password_check($code);
		if ($user) {
			$this->form_validation->set_rules('new', lang('password'), 'required|min_length[8]|max_length[25]|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', lang('confirm_password'), 'required');
			if ($this->form_validation->run() == false) {
				$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
				$this->data['message'] = $this->session->flashdata('message');
				$this->data['title'] = lang('reset_password');
				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'class' => 'form-control',
					'pattern' => '^.{8}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'class' => 'form-control',
					'pattern' => '^.{8}.*$',
				);
				$this->data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;
				$this->data['identity_label'] = $user->email;
				$this->data['page_title'] = lang('reset_password');
				$this->load->view($this->theme . 'auth/reset_password', $this->data);
			} else {
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {
					$this->ion_auth->clear_forgotten_password_code($code);
					show_error(lang('error_csrf'));
				} else {
					$identity = $user->email;
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
					if ($change) {
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect('login');
					} else {
						$this->session->set_flashdata('error', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code);
					}
				}
			}
		} else {
			$this->session->set_flashdata('error', $this->ion_auth->errors());
			redirect("login#forgot_password");
		}
	}
	public function reset_password_member($code = NULL)
	{
		if (!$code) {
			show_404();
		}
		$user = $this->ion_auth->forgotten_password_check($code);
		if ($user) {
			$this->form_validation->set_rules('new', lang('password'), 'required|min_length[8]|max_length[25]|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', lang('confirm_password'), 'required');
			if ($this->form_validation->run() == false) {
				$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
				$this->data['message'] = $this->session->flashdata('message');
				$this->data['title'] = lang('reset_password');
				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'class' => 'form-control',
					'pattern' => '^.{8}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'class' => 'form-control',
					'pattern' => '^.{8}.*$',
				);
				$this->data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;
				$this->data['identity_label'] = $user->email;
				$this->data['page_title'] = lang('reset_password');
				// $this->load->view($this->theme . 'auth/reset_pass_member', $this->data);
				$this->frontend_construct('pages/reset_password', $this->data);
			} else {
				if ($user->id != $this->input->post('user_id')) {
					$this->ion_auth->clear_forgotten_password_code($code);
					$this->session->set_flashdata('error', $this->ion_auth->errors());
					// redirect('member-login');
					redirect('auth/applicant_login');
				} else {
					$identity = $user->email;
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
					if ($change) {
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						// redirect('member-login');
						redirect('auth/applicant_login');
					} else {
						$this->session->set_flashdata('error', $this->ion_auth->errors());
						// redirect('member-login');
						redirect('auth/applicant_login');
					}
				}
			}
		} else {
			$this->session->set_flashdata('error', $this->ion_auth->errors());
			// redirect("member-login");
			redirect('auth/applicant_login');
		}
	}
	function activate($id, $code = false)
	{
		$id = base64_decode($id);
		if ($code !== false) {
			/*$data = array(
				   'id' => $id ,
				   'activation_code' => $code
				   );

				   $info  = $this->site->wheres_row('users',$data);

			*/
			$activation = $this->ion_auth->activate($id, $code);
			$dataUpdate = array(
				'active' => 1,
				'activation_code' => '',
			);
			$this->site->update('users', $dataUpdate, 'id', $id);
		} else if ($this->Admin) {
			$activation = $this->ion_auth->activate($id);
		}
		if ($activation) {
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			if ($this->Admin) {
				redirect($_SERVER["HTTP_REFERER"]);
			} else {
				// redirect("auth/login");
				$company_id = $this->site->where_row('users', 'id', $id)->company_id;
				$subdomain = $this->site->where_row('company', 'company_id', $company_id)->subdomain;
				redirect("http://" . $subdomain . '.' . $this->domain . "/login");
			}
		} else {
			$this->session->set_flashdata('error', $this->ion_auth->errors());
			redirect("auth/forgot_password");
		}
	}
	function deactivate($id = NULL)
	{
		if (!$this->Admin) {
			$this->session->set_flashdata('warning', lang("access_denied"));
			redirect($_SERVER["HTTP_REFERER"]);
		}
		$id = $this->config->item('use_mongodb', 'ion_auth') ? (string) $id : (int) $id;
		$this->form_validation->set_rules('confirm', lang("confirm"), 'required');
		if ($this->form_validation->run() == FALSE) {
			if ($this->input->post('deactivate')) {
				$this->session->set_flashdata('error', validation_errors());
				redirect($_SERVER["HTTP_REFERER"]);
			} else {
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['user'] = $this->ion_auth->user($id)->row();
				$this->data['modal_js'] = $this->site->modal_js();
				$this->load->view($this->theme . 'auth/deactivate_user', $this->data);
			}
		} else {
			if ($this->input->post('confirm') == 'yes') {
				if ($id != $this->input->post('id')) {
					show_error(lang('error_csrf'));
				}
				if ($this->ion_auth->logged_in() && $this->Admin) {
					$this->ion_auth->deactivate($id);
					$this->session->set_flashdata('message', $this->ion_auth->messages());
				}
			}
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}
	function create_user()
	{
		$this->data['title'] = lang('add_user');
		$this->form_validation->set_rules('username', lang("username"), 'trim|is_unique[users.username]');
		$this->form_validation->set_rules('email', lang("email"), 'trim|is_unique[users.email]');
		$group_type = $this->input->post('group');
		if ($this->form_validation->run() == true) {
			$username = strtolower($this->input->post('username'));
			$email = strtolower($this->input->post('email'));
			$password = $this->input->post('password');
			$notify = $this->input->post('notify');
			$group_id = $this->input->post('group') ? $this->input->post('group') : '2';
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'group_id' => $group_id,
				'company_id' => $this->input->post('company_id')
			);
			$active = $this->input->post('status');
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $active, $notify)) {
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect($_SERVER["HTTP_REFERER"]);
		} else {
			$this->data['error'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('error')));
			//$this->data['groups'] = $this->ion_auth->groups()->result_array();
			$this->db->select('*');
			$this->db->from('groups');
			$q = $this->db->get();
			$this->data['groups'] = $q->result();
			$this->data['page_title'] = lang('Add_New_Administrator');
			$bc = array(
				array(
					'link' => site_url('users'),
					'page' => lang('users'),
				),
				array(
					'link' => '#',
					'page' => lang('add_user'),
				),
			);
			$meta = array(
				'page_title' => lang('Add_New_Administrator'),
				'bc' => $bc,
			);
			$this->page_construct('users/create_user', $this->data, $meta);
		}
	}
	function edit_user($id = NULL)
	{
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
		}
		$this->data['title'] = lang("edit_user");
		if (!$this->loggedIn || !$this->Admin && $id != $this->session->userdata('user_id') && $this->UserType != 'company_admin') {
			$this->session->set_flashdata('warning', lang("access_denied"));
			redirect($_SERVER["HTTP_REFERER"]);
		}
		$user = $this->ion_auth->user($id)->row();
		if ($user->username != $this->input->post('username')) {
			$this->form_validation->set_rules('username', lang("username"), 'trim|is_unique[users.username]');
		}
		if ($user->email != $this->input->post('email')) {
			$this->form_validation->set_rules('email', lang("email"), 'trim|is_unique[users.email]');
		}
		if ($this->UserType == 'admin' || $this->UserType == 'admin_user') {
			$this->form_validation->set_rules('users_group', 'users group ', 'trim');
		} else {
			if ($this->session->userdata('user_id') != $user->id) {
				$this->form_validation->set_rules('users_group', 'users group ', 'trim|required');
			}
		}
		if ($this->form_validation->run() === TRUE) {
			if (DEMO) {
				$this->session->set_flashdata('error', lang('disabled_in_demo'));
				redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
			}
			if ($this->Admin) {
				if ($id == $this->session->userdata('user_id')) {
					$data = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'designation' => $this->input->post('designation'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
					);
				} else {
					$data = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'designation' => $this->input->post('designation'),
						'username' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
						'active' => $this->input->post('status'),
					);
				}
			} else {
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'phone' => $this->input->post('phone'),
					'gender' => $this->input->post('gender'),
					'users_group' => $this->input->post('users_group'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'gender' => $this->input->post('gender'),
					'active' => $this->input->post('status'),
				);
			}
			if ($this->Admin || $this->UserType == 'company_admin') {
				if ($this->input->post('password')) {
					$this->form_validation->set_rules('password', lang('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
					$this->form_validation->set_rules('password_confirm', lang('edit_user_validation_password_confirm_label'), 'required');
					$data['password'] = $this->input->post('password');
				}
			}
			//$this->sma->print_arrays($data);
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->update($user->id, $data)) {
			$this->session->set_flashdata('message', lang('user_updated'));
			redirect("auth/profile/" . $id);
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}
	function company()
	{
		if (!$this->loggedIn) {
			redirect('login');
		}
		if (!$this->Admin) {
			$this->session->set_flashdata('warning', lang("access_denied"));
			redirect($_SERVER["HTTP_REFERER"]);
		}
		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		$this->data['users'] = $this->site->whereRows('users', 'group_id', 3);
		$bc = array(
			array(
				'link' => '#',
				'page' => lang('User_List'),
			),
		);
		$meta = array(
			'page_title' => lang('Company_List'),
			'bc' => $bc,
		);
		$this->data['page_title'] = lang('Company_List');
		$this->page_construct('auth/company', $this->data, $meta);
	}
	function company_add()
	{
		$this->data['title'] = lang('add_user');
		$this->form_validation->set_rules('username', lang("username"), 'trim|is_unique[users.username]');
		$this->form_validation->set_rules('email', lang("email"), 'trim|is_unique[users.email]');
		$group_type = $this->input->post('group');
		if ($this->form_validation->run() == true) {
			$username = strtolower($this->input->post('username'));
			$email = strtolower($this->input->post('email'));
			$password = $this->input->post('password');
			$notify = $this->input->post('notify');
			$group_id = $this->input->post('group') ? $this->input->post('group') : '2';
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'group_id' => $group_id,
			);
			$active = $this->input->post('status');
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $active, $notify)) {
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect($_SERVER["HTTP_REFERER"]);
		} else {
			$this->data['error'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('error')));
			//$this->data['groups'] = $this->ion_auth->groups()->result_array();
			$this->db->select('*');
			$this->db->from('groups');
			$q = $this->db->get();
			$this->data['groups'] = $q->result();
			$this->data['page_title'] = lang('Add_New_Company');
			$bc = array(
				array(
					'link' => site_url('users'),
					'page' => lang('users'),
				),
				array(
					'link' => '#',
					'page' => lang('add_user'),
				),
			);
			$meta = array(
				'page_title' => lang('Add_New_Company'),
				'bc' => $bc,
			);
			$this->page_construct('users/company_add', $this->data, $meta);
		}
	}
	function company_edit($id = NULL)
	{
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
		}
		$this->data['title'] = lang("edit_user");
		if (!$this->loggedIn || !$this->Admin && $id != $this->session->userdata('user_id') && $this->UserType != 'company_admin') {
			$this->session->set_flashdata('warning', lang("access_denied"));
			redirect($_SERVER["HTTP_REFERER"]);
		}
		$user = $this->ion_auth->user($id)->row();
		if ($user->username != $this->input->post('username')) {
			$this->form_validation->set_rules('username', lang("username"), 'trim|is_unique[users.username]');
		}
		if ($user->email != $this->input->post('email')) {
			$this->form_validation->set_rules('email', lang("email"), 'trim|is_unique[users.email]');
		}
		if ($this->UserType == 'admin' || $this->UserType == 'admin_user') {
			$this->form_validation->set_rules('users_group', 'users group ', 'trim');
		} else {
			if ($this->session->userdata('user_id') != $user->id) {
				$this->form_validation->set_rules('users_group', 'users group ', 'trim|required');
			}
		}
		if ($this->form_validation->run() === TRUE) {
			if (DEMO) {
				$this->session->set_flashdata('error', lang('disabled_in_demo'));
				redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
			}
			if ($this->Admin) {
				if ($id == $this->session->userdata('user_id')) {
					$data = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'designation' => $this->input->post('designation'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
					);
				} else {
					$data = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'designation' => $this->input->post('designation'),
						'username' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
						'active' => $this->input->post('status'),
					);
				}
			} else {
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'phone' => $this->input->post('phone'),
					'gender' => $this->input->post('gender'),
					'users_group' => $this->input->post('users_group'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'gender' => $this->input->post('gender'),
					'active' => $this->input->post('status'),
				);
			}
			if ($this->Admin || $this->UserType == 'company_admin') {
				if ($this->input->post('password')) {
					$this->form_validation->set_rules('password', lang('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
					$this->form_validation->set_rules('password_confirm', lang('edit_user_validation_password_confirm_label'), 'required');
					$data['password'] = $this->input->post('password');
				}
			}
			//$this->sma->print_arrays($data);
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->update($user->id, $data)) {
			$this->session->set_flashdata('message', lang('user_updated'));
			redirect("auth/profile/" . $id);
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}
	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);
		return array(
			$key => $value,
		);
	}
	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE && $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function _render_page($view, $data = null, $render = false)
	{
		$this->viewdata = (empty($data)) ? $this->data : $data;
		$view_html = $this->load->view('header', $this->viewdata, $render);
		$view_html .= $this->load->view($view, $this->viewdata, $render);
		$view_html = $this->load->view('footer', $this->viewdata, $render);
		if (!$render) {
			return $view_html;
		}
	}
	function delete($id = NULL)
	{
		if (DEMO) {
			$this->session->set_flashdata('error', lang('disabled_in_demo'));
			redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
		}
		if ($id == $this->session->userdata('user_id') || (!$this->Admin && $this->UserType != 'company_admin')) {
			$this->session->set_flashdata('warning', lang("access_denied"));
			redirect($_SERVER["HTTP_REFERER"]);
		}
		if ($this->input->get('id')) {
			$id = $this->input->get('id');
		}
		$user = $this->ion_auth->user($id)->row();
		if ($this->auth_model->delete_user($id)) {
			$this->session->set_flashdata('message', lang('user_deleted'));
			redirect('users');
		}
	}
	public function applicant_register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Name', 'required|min_length[5]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		if ($this->form_validation->run() === FALSE) {
			$this->data['page_title'] = 'Applicant Registration';
			$bc = array(
				array(
					'link' => '#',
					'page' => 'Applicant Login',
				),
			);
			$meta = array(
				'page_title' => 'Applicant Registration',
				'bc' => $bc,
			);
			// $this->session->set_flashdata('error', validation_errors());
		} else {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('username'),
				'last_name' => '',
			);
			$register_data = $this->ion_auth->register($username, $password, $email, $additional_data);
			$applicant_id = 'BITOPI-' . date('Ymd') . $register_data;
			if ($register_data) {
				$update_status = $this->db->where('id', $register_data)->update('users', ['active' => 1, 'applicant_id' => $applicant_id]);
				// Log in the user
				$this->ion_auth->login($email, $password, TRUE);
				$this->session->set_flashdata('message', lang('Thank you! You are successfully register'));
				redirect('career');
			}
		}
		$this->frontend_construct('pages/registration_form', $this->data, $meta);
	}

	public function applicant_login()
	{

		if ($this->ion_auth->logged_in() && !$this->Admin) {

			redirect('career');
			// redirect('personal_information/insert_personal_info');
			//$this->session->set_flashdata('message', $this->ion_auth->messages());
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('identity', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() === FALSE) {
			$this->data['page_title'] = 'Applicant Login';
			$bc = array(
				array(
					'link' => '#',
					'page' => 'Applicant Login',
				),
			);
			$meta = array(
				'page_title' => 'Applicant Login',
				'bc' => $bc,
			);
		} else {

			$identity = $this->input->post('identity');
			$password = $this->input->post('password');
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($identity, $password, $remember)) {
				if ($this->ion_auth->logged_in() && $this->Admin) {

					redirect('admin');

					//$this->session->set_flashdata('message', $this->ion_auth->messages());

				}
				$this->session->set_flashdata('message', lang('Thank you! You are successfully logedin'));
				redirect('career');
				// redirect('personal_information/insert_personal_info');
			} else {
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/applicant_login');
			}
		}

		$this->frontend_construct('pages/login_form', $this->data, $meta);
	}


	function applicant_forgot_password()
	{
		$this->form_validation->set_rules('forgot_email', lang('email_address'), 'required|valid_email');
		if ($this->form_validation->run() == false) {
			$error = validation_errors() ? validation_errors() : $this->session->flashdata('error');
			$this->session->set_flashdata('error', $error);
			redirect("auth/applicant_login");
		} else {
			$identity = $this->ion_auth->where('email', strtolower($this->input->post('forgot_email')))->users()->row();
			if (empty($identity)) {
				$this->ion_auth->set_message('forgot_password_email_not_found');
				$this->session->set_flashdata('error', $this->ion_auth->messages());
				redirect("auth/applicant_login");
			}
			//$forgotten = $this->ion_auth->forgotten_password_member($identity->email);
			$forgotten = $this->ion_auth->forgotten_password_member($identity->email);
			if ($forgotten) {
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/applicant_login");
			} else {
				$this->session->set_flashdata('error', $this->ion_auth->errors());
				redirect("auth/applicant_login");
			}
		}
	}

	function applicant_forgetpassview()
	{
		$this->data['page_title'] = 'Applicant Login';
		$bc = array(
			array(
				'link' => '#',
				'page' => 'Applicant Login',
			),
		);
		$meta = array(
			'page_title' => 'Applicant Login',
			'bc' => $bc,
		);
		$this->frontend_construct('pages/forgot_password', $this->data, $meta);
	}
}
