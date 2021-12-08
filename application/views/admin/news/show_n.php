

<div class="container">
    <br />
    <br />
    <br />
    <h2 align="center" style="text-align: center;font-family: El Messiri, sans-serif;">أبحث عن الحدث عن طريق ادخال عنوان الحدث او تأريخ الحدث</h2><br />
    <div class="form-group">
      <div class="input-group">
      <input type="text" name="search_text" id="search_text" placeholder="أبحث عن الخبر أو الحدث " class="form-control" />
      </div>
    </div>
    <br />
    <div id="result">
      
    </div>
</div>
  <div style="clear:both"></div>
  <br />
  <br />
  <br />
  <br />
  <script type='text/javascript' src="<?php echo base_url(); ?>assest/js/search_n.js"></script>
<div class="container">
  <h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أخر 10 حدث تم أضافتهم</h2>
  <br>
  <table class="table" style="float:right;direction:rtl;">
    <thead class="thead-dark">
      <tr>
        <th class="th_center"> عنوان الحدث</th>
        <th class="th_center">تأريخ الحدث</th>
        <th class="th_center">محتوى مختصر للحدث</th>
        <th class="th_center">تعديل المعلومات</th>

      </tr>
    </thead>

    <tbody>
    <?php foreach($events as $event):?>
      <tr>
           <!-- من اجل الخصول على عنوان الامجلة -->
          <?php
              
              $this->load->database();
              $this->db->where('g_id', $event['e_gallary_id']);
              $result = $this->db->get('gallary');
              $title=$result->row(0)->g_title;
          ?>
        <td class="td_center" id="th_height"><?= $title?></td>
        <td class="td_center" id="th_height1"><?= date('M d,Y',strtotime( $event['e_date']));?></td>
        <td class="td_center" id="th_height1"><?php echo mb_strcut($event['e_content'],0,60,'UTF-8');?></td>
        <td class="td_center" id="th_height2">
            <a class="btn btn-success" href="<?php echo 'Edite_News/'.$event['e_id'];?>" role="button">تحرير</a>
            <a class="btn btn-danger" href="<?php echo 'Delete_News/'.$event['e_id'];?>" role="button">حذف</a>
        </td>
      </tr>
      <?php endforeach;?>

    </tbody>
  </table>
</div>

