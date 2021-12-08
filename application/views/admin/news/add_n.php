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

<form id="ajax_form" action="../Admin/insert_event" method="post" action="javascript:void(0)"enctype="multipart/form-data">

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form"> أختر المجلة التي تريد أخذ الصورة منها</label>
    <select name="g_id" class="form-control" >
      <?php 
       foreach($gallaries as $gallary):
            echo'<option value="'.$gallary["g_id"].'">'.$gallary["g_title"].'</option>';
       endforeach;?>
    </select>
</div>
<div class="form-group">

    <label for="formGroupExampleInput" class="l_form"> محتوى الخبر</label>
    <textarea id="editor1" name="body" cols="30" rows="5" class="form-control">
    
    </textarea>
</div>

<br>
<div class="form-group">
  <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2">أضافة الحدث</button>
</div>

</form>
<br>
<br>
</div>
<!-- ################[e_form]################## -->