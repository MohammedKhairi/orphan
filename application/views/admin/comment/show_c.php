

<div class="container">
    <br />
   
  <div class="container">
  <h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أخر 20 تعليق تم أضافتهم</h2>
  <br>
  <table class="table" style="float:right;direction:rtl;">
    <thead class="thead-dark">
      <tr>
        <th class="th_center"> عنوان الحدث</th>
        <th class="th_center"> الاسم</th>
        <th class="th_center">  التعليق</th>
        <th class="th_center">  التأريخ</th>
        <th class="th_center">تعديل المعلومات</th>

      </tr>
    </thead>

    <tbody>
    <?php foreach($comments as $comment):?>
      <tr>
         <!-- من اجل الحصول على عنوان الحدث -->
         <?php
              
              $this->load->database();
              $this->db->select('e_gallary_id');
              $this->db->from('event');
              $this->db->where('e_id', $comment['c_event_id']);
              $result = $this->db->get();
              $id=$result->row(0)->e_gallary_id;

              $this->db->select('g_title');
              $this->db->from('gallary');
              $this->db->where('g_id', $id);
              $result = $this->db->get();
              $title=$result->row(0)->g_title;
          //    echo 'title'. $comment['c_event_id'];exit;

          ?>

        <td class="td_center" id="th_height"><?= $title?></td>
        <td class="td_center" id="th_height1"><?= $comment['c_u_name']?></td>
        <td class="td_center" id="th_height1"><?php echo mb_strcut($comment['c_content'],0,60,'UTF-8');?></td>
        <td class="td_center" id="th_height1"><?= date('M d,Y',strtotime( $comment['c_date']));?></td>
       
        <td class="td_center" id="th_height2">
            <a class="btn btn-success" href="<?php echo 'View_Comment/'.$comment['c_id'];?>" role="button">رد</a>
            <a class="btn btn-danger" href="<?php echo 'Delete_Comment/'.$comment['c_id'];?>" role="button">حذف</a>
        </td>
      </tr>
      <?php endforeach;?>

    </tbody>
  </table>
</div>

