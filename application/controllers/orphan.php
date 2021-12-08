<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class orphan extends CI_Controller {

    // show all orphan غير المكفولين
	public function show_o()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'جميع الايتام';

		$this->load->model('orphan_model');
		$data['orphans'] =$this->orphan_model->get_orphan_n_s();
		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/orphan/show_o',$data);
		$this->load->view('admin/admin_temp/footer');
	}
    // show all orphan  المكفولين

	public function show_o_s()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = '  جميع الايتام المكفولين';

		$this->load->model('orphan_model');
		$data['orphans'] =$this->orphan_model->get_orphan_s();
		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/orphan/show_o_s',$data);
		$this->load->view('admin/admin_temp/footer');
	}

	// عرض لوحة اضافة يتيم
	public function add_o()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'اضافة يتيم';
		$this->load->view('admin/admin_temp/header',$data);
	 	$this->load->view('admin/orphan/add_o');
		$this->load->view('admin/admin_temp/footer');
	}
	//  اضافة يتيم جديد
	public function new_o()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'أضافة يتيم جديد';
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mother_name', 'Mother_name', 'required');
		$this->form_validation->set_rules('berth_day', 'Berth_day', 'required');
		$this->form_validation->set_rules('adress', 'Adress', 'required');

		

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/admin_temp/header',$data);
			$this->load->view('admin/orphan/add_o');
			$this->load->view('admin/admin_temp/footer');
		} 
		else 
		{
			$fileExt = pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);
			$config['upload_path'] = './assest/images/orphan';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$config['file_name'] =date("Y_m_d").time().'.'.$fileExt;
            
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('userfile'))
			{
			
				$errors = array('error' => $this->upload->display_errors());

				$this->load->view('admin/admin_temp/header',$data);
				$this->load->view('admin/orphan/add_o',$errors);
				$this->load->view('admin/admin_temp/footer');
			} 
			else 
			{
				//data
				$cont_data = array(
					'o_name' =>  $this->input->post('name'),
					'o_n_mother' =>  $this->input->post('mother_name'),
					'o_berth_day' =>  $this->input->post('berth_day'),
					'o_adress_db' =>  $this->input->post('adress'),
					'o_date_in' =>  $this->input->post('date_out'),
					'o_date_out' =>  $this->input->post('date_in'),
					'o_img' =>  date("Y_m_d").time().'.'.$fileExt
				);

				$this->load->model('orphan_model');
				$this->orphan_model->create($cont_data);
				redirect(base_url().'Admin/Show_orphan');
				
			}

			
			
		}
	}

	//  حذف يتيم
	public function delete_o($orphan_id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$this->load->model('orphan_model');
		$this->load->database();
		$this->orphan_model->delete_orphan($orphan_id);
		redirect('Admin/Show_orphan');
	}
	//  حذف كفيل اليتيم
	public function delete_o_s($orphan_id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$this->load->model('orphan_model');
		$this->load->database();
		$this->orphan_model->delete_orphan_s($orphan_id);
		redirect('Admin/Show_orphan_s');
	}
 //عرض لوحة تعديل معلومات اليتيم
	public function edit_o($orphan_id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$this->load->model('orphan_model');
		$this->load->database();
		$data_cont['orphan']=$this->orphan_model->Edit_orphan($orphan_id);
		$data['title'] = 'تعديل معلومات اليتيم';
		$this->load->view('admin/admin_temp/header',$data);
	 	$this->load->view('admin/orphan/edit_o',$data_cont);
		$this->load->view('admin/admin_temp/footer');
	}
