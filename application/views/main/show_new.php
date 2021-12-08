<div class="container footer-height" style="direction: rtl;">
    <?php foreach($events as $data): ?>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    // get one img for event
                    $this->load->database();
                    $this->db->where('g_i_id', $data['g_id']);
                    $this->db->group_by("g_i_id ");
                    $result = $this->db->get('g_img');
                    $img=$result->row(0)->g_i_img;			
                ?>
                <img class="img-thumbnail" alt="Image" width="100%"  src="
                    <?php
						echo base_url().'assest\images\gallary'.'\\' .$img;                   
					?>
                ">
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 lead text-right">
                     <div class="post-game-part-image-title">
							<h6><a href=""> 
                           <!-- news title -->
                           <?= $data['g_title'];?>
                              </a></h6>
                    </div>
        <hr>
                    
                    <div class="post-game-part-image-about">
                        <div class="post-game-part-image-about-all">
                            <p> <span class="s_about">بواسطة</span>:الادمن
                                |<span class="s_about"><?=date('M d,Y',strtotime( $data['e_date']))?></span>|
                                  |
                                <span class="s_about">التعليقات</span>:مفعل
                            </p>					
                        </div>
					</div>
                
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 lead">
                        <div class="post-game-part-image-content">
                        <p><?= $data['e_content'] ?></p>
						</div>
            </div>
        </div>
        <hr>
        <br>
    
        <p class="p_join"> 
        يمكنك رؤية جميع الصور للحدث
            <a href="<?php echo base_url().'Gallary/Show/'.$data['g_id']?>" class="btn btn-primary" style="float: none;">من هنا
            </a>   
        </p> 
        <br>
        <hr>
      
   <!-- #############[s-post-comments]############## -->
   <br>
   <?php
   // عرض رسالة للمستخدم عند الاضافة
    $add=$this->session->flashdata("comment_add");
    if(isset($add))
    {
        echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
        '.$add.
        '</p>';
       
    }
    ?>
  <br>
  <div class="post_cat">
        <div class="section_title">
            <h2 class="title" style="float: right;color: #99cc00;font-size: 20px;font-family: 'El Messiri', sans-serif;">
                أترك تعليقا عن الموضوع
            </h2>
        </div>
    </div>
    <form action="<?php echo base_url()?>Comment/Add" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">الاسم</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال الاسم">
            <span class="text-danger"><?php echo form_error('name');?></span>
       
        </div>
    
        <div class="form-group">
        <label for="formGroupExampleInput"> التعليق</label>
            <textarea id="editor1" name="body" cols="30" rows="5" class="form-control ">
              
            </textarea>
         </div>
         <span class="text-danger"><?php echo form_error('body');?></span>
         <input type="hidden" name="event_id" value="<?=$data['e_id']?>" >
    
        <div class="form-group" >
            <button type="submit" name="submit"  class="primary_button"style="float: right">
                أضافة
            </button>
        </div>

            
    </form>
    <?php endforeach; ?>

 
 <!-- ########### --> 
 <br>
 <br>
 <!-- ########### -->   


    <div class="post_cat">
        <div class="section_title">
            <h2 class="title" style="float: right;color: #99cc00;font-size: 20px;font-family: 'El Messiri', sans-serif;">
                <?php echo $num_comments?>
                 تعليقات
            
            </h2>
        </div>
    </div>

    <br>
    <div class="all_comment">
    <?php foreach($comments as $comment): ?>
        <div class="comment_p">
            <div class="comment_body">
                    <ul class="comment_info">
                            <li><a href=""><?=$comment['c_u_name']?></a></li>
                            <li style="margin-left: 13px;"><?=date('M d,Y',strtotime( $comment['c_date']))?></li>
                    </ul>
                    <p> 
                    <?=$comment['c_content']?>
                    </p>
                     <!-- من اجل الخصول على  رد على التعليق -->
                     <?php
                                
                                $this->load->database();
                               
                                $this->db->from('replay_c');
                                $this->db->where('c_r_id', $comment['c_id']);
                                $num = $this->db->get()->num_rows();
                                if($num>0)
                                {
                                    $this->db->where('c_r_id', $comment['c_id']);
                                    $result = $this->db->get('replay_c');
                                    $replay=$result->row(0)->c_r_content;
                                    $replay_date=$result->row(0)->c_r_date;


                                    $result = $this->db->get('replay_c');
                                    echo'
                                    <div class="replay">
                                        <ul class="comment_info">
                                                <li><i class="fa fa-reply" aria-hidden="true" style="color:#6cce4e;margin-left:5px;margin-right:5px;"></i><a href="">admin</a></li>
                                                <li style="margin-left: 13px;">';echo date('M d,Y',strtotime( $replay_date));echo'</li>
                                        </ul>
                                        <p> 
                                        
                                            ';echo $replay;
                                       echo' </p>
                                    </div>
                                    ';
                                }
                        ?>
                    

            </div>
        </div>
        <?php endforeach; ?>
        
    
    </div>
  <!--  / post comment -->

<!-- #############[e-post-comments]############## -->
</div>