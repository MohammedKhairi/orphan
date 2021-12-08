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

<form id="ajax_form" action="insert_gallary" method="post" action="javascript:void(0)"enctype="multipart/form-data">

<br>
<div class="form-group">
    <label for="formGroupExampleInput" class="l_form"> أختر المجلة التي تريد أضافة الصورة اليها</label>
    <select name="g_id" class="form-control" >
      <?php 
       foreach($gallaries as $gallary):
            echo'<option value="'.$gallary["g_id"].'">'.$gallary["g_title"].'</option>';
       endforeach;?>
    </select>
</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">صورة للمجلة</label>
    <input type="file" name="userfile" class="form-control" id="formGroupExampleInput" placeholder="الرجاء اختيار صورة لليتيم">
</div>

<div class="form-group">
  <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2">أضافة  الصورة الى المجلة</button>
</div>

</form>
<br>
<br>
</div>
<!-- ################[e_form]################## -->