<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Slider extends MY_Controller



{ 

  function __construct() { 

        parent::__construct(); 

        if (!$this->loggedIn) { 

            redirect('login'); 

        } 

        $this->load->library('form_validation'); 
        $this->load->library('image_lib');

    }  
    function index() {   
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));  
        $this->data['page_title'] = 'Slider List'; 
        $bc = array(array('link' => '#', 'page' => 'Slider List')); 
        $meta = array('page_title' => 'Slider List', 'bc' => $bc); 
        $this->page_construct('slider/index', $this->data, $meta); 
    }



    function  get_slider(){   
        $this->load->library('datatables'); 
        $this->datatables->select($this->db->dbprefix('slider') . ".id as id, 
            ".$this->db->dbprefix('slider') . ".image ,   
            ".$this->db->dbprefix('slider') . ".title , 
            ".$this->db->dbprefix('slider') . ".order_by ,  
            ".$this->db->dbprefix('slider') . ".link ,  
            ".$this->db->dbprefix('slider') . ".description, 
            ".$this->db->dbprefix('slider') . ".created_at"); 

        $this->datatables->from('slider');   
        $this->db->order_by('order_by','ASC');
        $this->fild = '';   

        if($this->UserType == 'admin'){   

            $this->fild .="<a href='" . site_url('admin/slider/edit/$1') . "'  title='Update' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>"; 

            $this->fild .="<a href='" . site_url('admin/slider/delete/$1') . "' onClick=\"return confirm('You are going to delete this slider, please click ok delete.')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";     

        } 

        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'> 

        ".$this->fild." 

        </div></div>", "id");  

        $this->datatables->unset_column('id'); 

        echo $this->datatables->generate();

    }
    public function add()

    { 
        
        $this->form_validation->set_rules('title', lang("title"), 'trim|required'); 

        if ($this->form_validation->run() == true) {  
 
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->library('upload'); 

                $config['upload_path'] = 'uploads/slider/';  
                $config['allowed_types'] = 'jpg|png|jpeg';   
                $config['overwrite'] = FALSE; 
                $config['encrypt_name'] = TRUE; 
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload()) { 
                    $error = $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                } 
                $photo = $this->upload->file_name ;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/slider/' . $photo;
                $config['new_image'] = 'uploads/slider/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '1280';
                $config['height'] = '700';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                } 

            }else{$photo='';}

            $data = array( 
                'image'=> $photo,
                'order_by' => $this->input->post('order_by'),
                'link' => $this->input->post('link'),
                'title' => $this->input->post('title'),  
                'description' => $this->input->post('description'),  
                'created_by' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s')
                );   

            if ($this->form_validation->run() == true && $this->site->insert('slider', $data)) { 
            $this->session->set_flashdata('message', 'Successfully added slider'); 
            redirect("admin/slider/");   
            }  

        }

       $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 

        $this->data['page_title'] = 'Add Slider'; 

        $bc = array(array('link' => '#', 'page' => 'Add Slider')); 

        $meta = array('page_title' => 'Add Slider', 'bc' => $bc); 

        $this->page_construct('slider/add', $this->data, $meta); 

    }

     public function edit($id)

    {



        $this->form_validation->set_rules('title', lang("title"), 'trim|required'); 

        if ($this->form_validation->run() == true) {   
            if (!empty($_FILES['userfile']['name'])) {

                $this->load->library('upload'); 
                $config['upload_path'] = 'uploads/slider/'; 
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['overwrite'] = FALSE; 
                $config['encrypt_name'] = TRUE; 
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload()) { 
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                      }
                $photo = $this->upload->file_name ; 
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/slider/' . $photo;
                $config['new_image'] = 'uploads/slider/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '1280';
                $config['height'] = '700';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                } 

            }else{$photo='';}

            $data = array(  

                'title' => $this->input->post('title'),  
                'order_by' => $this->input->post('order_by'),
                'link' => $this->input->post('link'),
                'description' => $this->input->post('description'), 
                'created_by' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s')
                ); 

                if($photo){
                    $data['image'] = $photo;
                }  
            if ($this->form_validation->run() == true && $this->site->updateData('slider', $data, array('id'=>$id))) { 

            $this->session->set_flashdata('message', 'Successfully updated slider'); 

            redirect("admin/slider/");   

            }  

        }

        $this->data['info'] = $this->site->wheres_row('slider', array('id'=>$id));

       $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 

        $this->data['page_title'] = 'Update Slider'; 

        $bc = array(array('link' => '#', 'page' => 'Update Slider')); 

        $meta = array('page_title' => 'Update Slider', 'bc' => $bc); 

        $this->page_construct('slider/edit', $this->data, $meta); 

    }



    public function delete($id)

    {

        if(DEMO) { 

            $this->session->set_flashdata('error', lang('disabled_in_demo')); 

            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome'); 

        }



        if (!$this->Admin ) { 

            $this->session->set_flashdata('error', lang('access_denied')); 

            redirect('admin'); 

        }  

        if ($this->site->delete('slider', array('id' => $id ))) { 

            $this->session->set_flashdata('message', 'Successfully deleted'); 

            redirect('admin/slider/');



        }

    }

}