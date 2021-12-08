
            <div class="content_right_all">
            <table class="table" style="float:right;direction:rtl;">
                <thead class="thead-dark">
                <tr>
                    <th class="th_center">صورتك الشخصية </th>
                    <th class="th_center">أسمك </th>
                    <th class="th_center">عنوانك</th>
                    <th class="th_center">عدد المهام الموكلة اليك</th>
                    <th class="th_center">تعديل المعلومات</th>

                </tr>
                </thead>

                <tbody>
                <tr>
                    <td class="td_center"><img class="img_table"src="<?php
                    if(isset($this->session->userdata['uimg']))
                    {
                    if($this->session->userdata['user_type']==1)
                    {
                        echo base_url().'assest/images/sponsor/'.$this->session->userdata['uimg']; 
                    }
                    else
                    {
                        echo base_url().'assest/images/teames/'.$this->session->userdata['uimg']; 
                    }
                    }
            
                    
                    ?>"></td>
                    <td class="td_center" id="th_height"><?= $this->session->userdata['uname']?></td>
                    <td class="td_center" id="th_height1"><?= $this->session->userdata['uaddress']?></td>
                    <td class="td_center" id="th_height1"><?= $num_task;?></td>

                    <td class="td_center" id="th_height2">
                        <a class="btn btn-success" href="<?php echo base_url().'User/Team_Task'?>" role="button">عرض المهام</a>
                    </td>
                </tr>
                </tbody>
             </table>
            </div>



