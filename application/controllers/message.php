<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class message extends CI_Controller {
// عرض جميع الرسالة
public function show_m()
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = ' جميع الاسئلة و الاستفسارات ';
    $this->load->model('message_model');
    $data_cont['messages']=$this->message_model->get();

    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/message/show_m',$data_cont);
    $this->load->view('admin/admin_temp/footer');
}
//  حذف الرسالة
public function delete_m($id)
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $this->load->database();
    $this->load->model('message_model');
    $this->message_model->delete($id);
    redirect('Admin/Show_Message');
}

// عرض الرسالة
public function view_m($id)
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'عرض الرسالة';
    $this->load->model('message_model');
    $data_cont['message']=$this->message_model->get_one($id);

    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/message/view_m',$data_cont);
    $this->load->view('admin/admin_temp/footer');
}

// الرد على  الرسالة
public function replay_m($id)
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'الرد على الرسالة';
    $this->form_validation->set_rules('body', 'the replay message content', 'required');
    
    if($this->form_validation->run() === FALSE)
		{
            $this->load->model('message_model');
            $data_cont['message']=$this->message_model->get_one($id);
        
            $this->load->view('admin/admin_temp/header',$data);
            $this->load->view('admin/message/view_m',$data_cont);
            $this->load->view('admin/admin_temp/footer');
		} 
		else 
		{
            $this->load->model('message_model');
            //data
				// $cont_data = array(
				// 	'm_r_id' =>  $id,
				// 	'm_r_content' =>  $this->input->post('body'),
                // );
                //update message state to be 0  un active
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
				$this->email->subject($this->input->post("subj"));
				$this->email->message($this->input->post("body"));
		        //Send email
				if($this->email->send())
				{
                    $data_update = array(
                        'm_state' => 1
                    );
                    $this->load->model('message_model');
                    $this->message_model->replay($id,$data_update);
					$this->session->set_flashdata("email_m_s","لقد تم الرد على الرسالة"); 
                    redirect(base_url().'Admin/Show_Message');
				}
				else
				{
					$this->load->model('message_model');
                    $data_cont['message']=$this->message_model->get_one($id);
                    $this->load->view('admin/admin_temp/header',$data);
                    $this->load->view('admin/message/view_m',$data_cont);
                    $this->load->view('admin/admin_temp/footer');
					$this->session->set_flashdata("email_m_s","لم يتم ارسال الرد الرجاء قم بفحص الانترنيت"); 

				}
               
                
				
        }
        
}



}
