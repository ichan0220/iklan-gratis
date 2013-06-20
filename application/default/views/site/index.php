<style type="text/css">
    .desktop {text-align: center;}
</style>
<div class="container">
        <!-- <h1><img src="<?php //echo theme_url('/img/logo-small.png') ?>"></h1> -->
        <?php //echo $this->admin_panel->show_desktop(4, true) ?>
    <div class="row-fluid">
        <fieldset class="desktop">
            <legend><?php echo l('Toko MuraH') ?></legend>
            <div class="layout-flexible row-fluid" style="margin-top: 50px; margin-bottom: 50px">
                <div class="span6 item">
                    <a href="<?php echo site_url ('user/listing') ?>" title="">
                        <img src="<?php echo theme_url('/img/people.png') ?>" width="150" height="150">
                        <div class="clear"></div>
                        <h6>Profil</h6>
                    </a>
                </div>
                <div class="span6 item">
                    <a href="<?php echo site_url('iklan/listing') ?>">
                        <img src="<?php echo theme_url('/img/iklan.png') ?>" width="150" height="150">
                        <div class="clear"></div>
                        <h6>Iklan</h6>
                    </a>
                </div>
            </div>
        </fieldset>
    </div>
</div>