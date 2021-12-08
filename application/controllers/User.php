<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/*public function send()
	{
		$key_activated=rand(1,15);
		$config['useragent'] = 'CodeIgniter';
		$config['protocol'] = 'smtp';
		//$config['mailpath'] = '/usr/sbin/sendmail';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_user'] = 'wee11175@gmail.com';
		$config['smtp_pass'] = 'wee12345@';
		$config['smtp_port'] = 465; 
		$config['smtp_timeout'] = 5;
		$config['wordwrap'] = TRUE;
		$config['wrapchars'] = 76;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['validate'] = FALSE;
		$config['priority'] = 3;
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['bcc_batch_mode'] = FALSE;
		$config['bcc_batch_size'] = 200;
		$this->email->initialize($config);
		$this->load->library('email'); // Note: no $config param needed
		$this->email->from('wee11175@gmail.com', 'wee11175@gmail.com');
		$this->email->to('mohammed.98.cs@gmail.com');
		$this->email->subject('التحقق من الايميل الشخصي');
		$this->email->message('رمز التفعيل'.$key_activated);
         //Send email
		$this->email->send();
		$this->session->set_flashdata("email_sent","الرجاء قم بأدخال الرقم السري الذي ارسلناه لك على الايميل"); 
	 
		$this->session->set_flashdata("email_sent","هناك خطأ في عنوان بريدك الالكتروني"); 
		
		redirect(base_url().'Team/Email_Check',$cont_data);

	}*/
	//تسجيل الدخول كل الاعضاء 
	public function log_in()
	{
       //redirect('user/register');
		$this->load->view('user/login');
	}
	//فحص معلومات تسجيل الدخول
	public function check_login()
	{
		$type=$this->input->post('type');
		if($type==2)
		{
	  		$this->form_validation->set_rules('team_type', 'Type of Team  ', 'required');
		}
	
		$this->form_validation->set_rules('email', 'User Email ', 'required');
		$this->form_validation->set_rules('pass', 'password', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		if($this->form_validation->run() === FALSE)
		{
			
	     	$this->load->view('User/Login');
		}
		else
		{
			$this->load->database();
			$this->load->model('user_model');
			$email=$this->input->post('email');
			$upass=md5($this->input->post('pass'));
			$utype=$this->input->post('type');
		   // echo '=='.$email.'=='.$upass.'=='.$utype;exit;
		   // فحص والحصول على المعلومات للكفيل
			if($utype==1)
			{
				$user_s=$this->user_model->ck_user_login_sponsor($email,$upass);
				//information is true
				if($user_s==1)
				{
					$sponsor_info=$this->user_model->login_sponsor_info($email);
					if($sponsor_info!= false)
					{
						$session_data=array(
							'user_login'=>1,
							'user_type'=>1,
							'uid'=>$sponsor_info[0]->s_id,
							'uname'=>$sponsor_info[0]->s_name,
							'upass'=>$sponsor_info[0]->s_pass,
							'uemail'=>$sponsor_info[0]->s_email,
							'uimg'=>$sponsor_info[0]->s_img,
							'uphone'=>$sponsor_info[0]->s_phone,
							'uaddress'=>$sponsor_info[0]->s_adress
						   );
						$this->session->set_userdata($session_data);
						redirect(base_url());
					}
   
				}
				   //information is false for sponsor
				if($user_s==0)
				{
					 $this->session->set_flashdata('error',' لقد ادخلت  ايميل او رمز سري خطأ الرجاء التأكد من المعلومات');
					 redirect(base_url().'User/Login');
				}

			}
			// فحص والحصول على المعلومات للفرق الجوالة
			else if($utype==2)
			{   
				$uteam_type=$this->input->post('team_type');
				$user_s=$this->user_model->ck_user_login_team($email,$upass,$uteam_type);
				
				if($user_s==1)
				{
					$team_info=$this->user_model->login_team_info($email,$uteam_type);
					if($team_info!= false)
					{
						$session_data=array(
							'user_login'=>1,
							'user_type'=>2,
							'uid'=>$team_info[0]->t_id,
							'uname'=>$team_info[0]->t_name,
							'upass'=>$team_info[0]->t_pass,
							'uemail'=>$team_info[0]->t_email,
							'uimg'=>$team_info[0]->t_img,
							'uphone'=>$team_info[0]->t_phone,
							'uaddress'=>$team_info[0]->t_adress,
							'ujob'=>$team_info[0]->t_job,
						   );
						$this->session->set_userdata($session_data);
						redirect(base_url());
					}
   
				}
				   //information is false
				if($user_s==0)
				{
				   //echo 'state is  '.$user_s;exit;
					 $this->session->set_flashdata('error',' لقد ادخلت  ايميل او رمز سري خطأ الرجاء التأكد من المعلومات');
					 redirect(base_url().'User/Login');
				}
			}
			//هناك تلاعب في نوع الدخول
			else
			{
				$this->session->set_flashdata('error',' لقد ادخلت   معلومات خاطئة  الرجاء التأكد من المعلومات');
				redirect(base_url().'User/Login');
			}
			

		}
	}
	//  تسجيل  الخروج  للمستخدمين
	public function logout_user()
	{
		if (isset($this->session->userdata['user_login']))
			{
				if($this->session->userdata['user_login']==1)
				{
					session_destroy ();
					redirect(base_url());
				}
				else
				{
					redirect(base_url());
				}
			}
			else
			{
				redirect(base_url());
			}
		// $this->session->unset_userdata('username');
		// $this->session->unset_userdata('log_in');
		
	}
	//////////////[user profile]/////////////
	// عرض لوحة معلومات المستخدمين عند تسجيل الدخول 
	public function profile()
	{
		if (isset($this->session->userdata['user_login']))
			{
				if($this->session->userdata['user_login']==1)
				{
					$this->load->view('user/temp/header');
					$this->load->view('user/profile');
					$this->load->view('user/temp/footer');
				}
				else
				{
					redirect(base_url().'User/Login');

				}
			}
			else
			{
				redirect(base_url().'User/Login');
			}
		//redirect(base_url().'user/profile');
	}
	//تعديل معلومات المستخدمين عرض الواجهة
	public function profile_edit()
	{
		if (isset($this->session->userdata['user_login']))
			{
				if($this->session->userdata['user_login']==1)
				{
					$this->load->view('user/temp/header');
					$this->load->view('user/profile_edit');
					$this->load->view('user/temp/footer');
				}
				else
				{
					redirect(base_url().'User/Login');

				}
			}
			else
			{
				redirect(base_url().'User/Login');
			}
		//redirect(base_url().'user/profile');
	}
	//تحديث معلومات المستخدمين الكفيل او الفرق التطوعية
	public function update($type)
	{
		//echo'gg';exit;
		if (isset($this->session->userdata['user_login']))
			{
				if($this->session->userdata['user_login']==1)
				{
					//sponsor
					if($this->session->userdata['user_type']==1)
					{
						if($type=="name")
						{
							$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[200]');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال الاسم الجديد في الحقل المطلوب');
								redirect(base_url().'User/Edit_info');
							} 
							$data = array(
								's_name' =>  $this->input->post('name')
							);
							$this->load->database();
							$this->load->model('user_model');
							$this->user_model->Update($data);
							$this->session->userdata['uname']=$this->input->post('name');
							redirect(base_url().'User/Edit_info');
						}
						else if($type=="password")
						{
							$this->form_validation->set_rules('pass', 'Password', 'required|min_length[3]|max_length[200]');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال الرقم السري الجديد في الحقل المطلوب');
								redirect(base_url().'User/Edit_info');
							} 
							$data = array(
								's_pass' => md5($this->input->post('pass'))
							);
							$this->load->database();
							$this->load->model('user_model');
							$this->user_model->Update($data);
							//$this->session->userdata['upass']=$this->input->post('pass');
							redirect(base_url().'User/Edit_info');
						}
						else if($type=="address")
						{
							$this->form_validation->set_rules('address', 'address', 'required|min_length[5]|max_length[200]');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال العنوان الجديد في الحقل المطلوب');
								redirect(base_url().'User/Edit_info');
							} 
							
							$data = array(
								's_adress' =>  $this->input->post('address')
							);
							$this->load->database();
							$this->load->model('user_model');
							$this->user_model->Update($data);
							$this->session->userdata['uaddress']=$this->input->post('address');
							redirect(base_url().'User/Edit_info');
						}
						else if($type=="phone")
						{
							$this->form_validation->set_rules('phone', 'Phone Number', 'required|min_length[11]|max_length[200]');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال  رقم الهاتف الجديد في الحقل المطلوب');
								redirect(base_url().'User/Edit_info');
							}
							$data = array(
								's_phone' =>  $this->input->post('phone')
							);
							$this->load->database();
							$this->load->model('user_model');
							$this->user_model->Update($data);
							$this->session->userdata['uphone']=$this->input->post('phone');
							redirect(base_url().'User/Edit_info');
						}
						else if($type=="email")
						{
							$this->form_validation->set_rules('email', 'Email', 'required');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال  الايميل  الجديد في الحقل المطلوب');
								redirect(base_url().'User/Edit_info');
							}
							$this->load->database();
							$this->load->model('user_model');
							$stat=$this->user_model->check_email_is_exist_s($this->input->post('email'));
							if($stat>0)
							{
								$this->session->set_flashdata('error_edit', 'هذا الايميل مستخدم الرجاء قم بأستخدام ايميل اخر ');
								redirect(base_url().'User/Edit_info');
							}
								// send email to sponsor
								$this->load->library('email');
								$config['useragent'] = 'CodeIgniter';
								$config['protocol'] = 'smtp';
								//$config['mailpath'] = '/usr/sbin/sendmail';
								$config['smtp_host'] = 'ssl://smtp.googlemail.com';
								$config['smtp_user'] = 'wee11175@gmail.com';
								$config['smtp_pass'] = 'wee12345@';
								$config['smtp_port'] = 465; 
								$config['smtp_timeout'] = 5;
								$config['wordwrap'] = TRUE;
								$config['wrapchars'] = 76;
								$config['mailtype'] = 'html';
								$config['charset'] = 'utf-8';
								$config['validate'] = FALSE;
								$config['priority'] = 3;
								$config['crlf'] = "\r\n";
								$config['newline'] = "\r\n";
								$config['bcc_batch_mode'] = FALSE;
								$config['bcc_batch_size'] = 200;
								$this->email->initialize($config);
								$this->load->library('email'); // Note: no $config param needed
								$this->email->from('wee11175@gmail.com', 'wee11175@gmail.com');
								$this->email->to($this->input->post('email'));
								$this->email->subject('التحقق من الايميل الشخصي');
								$this->email->message('لقد تم تغير ايميلك الى الايميل الحالي '.$this->input->post('email'));
								//Send email
								if($this->email->send())
								{
									$data = array(
										's_email' =>  $this->input->post('email')
									);
									$this->load->database();
									$this->load->model('user_model');
									$this->user_model->Update($data);
									// update email in orphan table
									$data = array(
										'o_e_sponser' =>  $this->input->post('email')
									);
									$this->user_model->Update_email_orphan($data,$this->session->userdata['uemail']);

									$this->session->userdata['uemail']=$this->input->post('email');
									redirect(base_url().'User/Edit_info');
								}
								//email not send
								else
								{
								$this->session->set_flashdata('error_edit', 'هناك خطأ في الايميل او الاتصال الرجاء اعادة المحاولة ');
									redirect(base_url().'User/Edit_info');
								}
						}
						else if($type=="img")
						{
							$fileExt = pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);
							$config['upload_path'] = './assest/images/sponsor';
							$config['allowed_types'] = 'jpg|JPG';
							$config['max_size'] = '1000';
							$config['max_width'] = '2000';
							$config['max_height'] = '2000';
							$config['file_name'] = date("Y_m_d").time().'.'.$fileExt;
						    
							// add new img
							$this->load->library('upload', $config);
							if(!$this->upload->do_upload('userfile'))
								{
									$this->session->set_flashdata('error_edit', 'الرجاء قم بأختيار  صورة جديدة تناسب الشروط  في الحقل المطلوب');
									redirect(base_url().'User/Edit_info');
								} 
								else 
								{
									//delete old img
									unlink(FCPATH.'assest/images/sponsor/'.$this->session->userdata['uimg']);
									$data = array(
										's_img' => date("Y_m_d").time().'.'.$fileExt
									);
									$this->load->database();
									$this->load->model('user_model');
									$this->user_model->Update($data);
									$this->session->userdata['uimg']=date("Y_m_d").time().'.'.$fileExt;
									redirect(base_url().'User/Edit_info');

								}

						}
						else
						{
							redirect(base_url().'User/Edit_info');
						}
		
						
					}
					//team
					else
					{
						if($type=="name")
						{
							$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[200]');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال   الاسم الجديد في الحقل المطلوب');

								redirect(base_url().'User/Edit_info');
							}
							$data = array(
								't_name' =>  $this->input->post('name')
							);
							$this->load->database();
							$this->load->model('user_model');
							$this->user_model->Update($data);
							$this->session->userdata['uname']=$this->input->post('name');
							redirect(base_url().'User/Edit_info');

						}
						else if($type=="password")
						{
							$this->form_validation->set_rules('pass', 'Password', 'required|min_length[3]|max_length[200]');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال   اللرقم السري الجديد في الحقل المطلوب');
								redirect(base_url().'User/Edit_info');
							}
							$data = array(
								't_pass' => md5($this->input->post('pass'))
							);
							$this->load->database();
							$this->load->model('user_model');
							$this->user_model->Update($data);
							//$this->session->userdata['upass']=$this->input->post('pass');
							redirect(base_url().'User/Edit_info');
						}
						else if($type=="address")
						{
							$this->form_validation->set_rules('address', 'address', 'required|min_length[5]|max_length[200]');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال   العنوان الجديد في الحقل المطلوب');
								redirect(base_url().'User/Edit_info');
							}
							$data = array(
								't_adress' =>  $this->input->post('address')
							);
							$this->load->database();
							$this->load->model('user_model');
							$this->user_model->Update($data);
							$this->session->userdata['uaddress']=$this->input->post('address');
							redirect(base_url().'User/Edit_info');
						}
						else if($type=="phone")
						{
							$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[11]|max_length[200]');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال  رقم الهاتف الجديد في الحقل المطلوب');

								redirect(base_url().'User/Edit_info');
							}
							$data = array(
								't_phone' =>  $this->input->post('phone')
							);
							$this->load->database();
							$this->load->model('user_model');
							$this->user_model->Update($data);
							$this->session->userdata['uphone']=$this->input->post('phone');
							redirect(base_url().'User/Edit_info');
						}
						else if($type=="email")
						{
							$this->form_validation->set_rules('email', 'Email', 'required');
							if($this->form_validation->run() === FALSE)
							{
								$this->session->set_flashdata('error_edit', 'الرجاء قم بادخال  الايميل  الجديد في الحقل المطلوب');
								redirect(base_url().'User/Edit_info');
							}
							$this->load->database();
							$this->load->model('user_model');
							$stat=$this->user_model->check_email_is_exist($this->input->post('email'),$this->session->userdata['ujob']);
							if($stat>0)
							{
								$this->session->set_flashdata('error_edit', 'هذا الايميل مستخدم الرجاء قم بأستخدام ايميل اخر ');
								redirect(base_url().'User/Edit_info');
							}
								// send email to sponsor
								$this->load->library('email');
								$config['useragent'] = 'CodeIgniter';
								$config['protocol'] = 'smtp';
								//$config['mailpath'] = '/usr/sbin/sendmail';
								$config['smtp_host'] = 'ssl://smtp.googlemail.com';
								$config['smtp_user'] = 'wee11175@gmail.com';
								$config['smtp_pass'] = 'wee12345@';
								$config['smtp_port'] = 465; 
								$config['smtp_timeout'] = 5;
								$config['wordwrap'] = TRUE;
								$config['wrapchars'] = 76;
								$config['mailtype'] = 'html';
								$config['charset'] = 'utf-8';
								$config['validate'] = FALSE;
								$config['priority'] = 3;
								$config['crlf'] = "\r\n";
								$config['newline'] = "\r\n";
								$config['bcc_batch_mode'] = FALSE;
								$config['bcc_batch_size'] = 200;
								$this->email->initialize($config);
								$this->load->library('email'); // Note: no $config param needed
								$this->email->from('wee11175@gmail.com', 'wee11175@gmail.com');
								$this->email->to($this->input->post('email'));
								$this->email->subject('التحقق من الايميل الشخصي');
								$this->email->message('لقد تم تغير ايميلك الى الايميل الحالي '.$this->input->post('email'));
								//Send email
								if($this->email->send())
								{
									$data = array(
										't_email' =>  $this->input->post('email')
									);
									$this->load->database();
									$this->load->model('user_model');
									$this->user_model->Update($data);
									$this->session->userdata['uemail']=$this->input->post('email');
									redirect(base_url().'User/Edit_info');
								}
								//email not send
								else
								{
								$this->session->set_flashdata('error_edit', 'هناك خطأ في الايميل او الاتصال الرجاء اعادة المحاولة ');
									redirect(base_url().'User/Edit_info');
								}
						}
						else if($type=="img")
						{
							$fileExt = pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);
							$config['upload_path'] = './assest/images/teames';
							$config['allowed_types'] = 'jpg|JPG';
							$config['max_size'] = '1000';
							$config['max_width'] = '2000';
							$config['max_height'] = '2000';
							$config['file_name'] = date("Y_m_d").time().'.'.$fileExt;
						    
							// add new img
							$this->load->library('upload', $config);
							if(!$this->upload->do_upload('userfile'))
								{
									$this->session->set_flashdata('error_edit', 'الرجاء قم بأختيار  صورة جديدة تناسب الشروط  في الحقل المطلوب');
									redirect(base_url().'User/Edit_info');
								} 
								else 
								{
									//delete old img
									unlink(FCPATH.'assest/images/teames/'.$this->session->userdata['uimg']);
									$data = array(
										't_img' =>  date("Y_m_d").time().'.'.$fileExt
									);
									$this->load->database();
									$this->load->model('user_model');
									$this->user_model->Update($data);
									$this->session->userdata['uimg']=date("Y_m_d").time().'.'.$fileExt;
									redirect(base_url().'User/Edit_info');

								}
						
						}
						else
						{
							redirect(base_url().'User/Edit_info');
						}

					}
					//عمل التحديث


				}
				else
				{
					redirect(base_url().'User/Login');

				}
			}
			else
			{
				redirect(base_url().'User/Login');
			}
		//redirect(base_url().'user/profile');
	}
   
    // عرض مهام   المستخدمين
	public function show_taskes()
	{
		if (isset($this->session->userdata['user_login']))
			{
				if($this->session->userdata['user_login']==1)
				{
					$id=$this->session->userdata['uid'];
					//sponsor
					if($this->session->userdata['user_type']==1)
					{
						$this->load->view('user/temp/header');
						$this->load->view('user/task');
						$this->load->view('user/temp/footer');

					}
					//team
					else
					{
						$this->load->database();
						$this->load->model('user_model');
						if($this->session->userdata['ujob']==1)
						{
							//number of  task for team mony
							$data['num_task']=$this->user_model->get_t_mony_num_task($id);

						}
						else
						{
							//number of  task for team orphan

							$data['num_task']=$this->user_model->get_t_orphan_num_task($id);

						}
						//$num_task =$this->user_model->get_t_mony_num_task($id);
						$this->load->view('user/temp/header');
						$this->load->view('user/task',$data);
						$this->load->view('user/temp/footer');


					}
				}
				else
				{
					redirect(base_url().'User/Login');

				}
			}
			else
			{
				redirect(base_url().'User/Login');
			}
		//redirect(base_url().'user/profile');
	}
   //عرض الاشعارات للمستخدمين
	public function show_notefecation()
	{
		$this->load->view('user/temp/header');
		$this->load->view('user/notefection');
		$this->load->view('user/temp/footer');

	}
