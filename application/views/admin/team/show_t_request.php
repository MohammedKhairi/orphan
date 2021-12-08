

    <br />

<br />
<div class="container">
<h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أخر 20 عضو تم أضافتهم كأحد أعضاء الفرق الجوالة الى المؤسسة</h2>
<br>
<table class="table" style="float:right;direction:rtl;">
  <thead class="thead-dark">
    <tr>
      <th class="th_center">صورة الشخص</th>
      <th class="th_center">أسم الشخص</th>
      <th class="th_center">عنوان الشخص</th>
      <th class="th_center">  نوع الفرقة</th>
      <th class="th_center">تعديل المعلومات</th>

    </tr>
  </thead>

  <tbody>
  <?php foreach($t_mony as $team):?>
    <tr>
      <td class="td_center"><img class="img_table"src="<?php echo base_url(); ?>assest/images/teames/<?= $team['t_img'] ?>"></td>
      <td class="td_center" id="th_height"><?= $team['t_name'];?></td>
      <td class="td_center" id="th_height1"><?= $team['t_adress'];?></td>
      <td class="td_center" id="th_height1">
      <?php
        if($team['t_job']==0)
        echo' رعاية الأيتام';
        else
        echo' جمع التبرعات';
      ?>
      </td>

      <td class="td_center" id="th_height2">
          <a class="btn btn-success" href="<?php echo 'Update_Team_Request/'.$team['t_id'];?>" role="button">قبول الطلب </a>
          <a class="btn btn-danger" href="<?php echo 'Delete_Team_M/'.$team['t_id'];?>" role="button">حذف</a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>

