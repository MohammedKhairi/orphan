

    <br />

<br />
<div class="container">
<h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أخر 20  عضو تم اضافتهم الى الموسسة كأحد فرق رعاية الايتام</h2>
<br>
<table class="table" style="float:right;direction:rtl;">
  <thead class="thead-dark">
    <tr>
      <th class="th_center">صورة الشخص</th>
      <th class="th_center">أسم الشخص</th>
      <th class="th_center">عنوان الشخص</th>
      <th class="th_center">عدد المهام</th>
      <th class="th_center">تعديل المعلومات</th>

    </tr>
  </thead>

  <tbody>
  <?php foreach($t_orphans as $team):?>
    <tr>
      <td class="td_center"><img class="img_table"src="<?php echo base_url(); ?>assest/images/teames/<?= $team['t_img'] ?>"></td>
      <td class="td_center" id="th_height"><?= $team['t_name'];?></td>
      <td class="td_center" id="th_height1"><?= $team['t_adress'];?></td>
      <td class="td_center" id="th_height1">
      <?php
        //get number of task for ech one of team
        $this->db->from('task');
        $this->db->where('ts_t_id', $team['t_id']);
        $query = $this->db->get();
        $num=$query->num_rows();
        echo $num;
      ?>
      </td>
      <td class="td_center" id="th_height2">
          <a class="btn btn-success" href="<?php echo 'Team_K_Task/'.$team['t_id'];?>" role="button">عرض او أضافة مهمة</a>
          <a class="btn btn-danger" href="<?php echo 'Delete_Team_k/'.$team['t_id'];?>" role="button">حذف</a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>

