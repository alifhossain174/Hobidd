<?php /* Smarty version Smarty-3.1.17, created on 2022-04-17 15:06:59
         compiled from "./inc/views/f_inc_bidds_vendor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131516693860173c18c01f89-47478678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '153bee67ba9e672d99e3c34b47917c2b25efcd6f' => 
    array (
      0 => './inc/views/f_inc_bidds_vendor.tpl',
      1 => 1650200819,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131516693860173c18c01f89-47478678',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173c18d80b54_10852389',
  'variables' => 
  array (
    'translation' => 0,
    'data' => 0,
    'ad_id' => 0,
    'val' => 0,
    'table_opened' => 0,
    'lang' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173c18d80b54_10852389')) {function content_60173c18d80b54_10852389($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/clients/client30/web3019/web/core/libs/Smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/clients/client30/web3019/web/core/libs/Smarty/plugins/modifier.date_format.php';
?>
<div class="container">
	<div class="row">
		<div class="col">
			<h1><?php echo $_smarty_tpl->tpl_vars['translation']->value['your_hobidds'];?>
 </h1>
		</div>
	</div>
<br>
    <?php if (count($_smarty_tpl->tpl_vars['data']->value)==0) {?>
		<div class="row">
			<div class="col">
                <?php echo $_smarty_tpl->tpl_vars['translation']->value['no_hobbids_yet_vendor'];?>

			</div>
		</div>
    <?php }?>

	<div class="row">
		<div class="col">
            <?php $_smarty_tpl->tpl_vars['ad_id'] = new Smarty_variable(0, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['table_opened'] = new Smarty_variable(0, null, 0);?>

            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['ad_id']->value!=$_smarty_tpl->tpl_vars['val']->value['ad_id']) {?>
            <?php $_smarty_tpl->tpl_vars['ad_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['val']->value['ad_id'], null, 0);?>

            <?php if ($_smarty_tpl->tpl_vars['table_opened']->value!=0) {?>
		</div>
	</div>
    <?php }?>

    <?php $_smarty_tpl->tpl_vars['table_opened'] = new Smarty_variable(1, null, 0);?>


	<div class="container">
		<div class="row mb-5">
			<div class="col mb-2">
				<div class="media">
					<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['ad_id'];?>
/"><img class="mr-3" src="<?php echo $_smarty_tpl->tpl_vars['val']->value['file1'];?>
" style="width:150px;"></a>
					<div class="media-body">
						<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['ad_id'];?>
/"><h4
									class="mt-0"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['title'],50,"...",true);?>
</h4></a>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['val']->value['persons'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
<br/>
						&euro; <?php echo nf($_smarty_tpl->tpl_vars['val']->value['value']);?>
<br/>

					</div>
				</div>
			</div>
			<div class="col mb-2">
                <?php if ($_smarty_tpl->tpl_vars['val']->value['new_message_count']>0) {?>
					<a data-toggle="collapse" href="#container<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" aria-expanded="false"
					   aria-controls="container<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
						<button type="button" class="btn btn-primary float-right"><?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_new_messages'];?>
&nbsp;&nbsp;
							<span class="badge badge-light"><?php echo $_smarty_tpl->tpl_vars['val']->value['new_message_count'];?>
</span></button>
					</a>
                <?php } else { ?>
					<a data-toggle="collapse" href="#container<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" aria-expanded="false"
					   aria-controls="container<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">

						<button type="button" class="btn btn-primary float-right">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_open'];?>
&nbsp;&nbsp;</button>
					</a>
                <?php }?>
			</div>
		</div>
	</div>

    
	<div class="container collapse" id="container<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
		<div class="row mb-5">
            <?php }?>

			<div class="col-12 pl-0">
				<div class="card mb-3">

                    <?php if (($_smarty_tpl->tpl_vars['val']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['c_accepted_v']==1)||($_smarty_tpl->tpl_vars['val']->value['v_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['v_accepted_v']==1)) {?>
						<div class="card-header" style="background:#d4ffcc; color:#000000;">
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_customer'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>
 | <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_accepted'];?>
 |
							hobidd Code <?php echo $_smarty_tpl->tpl_vars['val']->value['hobidd_code'];?>

							<span>&nbsp;&dash;&nbsp;</span>
                            <?php if ($_smarty_tpl->tpl_vars['val']->value['v_cdate']>$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['v_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php } else { ?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['c_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php }?>




<td><a class="float-right" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/delete-bidd/<?php echo $_smarty_tpl->tpl_vars['val']->value['ad_id'];?>
/"
                            onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['translation']->value['confirm_del'];?>
');">
                            <button type="button" class="btn btn-danger float=right"
                            style="text-transform: uppercase"><?php echo $_smarty_tpl->tpl_vars['translation']->value['delete_ad'];?>
</button></a>
                            </td>

						</div>







                    <?php } elseif (($_smarty_tpl->tpl_vars['val']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['c_accepted_v']==0)) {?>
						<div class="card-header" style="background:#f8d7da;">
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_customer'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>

							<a class="btn btn-primary float-right" data-toggle="collapse" href="#collapse<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
1"
							   role="button" aria-expanded="false" aria-controls="collapse<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
1">
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_accepted_by_customer'];?>

							</a>
							<span>&nbsp;&dash;&nbsp;</span>
                            <?php if ($_smarty_tpl->tpl_vars['val']->value['v_cdate']>$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['v_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php } else { ?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['c_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php }?>
						</div>
                    <?php } elseif (($_smarty_tpl->tpl_vars['val']->value['v_accepted_c']==0&&$_smarty_tpl->tpl_vars['val']->value['v_accepted_v']==1)) {?>
						<div class="card-header" style="background:#fff59b;">
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_customer'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>

							| <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_accepted_and_wait'];?>
 
							<span>&nbsp;&dash;&nbsp;</span>
                            <?php if ($_smarty_tpl->tpl_vars['val']->value['v_cdate']>$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['v_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php } else { ?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['c_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php }?>
						</div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['v_cdate']>$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
						<div class="card-header">


                            <td><a class="float-right" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/delete-ad/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"
                            onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['translation']->value['confirm_del'];?>
');">
                            <button type="button" class="btn btn-danger float=right"
                            style="text-transform: uppercase"><?php echo $_smarty_tpl->tpl_vars['translation']->value['delete_ad'];?>
</button></a>
                            </td>

                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_customer'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>
 | <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_wait'];?>

							<span>&nbsp;&dash;&nbsp;</span>
                            <?php if ($_smarty_tpl->tpl_vars['val']->value['v_cdate']>$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['v_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
							<?php } else { ?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['c_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php }?>

						</div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['v_cdate']<$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
						<div class="card-header" style="background:#f8d7da;">
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_customer'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>


                    
							

                             <td><a class="btn btn-primary float-right" href="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/edit-bids?vendor_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['vendor_id'];?>
&customer_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>
&ad_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['ad_id'];?>
"
							   role="button" aria-expanded="false" aria-controls="collapse<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
2">
                                &nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_action_needed'];?>
&nbsp;&nbsp;&nbsp;
							</a></td>

                        <td><a class=" float-right">
                                &nbsp;
							</a></td>


                            <td><a class="float-right" <?php echo $_smarty_tpl->tpl_vars['translation']->value['delete_ad'];?>
></a></td>
                        
                        <td><a class="float-right" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/delete-ad/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"
                        onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['translation']->value['confirm_del'];?>
');">
                        <button type="button" class="btn btn-danger float=right"
                        style="text-transform: uppercase"><?php echo $_smarty_tpl->tpl_vars['translation']->value['delete_ad'];?>
</button></a>
                        </td>

                    
                    <span>&nbsp;&dash;&nbsp;</span>


                    <?php if ($_smarty_tpl->tpl_vars['val']->value['v_cdate']>$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['v_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php } else { ?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['c_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php }?>
						</div>

                    <?php } else { ?>
						<div class="card-header">
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_customer'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>
 | <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_offer'];?>

							<span>&nbsp;&dash;&nbsp;</span>
                            <?php if ($_smarty_tpl->tpl_vars['val']->value['v_cdate']>$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['v_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php } else { ?>
								<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['c_cdate'],"%d.%m.%Y - %H:%M");?>
</span>
                            <?php }?>
						</div>
                    <?php }?>


					<div class="card-body">

						<p class="card-text">
                            
                            
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_your_offer'];?>
 &euro;<?php echo nf($_smarty_tpl->tpl_vars['val']->value['v_value']);?>

							| <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_their_offer'];?>
 &euro; <?php echo nf($_smarty_tpl->tpl_vars['val']->value['c_value']);?>

						</p>
					</div>

                    <?php if (($_smarty_tpl->tpl_vars['val']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['c_accepted_v']==1)||($_smarty_tpl->tpl_vars['val']->value['v_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['v_accepted_v']==1)) {?>
                    <?php } elseif (($_smarty_tpl->tpl_vars['val']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['c_accepted_v']==0)) {?>

                     
                    

						<div class="card-footer collapse" id="collapse<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
1">



							<h6><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept_bid_header'];?>
 &euro; <?php echo nf($_smarty_tpl->tpl_vars['val']->value['c_value']);?>
</h6>
							<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['val']->value['max_customer_message_id'];?>
/">
								<input type="hidden" name="accept" value="1">
								<input type="hidden" name="data[value]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['c_value'];?>
">
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="terms-mob">
									<label class="form-check-label"
										   for="terms-mob"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_buy'];?>
</label>



								</div>
								<button type="submit" class="btn btn-success"
										onclick="if(!$('#terms-mob').is(':checked')) { alert('<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_error_terms'];?>
'); return false;}"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept'];?>
</button>
							</form>
						</div>
                    <?php } elseif (($_smarty_tpl->tpl_vars['val']->value['v_accepted_c']==0&&$_smarty_tpl->tpl_vars['val']->value['v_accepted_v']==1)) {?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['v_cdate']>$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['v_cdate']<$_smarty_tpl->tpl_vars['val']->value['c_cdate']) {?>
						<div class="card-footer collapse" id="collapse<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
2">
							<h6><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept_bid_header'];?>
 &euro; <?php echo nf($_smarty_tpl->tpl_vars['val']->value['c_value']);?>
</h6>
							<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['val']->value['max_customer_message_id'];?>
/">
								<input type="hidden" name="accept" value="1">
								<input type="hidden" name="data[value]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['c_value'];?>
">
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="terms-mob">
									<label class="form-check-label"
										   for="terms-mob"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_buy'];?>
</label>
								</div>
								<button type="submit" class="btn btn-success"
										onclick="if(!$('#terms-mob').is(':checked')) { alert('<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_error_terms'];?>
'); return false;}"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept'];?>
</button>
							</form>

							<h6 class="mt-4"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_counterproposal'];?>
</h6>
							<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['val']->value['max_customer_message_id'];?>
/">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">&euro;</span>
									</div>
									<input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['val']->value['c_value'];?>
"
										   aria-label="value" aria-describedby="basic-addon1" name="data[value]"
										   value="<?php echo $_smarty_tpl->tpl_vars['val']->value['c_value'];?>
">
								</div>

								<div class="form-group group mb-3">
									<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['comments'];?>
</label>
									<textarea class="form-control" rows="7" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['comments'];?>
"
											  name="data[vendor_comments]"><?php echo $_smarty_tpl->tpl_vars['val']->value['vendor_comments'];?>
</textarea>
								</div>

								<button type="submit" class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm'];?>
</button>
							</form>
						</div>
                    <?php }?>
				</div>
			</div>
            <?php } ?>

            <?php if ($_smarty_tpl->tpl_vars['table_opened']->value!=0) {?>
		</div>
	</div>
    <?php }?>
</div>
</div>
</div>
<?php }} ?>
