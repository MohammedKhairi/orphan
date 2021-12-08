<br>
    
    <div class="container">
      <br>

          <div class="row">
          <?php foreach($gallaries as $gallary):?>
          <!-- get on img for gallary -->
          <!-- one gallary-s -->
            <div class="col-md-4">
              <div class="thumbnail">
                <a href="<?php echo base_url().'Gallary/Show/'.$gallary['g_id']?>">
                  <img src="

                  <?php 
                   echo base_url().'assest\images\gallary'.'\\' .$gallary["g_i_img"];                   
                   ?>
                  " alt="Lights" style="width:100%;height:300px;">
                  <div class="caption">
                    <p><?=$gallary['g_title']?></p>
                  </div>
                </a>
              </div>
            </div>
          <!-- one gallary-e -->
          <?php endforeach;?>
        </div>
      <br>
      <br>


    </div>