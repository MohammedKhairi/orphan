<?php 

class news_model extends CI_Model
{
	public function get()
	{
		$this->db->order_by('e_id','DESC');
		$this->db->limit(10);  

		$query = $this->db->get('event');

		return $query->result_array();
	}

	// Get news for main page
	public function get_e($limit_page,$post_per_page)
	{
		$this->db->select('g_title,g_id,e_id,e_gallary_id,e_content,e_date');
        $this->db->from('event');
        $this->db->join('gallary', 'gallary.g_id = event.e_gallary_id');
		$this->db->order_by('e_id', 'DESC');
		$this->db->limit($post_per_page,$limit_page);  
		$query = $this->db->get();
        return $query->result_array();
	}
	// get information of event for gallary
	public function get_e_home()
	{
		$this->db->select('g_title,g_id,e_id,e_gallary_id,e_content,e_date');
		$this->db->from('event');
		$this->db->limit(9);  
        $this->db->join('gallary', 'gallary.g_id = event.e_gallary_id');
		$this->db->order_by('e_id', 'DESC');
		$query = $this->db->get();
        return $query->result_array();
	}
	//الحصول على عدد الاخبار
	public function number_events()
	{
		$this->db->select('g_title,g_id,e_id,e_gallary_id,e_content,e_date');
        $this->db->from('event');
        $this->db->join('gallary', 'gallary.g_id = event.e_gallary_id');
		$this->db->order_by('e_id', 'DESC');
		$id = $this->db->get()->num_rows();
		return $id;
	} 
	//الحصول على معلومات حدث معين
	public function get_n($id)
	{
		$conditions = array('e_id' => $id);
		$this->db->select('g_title,g_id,e_id,e_gallary_id,e_content,e_date');
        $this->db->from('event');
        $this->db->join('gallary', 'gallary.g_id = event.e_gallary_id');
		$this->db->order_by('e_id', 'DESC');
		$this->db->where($conditions); 
		$query = $this->db->get();
        return $query->result_array();
	}
	//عرض اذا كان الحدث موجود اولا
	public function get_num_event($id)
	{
		$conditions = array('e_id' => $id);
		$this->db->select('g_title,g_id,e_id,e_gallary_id,e_content,e_date');
        $this->db->from('event');
        $this->db->join('gallary', 'gallary.g_id = event.e_gallary_id');
		$this->db->order_by('e_id', 'DESC');
		$this->db->where($conditions);
		$id = $this->db->get()->num_rows();
		return $id;
	}

	public function get_one($id)
	{
		$this->db->where('e_id', $id);
		// $result = $this->db->get('event');
		// return $result->row(2)->e_content;
		$query = $this->db->get('event');
		return $query->result_array();
	}

	public function create($data)
	{
        return $this->db->insert('event', $data);
	}

	public function delete($id)
	{
			$this->db->where('e_id', $id);
			$this->db->delete('event');
			return true;
	}

	public function update($e_id,$data)
	{

		$this->db->where('e_id', $e_id);
	    return $this->db->update('event', $data);
			
	}

	function fetch_data($query)
    {
		//echo $query;exit;
		$this->db->select('g_title,g_id,e_id,e_gallary_id,e_content,e_date');
        $this->db->from('event');
		$this->db->join('gallary', 'gallary.g_id = event.e_gallary_id');
		$this->db->like('g_title',$query);
		$this->db->or_like('e_date',$query);
		$this->db->order_by('e_id', 'DESC');
		$this->db->limit(10);  
        return $this->db->get();
    }

	
}
