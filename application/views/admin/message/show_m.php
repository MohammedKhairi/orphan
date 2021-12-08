
<br>
<br>
<div class="container">
  <h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أسئلة و استفسارات زوار  موقع المؤسسة</h2>
  <br>
  <?php 
    //  عرض رسالة للادمن عند  ارسال الرد
    $error=$this->session->flashdata("email_m_s");
    if(isset($error))
    {
        echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
        '.$error.
        '</p>';       
       
    }

    
    ?>
  
  <table class="table" style="float:right;direction:rtl;">
    <thead class="thead-dark">
      <tr>
        <th class="th_center">الاسم</th>
        <th class="th_center">الأيميل</th>
        <th class="th_center">محتوى مختصر للسؤال</th>
        <th class="th_center">تأريخ الرسالة</th>
        <th class="th_center">تعديل المعلومات</th>



      </tr>
    </thead>

    <tbody>
    <?php foreach($messages as $message):?>
      <tr>
        <td class="td_center" id="th_height"><?= $message['m_r_name'];?></td>
        <td class="td_center" id="th_height1"><?= $message['m_r_email'];?></td>
        <td class="td_center" id="th_height1"><?php echo mb_strcut($message['m_content'],0,60,'UTF-8');?></td>
        <td class="td_center" id="th_height1"><?= date('M d,Y',strtotime( $message['m_date'])) ;?></td>
        <td class="td_center" id="th_height2">
            <a class="btn btn-success" href="<?php echo 'View_Message/'.$message['m_id'];?>" role="button"> عرض</a>
            <a class="btn btn-danger" href="<?php echo 'Delete_Message/'.$message['m_id'];?>" role="button">حذف</a>
        </td>

      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

