<?php 

class orphan_model extends CI_Model
{
	//فقط الايتام  مكفولين

	public function get_orphan_s()
	{
		$this->db->select('o_id,o_name,o_adress_db,o_img,o_e_sponser,s_id,s_name,s_email');
        $this->db->from('orphan');
        $this->db->join('sponsor', 'sponsor.s_email = orphan.o_e_sponser');
		$this->db->order_by('o_id', 'DESC');
		$this->db->limit(10);  
		$query = $this->db->get();
        return $query->result_array();
	}
	//فقط الايتام الغير مكفولين
	public function get_orphan_n_s()
	{
		$this->db->order_by('o_id','DESC');
		$this->db->where('o_e_sponser', NULL);
		$this->db->limit(10);
		$this->db->order_by('o_id', 'DESC');
		$query = $this->db->get('orphan');
		return $query->result_array();
	}

	public function create($data)
	{
        return $this->db->insert('orphan', $data);
	}
//حذف يتيم
	public function delete_orphan($o_id)
	{
		$image_file_name = $this->db->select('o_img')->get_where('orphan', array('o_id' => $o_id))->row()->o_img;

			unlink(FCPATH.'assest/images/orphan/'.$image_file_name);
			$this->db->where('o_id', $o_id);
			$this->db->delete('orphan');
			return true;
	}
//حذف كفيل اليتيم

	public function delete_orphan_s($o_id)
	{
		$data = array(
			'o_e_sponser' =>  NULL
		);
		$this->db->where('o_id', $o_id);
	    return $this->db->update('orphan', $data);
	}
	//حذف صورة اليتيم
	public function delete_img($o_id)
	{
		$image_file_name = $this->db->select('o_img')->get_where('orphan', array('o_id' => $o_id))->row()->o_img;
			unlink(FCPATH.'assest/images/orphan/'.$image_file_name);
			return true;
	}
//تعديل معلوات اليتيم اضهار الواجهة
	public function Edit_orphan($o_id)
	{

		$this->db->where('o_id', $o_id);
		$query = $this->db->get('orphan');
		return $query->result_array();
			
	}
//تحديث معلوات اليتيم
	public function update($o_id,$data)
	{

		$this->db->where('o_id', $o_id);
	    return $this->db->update('orphan', $data);
			
	}
    // اضافة الكفيل الى تيبل اليتيم
	public function orphan_sponsor_update($o_id,$data)
	{
		$this->db->where('o_id', $o_id);
	    return $this->db->update('orphan', $data);
			
	}
    //الايتام غير المكفولين البحث

	function fetch_data($query)
    {
		
		$this->db->order_by('o_id','DESC');
		$this->db->where('o_e_sponser', NULL);
		if($query != '')
			{
				$this->db->like('o_name',$query);
				//$this->db->or_like('o_n_mother',$query);
				$this->db->or_like('o_berth_day',$query);
				$this->db->or_like('o_adress_db',$query);	

			}
		$query = $this->db->get('orphan');
		return $query;
	}
	// عرض معلومات يتيم غير مكفول محدد
	function fetch_one_data($query)
    {
		
		$this->db->order_by('o_id','DESC');
		$this->db->where('o_e_sponser', NULL);
		$this->db->where('o_id', $query);
		$query = $this->db->get('orphan');
		return $query;
	}

     //البحث الايتام  المكفولين
	function fetch_data_s($query)
    {
		$this->db->select("*");
		$this->db->from("orphan");
        $this->db->join('sponsor', 'sponsor.s_email = orphan.o_e_sponser');
		$this->db->where('o_e_sponser !=', NULL);

			if($query != '')
			{
				$this->db->like('o_name',$query);
				$this->db->or_like('o_n_mother',$query);
				$this->db->or_like('o_berth_day',$query);
				$this->db->or_like('o_adress_db',$query);	
			}
		$this->db->order_by('o_id', 'DESC');
		return $this->db->get();
	}
	// الحصول على جميع طلابات الكفل
	public function get_sponsor_request()
	{
		$this->db->select('*');
        $this->db->from('orphan');
		$this->db->join('sponsor', 'sponsor.s_email = orphan.o_e_sponser');
		$this->db->where('s_active =', 0);
		$this->db->order_by('s_id', 'DESC');
		$this->db->limit(10);  
		$query = $this->db->get();
        return $query->result_array();
	}
	//تحديث المعلومات لكي يصبح كفيل يبعد مقابلة المسؤل

	public function Update_s_request($s_id,$data)
	{

		$this->db->where('s_id', $s_id);
	    return $this->db->update('sponsor', $data);
			
	}
	// الحصول على جميع الكفلاء
	public function get_sponsor()
	{
		$this->db->select('*');
        $this->db->from('orphan');
		$this->db->join('sponsor', 'sponsor.s_email = orphan.o_e_sponser');
		$this->db->where('s_active =', 1);
		$this->db->order_by('s_id', 'DESC');
		$this->db->limit(10);  
		$query = $this->db->get();
        return $query->result_array();
	}
	//حذف كفيل
	public function delete_s($s_id)
	{
		   $image_file_name = $this->db->select('s_img')->get_where('sponsor', array('s_id' => $s_id))->row()->s_img;
		   $email = $this->db->select('s_email')->get_where('sponsor', array('s_id' => $s_id))->row()->s_email;

			unlink(FCPATH.'assest/images/sponsor/'.$image_file_name);
			$this->db->where('s_id', $s_id);
			$this->db->delete('sponsor');
			//delete sponsor from orphan table
			$data = array(
				'o_e_sponser' =>  NULL
			);
			$this->db->where('o_e_sponser', $email);
	        return $this->db->update('orphan', $data);
			return true;
	}

	//   البحث عن كفيل

	function search_sponsor($query)
    {
		$this->db->select('*');
        $this->db->from('sponsor');
		$this->db->join('orphan', ' orphan.o_e_sponser=sponsor.s_email');
		$this->db->where('s_active =', 1);
        if($query != '')
        {
            $this->db->like('s_name',$query);
			$this->db->or_like('s_adress',$query);	
		}
		$this->db->order_by('s_id', 'DESC');
		$this->db->where('sponsor.s_active', 1);

		return $this->db->get();
	}
	
}
