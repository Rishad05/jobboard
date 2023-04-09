<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    function __construct() {

        parent::__construct();
        if (! $this->loggedIn) {

           redirect('login');

        }

    }
    function index() {

        $bc = array(array('link' => '#', 'page' => lang('dashboard')));

        $meta = array('page_title' => lang('dashboard'), 'bc' => $bc);

        $this->page_construct('dashboard', $this->data, $meta);

    }

}