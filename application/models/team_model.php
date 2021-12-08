<?php 

class team_model extends CI_Model
{
    // طلبات الانضمام الى الفرق
	public function get_t_request()
	{
		$this->db->select('*');
		$this->db->from('team');
		$this->db->where('t_active', 0);
		$this->db->order_by('t_id','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	//قبول طلب الانضمام كاحد الفرق التطوعية
	public function Update_t_request($t_id,$data)
	{

		$this->db->where('t_id', $t_id);
	    return $this->db->update('team', $data);
			
	}
	//عرض فرق جمع التبرعات
	public function get_t_mony()
	{
		$this->db->select('t_id, t_name,t_adress, t_img');
		$this->db->from('team');
		$this->db->where('t_job', 1);
		$this->db->where('t_active', 1);
		$this->db->order_by('t_id','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	//عرض مهام عضومن اعضاء فرقة جمع التبرعات 
	public function t_mony_support($id)
	{
		$this->db->select('t_id,t_adress,sp_id, ,sp_date,sp_address, sp_content, sp_t_team');
		$this->db->from('team');
		$this->db->join('support', 'support.sp_t_team = team.t_id');
		$this->db->order_by('sp_id','DESC');
		$this->db->where('t_job', 1);
		$this->db->where('t_id', $id);
		$this->db->where('t_active', 1);
		$this->db->where('sp_state', NULL);
		$query = $this->db->get();
		return $query->result_array();
	}
	// انهاءمهمة عضو من اعضاء فرقة جمع التبرعات 
	public function t_mony_support_done($sp_id,$data)
	{
		$this->db->where('sp_id', $sp_id);
	    return $this->db->update('support', $data);
			
	}
//حذف توكيل المهمة لعضو من اعضاء فرقة جمع التبرعات 

	public function t_mony_support_delete($sp_id,$data)
	{
		$this->db->where('sp_id', $sp_id);
	    return $this->db->update('support', $data);
			
	}
    //عرض جميع اعضاء فرق رعاية الايتام
	public function get_t_orphan()
	{
		$this->db->order_by('t_id','DESC');
		$this->db->where('t_job', 0);
		$this->db->where('t_active', 1);
		$query = $this->db->get('team');
		return $query->result_array();
	}
	//عرض مهام عضومن اعضاء فرقة   رعاية الايتام
	public function get_t_k_task($id)
	{
		$this->db->from('task');
		$this->db->where('ts_t_id',$id);
		//$this->db->where('t_active', 1);
		$this->db->order_by('ts_id','DESC');
		$this->db->limit(10);  
		$query = $this->db->get();
		return $query->result_array();
	}
	 //   اضافة  مهام الى احد اعضاء فرق رعاية الايتام
	public function add_t_task($data)
	{
        return $this->db->insert('task', $data);
	}
	  //     حذف توكيل مهام  احد اعضاء فرق رعاية الايتام 
	public function delete_t_task($id)
	{
		$this->db->where('ts_id', $id);
		$this->db->delete('task');
		return true;

	}
	  //     حذف توكيل مهام  احد اعضاء فرق رعاية الايتام  all task
	  public function delete_t_task_all($id)
	  {
		  $this->db->where('ts_t_id', $id);
		  $this->db->delete('task');
		  return true;
	  }  

//حذف  احد اعضاء الفرق التطوعية
	public function delete_team($id)
	{
		$image_file_name = $this->db->select('t_img')->get_where('team', array('t_id' => $id))->row()->t_img;
		unlink(FCPATH.'assest/images/teames/'.$image_file_name);
		$this->db->where('t_id', $id);
		$this->db->delete('team');
		return true;
	}
//حذف مهام احد اعضاء فرق جمع التبرعات
	public function delete_team_m_task($id,$data)
	{
		$this->db->where('sp_t_team', $id);
		return $this->db->update('support', $data);
	}

	
}