//تحديث المعلومات
	public function update_o($orphan_id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mother_name', 'Mother_name', 'required');
		$this->form_validation->set_rules('berth_day', 'Berth_day', 'required');
		$this->form_validation->set_rules('adress', 'Adress', 'required');

		

		if($this->form_validation->run() === FALSE)
		{
			$this->load->model('orphan_model');
			$this->load->database();
			$data_cont['orphan']=$this->orphan_model->Edit_orphan($orphan_id);
			$data['title'] = 'تعديلمعلومات اليتيم';
			$this->load->view('admin/admin_temp/header',$data);
			$this->load->view('admin/orphan/edit_o',$data_cont);
			$this->load->view('admin/admin_temp/footer');
		} 
		else 
		{
			//نفس الصورة السابقة
			if($_FILES['userfile']['name']==NULL)
			{
				$cont_data = array(
					'o_name' =>  $this->input->post('name'),
					'o_n_mother' =>  $this->input->post('mother_name'),
					'o_berth_day' =>  $this->input->post('berth_day'),
					'o_adress_db' =>  $this->input->post('adress'),
					'o_date_in' =>  $this->input->post('date_out'),
					'o_date_out' =>  $this->input->post('date_in')

				);

				$this->load->model('orphan_model');
				$this->orphan_model->Update($orphan_id,$cont_data);
				redirect(base_url().'Admin/Show_orphan');

			}
			//تم التعديل على الصورة   
			else
			{
				$fileExt = pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);
				$this->load->model('orphan_model');
				$this->orphan_model->delete_img($orphan_id);
				$config['upload_path'] = './assest/images/orphan';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$config['file_name'] = date("Y_m_d").time().'.'.$fileExt;
				
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile'))
				{
				
					$errors = array('error' => $this->upload->display_errors());

					$this->load->view('admin/admin_temp/header',$data);
					$this->load->view('admin/orphan/add_o',$errors);
					$this->load->view('admin/admin_temp/footer');
				} 
				else 
				{
					//data
					     $cont_data = array(
						'o_name' =>  $this->input->post('name'),
						'o_n_mother' =>  $this->input->post('mother_name'),
						'o_berth_day' =>  $this->input->post('berth_day'),
						'o_adress_db' =>  $this->input->post('adress'),
						'o_date_in' =>  $this->input->post('date_out'),
						'o_date_out' =>  $this->input->post('date_in'),
						'o_img' =>date("Y_m_d").time().'.'.$fileExt
					);

					$this->load->model('orphan_model');
					$this->orphan_model->Update($orphan_id,$cont_data);
					redirect(base_url().'Admin/Show_orphan');
					
				}

			}		
		}
	}
	// غير مكفول البحث عن يتيم محدد
	function fetch()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$output = '';
		$query = '';
		$this->load->model('orphan_model');
		if($this->input->post('query'))
		{
		$query = $this->input->post('query');
		}
		if($query=='')
           {
               echo '';
               exit;

           }
			$data = $this->orphan_model->fetch_data($query);
			$output .= '
			<div class="container">
			<h2 style="text-align: center;font-family: El Messiri, sans-serif;">الايتام الذين يمتلكون هذه المعلومات</h2>
			<br>
			<table class="table" style="float:right;direction:rtl;">
				<thead class="thead-dark">
				<tr>
					<th class="th_center">صورة اليتيم</th>
					<th class="th_center">أسم اليتيم</th>
					<th class="th_center">عنوان الولادة</th>
					<th class="th_center">تعديل المعلومات</th>

				</tr>
				</thead>

				<tbody>
			';
			if($data->num_rows() > 0)
			{
			foreach($data->result() as $row)
			{
			$output .= '
			<tr>
			<td class="td_center"><img class="img_table"src="'.base_url().'assest/images/orphan/'.$row->o_img.'"></td>
			<td class="td_center" id="th_height">'.$row->o_name.'</td>
			<td class="td_center" id="th_height1">'.$row->o_adress_db.'</td>
			<td class="td_center" id="th_height2">
				<a class="btn btn-success" href="Edite_orphan/'.$row->o_id.'" role="button">تحرير</a>
				<a class="btn btn-danger" href="Delete_orphan/'.$row->o_id.'" role="button">حذف</a>
			</td>
			</tr>
			';
			}
			}
			else
			{
			$output .= '
				<tr>
					<td colspan="4">No Data Found</td>
				</tr>';
			}
			$output .= '
			</tbody>
			</table>
			</div>
		
		';
		echo $output;
	}
	// عرض معلومات يتيم غير مكفول محدد
	function get_one()
	{
		$output = '';
		$query = $this->input->post('query');
		if($query=='')
           {
               echo 'لا توجد معلومات';
               exit;
		   }
		$this->load->model('orphan_model');
			$data = $this->orphan_model->fetch_one_data($query);
			$output .= '
			<div class="container">
			<h2 style="text-align: center;font-family: El Messiri, sans-serif;">الايتام الذين يمتلكون هذه المعلومات</h2>
			<br>
			<table class="table" style="float:right;direction:rtl;">
				<thead class="thead-dark">
				<tr>
					<th class="th_center">صورة اليتيم</th>
					<th class="th_center">أسم اليتيم</th>
					<th class="th_center">تاريخ الولادة</th>
					<th class="th_center">عنوان الولادة</th>
				</tr>
				</thead>
				<tbody>
			';
			if($data->num_rows() > 0)
			{
			foreach($data->result() as $row)
			{
			$output .= '
			<tr>
			<td class="td_center"><img class="img_table" style="width:150px;"src="'.base_url().'assest/images/orphan/'.$row->o_img.'"></td>
			<td class="td_center" id="th_height">'.$row->o_name.'</td>
			<td class="td_center" id="th_height1">'.date('M d,Y',strtotime($row->o_berth_day)).'</td>
			<td class="td_center" id="th_height1">'.$row->o_adress_db.'</td>
			</tr>
			';
			}
			}
			else
			{
			$output .= '
				<tr>
					<td colspan="4">No Data Found</td>
				</tr>';
			}
			$output .= '
			</tbody>
			</table>
			</div>
		
		';
		echo $output;
	}
	//مكفول البحث عن يتيم محدد
	function fetch_s()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$output = '';
		$query = '';
		$this->load->model('orphan_model');
		if($this->input->post('query'))
		{
		$query = $this->input->post('query');
		}
		if($query=='')
           {
               echo '';
               exit;

           }
			$data = $this->orphan_model->fetch_data_s($query);
			$output .= '
			<div class="container">
			<h2 style="text-align: center;font-family: El Messiri, sans-serif;">الايتام الذين يمتلكون هذه المعلومات</h2>
			<br>
			<table class="table" style="float:right;direction:rtl;">
				<thead class="thead-dark">
				<tr>
					<th class="th_center">صورة اليتيم</th>
					<th class="th_center">أسم اليتيم</th>
					<th class="th_center">عنوان الولادة</th>
					<th class="th_center"> اسم الكفيل</th>
					<th class="th_center">تعديل المعلومات</th>

				</tr>
				</thead>

				<tbody>
			';
			if($data->num_rows() > 0)
			{
			foreach($data->result() as $row)
			{
			$output .= '
			<tr>
			<td class="td_center"><img class="img_table"src="'.base_url().'assest/images/orphan/'.$row->o_img.'"></td>
			<td class="td_center" id="th_height">'.$row->o_name.'</td>
			<td class="td_center" id="th_height1">'.$row->o_adress_db.'</td>
			<td class="td_center" id="th_height1">'.$row->s_name.'</td>
			<td class="td_center" id="th_height2">
				<a class="btn btn-success" href="Edite_orphan/'.$row->o_id.'" role="button">تحرير</a>
				<a class="btn btn-primary" href="Delete_orphan/'.$row->o_id.'" role="button">حذف</a>
				<a class="btn btn-danger" href="Delete_orphan_s/'.$row->o_id.'" role="button">حذف</a>
			</td>
			</tr>
			';
			}
			}
			else
			{
			$output .= '
				<tr>
					<td colspan="4">No Data Found</td>
				</tr>';
			}
			$output .= '
			</tbody>
			</table>
			</div>
		
		';
		echo $output;
	}
