<br>

      <br>
      <div class="container regtangle">
		<div class="orhan_w">
            <h3  style="color:#fff;">يمكنك ان تصبح كفيل لاحد الايتام في مؤسستنا </h1>
            <br>

            <p class="why_b why_b_c">  رجائا قم بملاء المعلومات التالية الخاصة بك</p>
  
    	</div>
		
	</div>
     
      <br>
      <br>
      <br>
          <!-- ################[s_form]################## -->

          <div class="container">
          <?php 
            // عرض رسالة للمستخدم عند الاضافة
            $send=$this->session->flashdata("m_sponsor_add");
            if(isset($send))
            {
                echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
                '.$send.
                '</p>';           
            }
            // عرض رسالة  عند حدوث خطأ في اختيار الصورة
            if(isset($error))
            {
                echo '<p style="background-color: #red;padding: 10px 0px;text-align: center;color: #fff;">
                '.$error['error'].
                '</p>';
            }
            
            ?>
          <?php 
               //عرض رسالة عند عدم التحقق من الايميل
                $error_m=$this->session->flashdata("email_error");
                if(isset($error_m))
                {
                    echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
                    '.$error_m.
                    '</p>';
                }
                
            ?>
            <form id="ajax_form"action="<?=base_url();?>Sponsor/Join" enctype="multipart/form-data" method="post" action="javascript:void(0)"style=" direction: rtl;">
            <div class="form-group">
                <label for="formGroupExampleInput">الاسم</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال الاسم">
                <span class="text-danger"><?php echo form_error('name');?></span>
            </div>

            <div class="form-group">
                <label for="email">الايميل </label>
                <input type="email" name="email" class="form-control" id="email" placeholder=" الرجاء ادخال الايميل">
                <span class="text-danger"><?php echo form_error('email');?></span>

            </div>  
            <div class="form-group">
            <label for="formGroupExampleInput" class="l_form">الرقم السري</label>
            <input type="password" name="pass"  class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال الرقم السري ">
            <span class="text-danger"><?php echo form_error('pass');?></span>

            </div>
            <div class="form-group">
                <label for="phone">رقم الهاتف </label>
                <input type="number" name="phone" class="form-control" id="phone" placeholder=" الرجاء ادخال رقم الهاتف">
                <span class="text-danger"><?php echo form_error('phone');?></span>

            </div>  
            <div class="form-group">
                <label for="address"> العنوان </label>
                <input type="text" name="address" class="form-control" id="address" placeholder=" الرجاء ادخال  عنوانك">
                <span class="text-danger"><?php echo form_error('address');?></span>

            </div>  
            <div class="form-group">
            <label for="sel1">أكفل احد الايتام من القائمة</label>
            <select class="form-control" id="sel1" name="o_id">
                <?php foreach($orphans as $orphan):?>
                    <?php
                    echo '<option value="'.$orphan["o_id"].'">';
                    echo' <td class="td_center" id="th_height">'.$orphan["o_name"].'</td>';
                    echo '<td class="td_center"><img class="img_table"src="'.base_url().'assest/images/orphan/'.$orphan["o_img"].'"></td>
                    </option>';
                    ?>
                <?php endforeach;?>
            </select>
            <div id="result22">

            </div>
            <script type='text/javascript' src="<?php echo base_url(); ?>assest/js/orphan_info.js"></script>

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput" class="l_form"> صورة شخصية لك ( الصورة يجب ان يكون نوعها jpg وحجمها اقل من MB 2 ) انتبه</label>
                <input type="file" name="userfile" class="form-control" id="formGroupExampleInput" placeholder="الرجاء اختيار صورة لليتيم">
            </div>
            <div class="form-group">
            <button type="submit" name="submit" style="float: right;" id="button" class="btn btn-success col-md-2">أرسال</button>
            </div>
            </form>
            <br><br><br><br><br>
            <br>
            </div>
            <!-- ################[s_form]################## -->
      <br>
      <br>
      <br>




      <br>
      <br>
