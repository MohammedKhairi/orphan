
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
 <!--Bootstrap CSS-->
    <link rel="stylesheet" href="<?=base_url()?>assest/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assest/css/bootstrap/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri|Markazi+Text&display=swap" rel="stylesheet">

	<!--JQuery version-->
	<script src="<?=base_url()?>assest/js/jquery-3.4.1.min.js"></script>

	<!--Bootstrap JS-->
	<script src="<?=base_url()?>assest/js/bootstrap/bootstrap.min.js"></script>

	<!--Testing my JQuery AJAX-->

	<!-- fontawesome icon  -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
       
</head>
<style>
    .content_left{
        width:30%;
        background:#bd5d37;
        padding-bottom: 50px;
        float:left;
    }
    .content_right{
        width:70%;
        background:#fff;
        float:right;

    }
    .img_user 
    {
    width: 80%;
    height: 220px;
    margin: auto;
    }
    .work_user 
    {
    width: 80%;
    margin: auto;
    }
    img.slid{
    width: 150px;
    height: 160px;
    position: relative;
    margin: auto;
    float: none;
    display: flex;
    top: 15%;
    border-radius: 50%;
    border: 5px solid #af3607;
    }
    .work_user ul {
    margin: auto;
    float: none;
    list-style: none;
    text-align: center;
    margin-right: 34px;
    }
.work_user ul li {
    display: block;
    padding: 15px 0px;
}
.work_user ul li a {
    color: #e0e0e0;
    font-size: 15px;
    font-weight: bolder;
    font-family: 'El Messiri', sans-serif;
    text-decoration: none;
}
.content_right_all {
    position: relative;
    width: 90%;
    height: 100%;
    margin: auto;
}
/* .work_user ul li:hover,a:hover
{
    background:#e0e0e0;
    color:#bd5d37;
}
.work_user ul li a:hover
{
    color:#bd5d37;
} */
h5
{
    text-align: center;
    font-weight: bold;
    font-size: 11px;
    font-family: 'El Messiri', sans-serif;
    margin-bottom: 1px;
}
.mulimedia ul
{
    background: #312e2e;
    margin: auto;
}

.mulimedia ul li
{
   display: inline-block;
   list-style: none;
   padding: 7px;
}
.mulimedia ul li i
{
    color: #fff;
    cursor: pointer;
}
.card
{
    width:60%;
    float:none;
    margin:auto;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}
.card_content
{
    width:98%;
    height:100%;
    float:none;
    margin:auto;
}
.card_img
{
    width:100%;
    height:230px;
}
.card_img img {
    width: 100%;
    height: 100%;
    border-radius: none;

    
}
.info_u ul {
    margin: auto;
    float: none;
    list-style: none;
    text-align: center;
    margin-right: 34px;
}
.info_u ul li {
    display: block;
    padding: 15px 0px;
    color: #312e2e;
    font-size: 15px;
    font-weight: bolder;
    font-family: 'El Messiri', sans-serif;
    text-decoration: none;
    direction: rtl; 
}
img.img_table {
    width: 120px;
    height: 80px;
}
table
{
    font-family:'El Messiri', sans-serif;
    text-align:center;

}
label
{
    font-family:'El Messiri', sans-serif;
    float:right;
}
th
{
    text-align:center;
}
</style>

<body>
<div class="container">
    <div style="width:100%;height:30px;background:#312e2e;"></div>
    <div class="all_content"  style="border-top:3px solid red;box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
        <div class="content_left">
            <br>
                <div class="mulimedia">
                    <ul>

                    <a href="<?php echo base_url().'User/Login_Out'?>"><li><i class="glyphicon glyphicon-log-out" style="font-size: 12px;color: #fff;"><span class="login" style="font-family:'El Messiri', sans-serif;font-weight: bolder;color: #bd5d37;"> تسجيل الخروج</span></i></li></a>
                    <a href="<?php echo base_url()?>"><li><i class="glyphicon glyphicon-user" style="font-size: 12px;color: #fff;"><span class="login" style="font-family:'El Messiri', sans-serif;font-weight: bolder;color: #bd5d37;">العودة للموقع</span></i></li></a>                   
                    </ul>
                </div>
            <br>
            <div class="img_user">
                <?php

                    if (isset($this->session->userdata['user_login']))
					{
                        if($this->session->userdata['user_login']==1)
                        {
                            //sponsor
                            if($this->session->userdata['user_type']==1)
                               echo '<img class="slid" src="'. base_url().'assest/images/sponsor/'.$this->session->userdata['uimg'].'" />';
                           //team
                               else
                            echo '<img  class="slid" src="'. base_url().'assest/images/teames/'.$this->session->userdata['uimg'].'" /> ';
                        }
                        else
                        {
                            redirect(base_url());
                        }
                    }
                    else
                    {
                        redirect(base_url());
                    }
                ?>
            </div>
 
             <h5 style="">
             <?php 
                     if (isset($this->session->userdata['user_login']))
                     {
                         if($this->session->userdata['user_login']==1)
                         {
                             echo $this->session->userdata['uname'];

                         }
                         else
                         {
                            redirect(base_url());  
                         }
                     }
                     else
                     {
                         redirect(base_url());
                     }
                     
                     ?>
             </h5>
             <h5 style="">
             <?php 
                     if (isset($this->session->userdata['user_login']))
                     {
                         if($this->session->userdata['user_login']==1)
                         {
                             echo $this->session->userdata['uemail'];

                         }
                         else
                         {
                            redirect(base_url());  
                         }
                     }
                     else
                     {
                         redirect(base_url());
                     }
                     
                     ?>
             </h5>
             <br>
             <div class="work_user">
                 <ul>
                     <li><a href="<?php echo base_url().'User/Profile'?>"> المعلومات الشخصية</a></li>
                     <li><a href="<?php echo base_url().'User/Edit_info'?>">تعديل المعلومات</a></li>
                     <?php 
                     if (isset($this->session->userdata['user_type']))
                     {
                         if($this->session->userdata['user_type']==1)
                         {
                            echo '<li><a href="'.base_url().'User/Sponsor_new_orphan'.'">كفالة يتيم جديد</a></li>';  
                           // echo '<li><a href="'.base_url().'User/Notefecation'.'">الاشعارات</a></li>';  
                         }
                         else
                         {
                            echo '<li><a href="'.base_url().'User/Task'.'">المهام</a></li>'; 
                          //  echo '<li><a href="'.base_url().'User/Notefecation'.'">الاشعارات</a></li>';  
                         }
                     }
                     else
                     {
                         redirect(base_url());
                     }
                     
                     ?>
                 </ul>
             </div>
        </div>
        <div class="content_right">
            <br><br><br>