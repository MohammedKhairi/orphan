
  <br />
  <br />
 
<div class="container">
  <h2 style="text-align: center;font-family: 'El Messiri', sans-serif;">أخر 20 تبرع تم أضافتهم الى المؤسسة</h2>
  <br>
  <table class="table" style="float:right;direction:rtl;">
    <thead class="thead-dark">
      <tr>
        <th class="th_center">أسم المتبرع</th>
        <th class="th_center">عنوان المتبرع</th>
        <th class="th_center"> محتوى مختصر للتبرع</th>
        <th class="th_center">نوع التبرع</th>
        <th class="th_center">تعديل المعلومات</th>

      </tr>
    </thead>

    <tbody>
    <?php foreach($supportes as $support):?>
      <tr>
        <td class="td_center" id="th_height"><?= $support['sp_name'];?></td>
        <td class="td_center" id="th_height1"><?= $support['sp_address'];?></td>
        <td class="td_center" id="th_height1"><?php echo mb_strcut($support['sp_content'],0,60,'UTF-8');?></td>
        <td class="td_center" id="th_height1">
            <?php
              $type=$support['sp_type'];
              if($type==1)
              echo 'ملابس';
              else if($type==2)
              echo 'دواء';
              else if($type==3)
              echo 'نقود';
              else if($type==4)
              echo 'اماكن سكن';
              else
              echo 'طعام';


            ?>
        </td>
        <td class="td_center" id="th_height2">
            <a class="btn btn-success" href="<?php echo 'Show_one_support/'.$support['sp_id'];?>" role="button">عرض و تخصيص</a>
            <a class="btn btn-danger" href="<?php echo 'Delete_support/'.$support['sp_id'];?>" role="button">حذف</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

