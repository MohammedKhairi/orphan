

      <br>
      <br>
      <br>


    <div class="container">
      <div class="orhan_w">
        <h3 style="color:#fff;"> يمكنك التبرع بلنقود  على الحساب البنكي ->   001 045345 444      </h1>
    
      </div>
    <br>
    <br>

    <p class="p_join"> 
    يمكنك زيارة المؤسسة من خلال الموقع
         <a href="About_Us" class="btn btn-primary" style="float: none;">من هنا
         </a>   
    </p> 
    <br>
    <br>
          <div class="needs">
        <div class="container">
          <h4 class="need_title" style="color:#5e8c2a;">قدم الدعم في احتياجاتنا</h2>
          <br>
          <?php 
            // عرض رسالة للمستخدم عند الاضافة
            $add=$this->session->flashdata("support_add");
            if(isset($add))
            {
                echo '<p style="background-color: #81c75d;padding: 10px 0px;text-align: center;color: #fff;">
                '.$add.
                '</p>';
              
            }
            
            ?>
          <?php
          // show form error
          $error=validation_errors();
          if($error)
            {
          echo '<div style="background-color: #de6e6e;padding: 10px 0px;text-align: center;color: #fff;">
          '.validation_errors().
          '</div>';
            }

          ?>

          <ul class="need_list">
            <li id="clothes" style="cursor: pointer;" title="تبرع  بلملابس للايتام ">
              <a>
                <ul class="sec_list">
                  <li>الملابس</li>
                  <li><i class="fas fa-tshirt"></i></li>
                </ul>
              </a>
            </li>
            <li id="medical" style="cursor: pointer;" title="قدم الاستشارات الطبية للايتام">
              <a>
                <ul class="sec_list">
                  <li>مستلزمات طبية</li>
                  <li><i class="fas fa-briefcase-medical"></i></li>
                </ul>
              </a>
            </li>
            <li id="cach" style="cursor: pointer;" title="تبرع بلنقود للايتام">
              <a>
                <ul class="sec_list">
                  <li>نقود</li>
                  <li><i class="fas fa-cash-register"></i></li>
                </ul>
              </a>
            </li>
            <li id="home" style="cursor: pointer;" title="قدم اماكن سكن للاايتام">
              <a>
                <ul class="sec_list">
                  <li>سكن</li>
                  <li><i class="fa fa-bed" aria-hidden="true" style="font-size: 30px;"></i></li>
                </ul>
              </a>
            </li>
            <li id="food" style="cursor: pointer;" title="تبرع بلمواد الغذائية للايتام">
              <a>
                <ul class="sec_list">
                  <li>غذاء</li>
                  <li><i class="fas fa-hamburger"></i></li>
                </ul>
              </a>
            </li>

          </ul>
        </div>
      </div>

      <br>
      
      <br>
     
    
      
      <!-- ###########[s-clothes]################ -->
      <div class="bg_model">
        <div class="model_content">
            <div class="close" title="Close Overlay" 
            style="font-size:41px;color: #99cc00;">+</div>
            <!-- ################[s_body]################## -->
           
              <div class="orhan_w">
                  <h3><i class="fas fa-tshirt"></i></h1>
                  
                  <p class="why_b why_b_c">يمكنك التبرع بلملابس من خلال تزويدنا بالعنوان الكامل لحضرتك وسوف تقوم الفرقة الخاصة بنا بزيارتك</p>
                  <p class="why_b why_b_c">رجائا قم بملاء المعلومات التالية</p>
              </div>
           
            <br><br>
           
            <!-- ################[s_form]################## -->

              <form id="ajax_form" action="<?php echo base_url()?>Support/Clothes" style="width: 97%;margin: auto;direction: rtl;"method="post" >
              <div class="form-group">
                  <label for="formGroupExampleInput">الاسم</label>
                  <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال الاسم">
              </div>

              <div class="form-group">
                  <label for="email">الايميل </label>
                  <input type="text" name="email" class="form-control" id="email" placeholder=" الرجاء ادخال الايميل">
              </div>  
              <div class="form-group">
                  <label for="email">رقم الهاتف </label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder=" الرجاء ادخال رقم الهاتف">
              </div>   
              <div class="form-group">
                <label for="address"> العنوان </label>
                <input type="text" name="address" class="form-control" id="address" placeholder=" الرجاء ادخال  عنوانك">

            </div> 
              <div class="form-group">
              <label class="lead">كتابة ملاحظة عن التبرع</label>
                  <textarea id="editor1" name="content" cols="30" rows="5" class="form-control ">
                    أخبرنا عن الاشياء التي تريد التبرع بها  وكم عددها او اي شيء اخر
                  </textarea>
              </div>

              <div class="form-group">
              <button type="submit" name="submit" style="float:right;" id="button" class="btn btn-success col-md-2">أرسال</button>
              </div>
              </form>
              <br><br><br><br><br>
              <br>
          
            <!-- ################[s_form]################## -->

            <!-- ################[s_body]################## -->
            
        </div>

    </div>

    <script type="text/javascript">

       document.querySelector('.close').addEventListener('click',function(){

           document.querySelector('.bg_model').style.display='none';
       });
     document.querySelector('#clothes').addEventListener('click',function(){

           document.querySelector('.bg_model').style.display='flex';
       });
    </script>
      <!-- ###########[e-clothes]################ -->
      
      <!-- ###########[s-medical]################ -->
      <div class="bg_model medical" id="medical">
        <div class="model_content">
            <div class="close" id="c_medical" title="Close Overlay" style="font-size:41px;color: #99cc00;">+</div>
            <!-- ################[s_body]################## -->
            
              <div class="orhan_w">
                  <h3><i class="fas fa-briefcase-medical"></i></h1>
                  
                  <p class="why_b why_b_c">يمكنك  تقديم الاستشارات الطبية او الادوية للايتام من خلال تزويدنا بالعنوان الكامل لحضرتك وسوف تقوم الفرقة الخاصة بنا بزيارتك</p>
                  <p class="why_b why_b_c">رجائا قم بملاء المعلومات التالية</p>
              </div>
            
            <br><br>
           
            <!-- ################[s_form]################## -->

            <form id="ajax_form" style="width: 97%;margin: auto;direction: rtl;"method="post" action="<?php echo base_url()?>Support/Medical">
              <div class="form-group">
                  <label for="formGroupExampleInput">الاسم</label>
                  <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال الاسم">
              </div>

              <div class="form-group">
                  <label for="email">الايميل </label>
                  <input type="text" name="email" class="form-control" id="email" placeholder=" الرجاء ادخال الايميل">
              </div>  
              <div class="form-group">
                  <label for="email">رقم الهاتف </label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder=" الرجاء ادخال رقم الهاتف">
              </div>   
              <div class="form-group">
                <label for="address"> العنوان </label>
                <input type="text" name="address" class="form-control" id="address" placeholder=" الرجاء ادخال  عنوانك">

            </div> 
              <div class="form-group">
              <label class="lead">كتابة ملاحظة عن التبرع</label>
                  <textarea id="editor1" name="content" cols="30" rows="5" class="form-control ">
                    أخبرنا عن الاشياء التي تريد التبرع بها  وكم عددها او اي شيء اخر
                  </textarea>
              </div>

              <div class="form-group">
              <button type="submit" name="submit" style="float:right;" id="button" class="btn btn-success col-md-2">أرسال</button>
              </div>
              </form>
              <br><br><br><br><br>
              <br>
            <!-- ################[s_form]################## -->

            <!-- ################[s_body]################## -->
        </div>

    </div>

    <script type="text/javascript">

       document.querySelector('#c_medical').addEventListener('click',function(){

           document.querySelector('.medical').style.display='none';
       });
     document.querySelector('#medical').addEventListener('click',function(){

           document.querySelector('.medical').style.display='flex';
       });
    </script>
      <!-- ###########[e-medical]################ -->

      <!-- ###########[s-cach]################ -->
      <div class="bg_model cach" id="cach">
        <div class="model_content">
            <div class="close" id="c_cach" title="Close Overlay" style="font-size:41px;color: #99cc00;">+</div>
            <!-- ################[s_body]################## -->
              <div class="orhan_w">
                  <h3><i class="fas fa-cash-register"></i></h1>
                  
                  <p class="why_b why_b_c">يمكنك التبرع بلنقود لحياة افضل للايتام من خلال تزويدنا بالعنوان الكامل لحضرتك وسوف تقوم الفرقة الخاصة بنا بزيارتك</p>
                  <p class="why_b why_b_c">رجائا قم بملاء المعلومات التالية</p>
              </div>
            
            <br><br>
           
            <!-- ################[s_form]################## -->

            <form id="ajax_form" style="width: 97%;margin: auto;direction: rtl;"method="post" action="<?php echo base_url()?>Support/Cash">
              <div class="form-group">
                  <label for="formGroupExampleInput">الاسم</label>
                  <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال الاسم">
              </div>

              <div class="form-group">
                  <label for="email">الايميل </label>
                  <input type="text" name="email" class="form-control" id="email" placeholder=" الرجاء ادخال الايميل">
              </div>  
              <div class="form-group">
                  <label for="email">رقم الهاتف </label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder=" الرجاء ادخال رقم الهاتف">
              </div>   
              <div class="form-group">
                <label for="address"> العنوان </label>
                <input type="text" name="address" class="form-control" id="address" placeholder=" الرجاء ادخال  عنوانك">

            </div> 
              <div class="form-group">
              <label class="lead">كتابة ملاحظة عن التبرع</label>
                  <textarea id="editor1" name="content" cols="30" rows="5" class="form-control ">
                    أخبرنا عن الاشياء التي تريد التبرع بها  وكم عددها او اي شيء اخر
                  </textarea>
              </div>

              <div class="form-group">
              <button type="submit" name="submit" style="float:right;" id="button" class="btn btn-success col-md-2">أرسال</button>
              </div>
              </form>
              <br><br><br><br><br>
              <br>
            <!-- ################[s_form]################## -->

            <!-- ################[s_body]################## -->
        </div>

    </div>

    <script type="text/javascript">

       document.querySelector('#c_cach').addEventListener('click',function(){

           document.querySelector('.cach').style.display='none';
       });
     document.querySelector('#cach').addEventListener('click',function(){

           document.querySelector('.cach').style.display='flex';
       });
    </script>
      <!-- ###########[e-cach]################ -->


      <!-- ###########[s-home]################ -->
      <div class="bg_model home" id="home">
        <div class="model_content">
            <div class="close" title="Close Overlay" id="c_home" style="font-size:41px;color: #99cc00;">+</div>
             <!-- ################[s_body]################## -->
           
              <div class="orhan_w">
                  <h3><i class="fa fa-bed" aria-hidden="true"></i></h1>
                  
                  <p class="why_b why_b_c">يمكنك  تقديم لنا اماكن سكن او قطع اراضي لبنائها للايتام من خلال تزويدنا بالعنوان الكامل لحضرتك وسوف تقوم الفرقة الخاصة بنا بزيارتك</p>
                  <p class="why_b why_b_c">رجائا قم بملاء المعلومات التالية</p>
              
            </div>
            <br><br>
           
            <!-- ################[s_form]################## -->
            <form id="ajax_form" style="width: 97%;margin: auto;direction: rtl;"method="post" action="<?php echo base_url()?>Support/Home">
              <div class="form-group">
                  <label for="formGroupExampleInput">الاسم</label>
                  <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال الاسم">
              </div>

              <div class="form-group">
                  <label for="email">الايميل </label>
                  <input type="text" name="email" class="form-control" id="email" placeholder=" الرجاء ادخال الايميل">
              </div>  
              <div class="form-group">
                  <label for="email">رقم الهاتف </label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder=" الرجاء ادخال رقم الهاتف">
              </div>   
              <div class="form-group">
                <label for="address"> العنوان </label>
                <input type="text" name="address" class="form-control" id="address" placeholder=" الرجاء ادخال  عنوانك">

            </div> 
              <div class="form-group">
              <label class="lead">كتابة ملاحظة عن التبرع</label>
                  <textarea id="editor1" name="content" cols="30" rows="5" class="form-control ">
                    أخبرنا عن الاشياء التي تريد التبرع بها  وكم عددها او اي شيء اخر
                  </textarea>
              </div>

              <div class="form-group">
              <button type="submit" name="submit" style="float:right;" id="button" class="btn btn-success col-md-2">أرسال</button>
              </div>
              </form>
              <br><br><br><br><br>
              <br>
            <!-- ################[s_form]################## -->

            <!-- ################[s_body]################## -->
        </div>

    </div>

    <script type="text/javascript">

       document.querySelector('#c_home').addEventListener('click',function(){

           document.querySelector('.home').style.display='none';
       });
     document.querySelector('#home').addEventListener('click',function(){

           document.querySelector('.home').style.display='flex';
       });
    </script>
      <!-- ###########[e-home]################ -->

      <!-- ###########[s-food]################ -->
      <div class="bg_model food" id="food">
        <div class="model_content">
            <div class="close" title="Close Overlay" style="font-size:41px;color: #99cc00;"id="c_food">+</div>
             <!-- ################[s_body]################## -->
            
              <div class="orhan_w">
                  <h3><i class="fas fa-hamburger"></i></h1>
                  
                  <p class="why_b why_b_c">يمكنك التبرع بلمواد الغذائية من خلال تزويدنا بالعنوان الكامل لحضرتك وسوف تقوم الفرقة الخاصة بنا بزيارتك</p>
                  <p class="why_b why_b_c">رجائا قم بملاء المعلومات التالية</p>
              
            </div>
            <br><br>
           
            <!-- ################[s_form]################## -->

            <form id="ajax_form" style="width: 97%;margin: auto;direction: rtl;"method="post" action="<?php echo base_url()?>Support/Food">
              <div class="form-group">
                  <label for="formGroupExampleInput">الاسم</label>
                  <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="الرجاء ادخال الاسم">
              </div>

              <div class="form-group">
                  <label for="email">الايميل </label>
                  <input type="text" name="email" class="form-control" id="email" placeholder=" الرجاء ادخال الايميل">
              </div>  
              <div class="form-group">
                  <label for="email">رقم الهاتف </label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder=" الرجاء ادخال رقم الهاتف">
              </div>   
              <div class="form-group">
                <label for="address"> العنوان </label>
                <input type="text" name="address" class="form-control" id="address" placeholder=" الرجاء ادخال  عنوانك">

            </div> 

              <div class="form-group">
              <label class="lead">كتابة ملاحظة عن التبرع</label>
                  <textarea id="editor1" name="content" cols="30" rows="5" class="form-control ">
                    أخبرنا عن الاشياء التي تريد التبرع بها  وكم عددها او اي شيء اخر
                  </textarea>
                  
              </div>

              <div class="form-group">
              <button type="submit" name="submit" style="float:right;" id="button" class="btn btn-success col-md-2">أرسال</button>
              </div>
              </form>
              <br><br><br><br><br>
              <br>
            <!-- ################[s_form]################## -->

            <!-- ################[s_body]################## -->
        </div>

    </div>

    <script type="text/javascript">

       document.querySelector('#c_food').addEventListener('click',function(){

           document.querySelector('.food').style.display='none';
       });
     document.querySelector('#food').addEventListener('click',function(){

           document.querySelector('.food').style.display='flex';
       });
    </script>
      <!-- ###########[e-food]################ -->


	</div>