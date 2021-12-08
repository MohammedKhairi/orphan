<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
	//عرض صفحة الواجهة الرئيسية
	public function index()
	{
		$data['title'] = 'مؤسسة اليتيم العراقي';
		$data['color_menu']='home';
		$this->load->model('news_model');
		$data_cont['events']=$this->news_model->get_e_home();

		$this->load->view('templat/header',$data);
		$this->load->view('main/home',$data_cont);
		$this->load->view('templat/footer');
	}
	//عرض صفحة  الانضمام الينا

	public function joinus()
	{
		$data['title'] = 'انضم الى مؤسستنا';
		$data['color_menu']='Join_Us';
		$this->load->view('templat/header',$data);
		$this->load->view('main/joinus');
		$this->load->view('templat/footer');
	}
	//عرض صفحة الاخبار او الاحداث 

	public function news($page)
	{
		$data['title'] = 'اخر الاحداث';
		$data['color_menu']='News';

		if($page<=0)
		{
			redirect(base_url().'News/1');
		}
		$post_per_page=5;
		$this->load->database();
		$this->load->model('news_model');
		//number of result
		$data_cont['number_e']=$this->news_model->number_events();
		$number_of_pags=ceil($data_cont['number_e']/ $post_per_page);
		if($page>$number_of_pags)
		{
			redirect(base_url().'News/1');
		}
		else
		{
			$limit_page=($page-1)*$post_per_page;
			//echo $limit_page;exit;
			$data_cont['events']=$this->news_model->get_e($limit_page,$post_per_page);
			// the page iam show
			$data_cont['page']=$page;
			
			$this->load->view('templat/header',$data);
			$this->load->view('main/news',$data_cont);
			$this->load->view('templat/footer');

		}

		
	}
//  عرض للمستخدم حدث معين
	public function show_event($id)
	{
		$data['title'] = 'عرض الحدث';
		$data['color_menu']='News';

		$this->load->model('news_model');
		$num=$this->news_model->get_num_event($id);
		if($num<=0)
		{
			redirect(base_url().'News');
		}

		$data_cont['events']=$this->news_model->get_n($id);
        
		$this->load->model('user_model');
		$data_cont['comments']=$this->user_model->get_comments($id);
		$data_cont['num_comments']=$this->user_model->get_num_comments($id);
		
		$this->load->view('templat/header',$data);
		$this->load->view('main/show_new',$data_cont);
		$this->load->view('templat/footer');
	}
	//عرض صفحة المجلة 

	public function gallary()
	{
		$data['title'] = 'مجموعة من صور الايتام';
		$data['color_menu']='Gallary';

		$this->load->model('gallary_model');
	    $data_cont['gallaries']=$this->gallary_model->get_all();
	
		$this->load->view('templat/header',$data);
		$this->load->view('main/gallary',$data_cont);
		$this->load->view('templat/footer');
	}
	//  عرض للمستخدم مجلة معينة
	public function show_gallary($id)
	{
		$data['title'] = 'عرض المجلة';
		$data['color_menu']='Gallary';


		$this->load->model('gallary_model');
		$num=$this->gallary_model->get_all_num_images($id);
		if($num<=0)
		{
			redirect(base_url().'Gallary');
		}
	    $data_cont['gallaries']=$this->gallary_model->get_all_images($id);
	
		$this->load->view('templat/header',$data);
		$this->load->view('main/show_gallary',$data_cont);
		$this->load->view('templat/footer');
	}
	//عرض صفحة ماذا عنا 

	public function aboutus()
	{
		$data['title'] = 'من نحن';
		$data['color_menu']='About_Us';

		$this->load->view('templat/header',$data);
		$this->load->view('main/aboutus');
		$this->load->view('templat/footer');
	}
	//عرض صفحة الاتصال بنا 

	public function contactus()
	{
		$data['title'] = 'من نحن';
		$data['color_menu']='Contact_Us';

		$this->load->view('templat/header',$data);
		$this->load->view('main/contactus');
		$this->load->view('templat/footer');
	}
	//عرض صفحة دعم المؤسسة 

	public function support()
	{
		$data['title'] = 'قدم الدعم في احتياجاتنا';
		$data['color_menu']='Support';

		$this->load->view('templat/header',$data);
		$this->load->view('main/support');
		$this->load->view('templat/footer');
	}
	//عرض صفحة الكفيل 

	public function sponsor()
	{
		$data['title'] = 'اكفل احد الايتام';
		$data['color_menu']='Join_Us';

		$this->load->model('orphan_model');
		$data_cont['orphans'] =$this->orphan_model->get_orphan_n_s();

		$this->load->view('templat/header',$data);
		$this->load->view('main/sponsor',$data_cont);
		$this->load->view('templat/footer');
	}
	//عرض صفحة الفرق الجوالة 

	public function team()
	{
		$data['title'] = 'أنظم الى الفرق التطوعية';
		$data['color_menu']='Join_Us';

		$this->load->view('templat/header',$data);
		$this->load->view('main/team');
		$this->load->view('templat/footer');
	}

	###################[واجهة المستخدمين مع البيانات]#################
// ارسال رسالة او استفسار
	public function Message()
	{
		$click=$this->input->post('submit');
		if(isset($click)!=1)
		{
			redirect(base_url().'Contact_Us');
		}
		$this->form_validation->set_rules('name', 'Your Name', 'required');
		$this->form_validation->set_rules('email', 'Your Email', 'required');
		$this->form_validation->set_rules('body', 'the Body of message content', 'required');
		
		
		if($this->form_validation->run() === FALSE)
			{
				$data['title'] = 'من نحن';
				$this->load->view('templat/header',$data);
				$this->load->view('main/contactus');
				$this->load->view('templat/footer');

			} 
			else 
			{
					$cont_data = array(
						'm_r_name' =>  $this->input->post('name'),
						'm_r_email' =>  $this->input->post('email'),
						'm_content' =>  $this->input->post('body'),
						'm_state' =>  0
					);
	                
					$this->load->model('user_model');
					$this->user_model->u_message($cont_data);
					$this->session->set_flashdata('message_send', 'لقد تم ارسال الرسالة سوف يتم الرد عبر الايميل في اقرب وقت ممكن');
					redirect(base_url().'Contact_Us');
			}
			
	}

	###################[واجهة المستخدمين مع البيانات]#################

}
