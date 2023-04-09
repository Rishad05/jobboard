<?php defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        define("DEMO", 0);
        $this->Settings = $this->site->getSettings();
        $this->lang->load('application', $this->Settings->language);
        //$this->Settings->pin_code = $this->Settings->pin_code ? md5($this->Settings->pin_code) : NULL;
        $this->theme = 'admin/' . $this->Settings->theme . '/views/';
        $this->data['assets'] = base_url() . '/themes/admin/default/assets/';
        $this->frontend_theme = 'frontend/' . $this->Settings->frontend_theme . '/views/';
        $this->data['frontend_assets'] =  base_url() . 'themes/frontend/' . $this->Settings->frontend_theme . '/assets/';
        $this->data['Settings'] = $this->Settings;

        $this->loggedIn = $this->tec->logged_in();
        $this->data['loggedIn'] = $this->loggedIn;
        $this->applicantLoggedIn = $this->tec->applicant_logged_in();
        $this->data['applicantLoggedIn'] = $this->applicantLoggedIn;
        $this->memberLoggedIn = $this->tec->member_logged_in();
        $this->data['memberLoggedIn'] = $this->memberLoggedIn;
        $this->Admin = $this->tec->in_group('admin') ? TRUE : NULL;
        $this->data['Admin'] = $this->Admin;
        $this->UserType = $this->tec->in_UserType();
        $this->data['UserType'] = $this->UserType;

        $this->m = strtolower($this->router->fetch_class());
        $this->v = strtolower($this->router->fetch_method());
        $this->data['m'] = $this->m;
        $this->data['v'] = $this->v;

        // $this->Settings->theme
    }

    function frontend_construct($page, $data = array(), $meta = array())
    {

        if (empty($meta)) {
            $meta['page_title'] = $data['page_title'];
        }
        $meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        $meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
        $meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
        $meta['ip_address'] = $this->input->ip_address();
        $meta['Settings'] = $data['Settings'];

        $meta['frontend_assets'] = $data['frontend_assets'];

        //if($this->loggedIn){  
        $this->load->view($this->frontend_theme . 'header', $meta);
        $this->load->view($this->frontend_theme . $page, $data);
        $this->load->view($this->frontend_theme . 'footer');
        //}else{
        //$this->load->view($this->frontend_theme.'coming_soon', $this->data, $meta);
        //}    
    }

    function page_construct($page, $data = array(), $meta = array())
    {
        if ($this->Admin == NULL) {
            redirect('member/dashboard/');
        }
        if ($this->memberLoggedIn) {
            redirect('member-dashboard');
        }
        if (empty($meta)) {
            $meta['page_title'] = $data['page_title'];
        }
        $meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        $meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
        $meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
        $meta['ip_address'] = $this->input->ip_address();
        $meta['Admin'] = $data['Admin'];
        $meta['UserType'] = $data['UserType'];
        $meta['loggedIn'] = $data['loggedIn'];
        $meta['Settings'] = $data['Settings'];
        $meta['assets'] = $data['assets'];
        $this->load->view($this->theme . 'header', $meta);
        $this->load->view($this->theme . $page, $data);
        $this->load->view($this->theme . 'footer');
    }
}