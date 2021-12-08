

<br>
<br>
<div class="container">
  <br>
  <br>
    <div style="text-align: center;font-family: 'El Messiri', sans-serif;direction:rtl;">
      <h3 class="text-primary"> اسم المتبرع</h3>
      <p><?= $supportes[0]['sp_name']?></p>
      <h3 class="text-primary"> ايميل المتبرع</h3>
      <p><?= $supportes[0]['sp_email']?></p>
      <h3 class="text-primary"> رقم هاتف المتبرع</h3>
      <p><?= $supportes[0]['sp_phone']?></p>
      <h3 class="text-primary"> عنوان المتبرع</h3>
      <p><?= $supportes[0]['sp_address']?></p>
      <h3 class="text-primary"> تأريخ التبرع</h3>
      <p><?= date('M d,Y',strtotime( $supportes[0]['sp_date'])) ;?></p>
      <h3 class="text-primary"> نوع التبرع</h3>
      <p>
      
      <?php  
       $type=$supportes[0]['sp_type'];
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
      
      </p>
      <h3 class="text-primary">محتوى التبرع</h3>
      <p><?= $supportes[0]['sp_content']?></p>
    </div>
<br>

<h2 style="text-align: center;font-family: 'El Messiri', sans-serif;"> أختر شخص من فرق جمع التبرعات لاتمام عملية جمع هذا التبرع</h2>

    <form id="ajax_form"  method="post" action="<?php echo base_url().'Admin/sp_give_team/'.$supportes[0]['sp_id']?>">

    <div class="form-group" >
            <label style="float: right;direction: ltr;" for="sel1">أختر أحد الأعضاء من القائمة</label>
            <select class="form-control" id="sel1" name="sp_team_id">
                    <?php foreach($t_mony as $team):?>
                    <?php
                      echo '<option value="'.$team["t_id"].'">';

                      echo $team['t_name'];
                   
                      echo' </option>';
                    ?>

                  <?php endforeach;?>
            </select>
            </div>

    <br>
    <div class="form-group">
    <button type="submit" id="button"style="float: right;" class="btn btn-success col-md-2"> تخصيص</button>
    </div>

    </form>
</div>

