<?php
class Jobs_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function count($type = NULL, $location = NULL, $category = NULL, $keyword = NULL)
    {
        $date = date('Y-m-d');
        $this->db->where('last_date >=', $date);
        $this->db->where('job_board.status', 1);
        if ($type) {
            $this->db->where_in('job_type.id', $type);
        }
        if ($location) {
            $locat = str_replace('_', ' ', $location);
            $this->db->where("(job_board.location LIKE '%" . $locat . "%')");
        }
        if ($category) {
            $this->db->where('job_category.id', $category);
        }
        if ($keyword) {
            $this->db->where("(company.name LIKE '%" . $keyword . "%' OR positions LIKE '%" . $keyword . "%' OR descriptions LIKE '%" . $keyword . "%' OR education_experience LIKE '%" . $keyword . "%' OR additional_requirement LIKE '%" . $keyword . "%')");
        }
        $this->db->order_by('last_date', 'DESC');
        $this->db->join('company', 'company.id=job_board.companey_id', 'left');
        $this->db->join('job_category', 'job_category.id=job_board.job_category_id', 'left');
        $this->db->join('job_type', 'job_type.id=job_board.job_type_id', 'left');
        $q = $this->db->get('job_board');
        if ($q->num_rows() > 0) {
            return $q->num_rows();
        }
        return 0;
    }
    public function jobs($limit, $start, $type = NULL, $location = NULL, $category = NULL, $keyword = NULL)
    {
        $date = date('Y-m-d');
        $this->db->select('job_board.*, company.name as company_name, company.logo as company_logo, job_type.name as job_type_name');
        $this->db->where('last_date >=', $date);
        $this->db->where('job_board.status', 1);
        $this->db->limit($limit, $start);
        if ($type) {
            $this->db->where_in('job_type.id', $type);
        }
        if ($location) {
            $locat = str_replace('_', ' ', $location);
            $this->db->where("(job_board.location LIKE '%" . $locat . "%')");
        }
        if ($category) {
            $this->db->where('job_category.id', $category);
        }
        if ($keyword) {
            $this->db->where("(company.name LIKE '%" . $keyword . "%' OR positions LIKE '%" . $keyword . "%' OR descriptions LIKE '%" . $keyword . "%' OR education_experience LIKE '%" . $keyword . "%' OR additional_requirement LIKE '%" . $keyword . "%')");
        }
        $this->db->order_by('last_date', 'DESC');
        $this->db->join('company', 'company.id=job_board.companey_id', 'left');
        $this->db->join('job_category', 'job_category.id=job_board.job_category_id', 'left');
        $this->db->join('job_type', 'job_type.id=job_board.job_type_id', 'left');
        $q = $this->db->get('job_board');
        //echo $str = $this->db->last_query();
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }
    public function singleJob($id)
    {
        $this->db->select('job_board.*, company.name as company_name, company.id as company_id, company.logo as company_logo, job_type.name as job_type_name');
        $this->db->where('job_board.id', $id);
        $this->db->limit(1);
        $this->db->join('company', 'company.id=job_board.companey_id', 'left');
        $this->db->join('job_category', 'job_category.id=job_board.job_category_id', 'left');
        $this->db->join('job_type', 'job_type.id=job_board.job_type_id', 'left');
        $q = $this->db->get('job_board');
        //echo $str = $this->db->last_query();
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return array();
    }
    public function lastValue()
    {
        $this->db->limit(1);
        $this->db->order_by('id', 'DESC');
        $q = $this->db->get('remember_profile');
        if ($q->num_rows() > 0)
            return $q->row();
    }
    public function whereRow($table, $fild, $data)
    {
        $this->db->order_by('id', 'DESC');
        $q = $this->db->get_where($table, array($fild => $data), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    function clander_jobs()
    {
        $this->db->select("id, positions, created_at");
        $this->db->from('job_board');
        $this->db->where('job_board.status', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result();
        }

        return $result;
    }
    function get_applyjob_data()
    {
        $user_id = $this->session->userdata('member_id');
        $this->db->select("*");
        $this->db->from('apply_job');
        $this->db->where('apply_job.user_id', $user_id);
        $query = $this->db->get();
        $results = $query->result();

        $applied_jobs = array();
        foreach ($results as $key => $value) {
            $jobdetails_id = $value->job_board_id;
            $this->db->select("*");
            $this->db->from('job_board');
            $this->db->where('job_board.id', $jobdetails_id);

            $applied_jobs[] = $this->db->get()->result();
        }
        //  echo "<pre>";
        // print_r($applied_jobs);
        // die;


        return $applied_jobs;
    }
}
