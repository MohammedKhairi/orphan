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

<form id="ajax_form" action="<?php echo base_url(); ?>Admin/Update_admin" method="post" action="javascript:void(0)"enctype="multipart/form-data">

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">الاسم</label>
    <input type="text" name="name" value="<?= $admin[0]['a_name'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم اليتيم">
</div>
<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">الايميل</label>
    <input type="email" name="email" value="<?= $admin[0]['a_email'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم اليتيم">
</div>
<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">اسم المستخدم</label>
    <input type="text" name="u_name" value="<?= $admin[0]['a_a_name'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم اليتيم">
</div>
<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">الرقم السري</label>
    <input type="password" name="pass" value="<?= $admin[0]['a_pass'] ?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم اليتيم">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">عنوان السكن</label>
    <input type="text" name="adress" value="<?= $admin[0]['a_adress'] ?>" class="form-control" id="formGroupExampleInput" placeholder=" الرجاء ادخال الاسم تأريخ الولادة">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">صورة الادمن</label>
    <input type="file" name="userfile"  class="form-control" id="formGroupExampleInput" placeholder="الرجاء اختيار صورة لليتيم">
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