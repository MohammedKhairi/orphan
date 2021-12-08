<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class team extends CI_Controller {

  // عرض جميع اعضاء فرق جمع التبرعات
	public function show_t_g_mony()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'عرض جميع اعضاء فرق جمع التبرعات';

		$this->load->model('team_model');
		$data['t_mony'] =$this->team_model->get_t_mony();
		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/team/show_t_g_mony',$data,);
		$this->load->view('admin/admin_temp/footer');
	}
	//عرض مهام عضومن اعضاء فرقة جمع التبرعات 
	public function team_g_mony_support($id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'عرض جميع اعضاء فرق جمع التبرعات';
		$this->load->model('team_model');
		$data_c['team_mony'] =$this->team_model->t_mony_support($id);
		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/team/t_g_mony_support',$data_c);
		$this->load->view('admin/admin_temp/footer');
	}
	// انهاءمهمة عضو من اعضاء فرقة جمع التبرعات 
	public function t_g_mony_support_done($id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		   $this->load->database();
			//data
			$cont_data = array(
				'sp_state' =>  1
			);
			$this->load->model('team_model');
		    $this->team_model->t_mony_support_done($id,$cont_data);
			redirect('Admin/Team_g_Mony_support/'.$id);        	
	}
   //حذف توكيل المهمة لعضو من اعضاء فرقة جمع التبرعات 
	public function t_g_mony_support_delete($id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		   $this->load->database();
			//data
			$cont_data = array(
				'sp_t_team' =>  NULL
			);
			$this->load->model('team_model');
		    $this->team_model->t_mony_support_delete($id,$cont_data);
			redirect('Admin/Team_g_Mony_support/'.$id);        	
	}
	  // عرض جميع اعضاء فرق رعاية الايتام
	public function show_t_k_orphan()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'جميع اعضاء فرق رعاية الايتام';

		$this->load->model('team_model');
		$data['t_orphans'] =$this->team_model->get_t_orphan();
		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/team/show_t_k_orphan',$data);
		$this->load->view('admin/admin_temp/footer');
	}

	 // عرض او اعضاء مهام الى احد اعضاء فرق رعاية الايتام
	 public function t_k_task($id)
	 {
		 if($this->session->userdata('log_in') !=1)
		 {
			 redirect(base_url().'wp-admin');
		 }

		 $data['title'] = 'جميع مهام  فرق رعاية الايتام';
		 $this->load->model('team_model');
		 $data_c['t_task'] =$this->team_model->get_t_k_task($id);
		 $data_c['id'] =$id;
		 $this->load->view('admin/admin_temp/header',$data);
		 $this->load->view('admin/team/t_k_task',$data_c);
		 $this->load->view('admin/admin_temp/footer');
	 }
	 //   اعضاء مهام الى احد اعضاء فرق رعاية الايتام
	 public function add_task($id)
	 {
		 if($this->session->userdata('log_in') !=1)
		 {
			 redirect(base_url().'wp-admin');
		 }

		 $this->form_validation->set_rules('content', 'Content ', 'required');
		 $this->form_validation->set_rules('date', 'date ', 'required');
		 if($this->form_validation->run() === FALSE)
			 {
				$data['title'] = 'جميع مهام  فرق رعاية الايتام';
				$this->load->model('team_model');
				$data_c['t_task'] =$this->team_model->get_t_k_task($id);
				$data_c['id'] =$id;
				$this->load->view('admin/admin_temp/header',$data);
				$this->load->view('admin/team/t_k_task',$data_c);
				$this->load->view('admin/admin_temp/footer');
			 } 
			 else 
			 {
				 //data
				 $cont_data = array(
					'ts_t_id' => $id,
					'ts_content' =>  $this->input->post('content'),
					'ts_date' =>  $this->input->post('date')
				);
	
				$this->load->database();
				$this->load->model('team_model');
				$this->team_model->add_t_task($cont_data);
				redirect(base_url().'Admin/Team_K_Task/'.$id); 
			 }

		
	 }
	  //     حذف توكيل مهام  احد اعضاء فرق رعاية الايتام 
	  public function delete_task($id)
	  {
		  if($this->session->userdata('log_in') !=1)
		  {
			  redirect(base_url().'wp-admin');
		  }
		$this->load->database();
		$this->load->model('team_model');
		$this->team_model->delete_t_task($id);
		redirect(base_url().'Admin/Show_Team_k_Orphan/');  
	  }

	// حذف احد اعضاء الفرق جمع التبرعات
	public function team_delete_m($id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$this->load->database();
		$this->load->model('team_model');
		$this->team_model->delete_team($id);

		// delete task for this member
		$data = array(
			'sp_t_team' =>  NULL
		);
		$this->team_model->delete_team_m_task($id,$data);
		redirect(base_url().'Admin/Show_Team_g_Mony');

		
	}
	// حذف احد اعضاء فرق رعاية الايتام
	public function team_delete_k($id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$this->load->database();
		$this->load->model('team_model');
		$this->team_model->delete_team($id);
		// delete all task for this member
		$this->team_model->delete_t_task_all($id);

		redirect(base_url().'Admin/Show_Team_k_Orphan');

		
	}
    // طلبات الانضمام الى الفرق
	public function show_t_request()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'عرض جميع   طلبات الانضمام الى الفرق   ';

		$this->load->model('team_model');
		$data['t_mony'] =$this->team_model->get_t_request();
		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/team/show_t_request',$data,);
		$this->load->view('admin/admin_temp/footer');
	}
	//قبول طلب الانضمام كاحد الفرق التطوعية
	public function update_t_request($t_id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}

		$cont_data = array(
			't_active' => 1
		);

		$this->load->database();
		$this->load->model('team_model');
		$this->team_model->Update_t_request($t_id,$cont_data);
		redirect(base_url().'Admin/Show_Team_Request');
					
			

			
		
	}
}
