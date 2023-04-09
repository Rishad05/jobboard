<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends MY_Controller

{

  function __construct() {

        parent::__construct();

        if (!$this->loggedIn) {

            redirect('login');

        }

        

        $this->load->library('form_validation');

        $this->load->model('groups_model');

		

    }



    function index() {

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

        $this->data['page_title'] = 'Groups';

        $bc = array(array('link' => '#', 'page' => 'Groups'));

        $meta = array('page_title' => 'Groups', 'bc' => $bc);

        $this->page_construct('groups/index', $this->data, $meta);

    }

    function get_groups() {

		$user_data = $this->tec->getUser($this->session->userdata('user_id'));

        $employee_team_edit = $this->site->permission('employee_team_edit');
        $employee_team_delete =  $this->site->permission('employee_team_delete');
		

        $this->load->library('datatables');

        $this->datatables->select($this->db->dbprefix('user_groups') . ".user_groups_id as id , ".$this->db->dbprefix('user_groups') . ".group_name ,  ".$this->db->dbprefix('user_groups') . ".created_at ,".$this->db->dbprefix('company') . ".company_name as c_name  , ".$this->db->dbprefix('company') . ".company_id as c_id");

		$this->datatables->from('user_groups')

		->join('company', 'company.company_id=user_groups.company_id', 'left');


		if($this->UserType == 'admin' || $this->UserType == 'admin_user' ) {

		$this->datatables->add_column("Company Name", "<a onclick='popUpC($2)' href='javascript:;' title='View Details'>$1</a>", "c_name,c_id");

		}

		$this->fild = '';

		$popUp = '"'.site_url('admin/groups/details/$1').'"';

		$this->fild .=  "<a class='tip btn btn-primary btn-xs' onclick='popUp(".$popUp.",$1)' href='javascript:;' title='View Details'><i class='fa fa-file-text'></i></a> ";


        if($this->UserType == 'company_admin' ||  $this->UserType == 'admin' ) { 

		 $this->fild .= "<a href='" . site_url('admin/groups/permission/$1') . "' title='Permission' class='tip btn btn-info btn-xs'><i class='fa fa-edit'></i></a> " ;
        }

		

		if($employee_team_edit == 'active' && ($this->UserType == 'company_admin' || $this->UserType == 'company_user' ||  $this->UserType == 'admin' )) { 

         $this->fild .= "<a href='" . site_url('admin/groups/edit/$1') . "' title='Edit ' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> ";

		}


        if($employee_team_delete == 'active' && ($this->UserType == 'company_admin' || $this->UserType == 'company_user' ||  $this->UserType == 'admin' )) { 

         $this->fild .= " <a href='" . site_url('admin/groups/delete/$1') . "' onClick=\"return confirm('You are going to delete Group, please click ok to delete.')\" title='Delete Group' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";

        }
		
		if($this->UserType == 'admin'){
			
		 $this->fild .="<a href='" . site_url('admin/groups/delete/$1') . "' onClick=\"return confirm('You are going to delete Group, please click ok to delete.')\" title='Delete Group' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";
		}

	

        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>

	    ".$this->fild."

		</div></div>", "id,e_name,c_id");

		

        $this->datatables->unset_column('id')->unset_column('c_name')->unset_column('c_id');


		if($this->UserType == 'company_admin' ){
			$this->datatables->where( 'user_groups.company_id',$user_data[0]->company_id );

		}
		
		if($this->UserType == 'company_user'){
		  $this->datatables->where( 'user_groups.user_groups_id',$this->session->userdata('users_group') );
			  
		}

        echo $this->datatables->generate();



    }

	

	function details($id){

		

		$this->data['info'] = $this->groups_model->getGroupsByID($id);

		

		$this->data['title'] = 'Details';

        $this->load->view($this->theme.'groups/details', $this->data);

	

	}

	function permission($user_groups_id){


          if ($this->UserType != 'company_admin') {

            $this->session->set_flashdata('error', lang('access_denied'));

            redirect('admin');

        }



		$this->form_validation->set_rules('user_groups_id', lang("user_groups_id"), 'required');
        if ($this->form_validation->run() == true) {

            $data = array(  /*****  Requisition *****/    
                'user_groups_id' => $user_groups_id,
                'company_module' => $this->input->post('company_module'),
                'company_list' => $this->input->post('company_list'),
                'company_edit' => $this->input->post('company_edit'),
                'assessment_settings_module' => $this->input->post('assessment_settings_module'),
                'observation_settings_module' => $this->input->post('observation_settings_module'),
                'hazard_settings_module' => $this->input->post('hazard_settings_module'),
                'incident_settings_module' => $this->input->post('incident_settings_module'),
                'view_activity_module' => $this->input->post('view_activity_module'),
                'management_module' => $this->input->post('management_module'),
                'management_add' => $this->input->post('management_add'),
                'management_edit' => $this->input->post('management_edit'),
                'management_delete' => $this->input->post('management_delete'),
                'employee_module' => $this->input->post('employee_module'),
                'employee_delete' => $this->input->post('employee_delete'),
                'employee_add' => $this->input->post('employee_add'),
                'employee_edit' => $this->input->post('employee_edit'),
                'employee_team_module' => $this->input->post('employee_team_module'),
                'employee_team_add' => $this->input->post('employee_team_add'),
                'employee_team_edit' => $this->input->post('employee_team_edit'),
                'employee_team_delete' => $this->input->post('employee_team_delete'),
                'reports_module' => $this->input->post('reports_module'), 
                'assessment_questions' => $this->input->post('assessment_questions'), 
                'assessment_critical_risks' => $this->input->post('assessment_critical_risks'), 
                'assessment_consequence' => $this->input->post('assessment_consequence'), 
                'assessment_likelihood' => $this->input->post('assessment_likelihood'), 
                'assessment_rating' => $this->input->post('assessment_rating'), 
                'assessment_consequence_add' => $this->input->post('assessment_consequence_add'), 
                'assessment_likelihood_add' => $this->input->post('assessment_likelihood_add'), 
                'assessment_questions_edit' => $this->input->post('assessment_questions_edit'), 
                'assessment_critical_risks_edit' => $this->input->post('assessment_critical_risks_edit'), 
                'assessment_consequence_edit' => $this->input->post('assessment_consequence_edit'), 
                'assessment_likelihood_edit' => $this->input->post('assessment_likelihood_edit'), 
                'assessment_rating_edit' => $this->input->post('assessment_rating_edit'),
                'observation_questions' => $this->input->post('observation_questions'),
                'observation_questions_edit' => $this->input->post('observation_questions_edit'),
                'observation_critical_risks' => $this->input->post('observation_critical_risks'),
                'observation_critical_risks_edit' => $this->input->post('observation_critical_risks_edit'),
                'hazard_questions' => $this->input->post('hazard_questions'),
                'hazard_consequence' => $this->input->post('hazard_consequence'),
                'hazard_likelihood' => $this->input->post('hazard_likelihood'),
                'hazard_rating' => $this->input->post('hazard_rating'),
                'hazard_consequence_add' => $this->input->post('hazard_consequence_add'),
                'hazard_likelihood_add' => $this->input->post('hazard_likelihood_add'),
                'hazard_questions_edit' => $this->input->post('hazard_questions_edit'),
                'hazard_consequence_edit' => $this->input->post('hazard_consequence_edit'),
                'hazard_likelihood_edit' => $this->input->post('hazard_likelihood_edit'),
                'hazard_rating_edit' => $this->input->post('hazard_rating_edit'),
                'incident_questions' => $this->input->post('incident_questions'),
                'incident_actualconsequence' => $this->input->post('incident_actualconsequence'),
                'incident_consequence' => $this->input->post('incident_consequence'),
                'incident_likelihood' => $this->input->post('incident_likelihood'),
                'incident_rating' => $this->input->post('incident_rating'),
                'incident_actualconsequence_add' => $this->input->post('incident_actualconsequence_add'),
                'incident_consequence_add' => $this->input->post('incident_consequence_add'),
                'incident_likelihood_add' => $this->input->post('incident_likelihood_add'),
                'incident_questions_edit' => $this->input->post('incident_questions_edit'),
                'incident_actualconsequence_edit' => $this->input->post('incident_actualconsequence_edit'),
                'incident_consequence_edit' => $this->input->post('incident_consequence_edit'),
                'incident_likelihood_edit' => $this->input->post('incident_likelihood_edit'),
                'incident_rating_edit' => $this->input->post('incident_rating_edit'),
                'assessment_list' => $this->input->post('assessment_list'),
                'observation_list' => $this->input->post('observation_list'),
                'hazard_list' => $this->input->post('hazard_list'),
                'incident_list' => $this->input->post('incident_list'),

            ); 

        
        }        

        if($this->form_validation->run() == true){
        	$getPerm = $this->site->wheres_row('permissions', array('user_groups_id'=>$user_groups_id));
            if($getPerm != FALSE){
            	 $data['updated_by'] = $this->session->userdata('user_id') ;
            	 $data['updated_at'] = date('Y-m-d H:i:s') ;
                $this->site->updateData('permissions',$data, array('user_groups_id'=>$user_groups_id));
            }else{
            	 $data['created_by'] = $this->session->userdata('user_id') ;
            	 $data['created_at'] = date('Y-m-d H:i:s') ;
                $this->site->insert('permissions',$data);
                $this->session->set_flashdata('message','Permission successfully !');
            }

             redirect('admin/groups/permission/'.$user_groups_id);
        }


            $this->data['p']  =  $this->site->wheres_row('permissions', array('user_groups_id'=>$user_groups_id));

            $this->data['info']  =  $this->site->wheres_row('user_groups', array('user_groups_id'=>$user_groups_id));

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['page_title'] = 'Permission group';

            $this->data['user_groups_id'] =  $user_groups_id;

            $bc = array(array('link' => site_url('groups'), 'page' => 'Groups'), array('link' => '#', 'page' => 'Permission group'));

            $meta = array('page_title' => 'Permission', 'bc' => $bc);

            $this->page_construct('groups/permission', $this->data, $meta);


	}



    function add() {

        if ($this->site->permission('employee_team_add') == FALSE) {

            $this->session->set_flashdata('error', lang('access_denied'));

            redirect('admin');

        }



		$this->form_validation->set_rules('group_name', 'Group name ', 'trim|required|min_length[2]|max_length[50]');

	

				 if ($this->form_validation->run() == true) {
					 
					 $employee_ids = serialize($this->input->post('employee_ids'));

					  $data = array(

					   'company_id' => $this->session->userdata('company_id') ,

					   'group_name' =>  $this->input->post('group_name'),
					   
					   'employee_ids' => $employee_ids ,

					   'created_by' => $this->session->userdata('user_id'),

					   'created_at' => date('Y-m-d H:i:s')

					  );

					 $this->groups_model->addGroups($data); 

           			 $this->session->set_flashdata('message', 'Group successfully Added ');

					  redirect('admin/groups');

				}



            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['page_title'] = 'Add group';

            $bc = array(array('link' => site_url('groups'), 'page' => 'Groups'), array('link' => '#', 'page' => 'Add group'));

            $meta = array('page_title' => 'Group', 'bc' => $bc);
			
			$this->data['employees'] = $this->groups_model->getEmployees($this->session->userdata('company_id'));

            $this->page_construct('groups/add', $this->data, $meta);

        

    }



    function edit($id = NULL) {



        if ($this->site->permission('employee_team_edit') == FALSE) {

            $this->session->set_flashdata('error', lang('access_denied'));

            redirect('admin');

        }

	
		$this->form_validation->set_rules('group_name', 'Group name ', 'trim|required|min_length[2]|max_length[50]');

	

				 if ($this->form_validation->run() == true) {
					 
					 $employee_ids = serialize($this->input->post('employee_ids'));

					  $data = array(

					   'company_id' => $this->session->userdata('company_id') ,

					   'group_name' =>  $this->input->post('group_name'),
					   
					   'employee_ids' => $employee_ids ,

					   'created_by' => $this->session->userdata('user_id'),

					   'created_at' => date('Y-m-d H:i:s')

					  );

					 $this->groups_model->updateGroups($id, $data); 

           			 $this->session->set_flashdata('message', 'Group successfully updated ');

					  redirect('admin/groups');

				}



            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['page_title'] = 'Edit group';

            $bc = array(array('link' => site_url('groups'), 'page' => 'Groups'), array('link' => '#', 'page' => 'Edit group'));

            $meta = array('page_title' => 'Group', 'bc' => $bc);
			
			$this->data['group'] = $this->groups_model->getGroupsByID($id);
			
			$this->data['employees'] = $this->groups_model->getEmployees($this->session->userdata('company_id'));

            $this->page_construct('groups/edit', $this->data, $meta);




    }



    function delete($id = NULL ) {

        if ($this->site->permission('employee_team_delete') == FALSE) {

            $this->session->set_flashdata('error', lang('access_denied'));

            redirect('admin');

        }

        if(DEMO) {

            $this->session->set_flashdata('error', lang('disabled_in_demo'));

            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');

        }

        if (!$this->Admin && ($this->UserType != 'company_admin')) {

            $this->session->set_flashdata('error', lang('access_denied'));

            redirect('admin');

        }

        if ($this->input->get('id')) {

            $id = $this->input->get('id');

        }



        if ($this->groups_model->deleteGroups($id)) {

            $this->session->set_flashdata('message', 'Group deleted ');

            redirect('admin/groups');

        }

    }

	

	 protected function _prepare_ip($ip_address) {

        if ($this->db->platform() === 'postgre' || $this->db->platform() === 'sqlsrv' || $this->db->platform() === 'mssql' || $this->db->platform() === 'mysqli' || $this->db->platform() === 'mysql') {

            return $ip_address;

        } else {

            return inet_pton($ip_address);

        }

    }







}