// كفالة يتيم جديد  عرض لوحة
public function s_new_orphan()
	{
		$this->load->database();
		$this->load->model('orphan_model');
		$data['orphans'] =$this->orphan_model->get_orphan_n_s();
		$this->load->view('user/temp/header');
		$this->load->view('user/new_orphan',$data);
		$this->load->view('user/temp/footer');

	}
// كفالة يتيم جديد  ادخال المعلومات

	public function insert_s_new_orphan()
	{
		$this->load->database();
		$this->load->model('user_model');
		$data = array(
			'o_e_sponser' => $this->session->userdata['uemail']
		);
		$this->user_model->insert_new_orphan($data, $this->input->post('o_id'));
		redirect(base_url().'User/Sponsor_new_orphan');
		
	}

	//عرض مهام عضومن اعضاء فرقة جمع التبرعات   للمسجلين الدخول
	public function get_team_task()
	{

		if($this->session->userdata('user_login') ==1)
		{
			
			if($this->session->userdata['user_type']==2)
			{
				//team get mony
				if($this->session->userdata['ujob']==1)
				{
					$this->load->database();
					$this->load->model('team_model');
					$data_c['team_mony'] =$this->team_model->t_mony_support($this->session->userdata['uid']);
					$this->load->view('user/temp/header');
					$this->load->view('user/team_task',$data_c);
					$this->load->view('user/temp/footer');

				}
				//team orphan
				else
				{
					$this->load->database();
					$this->load->model('team_model');
					$data_c['team_orphan'] =$this->team_model->get_t_k_task($this->session->userdata['uid']);
					$this->load->view('user/temp/header');
					$this->load->view('user/team_task',$data_c);
					$this->load->view('user/temp/footer');
                     
				}
			
				
			}
			else
			{
				redirect(base_url().'User/Login');
			}
		}
		else
		{
			redirect(base_url().'User/Login');
		}
	}
	//عرض مهمة لفرد معين من الفرق رعاية الايتام
	function one_team_task()
	{
		$output = '';
		$query = '';
		$this->load->model('user_model');
		if($this->input->post('query'))
		{
		$query = $this->input->post('query');
		}
		//echo'eeee'.$query;exit;

			$data = $this->user_model->one_task_for_team($query);
			foreach($data as $row)
				{
				$output .= ' 
				<p class="text-primary" style="margin-bottom: 10px;text-align: center;font-family: El Messiri, sans-serif;direction:rtl;">
				<span style="text-align: right;font-family: El Messiri, sans-serif;direction:rtl;color: #28a745;padding: 0px 0px 0px 7px;
				">   اسم المتبرع:</span>'
				.$row["sp_name"].
				'</p>';

				$output .= ' 
				<p class="text-primary" style="margin-bottom: 10px;text-align: center;font-family: El Messiri, sans-serif;direction:rtl;">
				<span style="text-align: right;font-family: El Messiri, sans-serif;direction:rtl;color: #28a745;padding: 0px 0px 0px 7px;
				">   عنوان المتبرع:</span>'
				.$row["sp_address"].
				'</p>';
				$output .= ' 
				<p class="text-primary" style="margin-bottom: 10px;text-align: center;font-family: El Messiri, sans-serif;direction:rtl;">
				<span style="text-align: right;font-family: El Messiri, sans-serif;direction:rtl;color: #28a745;padding: 0px 0px 0px 7px;
				">   تأريخ التبرع:</span>'
				.date('M d,Y',strtotime($row["sp_date"])).
				'</p>';
				$output .= ' 
				<p class="text-primary" style="margin-bottom: 10px;text-align: center;font-family: El Messiri, sans-serif;direction:rtl;">
				<span style="text-align: right;font-family: El Messiri, sans-serif;direction:rtl;color: #28a745;padding: 0px 0px 0px 7px;
				">   محتوى التبرع:</span>'
				.$row["sp_content"].
				'</p>';


				}
		echo $output;
	}


	///////////////[Team]//////////////

	//team check info and send him to email check
	public function add_member_t()
	{    
		$click=$this->input->post('submit');
		if(isset($click)!=1)
		{
			redirect(base_url().'Team');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[11]|max_length[200]');
		$this->form_validation->set_rules('adress', 'Adress', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'أنظم الى الفرق التطوعية';
			$this->load->view('templat/header',$data);
			$this->load->view('main/team');
			$this->load->view('templat/footer');
		} 
		else 
		{       // check if the email already is use
			//data
			$this->load->database();
			$this->load->model('user_model');
			//echo $this->input->post('team_type');exit;
			$stat=$this->user_model->check_email_is_exist($this->input->post('email'),$this->input->post('team_type'));
			if($stat>0)
			{
				$this->session->set_flashdata('m_team_add', ' لقد سبق و أن قمت بتسجيل الدخول بهذا الايميل   قم بتسجيل الدخول الى حسابك او أختر عنوان ايميل جديد   ');
				redirect(base_url().'Team');
			}	
				// send email with key

				$this->load->library('email');
				$config['useragent'] = 'CodeIgniter';
				$config['protocol'] = 'smtp';
				//$config['mailpath'] = '/usr/sbin/sendmail';
				$config['smtp_host'] = 'ssl://smtp.googlemail.com';
				$config['smtp_user'] = 'wee11175@gmail.com';
				$config['smtp_pass'] = 'wee12345@';
				$config['smtp_port'] = 465; 
				$config['smtp_timeout'] = 5;
				$config['wordwrap'] = TRUE;
				$config['wrapchars'] = 76;
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['validate'] = FALSE;
				$config['priority'] = 3;
				$config['crlf'] = "\r\n";
				$config['newline'] = "\r\n";
				$config['bcc_batch_mode'] = FALSE;
				$config['bcc_batch_size'] = 200;
				$this->email->initialize($config);
				$this->load->library('email'); // Note: no $config param needed
				$this->email->from('wee11175@gmail.com', 'wee11175@gmail.com');
				$this->email->to($this->input->post('email'));
				$this->email->subject('التحقق من الايميل الشخصي');
				$this->email->message('شكرا لكم للانضمام  الى الموسسة  الرجاء قم بزيارة المؤسسة من اجل مقابلة المسؤل');

		        //Send email
				if($this->email->send())
				{
					$fileExt = pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);
					$config['upload_path'] = './assest/images/teames';
					$config['allowed_types'] = 'jpg';
					$config['max_size'] = '2048';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
					$config['file_name'] =  date("Y_m_d").time().'.'.$fileExt;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('userfile'))
					{
					
						$errors = array('error' => $this->upload->display_errors());
						$data['title'] = ' أنظم ألينا';
						$this->load->view('templat/header',$data);
						$this->load->view('main/team',$errors);
						$this->load->view('templat/footer');
					} 
					else 
					{
					    $cont_data = array(
						't_name' => strip_tags( $this->input->post('name')),
						't_email' =>strip_tags(  $this->input->post('email')),
						't_pass' => md5($this->input->post('pass')),
						't_phone' =>  strip_tags($this->input->post('phone')),
						't_adress' =>  strip_tags($this->input->post('adress')),
						't_job' =>  strip_tags($this->input->post('team_type')),
						't_active' =>  0,
						't_img' =>   date("Y_m_d").time().'.'.$fileExt
						);
						$this->load->database();
						$this->load->model('user_model');
						$this->user_model->new_m_teame($cont_data);
						$this->session->set_flashdata('m_team_add', 'شكرا لك  للتسجيل الرجاء قم بزيارة المؤسسة لمقابلة المسؤل ');
						redirect(base_url().'Team');

					}
				}
				else
				{
					$this->session->set_flashdata("email_error","هناك خطأ في عنوان بريدك الالكتروني او خطأ في الاتصال"); 
				    redirect(base_url().'Team');
				}
			

		}
	}
	///////////////[Sponsor]//////////////


	//Sponsor check info and send him to email check
	public function add_member_s()
	{    
		$click=$this->input->post('submit');
		if(isset($click)!=1)
		{
			redirect(base_url().'Sponsor');
		}
			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('pass', 'Password', 'required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[11]|max_length[200]');
			$this->form_validation->set_rules('address', 'Adress', 'required|min_length[5]|max_length[200]');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'اكفل احد الايتام';
			$this->load->model('orphan_model');
			$data_cont['orphans'] =$this->orphan_model->get_orphan_n_s();
			$this->load->view('templat/header',$data);
			$this->load->view('main/sponsor',$data_cont);
			$this->load->view('templat/footer');
		} 
		else 
		{    // check if the email already is use
			//data
			$this->load->database();
			$this->load->model('user_model');
			$stat=$this->user_model->check_email_is_exist_s($this->input->post('email'));
			if($stat>0)
			{
				$this->session->set_flashdata('email_error', ' لقد سبق و أن قمت بتسجيل الدخول بهذا الايميل   قم بتسجيل الدخول الى حسابك او أختر عنوان ايميل جديد   ');
				redirect(base_url().'Sponsor');
			}
				
				// send email with key
				$this->load->library('email');
				$config['useragent'] = 'CodeIgniter';
				$config['protocol'] = 'smtp';
				//$config['mailpath'] = '/usr/sbin/sendmail';
				$config['smtp_host'] = 'ssl://smtp.googlemail.com';
				$config['smtp_user'] = 'wee11175@gmail.com';
				$config['smtp_pass'] = 'wee12345@';
				$config['smtp_port'] = 465; 
				$config['smtp_timeout'] = 5;
				$config['wordwrap'] = TRUE;
				$config['wrapchars'] = 76;
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['validate'] = FALSE;
				$config['priority'] = 3;
				$config['crlf'] = "\r\n";
				$config['newline'] = "\r\n";
				$config['bcc_batch_mode'] = FALSE;
				$config['bcc_batch_size'] = 200;
				$this->email->initialize($config);
				$this->load->library('email'); // Note: no $config param needed
				$this->email->from('wee11175@gmail.com', 'wee11175@gmail.com');
				$this->email->to($this->input->post('email'));
				$this->email->subject('التحقق من الايميل الشخصي');
				$this->email->message('شكرا لكم للانضمام  الى الموسسة الرجاء قم بزيارة المؤسسة من اجل مقابلة المسؤل');
		        //Send email
				if($this->email->send())
				{
				    $fileExt = pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);
					$config['upload_path'] = './assest/images/sponsor';
					$config['allowed_types'] = 'jpg';
					$config['max_size'] = '2048';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
					$config['file_name'] = date("Y_m_d").time().'.'.$fileExt;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('userfile'))
					{
		
						$data_cont['error'] = array('error' => $this->upload->display_errors());
						$data['title'] = 'اكفل احد الايتام';
						$this->load->model('orphan_model');
						$data_cont['orphans'] =$this->orphan_model->get_orphan();

						$this->load->view('templat/header',$data);
						$this->load->view('main/sponsor',$data_cont);
						$this->load->view('templat/footer');
					} 
					else 
					{
						$cont_data = array(
							's_name' => strip_tags( $this->input->post('name')),
							's_email' =>strip_tags(  $this->input->post('email')),
							's_pass' => md5($this->input->post('pass')),
							's_phone' =>  strip_tags($this->input->post('phone')),
							's_adress' =>  strip_tags($this->input->post('address')),
							's_img' => date("Y_m_d").time().'.'.$fileExt
						);
						//data
						$this->load->database();
						$this->load->model('user_model');
						$this->user_model->new_m_sponsor($cont_data);
						//اضافة ايميل الكفيل الى معلومات اليتيم 
				

						$o_id=$this->input->post('o_id') ;
						$data_u=array(
							'o_e_sponser' =>$cont_data['s_email'],
						);
						
						$this->load->model('orphan_model');
						$this->orphan_model->orphan_sponsor_update($o_id,$data_u);
						
						
						$this->session->set_flashdata('m_sponsor_add', 'شكرا لكم للانضمام  الى الموسسة الرجاء قم بزيارة المؤسسة من اجل مقابلة المسؤل ');
						redirect(base_url().'Sponsor');


					}
				}
				else
				{
					$this->session->set_flashdata("email_error","هناك خطأ في عنوان بريدك الالكتروني او خطأ في الاتصال"); 
					redirect(base_url().'Sponsor');
				}
			
						

		}
	}
	// أضافة تعليق
	public function add_comment()
	{
		$click=$this->input->post('submit');
		if(isset($click)!=1)
		{
			redirect(base_url().'News');
		}

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('event_id', 'event id', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'عرض الحدث';

		$this->load->model('news_model');
		$this->load->model('user_model');
		$data_cont['comments']=$this->user_model->get_comments($this->input->post('event_id'));
		$data_cont['num_comments']=$this->user_model->get_num_comments($this->input->post('event_id'));
		$data_cont['events']=$this->news_model->get_n($this->input->post('event_id'));
	
		$this->load->view('templat/header',$data);
		$this->load->view('main/show_new',$data_cont);
		$this->load->view('templat/footer');
		
		} 
		else 
		{
			//data
			$cont_data = array(
				'c_event_id' => strip_tags( $this->input->post('event_id')),
				'c_u_name' =>strip_tags(  $this->input->post('name')),
				'c_content' => strip_tags($this->input->post('body')),				
			);
			$this->load->database();
			$this->load->model('user_model');
			$this->user_model->add_comment($cont_data);
			$this->session->set_flashdata('comment_add', 'شكرا لك على أضافة تعليق ');
			redirect(base_url().'News/Show_Event/'.$this->input->post('event_id'));
	
		}
	}
	//اضافة التبرع =ملابس
	public function s_clothes()
	{
		$click=$this->input->post('submit');
		if(isset($click)!=1)
		{
			redirect(base_url().'Support');
		}

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[11]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'قدم الدعم في احتياجاتنا';
			$this->load->view('templat/header',$data);
			$this->load->view('main/support');
			$this->load->view('templat/footer');
		
		} 
		else 
		{
			// support type 1=clothes
			$cont_data = array(
				'sp_name' =>strip_tags(  $this->input->post('name')),
				'sp_email' =>strip_tags(  $this->input->post('email')),
				'sp_phone' =>strip_tags(  $this->input->post('phone')),
				'sp_address' =>strip_tags(  $this->input->post('address')),
				'sp_content' =>strip_tags(  $this->input->post('content')),
				'sp_type' =>1
			
			);

			$this->load->database();
			$this->load->model('user_model');
			$this->user_model->add_support($cont_data);
			$this->session->set_flashdata('support_add', 'شكرا لك على التبرع للأيتام.......  معا لمستقبل افضل   ');
			redirect(base_url().'Support');
	
		}
	}
	//اضافة التبرع =دواء
	public function s_medical()
	{
		$click=$this->input->post('submit');
		if(isset($click)!=1)
		{
			redirect(base_url().'Support');
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[11]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'قدم الدعم في احتياجاتنا';
			$this->load->view('templat/header',$data);
			$this->load->view('main/support');
			$this->load->view('templat/footer');
		
		} 
		else 
		{
			// support type 2=medical
			$cont_data = array(
				'sp_name' =>strip_tags(  $this->input->post('name')),
				'sp_email' =>strip_tags(  $this->input->post('email')),
				'sp_phone' =>strip_tags(  $this->input->post('phone')),
				'sp_address' =>strip_tags(  $this->input->post('address')),
				'sp_content' =>strip_tags(  $this->input->post('content')),
				'sp_type' =>2
			
			);

			$this->load->database();
			$this->load->model('user_model');
			$this->user_model->add_support($cont_data);
			$this->session->set_flashdata('support_add', 'شكرا لك على التبرع للأيتام.......  معا لمستقبل افضل   ');
			redirect(base_url().'Support');
	
		}
	}
	//اضافة التبرع =نقود
	public function s_cash()
	{
		$click=$this->input->post('submit');
		if(isset($click)!=1)
		{
			redirect(base_url().'Support');
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[11]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'قدم الدعم في احتياجاتنا';
			$this->load->view('templat/header',$data);
			$this->load->view('main/support');
			$this->load->view('templat/footer');
		
		} 
		else 
		{
			// support type 3=cash
			$cont_data = array(
				'sp_name' =>strip_tags(  $this->input->post('name')),
				'sp_email' =>strip_tags(  $this->input->post('email')),
				'sp_phone' =>strip_tags(  $this->input->post('phone')),
				'sp_address' =>strip_tags(  $this->input->post('address')),
				'sp_content' =>strip_tags(  $this->input->post('content')),
				'sp_type' =>3
			
			);

			$this->load->database();
			$this->load->model('user_model');
			$this->user_model->add_support($cont_data);
			$this->session->set_flashdata('support_add', 'شكرا لك على التبرع للأيتام.......  معا لمستقبل افضل   ');
			redirect(base_url().'Support');
	
		}
	}
	//اضافة التبرع =اماكن سكن
	public function s_home()
	{
		$click=$this->input->post('submit');
		if(isset($click)!=1)
		{
			redirect(base_url().'Support');
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[11]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'قدم الدعم في احتياجاتنا';
			$this->load->view('templat/header',$data);
			$this->load->view('main/support');
			$this->load->view('templat/footer');
		
		} 
		else 
		{
			// support type 4=home
			$cont_data = array(
				'sp_name' =>strip_tags(  $this->input->post('name')),
				'sp_email' =>strip_tags(  $this->input->post('email')),
				'sp_phone' =>strip_tags(  $this->input->post('phone')),
				'sp_address' =>strip_tags(  $this->input->post('address')),
				'sp_content' =>strip_tags(  $this->input->post('content')),
				'sp_type' =>4
			
			);

			$this->load->database();
			$this->load->model('user_model');
			$this->user_model->add_support($cont_data);
			$this->session->set_flashdata('support_add', 'شكرا لك على التبرع للأيتام.......  معا لمستقبل افضل   ');
			redirect(base_url().'Support');
	
		}
	}
	//اضافة التبرع =طعام
	public function s_food()
	{
		$click=$this->input->post('submit');
		if(isset($click)!=1)
		{
			redirect(base_url().'Support');
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[11]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'قدم الدعم في احتياجاتنا';
			$this->load->view('templat/header',$data);
			$this->load->view('main/support');
			$this->load->view('templat/footer');
		
		} 
		else 
		{
			// support type 5=food
			$cont_data = array(
				'sp_name' =>strip_tags(  $this->input->post('name')),
				'sp_email' =>strip_tags(  $this->input->post('email')),
				'sp_phone' =>strip_tags(  $this->input->post('phone')),
				'sp_address' =>strip_tags(  $this->input->post('address')),
				'sp_content' =>strip_tags(  $this->input->post('content')),
				'sp_type' =>5
			
			);

			$this->load->database();
			$this->load->model('user_model');
			$this->user_model->add_support($cont_data);
			$this->session->set_flashdata('support_add', 'شكرا لك على التبرع للأيتام.......  معا لمستقبل افضل   ');
			redirect(base_url().'Support');
	
		}
	}
	// عرض جميع التبرعات المخصصة=لوحة الادمن
	public function show_support()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = ' جميع التبرعات  المخصصة';
		$this->load->model('user_model');
		$data['supportes'] =$this->user_model->get_support();
		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/support/show_su',$data);
		$this->load->view('admin/admin_temp/footer');
	}
	// عرض جميع التبرعات غير المخصصة=لوحة الادمن
	public function show_support_not()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = ' جميع التبرعات الغير مخصصة';

		$this->load->model('user_model');
		$data['supportes'] =$this->user_model->get_support_not();
		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/support/show_su_not',$data);
		$this->load->view('admin/admin_temp/footer');
	}

	//عرض معلومات التبرع= لوحة الادمن
	public function show_one_support($id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$data['title'] = 'معلومات التبرع';
		$this->load->database();

		$this->load->model('user_model');
		$data['supportes'] =$this->user_model->get_one_support($id);

		$this->load->model('team_model');
		$data['t_mony'] =$this->team_model->get_t_mony();

		$this->load->view('admin/admin_temp/header',$data);
	   	$this->load->view('admin/support/view_su',$data);
		$this->load->view('admin/admin_temp/footer');
	}
	//  حذف تبرع
	public function delete_support($sp_id)
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
		}
		$this->load->model('user_model');
		$this->load->database();
		$this->user_model->delete_supportes($sp_id);
		redirect('Admin/Show_support');
	}
//  اعطاء مهمة التبرع الى احد اعضاء الفرق جمع التبرعات
	public function support_give_team($id)
	{
			// support type 5=food
			$cont_data = array(
				'sp_t_team' =>strip_tags(  $this->input->post('sp_team_id')),
			
			);
			$this->load->database();
			$this->load->model('user_model');
			$this->user_model->support_team_give($cont_data,$id);
			redirect(base_url().'Admin/Show_support');
	
		
	}


}
