<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <title>صفحة تسجيل الدخول </title>
</head>
<style>
.content
{
    width:80%;
    float:none;
    margin:auto;
    background:#e0e0e0;
    justify-content:center;
 
}

.full{
    width:95%;
    height:30px;
    margin-bottom:7px;
    
}
label {
  float :right;
}

</style>
<body>
<div class="container">
<br>
    <br><br>
    <?php 
    // عرض رسالة للمستخدم عند الخطا
    $error=$this->session->flashdata("error");
    if(isset($error))
    {
        echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
        '.$error.
        '</p>';       
       
    }

    
    ?>
    <br>
    <a style="color:#fff;float:left;background:#007bff;padding: 7px;border-radius: 7px;font-family: tahoma;" href="<?php echo base_url();?>">الرجوع الى الموقع</a>

    <br>
    <h2 style="margin-top: 10px;text-align: center;font-family: tahoma;color: #5e8c2a;"> لوحة تسجيل الدخول </h2>
    <br>
    <br>
    <form id="ajax_form" enctype="multipart/form-data" action="<?=base_url();?>User/user_login" method="post" style=" direction: rtl;" >
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
            
            <div class="form-check">
            <label for="formGroupExampleInput"  class="l_form">التسجيل ك</label> <br>
             <hr>
              <select class="form-control" id="select1" name="type" onclick="getOption()">
              <option value="1">كفيل </option> 
              <option value="2">فرق تطوعية</option> 
            </select>
            <span class="text-danger"><?php echo form_error('type');?></span>

            </div>
            <br>
            <div class="form-check team_type " style="display:none;" id="team_type" name="team_type">
            <label for="formGroupExampleInput"  class="l_form"> نوع الفرقة التطوعية</label> <br>
             <hr>
              <select class="form-control" id="exampleFormControlSelect2" name="team_type">
                <option value="1">فرق جمع التبرعات</option>
                <option value="0">فرق رعاية الايتام</option>
            </select>
            <span class="text-danger"><?php echo form_error('team_type');?></span>

            </div>

            <br>
            <br>
            <div class="form-group">
            
            <button type="submit" style="float: right;"  id="button" class="btn btn-success col-md-2"> تسجيل الدخول</button>
            </div>
            </form>
</div>
<script type='text/javascript' src="<?php echo base_url(); ?>assest/js/form_login.js"></script>


</body>
</html>