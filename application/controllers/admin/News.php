<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
  function __construct() {
        parent::__construct();
        if (!$this->loggedIn) {
            redirect('admin/login');
        } 
        $this->load->library('form_validation'); 
    }

    function trash() { 
        if($this->input->get('trash') == ''){
            redirect('admin/news/trash?trash=1');
        }
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['page_title'] = 'Trash List'; 
        $bc = array(array('link' => '#', 'page' => 'Trash')); 
        $meta = array('page_title' => 'Trash List', 'bc' => $bc); 
        $this->page_construct('news/index', $this->data, $meta); 
    }

    function index() { 
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['page_title'] = 'News List'; 
        $bc = array(array('link' => '#', 'page' => 'News List')); 
        $meta = array('page_title' => 'News List', 'bc' => $bc); 
        $this->page_construct('news/index', $this->data, $meta); 
    } 
    function  get_news(){ 
        $trash = $this->input->get('trash') ? $this->input->get('trash') : 0 ;
        $this->load->library('datatables'); 
        $this->datatables->select($this->db->dbprefix('news') . ".id as id, ".
            $this->db->dbprefix('news') . ".title,".
            $this->db->dbprefix('news_category') . ".title as cat, ".
            $this->db->dbprefix('news') . ".home_page, CONCAT(".
            $this->db->dbprefix('users') . ".first_name , ' ' , ".
            $this->db->dbprefix('users') . ".last_name, ' ') as names, ". 
            $this->db->dbprefix('news') . ".created_at, ".
            $this->db->dbprefix('news') . ".status"); 
        $this->datatables->from('news')
        ->join('news_category','news_category.id=news.category_id', 'left')
        ->join('users','users.id=news.created_by', 'left'); 
        $this->fild = '';   
        if($this->UserType == 'admin'){  
            if($trash != 1){
                $this->fild .="<a target='_blank' href='" . site_url('news/news_details/$1') . "'  title='Details ' class='tip btn btn-warning btn-xs'><i class='fa fa-list'></i></a>";

                $this->fild .="<a href='" . site_url('admin/news/edit/$1') . "'  title='Update' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a>"; 

                $this->fild .="<a href='" . site_url('admin/news/trashsaved/$1') . "' onClick=\"return confirm('You are going to delete this news, please click ok add to trash.')\" title='Add to trash' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";  
            }else{ 
                $this->fild .="<a href='" . site_url('admin/news/trashback/$1') . "' onClick=\"return confirm('You are going to restore this news, please click ok to restore.')\" title='Restore' class='tip btn btn-warning btn-xs'><i class='fa fa-reply-all'></i></a>";
                $this->fild .="<a href='" . site_url('admin/news/parmanently_delete/$1') . "' onClick=\"return confirm('You are going to permanently delete this news, please click ok to delete.')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";  
            } 

        } 

        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'> ".$this->fild."</div></div>", "id"); 

        if($trash == 1){
            $this->datatables->where('news.trash_status', 1); 
        }

        if($trash == 0){
            $this->datatables->where('news.trash_status', 0);
        }

        $this->datatables->unset_column('id'); 
        echo $this->datatables->generate();
    }  
    public function add() {
        $this->form_validation->set_rules('title', lang("title"), 'trim|required');
        $this->form_validation->set_rules('category', lang("category"), 'trim|required');
        if ($this->form_validation->run() == true) {  
            if(!empty($_FILES['thumbnail']['name'])){  
                $this->load->library('upload'); 
                $config['upload_path'] = 'uploads/news/'; 
                $config['allowed_types'] = 'jpg|png|jpeg';   
                $config['overwrite'] = FALSE; 
                $config['encrypt_name'] = TRUE; 
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('thumbnail')) { 
                    $error = $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required'); 
                }
                $thumbnail = $this->upload->file_name;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/news/' . $thumbnail;
                $config['new_image'] = 'uploads/news/' . $thumbnail;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '350';
                $config['height'] = '229';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                } 

            }else{$thumbnail='';}
            if(!empty($_FILES['userfile']['name'])){  
                $this->load->library('upload'); 
                $config['upload_path'] = 'uploads/news/'; 
                $config['allowed_types'] = 'jpg|png|jpeg';   
                $config['overwrite'] = FALSE; 
                $config['encrypt_name'] = TRUE; 
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('userfile')) { 
                    $error = $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $error);   
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required'); 
                }
                $photo = $this->upload->file_name;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/news/' . $photo;
                $config['new_image'] = 'uploads/news/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '1200';
                $config['height'] = '400';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }

            }else{$photo='';}
            $string = str_replace(' ', '-', $this->input->post('title')); // Replaces all spaces.
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
            $data = array( 
                'image'=> $photo,
                'thumbnail'=> $thumbnail,
                'title' => $this->input->post('title'),
                'category_id' => $this->input->post('category'),
                'short_description' => $this->input->post('short_description'), 
                'description' => $this->input->post('description'), 
                'status' => $this->input->post('status'), 
                'home_page' => $this->input->post('home_page'),
                'slug' => strtolower($slug),
                'created_by' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s')
            ); 
            if ($this->form_validation->run() == true && $this->site->insert('news', $data)) { 
            $this->session->set_flashdata('message', 'Successfully published news'); 
            redirect("admin/news/"); 
            }  
        }

       $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['page_title'] = 'Add News'; 
        $bc = array(array('link' => '#', 'page' => 'Add News')); 
        $meta = array('page_title' => 'Add News', 'bc' => $bc); 
        $this->page_construct('news/add', $this->data, $meta); 
    }

    public function edit($id) {
        $this->form_validation->set_rules('title', lang("title"), 'trim|required');
        $this->form_validation->set_rules('category', lang("category"), 'trim|required');
        if ($this->form_validation->run() == true) {
            $string = str_replace(' ', '-', $this->input->post('title')); // Replaces all spaces.
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
            $data = array(  
                'title' => $this->input->post('title'),
                'category_id' => $this->input->post('category'),
                'short_description' => $this->input->post('short_description'), 
                'description' => $this->input->post('description'), 
                'status' => $this->input->post('status'), 
                'home_page' => $this->input->post('home_page'),
                'slug' => strtolower($slug),
                'updated_by' => $this->session->userdata('user_id'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(!empty($_FILES['thumbnail']['name'])){  
                $this->load->library('upload'); 
                $config['upload_path'] = 'uploads/news/'; 
                $config['allowed_types'] = 'jpg|png|jpeg';   
                $config['overwrite'] = FALSE; 
                $config['encrypt_name'] = TRUE; 
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('thumbnail')) { 
                    $error = $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }
                $thumbnail = $this->upload->file_name ;
                $data['thumbnail'] = $thumbnail; 
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/news/' . $thumbnail;
                $config['new_image'] = 'uploads/news/' . $thumbnail;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '350';
                $config['height'] = '299';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }
            } 
            if(!empty($_FILES['userfile']['name'])){   
                $this->load->library('upload'); 
                $config['upload_path'] = 'uploads/news/'; 
                $config['allowed_types'] = 'jpg|png|jpeg';   
                $config['overwrite'] = FALSE; 
                $config['encrypt_name'] = TRUE; 
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('userfile')) { 
                    $error = $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $error); 
                    redirect("admin/news/edit/".$id);  
                } 
                $photo = $this->upload->file_name ;
                $data['image'] = $photo; 
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/news/' . $photo;
                $config['new_image'] = 'uploads/news/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '1200';
                $config['height'] = '400';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }
            } 
            if ($this->form_validation->run() == true && $this->site->updateData('news', $data, array('id'=>$id))) { 
            $this->session->set_flashdata('message', 'Successfully updated news'); 
            redirect("admin/news/"); 
            } 
        }
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 
        $this->data['info'] = $this->site->wheres_row('news', array('id'=>$id));
        $this->data['page_title'] = 'Update News'; 
        $bc = array(array('link' => '#', 'page' => 'Update News')); 
        $meta = array('page_title' => 'Update News', 'bc' => $bc); 
        $this->page_construct('news/edit', $this->data, $meta); 
    }



    public function categories()

    {

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));



        $this->data['page_title'] = 'Category List';



        $bc = array(array('link' => '#', 'page' => 'Category List'));



        $meta = array('page_title' => 'Category List', 'bc' => $bc);



        $this->page_construct('news/categories', $this->data, $meta);



    }

    function  get_newscategory(){ 



        $this->load->library('datatables'); 

        $this->datatables->select($this->db->dbprefix('news_category') . ".id as id , 

            ".$this->db->dbprefix('news_category') . ".title ,  

            ".$this->db->dbprefix('news_category') . ".description ,

            ".$this->db->dbprefix('news_category') . ".created_at 

            "); 

        $this->datatables->from('news_category');



        $this->fild = '';   

        if($this->UserType == 'admin'){ 

        //$popUp = '"'.site_url('admin/driver/details/$1').'"';

        $popUp = '"'.site_url('admin/news/edit_category/$1').'"';  

        $this->fild .=  "<a class='tip btn btn-warning btn-xs' onclick='popUp(".$popUp.",$1)' href='javascript:;' title='Edit'><i class='fa fa-edit'></i></a> ";  



         $this->fild .="<a href='" . site_url('admin/news/deletecat/$1') . "' onClick=\"return confirm('You are going to delete this category, please click ok to delete.')\" title='Delete' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";   

        } 

        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>



        ".$this->fild." 

        </div></div>", "id");  

        $this->datatables->unset_column('id'); 

        echo $this->datatables->generate();

    }  

    public function add_category()

    { 

        $this->form_validation->set_rules('title', lang("title"), 'trim|required');

        if ($this->form_validation->run() == true) {  

            $data = array( 

                'title' => $this->input->post('title'),

                'description' => $this->input->post('description'), 

                'created_at' => date('Y-m-d H:i:s')

                );   

            if ($this->form_validation->run() == true && $this->site->insert('news_category', $data)) { 

            $this->session->set_flashdata('message', 'Successfully added category'); 

            redirect("admin/news/categories"); 

            }  

        }

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 

        $this->data['title'] = 'Add New Category'; 

        $this->load->view($this->theme.'news/add_category', $this->data);

    }

    public function edit_category($id)

    { 

        $this->form_validation->set_rules('title', lang("title"), 'trim|required');

        if ($this->form_validation->run() == true) {  

            $data = array( 

                'title' => $this->input->post('title'),

                'description' => $this->input->post('description'), 

                'created_at' => date('Y-m-d H:i:s')

                );   

            if ($this->form_validation->run() == true && $this->site->updateData('news_category', $data, array('id'=>$id))) { 

                $this->session->set_flashdata('message', 'Successfully added category'); 

                redirect("admin/news/categories"); 

            } 



        }

        $this->data['info'] = $this->site->wheres_row('news_category', array('id'=>$id));



        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error')); 

        $this->data['title'] = 'Update Category'; 

        $this->load->view($this->theme.'news/edit_category', $this->data);

    }



      function deletecat($id = NULL ) {                                

        if(DEMO) { 

            $this->session->set_flashdata('error', lang('disabled_in_demo')); 

            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome'); 

        }



        if (!$this->Admin ) { 

            $this->session->set_flashdata('error', lang('access_denied')); 

            redirect('admin'); 

        }  

        if ($this->site->delete('news_category', array('id' => $id ))) { 

            $this->session->set_flashdata('message', 'Category successfully deleted'); 

            redirect('admin/news/categories');



        }



    }

    public function trashsaved($id)

    {

        if(DEMO) { 

            $this->session->set_flashdata('error', lang('disabled_in_demo')); 

            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome'); 

        }



        if (!$this->Admin ) { 

            $this->session->set_flashdata('error', lang('access_denied')); 

            redirect($_SERVER["HTTP_REFERER"]); 

        }  

        if ($this->site->updateData('news', array('trash_status'=>1, 'status'=>0), array('id' => $id ))) { 

            $this->session->set_flashdata('message', 'Successfully this news add to trash'); 

            redirect($_SERVER["HTTP_REFERER"]);



        }

    }

    public function trashback($id)

    {

        if(DEMO) { 

            $this->session->set_flashdata('error', lang('disabled_in_demo')); 

            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome'); 

        }



        if (!$this->Admin ) { 

            $this->session->set_flashdata('error', lang('access_denied')); 

            redirect($_SERVER["HTTP_REFERER"]); 

        }  

        if ($this->site->updateData('news', array('trash_status'=>0), array('id' => $id ))) { 

            $this->session->set_flashdata('message', 'Successfully restore'); 

            redirect($_SERVER["HTTP_REFERER"]);



        }

    }



    public function parmanently_delete($id)

    {

        if(DEMO) { 

            $this->session->set_flashdata('error', lang('disabled_in_demo')); 

            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome'); 

        }



        if (!$this->Admin ) { 

            $this->session->set_flashdata('error', lang('access_denied')); 

            redirect($_SERVER["HTTP_REFERER"]); 

        }  

        if ($this->site->delete('news', array('id' => $id ))) { 

            $this->session->set_flashdata('message', 'Successfully deleted'); 

            redirect($_SERVER["HTTP_REFERER"]);



        }

    }







}