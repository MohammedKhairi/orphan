<div class="container">
  <br>


     
  <table class="table" style="float:right;direction:rtl;">
    <thead class="thead-dark">
      <tr>
        <th class="th_center">عنوان المجلة</th>
        <th class="th_center">صور المجلة</th>
        <th class="th_center">تعديل</th>
      </tr>
    </thead>
    
    <tbody>
    <?php foreach($gallaries as $gallary):?>
      <tr>
        <td class="td_center" id="th_height"><?= $gallary['g_title'];?></td>
        <td class="td_center">
                  <!-- ##############[حل اخر]################ -->
                  <!-- $CI=&get_instance();
                  echo $CI->get_image($gallary['g_id']);   -->
                  <!-- ##############[حل اخر]################ -->
                    <?php
                          $this->load->database();
                          $this->db->from('g_img');
                          $this->db->where('g_i_id', $gallary['g_id']);
                          $data=$this->db->get();
                     ?>
                      <?php foreach($data->result_array() as $img) 
                      {
                           echo' <img class="img_table"';
                           echo' src="'.base_url().'assest\images\gallary'.'\\' .$img["g_i_img"].'">';
                       } ?>
           
        </td>
        <td class="td_center" id="th_height2">
            <a class="btn btn-success" href="<?php echo base_url(). 'Admin/Edite_Gallary/'.$gallary['g_id'];?>" role="button">تحرير</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>