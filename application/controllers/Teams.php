<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends MY_Controller { 
    function __construct() {
        parent::__construct(); 
        $this->load->library('form_validation');  
        $this->load->helper('inflector');
        $this->load->helper('array');
        $this->load->helper('string');
        $this->load->helper('directory');
        $this->load->library('user_agent');
    }
    public function index(){
        $this->data['page_title'] = humanize('about_us');
        // $this->data['teams1'] = $this->db->select('*')->from('tec_teams')->where('status','1')->where('group_id','1')->order_by('order_by','asc')->get()->result();

        // $this->data['teams2'] = $this->db->select('*')->from('tec_teams')->where('status','1')->where('group_id','2')->order_by('order_by','asc')->get()->result();

        $groupList = $this->db->select('*')->from('tec_group')->order_by('order_by','asc')->get()->result();
        
        
        $teams = [];
        foreach($groupList as $group){
            $teams[$group->id] = $this->db->select('*')->from('tec_teams')->where('status','1')->where('group_id',$group->id)->order_by('order_by','asc')->get()->result();
        }

        $this->data['teams'] =  $teams;

         // echo "<pre>"; print_r($this->data['teams']);exit;

        
        $groupArr = []; 
        foreach($groupList as $group){
            $groupArr[$group->id] = $group->group_name;
        }

        

         $this->data['groupArr'] = $groupList;

        // $this->data['teams'] = $this->site->whereRows('teams','status',1,'ASC');
        $bc = array(array('link' => '#', 'page' => humanize('about_us')));
        $meta = array('page_title' => humanize('about_us'), 'bc' => $bc);         
        $this->frontend_construct('about/teams', $this->data, $meta);
    }
    public function details($slug){ 
        $mkurl = str_replace('_',' ',$slug); 
        $teams = $this->site->whereRow('teams','name',$mkurl);
        $this->data['teams'] = $teams;
        $bc = array(array('link' => '#', 'page' => humanize($teams->name)));
        $meta = array('page_title' => humanize($teams->name), 'bc' => $bc);         
        $this->frontend_construct('about/teams_details', $this->data, $meta);
    }
}
