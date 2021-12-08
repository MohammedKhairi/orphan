
	<!-- ####################################### -->
	<!-- image for website -->
	<br>
	<div class="container">
	<div class="img_web" id="parax">
		<div class="img_web_img" id="bg__image">
			<div class="img_web_img_txt">
				<p>أصنع الفارق</p>
				<p>لأطفالنا في العراق</p>
			</div>
		</div>
		
	</div>
	</div>
	<script src="<?=base_url()?>assest/js/bg_change.js"></script>
	<!-- ####################################### -->
	 <br>
	<hr class="hr_menue" >
	<br>	 
	<div class="needs">
		<div class="container">
			<h4 class="need_title" style="color:#5e8c2a;">قدم الدعم في احتياجاتنا</h2>
			<br>

			<ul class="need_list">
				<li>
					<a href="Support">
						<ul class="sec_list">
							<li>الملابس</li>
							<li><i class="fas fa-tshirt"></i></li>
						</ul>
					</a>
				</li>
				<li>
					<a href="Support">
						<ul class="sec_list">
							<li>مستلزمات طبية</li>
							<li><i class="fas fa-briefcase-medical"></i></li>
						</ul>
					</a>
				</li>
				<li>
					<a href="Support">
						<ul class="sec_list">
							<li>نقود</li>
							<li><i class="fas fa-cash-register"></i></li>
						</ul>
					</a>
				</li>
				<li>
					<a href="Support">
						<ul class="sec_list">
							<li>سكن</li>
							<li><i class="fa fa-bed" aria-hidden="true" style="font-size: 30px;"></i></li>
						</ul>
					</a>
				</li><li>
					<a href="Support">
						<ul class="sec_list">
							<li>غذاء</li>
							<li><i class="fas fa-hamburger"></i></li>
						</ul>
					</a>
				</li>

			</ul>
		</div>
	</div>
	<!-- ###################[why orphan]#################### -->
	
	
	<div class="container regtangle">
		<div class="orhan_w">
			<h1>لماذا الأيتام</h1>

			<p class="why_b">كان للحرب على الإرهاب آثار سلبية على العراق وشعبه. تسبب الإرهابيون والمفجرون الانتحاريون في مقتل العديد من المدنيين الأبرياء بشكل شبه يومي. لا يدخر أحد في هذه الأحداث المميتة ، لا رجل أو امرأة أو طفل. بالنسبة للأطفال الذين فقدوا أحد الوالدين أو كليهما ، فإن أن يصبح يتيماً هو احتمال قاتم. لا أب ليطعمهم ولا أم تمسح دموعهم. لا سقف فوق رؤوسهم.</p>
	
			<p class="why_b">
يوجد حاليًا أكثر من 3 ملايين يتيم في العراق ، وينمو العدد بشكل كبير كل أسبوع.</p>
			<p class="why_b">وهذا يجعل هؤلاء الأيتام عرضة للعديد من الخاطفين الذين سيستفيدون استغلالًا تامًا وإساءة معاملة هؤلاء الأيتام العراقيين إما عن طريق بيعهم إلى الخارج أو الاستفادة منهم محليًا بوصفهم متسولين أو خدم أو عاهرات أو يُباعون فقط للأجانب الأثرياء.</p>
		</div>
		
	</div>
	      
	<!-- ####################[why orphan]################### -->

	<!-- #####################[Event]################## -->
    <div class="event">
		<div class="container">
			<h1 class="E_title"><span> الاحداث & الاخبار</span></h1>
			<div class="E_content">

			<div class="container">
				<div class="row">
				<?php foreach($events as $event):?>
					<?php 
						// get one img for event
						$this->load->database();
						$this->db->where('g_i_id', $event['g_id']);
						$this->db->group_by("g_i_id ");
						$result = $this->db->get('g_img');
						$img=$result->row(0)->g_i_img;			
					?>
				<!-- #####################[card]################## -->
					<div class="col-sm-4" style="margin-top: 9px;    margin-right: -10px;">
						<div class="card" style="margin-bottom: 5px;">
								<img class="card-img-top"
								src="
								<?php
									echo base_url().'assest\images\gallary'.'\\' .$img;                   
								?>"
								alt="Card image cap" style="width:100%;height:25rem;margin: auto;float: none;">
								<div class="card-body">
									<h5 class="card-title"><?=$event['g_title']?></h5>
									<p class="card-text"> <?php echo mb_strcut($event['e_content'],0,160,'UTF-8');?></p>
									<a href="<?php echo base_url().'News/Show_Event/'.$event['e_id']?>" class="btn btn-primary">أقرأ المزيد</a>
								</div>
						</div>
				    </div>
					<?php endforeach;?>						
				</div>
			
			</div>
			<br>
			<hr>
            <div style=" float:none;margin:auto;width: 50%;text-align: center;" >
		       	<a style="background: #99cc00;color: #fff;padding: 10px;border-radius: 7px;" href="<?php echo base_url()?>News/1"> المزيد من الاخبار أضغط هنا</a>

			</div>
			<br>
			<br>

			
			</div>

			
		</div>
	</div>

	<!-- #####################[Event]################## -->
