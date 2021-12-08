<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comment extends CI_Controller {
// عرض جميع التعليقات
public function show_c()
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $this->load->database();
    $data['title'] = ' جميع التعليقات  ';
    $this->load->model('comment_model');
    $data_cont['comments']=$this->comment_model->get();

    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/comment/show_c',$data_cont);
    $this->load->view('admin/admin_temp/footer');
}
//  حذف التعليقات
public function delete_c($id)
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $this->load->database();
    $this->load->model('comment_model');
    $this->comment_model->delete($id);
    redirect('Admin/Show_Comment');
}

// عرض تعليق واحد
public function view_c($id)
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'عرض الرسالة';
    $this->load->database();
    $this->load->model('comment_model');
    $data_cont['comment']=$this->comment_model->get_one($id);

    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/comment/view_c',$data_cont);
    $this->load->view('admin/admin_temp/footer');
}

// الرد على التعليق
public function replay_c($id)
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $this->form_validation->set_rules('body', 'the replay message content', 'required');
    if($this->form_validation->run() === FALSE)
		{
            $this->load->database();
            $this->load->model('comment_model');
            $data_cont['comment']=$this->comment_model->get_one($id);
            $this->load->view('admin/admin_temp/header',$data);
            $this->load->view('admin/comment/view_c',$data_cont);
            $this->load->view('admin/admin_temp/footer');
		} 
		else 
		{
              $this->load->database();
            $this->load->model('comment_model');
            //data
				$cont_data = array(
					'c_r_id' =>  $id,
					'c_r_content' =>  strip_tags($this->input->post('body')),
                );
                //update comment state to be 0  un active
                $data_update = array(
					'c_state' => 1
				);
                
				$this->load->model('comment_model');
				$this->comment_model->replay($cont_data,$id,$data_update);
				redirect('Admin/Show_Comment');
        }
        
}



}
