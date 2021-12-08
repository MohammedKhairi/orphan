
<?php
class Ajaxsearch_model extends CI_Model
{
    function fetch_data($query)
    {
    $this->db->select("*");
    $this->db->from("orphan");
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
}
?>