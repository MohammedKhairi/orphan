<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gallary extends CI_Controller {

 function add_g()
 {
	if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'أضافة مجلة جديدة ';
    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/gallary/add_g');
    $this->load->view('admin/admin_temp/footer');
 }
 function insert_g()
 {
	if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
        $data['title'] = 'أضافة مجلة جديد';
		$this->form_validation->set_rules('title', 'Title', 'required');		
		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/admin_temp/header',$data);
			$this->load->view('admin/gallary/add_g');
			$this->load->view('admin/admin_temp/footer');
		} 
		else 
		{
				//data
				$cont_data = array(
					'g_title' =>  $this->input->post('title'),
				);

				$this->load->model('gallary_model');
				$this->gallary_model->create($cont_data);
                redirect('Admin/Add_gallary');
                	
		}
 }

 function insert_g_img()
 {
	if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'أضافة صور الى المجلة  ';

    $this->load->model('gallary_model');
    $data_cont['gallaries']=$this->gallary_model->get();
    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/gallary/add_g_img',$data_cont);
    $this->load->view('admin/admin_temp/footer');
 }
 function insert_img()
 {
	if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
        $this->form_validation->set_rules('g_id', 'Gallary', 'required');
		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'أضافة صور الى المجلة  ';
            $this->load->model('gallary_model');
            $data_cont['gallaries']=$this->gallary_model->get();
            $this->load->view('admin/admin_temp/header',$data);
            $this->load->view('admin/gallary/add_g_img',$data_cont);
            $this->load->view('admin/admin_temp/footer');
		} 
		else 
		{
			//نفس الصورة السابقة
			if($_FILES['userfile']['name']==NULL)
			{
				$data['title'] = 'أضافة صور الى المجلة  ';
                $this->load->model('gallary_model');
                $data_cont['gallaries']=$this->gallary_model->get();
                $this->load->view('admin/admin_temp/header',$data);
                $this->load->view('admin/gallary/add_g_img',$data_cont);
                $this->load->view('admin/admin_temp/footer');

			}
			//تم التعديل على الصورة   
			else
			{
                $gallary_id=$this->input->post('g_id');
                $this->load->model('gallary_model');

                // $gallary_title=substr_replace(' ','_',$this->gallary_model->get_one($gallary_id));
                // $filename=$_FILES['userfile']['name'];
				// $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
				
				$config['upload_path'] = './assest/images/gallary';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$config['file_name'] = time().$_FILES['userfile']['name'];
				
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile'))
				{				
					$errors = array('error' => $this->upload->display_errors());
				} 
				else 
				{
					//data
					     $cont_data = array(
						'g_i_id' =>   $gallary_id,
						'g_i_img' =>time().$_FILES['userfile']['name']
					);

					$this->load->model('gallary_model');
					$this->gallary_model->insert_img($cont_data);
					redirect('Admin/Add_photo');
					
				}

			}		
		}
 }
 function show_g()
 {
	if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'عرض كل المجلات';
    $this->load->model('gallary_model');
    $data_cont['gallaries']=$this->gallary_model->get();
    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/gallary/show_g',$data_cont);
    $this->load->view('admin/admin_temp/footer');
 }
 function edit_g_img($id)
 {
	if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'تعديل على المجلة';
    $this->load->model('gallary_model');
    $data_cont['gallaries_one']=$this->gallary_model->get_one_all($id);
    $data_cont['gallaries']=$this->gallary_model->get_img($id);
    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/gallary/edit_g',$data_cont);
    $this->load->view('admin/admin_temp/footer');
 }
 function update_title($id)
 {
	if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
	}

		$this->form_validation->set_rules('title', 'Title', 'required');		
		if($this->form_validation->run() === FALSE)
		{
			redirect(base_url().'Admin/Edite_Gallary/'.$id);
		} 
		else 
		{
			$data = array(
				'g_title' =>  $this->input->post('title')
			);
			$this->load->database();
			$this->load->model('gallary_model');
			$this->gallary_model->update_name($id,$data);
			redirect(base_url().'Admin/Edite_Gallary/'.$id);

		}
    
 }
 function delete_img($name)
 {
	if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
	}

	$this->load->database();
	$this->load->model('gallary_model');
	$this->gallary_model->delete_img($name);
	redirect(base_url().'Admin/show_gallary');   
 }
 

 function get_image($id)
 {
	if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
	$this->load->model('gallary_model');
    $this->gallary_model->get_img($id);
 }
 
}