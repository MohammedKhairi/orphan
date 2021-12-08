
<div class="content_right_all">
<form id="ajax_form"action="<?=base_url();?>User/Inser_New_orphan" enctype="multipart/form-data" method="post" action="javascript:void(0)"style=" direction: rtl;">
            <div class="form-group">
            <label for="sel1">أكفل يتيم جديد  من القائمة</label>
            <select class="form-control" id="sel1" name="o_id">
                <?php foreach($orphans as $orphan):?>
                    <?php
                    echo '<option value="'.$orphan["o_id"].'">';
                    echo' <td class="td_center" id="th_height">'.$orphan["o_name"].'</td>';
                    echo '</option>';
                    ?>
                <?php endforeach;?>
            </select>
            </div>
            <div class="form-group">
            <button type="submit" style="float: right;" id="button" class="btn btn-success col-md-2">أرسال</button>
            </div>
            </form>
            <div id="result22">

            </div>
            <script type='text/javascript' src="<?php echo base_url(); ?>assest/js/orphan_info2.js"></script>

</div>



