

<br>
<br>
<div class="container">
  <br>
  <br>
    <div style="text-align: center;font-family: 'El Messiri', sans-serif;direction:rtl;">
      <h3 class="text-primary"> اسم الشخص</h3>
      <p><?= $comment[0]['c_u_name']?></p>
      <h3 class="text-primary"> تأريخ التعليق</h3>
      <p><?= date('M d,Y',strtotime( $comment[0]['c_date'])) ;?></p>
      <h3 class="text-primary">محتوى التعليق</h3>
      <p><?= $comment[0]['c_content']?></p>
    </div>
<br>

<h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">رد على التعليق</h2>

    <form id="ajax_form" action="<?php echo base_url().'Admin/Insert_replay/'.$comment[0]['c_id']?>" method="post" action="javascript:void(0)">


    <div class="form-group">

        <label for="formGroupExampleInput" class="l_form"> محتوى  الرد </label>
        <textarea id="editor1" name="body" cols="30" rows="5" class="form-control">
        
        </textarea>
        <span class="text-danger"><?php echo form_error('body');?></span>

    </div>

    <br>
    <div class="form-group">
    <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2">أضافة الرد</button>
    </div>

    </form>
</div>

