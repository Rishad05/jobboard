<?php defined('BASEPATH') or exit('No direct script access allowed');

class PersonalInfo_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//add_personal_info
	public function addPersonalInfo($data)
	{
		if ($this->db->insert('personal_info', $data)) {
			return $this->db->insert_id();
		}
		return false;
	}
	/* public function singleApplicantInfo($id)
	{
		$this->db->select('personal_info.*');
		$this->db->where('personal_info.user_id', $id);
		$this->db->limit(1);
		
		$this->db->join('acadamic_info', 'personal_info.user_id = acadamic_info.user_id', 'left');
		$this->db->join('employment_history', 'personal_info.user_id = employment_history.user_id', 'left');
		$this->db->join('professional_qualification', 'personal_info.user_id = professional_qualification.user_id', 'left');
		$q = $this->db->get('personal_info');
		// echo $str = $this->db->last_query();
		die;
		if ($q->num_rows() > 0) {
			return $q->row();
		}
		return array();
	} */
}
