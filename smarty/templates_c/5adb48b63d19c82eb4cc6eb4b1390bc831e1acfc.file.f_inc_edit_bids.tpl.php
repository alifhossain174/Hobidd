<?php /* Smarty version Smarty-3.1.17, created on 2022-04-21 21:11:29
         compiled from "./inc/views/f_inc_edit_bids.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99334803661d886addbb7b1-22863810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5adb48b63d19c82eb4cc6eb4b1390bc831e1acfc' => 
    array (
      0 => './inc/views/f_inc_edit_bids.tpl',
      1 => 1650568282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99334803661d886addbb7b1-22863810',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_61d886addcc450_78657645',
  'variables' => 
  array (
    'translation' => 0,
    'data' => 0,
    'lang' => 0,
    'date_from_day' => 0,
    'date_from_month' => 0,
    'date_from_year' => 0,
    'date_until_day' => 0,
    'date_until_month' => 0,
    'date_until_year' => 0,
    'desired_date' => 0,
    'date_desired_from_day' => 0,
    'date_desired_from_month' => 0,
    'date_desired_from_year' => 0,
    'date_desired_until_day' => 0,
    'date_desired_until_month' => 0,
    'date_desired_until_year' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61d886addcc450_78657645')) {function content_61d886addcc450_78657645($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/clients/client30/web3019/web/core/libs/Smarty/plugins/modifier.date_format.php';
?>


<div class="bid-table">
    <div class="table-container">
        
        
        
        
        <table class="table table-sortable">
            <thead>
            
            </thead>



            <tbody>
            <tr>
                
               
                
                <td class="spacer">&nbsp;</td>
                <td><?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_customer'];?>
&nbsp; &nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['customer_id'];?>
&nbsp; &nbsp; &nbsp; |&nbsp; &nbsp; &nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['date'];?>
&nbsp; &nbsp;<?php if ($_smarty_tpl->tpl_vars['data']->value['v_cdate']>$_smarty_tpl->tpl_vars['data']->value['c_cdate']) {?>
                        <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['v_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                    <?php } else { ?>
                        <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['c_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                    <?php }?>   </td>
                
                





<td><a href="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/bidds">
                        <button class="btn btn-primary float-right"><?php echo $_smarty_tpl->tpl_vars['translation']->value['close'];?>
</button>
                    </a></td>

                <td class="spacer">&nbsp;</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="bid-information-wrapper">
    <div class="container-fluid">
        <div class="bid-information-wrap-inner">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-3 col-12">
                    <div class="bid-edit-left">
                        <div class="offer-box-text-new">                            <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['ad_detail']['titleen'], $tmp)!=0)) {?>
                                <span class="offer-box-normal-text"><?php echo $_smarty_tpl->tpl_vars['data']->value['ad_detail']['titleen'];?>
</span>
                            <?php } else { ?>
                                <span class="offer-box-normal-text"><?php echo $_smarty_tpl->tpl_vars['data']->value['ad_detail']['title'];?>
</span>
                            <?php }?>                        </div>
                        <div style="height:20px; background:#fff;"></div>
                        <div class="offer-box-text-days">                            
                            <span class="offer-box-big-text lightblue1"><?php echo $_smarty_tpl->tpl_vars['data']->value['days'];?>
</span> <span
                                    class="offer-box-small-text"
                                    style="text-transform: uppercase;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
</span>&nbsp;&nbsp;&nbsp;
                            <span class="offer-box-big-text lightblue1"><?php echo $_smarty_tpl->tpl_vars['data']->value['persons'];?>
</span> <span
                                    class="offer-box-small-text"
                                    style="text-transform: uppercase;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
</span> 
                        </div>                                                                         
                        <div style="height:20px; background:#fff;"></div>
                        <div class="offer-box-text-new"><span
                                    class="offer-box-small-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['value3'];?>
</span><br/> <span
                                    class="offer-box-big-text lightblue1">&euro; <?php echo nf($_smarty_tpl->tpl_vars['data']->value['ad_detail']['value']);?>
</span>
                        </div>                                                                         
                        



                        <div style="height:20px; background:#fff;"></div>
                        <div class="offer-box-text-new">
                            <span class="offer-box-small-text" style="color: #0099b9 !important;">
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['your_minimum_price'];?>

                            </span><br/>
                            <span class="offer-box-big-text lightblue1" style="color: #0099b9 !important;">&euro; 
                                <?php echo nf($_smarty_tpl->tpl_vars['data']->value['ad_detail']['threshold1']);?>

                            </span>
                        </div>                                                                         
                        

                        <div style="height:20px; background:#fff;"></div>                                                                                                                         
     
                                                                        





                        <div class="bid-info-item"><span><?php echo $_smarty_tpl->tpl_vars['translation']->value['travel_period'];?>
</span>
                            <h2><?php echo $_smarty_tpl->tpl_vars['date_from_day']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_from_month']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_from_year']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['date_until_day']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_until_month']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_until_year']->value;?>
</h2></div>
                        <?php if ($_smarty_tpl->tpl_vars['desired_date']->value) {?>
                            <div class="bid-info-item"><span
                                        style="color: #0099b9 !important;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['desired_travelling_date'];?>
</span>
                                <h2 style="color: #0099b9 !important;"><?php echo $_smarty_tpl->tpl_vars['date_desired_from_day']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_desired_from_month']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_desired_from_year']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['date_desired_until_day']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_desired_until_month']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['date_desired_until_year']->value;?>
</h2></div>
                        <?php }?>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9 col-xl-9 col-12">
                    <div class="included-services-wrap">
                        <div class="included-service">
                            <div class="services-desc">
                                <h3><?php echo $_smarty_tpl->tpl_vars['translation']->value['special_offer_heading'];?>
</h3> <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['ad_detail']['priceinfoen'], $tmp)!=0)) {?>
                                    <p><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['ad_detail']['priceinfoen']);?>
</p>
                                <?php } else { ?>
                                    <p><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['ad_detail']['priceinfo']);?>
</p>
                                <?php }?>                            </div>
                            <div class="services-option">
                                <div class="row">                                    <?php if (($_smarty_tpl->tpl_vars['data']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['data']->value['c_accepted_v']==1)||($_smarty_tpl->tpl_vars['data']->value['v_accepted_c']==1&&$_smarty_tpl->tpl_vars['data']->value['v_accepted_v']==1)) {?>                                    <?php } elseif (($_smarty_tpl->tpl_vars['data']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['data']->value['c_accepted_v']==0)) {?>
                                        <div class="col-md-5 col-lg-3 col-xl-3 col-12 mt-3">
                                            <div class="option-box"><h5><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept_bid_header'];?>
</h5><h6>
                                                    &euro; <?php echo nf($_smarty_tpl->tpl_vars['data']->value['c_value']);?>
</h6>
                                                <form method="post"
                                                      action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['data']->value['max_customer_message_id'];?>
/"><input
                                                            type="hidden" name="accept" value="1"> <input type="hidden"
                                                                                                          name="data[value]"
                                                                                                          value="<?php echo $_smarty_tpl->tpl_vars['data']->value['c_value'];?>
">
                                                    <div class="form-check"><input type="checkbox"
                                                                                   class="form-check-input" id="terms">
                                                        <label class="form-check-label"
                                                               for="terms">                                                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_buy'];?>
</label>
                                                    </div>
                                                    <button class="btn accpt-btn" type="submit"
                                                            onclick="if(!$('#terms').is(':checked')) { alert('<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_error_terms'];?>
'); return false;}"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept'];?>
</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php } elseif (($_smarty_tpl->tpl_vars['data']->value['v_accepted_c']==0&&$_smarty_tpl->tpl_vars['data']->value['v_accepted_v']==1)) {?>                                    <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['v_cdate']>$_smarty_tpl->tpl_vars['data']->value['c_cdate']) {?>                                    <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['v_cdate']<$_smarty_tpl->tpl_vars['data']->value['c_cdate']) {?>
                                        <div class="col-md-5 col-lg-3 col-xl-3 col-12 mt-3">
                                            <div class="option-box"><h5><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept_bid_header'];?>
</h5><h6>
                                                    &euro; <?php echo nf($_smarty_tpl->tpl_vars['data']->value['c_value']);?>
</h6>
                                                <form method="post"
                                                      action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['data']->value['max_customer_message_id'];?>
/"><input
                                                            type="hidden" name="accept" value="1"> <input type="hidden"
                                                                                                          name="data[value]"
                                                                                                          value="<?php echo $_smarty_tpl->tpl_vars['data']->value['c_value'];?>
">
                                                    <div class="form-check"><input type="checkbox"
                                                                                   class="form-check-input" id="terms">
                                                        <label class="form-check-label"
                                                               for="terms">                                                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_buy'];?>
</label>
                                                    </div>
                                                    <button class="btn accpt-btn" type="submit"
                                                            onclick="if(!$('#terms').is(':checked')) { alert('<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_error_terms'];?>
'); return false;}"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept'];?>
</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-9 col-xl-9 col-12 mt-3">
                                            <div class="edit-bid-right">
                                                <form method="post"
                                                      action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['data']->value['max_customer_message_id'];?>
/">
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-3 col-xl-3 col-12">
                                                            <div class="proposal">
                                                                <h5 style="text-align: center"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_counterproposal'];?>
</h5>
                                                                <div class="form-group">
                                                                    <p style="font-size: 18px;
    text-align: center;
    font-family: 'LATO', sans-serif;
    margin-right: 7px;
    font-weight: 800;">&euro;</p>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="<?php echo $_smarty_tpl->tpl_vars['data']->value['c_value'];?>
"
                                                                           aria-label="value"
                                                                           aria-describedby="basic-addon1"
                                                                           name="data[value]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['c_value'];?>
">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-9 col-xl-9 col-12">
                                                            <div class="sending-prop"><h5
                                                                        style="text-align: center"><?php echo $_smarty_tpl->tpl_vars['translation']->value['comments'];?>
</h5>
                                                                <div class="form-group"><textarea class="form-control"
                                                                                                  rows="3"
                                                                                                  placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['comments'];?>
"
                                                                                                  name="data[vendor_comments]"><?php echo $_smarty_tpl->tpl_vars['data']->value['vendor_comments'];?>
</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="send-proposal">
                                                        <button class="send-btn btn"
                                                                type="submit"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm'];?>
</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php }?>                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><?php }} ?>
