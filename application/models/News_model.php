<?php
Class News_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    } 
	public function allNews($limit, $start,$term=NULL) {
        $dada = $this->db->list_fields('news');  
        $this->db->limit($limit, $start);
        $this->db->order_by($dada[0],"DESC");  
        $this->db->where('trash_status', 0);
        $this->db->where('status', 1); 
        if($term){
            $this->db->where("(title LIKE '%" . $term . "%' OR description LIKE '%" . $term . "%' OR  concat(title, ' (', description, ')') LIKE '%" . $term . "%')");
        }        
        $q = $this->db->get('news');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function categoryWiseNews($limit, $start, $term=NULL, $cat_id) {
        $dada = $this->db->list_fields('news');  
        $this->db->limit($limit, $start);
        $this->db->order_by($dada[0],"DESC");  
        $this->db->where('trash_status', 0);
        $this->db->where('status', 1); 
        $this->db->where('category_id', $cat_id); 
        if($term){
            $this->db->where("(title LIKE '%" . $term . "%' OR description LIKE '%" . $term . "%' OR  concat(title, ' (', description, ')') LIKE '%" . $term . "%')");
        }        
        $q = $this->db->get('news');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function newsForClander(){ 
        $this->db->select("id, title, created_at, slug"); 
        $this->db->where('trash_status', 0);
        $this->db->where('status', 1); 
        $this->db->from('news');       
        $query = $this->db->get(); 
        if($query->num_rows() > 0){
             $result = $query->result();
        }else{
            $result = array();
        }
        return $result;
    }
}