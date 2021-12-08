
<div class="container">
    <br />
    <br />
    <br />


<h2 style="text-align:center; font-family: 'El Messiri', sans-serif;">لوحة معلومات الادمن</h2>

        <div class="card">
        <img src="<?php echo base_url(); ?>assest/images/admin/<?= $admin[0]['a_img'] ?>" alt="John"alt="Denim Jeans" style="width:100%;height:70%;">
        <h1 style="font-family: 'El Messiri', sans-serif;" >الأسم:<?=$admin[0]['a_name']?></h1>
        <p class="price">عنوان السكن :<?=$admin[0]['a_adress']?></p>
        <p class="price">الايميل:<?=$admin[0]['a_email']?></p>
        <p class="price"> اسم المستخدم:<?php
               if($this->session->userdata('username') !='')
				{
                    echo  $this->session->userdata('username');
				}?></p>
        <p class="price">الرقم السري:<?=$admin[0]['a_pass']?></p>
        <p><a style="width:90%;padding:14px 0px;font-size: 16px;font-family: 'El Messiri', sans-serif;" class="btn btn-success" href="Edite_Admin">تعديل المعلومات</a></p>
        </div>
    <br />
    <br />
    <br />
   
</div>
   