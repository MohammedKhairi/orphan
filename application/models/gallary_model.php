<?php
class gallary_model extends CI_Model
{
    public function get()
	{
		$this->db->order_by('g_id','DESC');
		$query = $this->db->get('gallary');
		return $query->result_array();
    }
    // get gallary for main page
    public function get_all()
	{
        $this->db->select('*');
        $this->db->from('gallary');
        $this->db->join('g_img', 'g_img.g_i_id = gallary.g_id');
        $this->db->order_by('gallary.g_id', 'DESC');
        $this->db->group_by("g_img.g_i_id ");
		$this->db->limit(12);  

        $query = $this->db->get();
        return $query->result_array();
    }
	//  عرض للمستخدم مجلة معينة

    public function get_all_images($id)
	{
		$conditions = array('g_id' => $id);
        $this->db->select('*');
        $this->db->from('gallary');
        $this->db->join('g_img', 'g_img.g_i_id = gallary.g_id');
		$this->db->where($conditions);
        $this->db->order_by('gallary.g_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    //  عرض  مجلة معينة

    public function get_all_num_images($id)
	{
		$conditions = array('g_id' => $id);
        $this->db->select('*');
        $this->db->from('gallary');
        $this->db->join('g_img', 'g_img.g_i_id = gallary.g_id');
		$this->db->where($conditions);
        $this->db->order_by('gallary.g_id', 'DESC');
        $num_images = $this->db->get()->num_rows();
		return $num_images;
    }

    public function get_one()
	{
        $this->db->where('g_id', $id);
		$result = $this->db->get('gallary');
		return $result->row(0)->g_title;
    }
    public function get_one_all($id)
	{
        $this->db->where('g_id', $id);
		$result = $this->db->get('gallary');
        return $result->result_array();
    }


    
    public function create($data)
	{
        return $this->db->insert('gallary', $data);
    }

    public function insert_img($data)
	{
        return $this->db->insert('g_img', $data);
    }
    // كل الصور في المجلة الواحدة
    public function get_img($id)
    {
        $this->db->select('g_id,g_i_img,g_title');
		$this->db->from('gallary');
		$this->db->join('g_img', 'g_img.g_i_id = gallary.g_id');
		$this->db->where('g_id', $id);
		$query = $this->db->get();
		return $query->result_array();
    }
// update name od the gallary
    public function update_name($id,$data)
    {
        $this->db->where('g_id', $id);
		return $this->db->update('gallary',$data);
    }
    //delete one img from gallary
    public function delete_img($name)
	{
			unlink(FCPATH.'assest/images/gallary/'.$name);
			$this->db->where('g_i_img', $name);
			$this->db->delete('g_img');
			return true;
	}
}
?>