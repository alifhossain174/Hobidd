<?php /* Smarty version Smarty-3.1.17, created on 2022-04-23 00:27:19
         compiled from "./inc/views/f_inc_detail_ad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75290229615007b719b070-31782255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7d2632cbf83123fcd1ac2736879ddf3a1538b5d' => 
    array (
      0 => './inc/views/f_inc_detail_ad.tpl',
      1 => 1650647566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75290229615007b719b070-31782255',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_615007b7aae672_85842171',
  'variables' => 
  array (
    'msg' => 0,
    'B_previewAd' => 0,
    'B_previewAdOffer' => 0,
    'B_previewAdInquiry' => 0,
    'translation' => 0,
    'data' => 0,
    'lang' => 0,
    'vendor' => 0,
    'facility' => 0,
    'date_from_day' => 0,
    'date_from_month' => 0,
    'date_from_year' => 0,
    'date_until_day' => 0,
    'date_until_month' => 0,
    'date_until_year' => 0,
    'user2' => 0,
    'desired_date' => 0,
    'date_desired_from_day' => 0,
    'date_desired_from_month' => 0,
    'date_desired_from_year' => 0,
    'date_desired_until_day' => 0,
    'date_desired_until_month' => 0,
    'date_desired_until_year' => 0,
    'msg_desired_date' => 0,
    'inquiry_id' => 0,
    'link_back' => 0,
    'user' => 0,
    'B_admin' => 0,
    'site_url' => 0,
    'current_path' => 0,
    'time_left' => 0,
    'B_biddBox' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615007b7aae672_85842171')) {function content_615007b7aae672_85842171($_smarty_tpl) {?><style>
    .form-control:disabled, .form-control[readonly] {
        background-color: #fff !important;
        opacity: 1;
    }
</style>
<style>

@media(max-width: 767px){
    .container{
        width: auto;
    }
    .carousel {
    padding: 33px 0 0;
}

#ad-info-mobile h2, .mob-pad h2, h2 {
    font-size: 16px;
    margin: 17px 0 0 !important;
    padding: 0;
}
.mob-pad {
    padding-left: 0;
    padding-right: 0;
}
#ad-info-mobile {    padding: 0;
}
.width-90 {
    width: 100%;
    font-size: 13px;
}
.offer-box-small-text {
    font-size: 13px !important;
}
.card-header h4 {
    font-size: 13px;
}
.offer-box-big-text {
    font-size: 36px !important;
}
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 pr-md-5">

            <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

                </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['B_previewAd']->value||$_smarty_tpl->tpl_vars['B_previewAdOffer']->value||$_smarty_tpl->tpl_vars['B_previewAdInquiry']->value) {?>
                <h1><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_step2'];?>
</h1>
                <div style="margin-bottom: 50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_step2_text'];?>
</div>
            <?php }?>

            <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file1_700'];?>
">
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['file2']) {?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file2_700'];?>
">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['file3']) {?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file3_700'];?>
">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['file4']) {?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file4_700'];?>
">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['file5']) {?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file5_700'];?>
">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['file6']) {?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file6_700'];?>
">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['file7']) {?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file7_700'];?>
">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['file8']) {?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file8_700'];?>
">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['file9']) {?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file9_700'];?>
">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['file10']) {?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file10_700'];?>
">
                        </div>
                    <?php }?>
                </div>
                <a class="carousel-control-prev align-items-end" href="#carouselExampleControls" role="button"
                   data-slide="prev">
					<span class="carousel-control-prev-icon" style="width:40px; height:40px; margin-bottom: 40px;"
                          aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next align-items-end" href="#carouselExampleControls" role="button"
                   data-slide="next">
					<span class="carousel-control-next-icon" style="width:40px; height:40px; margin-bottom: 40px;"
                          aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            
            <div id="ad-info-desktop">
                <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['titleen'], $tmp)!=0)) {?>
                    <h2 style="margin-top:60px"><!--<?php echo $_smarty_tpl->tpl_vars['vendor']->value['company'];?>
--><?php echo $_smarty_tpl->tpl_vars['data']->value['titleen'];?>
</h2>
                    <p style="margin-top:20px; margin-bottom:20px; padding-right:15px;" class="ft">
                        <?php if ((preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['contenten'], $tmp)!=0)) {?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['contenten']);?>
 <?php } else { ?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['content']);?>
<?php }?>
                    </p>
                <?php } else { ?>
                    <h2 style="margin-top:60px"><!--<?php echo $_smarty_tpl->tpl_vars['vendor']->value['company'];?>
--><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h2>
                    <p style="margin-top:20px; margin-bottom:20px; padding-right:15px;" class="ft">
                        <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')) {?>
                            <?php if ((preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['contenten'], $tmp)!=0)) {?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['contenten']);?>
 <?php } else { ?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['content']);?>
 <?php }?>
                        <?php } else { ?>
                            <?php if ((preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['content'], $tmp)!=0)) {?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['content']);?>
 <?php } else { ?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['contenten']);?>
 <?php }?>
                        <?php }?>
                    </p>
                <?php }?>
            </div>

            


            <div id="ad-info-mobile" class="padding10">
                <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['titleen'], $tmp)!=0)) {?>
                    <h2 style="margin-top:60px"><!--<?php echo $_smarty_tpl->tpl_vars['vendor']->value['company'];?>
--><?php echo $_smarty_tpl->tpl_vars['data']->value['titleen'];?>
</h2>
                    <p style="margin-top:20px; margin-bottom:20px; padding-right:15px;" class="ft">
                        <?php if ((preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['contenten'], $tmp)!=0)) {?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['contenten']);?>
 <?php } else { ?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['content']);?>
 <?php }?>
                    </p>
                <?php } else { ?>
                    <h2 style="margin-top:60px"><!--<?php echo $_smarty_tpl->tpl_vars['vendor']->value['company'];?>
--><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h2>
                    <p style="margin-top:20px; margin-bottom:20px; padding-right:15px;" class="ft">
                        <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')) {?>
                            <?php if ((preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['contenten'], $tmp)!=0)) {?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['contenten']);?>
 <?php } else { ?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['content']);?>
 <?php }?>
                        <?php } else { ?>
                            <?php if ((preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['content'], $tmp)!=0)) {?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['content']);?>
 <?php } else { ?> <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['contenten']);?>
 <?php }?>
                        <?php }?>
                    </p>
                <?php }?>
            </div>
            <?php if (count($_smarty_tpl->tpl_vars['data']->value['opt_facility'])>0) {?>
                <div class="mob-pad">
                    <h2 style="margin-top:50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['facilities'];?>
</h2>
                    <br>
                    <div class="row">
                        <?php  $_smarty_tpl->tpl_vars['facility'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['facility']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['opt_facility']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['facility']->key => $_smarty_tpl->tpl_vars['facility']->value) {
$_smarty_tpl->tpl_vars['facility']->_loop = true;
?>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                <div class="ad-facility-box">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['facility']->value['icon'])) {?>
                                        <div class="ad-facility-box__icon">
                                            <i class="fas fa-<?php echo $_smarty_tpl->tpl_vars['facility']->value['icon'];?>
"></i>
                                        </div>
                                    <?php }?>
                                    <div class="ad-facility-box__text">
                                        <?php echo $_smarty_tpl->tpl_vars['facility']->value['name'];?>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php }?>
            <?php if (time()<=strtotime($_smarty_tpl->tpl_vars['data']->value['end_date'])) {?>
                <?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['headline'], $tmp)!=0||preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['headline_de'], $tmp)!=0||preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['text'], $tmp)!=0||preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['text_de'], $tmp)!=0) {?>
                    <div class="mob-pad" style="background: #FAFAFA;    ">
                        
                        <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['link'];?>
" style="color: #000 !important;" target="_blank">
                            <?php }?>
                            <?php if (($_smarty_tpl->tpl_vars['lang']->value=='de')) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['link_de'];?>
" style="color: #000 !important;" target="_blank">
                                <?php }?>
                                <?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['headline'], $tmp)!=0||preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['headline_de'], $tmp)!=0) {?>
                                    <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')) {?>
                                        <?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['headline'], $tmp)!=0) {?>
                                            <h2 style="margin-top:60px;font-size: 40px !important;font-weight: 750 !important;padding-top: 15px;color: #1ea6c2 !important;">
                                                <?php echo $_smarty_tpl->tpl_vars['data']->value['headline'];?>

                                            </h2>
                                        <?php }?>
                                    <?php }?>
                                    <?php if (($_smarty_tpl->tpl_vars['lang']->value=='de')) {?>
                                        <?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['headline_de'], $tmp)!=0) {?>
                                            <h2 style="margin-top:60px;font-size: 40px !important;font-weight: 750 !important;padding-top: 15px;color: #1ea6c2 !important;">
                                                <?php echo $_smarty_tpl->tpl_vars['data']->value['headline_de'];?>

                                            </h2>
                                        <?php }?>
                                    <?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['data']->value['text']||$_smarty_tpl->tpl_vars['data']->value['text_de']) {?>
                                    <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')) {?>
                                        <?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['text'], $tmp)!=0) {?>
                                            <p style="margin-top:15px; margin-bottom:35px; padding-right:15px;"
                                               class="ft">
                                                <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['text']);?>

                                            </p>
                                        <?php }?>
                                    <?php }?>
                                    <?php if (($_smarty_tpl->tpl_vars['lang']->value=='de')) {?>
                                        <?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['text_de'], $tmp)!=0) {?>
                                            <p style="margin-top:15px; margin-bottom:35px; padding-right:15px;"
                                               class="ft">
                                                <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['text_de']);?>

                                            </p>
                                        <?php }?>
                                    <?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['data']->value['image']) {?>
                                    <div class="">
                                        <img class="d-block w-100" src="/img/catalog/<?php echo $_smarty_tpl->tpl_vars['data']->value['image'];?>
">
                                    </div>
                                <?php }?>
                            </a>


                    </div>
                <?php }?>
            <?php }?>
            <div class="mob-pad">
                <h2 style="margin-top:50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['special_offer_heading'];?>
</h2>
                
                <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['titleen'], $tmp)!=0)) {?>
                    <p><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['priceinfoen']);?>
</p>
                <?php } else { ?>
                    <p><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['priceinfo']);?>
</p>
                <?php }?>
                
            </div>

            <div>
                <h2 style="margin-top:50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['travel_period'];?>
</h2>
                
                <p><?php echo $_smarty_tpl->tpl_vars['date_from_day']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_from_month']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_from_year']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['date_until_day']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_until_month']->value;?>

                    .<?php echo $_smarty_tpl->tpl_vars['date_until_year']->value;?>
</p>
                
            </div>

            <?php if ($_smarty_tpl->tpl_vars['user2']->value['id']) {?>
                <?php if ($_smarty_tpl->tpl_vars['desired_date']->value) {?>
                    <div>
                        <div id="changeperiod">
                            <h2 style="margin-top:50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['selected_travelling_date'];?>
</h2>
                           
                            <p><?php echo $_smarty_tpl->tpl_vars['date_desired_from_day']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_desired_from_month']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_desired_from_year']->value;?>

                                - <?php echo $_smarty_tpl->tpl_vars['date_desired_until_day']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_desired_until_month']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_desired_until_year']->value;?>
</p>
                            <button type="button" id="clickTravellingPeriod"
                                    class="btn btn-success mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_travel_period'];?>

                            </button>
                        </div>

                        <div id="editPeriod" style="display:none;">
                            <form method="post">
                                <h2 style="margin-top:50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['preferred_travelling_date'];?>
</h2>
                                
                                <div style="width: 57%;">
                                    <input readonly data-days='<?php echo $_smarty_tpl->tpl_vars['data']->value['days'];?>
'
                                           data-end="<?php echo $_smarty_tpl->tpl_vars['date_until_day']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['date_until_month']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['date_until_year']->value;?>
"
                                           data-start="<?php echo $_smarty_tpl->tpl_vars['date_from_day']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['date_from_month']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['date_from_year']->value;?>
"
                                           type="text"
                                           name="data[desired_date]" class="d-block my-4 mx-auto form-control"
                                           value="<?php echo $_smarty_tpl->tpl_vars['desired_date']->value;?>
">

                                </div>
                                <input type="hidden" name="desired_date_submit" value="true">
                                <input type="hidden" name="offer_desired_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
                                <button type="submit" name="submit_desired_date"
                                        class="btn btn-secondary mt-3 mb-5"
                                        value="cancel"><?php echo $_smarty_tpl->tpl_vars['translation']->value['desired_cancel_btn'];?>

                                </button>
                                <button type="submit"
                                        class="btn btn-success mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['desired_preview_btn'];?>

                                </button>
                            </form>
                        </div>
                    </div>
                    <script>
                        $('#clickTravellingPeriod').on('click', function () {
                            $('#changeperiod').hide();
                            $('#editPeriod').show();
                        });
                    </script>
                <?php } else { ?>
                    <div>
                        <?php if ($_smarty_tpl->tpl_vars['msg_desired_date']->value) {?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_smarty_tpl->tpl_vars['msg_desired_date']->value;?>

                            </div>
                        <?php }?>
                        <form method="post">
                            <h2 style="margin-top:50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['preferred_travelling_date'];?>
</h2>
                            
                            <div style="width: 60%;">
                                <input readonly data-days='<?php echo $_smarty_tpl->tpl_vars['data']->value['days'];?>
'
                                       data-end="<?php echo $_smarty_tpl->tpl_vars['date_until_day']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['date_until_month']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['date_until_year']->value;?>
"
                                       data-start="<?php echo $_smarty_tpl->tpl_vars['date_from_day']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['date_from_month']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['date_from_year']->value;?>
" type="text"
                                       name="data[desired_date]" class="d-block my-4 mx-auto form-control">

                            </div>
                            <input type="hidden" name="desired_date_submit" value="true">
                            <input type="hidden" name="offer_desired_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
                            <button type="submit" name="submit_desired_date"
                                    class="btn btn-secondary mt-3 mb-5" value="cancel"><?php echo $_smarty_tpl->tpl_vars['translation']->value['desired_cancel_btn'];?>

                            </button>
                            <button type="submit"
                                    class="btn btn-success mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['desired_preview_btn'];?>

                            </button>
                        </form>
                    </div>
                <?php }?>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
                <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                <script>
                    const self = $('input[name="data[desired_date]"]')
                    var startDate;
                    var endDate;
                    self.daterangepicker({
                        applyButtonClasses: 'd-none',
                        showDropdowns: false,
                        opens: "left",
                        drops: "down",
                        autoApply: true,
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        // startDate: self.data('start'),
                        // endDate: self.data('end'),
                        minDate: self.data('start'),
                        maxDate: self.data('end'),
                        locale: {
                            format: "DD/MM/YYYY"
                        },
                    }, function (start) {
                        console.log("Callback has been called!");
                        $('input[name="data[desired_date]"]').val(start.format('DD/MM/YYYY') + ' - ' + moment(start, "DD-MM-YYYY").add(self.data('days'), 'days').format('DD/MM/YYYY'));
                        startDate = start;
                        endDate = start;

                    });
                </script>
            <?php }?>
            
            <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['cancellation_conditions_en'], $tmp)!=0)) {?>
                <h2 style="margin-top:50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['cancellation_conditions'];?>
</h2>
                
                <p>
                    <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['cancellation_conditions_en']);?>

                </p>
                
            <?php }?>
            <?php if (($_smarty_tpl->tpl_vars['lang']->value=='de')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['cancellation_conditions'], $tmp)!=0)) {?>
                <h2 style="margin-top:50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['cancellation_conditions'];?>
</h2>
                
                <p>
                    <?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['cancellation_conditions']);?>

                </p>
               
            <?php }?>

            <div class="social-links" style="margin-top:25px; margin-bottom:10px;">

                
                    <script>
                        window.fbAsyncInit = function () {
                            FB.init({
                                appId: '944325375604618',
                                xfbml: true,
                                version: 'v2.5'
                            });
                        };
                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) {
                                return;
                            }
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/de_AT/sdk.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                

            </div>

            <?php if ($_smarty_tpl->tpl_vars['B_previewAd']->value) {?>
                <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-bearbeiten/">
                    <button type="button" class="btn btn-secondary mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_offer'];?>
</button>
                </a>
                <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-speichern/">
                    <button type="button"
                            class="btn btn-success ml-2 mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_continue_step_3'];?>
</button>
                </a>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['B_previewAdInquiry']->value) {?>
                <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inquiry/<?php echo $_smarty_tpl->tpl_vars['inquiry_id']->value;?>
/">
                    <button type="button" class="btn btn-secondary mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_offer'];?>
</button>
                </a>
                <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-anfrage-speichern/<?php echo $_smarty_tpl->tpl_vars['inquiry_id']->value;?>
/">
                    <button type="button"
                            class="btn btn-success ml-2 mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_continue_step_3'];?>
</button>
                </a>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['B_previewAdOffer']->value) {?>
                <p style="margin-top:75px;">
                    <a class="btn btn-default green_btn"
                       href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-angebot-bearbeiten/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_offer'];?>
</a>
                    <a class="btn btn-default green_btn"
                       href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-angebot-speichern/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_continue_step_3'];?>
</a>
                </p>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['link_back']->value) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['link_back']->value;?>
">
                    <button type="button" class="btn btn-success mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['back_to_results'];?>
</button>
                </a>
            <?php }?>

        </div>
        <div class="col-md-4">

            <?php if ($_smarty_tpl->tpl_vars['vendor']->value['id']!=233) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("f_inc_vendor_profile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <div style="height:20px; background:#fff;"></div>
            <?php }?>

            <?php if (($_smarty_tpl->tpl_vars['data']->value['type']=="raffle"||$_smarty_tpl->tpl_vars['data']->value['type']=="raffle_offer")&&$_smarty_tpl->tpl_vars['data']->value['raffle_type']==1) {?>
                <div class="offer-box-text-like">
                    <?php if (isset($_smarty_tpl->tpl_vars['user']->value['id'])&&($_smarty_tpl->tpl_vars['user']->value['id']==$_smarty_tpl->tpl_vars['vendor']->value['id'])) {?>
                        <span class="offer-box-normal-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['raffle_like_text_vendor'];?>
</span>
                    <?php } else { ?>
                        <span class="offer-box-normal-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['raffle_like_text'];?>
</span>
                    <?php }?>

                    <br/>

                    
                        <script>
                            window.fbAsyncInit = function () {
                                FB.init({
                                    appId: '944325375604618',
                                    xfbml: true,
                                    version: 'v2.5'
                                });
                            };
                            (function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) {
                                    return;
                                }
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/de_AT/sdk.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                    

                    <div style="margin-top:25px;margin-bottom:25px;" class="fb-like"
                         data-share="<?php if ($_smarty_tpl->tpl_vars['B_admin']->value||true) {?>true<?php } else { ?>false<?php }?>"
                         data-href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['current_path']->value;?>
"
                         data-layout="button"
                         data-action="like"
                         data-size="large"
                         data-show-faces="false">
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['vendor']->value['id']) {?>
                        <span class="offer-box-small-text">
                <?php echo $_smarty_tpl->tpl_vars['translation']->value['description_win'];?>

                </span>
                    <?php }?>

                </div>
                <div style="height:20px; background:#fff;"></div>
            <?php }?>

            <?php if (($_smarty_tpl->tpl_vars['data']->value['type']=="raffle"||$_smarty_tpl->tpl_vars['data']->value['type']=="raffle_offer")&&$_smarty_tpl->tpl_vars['data']->value['raffle_type']==2) {?>
                <div class="offer-box-text-new">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['raffle_url'];?>
" target="_blank">
                        <button type="button" class="btn btn-info width-90"><i class="fas fa-thumbs-up fa-2x"
                                                                               style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['button_submit_draw'];?>

                        </button>
                    </a>
                    <div style="height:5px; background:#fff;"></div>
                </div>
                <div style="height:20px; background:#fff;"></div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['data']->value['type']=="raffle") {?>
                <div class="offer-box-text-new">
                    <span class="offer-box-small-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['offer_time_left'];?>
</span><br/>
                    <span class="offer-box-normal-text"><?php echo $_smarty_tpl->tpl_vars['time_left']->value;?>
</span>
                </div>
                <div style="height:20px; background:#fff;"></div>
            <?php }?>
            
            

            

            

            

            <div class="offer-box-text-days">


                

                <span class="offer-box-big-text lightblue1"><?php echo $_smarty_tpl->tpl_vars['data']->value['days'];?>
</span>
                <span class="offer-box-small-text" style="text-transform: uppercase;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
</span>&nbsp;&nbsp;&nbsp;


                <span class="offer-box-big-text lightblue1"><?php echo $_smarty_tpl->tpl_vars['data']->value['persons'];?>
</span>
                <span class="offer-box-small-text"
                      style="text-transform: uppercase;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
</span>


                


            </div>


            <div style="height:20px; background:#fff;"></div>

            <div class="offer-box-text-new">
                <span class="offer-box-small-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['value3'];?>
</span><br/>
                <span class="offer-box-big-text lightblue1">&euro; <?php echo nf($_smarty_tpl->tpl_vars['data']->value['value']);?>
</span>
            </div>

            <?php if (time()<=strtotime($_smarty_tpl->tpl_vars['data']->value['end_date'])) {?>
                <?php if (($_smarty_tpl->tpl_vars['data']->value['price_reduction']!=null)) {?>
                    <div style="height:20px; background:#fff;"></div>
                    <div class="offer-box-text-new" style="    padding-right: 10px; !important;">
                        <span class="offer-box-small-text"
                              style="color: #444444 !important;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['price_reduction'];?>
</span><br/>
                        <span class="offer-box-big-text lightblue1"
                              style="color: #444444 !important;">&euro; <?php echo nf($_smarty_tpl->tpl_vars['data']->value['price_reduction']);?>
</span>
                    </div>
                    <div style="height:20px; background:#fff;"></div>
                    <div class="offer-box-text-new">
                        <span class="offer-box-small-text"
                              style="color: #0099b9 !important;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['reduced_price'];?>
</span><br/>
                        <span class="offer-box-big-text lightblue1"
                              style="color: #0099b9 !important;    padding-right: 25px;
"> &euro; <?php echo nf(($_smarty_tpl->tpl_vars['data']->value['value']-$_smarty_tpl->tpl_vars['data']->value['price_reduction']));?>
</span>
                    </div>
                <?php }?>
            <?php }?>

            <div style="height:20px; background:#fff;"></div>


            <?php if ($_smarty_tpl->tpl_vars['B_biddBox']->value&&$_smarty_tpl->tpl_vars['user2']->value['id']) {?>
                <div class="offer-box-text-new">
                    <form method="post" action="">
                        <input id="xbidd" type="text" class="form-control" name="xdata[amount]" value=""
                               style="width:90%; height:50px; display:inline; border:1; border-radius:0; margin-top: 10px; margin-bottom: 10px;"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['input_insert_your_bidd'];?>
">
                        <button type="submit" name="bidd" class="btn btn-success width-90"><i
                                    class="far fa-check-circle fa-2x"
                                    style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['bidd'];?>
</button>
                        <div style="height:10px; background:#fff;"></div>
                    </form>

                    <form method="post" action="">
                        <input type="hidden" name="xdata[amount]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
">
                        <button type="submit" name="buyNow" class="btn btn-success width-90 ucase"><i
                                    class="fas fa-cart-plus fa-2x"
                                    style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['buy_now'];?>

                        </button>
                        <div style="height:10px; background:#fff;"></div>
                    </form>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/hilfe/">
                        <button type="button"
                                class="btn btn-success background-color-lightgreen1 border-color-lightgreen1 width-90">
                            <i class="fas fa-question-circle fa-2x"
                               style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['help'];?>
</button>
                    </a>
                    <div style="height:10px; background:#fff;"></div>
                </div>
                
                <div style="height:20px; background:#fff;"></div>
            <?php }?>


            

            <?php if ($_smarty_tpl->tpl_vars['B_biddBox']->value&&!$_smarty_tpl->tpl_vars['user2']->value['id']&&!$_smarty_tpl->tpl_vars['user']->value['id']) {?>
                <div class="offer-box-text-new">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/login/">
                        <button type="button" class="btn btn-success width-90"><i class="far fa-check-circle fa-3x"
                                                                                  style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['button_submit_price_suggestion'];?>

                        </button>
                    </a>
                    <div style="height:10px; background:#fff;"></div>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/login/">
                        <button type="button" class="btn btn-success width-90 ucase"><i class="fas fa-cart-plus fa-3x"
                                                                                        style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['buy_now'];?>

                        </button>
                    </a>
                    <div style="height:10px; background:#fff;"></div>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/hilfe/">
                        <button type="button"
                                class="btn btn-success background-color-lightgreen1 border-color-lightgreen1 width-90">
                            <i class="fas fa-question-circle fa-3x"
                               style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['help'];?>
</button>
                    </a>
                    <div style="height:5px; background:#fff;"></div>
                </div>
                <div style="height:20px; background:#fff;"></div>
            <?php }?>

            

            
            <div class="offer-box-text-new">
                <a target="_blank"
                   href="https://maps.google.at/?q=<?php if ($_smarty_tpl->tpl_vars['data']->value['street']&&$_smarty_tpl->tpl_vars['data']->value['postalcode']&&$_smarty_tpl->tpl_vars['data']->value['location']) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['street'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['postalcode'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['location'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['vendor']->value['street'];?>
 <?php echo $_smarty_tpl->tpl_vars['vendor']->value['postalcode'];?>
 <?php echo $_smarty_tpl->tpl_vars['vendor']->value['location'];?>
<?php }?>">
                    <span class="offer-box-small-text" style="padding-top: 20px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['localize'];?>
</span><br/>
                    <span class="offer-box-normal-text">Google Maps</span>
                </a>
            </div>

            <div style="height:20px; background:#fff;"></div>

            <div class="offer-box-text-new">
                <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/anbieter/<?php echo $_smarty_tpl->tpl_vars['data']->value['vendor_id'];?>
/">
					<span class="offer-box-small-text"
                          style="padding-top: 20px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['more_offers_vendor'];?>
</span><br/>
                    <span class="offer-box-normal-text"><?php echo $_smarty_tpl->tpl_vars['vendor']->value['company'];?>
</span>
                </a>
            </div>

            <div style="height:20px; background:#fff;"></div>

            <?php if ($_smarty_tpl->tpl_vars['vendor']->value['id']!=233) {?>
                <div class="offer-box-text-new">
                    <a target="_blank" href="http://<?php echo $_smarty_tpl->tpl_vars['vendor']->value['website'];?>
">
						<span class="offer-box-small-text"
                              style="padding-top: 20px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['website_of'];?>
</span><br/>
                        <span class="offer-box-normal-text"><?php echo $_smarty_tpl->tpl_vars['vendor']->value['company'];?>
</span>
                    </a>
                </div>
                <div style="height:20px; background:#fff;"></div>
            <?php }?>


            <div class="offer-box-text-new">
                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.hobidd.com<?php echo $_smarty_tpl->tpl_vars['current_path']->value;?>
"
                   target="_blank">
                    <button type="button"
                            class="btn btn-primary width-90 background-color-facebook border-color-facebook"><i
                                class="fab fa-facebook-square fa-2x"
                                style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['share_it_on_facebook'];?>

                    </button>
                </a>
                <div style="height:10px; background:#fff;"></div>
                <a href="https://twitter.com/home?status=https%3A//www.hobidd.com<?php echo $_smarty_tpl->tpl_vars['current_path']->value;?>
" target="_blank">
                    <button type="button"
                            class="btn btn-primary width-90 background-color-twitter border-color-twitter"><i
                                class="fab fa-twitter-square fa-2x"
                                style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['share_it_on_twitter'];?>

                    </button>
                </a>
                <div style="height:5px; background:#fff;"></div>
            </div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['raffle_type']==2) {?>
    <div class="row">
        <div class="col">
            <h2 style="margin-top:50px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['raffle_legal_heading'];?>
</h2>
            <br>
            <p><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['raffle_legal']);?>
</p>
        </div>
        <div>
            <?php }?>
        </div>

<?php }} ?>
