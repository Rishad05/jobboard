<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonial extends MY_Controller
{

    function __construct() {
        parent::__construct();

        if (!$this->loggedIn) {
            redirect('login');
        }     

        $this->load->library('form_validation'); 
    }
    function index() {
    	$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
    	$this->data['page_title'] = lang('Testimonials list');
    	$bc = array(array('link' => '#', 'page' => lang('page')));
    	$meta = array('page_title' => lang('Testimonials list'), 'bc' => $bc);
    	$this->page_construct('testimonial/index', $this->data, $meta);
    }
    function get_testimonials(){
        $this->load->library('datatables');
        $this->datatables->select(
            $this->db->dbprefix('testimonials') . ".id  as id ,". 
            $this->db->dbprefix('testimonials') . ".image,".
            $this->db->dbprefix('testimonials') . ".order_by,". 
            $this->db->dbprefix('testimonials') . ".name,".
            $this->db->dbprefix('testimonials') . ".title,". 
            $this->db->dbprefix('testimonials') . ".comment,". 
            $this->db->dbprefix('testimonials') . ".created_at,". 
            $this->db->dbprefix('testimonials') . ".status,",false);
        $this->datatables->from('testimonials');  
        $this->fild = ''; 
        $this->fild .=  "  
        <a href='" . site_url('admin/testimonial/edit/$1/') . "' class='tip btn btn-warning btn-xs' title='".$this->lang->line("Edit")."'><i class='fa fa-edit'></i></a>   
        <a href='" . site_url('admin/testimonial/delete/$1') . "' onClick=\"return confirm('You are going to delete page, please click ok to delete')\" class='tip btn btn-danger btn-xs' title='".$this->lang->line("Delete")."'><i class='fa fa-trash-o'></i></a>
        ";  
        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>        
        ".$this->fild."</div></div>", "id");
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();

    }
 
    function add(){  
        $this->form_validation->set_rules('name', 'Author Name', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');   
        $this->form_validation->set_rules('order_by', 'Order By', 'is_unique[testimonials.order_by]'); 
        if ($this->form_validation->run() == true) {  
            if(!empty($_FILES['userfile']['name'])){  
                $this->load->library('upload');
                $this->load->library('image_lib');
                $config['upload_path'] = 'uploads/testimonial';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '60000'; 
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);              
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');                   
                }
                $photo = $this->upload->file_name ;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/testimonial/' . $photo;
                $config['new_image'] = 'uploads/testimonial/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '150';
                $config['height'] = '150';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                } 

            }else{$photo='';}

            $data = array(  
                'name' => $this->input->post('name'),
                'title' => $this->input->post('title'),
                'comment' => $this->input->post('comment'), 
                'order_by' => $this->input->post('order_by'), 
                'status' => $this->input->post('status'),
                'created_by' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s') 
            );
            if($photo){
                $data['image'] = $photo ;
            }  
            if($this->site->insertQuery('testimonials',$data)){
                $this->session->set_flashdata('message', 'Successfully added ');
                redirect('admin/testimonial/');
            }
            $this->session->set_flashdata('error', 'Please check your data!');
                redirect('admin/testimonial/'); 
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['page_title'] = lang('Add testimonial');
        $bc = array(array('link' => '#', 'page' => lang('content')));
        $meta = array('page_title' => lang('Add testimonial'), 'bc' => $bc);
        $this->page_construct('testimonial/add', $this->data, $meta);
    }

    function edit($id){   
        $this->form_validation->set_rules('title', 'Testimonial title', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');  
        $this->data['data'] = $this->site->whereRow('testimonials','id',$id);
        if($this->input->post('order_by') !=$this->data['data']->order_by){
           $this->form_validation->set_rules('order_by', 'Order By', 'is_unique[testimonials.order_by]'); 
        }
        if ($this->form_validation->run() == true) {
            if(!empty($_FILES['userfile']['name'])){ 
              $this->load->library('upload');
              $this->load->library('image_lib');
              $config['upload_path'] = 'uploads/testimonial';
              $config['allowed_types'] = 'gif|jpg|png|jpeg';
              $config['max_size'] = '60000'; 
              $config['overwrite'] = FALSE;
              $config['encrypt_name'] = TRUE;
              $this->upload->initialize($config);              
              if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');                   
                }
                $photo = $this->upload->file_name ;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/testimonial/' . $photo;
                $config['new_image'] = 'uploads/testimonial/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = '150';
                $config['height'] = '150';
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors()); 
                    $this->form_validation->set_rules('imagee', $this->image_lib->display_errors(), 'required');
                }  
            }else{$photo='';}

            $data = array(  
                'name' => $this->input->post('name'),
                'title' => $this->input->post('title'),
                'comment' => $this->input->post('comment'),
                'order_by' => $this->input->post('order_by'),  
                'status' => $this->input->post('status'),
                'updated_by' => $this->session->userdata('user_id'),
                'updated_at' => date('Y-m-d H:i:s') 
            );
            if($photo){
                $data['image'] = $photo ;
            } 

            if($this->site->updateQuery('testimonials',$data, array('id'=>$id))){
                $this->session->set_flashdata('message', 'Successfully updated ');
                redirect('admin/testimonial/');
            }
        
            $this->session->set_flashdata('error', 'Please check your data!');
            redirect('admin/testimonial/'); 
        }
        $this->data['id'] = $id;
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['page_title'] = lang('Edit testimonial');
        $bc = array(array('link' => '#', 'page' => lang('content')));
        $meta = array('page_title' => lang('Edit testimonial'), 'bc' => $bc);        
        $this->page_construct('testimonial/edit', $this->data, $meta);
    }

    function delete($id){ 
        $attac =  $this->site->whereRow('testimonials','id',$id);   
        if($this->site->deleteQuery('testimonials',array('id' => $id))){
            if($attac->image !=''){  
                    if(file_exists(FCPATH."/uploads/testimonial/".$attac->image)){
                       unlink(FCPATH."/uploads/testimonial/".$attac->image); 
                    } 
                }
            $this->session->set_flashdata('message','Delete Successfully'); 
        }else{
            $this->session->set_flashdata('error','Not deleted');
        }
        redirect($_SERVER["HTTP_REFERER"]);
    } 
}