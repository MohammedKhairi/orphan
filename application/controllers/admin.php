<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function login_show()
	{
		if($this->session->userdata('log_in')==1)
			{
				redirect(base_url().'Admin/Info_Admin');
			}
		$data['title'] = 'لوحة تسجيل الدخول الادمن';
	 	$this->load->view('admin/login',$data);
	}
//  تسجيل دخول  الادمن
	public function login()
	{
			if($this->session->userdata('log_in')==1)
			{
				redirect(base_url().'Admin/Info_Admin');
			}
		$this->form_validation->set_rules('u_name', 'User Name ', 'required');
		$this->form_validation->set_rules('pass', 'password', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'لوحة تسجيل الدخول الادمن';
	     	$this->load->view('admin/login',$data);
		}
		else
		{
			$this->load->model('admin_model');
			$this->load->database();
			$uname=$this->input->post('u_name');
			$upass=$this->input->post('pass');
			 $admin_s=$this->admin_model->ck_admin($uname,$upass);
			 //information is true
			 if($admin_s)
			 {
				$session_data=array(
					'username'=>$uname,
					'log_in'=>1
				);
				$this->session->set_userdata($session_data);
				redirect(base_url().'Admin/Info_Admin');
			 }
			 //information is false
			 else
			 {
				 $this->session->set_flashdata('erroe','لقد ادخلت اسم مستخدم او رمز سري خطأ');
				  redirect(base_url().'wp-admin');

			 }

		}
	}
//  تسجيل  الخروج  الادمن
	public function logout()
	{
		// $this->session->unset_userdata('username');
		// $this->session->unset_userdata('log_in');
		session_destroy ();
		redirect(base_url().'wp-admin');
	}
	 //عرض لوحة تعديل معلومات الادمن
	 public function edit_a()
	 {
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'تعديلمعلومات الادمن';
		 $this->load->model('admin_model');
		 $this->load->database();
		 $data_cont['admin']=$this->admin_model->Edit_admin();
		 $this->load->view('admin/admin_temp/header',$data);
		  $this->load->view('admin/edit_a',$data_cont);
		 $this->load->view('admin/admin_temp/footer');
	 }
//  تحديث معلومات الادمن
	 public function update_a()
	 {
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('u_name', 'User Name ', 'required');
		$this->form_validation->set_rules('email', 'ُEmail', 'required');
		$this->form_validation->set_rules('pass', 'password', 'required');
		$this->form_validation->set_rules('adress', 'Adress', 'required');

		

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'تعدي لمعلومات الادمن';
		 $this->load->model('admin_model');
		 $this->load->database();
		 $data_cont['admin']=$this->admin_model->Edit_admin();
		 $this->load->view('admin/admin_temp/header',$data);
		  $this->load->view('admin/edit_a',$data_cont);
		 $this->load->view('admin/admin_temp/footer');
		} 
		else 
		{
			//نفس الصورة السابقة
			if($_FILES['userfile']['name']==NULL)
			{
				$cont_data = array(
					'a_name' =>  $this->input->post('name'),
					'a_email' =>  $this->input->post('email'),
					'a_a_name' =>  $this->input->post('u_name'),
					'a_pass' =>  $this->input->post('pass'),
					'a_adress' =>  $this->input->post('adress')

				);

				$this->load->model('admin_model');
				$this->admin_model->Update($cont_data);
				redirect(base_url().'Admin/Info_Admin');

			}
			//تم التعديل على الصورة   
			else
			{
				$this->load->model('admin_model');
				$this->admin_model->delete_img();
				$config['upload_path'] = './assest/images/admin';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$config['file_name'] = time().$_FILES['userfile']['name'];
				
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile'))
				{
				
					$errors = array('error' => $this->upload->display_errors());

					$this->load->view('admin/admin_temp/header',$data);
					$this->load->view('admin/edit_a',$errors);
					$this->load->view('admin/admin_temp/footer');

					exit;
				} 
				else 
				{
					//data
					$cont_data = array(
						'a_name' =>  $this->input->post('name'),
						'a_email' =>  $this->input->post('email'),
						'a_a_name' =>  $this->input->post('u_name'),
						'a_pass' =>  $this->input->post('pass'),
						'a_adress' =>  $this->input->post('adress'),
						'a_img' =>  time().$_FILES['userfile']['name']
					);
	
					$this->load->model('admin_model');
					$this->admin_model->Update($cont_data);
					redirect(base_url().'Admin/Info_Admin');
					
				}

			}		
		}
	 }
// عرض معلومات الادمن 
	public function show_a()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'معلومات الادمن';

		$this->load->model('admin_model');
		$cont_data['admin'] =$this->admin_model->get_admin();
		$this->load->view('admin/admin_temp/header',$data);
		$this->load->view('admin/info_a',$cont_data);
		$this->load->view('admin/admin_temp/footer');
	}




}
