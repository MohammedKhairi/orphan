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

<form id="ajax_form" action="insert_gallary_t" method="post" action="javascript:void(0)"enctype="multipart/form-data">

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">الاسم</label>
    <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم المجلة أو الحدث">
</div>

<br>
<div class="form-group">
  <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2">أضافة المجلة</button>
</div>

</form>
<br>
<br>
</div>
<!-- ################[e_form]################## -->