////////////// ////////[sponsor]////////////////////////
	//عرض جميل الاشخاص الذين قدمو طلب لكفل  يتيم
	function show_s_request()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'عرض جميل الاشخاص الذين كفلو يتيم';

		$this->load->model('orphan_model');
		$data_cont['sponsor'] =$this->orphan_model->get_sponsor_request();
		$this->load->view('admin/admin_temp/header',$data);
		$this->load->view('admin/sponsor/show_s_request',$data_cont);
		$this->load->view('admin/admin_temp/footer');

	}
	//تحديث المعلومات لكي يصبح كفيل يبعد مقابلة المسؤل
	public function update_s_request($s_id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}

		$cont_data = array(
			's_active' => 1
		);

		$this->load->database();
		$this->load->model('orphan_model');
		$this->orphan_model->Update_s_request($s_id,$cont_data);
		redirect(base_url().'Admin/Show_sponsor');
					
			

			
		
	}
	//عرض جميل الاشخاص الذين كفلو يتيم
	function show_sponsor()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'عرض جميل الاشخاص الذين كفلو يتيم';

		$this->load->model('orphan_model');
		$data_cont['sponsor'] =$this->orphan_model->get_sponsor();
		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/sponsor/show_s',$data_cont);
		$this->load->view('admin/admin_temp/footer');

	}
	//  حذف كفيل
	public function delete_sponsor($s_id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$this->load->model('orphan_model');
		$this->load->database();
		$this->orphan_model->delete_s($s_id);
		redirect('Admin/Show_sponsor');
	}

	//   البحث عن كفيل 
	function fetch_sponsor()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$output = '';
		$query = '';
		$this->load->database();
		$this->load->model('orphan_model');
		if($this->input->post('query'))
		{
		$query = $this->input->post('query');
		}
		if($query=='')
           {
               echo '';
               exit;

           }
			$data = $this->orphan_model->search_sponsor($query);
			$output .= '
			<div class="container">
			<h2 style="text-align: center;font-family: El Messiri, sans-serif;">الكفلاء الذين يمتلكون هذه المعلومات</h2>
			<br>
			<table class="table" style="float:right;direction:rtl;">
				<thead class="thead-dark">
				<tr>
					<th class="th_center">صورة الكفيل</th>
					<th class="th_center">أسم الكفيل</th>
					<th class="th_center">عنوان الولادة</th>
					<th class="th_center">أسم اليتيم</th>
					<th class="th_center">تعديل المعلومات</th>

				</tr>
				</thead>

				<tbody>
			';
			if($data->num_rows() > 0)
			{
			foreach($data->result() as $row)
			{
			$output .= '
			<tr>
			<td class="td_center"><img class="img_table"src="'.base_url().'assest/images/sponsor/'.$row->s_img.'"></td>
			<td class="td_center" id="th_height">'.$row->s_name.'</td>
			<td class="td_center" id="th_height1">'.$row->s_adress.'</td>
			<td class="td_center" id="th_height1">'.$row->o_name.'</td>
			<td class="td_center" id="th_height2">
				<a class="btn btn-danger" href="'.base_url().'Admin/Delete_sponsor/'.$row->s_id.'" role="button">حذف الكفيل</a>
			</td>
			</tr>
			';
			}
			}
			else
			{
			$output .= '
				<tr>
					<td colspan="5">No Data Found</td>
				</tr>';
			}
			$output .= '
			</tbody>
			</table>
			</div>
		
		';
		echo $output;
	}

}
