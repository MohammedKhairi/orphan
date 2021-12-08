<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news extends CI_Controller {
// عرض الاخبار
public function show_n()
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'جميع الاخبار و الاحداث';
    $this->load->model('news_model');
    $data_cont['events']=$this->news_model->get();

    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/news/show_n',$data_cont);
    $this->load->view('admin/admin_temp/footer');
}
// عرض  لوحة اضافة خبر
public function add_n()
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'أضافة خبر أو حدث جديد';

    $this->load->model('gallary_model');
    $data_cont['gallaries']=$this->gallary_model->get();

    $this->load->view('admin/admin_temp/header',$data);
    $this->load->view('admin/news/add_n',$data_cont);
    $this->load->view('admin/admin_temp/footer');
}

//    اضافة الخبر
public function insert_n()
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    
    $this->form_validation->set_rules('g_id', 'the Gallary', 'required');
    $this->form_validation->set_rules('body', 'the Content of Event', 'required');
    if($this->form_validation->run() === FALSE)
    {
        $data['title'] = ' أضافة خبر أو حدث جديد ';
        $this->load->model('gallary_model');
        $data_cont['gallaries']=$this->gallary_model->get();
        $this->load->view('admin/admin_temp/header',$data);
        $this->load->view('admin/news/add_n',$data_cont);
        $this->load->view('admin/admin_temp/footer');
    } 
    else 
    {
            //data
            $cont_data = array(
                'e_gallary_id' =>  $this->input->post('g_id'),
                'e_content' =>  $this->input->post('body'),
            );

            $this->load->model('news_model');
            $this->news_model->create($cont_data);
            redirect('Admin/Add_News');        
    }
}
//  حذف حدث
public function delete_n($id)
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $this->load->database();
    $this->load->model('news_model');
    $this->news_model->delete($id);
    redirect('Admin/Show_News');
}
//عرض لوحة تعديل معلومات الادمن
public function edit_n($id)
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $data['title'] = 'تعديل معلومات الحدث';
    $this->load->database();

    $this->load->model('news_model');
    $data_cont['events']=$this->news_model->get_one($id);

    $this->load->model('gallary_model');
    $data_cont['gallaries']=$this->gallary_model->get();

    $this->load->view('admin/admin_temp/header',$data);
        $this->load->view('admin/news/edit_n',$data_cont);
        $this->load->view('admin/admin_temp/footer');
}

public function update_n($id)
{
    if($this->session->userdata('log_in') !=1)
	{
        redirect(base_url().'wp-admin');
    }
    $this->form_validation->set_rules('g_id', 'the Gallary', 'required');
    $this->form_validation->set_rules('body', 'the Content of Event', 'required');
    if($this->form_validation->run() === FALSE)
    {
        $data['title'] = 'تعديل معلومات الحدث';
        $this->load->database();
    
        $this->load->model('news_model');
        $data_cont['events']=$this->news_model->get_one($id);
    
        $this->load->model('gallary_model');
        $data_cont['gallaries']=$this->gallary_model->get();
    
        $this->load->view('admin/admin_temp/header',$data);
            $this->load->view('admin/news/edit_n',$data_cont);
            $this->load->view('admin/admin_temp/footer');
    } 
    else 
    {
            //data
            $cont_data = array(
                'e_gallary_id' =>  $this->input->post('g_id'),
                'e_content' =>  $this->input->post('body'),
            );
            $this->load->model('news_model');
            $this->news_model->update($id,$cont_data);
            redirect('Admin/Show_News');        
    }
}
//البحث عن خبر معين
function fetch_n()
	{
		if($this->session->userdata('log_in') !=1)
		{
			redirect(base_url().'wp-admin');
        }
        //echo 'yes';exit;
		$output = '';
		$query = '';
		$this->load->database();
		$this->load->model('news_model');
		if($this->input->post('query'))
		{
		$query = $this->input->post('query');
        }
           if($query=='')
           {
               echo '';
               exit;

           }
			$data = $this->news_model->fetch_data($query);
			$output .= '
			<div class="container">
            <h2 style="text-align: center;font-family: El Messiri, sans-serif;">أخر 10 حدث تم أضافتهم</h2>
            <br>
            <table class="table" style="float:right;direction:rtl;">
                <thead class="thead-dark">
                <tr>
                    <th class="th_center"> عنوان الحدث</th>
                    <th class="th_center">تأريخ الحدث</th>
                    <th class="th_center">محتوى مختصر للحدث</th>
                    <th class="th_center">تعديل المعلومات</th>

                </tr>
                </thead>

                <tbody>
            ';
          //  echo  $data->num_rows();exit;   
			if($data->num_rows() > 0)
			{
                foreach($data->result() as $row)
                {
                $output .= '
                    <tr>
                    <td class="td_center" id="th_height">'.$row->g_title.'</td>
                    <td class="td_center" id="th_height1">'.date('M d,Y',strtotime( $row->e_date)).'</td>
                    <td class="td_center" id="th_height1">'. mb_strcut($row->e_content,0,60,'UTF-8').'</td>
                    <td class="td_center" id="th_height2">
                        <a class="btn btn-success" href="'.base_url().'Edite_News/'.$row->e_id.'" role="button">تحرير</a>
                        <a class="btn btn-danger" href="'.base_url().'Delete_News/'.$row->e_id.'" role="button">حذف</a>
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


}
