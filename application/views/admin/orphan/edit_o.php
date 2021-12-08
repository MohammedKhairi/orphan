<?php echo validation_errors(); ?>
<br>
<br>
  <?php 
  if(isset($errors))
  {
    echo $errors;
  }
  ?>
 <!-- ################[s_form]################## -->

 <div class="container">

<form id="ajax_form" action="../Update_orphan/<?= $orphan[0]['o_id'] ?>" method="post" action="javascript:void(0)"enctype="multipart/form-data">

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">الاسم</label>
    <input type="text" name="name" value="<?= $orphan[0]['o_name'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم اليتيم">
</div>
 
<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">أسم الام</label>
    <input type="text" name="mother_name" value="<?= $orphan[0]['o_n_mother'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم والدة اليتيم">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">تأريخ الولادة</label>
    <input type="date" name="berth_day" value="<?= $orphan[0]['o_berth_day'] ?>" class="form-control" id="formGroupExampleInput" placeholder=" الرجاء ادخال الاسم تأريخ الولادة">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">صورة اليتيم</label>
    <input type="file" name="userfile" value="<?= $orphan[0]['o_img'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء اختيار صورة لليتيم">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">عنوان اولادة</label>
    <input type="text" name="adress" value="<?= $orphan[0]['o_adress_db'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال عنوان الولادة لليتيم">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">تأريخ الدخول</label>
    <input type="date" name="date_out" value="<?= $orphan[0]['o_date_in'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال تأريخ خروج اليتيم من المؤسسة">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">تأريخ الخروج</label>
    <input type="date" name="date_in" value="<?= $orphan[0]['o_date_out'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال تأريخ خروج اليتيم من المؤسسة ">
</div>
<br>
<div class="form-group">
  <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2">تحديث المعلومات</button>
</div>

</form>
<br>
<br>
</div>
<!-- ################[e_form]################## -->