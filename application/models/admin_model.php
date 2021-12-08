<?php 

class admin_model extends CI_Model
{

    public function Edit_admin()
	{

		$query = $this->db->get('admin');
		return $query->result_array();
			
	}

	public function update($data)
	{

	    return $this->db->update('admin', $data);
			
	}
	public function delete_img()
	{
		$image_file_name = $this->db->select('a_img')->get_where('admin', array('a_id' => '0'))->row()->a_img;
			unlink(FCPATH.'assest/images/admin/'.$image_file_name);
			return true;
	}
	public function get_admin()
	{

		$query = $this->db->get('admin');
		return $query->result_array();
			
	}
	public function ck_admin($name,$pass)
	{
		$this->db->where('a_a_name', $name);
		$this->db->where('a_pass', $pass);
		$query = $this->db->get('admin');
		if($query->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
			
	}
    	
}