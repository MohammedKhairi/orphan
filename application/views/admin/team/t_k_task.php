
<br/>
<br/>
<div class="container">
<h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">  المهام الموكلة الى احد اعضاء فرق رعاية الايتام </h2>
<br>
<table class="table" style="float:right;direction:rtl;">
  <thead class="thead-dark">
    <tr>

      <th class="th_center">محتوى المهمة </th>
      <th class="th_center">تأريخ المهمة  </th>
      <th class="th_center">تعديل المعلومات</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if(count($t_task)<=0)
    {
      echo'<td class="td_center" id="th_height1"> لا يوجد</td>';
      echo'<td class="td_center" id="th_height1"> لا يوجد</td>';
      echo'<td class="td_center" id="th_height1"> لا يوجد</td>';
    }
    else
    {

  ?>
  <?php foreach($t_task as $task):?>
    <tr>
      <td class="td_center" id="th_height1"><?= $task['ts_content'];?></td>
      <td class="td_center" id="th_height1"><?= $task['ts_date'];?></td>
      <td class="td_center" id="th_height1"><a class="btn btn-danger" href="<?php echo base_url().'Admin/Delete_T_Task/'.$task['ts_id'];?>" role="button"> حذف التوكيل </a></td>
    </tr>
    <?php endforeach;}?>
  </tbody>
</table>
<br>
<br>
<h2 style="text-align: center;font-family: 'El Messiri', sans-serif;"> أضافة مهمة </h2>
<hr>
<br>
<form id="ajax_form" action="<?php echo base_url();?>/Admin/Add_T_Task/<?=$id?>" method="post" action="javascript:void(0)"enctype="multipart/form-data">

<div class="form-group">

    <label for="formGroupExampleInput" class="l_form"> محتوى المهمة</label>
    <textarea id="editor1" name="content" cols="30" rows="5" class="form-control">
    
    </textarea>
    <span class="text-danger"><?php echo form_error('content');?></span>

</div>

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form">تأريخ المهمة</label>
    <input type="date" name="date" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال تأريخ خروج اليتيم من المؤسسة">
    <span class="text-danger"><?php echo form_error('date');?></span>
    
</div>

<br>
<div class="form-group">
  <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2">أضافة المهمة</button>
</div>

</form>

</div>

