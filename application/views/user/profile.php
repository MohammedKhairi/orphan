
            <div class="content_right_all">
                  <div class="card">
                       <div class="card_content">
                             <div class="card_img">
                                <?php
                                if($this->session->userdata['user_type']==1)
                                echo '<img src="'. base_url().'assest/images/sponsor/'.$this->session->userdata['uimg'].'" />';
                             else
                             echo '<img src="'. base_url().'assest/images/teames/'.$this->session->userdata['uimg'].'" /> ';
                                
                                ?>
                             </div>
                             <div class="info_u">
                                <ul>
                                    <li>
                                        الاسم: <?=$this->session->userdata['uname']?>
                                    </li>
                                    <li>
                                        الايميل: <?=$this->session->userdata['uemail']?>
                                    </li>
                                    <li>
                                        العنوان: <?=$this->session->userdata['uaddress']?>
                                    </li>
                                    <li>
                                        الهاتف: <?=$this->session->userdata['uphone']?>
                                    </li>
                                    <li>
                                        عضو ك: <?php 
                                        if($this->session->userdata['user_type']==1)
                                           echo'كفيل';
                                        else
                                        echo'فرق تطوعية';
                                        ?>
                                    </li>
                                    <?php 
                                    if(isset($this->session->userdata['user_type']))
                                    {
                                        if($this->session->userdata['user_type']==2)
                                        {
                                            echo' <li>
                                            نوع الفرقة:'; 
                                            if($this->session->userdata['ujob']==1)
                                            echo'فرق جمع التبرعات';
                                            else
                                            echo'فرق رعاية';
                                             echo'  </li>';
                                        }
                                    }
                                        
                                           
                                        ?>
                                    
                                </ul>
                             </div>
                             
                       </div>
                  </div>
            </div>
