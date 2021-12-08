<br>
    
<div class="container">
<br> 



<?php foreach($events as $event):?>
  <!-- #############[s-post]############## -->
		<div class="post-game">
				<div  class="post-game-part">
					<div  class="post-game-part-image">
						<?php 
							// get one img for event
							$this->load->database();
							$this->db->where('g_i_id', $event['g_id']);
							$this->db->group_by("g_i_id ");
							$result = $this->db->get('g_img');
							$img=$result->row(0)->g_i_img;	
						?>
					    <img src="
						<?php
						echo base_url().'assest\images\gallary'.'\\' .$img;                   
						?>
						" width='100%' height='100%'/>
					</div>
					<div  class="post-game-part-content">
						
						<div class="post-game-part-image-title">
							<h6><a href="<?php echo base_url().'News/Show_Event/'.$event['e_id']?>"> 
                           <!-- news title -->
						   <?php echo $event['g_title'];?>
                              </a></h6>
						</div>
						<div class="post-game-part-image-about">
							<div class="post-game-part-image-about-all">
								<p> <span class="s_about">بواسطة</span>:الادمن
									|<span class="s_about"><?=date('M d,Y',strtotime( $event['e_date']))?></span>|
									<span class="s_about">التصنيف</span>: الأخبار|
								    <span class="s_about">التعليقات</span>:مفعل
								</p>					
							</div>
						</div>
						<div class="post-game-part-image-content">
							<p>
							<?php echo mb_strcut($event['e_content'],0,160,'UTF-8');?>............
								<a href="<?php echo base_url().'News/Show_Event/'.$event['e_id']?>"class="a_mor"><span class="more">أقرأ المزيد</span> </a>
							</p>
						</div>

						
					</div>
					
				</div>
				
		</div>
  <!-- #############[E-post]############## -->
<?php endforeach;?>



<br>

<div class="center">
  <div class="pagination">
  <?php
   if($page>1)
	echo'<a href="'.base_url().'News/'.($page-1).'">&laquo;  السابق </a>';
	$post_per_page=5;
	$number_of_pags=ceil($number_e/ $post_per_page);
	echo '<a href="'.base_url().'News/'.$page.'"class="active">'.$page.'</a>';
	if($page<$number_of_pags)
	echo'<a href="'.base_url().'News/'.($page+1).'">التالي  &raquo;</a>';
 
 ?>
  </div>
</div>

</div>