<?php 

class user_model extends CI_Model
{
	// فحص معلومات تسجيل الدخول للكفيل
	public function ck_user_login_sponsor($email,$pass)
	{
		$this->db->where('s_email', $email);
		$this->db->where('s_pass', $pass);
		$this->db->where('s_active', 1);
		$query = $this->db->get('sponsor');
		if($query->num_rows()>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
			
	}
	//      الحصول على معلومات للكفيل
	public function login_sponsor_info($email)
	{
		$this->db->select('*');
		$this->db->where('s_email', $email);
		$query = $this->db->get('sponsor');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}
			
	}
	
	// فحص معلومات تسجيل الدخول للفرق التطوعية
	public function ck_user_login_team($email,$pass,$t_type)
	{
		$this->db->where('t_email', $email);
		$this->db->where('t_pass', $pass);
		$this->db->where('t_job', $t_type);
		$query = $this->db->get('team');
		if($query->num_rows()>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
			
	}
	//      الحصول على معلومات للفرق التطوعية
	public function login_team_info($email,$t_type)
	{
		$this->db->where('t_email', $email);
		$this->db->where('t_job', $t_type);
		$query = $this->db->get('team');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}
			
	}
	//عدد المهام لكل عضومن اعضاء الفرق جمع التبرعات
	public function get_t_mony_num_task($id)
	{
		$this->db->from('team');
		$this->db->join('support', 'support.sp_t_team = team.t_id');
		$this->db->where('t_job', 1);
		$this->db->where('sp_t_team', $id);
		$this->db->where('sp_state', NULL);
		$query = $this->db->get();
		return $query->num_rows();
	}
	//عدد المهام لكل عضومن اعضاء الفرق رعاية الايتام
	public function get_t_orphan_num_task($id)
	{
		$this->db->from('team');
		$this->db->join('task', 'task.ts_t_id = team.t_id');
		$this->db->where('t_job', 0);
		$this->db->where('t_id', $id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	//عرض مهمة لفرد معين من الفرق التطوعية
	public function one_task_for_team($id)
	{
		$this->db->from('support');
		$this->db->where('sp_id', $id);
		$this->db->where('sp_state', NULL);
		$query = $this->db->get();
		//print_r($query->result());exit;
		return $query->result_array();
	}
	// تحديث معلومات المستخدمين  فرق تطوعية او كفيل
	public function Update($data)
	{
		//sponsor
		if($this->session->userdata['user_type']==1)
		{
			 $this->db->where('s_id', $this->session->userdata['uid']);
	   		 return $this->db->update('sponsor', $data);
		}
		//team
		else
		{
			$this->db->where('t_id', $this->session->userdata['uid']);
			return $this->db->update('team', $data);

		}
	}
	//تحديث المعلومات
	public function insert_new_orphan($data,$id)
	{
			 $this->db->where('o_id',$id);
	   		 return $this->db->update('orphan', $data);
		

	}
	//تحديث الايميل في جدول اليتيم
	public function Update_email_orphan($data,$old_email)
	{
			 $this->db->where('o_e_sponser',$old_email);
	   		 return $this->db->update('orphan', $data);
		

	}
	
	//اضافة يتيم جديد الى الكفيل

	//ارسال رسالة او استفسار الى المؤسسة
	public function u_message($data)
	{
        return $this->db->insert('message', $data);

	}
	//اضافة عضو جديد الى الفرق التطوعية
	public function new_m_teame($data)
	{
        return $this->db->insert('team', $data);
	}
	//اضافة تعليق
	public function add_comment($data)
	{
        return $this->db->insert('comments', $data);
	}
	//الحصول على جميع التعليقات
	public function get_comments($id)
	{
		$conditions = array('e_id' => $id);
		$this->db->select('c_id,c_u_name,c_content,c_date,c_event_id');
        $this->db->from('comments');
        $this->db->join('event', 'event.e_id = comments.c_event_id');
		$this->db->order_by('c_date', 'DESC');
		$this->db->where($conditions);
		//$this->db->limit(0, 10);  
		$query = $this->db->get();
        return $query->result_array();
	}
	//الحصول على عدد التعليقات
	public function get_num_comments($id)
	{
		$this->db->where('c_event_id',$id);
		$this->db->from('comments');
		$id = $this->db->get()->num_rows();
		return $id;
	}
	// للفرق الجوالة فحص اذا كان الايميل موجود
	public function check_email_is_exist($email,$job_type)
	{
		$this->db->where('t_email',$email);
		$this->db->where('t_job',$job_type);
		$this->db->where('t_active =', 1);
		$this->db->from('team');
		$id = $this->db->get()->num_rows();
		return $id;
	}
	// للكفيل   فحص اذا كان الايميل موجود
	public function check_email_is_exist_s($email)
	{
		$this->db->where('s_email',$email);
		$this->db->where('s_active =', 1);
		$this->db->from('sponsor');
		$id = $this->db->get()->num_rows();
		return $id;
	}
	//اضافة جديد  
	public function new_m_sponsor($data)
	{
        return $this->db->insert('sponsor', $data);
	}
	public function add_support($data)
	{
        $insert = $this->db->insert('support', $data);
        return $insert;
	}
	//عرض جميع التبرعات المخصصة
	public function get_support()
	{
		//$this->db->limit(20);
		$this->db->order_by('sp_id','DESC');
		$this->db->where('sp_t_team !=', NULL);
		$this->db->where('sp_state', NULL);
		$query = $this->db->get('support');
		return $query->result_array();
	}
	//عرض جميع التبرعات  الغير المخصصة
	public function get_support_not()
	{
		$this->db->limit(20);
		$this->db->order_by('sp_id','DESC');
		$this->db->where('sp_t_team', NULL);
		$this->db->where('sp_state', NULL);
		$query = $this->db->get('support');
		return $query->result_array();
	}
	//عرض معلومات التبرع
	public function get_one_support($id)
	{
		$this->db->limit(20);
		$this->db->order_by('sp_id','DESC');
		$this->db->where('sp_id', $id);
		$this->db->where('sp_state', NULL);
		$query = $this->db->get('support');
		return $query->result_array();
	}
	//حذفت التبرع 
	public function delete_supportes($sp_id)
	{

			$this->db->where('sp_id', $sp_id);
			$this->db->delete('support');
			return true;
	}
	//اعطاء المهمة جمع التبرع الى احد اعضاء فرقة جمع التبرعات
	public function support_team_give($data,$sp_id)
	{
		$this->db->where('sp_id', $sp_id);
	    return $this->db->update('support', $data);
			
	}
	

}
