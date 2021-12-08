

<br>
<br>
<div class="container">
  <br>
  <br>
    <div style="text-align: center;font-family: 'El Messiri', sans-serif;direction:rtl;">
      <h3 class="text-primary"> اسم المرسل</h3>
      <p><?= $message[0]['m_r_name']?></p>
      <h3 class="text-primary"> تأريخ الارسال</h3>
      <p><?= date('M d,Y',strtotime( $message[0]['m_date'])) ;?></p>
      <h3 class="text-primary">أيميل المرسل</h3>
      <p><?= $message[0]['m_r_email']?></p>
      <h3 class="text-primary">محتوى الرسالة</h3>
      <p><?= $message[0]['m_content']?></p>
    </div>
<br>

<h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">رد على المرسل</h2>
<?php 
    //  عرض رسالة للادمن عند حدوث خطأ في ارسال الرد
    $error=$this->session->flashdata("email_m_s");
    if(isset($error))
    {
        echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
        '.$error.
        '</p>';       
       
    }

    
    ?>

    <form id="ajax_form" action="../insert_replay/<?= $message[0]['m_id']?>" method="post" action="javascript:void(0)"enctype="multipart/form-data">


    <div class="form-group">

        <label for="formGroupExampleInput" class="l_form"> محتوى  الرد </label>
        <textarea id="editor1" name="body" cols="30" rows="5" class="form-control">
        
        </textarea>
    </div>
    <input type="hidden" name="email" value="<?=$message[0]['m_r_email']?>">
    <input type="hidden" name="subj" value="<?=mb_strcut($message[0]['m_content'],0,60,'UTF-8')?>">

    <br>
    <div class="form-group">
    <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2">أضافة الرد</button>
    </div>

    </form>
</div>

