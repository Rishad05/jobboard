<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends CI_Model
{

    public function __construct()

    {

        parent::__construct();

    }

    public function getSettings()

    {

        $q = $this->db->get('settings');

        if ($q->num_rows() > 0) {

            return $q->row();

        }

        return FALSE;

    }

    public function getAllUsers()
    {
        $this->db->select("users.id as id, first_name, last_name, email 
            ," . $this->db->dbprefix('groups') . ".description as group,active");
        //$this->db->join('stores', 'users.store_id=stores.id','left');  
        $this->db->join('groups', 'users.group_id=groups.id','left');       
         
        //".$this->db->dbprefix('stores') . ".name as storename,   
        $this->db->group_by('users.id');
        //$this->db->where('users.group_id', 1);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getAllMembers($status, $payment_status, $group)
    { 
        $this->db->select("users.id as id, first_name, last_name,details_id, avatar, email, payment_status, phone, reg_number, created_on, varify, designation,order_by," . $this->db->dbprefix('groups') . ".description as group, active");
        //$this->db->join('stores', 'users.store_id=stores.id','left');  
        $this->db->join('groups', 'users.group_id=groups.id','left');       
         
        //".$this->db->dbprefix('stores') . ".name as storename,   
        $this->db->group_by('users.id');

         

        if($group && $group !='n'){
            $this->db->where('users.group_id',$group);
        }

        if($status && $status !='n'){
            if($status == 2){
                $status = 0;
            }
            $this->db->where('users.active',$status);
        }
        if($payment_status && $payment_status !='n'){
             if($payment_status == 2){
                $payment_status = 0;
            }
            $this->db->where('users.payment_status',$payment_status);
        }

         


        if(!$group || $group =='n'){
           $this->db->where_in('users.group_id', array(3,4,5,6)); 
        } 
        $q = $this->db->get('users');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return array();
    }


    public function getUser($id = NULL)

    {

        if (!$id) {

            $id = $this->session->userdata('user_id');

        }

        $q = $this->db->get_where('users', array('id' => $id), 1);

        if ($q->num_rows() > 0) {

            return $q->row();

        }

        return FALSE;

    }



    public function getUserGroup($user_id = NULL) {

        if($group_id = $this->getUserGroupID($user_id)) {

            $q = $this->db->get_where('groups', array('id' => $group_id), 1);

            if ($q->num_rows() > 0) {

                return $q->row();

            }

        }

        return FALSE;

    }



    public function getUserGroupID($user_id = NULL) {

        if($user = $this->getUser($user_id)) {

            return $user->group_id;

        }

        return FALSE;

    }


	

   public function users_group($id = NULL)
    {
		if($id != NULL){
        $q = $this->db->get_where('user_groups', array('company_id' => $id));
		}else{
		  $q = $this->db->get('user_groups');	
		}
		
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return FALSE;
    }
	
	
	  public function getGroupsByID($id)
    {
        $q = $this->db->get_where('user_groups', array('user_groups_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
	
	
   public function where_in($table,$fild,$data)
    {
        $this->db->select('*');
		$this->db->from($table);
		$this->db->where_in($fild,$data);
		$q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return FALSE;
    }
	
	public function wheres_row($table,$data)
    {
        $q = $this->db->get_where($table, $data, 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
	
	public function where_row($table,$fild,$data)
    {
        $q = $this->db->get_where($table, array($fild => $data), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
	
	public function where_rows($table,$fild,$data)
    {
        $q = $this->db->get_where($table, array($fild => $data));
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return FALSE;
    }
    public function wheres_rows($table,$data = NULL)
    {
        $q = $this->db->get_where($table, $data );
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return FALSE;
    }
	
	public function SQ($company_id, $order_list){
		
			$this->db->where('company_id',$company_id);
			$this->db->where('order_list',$order_list);
			$q = $this->db->get('screen_questions');
			if ($q->num_rows() > 0) {
				return $q->row();
			}else{
			$this->db->where('company_id',0);
			$this->db->where('order_list',$order_list);
			$q2 = $this->db->get('screen_questions');	
				 if ($q2->num_rows() > 0) {
					return $q2->row();
				 }	
			}
			 return FALSE ;
			
		}
		
	public function liklihoodORconsequence($table,$company_id){
		    $this->db->where('company_id',$company_id);
			$this->db->where('active',1);
			$q = $this->db->get($table);
			if ($q->num_rows() > 0) {
				return $q->result();
			}else{
			$this->db->where('company_id',0);
			$this->db->where('active',1);
			$q2 = $this->db->get($table);	
				 if ($q2->num_rows() > 0) {
					return $q2->result();
				 }	
			}
			 return FALSE ;
		
	}
	
	public function insert($table , $data){
		 if ($this->db->insert($table , $data)) {
            return $this->db->insert_id();
        }
    return false;
		
	}
   public function update($table , $data, $where_fild , $where_value){
		 if ($this->db->update($table, $data, array($where_fild => $where_value))) {
            return true;
        }
        return false;
 
		
    }
    
    public function updateData($table , $data, $where){
        $this->db->where($where);
        if ($this->db->update($table, $data)) {
           return true;
       }
       return false;

       
   }
   public function delete($table, $array){
    $this->db->where( $array);
    $this->db->delete($table);
    return true  ;
    }

   public function permission($row_name ){
      $users_group = $this->session->userdata('users_group') ;
      if($users_group){
            $this->db->select('permissions.'.$row_name);
            $this->db->where('permissions.user_groups_id', $users_group);
            $q2  =  $this->db->get('permissions');
            if($q2->num_rows() > 0) {
                  if($q2->row($row_name) ==  1){
                    return 'active' ;
                  }else{
                     return 'inactive' ;
                  }
            }else{ 
                return 'inactive' ;
            }  
      }else{
        return 'active' ;
      }      
   }

    function rightbar_event(){
        $this->db->where('featured',1);
        $this->db->limit(1);
        $q = $this->db->get('event');
        if($q->num_rows() > 0){
            return $q->row();
        }else{ 
            $this->db->limit(1);
            $this->db->order_by('event_id','DESC'); 
            $q2 = $this->db->get('event'); 
            return $q2->row();  
        }
         
    }
    function rightbar_previous_event()
    {
        $this->db->where('start_date <=', date('Y-m-d'));
        $this->db->order_by('start_date','DESC');
        //$this->db->limit(1);
        $q = $this->db->get('event');
        if($q->num_rows() > 0){
            return $q->result();
        }else{
            return array();
        } 
         
    } 

    function checksitebar($array)
    {
        $this->db->where($array);
        $q = $this->db->get('sidebar');
        if($q->num_rows() > 0){
            return $q->row()->status ;
        }else{
            return false;
        }
    }
  
	function member_group($id)
    {   
        if($id == 3){
            return 'Lifetime Member';
        }else if($id == 4){
            return 'General Member';
        }else if($id == 5){
            return 'Associate Member';
        }else if($id == 6){
            return 'Honorary Member';
        } 
    }
    function post_count($topic_id)
    {
        $this->db->where('topic_id', $topic_id);
        $q = $this->db->get('forum_post');
        if($q->num_rows() > 0){
            return $q->num_rows();
        }
        return 0;
    }
    function reply_count($post_id)
    {
        $this->db->where('post_id', $post_id);
        $q = $this->db->get('forum_replies');
        if($q->num_rows() > 0){
            return $q->num_rows();
        }
        return 0;
    }

    function user_total_post($id)
    {
        $this->db->where('created_by', $id);
        $q = $this->db->get('forum_post');
        if($q->num_rows() > 0){
            return $q->num_rows();
        }
        return 0;
    }

    function getMenues()
    {   
        $this->db->order_by('order_by', 'ASC');
        $this->db->where('type', 'main');
        $q = $this->db->get('menus');
        if($q->num_rows() > 0){

            $main = $q->result();

            $menus = array();
            foreach ($main as $key => $value) {
                $menus['main_menu'] = $value->name; 
                $menus['pageurl'] = $value->page_url; 
                $menus['page_slug'] = $value->slug; 
                
                
                $this->db->order_by('order_by', 'ASC');
                $this->db->where('type', 'sub');
                $this->db->where('parent_menu_id', $value->id);
                $q2 = $this->db->get('menus');

                $menus['sub_menus'] = $q2->result();
                $returnVal[] =  $menus;
            }

            return $returnVal;
        }
    }

    function getLastRegistertMember($group_id=NULL)
    {
        $this->db->select('id, reg_number, group_id');
        $this->db->where('group_id', $group_id);
        $this->db->order_by('id', 'DESC');
        $q = $this->db->get('users');
        if($q->num_rows() > 0){
            return $q->row();
        }
        return array();
    }

    function shareData($type, $id)
    { 
        if($type == 'news'){
            $this->db->select('id, title, image'); 
            $this->db->where('id', $id); 
            $q = $this->db->get('news');
            if($q->num_rows() > 0){
                return $q->row();
            }
            return FALSE;
        }else if($type == 'event'){
            $this->db->select('event_id, title, event_img'); 
            $this->db->where('event_id', $id); 
            $q = $this->db->get('event');
            if($q->num_rows() > 0){
                return $q->row();
            } 
            return FALSE;
        }else if($type == 'training'){
            $this->db->select('id, title, image'); 
            $this->db->where('id', $id); 
            $q = $this->db->get('training_program');
            if($q->num_rows() > 0){
                return $q->row();
            } 
            return FALSE;
        } 
        
    }

    function featured_video()
    {
        $this->db->where('featured_status', 1);
        $this->db->limit(1);
        $q = $this->db->get('videos');
        if($q->num_rows() > 0){
            return $q->row();
        } 
        return FALSE;
    }
    public function whereIn($table,$fild,$data=NULL) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where_in($fild,$data);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return FALSE;
    }

    public function wheresRow($table,$data){
        $q = $this->db->get_where($table, $data, 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
    
    public function whereRow($table,$fild,$data){
        $q = $this->db->get_where($table, array($fild => $data), 1);        
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
    /* ->where("title LIKE '%".$keyword."%' ORDER BY (title LIKE '".$keyword."%') DESC, title ASC ") */
    public function whereRows($table,$fild,$data,$order=NULL,$orderfield=NULL){
        if($order){
            $this->db->order_by('order_by',$order);
        }else if($orderfield){
            $this->db->order_by($orderfield,"ASC");
        }else{
            $dada = $this->db->list_fields($table);
            $this->db->order_by($dada[0],"DESC"); 
        }
        $q = $this->db->get_where($table, array($fild => $data));
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return FALSE;
    } 
    public function wheresRows($table,$data,$order=NULL){ 
        if($order){
            $this->db->order_by('order_by',$order);
        }else{
            $fild = $this->db->list_fields($table);
            $this->db->order_by($fild[0],"DESC");
        }
        $q = $this->db->get_where($table, $data);
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return FALSE;
    }   
    public function selectQuery($table, $limit=NULL, $order=NULL){
        if($order){
            $this->db->order_by('order_by',$order);
        }else{
            $fild = $this->db->list_fields($table);
            $this->db->order_by($fild[0],"ASC");
        }
        if($limit){$this->db->limit($limit);}
       $q = $this->db->get($table);
        if($q->num_rows() > 0) 
        return $q->result();
        else return false;
    }
    public function insertQuery($table,$data= array()){   
        if($this->db->insert($table,$data)) 
        return $this->db->insert_id();
        else return false;
    }
    public function insertBatch($table,$data = array()) {
        if ($this->db->insert_batch($table, $data)) {
            return true;
        }
        return false;
    } 
    public function updateQuery($table,$data,$array){ 
        if($this->db->update($table, $data, $array))
        return true;
        else return false;
    }
    public function deleteQuery($table,$data){ 
        if($this->db->delete($table,$data))
        return true;
        else return false;
    } 
    public function count($table,$data){
        $q = $this->db->get_where($table, $data);
        if ($q->num_rows() > 0) {
            return $q->num_rows();
        }
        return 0;
    }
    public function fetch($table, $limit, $start,$order=NULL) {
        $field = $this->db->list_fields($table);  
        $this->db->limit($limit, $start);
        if($order){
            $this->db->order_by('order_by',$order); 
        }else{
            $this->db->order_by($field[0],"DESC"); 
        }
              
        $this->db->where('status',1);         
        $q = $this->db->get($table);
        if ($q->num_rows() > 0) { 
            return $q->result();;
        }
        return false;
    }
}

