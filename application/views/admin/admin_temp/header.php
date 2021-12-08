<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> <?php echo $title;?></title>
    <link href="https://fonts.googleapis.com/css?family=El+Messiri|Markazi+Text&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="<?=base_url()?>assest/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assest/css/bootstrap/bootstrap.css">

<!--JQuery version-->
<script src="<?=base_url()?>assest/js/jquery-3.4.1.min.js"></script>

<!--Bootstrap JS-->
<script src="<?=base_url()?>assest/js/bootstrap/bootstrap.min.js"></script>

<!-- fontawesome icon  -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
</head>


  
<style>


    .dropdown-item a
    {
      color:#fff;
    }
    .dropdown-menu
    {
      text-align: center;
    }
    #ajax_form
    {
      direction: rtl;
      font-family: 'El Messiri', sans-serif;
    }
    .l_form
    {
      direction: rtl;
      float: right;
      font-family: 'El Messiri', sans-serif;
    }
    .form-group
    {
      direction: rtl;
    }
    img.img_table
    {
      width: 120px;
        height: 80px;
    }

    .th_center
    {
      text-align: center;
      font-family: 'El Messiri', sans-serif;
    }
    .td_center
    {
      text-align: center;
      font-family: 'El Messiri', sans-serif;
    }
    #th_height
    {
        line-height: 55px;
    }
    #th_height1
    {
        line-height: 55px;
    }
    #th_height2
    {
        line-height: 55px;
    }
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width:500px;
      max-width:500px;
      margin: auto;
      text-align: center;
      font-family: arial;
      direction: rtl;
    }

    .price {
      color: grey;
      font-size: 22px;
      font-family: tahoma;
    }

    .card button {
      font-family: 'El Messiri', sans-serif;
      border: none;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .card button:hover {
      opacity: 0.9;
    }
    footer {
    width: 100%;
    height: 80px;
    background: #343a40;
    display: flex;
}
</style>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark " style="direction: rtl;font-family: 'El Messiri', sans-serif;">
  <!-- Brand -->
  <a class="navbar-brand" href="#">مؤسسة اليتيم العراقي</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <!-- الادمن -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      <span class="fas fa-user"></span> الملف الشخصي
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Info_Admin">عرض المعلومات</a>
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Edite_Admin">تعديل المعلومات</a>
      </div>
    </li>
    <!-- الايتام -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        الأيتام
      </a>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_orphan">عرض الايتام غير المكفولين</a>
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_orphan_s">عرض الايتام المكفولين</a>
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Add_orphan">اضافة يتيم</a>
      </div>
    </li>
    <!-- الكفيل -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      الكفيل
      </a>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_sponsor_Request"> طلب اضافة كفيل </a>
      <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_sponsor">عرض جميع الكفلاء </a>
     
      </div>
    </li>
     <!-- المجلة -->
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      المجلة
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/show_gallary">عرض المجلات</a>
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Add_gallary">أضافة مجلة</a>
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Add_photo">أضافة صور للمجلة</a>
      </div>
    </li>
    <!-- المجلة -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      الأحداث
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_News">عرض  الاحداث</a>
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Add_News">أضافة حدث جديد</a>
      </div>
    </li>
    <!-- المجلة -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      التعليقات
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_Comment">عرض  التعليقات</a>
        
      </div>
    </li>
     <!-- الفرق الجوالة -->
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown">
        الفرق التطوعية
      </a>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_Team_Request">   طلب أضافة للفرق </a>
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_Team_g_Mony">  فرق جمع التبرعات</a>
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_Team_k_Orphan"> فرق رعاية الايتام</a>
        
      </div>
    </li>
     <!-- التبرعات -->
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      التبرعات
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_support_not"> جميع التبرعات غير المخصصة</a>
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_support"> جميع التبرعات المخصصة</a>

      </div>
    </li>
     <!-- الرسائل -->
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      الرسائل   
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url()?>Admin/Show_Message">عرض جميع الرسائل</a>
      </div>
    </li>
     

  </ul>

  <ul class="nav navbar-nav navbar-right" style="direction: rtl;font-family: 'El Messiri', sans-serif;display: block;">
      <li><a style="font-size: 12px;" href="<?php echo base_url()?>"><span class="fas fa-globe"></span> عرض الموقع</a></li>
      <li><a style="font-size: 12px;" href="<?php echo base_url()?>Admin/Logout"><span class="fas fa-sign-out-alt"></span> تسجيل الخروج</a></li>
  </ul>

</nav>