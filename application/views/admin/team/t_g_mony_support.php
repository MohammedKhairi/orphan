
<br/>
<br/>
<div class="container">
<h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أخر 20 يتيم تم أضافتهم الى المؤسسة</h2>
<br>
<table class="table" style="float:right;direction:rtl;">
  <thead class="thead-dark">
    <tr>

      <th class="th_center">عنوان المهنة</th>
      <th class="th_center">عنوان الشخص</th>
      <th class="th_center"> المهة الموكلة الية</th>
      <th class="th_center">تعديل المعلومات</th>

    </tr>
  </thead>

  <tbody>
  <?php foreach($team_mony as $team):?>
    <tr>
      <td class="td_center" id="th_height1"><?= $team['sp_address'];?></td>
      <td class="td_center" id="th_height1"><?= $team['t_adress'];?></td>
      <td class="td_center" id="th_height1"><?php echo mb_strcut($team['sp_content'],0,120,'UTF-8');?></td>

      <td class="td_center" id="th_height2">
          <a class="btn btn-success" href="<?php echo base_url().'Admin/Team_g_Mony_support_done/'.$team['sp_id'];?>" role="button"> تمت المهة</a>
          <a class="btn btn-danger" href="<?php echo base_url().'Admin/Team_g_Mony_support_delete/'.$team['sp_id'];?>" role="button">الغاء التوكيل</a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>

