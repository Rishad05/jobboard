<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Groups_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
  public function getGroupsByID($id)
    {
        $q = $this->db->get_where('user_groups', array('user_groups_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
    public function addGroups($data) {
		
        if ($this->db->insert('user_groups', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }
    public function updateGroups($id, $data = NULL) {
        if ($this->db->update('user_groups', $data, array('user_groups_id' => $id))) {
            return true;
        }
        return false;
    }
    public function deleteGroups($id) {
        if ($this->db->delete('user_groups', array('user_groups_id' => $id))) {
            return true;
        }
        return FALSE;
    }
	  public function getEmployees($id)
    {
        $q = $this->db->get_where('employee', array('company_id' => $id));
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return FALSE;
    }

    function get_members()
    {
        $this->db->where_in('group_id', array(3,4,5,6));
        $q = $this->db->get('users');

        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }

    function getMemberInfo($id)
    {
         
        $this->db->select('users.*, users.id as user_id, user_details.*, user_details.id as detailsId, user_details.designation as dr_designation, user_details.avatar as p_photo');
        $this->db->join('user_details', 'users.details_id=user_details.id');
        $this->db->where('users.id', $id);
        $q = $this->db->get('users');
        if($q->num_rows() > 0){
            return $q->row();
        }
        return FALSE;
    }

    function chekEmail($email=NULL)
    {

        $this->db->where('email', $email);
        $q = $this->db->get('users');
        if($q->num_rows() > 0){ 
            return $q->row();
        }
        return FALSE;
    }



}

