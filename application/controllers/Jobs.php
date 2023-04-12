<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobs extends MY_Controller
{
    // Phpinfo();
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('inflector');
        $this->load->helper('array');
        $this->load->helper('string');
        $this->load->helper('directory');
        $this->load->library('user_agent');
        $this->load->helper('html');
        $this->load->model('Jobs_model');
        $this->load->library('upload');
    }
    public function index($term = NULL)
    {
        $this->load->library('pagination');
        //$term = $this->input->post('search_input') ? $this->input->post('search_input') : NULL;
        $per_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $type = $this->input->get('job_type') ? $this->input->get('job_type') : NULL;
        $location = $this->input->get('location') ? $this->input->get('location') : NULL;
        $category = $this->input->get('category') ? $this->input->get('category') : NULL;
        $keywords = $this->input->get('keywords') ? $this->input->get('keywords') : NULL;
        $config['base_url'] = site_url('jobs/index');
        $config['total_rows'] = $this->Jobs_model->count($type, $location, $category, $keywords);
        $config['per_page'] = 5;
        //$config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item disabled">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Next';

        $config['prev_link'] = 'Previous';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $this->data['job_type'] = $type;
        $this->data['location'] = $location;
        $this->data['category'] = $category;
        $this->data['keywords'] = $keywords;
        $this->data['result_count'] = $this->Jobs_model->count($type, $location, $category, $keywords);
        $this->pagination->initialize($config);
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = humanize('about_us');
        $this->data['jobs'] = $this->Jobs_model->jobs($config['per_page'], $per_page, $type, $location, $category, $keywords);
        $bc = array(array('link' => '#', 'page' => humanize('about_us')));
        $meta = array('page_title' => humanize('about_us'), 'bc' => $bc);
        $this->frontend_construct('jobs/index', $this->data, $meta);
    }
    public function get_jobs($start, $limit)
    {
        // $type = $this->input->post('job_type') ? $this->input->post('job_type') : NULL;
        // $location = $this->input->post('location') ? $this->input->post('location') : NULL;
        // $category = $this->input->post('category') ? $this->input->post('category') : NULL;
        // $keyword = $this->input->post('keywords') ? $this->input->post('keywords') : NULL;

        // $this->data['result_count'] = $this->Jobs_model->count($type, $location, $category, $keyword); 
        // $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        // $this->data['page_title'] = humanize('about_us');
        // $this->data['jobs'] = $this->Jobs_model->jobs($config['per_page'], $per_page, $type, $location, $category);
        // $bc = array(array('link' => '#', 'page' => humanize('about_us')));
        // $meta = array('page_title' => humanize('about_us'), 'bc' => $bc);
        // $this->frontend_construct('jobs/index', $this->data, $meta);

        $this->db->select('job_board.*, company.name as company_name, company.logo as company_logo, job_type.name as job_type_name');
        $this->db->where('job_board.status', 1);
        $this->db->limit($limit, $start);

        $this->db->order_by('id', 'ASC');
        $this->db->join('company', 'company.id=job_board.companey_id', 'left');
        $this->db->join('job_category', 'job_category.id=job_board.job_category_id', 'left');
        $this->db->join('job_type', 'job_type.id=job_board.job_type_id', 'left');
        $q = $this->db->get('job_board');
        //echo $str = $this->db->last_query();  
        $result =   $q->result();
        echo  json_encode($result);
    }
    function test()
    {
        $profile_code = 'FDB9999';
        $ass = ltrim($profile_code, 'FDB');
        $ddd = $ass + 1;
        if (($ddd <= 9)) {
            $profile_code = 'AFDB000' . $ddd;
        } else if ($ddd <= 99) {
            $profile_code = 'BFDB00' . $ddd;
        } else if ($ddd <= 999) {
            $profile_code = 'CFDB0' . $ddd;
        } else {
            $profile_code = 'DFDB' . $ddd;
        }
    }
    function details($slug)
    {

        $jobs = $this->Jobs_model->singleJob($slug);

        if ($this->input->post('profile_code_on_off') != 1) {
            $this->form_validation->set_rules('email', lang("email"), 'required|trim|valid_email');
            //$this->form_validation->set_rules('email', lang("email"), 'required|trim|is_unique[remember_profile.email]|valid_email');
            $apply_job = $this->site->wheresRow('apply_job', array('job_board_id' => $slug, 'email' => $this->input->post('email')));
            if ($apply_job) {
                $this->session->set_flashdata('error', 'You are already applied this job');
                redirect($_SERVER['HTTP_REFERER']);
            }
            if ($this->form_validation->run() == true) {
                $email = $this->input->post('email');

                $user_id = $this->session->userdata('member_id');

                $data = array(
                    'user_id' => $user_id,
                    'email' => $this->input->post('email'),
                    'job_board_id' => $slug,
                    'created_at' => date('Y-m-d H:i:s'),
                );


                if ($apply_job_id = $this->site->insert('apply_job', $data)) {

                    $email = $this->input->post('email');
                    $getInfo = $this->Jobs_model->whereRow('apply_job', 'email', $email);
                    // $data['profile_code'] = $profile_code;

                    $email = $getInfo->email;
                    $subject = 'You have successfully applied for ' . $jobs->positions;
                    $from_name = 'BITOPI GROUP';
                    $to = $getInfo->email;
                    $from = $this->Settings->default_email;
                    $data['positions'] = $jobs->positions;
                    $data['user_name'] = $this->session->userdata('username');
                    $this->data['mailData'] = $data;
                    $message = $this->load->view($this->frontend_theme . 'email_templates/applyforjobs-applicant', $this->data, TRUE);
                    $this->tec->send_email($to, $subject, $message, $from, $from_name,  $email, NULL);
                    $this->session->set_flashdata('message', 'Mail Send Successfully');

                    $email = $getInfo->email;
                    $subject2 = $this->session->userdata('username') . ' applied for ' . $jobs->positions . ' Position';
                    $from_name2 = $this->session->userdata('username');
                    $from2 = $getInfo->email;
                    $to2 = $this->Settings->default_email;
                    $data['positions'] = $jobs->positions;
                    $data['user_name'] = $from_name2;
                   
                    $this->data['mailData'] = $data;

                    $message2 = $this->load->view($this->frontend_theme . 'email_templates/applyforjobs-admin', $this->data, TRUE);
                    $this->tec->send_email($to2, $subject2, $message2, $from2, $from_name2, $email, NULL);
                    $this->session->set_flashdata('message', 'Congratulation! You have successfully applied for this job, A confirmation email with details has been sent to your email');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = humanize('job_board');
        $this->data['job'] = $jobs;
        $bc = array(array('link' => '#', 'page' => ucfirst($slug)));
        $meta = array('page_title' => humanize('job_board'), 'bc' => $bc);
        $this->frontend_construct('jobs/details', $this->data, $meta);
    }
    function details2($slug)
    {
        $jobs = $this->Jobs_model->singleJob($slug);
        if ($this->input->post('profile_code_on_off') != 1) {
            $this->form_validation->set_rules('email', lang("email"), 'required|trim|is_unique[company.email]|valid_email');
            $this->form_validation->set_rules('name', lang("Name"), 'required|trim');
            $this->form_validation->set_rules('dob', lang("Date of Birth"), 'required|trim');
            $this->form_validation->set_rules('cell', lang("Cell Number"), 'required|trim');
        } else {
            $this->form_validation->set_rules('profile_code', lang("profile_code"), 'required|trim');
            if ($this->input->post('profile_code_on_off')) {
                $profile_code = $this->input->post('profile_code');
                $fcode = $this->site->whereRow('remember_profile', 'profile_code', $profile_code);
                if (!$fcode) {
                    $this->form_validation->set_rules(
                        'profile',
                        'Profile Code not Match',
                        'required',
                        array('required' => 'Profile Code not Match')
                    );
                }
            }
        }
        if ($this->form_validation->run() == true) {
            $datedob = date_create($this->input->post('dob'));
            $datedob = date_format($datedob, "Y-m-d");
            if ($this->input->post('profile_code_on_off')) {
                $profile_code =  $this->input->post('profile_code');
                $fcode = $this->site->whereRow('remember_profile', 'profile_code', $profile_code);
                if ($fcode) {
                    $getInfo = $this->Jobs_model->whereRow('apply_job', 'email', $fcode->email);
                    $data = array(
                        'job_board_id' => $slug,
                        'client_id' => $this->input->post('client_id'),
                        'name' => $getInfo->name,
                        'dob' => $getInfo->dob,
                        'email' => $getInfo->email,
                        'phone' => $getInfo->phone,
                        'current_position' => $getInfo->current_position,
                        'current_organizations' => $getInfo->current_organizations,
                        'experience' => $getInfo->experience,
                        'current_salary' => $getInfo->current_salary,
                        'expectation' => $getInfo->expectation,
                        'attachment' => $getInfo->attachment,
                        'created_at' => date('Y-m-d H:i:s'),
                    );
                    if ($apply_job_id = $this->site->insert('apply_job', $data)) {
                        $data['profile_code'] = $profile_code;
                        $attachment = base_url('uploads/cv/') . $getInfo->attachment;
                        $email = $getInfo->email;
                        $subject = 'You have successfully applied for ' . $jobs->positions;
                        $from_name = 'Golden Infotech';
                        $to = $getInfo->email;
                        $from = $this->Settings->default_email;
                        $data['positions'] = $jobs->positions;
                        $this->data['mailData'] = $data;
                        $message = $this->load->view($this->frontend_theme . 'email_templates/applyforjobs-applicant', $this->data, TRUE);
                        $this->tec->send_email($to, $subject, $message, $from, $from_name, $attachment, $email, NULL);
                        $this->session->set_flashdata('message', 'Mail Send Successfully, We are soon contact with you! ');

                        $email = $getInfo->email;
                        $subject = $data['name'] . '(' . $data['profile_code'] . ') applied for ' . $jobs->positions . ' Position';
                        $from_name = 'Golden Infotech';
                        $to = $getInfo->email;
                        $from = $this->Settings->default_email;
                        $data['positions'] = $jobs->positions;
                        $this->data['mailData'] = $data;
                        $message = $this->load->view($this->frontend_theme . 'email_templates/applyforjobs-admin', $this->data, TRUE);
                        $this->tec->send_email($to, $subject, $message, $from, $from_name, $attachment, $email, NULL);
                        $this->session->set_flashdata('message', 'Mail Send Successfully, We are soon contact with you! ');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Not Found this profile code (' . $profile_code . ')');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->load->library('upload');
                $lastValue = $this->Jobs_model->lastValue();
                if (!$lastValue) {
                    $profile_code = 'FDB0001';
                } else {
                    $ass = ltrim($lastValue->profile_code, 'FDB');
                    $ddd = $ass + 1;
                    if (($ddd <= 9)) {
                        $profile_code = 'FDB000' . $ddd;
                    } else if ($ddd <= 99) {
                        $profile_code = 'FDB00' . $ddd;
                    } else if ($ddd <= 999) {
                        $profile_code = 'FDB0' . $ddd;
                    } else {
                        $profile_code = 'FDB' . $ddd;
                    }
                }
                if (!empty($_FILES['userfile']['name'])) {
                    $config['upload_path'] = 'uploads/cv/';
                    $config['allowed_types'] = 'doc|docx|pdf';
                    $config['max_width'] = '300';
                    $config['max_height'] = '300';
                    $config['overwrite'] = FALSE;
                    $config['encrypt_name'] = TRUE;
                    //$config['file_name'] = $profile_code;
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload()) {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                    $photo = $this->upload->file_name;
                } else {
                    $photo = '';
                }

                $data = array(
                    'job_board_id' => $slug,
                    'client_id ' => $this->input->post('client_id'),
                    'name' => $this->input->post('name'),
                    'dob' => $datedob,
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('cell'),
                    'current_position' => $this->input->post('current_postion'),
                    'current_organizations' => $this->input->post('current_organizations'),
                    'experience' => $this->input->post('experience'),
                    'current_salary' => $this->input->post('current_salary'),
                    'expectation' => $this->input->post('expectation'),
                    'attachment' => $photo,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $this->session->userdata('user_id'),
                );
                if ($apply_job_id = $this->site->insert('apply_job', $data)) {
                    $email = $this->input->post('email');
                    $remember = $this->site->whereRow('remember_profile', 'email', $email);
                    if (!$remember) {

                        $codeData = array(
                            'email' => $email,
                            'profile_code' => $profile_code,
                        );
                        $this->site->insert('remember_profile', $codeData);
                        $data['profile_code'] = $codeData['profile_code'];
                    } else {
                        $data['profile_code'] = $remember->profile_code;
                    }
                    $applyjob = $this->site->whereRow('apply_job', 'id', $apply_job_id);
                    $attachment = base_url('uploads/cv/') . $applyjob->attachment;
                    if ($this->input->post('email')) {
                        $email = $this->input->post('email');
                        $subject = 'You have successfully applied for ' . $jobs->positions;
                        $from_name = 'Golden Infotech';
                        $to = $this->input->post('email');
                        $from = $this->Settings->default_email;
                        $data['positions'] = $jobs->positions;
                        $this->data['mailData'] = $data;
                        $message = $this->load->view($this->frontend_theme . 'email_templates/applyforjobs-applicant', $this->data, TRUE);
                        $this->tec->send_email($to, $subject, $message, $from, $from_name, $attachment, $email, NULL);
                        $this->session->set_flashdata('message', 'Mail Send Successfully, We are soon contact with you! ');
                    }
                    if ($this->input->post('email')) {
                        $email = $this->input->post('email');
                        $subject = $data['name'] . '(' . $data['profile_code'] . ') applied for ' . $jobs->positions . ' Position';
                        $from_name = 'Golden Infotech';
                        $to = $this->input->post('email');
                        $from = $this->Settings->default_email;
                        $data['positions'] = $jobs->positions;
                        $this->data['mailData'] = $data;
                        $message = $this->load->view($this->frontend_theme . 'email_templates/applyforjobs-admin', $this->data, TRUE);
                        $this->tec->send_email($to, $subject, $message, $from, $from_name, $attachment, $email, NULL);
                        $this->session->set_flashdata('message', 'Mail Send Successfully, We are soon contact with you! ');
                    }
                    $this->session->set_flashdata('message', 'Successfully applyed!');
                    redirect('jobs/details/' . $slug);
                }
            }
        }
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = humanize('job_board');
        $this->data['job'] = $jobs;
        $bc = array(array('link' => '#', 'page' => ucfirst($slug)));
        $meta = array('page_title' => humanize('job_board'), 'bc' => $bc);
        $this->frontend_construct('jobs/details', $this->data, $meta);
    }
    function ajaxCheck()
    {
        $exits = array();
        $exits['success'] = 'Successful';
        if ($this->input->post('profile_code')) {
            $chackEmail = $this->site->whereRow('remember_profile', 'profile_code', $this->input->post('profile_code'));
            if (!$chackEmail) {
                if ($chackEmail->email != $this->input->post('profile_code')) {
                    $exits['code'] = '<p>This Profile Code not Found!</p>';
                    $exits['success'] = '';
                }
            }
        }
        echo json_encode($exits);
    }


    function calendar()
    {

        $this->data['jobs'] = $this->Jobs_model->clander_jobs();

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = humanize('job_board');

        $bc = array(array('link' => '#', 'page' => 'job board'));
        $meta = array('page_title' => humanize('job_board'), 'bc' => $bc);
        $this->frontend_construct('jobs/calendar', $this->data, $meta);
    }

    function applicant_applied_jobs()
    {
        $this->load->library('pagination');
        $per_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $type = $this->input->get('job_type') ? $this->input->get('job_type') : NULL;
        $location = $this->input->get('location') ? $this->input->get('location') : NULL;
        $category = $this->input->get('category') ? $this->input->get('category') : NULL;
        $keywords = $this->input->get('keywords') ? $this->input->get('keywords') : NULL;
        $config['base_url'] = site_url('jobs/applicant_applied_jobs');
        $config['total_rows'] = $this->Jobs_model->count($type, $location, $category, $keywords);
        $config['per_page'] = 5;
        //$config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item disabled">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Next';

        $config['prev_link'] = 'Previous';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $this->data['job_type'] = $type;
        $this->data['location'] = $location;
        $this->data['category'] = $category;
        $this->data['keywords'] = $keywords;
        $this->data['result_count'] = $this->Jobs_model->count($type, $location, $category, $keywords);
        $this->pagination->initialize($config);



        $this->data['applied_jobs'] = $this->Jobs_model->get_applyjob_data($config['per_page'], $per_page, $type, $location, $category, $keywords);
        $this->data['page_title'] = 'Applicant Applied Job';

        $bc = array(
            array(
                'link' => '#',
                'page' => 'Applicant Applied Job ',
            ),
        );
        $meta = array(
            'page_title' => 'Applicant Applied Job',
            'bc' => $bc,
        );

        $this->frontend_construct('applicant_applied_job/applied_job', $this->data, $meta);
    }
    function applicant_job_details($slug)
    {
        $jobs = $this->Jobs_model->singleJob($slug);
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = humanize('job_board');
        $this->data['job'] = $jobs;
        // $bc = array(array('link' => '#', 'page' => ucfirst($slug)));
        $bc = array(
            array(
                'link' => '#',
                'page' => 'Applicant Applied Job ',
            ),
        );
        $meta = array('page_title' => humanize('job_board'), 'bc' => $bc);
        $this->frontend_construct('applicant_applied_job/details', $this->data, $meta);
    }
}
