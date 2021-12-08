
            <div class="content_right_all">
            <table class="table" style="float:right;direction:rtl;" >
                <thead class="thead-dark">
                <tr>
                    <th class="th_center">أسمك </th>
                    <th class="td_center" id="th_height"><?= $this->session->userdata['uname']?></th>
                    <th><a class="btn btn-success" onclick="name_u()"  role="button">تغير</a>
                </tr>
                <tr>
                    <th class="th_center"> الرقم السري</th>
                    <th class="td_center" id="th_height">##############</th>
                    <th><a class="btn btn-success" onclick="pass_u()"  role="button">تغير</a>
                </tr>
                <tr>
                    <th class="th_center">الايميل الشخصي</th>
                    <th class="td_center" id="th_height1"><?= $this->session->userdata['uemail']?></th>
                    <th><a class="btn btn-success" onclick="email_u()" role="button">تغير</a>

                </tr>
                <tr>
                    <th class="th_center">عنوانك</th>
                    <th class="td_center" id="th_height1"><?= $this->session->userdata['uaddress']?></th>
                    <th><a class="btn btn-success" onclick="address_u()" role="button">تغير</a>

                </tr>
                <tr>
                    <th class="th_center"> رقم المبايل</th>
                    <th class="td_center" id="th_height"><?= $this->session->userdata['uphone']?></th>
                    <th>  <a class="btn btn-success" onclick="phone_u()" role="button">تغير</a>
                </tr>
                <tr>
                    <th class="th_center">صورتك الشخصية </th>
                    <th class="td_center"><img class="img_table"src="<?php
                    
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
                
                        
                        ?>">
                    </th>
                    <th><a class="btn btn-success" onclick="img_u()" role="button">تغير</a>
                        
                </tr>

                </thead>

             </table>
             <br>
             <p style="border-top:2px solid #6c757d;width:100%;display: flex;"></p>
             <?php 
                 // عرض رسالة للمستخدم عند الخطا
                 $error=$this->session->flashdata("error_edit");
                 if(isset($error))
                 {
                     echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
                     '.$error.
                     '</p>';       
                    
                 }

                                   
                ?>
            <div class="form_u" id="form_u">
                  
            </div>
            </div>
            <script type='text/javascript' src="<?php echo base_url(); ?>assest/js/form_edit_info.js"></script>
