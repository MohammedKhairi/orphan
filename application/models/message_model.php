<?php 

class message_model extends CI_Model
{
	public function get()
	{
		$this->db->where('m_state',0);
		$this->db->order_by(' m_id', 'DESC');
		$query = $this->db->get('message');
		$this->db->limit(20);  
        return $query->result_array();
	}
	public function get_one($id)
	{
		$this->db->where('m_id', $id);
		// $result = $this->db->get('event');
		// return $result->row(2)->e_content;
		$query = $this->db->get('message');
		return $query->result_array();
	}

	public function replay($id,$data_u)
	{
		$this->db->where('m_id', $id);
	    return $this->db->update('message', $data_u);
	}

	public function delete($id)
	{
			$this->db->where('m_id', $id);
			$this->db->delete('message');
			return true;
	}


}
