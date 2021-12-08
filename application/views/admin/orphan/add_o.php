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

<form id="ajax_form" action="New_orphan" method="post" action="javascript:void(0)"enctype="multipart/form-data">

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">الاسم</label>
    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم اليتيم">
</div>
 
<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">أسم الام</label>
    <input type="text" name="mother_name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم والدة اليتيم">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">تأريخ الولادة</label>
    <input type="date" name="berth_day" class="form-control" id="formGroupExampleInput" placeholder=" الرجاء ادخال الاسم تأريخ الولادة">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">صورة اليتيم لا يتجاو حجمها 2MB</label>
    <input type="file" name="userfile" class="form-control" id="formGroupExampleInput" >
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">عنوان اولادة</label>
    <input type="text" name="adress" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال عنوان الولادة لليتيم">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">تأريخ الدخول</label>
    <input type="date" name="date_out" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال تأريخ خروج اليتيم من المؤسسة">
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">تأريخ الخروج</label>
    <input type="date" name="date_in" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال تأريخ خروج اليتيم من المؤسسة ">
</div>
<br>
<div class="form-group">
  <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2">أضافة يتيم</button>
</div>

</form>
<br>
<br>
</div>
<!-- ################[e_form]################## -->