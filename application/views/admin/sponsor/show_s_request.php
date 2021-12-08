

<div class="container">
    <br />
    <br />
    <br />
</div>
  <div style="clear:both"></div>
  <br />
  <br />
  <br />
  <br />

<div class="container">
  <h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أخر 10 طلبات لكفل احد ايتام  المؤسسة</h2>
  <br>
  <table class="table" style="float:right;direction:rtl;">
    <thead class="thead-dark">
      <tr>
        <th class="th_center">صورة الكفيل</th>
        <th class="th_center">أسم الكفيل</th>
        <th class="th_center">عنوان الكفيل</th>
        <th class="th_center"> اسم اليتيم</th>
        <th class="th_center">تعديل المعلومات</th>

      </tr>
    </thead>

    <tbody>
    <?php foreach($sponsor as $spons):?>
      <tr>
        <td class="td_center"><img class="img_table"src="<?php echo base_url(); ?>assest/images/sponsor/<?= $spons['s_img'] ?>"></td>
        <td class="td_center" id="th_height"><?= $spons['s_name'];?></td>
        <td class="td_center" id="th_height1"><?= $spons['s_adress'];?></td>
        <td class="td_center" id="th_height1"><?= $spons['o_name'];?></td>
        <td class="td_center" id="th_height2">
           <a class="btn btn-success" href="<?php echo base_url().'Admin/Update_s_Request/'.$spons['s_id'];?>" role="button"> قبول طلب الكفالة </a>
            <a class="btn btn-danger" href="<?php echo base_url().'Admin/Delete_sponsor/'.$spons['s_id'];?>" role="button"> حذف طلب الكفالة </a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

