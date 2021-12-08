<br>
    
    <div class="container">
      <br>
      <h1 class="E_title"><span><?=$gallaries[0]["g_title"];?></span></h1>
      <br>

          <div class="row">
          <?php foreach($gallaries as $gallary):?>
          <!-- get on img for gallary -->
          <!-- one gallary-s -->
            <div class="col-md-6">
              <div class="thumbnail">
                
                  <img src="

                  <?php 
                   echo base_url().'assest\images\gallary'.'\\' .$gallary["g_i_img"];                   
                   ?>
                  " alt="Lights" style="width:100%;height:400px;">            
              </div>
            </div>
          <!-- one gallary-e -->
          <?php endforeach;?>
        </div>
      <br>
      <br>
    </div>