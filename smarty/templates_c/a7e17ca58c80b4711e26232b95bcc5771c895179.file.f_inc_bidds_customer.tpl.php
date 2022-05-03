<?php /* Smarty version Smarty-3.1.17, created on 2022-04-11 18:17:24
         compiled from "./inc/views/f_inc_bidds_customer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1390773808601948e059ed33-00739973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7e17ca58c80b4711e26232b95bcc5771c895179' => 
    array (
      0 => './inc/views/f_inc_bidds_customer.tpl',
      1 => 1648902845,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1390773808601948e059ed33-00739973',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_601948e0805dd2_11521996',
  'variables' => 
  array (
    'msg' => 0,
    'translation' => 0,
    'data' => 0,
    'lang' => 0,
    'val' => 0,
    'key' => 0,
    'opt_country' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_601948e0805dd2_11521996')) {function content_601948e0805dd2_11521996($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/clients/client30/web3019/web/core/libs/Smarty/plugins/modifier.truncate.php';
?><div class="container">
	<div class="row">
        <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
			<div class="alert alert-success mt-3" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

			</div>
        <?php }?>

		<div class="col">
			<h1><?php echo $_smarty_tpl->tpl_vars['translation']->value['your_hobidds'];?>
</h1>
		</div>
	</div>

    <?php if (count($_smarty_tpl->tpl_vars['data']->value)==0) {?>
		<div class="row">
			<div class="col">
                <?php echo $_smarty_tpl->tpl_vars['translation']->value['no_hobbids_yet_customer'];?>

			</div>
		</div>
    <?php }?>

    <?php if (count($_smarty_tpl->tpl_vars['data']->value)>0) {?>
	<div class="row mb-5">
        <?php }?>

        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
			<div class="col-sm-4 mb-5">
				<div class="card">
					<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['ad_id'];?>
/"><img class="card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['val']->value['file1'];?>
"
																  alt="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['title'],50,"...",true);?>
"></a>
					<div class="card-body">
						<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['ad_id'];?>
/"><h3
									class="card-title"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['title'],50,"...",true);?>
</h3></a>
						<p class="card-text">
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['val']->value['persons'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
<br/>
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['value3'];?>
&nbsp;&euro; <?php echo nf($_smarty_tpl->tpl_vars['val']->value['value']);?>
<br/>
                            <br>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['cnt_bidds_left'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_bidds_remaining'];?>
<br/>
							<br/>
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_your_offer'];?>
 &euro; <?php echo nf($_smarty_tpl->tpl_vars['val']->value['c_value']);?>
<br/>
                            <?php if ($_smarty_tpl->tpl_vars['val']->value['v_value']>0) {?>
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_counterbid'];?>
 &euro; <?php echo nf($_smarty_tpl->tpl_vars['val']->value['v_value']);?>

								<br/>
                            <?php } else { ?>
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_counterbid'];?>
 <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_still_open'];?>

								<br/>
                            <?php }?>
							<br/>
                            <?php if (($_smarty_tpl->tpl_vars['val']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['c_accepted_v']==1)||($_smarty_tpl->tpl_vars['val']->value['v_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['v_accepted_v']==1)) {?>
                            <?php } elseif (($_smarty_tpl->tpl_vars['val']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['c_accepted_v']==0)) {?>
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_status'];?>
 <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_customer_accepted_vendor_waiting'];?>

								<br/>
                            <?php } elseif (($_smarty_tpl->tpl_vars['val']->value['v_accepted_c']==0&&$_smarty_tpl->tpl_vars['val']->value['v_accepted_v']==1)) {?>
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_status'];?>
 <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_vendor_accepted_customer_waiting'];?>

								<br/>
                            <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['c_cdate']>$_smarty_tpl->tpl_vars['val']->value['v_cdate']) {?>
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_status'];?>
 <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_waiting_for_provider'];?>

								<br/>
                            <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['c_cdate']<$_smarty_tpl->tpl_vars['val']->value['v_cdate']) {?>
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_status'];?>
 <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_waiting_for_customer'];?>

								<br/>
                            <?php }?>
						</p>
					</div>
                    <?php if (strlen($_smarty_tpl->tpl_vars['val']->value['vendor_comments'])>0) {?>
						<div class="card-footer vendor_comments">
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['comments'];?>
<br/>
							<br><?php echo nl2br($_smarty_tpl->tpl_vars['val']->value['vendor_comments']);?>

						</div>
                    <?php }?>
                    <?php if (($_smarty_tpl->tpl_vars['val']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['c_accepted_v']==1)||($_smarty_tpl->tpl_vars['val']->value['v_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['v_accepted_v']==1)) {?>
						<div class="card-footer">
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['hobidds_congratulation'];?>
<br/>
							<br/>
							<button type="button" class="btn btn-success">hobidd Code <?php echo $_smarty_tpl->tpl_vars['val']->value['hobidd_code'];?>
</button>
							</a>
						</div>
                    <?php } elseif (($_smarty_tpl->tpl_vars['val']->value['c_accepted_c']==1&&$_smarty_tpl->tpl_vars['val']->value['c_accepted_v']==0)) {?>
                    <?php } elseif (($_smarty_tpl->tpl_vars['val']->value['v_accepted_c']==0&&$_smarty_tpl->tpl_vars['val']->value['v_accepted_v']==1)) {?>
						<div class="card-footer">
							<h5><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept_bid_header'];?>
 &euro; <?php echo nf($_smarty_tpl->tpl_vars['val']->value['v_value']);?>
</h5>
							<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['val']->value['max_vendor_message_id'];?>
/">
								<input type="hidden" name="accept" value="1">
								<input type="hidden" name="data[value]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['v_value'];?>
">
								<button class="btn btn-primary" type="button" data-toggle="collapse"
										data-target="#collapseOrderWithCosts<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" aria-expanded="false"
										aria-controls="collapseOrderWithCosts<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept'];?>

								</button>
								<div class="collapse mt-3" id="collapseOrderWithCosts<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
									<div class="card card-body">
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['firstname'];?>
*</label>
											<input type="text" class="form-control" name="data[firstname]"
												   id="firstname" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['firstname'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['lastname'];?>
*</label>
											<input type="text" class="form-control" name="data[lastname]" id="lastname"
												   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['lastname'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['street'];?>
*</label>
											<input type="text" class="form-control" name="data[street]" id="street"
												   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['street'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['postalcode'];?>
*</label>
											<input type="text" class="form-control" name="data[postalcode]"
												   id="postalcode" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['postalcode'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['location'];?>
*</label>
											<input type="text" class="form-control" name="data[location]" id="location"
												   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['location'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['country'];?>
*</label>
											<select name="data[country]" class="form-control" id="checkCountry">
                                                <?php echo $_smarty_tpl->tpl_vars['opt_country']->value;?>

											</select>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['phone2'];?>
*</label>
											<input type="text" class="form-control" name="data[phone]" id="phone"
												   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['phone2'];?>
" required>
										</div>
										<div class="form-group form-check">
											<input type="checkbox" class="form-check-input" id="terms-mob">
											<label class="form-check-label"
												   for="terms-mob"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_buy'];?>
</label>
										</div>
										<button type="submit" class="btn btn-success"
												onclick="if(!$('#terms-mob').is(':checked')) { alert('<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_error_terms'];?>
'); return false;}"><?php echo $_smarty_tpl->tpl_vars['translation']->value['order_with_costs'];?>
</button>
									</div>
								</div>
							</form>
						</div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['c_cdate']>$_smarty_tpl->tpl_vars['val']->value['v_cdate']) {?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['c_cdate']<$_smarty_tpl->tpl_vars['val']->value['v_cdate']) {?>
						<div class="card-footer">
							<h5><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept_bid_header'];?>
 &euro; <?php echo nf($_smarty_tpl->tpl_vars['val']->value['v_value']);?>
</h5>
							<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['val']->value['max_vendor_message_id'];?>
/">
								<input type="hidden" name="accept" value="1">
								<input type="hidden" name="data[value]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['v_value'];?>
">
								<button class="btn btn-primary" type="button" data-toggle="collapse"
										data-target="#collapseOrderWithCosts<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" aria-expanded="false"
										aria-controls="collapseOrderWithCosts<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept'];?>

								</button>
								<div class="collapse mt-3" id="collapseOrderWithCosts<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
									<div class="card card-body">
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['firstname'];?>
*</label>
											<input type="text" class="form-control" name="data[firstname]"
												   id="firstname" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['firstname'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['lastname'];?>
*</label>
											<input type="text" class="form-control" name="data[lastname]" id="lastname"
												   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['lastname'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['street'];?>
*</label>
											<input type="text" class="form-control" name="data[street]" id="street"
												   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['street'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['postalcode'];?>
*</label>
											<input type="text" class="form-control" name="data[postalcode]"
												   id="postalcode" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['postalcode'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['location'];?>
*</label>
											<input type="text" class="form-control" name="data[location]" id="location"
												   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['location'];?>
" required>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['country'];?>
*</label>
											<select name="data[country]" class="form-control" id="checkCountry">
                                                <?php echo $_smarty_tpl->tpl_vars['opt_country']->value;?>

											</select>
										</div>
										<div class="form-group group">
											<label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['phone2'];?>
*</label>
											<input type="text" class="form-control" name="data[phone]" id="phone"
												   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['phone2'];?>
" required>
										</div>
										<div class="form-group form-check">
											<input type="checkbox" class="form-check-input" id="terms-mob<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
											<label class="form-check-label"
												   for="terms-mob"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_buy'];?>
</label>
										</div>
										<button type="submit" class="btn btn-success"
												onclick="if(!$('#terms-mob<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
').is(':checked')) { alert('<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_error_terms'];?>
'); return false;}"><?php echo $_smarty_tpl->tpl_vars['translation']->value['order_with_costs'];?>
</button>
									</div>
								</div>
							</form>
						</div>
						<div class="card-footer">
                            <?php if ($_smarty_tpl->tpl_vars['val']->value['cnt_bidds_left']>0) {?>
								<h5><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_counterproposal'];?>
</h5>
								<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['val']->value['max_vendor_message_id'];?>
/">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">&euro;</span>
										</div>
										<input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['val']->value['v_value'];?>
"
											   aria-label="value" aria-describedby="basic-addon1" name="data[value]"
											   value="<?php echo $_smarty_tpl->tpl_vars['val']->value['v_value'];?>
">
									</div>

									<button type="submit" class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm'];?>
</button>
								</form>
                            <?php }?>
						</div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['c_deletable']) {?>
					<div class="card-footer">
						<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/delete-bidd/<?php echo $_smarty_tpl->tpl_vars['val']->value['ad_id'];?>
/"
						   onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['translation']->value['confirm_del'];?>
');">
							<button type="button" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['translation']->value['delete_ad'];?>
</button>
						</a>
					</div>
					<?php }?>
				</div>
			</div>
        <?php } ?>
        <?php if (count($_smarty_tpl->tpl_vars['data']->value)>0) {?>
	</div>
    <?php }?>
</div>
<?php }} ?>
