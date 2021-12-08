<?php 

class comment_model extends CI_Model
{
	//الحصول على جميع التعليقات
	public function get()
	{
		$conditions = array('c_state' => 0);
		$this->db->select('c_id,c_u_name,c_content,c_date,c_event_id,');
        $this->db->from('comments');
        $this->db->join('event', 'event.e_id = comments.c_event_id');
		$this->db->order_by('c_date', 'DESC');
		$this->db->where($conditions);
		$this->db->limit(20);  
		$query = $this->db->get();
        return $query->result_array();
	}
	//الخصول على تعليق معين
	public function get_one($id)
	{
		$this->db->where('c_id', $id);
		// $result = $this->db->get('event');
		// return $result->row(2)->e_content;
		$query = $this->db->get('comments');
		return $query->result_array();
	}
// الرد على التعليق
	public function replay($data,$id,$data_c)
	{

		$this->db->insert('replay_c', $data);
		$this->db->where('c_id', $id);
		$this->db->update('comments', $data_c);
		return ;
	}
	// حخف تعليق معين
	public function delete($id)
	{
			$this->db->where('c_id', $id);
			$this->db->delete('comments');
			return true;
	}


}
