

<div class="container">
    <br />
    <br />
    <br />
    <h2 align="center" style="text-align: center;font-family: El Messiri, sans-serif;">أبحث عن كفيل عن طريق ادخال اسمه او عنوانه </h2><br />
    <div class="form-group">
      <div class="input-group">
      <input type="text" name="search_text" id="search_text" placeholder="أبحث عن كفيل " class="form-control" />
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
  <script type='text/javascript' src="<?php echo base_url(); ?>assest/js/search_sponsor.js"></script>

<div class="container">
  <h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أخر 10 كفيل تم أضافتهم الى المؤسسة</h2>
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
            <a class="btn btn-danger" href="<?php echo base_url().'Admin/Delete_sponsor/'.$spons['s_id'];?>" role="button"> حذف الكفل</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

