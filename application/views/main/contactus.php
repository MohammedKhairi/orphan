

    
    <br>
    
    <p class="p_join"> 
    يمكنك زيارة المؤسسة من خلال الموقع
         <a href="About_Us" class="btn btn-primary" style="float: none;">من هنا
         </a>   
    </p> 
    <br>
    <p class="p_join"> 
     
    أو الاتصال على الهاتف  <i class="fa fa-phone" style="margin:0px 3px"></i> :07815612329
      أو الاتصال على الايميل <i class="fa fa-envelope-open" style="margin:0px 3px"></i> :wee11157@gmail.com
    </p> 
    <br>
    <div class="container regtangle">
		<div class="orhan_w">
            <h3 style="color:#fff;"> يمكنك ارسال  رسالة او استفسار من هنا</h1>
            <br>
            <p class="about"  style="text-align">سوف يتم الرد عليك عبر الايميل</p>

    	</div>
		
	</div>

    <br>
    <div class="container">
    <?php 
    // عرض رسالة للمستخدم عند الاضافة
    $error=$this->session->flashdata("message_send");
    if(isset($error))
    {
        echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
        '.$error.
        '</p>';
       
    }

    
    ?>
    </div>

    <br>
    <div class="container">

        <form id="ajax_form" action="<?php echo base_url()?>Contact/Message" method="post" action="javascript:void(0)" style="direction: rtl;">
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
        <label class="lead">الرسالة</label>
            <textarea id="editor1" name="body" cols="30" rows="5" class="form-control ">
              
            </textarea>
         </div>
         <span class="text-danger"><?php echo form_error('body');?></span>

    
        <div class="form-group" >
        <button type="submit" name="submit" id="button" class="btn btn-success col-md-2" style="float: right;">أرسال</button>
        </div>
        </form>
        <br>
        <br>
    </div>