<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personal_information extends MY_Controller
{
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
        // $this->load->model('Jobs_model');
        $this->load->library('upload');
    }

    public function insert_personal_info()
    {
        // echo "fff";
        // die;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth');
        $this->form_validation->set_rules('gender', 'Gender');
        $this->form_validation->set_rules('cell_phone1', 'Cell Phone 1');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('nationality', 'Nationality');
        $this->form_validation->set_rules('national_id', 'National ID Number');
        $this->form_validation->set_rules('religion', 'Religion');
        $this->form_validation->set_rules('marital_status', 'Marital Status');
        $this->form_validation->set_rules('father_name', "Father's Name");
        $this->form_validation->set_rules('mother_name', "Mother's Name");
        $this->form_validation->set_rules('present_address', 'Present Address');
        $this->form_validation->set_rules('permanent_address', 'Permanent Address');

        if ($this->form_validation->run() == false) {
            return false;
        }
        $user_id = $this->session->userdata('user_id');
        $data['user_id'] = $user_id;



        $this->db->insert('tec_personal_info', $data);
        return $this->db->insert_id();
    }
}
