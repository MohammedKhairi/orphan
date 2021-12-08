<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=El+Messiri|Markazi+Text&display=swap" rel="stylesheet">
    <title><?php echo $title;?></title>
</head>

<style>
    body
    {
        margin: 0;
        display: flex;
        padding: 0px;

    }
    .bg_model
    {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
    }

    .model_content
    {
        width: 70%;
        height: 500px;
        background: #ffffff;
        border-radius: 5px;
        position: relative;
        box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.6);
    }


    .close:hover
    {
        
        transform: rotate(-45deg);
        color: #37f;  
        
    }
    p.title
    {
        display: block;
        margin:  auto;
        width: 60%;
        text-align: center;
        font-family: 'El Messiri', sans-serif;
        font-size: 1.8vw;
        color: rgb(179, 0, 0);
    }
    input.btn_input ,.btn_submit
    {
        display: block;
        margin:  auto;
        padding:  10px 10px;
        width: 60%;
    }
    input.btn_submit:hover
    {
        color: rgb(179, 0, 0);
        transition: 400ms all;
        background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
    }
   input.btn_submit
   {
       width:30%;
       border: none;
       /* border: 2px solid rgb(179, 0, 0); */
       padding:  9px 9px;
       border-radius:7px;
       background: linear-gradient(to bottom, #33ccff 0%, #3366ff 100%);
       font-family: tahoma;
       color: #ffffff;
       letter-spacing: 2px;
       font-size: 1vw;
   }



</style>
<body>
    <div class="bg_model">
        <div class="model_content">
            <br>
            <br>
            <br>
<h2 style="text-align:center; font-family: 'El Messiri', sans-serif;">لوحة تسجيل  دخول الادمن</h2>
            
            <br>
            <br>
            <?php 
                echo $this->session->flashdata("error");
            ?>
            <br>
            <form id="ajax_form" style="font-family: 'El Messiri', sans-serif;width: 95%; float: none;margin: auto;direction: rtl;" action="ck_login" method="post" action="javascript:void(0)"enctype="multipart/form-data">

            <div class="form-group">
                <label for="formGroupExampleInput" class="l_form">اسم المستخدم</label>
                <input type="text" name="u_name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم  المستخدم">
                <span class="text-danger"><?php echo form_error('u_name');?></span>
            </div>
            <div class="form-group">
            <label for="formGroupExampleInput" class="l_form">الرقم السري</label>
            <input type="password" name="pass"  class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال اسم اليتيم">
            <span class="text-danger"><?php echo form_error('pass');?></span>

            </div>

            <br>
            <div class="form-group">
            <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2">تسجيل الدخول </button>
            </div>

            </form>
            <br>
            <br>
            <!-- ################[e_form]################## -->
                    
           
             
        </div>

    </div>
</body>
</html>
