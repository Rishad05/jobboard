<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function homeServices(){ 
        $this->db->where('status', 1); 
        $this->db->order_by('order_by','ASC');   
        $q = $this->db->get('services');
        if($q->num_rows() > 0){
            return $q->result();
        } 
        return array();
    } 
    public function trainings(){
        //$date = date('Y-m-d');
        //$this->db->where('start_date >=', $date);
        $this->db->where('status', 1);
        //$this->db->where('home_page', 1);   
        //$this->db->limit(4);
        $this->db->order_by('start_date','DESC');   
        $q = $this->db->get('training_program');
        if($q->num_rows() > 1){
            return $q->result();
        } 
        /*else {  
            $this->db->where('status', 1); 
            $this->db->order_by('start_date','DESC');   
            $q = $this->db->get('training_program');
            if($q->num_rows() > 0){
                return $q->result();
            }
        }*/
        return array();
    }
    public function eventCalender($year, $month){   
        $myQuery = "SELECT DATE_FORMAT( start_date,  '%e' ) AS start_date, title, slug FROM (".
        $this->db->dbprefix('training_program').")
        WHERE DATE_FORMAT( start_date, '%Y-%m' ) =  '{$year}-{$month}' AND status =1 GROUP BY DATE_FORMAT( start_date, '%e' )";
        $q = $this->db->query($myQuery, false);
        if($q->num_rows() > 0){
            return $q->result();
        } 
        return array();
    }

    public function recent_news(){
        $this->db->order_by('news.created_at', 'DESC');
        $this->db->where('trash_status', 0);
        $this->db->where('status', 1);
        $this->db->where('home_page', 1);
        $this->db->limit(2);
        $q = $this->db->get('news');
        if($q->num_rows() > 0){
           return $q->result();
        }else{
            return array();
        }
    }

    function getTickerValues() {
        $this->db->select('id, title, created_at, slug');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(10);
        $this->db->where('status', 1);
        $this->db->where('trash_status', 0);
        $q = $this->db->get('news');
        if($q->num_rows() > 0){
            return $q->result();
        } 
        return array();
    }

    function getJobsForTicker()
    {
        $today = date('Y-m-d');
        $this->db->select('id, positions, last_date');
        $this->db->where('last_date >=', $today );
        $this->db->where('job_board.status', 1);
        $this->db->order_by('last_date','asc');
        $q = $this->db->get('job_board');
        if($q->num_rows() > 0){
            return $q->result();
        }
    }

    public function jobs(){
        $date = date('Y-m-d');
        $this->db->select('job_board.*, company.name , job_category.name');
        $this->db->where('last_date >=', $date);
        $this->db->where('job_board.status', 1);
        $this->db->where('home_page', 1);
        //$this->db->limit(3);
        $this->db->order_by('last_date','DESC');   
        $this->db->join('company','company.id=job_board.companey_id','left');
        $this->db->join('job_category','job_category.id=job_board.job_category_id','left');
        $q = $this->db->get('job_board');
        if($q->num_rows() > 0){
            return $q->result();
        } 
        return array();
    }
    public function allJobs(){
        $date = date('Y-m-d');
        $this->db->where('last_date >=', $date);
        $this->db->where('status', 1);
        $this->db->limit(3);
        $this->db->order_by('last_date','DESC');          
        $q = $this->db->get('job_board');
        if($q->num_rows() > 0){
            return $q->result();
        } 
        return array();
    }  
     
    public function getGroupsByID($id)
    {
        $q = $this->db->get_where('user_groups', array('user_groups_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    } 
    public function count_image($gid){ 
        if($gid == 0){
            $gid = NULL;
        }
        $this->db->where('album_id', $gid); 
        $q = $this->db->get('gallery');
        if ($q->num_rows() > 0) {

                return $q->num_rows();

            }

            return FALSE;
    } 

    public function getGeneralMember($limit, $offset){

        $query = $this->db->query("select bos_users.*, bos_user_details.designation AS dr_designation from bos_users LEFT JOIN bos_user_details ON bos_users.details_id=bos_user_details.id WHERE bos_users.group_id=4 AND bos_users.active=1 order by case when order_by is null then 1 else 0 end, order_by LIMIT {$limit} OFFSET {$offset}"); 
        
        
        //$query = $this->db->query("select * from bos_users WHERE group_id=4 AND active=1 order by case when order_by is null then 1 else 0 end,  order_by LIMIT {$limit} OFFSET {$offset} "); 
       

       if ($query->num_rows() > 0) {

            return $query->result();

        }

        return array();
    }


    public function count_general_member(){ 
         
        $this->db->where('group_id', 4);
        $this->db->where('active', 1);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0) {

                return $q->num_rows();

            }

            return FALSE;
    }



    public function getLifetimeMember($limit, $offset){
 

        $query = $this->db->query("select bos_users.*, bos_user_details.designation AS dr_designation from bos_users LEFT JOIN bos_user_details ON bos_users.details_id=bos_user_details.id WHERE bos_users.group_id=3 AND bos_users.active=1 order by case when order_by is null then 1 else 0 end, order_by LIMIT {$limit} OFFSET {$offset}"); 
        
        //$query = $this->db->query("select * from bos_users WHERE group_id=3 AND active=1 order by case when order_by is null then 1 else 0 end,  order_by LIMIT {$limit} OFFSET {$offset} "); 
       

       if ($query->num_rows() > 0) {

            return $query->result();

        }

        return array();
          
         
    }

    public function count_lifetime_member(){ 
         
        $this->db->where('group_id', 3);
        $this->db->where('active', 1);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0) {

                return $q->num_rows();

            }

            return FALSE;
    } 

    public function drSearchAutocomplete($type, $keyword){
        $keyword = base64_decode($keyword);
        //echo $keyword;
        if($type == 'general'){   
            $this->db->where("group_id=4 AND (first_name LIKE '%".$keyword."%' OR last_name LIKE '%".$keyword."%' OR designation LIKE '%".$keyword."%') ORDER BY (first_name LIKE '".$keyword."%') DESC, first_name ASC ");  
            $this->db->limit(20);
           $q = $this->db->get('users');
           return $q->result();
        }else{
            $this->db->where("group_id=3 AND (first_name LIKE '%".$keyword."%' OR last_name LIKE '%".$keyword."%' OR designation LIKE '%".$keyword."%') ORDER BY (first_name LIKE '".$keyword."%') DESC, first_name ASC ");  
            $this->db->limit(20);
           $q = $this->db->get('users');
           return $q->result();
        }
    }

    function getAlbum(){
        $this->db->order_by('created_at', 'DESC');
        $q = $this->db->get('gallery_album');
        if($q->num_rows() > 0){
            return $q->result();
        }else{
            return array();
        }
    }

    function getAlbumImage($limit, $offset, $gid){
        if($gid == 0){
            $gid = NULL;
        }
        $this->db->where('album_id', $gid); 
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset); 
        $q = $this->db->get('gallery');
        if($q->num_rows() > 0){
            return $q->result();
        }else{
            return array();
        }
    } 
    function membearInfo($id)
    {
        $this->db->select('user_details.*, users.group_id, users.reg_number');
        $this->db->join('users', 'users.details_id=user_details.id');
        $q = $this->db->where('users.id', $id);
        $q = $this->db->get('user_details');
        if($q->num_rows() > 0){
            return $q->row();
        }
        return FALSE;
    } 


    function membearProfile($id)
    {
         
        $this->db->select('users.*, users.id as user_id, user_details.*, user_details.id as detailsId, user_details.designation as dr_designation, user_details.avatar as p_photo');
        $this->db->join('user_details', 'users.details_id=user_details.id', 'left');
        $this->db->where('users.id', $id);
        $q = $this->db->get('users');
        if($q->num_rows() > 0){
            return $q->row();
        }
        return FALSE;
    }


    public function user($id = NULL) {


        $id || $id = $this->session->userdata('member_id');

        $this->db->limit(1);

        $this->db->where('id', $id);

        $q = $this->db->get('users');

        if($q->num_rows() > 0){

            return $q->row();
        }

        return FALSE;
         

    } 
}