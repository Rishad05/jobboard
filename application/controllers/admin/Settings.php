<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends MY_Controller {
    function __construct()
        {
        parent::__construct();
        if (!$this->loggedIn) {
        redirect('admin/login');
        }
        if (!$this->Admin) {
        $this->session->set_flashdata('error', lang('access_denied'));
        redirect('admin');
        }
        $this->load->library('form_validation');
        $this->load->model('settings_model');
    }
    function index() {
        $this->form_validation->set_rules('site_name', lang('site_name'), 'required');
        $this->form_validation->set_rules('tel', lang('tel'), 'required');
        $this->form_validation->set_rules('rows_per_page', lang('rows_per_page'), 'required');
        $this->form_validation->set_rules('timeformat', lang('time_format'), 'required');
        //  $this->load->library('ecrypt');
        if ($this->form_validation->run() == true) {
            $data = array(
                'site_name' => DEMO ? 'Frontdesk' : $this->input->post('site_name'),
                'tel' => $this->input->post('tel'),
                'phone' => $this->input->post('phone'),
                'rows_per_page' => $this->input->post('rows_per_page'),
                'phone_number' => $this->input->post('phone_number'),
                'address' => $this->input->post('address'),
                'about_us' => $this->input->post('about_us'),
                'dateformat' => DEMO ? 'jS F Y' : $this->input->post('dateformat'),
                'timeformat' => DEMO ? 'h:i A' : $this->input->post('timeformat'),
                'default_email' => $this->input->post('default_email'),
                'linkedin' => $this->input->post('linkedin'),
                'facebook' => $this->input->post('facebook'),
                'twitter' => $this->input->post('twitter')
            ); 
            if (!empty($_FILES['userfile']['name'])) {
                // echo 'ok';
                $this->load->library('upload');
                $config['upload_path']   = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2500';
                $config['max_width']     = '1300';
                $config['max_height']    = '800';
                $config['overwrite']     = FALSE;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', $error);
                    redirect('admin/settings');
                }
                $photo = $this->upload->file_name;
            } 
            if (isset($photo)) {
                $data['logo'] = $photo;
            }
            if (!empty($_FILES['footerLogo']['name'])) {
              
                $this->load->library('upload');
                $config['upload_path']   = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2500';
                $config['max_width']     = '1300';
                $config['max_height']    = '800';
                $config['overwrite']     = FALSE;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('footerLogo')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', $error);
                    redirect('admin/settings');
                }
                $footerLogo = $this->upload->file_name;
            } 
            if (isset($footerLogo)) {
                $data['footer_logo'] = $footerLogo;
            }
        }
        if ($this->form_validation->run() == true && $this->settings_model->updateSetting($data)) {
            $this->session->set_flashdata('message', lang('setting_updated'));
            redirect('admin/settings');
        } else {
            $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
            $this->data['settings']   = $this->site->getSettings(); 
            $this->data['page_title'] = lang('settings');
            $bc  = array( array( 'link' => '#', 'page' => lang('settings') ) );
            $meta = array( 'page_title' => lang('settings'), 'bc' => $bc );
            $this->page_construct('settings/index', $this->data, $meta);
        }
    } 
    function backups() {
        if (DEMO) {
            $this->session->set_flashdata('error', lang('disabled_in_demo'));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
        }
        $this->data['files'] = glob('./files/backups/*.zip', GLOB_BRACE);
        $this->data['dbs']   = glob('./files/backups/*.txt', GLOB_BRACE);
        $bc   = array( array( 'link' => site_url('admin/settings'), 'page' => lang('settings') ),
        array('link' => '#','page' => lang('backups')));
        $meta = array('page_title' => lang('backups'),'bc' => $bc);
        $this->page_construct('settings/backups', $this->data, $meta);
    }
 function backup_database()
 {
  if (DEMO) {
   $this->session->set_flashdata('error', lang('disabled_in_demo'));
   redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
  }
  if (!$this->Admin) {
   $this->session->set_flashdata('error', lang('access_denied'));
   redirect("admin");
  }
  $this->load->dbutil();
  $prefs = array(
   'format' => 'txt',
   'filename' => 'spos_db_backup.sql'
  );
  $back  = $this->dbutil->backup($prefs);
  $backup =& $back;
  $db_name = 'db-backup-on-' . date("Y-m-d-H-i-s") . '.txt';
  $save    = './files/backups/' . $db_name;
  $this->load->helper('file');
  write_file($save, $backup);
  $this->session->set_flashdata('messgae', lang('db_saved'));
  redirect("admin/settings/backups");
 }
 function backup_files()
 {
  if (DEMO) {
   $this->session->set_flashdata('error', lang('disabled_in_demo'));
   redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
  }
  if (!$this->Admin) {
   $this->session->set_flashdata('error', lang('access_denied'));
   redirect("admin");
  }
  $name = 'file-backup-' . date("Y-m-d-H-i-s");
  $this->tec->zip("./", './files/backups/', $name);
  $this->session->set_flashdata('messgae', lang('backup_saved'));
  redirect("admin/settings/backups");
  exit();
 }
 function restore_database($dbfile)
 {
  if (DEMO) {
   $this->session->set_flashdata('error', lang('disabled_in_demo'));
   redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
  }
  if (!$this->Admin) {
   $this->session->set_flashdata('error', lang('access_denied'));
   redirect("admin");
  }
  $file = file_get_contents('./files/backups/' . $dbfile . '.txt');
  $this->db->conn_id->multi_query($file);
  $this->db->conn_id->close();
  redirect('logout/db');
 }
 function download_database($dbfile)
 {
  if (DEMO) {
   $this->session->set_flashdata('error', lang('disabled_in_demo'));
   redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
  }
  if (!$this->Admin) {
   $this->session->set_flashdata('error', lang('access_denied'));
   redirect("admin");
  }
  $this->load->library('zip');
  $this->zip->read_file('./files/backups/' . $dbfile . '.txt');
  $name = 'db_backup_' . date('Y_m_d_H_i_s') . '.zip';
  $this->zip->download($name);
  exit();
 }
 function download_backup($zipfile)
 {
  if (DEMO) {
   $this->session->set_flashdata('error', lang('disabled_in_demo'));
   redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
  }
  if (!$this->Admin) {
   $this->session->set_flashdata('error', lang('access_denied'));
   redirect("admin");
  }
  $this->load->helper('download');
  force_download('./files/backups/' . $zipfile . '.zip', NULL);
  exit();
 }
 function restore_backup($zipfile)
 {
  if (DEMO) {
   $this->session->set_flashdata('error', lang('disabled_in_demo'));
   redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
  }
  if (!$this->Admin) {
   $this->session->set_flashdata('error', lang('access_denied'));
   redirect("admin");
  }
  $file = './files/backups/' . $zipfile . '.zip';
  $this->tec->unzip($file, './');
  $this->session->set_flashdata('success', lang('files_restored'));
  redirect("admin/settings/backups");
  exit();
 }
 function delete_database($dbfile)
 {
  if (DEMO) {
   $this->session->set_flashdata('error', lang('disabled_in_demo'));
   redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
  }
  if (!$this->Admin) {
   $this->session->set_flashdata('error', lang('access_denied'));
   redirect("admin");
  }
  unlink('./files/backups/' . $dbfile . '.txt');
  $this->session->set_flashdata('messgae', lang('db_deleted'));
  redirect("admin/settings/backups");
 }
 function delete_backup($zipfile)
 {
  if (DEMO) {
   $this->session->set_flashdata('error', lang('disabled_in_demo'));
   redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
  }
  if (!$this->Admin) {
   $this->session->set_flashdata('error', lang('access_denied'));
   redirect("admin");
  }
  unlink('./files/backups/' . $zipfile . '.zip');
  $this->session->set_flashdata('messgae', lang('backup_deleted'));
  redirect("admin/settings/backups");
 }
}