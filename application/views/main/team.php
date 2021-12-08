<br>

      <br>
      <div class="container regtangle">
    

    
		<div class="orhan_w">
            <h3 style="color:#fff;">يمكنك ان تنظم  للمجموعات التطوعية في مؤسستنا    </h1>
            <br>
            <br>
            <p class="why_b why_b_c">هناك نوعان من الفرق التي يمكنك التطوع فيها </p>
            <br>

            <p class="why_b why_b_c">فرق خاصة بجمع التبرعات </p>
            <br>
            <p class="why_b why_b_c">فرق خاصة   تقوع برعاية الايتام و البحث عن الايتام وتسجيلهم  </p>
            <br>

            <p class="why_b why_b_c">هذا العمل تطوعي و المؤسسة غير ملزمة بدفع مبالغ مقابل العمل </p>

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
    $send=$this->session->flashdata("m_team_add");
    if(isset($send))
    {
        echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
        '.$send.
        '</p>';
       // $info =$this->session->flashdata("member_info");
        // echo $this->session->flashdata("key");
       
    }
    if(isset($error))
    {
        echo '<p style="background-color: #red;padding: 10px 0px;text-align: center;color: #fff;">
        '.$error.
        '</p>';
       // $info =$this->session->flashdata("member_info");
        // echo $this->session->flashdata("key");
       
    }
    
    ?>
          <?php 
                echo $this->session->flashdata("error");
                $error_m=$this->session->flashdata("email_error");
                if(isset($error_m))
                echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
                '.$error_m.
                '</p>';
            ?>


            <form id="ajax_form" enctype="multipart/form-data" action="<?=base_url();?>Team/Join" method="post" style=" direction: rtl;" >
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
                <label for="Phone">رقم الهاتف </label>
                <input type="number" name="phone" class="form-control" id="phone" placeholder=" الرجاء ادخال رقم الهاتف">
                <span class="text-danger"><?php echo form_error('phone');?></span>
            </div>  
            <div class="form-group">
                <label for="address"> العنوان </label>
                <input type="text" name="adress" class="form-control" id="address" placeholder=" الرجاء ادخال  عنوانك">
                <span class="text-danger"><?php echo form_error('adress');?></span>
            </div>  
            <div class="form-group">
            <label for="sel1">أختر نوع المجموعة التي تريد الانظمام اليها</label>
            <select class="form-control" id="sel1" name="team_type">
                <option value='1'>فرق جمع التبرعات</option>
                <option value='0'>فرق رعاية الايتام </option>
            </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput" class="l_form"> صورة شخصية لك ( الصورة يجب ان يكون نوعها jpg وحجمها اقل من MB 2 ) انتبه</label>
                <input type="file" name="userfile" class="form-control" id="formGroupExampleInput" placeholder="الرجاء اختيار صورة لليتيم">
            </div>
            <div class="form-group">
            <button type="submit" name="submit" style="float: right;"  id="button" class="btn btn-success col-md-2">تسجيل</button>
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
