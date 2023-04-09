<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_managment extends MY_Controller

{

  function __construct() {

        parent::__construct();

        if (!$this->loggedIn) {

            redirect('login');

        } 
        $this->load->library('form_validation');
        $this->load->library('upload'); 

    } 
    function index() {  
        $id = $this->input->get('id') ?  $this->input->get('id') : NULL ;
         
        $this->data['album'] = $this->site->wheres_rows('gallery_album',NULL);

        $this->db->where('album_id',$id); 
        $this->db->order_by('id','DESC'); 
        $q = $this->db->get('gallery_file');
        if ($q->num_rows() > 0) {
            $this->data['data'] = $q->result(); 
        }else{
            $this->data['data'] = array();
        } 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['page_title'] = 'Gallery Manager'; 
        $bc = array(array('link' => '#', 'page' => 'Gallery')); 
        $meta = array('page_title' => 'Gallery Manager', 'bc' => $bc); 
        $this->page_construct('gallery', $this->data, $meta); 
    } 
    
    public function add($album_id=NULL)
    {

        if($_FILES['userfile']['size'] > 0) { 

            $files = $_FILES;    
            $count = count($_FILES['userfile']['name']); 
            for($i=0; $i<$count; $i++)
            {     
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i]; 
                 
                $config['upload_path'] = 'uploads/gallery/';
                $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG'; 
                //$config['remove_spaces'] = true;
                $config['max_size'] = '3000';
                $config['min_height'] = '100'; 
                $config['min_width'] = '100'; 
                $config['max_width'] = '1600'; 
                $config['max_height'] = '1600';
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;   
                $this->upload->initialize($config); 
                if (!$this->upload->do_upload()) { 
                    $error = $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $error); 
                    die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('admin/gallery_managment/'.$album_id)) . "'; }, 10);</script>"); 
                }    
                $file = $this->upload->file_name; 
                $file_location = base_url().'uploads/gallery/'.$file;
                $arr = array( 
                        'file' => $file,
                        'file_location' => $file_location,
                    );
                if($album_id !=NULL){
                    $arr['album_id'] = $album_id;
                }
               $this->site->insert('gallery_file', $arr);
            } 
            $this->session->set_flashdata('message', 'Successfully added photo'); 
            redirect("admin/gallery_managment?id=".$album_id); 
        }else{
            $this->session->set_flashdata('error', 'Select Image'); 
            redirect("admin/gallery_managment?id=".$album_id); 
        }

       
    }

   public function add_album()
    { 
        $this->load->library('parser');
        $this->form_validation->set_rules('title', lang("title"), 'trim|required');
        if ($this->form_validation->run() == true) {
            $filename_new = '';
            if($_FILES['userfile']['size'] > 0) { 
                $this->load->library('upload'); 
                $config['upload_path'] = 'uploads/gallery/thumb/'; 
                $config['allowed_types'] = 'jpg|png|jpeg'; 
                $config['max_size'] = '5000'; 
                $config['max_width'] = '3200'; 
                $config['max_height'] = '2100'; 
                $config['overwrite'] = FALSE; 
                $config['encrypt_name'] = TRUE; 
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload()) { 
                    $error = $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $error); 
                    die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('admin/driver/add')) . "'; }, 10);</script>"); 
                      }else{
                        //Image resize
                        $config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                        $config1['new_image'] =  'uploads/gallery/thumb/'.$filename_new;
                        $config1['maintain_ratio'] = FALSE;
                        $config1['width'] = 250;
                        $config1['height'] = 250; 

                        $this->load->library('image_lib', $config1); 
                        if ( ! $this->image_lib->resize()){ 
                             $error = $this->image_lib->display_errors();
                            $this->session->set_flashdata('error', $error); 
                            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('user/signup')) . "'; }, 10);</script>");
                        }
                    }
                $photo = $this->upload->file_name ;
            }else{$photo='';}
            $data = array( 
                'thumb_image' => $photo ,
                'title' => $this->input->post('title'),  
                'created_at' => date('Y-m-d H:i:s')
                );   
            if ($this->form_validation->run() == true && $this->site->insert('gallery_album', $data)) { 
            $this->session->set_flashdata('message', 'Successfully added album'); 
            redirect("admin/gallery_managment/"); 
            }  
        }
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['title'] = 'Add Album'; 
        $this->load->view($this->theme.'album_add', $this->data);
    }
    function videos()
    {
       
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['page_title'] = 'Video Managmer'; 
        $bc = array(array('link' => '#', 'page' => 'Video')); 
        $meta = array('page_title' => 'Video Managmer', 'bc' => $bc); 
        $this->page_construct('pages/videos', $this->data, $meta); 
    }
    function  get_video(){  
  
        $this->load->library('datatables'); 

        $this->datatables->select($this->db->dbprefix('videos') . ".id as id ,  
            ".$this->db->dbprefix('videos') . ".title ,   
            ".$this->db->dbprefix('videos') . ".order_by,  
            ".$this->db->dbprefix('videos') . ".created_at,   
             "); 

        $this->datatables->from('videos')  ;

        $this->fild = '';   

        if($this->UserType == 'admin'){   

                $this->fild .="<a target='_blank' href='" . site_url('viewvideo') . "'  title='Details ' class='tip btn btn-warning btn-xs'><i class='fa fa-list'></i></a>";

                $this->fild .="<a href='" . site_url('admin/gallery_managment/editvedio/$1') . "'  title='Update' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>"; 

                $this->fild .="<a href='" . site_url('admin/gallery_managment/deletevideo/$1') . "' onClick=\"return confirm('You are going to delete this video, please click ok add to trash.')\" title='Add to trash' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";  
    

        } 

        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'> 

        ".$this->fild." 

        </div></div>", "id");   
         



        $this->datatables->unset_column('id'); 

        echo $this->datatables->generate();

    }
    function addvideo()
    {

        $this->form_validation->set_rules('title', lang("title"), 'trim|required');
        $this->form_validation->set_rules('embed_video', lang("video link"), 'trim|required');
        if ($this->form_validation->run() == true) {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'embed_video' => $this->input->post('embed_video'),
                'order_by' => $this->input->post('order_by'),
                'created_at' => date('Y-m-d H:i:s'),
            );
            if($id=$this->site->insert('videos', $data)){

                if($this->input->post('featured_status')){
                     
                    $this->db->update('videos', array('featured_status'=>'0'));

                    $this->site->updateData('videos', array('featured_status'=>'1'), array('id'=>$id));
                     
                }

                $this->session->set_flashdata('message', 'Successfully! Added'); 
                redirect("admin/gallery_managment/videos"); 
            }
        }
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['page_title'] = 'Add Video'; 
        $bc = array(array('link' => '#', 'page' => 'Video')); 
        $meta = array('page_title' => 'Add Video', 'bc' => $bc); 
        $this->page_construct('pages/addvideo', $this->data, $meta); 
    }
    function editvedio($id=NULL)
    {
        if($id==NULL){
            redirect('admin/gallery_managment/videos');
        }
        $this->form_validation->set_rules('title', lang("title"), 'trim|required');
        $this->form_validation->set_rules('embed_video', lang("video link"), 'trim|required');
        if ($this->form_validation->run() == true) {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'embed_video' => $this->input->post('embed_video'),
                'order_by' => $this->input->post('order_by'), 
            );
            if($this->site->updateData('videos', $data, array('id'=>$id))){

                if($this->input->post('featured_status')){
                    $this->db->update('videos', array('featured_status'=>'0'));

                    $this->site->updateData('videos', array('featured_status'=>'1'), array('id'=>$id));
                }
                $this->session->set_flashdata('message', 'Successfully! Updated'); 
                redirect("admin/gallery_managment/videos"); 
            }
        }
        $this->data['info'] = $this->site->wheres_row('videos', array('id'=>$id));
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['page_title'] = 'Update Video'; 
        $bc = array(array('link' => '#', 'page' => 'Update')); 
        $meta = array('page_title' => 'Update Video', 'bc' => $bc); 
        $this->page_construct('pages/editvedio', $this->data, $meta); 
    }
    public function deletevideo($id)
    { 
        if(DEMO) { 
            $this->session->set_flashdata('error', lang('disabled_in_demo')); 
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome'); 
        }  
         
        if ($this->site->delete('videos', array('id'=>$id))) {    
            $this->session->set_flashdata('message', 'Successfully! Deleted '); 
            redirect('admin/gallery_managment/videos');

        }
    }
    public function delete($id)
    { 
        if(DEMO) { 
            $this->session->set_flashdata('error', lang('disabled_in_demo')); 
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome'); 
        }  
        $info = $this->site->wheres_row('gallery_file', array('id'=>$id));
         
        unlink('uploads/gallery/'.$info->file);  
        if ($this->site->delete('gallery_file', array('id'=>$id))) {    
            $this->session->set_flashdata('message', 'Photo Deleted '); 
            redirect('admin/gallery_managment/');

        }
    }
    public function albumdelete($id)
    {

        if(DEMO) { 
            $this->session->set_flashdata('error', lang('disabled_in_demo')); 
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome'); 
        }  
        $info = $this->site->wheres_rows('gallery_file', array('album_id'=>$id));
        if($info){
           foreach ($info as $key => $value) {
                $this->site->delete('gallery_file', array('album_id'=>$id));
                unlink('uploads/gallery/'.$value->file); 
            }  
        }
       
        if ($this->site->delete('gallery_album', array('id'=>$id))) {    
            $this->session->set_flashdata('message', 'Album Deleted '); 
            redirect('admin/gallery_managment/');

        }
    }
}