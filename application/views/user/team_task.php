
            <div class="content_right_all">
             
            <!-- =================[task fpr team orphan]=================== -->

             <?php 
             if($this->session->userdata['ujob']==0)
             {
               echo
               '
               <br/>
               <br/>
               <h2 style="text-align: center;font-family: El Messiri, sans-serif;">  المهام الموكلة الى احد اعضاء فرق رعاية الايتام </h2>
               <br>
               <table class="table" style="float:right;direction:rtl;">
                 <thead class="thead-dark">
                   <tr>
   
                     <th class="th_center">محتوى المهمة </th>
                     <th class="th_center">تأريخ المهمة  </th>
                   </tr>
                 </thead>
                 <tbody>';
                  foreach($team_orphan as $task):
                  echo' <tr>
                     <td class="td_center" id="th_height1">'.$task["ts_content"].'</td>
                     <td class="td_center" id="th_height1">'. $task["ts_date"].'</td>
                   </tr>';
                  endforeach;
                  echo'</tbody></table>';
          }
          
          else
          {

        
        
          
          ?>
            
            


            <!-- =================[task fpr team get mony]=================== -->
 
            <table class="table" style="float:right;direction:rtl;border-bottom:2px solid #6c757d;">
            <thead class="thead-dark">
              <tr>
              <th class="th_center">عنوان المهنة</th>
              <th class="th_center">عنوانك</th>
              <th class="th_center">تأريخ المهمة</th>
              <!-- <th class="th_center"> المهة الموكلة اليك</th> -->
              <th class="th_center">تعديل المعلومات</th>

              </tr>
            </thead>

            <tbody>
            <?php foreach($team_mony as $team):?>
              <tr>
                <td class="td_center" id="th_height1"><?= $team['sp_address'];?></td>
                <td class="td_center" id="th_height1"><?= $team['t_adress'];?></td>
                <td class="td_center" id="th_height1"><?= date('M d,Y',strtotime($team['sp_date']));?></td>
                <td class="td_center" id="th_height2">
                    <a class="btn btn-success"  style="cursor:pointer;" onclick="get_id('<?= $team['sp_id'];?>')" role="button">عرض المهمة</a>
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
          <div id="result">
      
         </div>
         
          <script type='text/javascript' src="<?php echo base_url(); ?>assest/js/team_task.js"></script>
          <?php
                
              }
            
            ?>
            </div>
           

  