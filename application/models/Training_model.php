<?php
Class Training_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    } 
	public function allTraining($limit, $start, $term=NULL) {   
        //$date = date('Y-m-d');
        $this->db->limit($limit, $start);        
        //$this->db->where('start_date >=', $date);
        $this->db->where('status', 1);
        $this->db->order_by('start_date','DESC');
        if($term){
            $this->db->where("(title LIKE '%" . $term . "%' OR description LIKE '%" . $term . "%' OR  concat(title, ' (', description, ')') LIKE '%" . $term . "%')");
        }        
        $q = $this->db->get('training_program');
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return false;
    }

    public function getSitebarTraining(){
        $this->db->select('id, slug, title');
        $this->db->order_by('start_date', 'DESC');
        $this->db->where('status', 1);
        $this->db->limit(10);
        $q = $this->db->get('training_program'); 
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return false;
    }
}