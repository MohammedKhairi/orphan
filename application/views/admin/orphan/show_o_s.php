

<div class="container">
    <br />
    <br />
    <br />
    <h2 align="center" style="text-align: center;font-family: El Messiri, sans-serif;">أبحث عن يتيم عن طريق ادخال اسم او عنوان الولادة او تأريخ الدخول</h2><br />
    <div class="form-group">
      <div class="input-group">
      <input type="text" name="search_text" id="search_text" placeholder="أبحث عن يتيم " class="form-control" />
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
  <script type='text/javascript' src="<?php echo base_url(); ?>assest/js/search_s.js"></script>
<div class="container">
  <h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أخر 10 يتيم   مكفول تم أضافتهم الى المؤسسة</h2>
  <br>
  <table class="table" style="float:right;direction:rtl;">
    <thead class="thead-dark">
      <tr>
        <th class="th_center">صورة اليتيم</th>
        <th class="th_center">أسم اليتيم</th>
        <th class="th_center">عنوان الولادة</th>
        <th class="th_center"> اسم الكفيل</th>
        <th class="th_center">تعديل المعلومات</th>

      </tr>
    </thead>

    <tbody>
    <?php foreach($orphans as $orphan):?>
      <tr>
        <td class="td_center"><img class="img_table"src="<?php echo base_url(); ?>assest/images/orphan/<?= $orphan['o_img'] ?>"></td>
        <td class="td_center" id="th_height"><?= $orphan['o_name'];?></td>
        <td class="td_center" id="th_height1"><?= $orphan['o_adress_db'];?></td>
        <td class="td_center" id="th_height1"><?= $orphan['s_name'];?></td>
        <td class="td_center" id="th_height2">
            <a class="btn btn-success" href="<?php echo 'Edite_orphan/'.$orphan['o_id'];?>" role="button">تحرير</a>
            <a class="btn btn-primary" href="<?php echo 'Delete_orphan/'.$orphan['o_id'];?>" role="button">حذف</a>
            <a class="btn btn-danger" href="<?php echo 'Delete_orphan_s/'.$orphan['o_id'];?>" role="button"> حذف الكفالة</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

