<div class="container">
 
  <br>
  <form id="ajax_form" action="<?=base_url();?>Admin/Update_gallary_title/<?php echo $gallaries_one[0]['g_id'] ;?>" method="post" action="javascript:void(0)"enctype="multipart/form-data">

<div class="form-group">
    <label for="formGroupExampleInput" class="l_form"> عنوان المجلة الجديد</label>
    <input type="text" name="title" value="<?php echo $gallaries_one[0]['g_title'] ;?>" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم المجلة أو الحدث">
    <span class="text-danger"><?php echo form_error('title');?></span>

</div>


<div class="form-group">
  <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2"> تحديث</button>
</div>

</form>
<br>
<br>
<br>
<br>
  <table class="table" style="float:right;direction:rtl;">
    <thead class="thead-dark">
      <tr>
        <th class="th_center">عنوان المجلة</th>
        <th class="th_center">صور المجلة</th>
        <th class="th_center">تعديل</th>
      </tr>
    </thead>
    
    <tbody>
    <?php foreach($gallaries as $gallary):?>
      <tr>
        <td class="td_center" id="th_height"><?= $gallary['g_title'];?></td>
        <td class="td_center">
            <?php
            echo' <img class="img_table"';
            echo' src="'.base_url().'assest\images\gallary'.'\\' .$gallary["g_i_img"].'">';
              ?>                  
        </td>
        <td class="td_center" id="th_height2">
            <a class="btn btn-danger" href="<?php echo base_url().'Admin/Delete_Gallary_img/'.$gallary['g_i_img'];?>" role="button">حذف الصورة</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>