<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Career extends MY_Controller
{
    function index()
    {
        $user_id = $this->session->userdata('member_id');
        // echo $user_id;
        $this->db->select('*');
        $this->db->from('personal_info');
        $this->db->where('personal_info.user_id', $user_id);
        $query = $this->db->get()->row();
        $this->data['personal_info'] = $query;
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
        $this->frontend_construct('career/index', $this->data, $meta);
    }
}
