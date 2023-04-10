<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Personal_information extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('pdf');
        $this->load->helper('form');
        $this->load->helper('inflector');
        $this->load->helper('array');
        $this->load->helper('string');
        $this->load->helper('directory');
        $this->load->library('user_agent');
        $this->load->helper('html');
        $this->load->model('personalInfo_model');
        $this->load->model('settings_model');
        // $this->load->library('upload');
    }

    public function insert_personal_info()
    {

        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('blood_group', 'Blood Group ', 'required');
        $this->form_validation->set_rules('cell_phone_1', 'Cell Phone 1 ', 'required');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required');
        $this->form_validation->set_rules('national_id_number', 'National-id-number ', 'required');
        $this->form_validation->set_rules('religion', 'Religion ', 'required');
        $this->form_validation->set_rules('father_name', 'Father Name ', 'required');
        $this->form_validation->set_rules('mother_name', 'Mother Name ', 'required');
        $this->form_validation->set_rules('present_address', 'Present Address', 'required');
        $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'required');
        $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
        $user_name = $this->session->userdata('username');

        $user_id = $this->session->userdata('member_id');
        $email = $this->session->userdata('email');
        // echo "<pre>";
        // print_r($user_id);
        // die;

        $this->data['personal_info'] = $this->db->select('*')->from('personal_info')->where('user_id', $user_id)->get()->row();

        if (!$this->data['personal_info']) {
            $createNewRowForThisUser = $this->db->insert('personal_info', ["user_id" => $user_id]);
        }

        if ($this->form_validation->run() == true) {
            $data = array(

                'full_name' => $this->input->post('full_name'),
                'dob'         => $this->input->post('dob'),
                'gender'         => $this->input->post('gender'),
                'blood_group'     => $this->input->post('blood_group'),
                'cell_phone_1'     => $this->input->post('cell_phone_1'),
                'cell_phone_2'     => $this->input->post('cell_phone_2'),
                'office_phone'     => $this->input->post('office_phone'),
                'home_phone'     => $this->input->post('home_phone'),
                'nationality'     => $this->input->post('nationality'),
                'passport_number'     => $this->input->post('passport_number'),
                'national_id_number'     => $this->input->post('national_id_number'),
                'religion'     => $this->input->post('religion'),
                'father_name'     => $this->input->post('father_name'),
                'father_profession'     => $this->input->post('father_profession'),
                'mother_name'     => $this->input->post('mother_name'),
                'mother_profession'     => $this->input->post('mother_profession'),
                'present_address'     => $this->input->post('present_address'),
                'permanent_address'     => $this->input->post('permanent_address'),
                'marital_status'     => $this->input->post('marital_status'),
                'email'             => $email,
            );
            if (!empty($_FILES['applicantPhoto']['name'])) {

                $this->load->library('upload');
                $config['upload_path']   = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                /*  $config['max_size']      = '2500';
                $config['max_width']     = '1300';
                $config['max_height']    = '800'; */
                $config['overwrite']     = FALSE;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('applicantPhoto')) {
                    $error = $this->upload->display_errors();
                    // echo $error;
                    // die;
                    $this->session->set_flashdata('message', $error);
                    redirect('personal_information/insert_personal_info');
                }
                $footerLogo = $this->upload->file_name;
            }
            if (isset($footerLogo)) {
                $data['applicant_photo'] = $footerLogo;
            }
            $this->db->where('id', $user_id)->update('users', ['username' => $data['full_name']]);
            $this->session->set_userdata('username', $data['full_name']);

            $updatePersonalInfo = $this->db->where('user_id', $user_id)->update("personal_info", $data);

            // $cid = $this->personalInfo_model->addPersonalInfo($data);
            // die;
            //acadamic info
            $i = isset($_POST['education_lavel']) ? sizeof($_POST['education_lavel']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $education_lavel = $_POST['education_lavel'][$r];
                $degree = $_POST['degree'][$r];
                $passing_year = $_POST['passing_year'][$r];
                $name_of_institution = $_POST['name_of_institution'][$r];
                $board = $_POST['board'][$r];
                $major = $_POST['major'][$r];
                $result = $_POST['result'][$r];
                $result_out_of = $_POST['result_out_of'][$r];
                $user_id = $this->session->userdata('member_id');



                // if (isset($education_lavel) && isset($degree) && isset($passing_year) && isset($name_of_institution) && isset($board) && isset($major) && isset($result) && isset($result_out_of) && isset($user_id) > 0) {

                $acadamic[] = array(
                    'user_id' => $user_id,
                    'education_lavel' => $education_lavel,
                    'degree' => $degree,
                    'passing_year' => $passing_year,
                    'name_of_institution' => $name_of_institution,
                    'board' => $board,
                    'major' => $major,
                    'result' => $result,
                    'result_out_of' => $result_out_of,
                );
                // }
            }
            if (count($acadamic) > 0) {
                $this->db->where('user_id', $user_id)->delete("acadamic_info");
            }
            foreach ($acadamic as $item) {
                $this->db->insert('acadamic_info', $item);
            }


            //employment history
            $i = isset($_POST['organization_name']) ? sizeof($_POST['organization_name']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $organization_name = $_POST['organization_name'][$r];
                $address = $_POST['address'][$r];
                $department = $_POST['department'][$r];
                $designation = $_POST['designation'][$r];
                $industry_type = $_POST['industry_type'][$r];
                $key_responsibility = $_POST['key_responsibility'][$r];
                $start_from = $_POST['start_from'][$r];
                $end_to = $_POST['end_to'][$r];
                $user_id = $this->session->userdata('member_id');

                // if (isset($organization_name) && isset($address) && isset($department) && $designation && $key_responsibility && $start_from && $end_to && $industry_type  && $user_id > 0) {
                $employment_history[] = array(
                    'user_id' => $user_id,
                    'organization_name' => $organization_name,
                    'address' => $address,
                    'department' => $department,
                    'designation' => $designation,
                    'industry_type' => $industry_type,
                    'key_responsibility' => $key_responsibility,
                    'start_from' => $start_from,
                    'end_to' => $end_to,
                );
                // }
            }
            if (count($employment_history) > 0) {
                $this->db->where('user_id', $user_id)->delete("employment_history");
            }
            foreach ($employment_history as $item) {
                $this->db->insert('employment_history', $item);
            }


            //training info
            $i = isset($_POST['title']) ? sizeof($_POST['title']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $title = $_POST['title'][$r];
                $institution_name = $_POST['institution_name'][$r];
                $address = $_POST['address'][$r];
                $duration = $_POST['duration'][$r];
                $start_date = $_POST['start_date'][$r];
                $end_date = $_POST['end_date'][$r];
                $skills = $_POST['skills'][$r];
                $user_id = $this->session->userdata('member_id');

                // if (isset($title) && isset($institution_name) && isset($address) && $duration && $start_date && $end_date && $skills  && $user_id > 0) {
                $training[] = array(
                    'user_id' => $user_id,
                    'title' => $title,
                    'institution_name' => $institution_name,
                    'address' => $address,
                    'duration' => $duration,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'skills' => $skills,
                );
                // }
            }
            if (count($training) > 0) {
                $this->db->where('user_id', $user_id)->delete("training_info");
            }
            foreach ($training as $item) {
                $this->db->insert('training_info', $item);
            }

            //professional qualification
            $i = isset($_POST['certificate']) ? sizeof($_POST['certificate']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $certificate = $_POST['certificate'][$r];
                $awarding_body = $_POST['awarding_body'][$r];
                $address = $_POST['address'][$r];
                $registration_number = $_POST['registration_number'][$r];
                $passing_year = $_POST['passing_year'][$r];
                $result = $_POST['result'][$r];
                $remarks = $_POST['remarks'][$r];
                $user_id = $this->session->userdata('member_id');

                // if (isset($certificate) && isset($awarding_body) && isset($address) && $registration_number && $passing_year && $result && $remarks  && $user_id > 0) {
                $qualification[] = array(
                    'user_id' => $user_id,
                    'certificate' => $certificate,
                    'awarding_body' => $awarding_body,
                    'address' => $address,
                    'registration_number' => $registration_number,
                    'passing_year' => $passing_year,
                    'result' => $result,
                    'remarks' => $remarks,
                );
                // }
            }
            if (count($qualification) > 0) {
                $this->db->where('user_id', $user_id)->delete("professional_qualification");
            }
            foreach ($qualification as $item) {
                $this->db->insert('professional_qualification', $item);
            }


            //key skills
            $i = isset($_POST['key_skill1']) ? sizeof($_POST['key_skill1']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $key_skill1 = $_POST['key_skill1'][$r];
                $key_skill2 = $_POST['key_skill2'][$r];
                $key_skill3 = $_POST['key_skill3'][$r];
                $key_skill4 = $_POST['key_skill4'][$r];
                $user_id = $this->session->userdata('member_id');


                $key_skills[] = array(
                    'user_id' => $user_id,
                    'key_skill1' => $key_skill1,
                    'key_skill2' => $key_skill2,
                    'key_skill3' => $key_skill3,
                    'key_skill4' => $key_skill4
                );
            }

            if (count($key_skills) > 0) {
                $this->db->where('user_id', $user_id)->delete("key_skills");
            }
            foreach ($key_skills as $item) {
                $this->db->insert('key_skills', $item);
            }

            //computer skills
            $i = isset($_POST['computer_skill1']) ? sizeof($_POST['computer_skill1']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $computer_skill1 = $_POST['computer_skill1'][$r];
                $computer_skill2 = $_POST['computer_skill2'][$r];
                $computer_skill3 = $_POST['computer_skill3'][$r];
                $computer_skill4 = $_POST['computer_skill4'][$r];
                $user_id = $this->session->userdata('member_id');


                $computer_skills[] = array(
                    'user_id' => $user_id,
                    'computer_skill1' => $computer_skill1,
                    'computer_skill2' => $computer_skill2,
                    'computer_skill3' => $computer_skill3,
                    'computer_skill4' => $computer_skill4
                );
            }
            if (count($computer_skills) > 0) {
                $this->db->where('user_id', $user_id)->delete("computer_skills");
            }
            foreach ($computer_skills as $item) {
                $this->db->insert('computer_skills', $item);
            }


            //language proficiency
            $i = isset($_POST['language']) ? sizeof($_POST['language']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $language = $_POST['language'][$r];
                $speaking = $_POST['speaking'][$r];
                $writing = $_POST['writing'][$r];
                $reading = $_POST['reading'][$r];
                $listening = $_POST['listening'][$r];
                $user_id = $this->session->userdata('member_id');

                // if (isset($language) && isset($speaking) && isset($writing) && $reading && $listening && $user_id > 0) {
                $language_proficincy[] = array(
                    'user_id' => $user_id,
                    'language' => $language,
                    'speaking' => $speaking,
                    'writing' => $writing,
                    'reading' => $reading,
                    'listening' => $listening,
                );
                // }
            }
            if (count($language_proficincy) > 0) {
                $this->db->where('user_id', $user_id)->delete("language_proficincy");
            }
            foreach ($language_proficincy as $item) {
                $this->db->insert('language_proficincy', $item);
            }

            //refarances
            $i = isset($_POST['ref_name']) ? sizeof($_POST['ref_name']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $ref_name = $_POST['ref_name'][$r];
                $ref_degignation = $_POST['ref_degignation'][$r];
                $ref_organization = $_POST['ref_organization'][$r];
                $mailing_address = $_POST['mailing_address'][$r];
                $ref_email = $_POST['ref_email'][$r];
                $ref_phone = $_POST['ref_phone'][$r];
                $ref_relation = $_POST['ref_relation'][$r];
                $ref_name2 = $_POST['ref_name2'][$r];
                $ref_degignation2 = $_POST['ref_degignation2'][$r];
                $ref_organization2 = $_POST['ref_organization2'][$r];
                $mailing_address2 = $_POST['mailing_address2'][$r];
                $ref_email2 = $_POST['ref_email2'][$r];
                $ref_phone2 = $_POST['ref_phone2'][$r];
                $ref_relation2 = $_POST['ref_relation2'][$r];
                $user_id = $this->session->userdata('member_id');

                // if (isset($ref_name) && isset($ref_degignation) && isset($ref_organization) && isset($ref_email) && isset($ref_phone) && isset($ref_relation) && isset($user_id) > 0) {
                $refarances[] = array(
                    'user_id' => $user_id,
                    'ref_name' => $ref_name,
                    'ref_degignation' => $ref_degignation,
                    'ref_organization' => $ref_organization,
                    'mailing_address' => $mailing_address,
                    'ref_email' => $ref_email,
                    'ref_phone' => $ref_phone,
                    'ref_relation' => $ref_relation,
                    'ref_name2' => $ref_name2,
                    'ref_degignation2' => $ref_degignation2,
                    'ref_organization2' => $ref_organization2,
                    'mailing_address2' => $mailing_address2,
                    'ref_email2' => $ref_email2,
                    'ref_phone2' => $ref_phone2,
                    'ref_relation2' => $ref_relation2,
                );
                // }
            }
            if (count($refarances) > 0) {
                $this->db->where('user_id', $user_id)->delete("references");
            }
            foreach ($refarances as $item) {
                $this->db->insert('references', $item);
            }

            //additional info

            $this->data['additional_info'] = $this->db->select('*')->from('additional_info')->where('user_id', $user_id)->get()->row();

            if (!$this->data['additional_info']) {
                $createNewRowForThisUser = $this->db->insert('additional_info', ["user_id" => $user_id]);
            }
            $additional_data = array(
                'job_location_preference' => $this->input->post('job_location_preference'),
                'location_name'         => $this->input->post('location_name'),
                'present_salary'         => $this->input->post('present_salary'),
                'expected_salary'         => $this->input->post('expected_salary'),
                'how_know'         => $this->input->post('how_know'),
                'other_way'         => $this->input->post('other_way'),
                'any_relatives'         => $this->input->post('any_relatives'),
                'any_relatives'         => $this->input->post('any_relatives'),
                'perviously_interview'         => $this->input->post('perviously_interview'),
                // 'user_id' => $user_id,
            );

            // $this->db->insert('additional_info', $additional_data);
            $updatePersonalInfo = $this->db->where('user_id', $user_id)->update("additional_info", $additional_data);

            //relatives
            $i = isset($_POST['name_relative']) ? sizeof($_POST['name_relative']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $name_relative = $_POST['name_relative'][$r];
                $rel_relationship = $_POST['rel_relationship'][$r];
                $rel_designation = $_POST['rel_designation'][$r];
                $rel_department = $_POST['rel_department'][$r];
                $rel_job_location = $_POST['rel_job_location'][$r];
                $user_id = $this->session->userdata('member_id');
                $relatives[] = array(
                    'user_id' => $user_id,
                    'name_relative' => $name_relative,
                    'rel_relationship' => $rel_relationship,
                    'rel_designation' => $rel_designation,
                    'rel_department' => $rel_department,
                    'rel_job_location' => $rel_job_location,
                );
            }
            if (count($relatives) > 0) {
                $this->db->where('user_id', $user_id)->delete("relative");
            }

            foreach ($relatives as $item) {
                $this->db->insert('relative', $item);
            }
            //previously interviewed
            $i = isset($_POST['previous_position']) ? sizeof($_POST['previous_position']) : 0;
            for ($r = 0; $r < $i; $r++) {
                $previous_position = $_POST['previous_position'][$r];
                $interview_month = $_POST['interview_month'][$r];
                $interview_year = $_POST['interview_year'][$r];
                $interview_remarks = $_POST['interview_remarks'][$r];
                $user_id = $this->session->userdata('member_id');
                $previously_interviewed[] = array(
                    'user_id' => $user_id,
                    'previous_position' => $previous_position,
                    'interview_month' => $interview_month,
                    'interview_year' => $interview_year,
                    'interview_remarks' => $interview_remarks,
                );
                // echo "<pre>";
                // print_r($previously_interviewed);
                // die;
            }
            if (count($previously_interviewed) > 0) {
                $this->db->where('user_id', $user_id)->delete("previously_interviewed");
            }
            foreach ($previously_interviewed as $item) {
                $this->db->insert('previously_interviewed', $item);
            }

            $this->data['resume_upload'] = $this->db->select('*')->from('resume_uploads')->where('user_id', $user_id)->get()->row();

            if (!$this->data['resume_upload']) {
                $createNewRowForThisUser = $this->db->insert('resume_uploads', ["user_id" => $user_id]);
            }

            $upload_resume = array(
                'user_id' => $user_id,
            );
            if (!empty($_FILES['uploadResume']['name'])) {

                $this->load->library('upload');
                $config['upload_path']   = 'uploads/';
                $config['allowed_types'] = 'pdf';
                /*  $config['max_size']      = '2500';
                $config['max_width']     = '1300';
                $config['max_height']    = '800'; */
                $config['overwrite']     = FALSE;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('uploadResume')) {
                    $error = $this->upload->display_errors();
                    // echo $error;
                    // die;
                    $this->session->set_flashdata('message', $error);
                    redirect('personal_information/insert_personal_info');
                }
                $resume = $this->upload->file_name;
            }
            if (isset($resume)) {
                $upload_resume['upload_file'] = $resume;
            }

            $updatePersonalInfo = $this->db->where('user_id', $user_id)->update("resume_uploads", $upload_resume);
            // $this->db->insert('resume_uploads', $upload_resume);


            $this->session->set_flashdata('message', 'Your Profile Information is Updated');
            redirect("career");
        } else {
            $this->data['resume_upload'] = $this->db->select('*')->from('resume_uploads')->where('user_id', $user_id)->get()->row();
            $this->data['acadamic_info'] =  $this->db->select('*')->from('acadamic_info')->where('user_id', $user_id)->get()->result();
            $this->data['employment_history'] =  $this->db->select('*')->from('employment_history')->where('user_id', $user_id)->get()->result();
            $this->data['training_info'] =  $this->db->select('*')->from('training_info')->where('user_id', $user_id)->get()->result();
            $this->data['professional_qualification'] =  $this->db->select('*')->from('professional_qualification')->where('user_id', $user_id)->get()->result();
            $this->data['key_skills'] =  $this->db->select('*')->from('key_skills')->where('user_id', $user_id)->get()->result();
            $this->data['computer_skills'] =  $this->db->select('*')->from('computer_skills')->where('user_id', $user_id)->get()->result();
            $this->data['language_proficincy'] =  $this->db->select('*')->from('language_proficincy')->where('user_id', $user_id)->get()->result();
            $this->data['references'] =  $this->db->select('*')->from('references')->where('user_id', $user_id)->get()->result();
            $this->data['additional_info'] =  $this->db->select('*')->from('additional_info')->where('user_id', $user_id)->get()->result();
            $this->data['relatives'] =  $this->db->select('*')->from('relative')->where('user_id', $user_id)->get()->result();
            $this->data['previously_interview'] =  $this->db->select('*')->from('previously_interviewed')->where('user_id', $user_id)->get()->result();

            $this->data['page_title'] = 'Applicant Personal Info';

            $bc = array(
                array(
                    'link' => '#',
                    'page' => 'Applicant Personal Info',
                ),
            );
            $meta = array(
                'page_title' => 'Applicant Personal Info',
                'bc' => $bc,
            );
            $this->frontend_construct('personal_information/index', $this->data, $meta);
        }
    }

    /* function applicant_details($slug)
    {
        $info = $this->PersonalInfo_model->singleApplicantInfo($slug);
        $this->data['personal_info'] = $this->db->select('*')->from('personal_info')->where('user_id', $slug)->get()->row();
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['page_title'] = 'List of applicants';
        $this->data['user_id'] = $slug;
        $bc = array(array('link' => '#', 'page' => 'List'));
        $meta = array('page_title' => 'List of applicants', 'bc' => $bc);
        $this->page_construct('applicant_resume/resume', $this->data, $meta);
    } */


    function user_all_data($id = NULL)
    {
        if ($this->Admin) {
            $user_id = $id;
        } else {
            $user_id = $this->session->userdata('member_id');
        }

        $this->db->select('*');
        $this->db->from('personal_info');
        $this->db->where('personal_info.user_id', $user_id);
        $query = $this->db->get()->row();
        $this->data['personal_info'] = $query;
        $this->data['user_id'] = $user_id;

        $this->db->select('*');
        $this->db->from('acadamic_info');
        $this->db->where('acadamic_info.user_id', $user_id);
        $query = $this->db->get();
        $this->data['acadamic_info'] = $query->result();

        $this->db->select('*');
        $this->db->from('employment_history');
        $this->db->where('employment_history.user_id', $user_id);
        $query = $this->db->get();
        $this->data['employment_history'] = $query->result();

        $this->db->select('*');
        $this->db->from('training_info');
        $this->db->where('training_info.user_id', $user_id);
        $query = $this->db->get();
        $this->data['training_info'] = $query->result();

        $this->db->select('*');
        $this->db->from('professional_qualification');
        $this->db->where('professional_qualification.user_id', $user_id);
        $query = $this->db->get();
        $this->data['professional_qualification'] = $query->result();

        $this->db->select('*');
        $this->db->from('key_skills');
        $this->db->where('key_skills.user_id', $user_id);
        $query = $this->db->get();
        $this->data['key_skills'] = $query->result();

        $this->db->select('*');
        $this->db->from('computer_skills');
        $this->db->where('computer_skills.user_id', $user_id);
        $query = $this->db->get();
        $this->data['computer_skills'] = $query->result();

        $this->db->select('*');
        $this->db->from('language_proficincy');
        $this->db->where('language_proficincy.user_id', $user_id);
        $query = $this->db->get();
        $this->data['language_proficincy'] = $query->result();

        $this->db->select('*');
        $this->db->from('references');
        $this->db->where('references.user_id', $user_id);
        $query = $this->db->get();
        $this->data['references'] = $query->result();

        $this->db->select('*');
        $this->db->from('additional_info');
        $this->db->where('additional_info.user_id', $user_id);
        $query = $this->db->get();
        $this->data['additional_info'] = $query->result();





        /* $this->db->join('acadamic_info', 'personal_info.user_id = acadamic_info.user_id', 'left');
        $this->db->join('employment_history', 'personal_info.user_id = employment_history.user_id', 'left');
        $this->db->join('training_info', 'personal_info.user_id = training_info.user_id', 'left');
        $this->db->join('professional_qualification', 'personal_info.user_id = professional_qualification.user_id', 'left');
        $this->db->join('key_skills', 'personal_info.user_id = key_skills.user_id', 'left');
        $this->db->join('computer_skills', 'personal_info.user_id = computer_skills.user_id', 'left');
        $this->db->join('language_proficincy', 'personal_info.user_id = language_proficincy.user_id', 'left');
        $this->db->join('references', 'personal_info.user_id = references.user_id', 'left');
        $this->db->join('additional_info', 'personal_info.user_id = additional_info.user_id', 'left'); */
        // $this->db->where('personal_info.user_id', $user_id);




        $this->data['page_title'] = 'Applicant Personal Info';

        $bc = array(
            array(
                'link' => '#',
                'page' => 'Applicant Personal Info',
            ),
        );
        $meta = array(
            'page_title' => 'Applicant Personal Info',
            'bc' => $bc,
        );
        $this->frontend_construct('applicant_resume/resume', $this->data, $meta);
        /*  // $str = $this->db->last_query();

        // echo "<pre>";
        // print_r($str);
        echo "<pre>";
        print_r($result);
        die; */
    }

    function pdf($user_id)
    {
        $this->db->select('*');
        $this->db->from('personal_info');
        $this->db->where('personal_info.user_id', $user_id);
        $query = $this->db->get()->row();
        $this->data['personal_info'] = $query;
        $this->data['user_id'] = $user_id;

        $this->db->select('*');
        $this->db->from('acadamic_info');
        $this->db->where('acadamic_info.user_id', $user_id);
        $query = $this->db->get();
        $this->data['acadamic_info'] = $query->result();

        $this->db->select('*');
        $this->db->from('employment_history');
        $this->db->where('employment_history.user_id', $user_id);
        $query = $this->db->get();
        $this->data['employment_history'] = $query->result();

        $this->db->select('*');
        $this->db->from('training_info');
        $this->db->where('training_info.user_id', $user_id);
        $query = $this->db->get();
        $this->data['training_info'] = $query->result();

        $this->db->select('*');
        $this->db->from('professional_qualification');
        $this->db->where('professional_qualification.user_id', $user_id);
        $query = $this->db->get();
        $this->data['professional_qualification'] = $query->result();

        $this->db->select('*');
        $this->db->from('key_skills');
        $this->db->where('key_skills.user_id', $user_id);
        $query = $this->db->get();
        $this->data['key_skills'] = $query->result();

        $this->db->select('*');
        $this->db->from('computer_skills');
        $this->db->where('computer_skills.user_id', $user_id);
        $query = $this->db->get();
        $this->data['computer_skills'] = $query->result();

        $this->db->select('*');
        $this->db->from('language_proficincy');
        $this->db->where('language_proficincy.user_id', $user_id);
        $query = $this->db->get();
        $this->data['language_proficincy'] = $query->result();

        $this->db->select('*');
        $this->db->from('references');
        $this->db->where('references.user_id', $user_id);
        $query = $this->db->get();
        $this->data['references'] = $query->result();

        $this->db->select('*');
        $this->db->from('additional_info');
        $this->db->where('additional_info.user_id', $user_id);
        $query = $this->db->get();
        $this->data['additional_info'] = $query->result();

        $this->load->library('pdf');
        $this->data['page_title'] = 'Applicant Personal Info';

        $bc = array(
            array(
                'link' => '#',
                'page' => 'Applicant Personal Info',
            ),
        );
        $meta = array(
            'page_title' => 'Applicant Personal Info',
            'bc' => $bc,
        );
        // $this->data['frontend_asset'] 
        $html =  $this->load->view($this->frontend_theme . 'applicant_resume/resume_pdf', $this->data, true);
        // $html =  $this->frontend_construct('applicant_resume/resume', $this->data);
        // echo $html;
        // die;
        $this->pdf->createPDF($html, 'mypdf', false);
    }
}
