<?php /* Smarty version Smarty-3.1.17, created on 2021-09-29 20:19:36
         compiled from "./inc/views/f_inc_inbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6836134607f18ac24d3e0-47825639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '900956c882bb84426c74f7348a371655b77c8168' => 
    array (
      0 => './inc/views/f_inc_inbox.tpl',
      1 => 1632480405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6836134607f18ac24d3e0-47825639',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_607f18ac4db6a6_85349127',
  'variables' => 
  array (
    'B_inboxForm' => 0,
    'translation' => 0,
    'data' => 0,
    'val' => 0,
    'B_customer' => 0,
    'B_vendor' => 0,
    'lang' => 0,
    'id' => 0,
    'cnt_bidds_left' => 0,
    'B_customerXX' => 0,
    'user2' => 0,
    'ad' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_607f18ac4db6a6_85349127')) {function content_607f18ac4db6a6_85349127($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/clients/client30/web1949/web/core/libs/Smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/clients/client30/web1949/web/core/libs/Smarty/plugins/modifier.date_format.php';
?><?php if (!$_smarty_tpl->tpl_vars['B_inboxForm']->value) {?>
<table class="table table-inbox table-hover">
	<tbody>
	<tr>
		<td class="inbox-header">&nbsp;</td>
		<td class="inbox-header"><?php echo $_smarty_tpl->tpl_vars['translation']->value['subject'];?>
</td>
		<td class="inbox-header"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_from'];?>
</td>
		<td class="inbox-header"><?php echo $_smarty_tpl->tpl_vars['translation']->value['offer'];?>
</td>
		<td class="inbox-header"><?php echo $_smarty_tpl->tpl_vars['translation']->value['content'];?>
</td>
		<td class="inbox-header text-right"><?php echo $_smarty_tpl->tpl_vars['translation']->value['date'];?>
</td>
		<td class="inbox-header">&nbsp;</td>
	</tr>
    <?php }?>

    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
        <?php if (!$_smarty_tpl->tpl_vars['B_inboxForm']->value) {?>
			<tr class="<?php if ($_smarty_tpl->tpl_vars['val']->value['accepted_c']&&$_smarty_tpl->tpl_vars['val']->value['accepted_v']) {?>success<?php }?>">
				<td class="view-message  dont-show"><?php if (($_smarty_tpl->tpl_vars['B_customer']->value&&$_smarty_tpl->tpl_vars['val']->value['sender']=="c")||($_smarty_tpl->tpl_vars['B_vendor']->value&&$_smarty_tpl->tpl_vars['val']->value['sender']=="v")) {?>
						<strong><?php echo $_smarty_tpl->tpl_vars['translation']->value['out'];?>
&nbsp;</strong><?php } else { ?><strong><?php echo $_smarty_tpl->tpl_vars['translation']->value['in'];?>
&nbsp;</strong><?php }?>
				</td>
				<td class="view-message  dont-show"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['title'],40);?>
</td>
				<td class="view-message visible-md visible-lg"><?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>
</td>
				<td class="view-message  inbox-small-cells">€ <?php echo nf($_smarty_tpl->tpl_vars['val']->value['value']);?>
</td>
				<td class="view-message visible-md visible-lg"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['content'],30);?>
</td>
				<td class="view-message  text-right"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['cdate'],"%d.%m.%Y %H:%M");?>
</td>
				<td class="text-right">
                    <?php if (!$_smarty_tpl->tpl_vars['B_inboxForm']->value) {?>
                        <?php if ($_smarty_tpl->tpl_vars['B_customer']->value) {?><?php if ($_smarty_tpl->tpl_vars['val']->value['sender']=="v"&&($_smarty_tpl->tpl_vars['val']->value['can_reply']||($_smarty_tpl->tpl_vars['val']->value['accepted_v']))) {?><a
							href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"
							class="btn btn-sm btn-primary"><?php echo $_smarty_tpl->tpl_vars['translation']->value['reply'];?>
</a><?php }?><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['B_vendor']->value||$_smarty_tpl->tpl_vars['val']->value['accepted_c']) {?><?php if ($_smarty_tpl->tpl_vars['val']->value['sender']=="c") {?><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"
																				   class="btn btn-sm btn-primary"><?php echo $_smarty_tpl->tpl_vars['translation']->value['reply'];?>
</a><?php }?><?php }?>
                    <?php } else { ?>
						<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inbox/" class="btn btn-sm btn-primary"><?php echo $_smarty_tpl->tpl_vars['translation']->value['close'];?>
</a>
                    <?php }?>
				</td>
			</tr>
        <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['B_inboxForm']->value&&($_smarty_tpl->tpl_vars['B_inboxForm']->value&&$_smarty_tpl->tpl_vars['val']->value['id']==$_smarty_tpl->tpl_vars['id']->value)) {?>

        
			<style>
                .btn {
                    font-size: 18px;
                }

                .xinput {
                    margin-bottom: 20px;
                }
			</style>
        
			<table class="table table-inbox table-hover">
				<tbody>
				<tr>
					<td class="inbox-header">&nbsp;</td>
					<td class="inbox-header"><?php echo $_smarty_tpl->tpl_vars['translation']->value['subject'];?>
</td>
					<td class="inbox-header"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_from'];?>
</td>
					<td class="inbox-header"><?php echo $_smarty_tpl->tpl_vars['translation']->value['offer'];?>
</td>
					<td class="inbox-header"><?php echo $_smarty_tpl->tpl_vars['translation']->value['content'];?>
</td>
					<td class="inbox-header text-right"><?php echo $_smarty_tpl->tpl_vars['translation']->value['date'];?>
</td>
					<td class="inbox-header">&nbsp;</td>
				</tr>
				<tr class="<?php if ($_smarty_tpl->tpl_vars['val']->value['accepted_c']&&$_smarty_tpl->tpl_vars['val']->value['accepted_v']) {?>success<?php }?>">
					<td class="view-message  dont-show"><?php if (($_smarty_tpl->tpl_vars['B_customer']->value&&$_smarty_tpl->tpl_vars['val']->value['sender']=="c")||($_smarty_tpl->tpl_vars['B_vendor']->value&&$_smarty_tpl->tpl_vars['val']->value['sender']=="v")) {?>
							<strong><?php echo $_smarty_tpl->tpl_vars['translation']->value['out'];?>
&nbsp;</strong><?php } else { ?><strong><?php echo $_smarty_tpl->tpl_vars['translation']->value['in'];?>
&nbsp;</strong><?php }?>
					</td>
					<td class="view-message  dont-show"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['title'],40);?>
</td>
					<td class="view-message visible-md visible-lg"><?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>
</td>
					<td class="view-message  inbox-small-cells">€ <?php echo nf($_smarty_tpl->tpl_vars['val']->value['value']);?>
</td>
					<td class="view-message visible-md visible-lg"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['content'],30);?>
</td>
					<td class="view-message  text-right"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['cdate'],"%d.%m.%Y %H:%M");?>
</td>
					<td class="text-right"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/bidds/"
											  class="btn btn-sm btn-primary"><?php echo $_smarty_tpl->tpl_vars['translation']->value['close'];?>
</a></td>
				</tr>
				</tbody>
			</table>
			<div class="row inbox-message-box">
				<div class="col-sm-8">
					<!--$val.accepted_v: <?php echo $_smarty_tpl->tpl_vars['val']->value['accepted_v'];?>
<br/>
                $val.accepted_c: <?php echo $_smarty_tpl->tpl_vars['val']->value['accepted_c'];?>
<br/>
                $val.rejected: <?php echo $_smarty_tpl->tpl_vars['val']->value['rejected'];?>
<br/>-->

                    <?php if ($_smarty_tpl->tpl_vars['B_customer']->value) {?>
						<h4 class="xoffer"><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_inbox_message_customer'];?>
</h4>
                        <?php echo nl2br($_smarty_tpl->tpl_vars['val']->value['content']);?>

						<br/>
						<br/>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rejected']&&!$_smarty_tpl->tpl_vars['val']->value['value']) {?>
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_offer_rejected'];?>

                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['val']->value['accepted_v']&&!$_smarty_tpl->tpl_vars['val']->value['accepted_c']) {?>
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_offer_accepted_by_vendor'];?>

                        <?php }?>

                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['val']->value['value'];?>
<?php $_tmp1=ob_get_clean();?><?php if (($_smarty_tpl->tpl_vars['val']->value['rejected']&&$_smarty_tpl->tpl_vars['val']->value['value'])||(!$_smarty_tpl->tpl_vars['val']->value['rejected']&&!$_smarty_tpl->tpl_vars['val']->value['accepted_v']&&$_tmp1)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_new_offer_by_vendor'];?>

							<strong>€ <?php echo nf($_smarty_tpl->tpl_vars['val']->value['value']);?>
</strong>
							.
                        <?php }?>

                    <?php } else { ?>
						<h4 class="xoffer"><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_inbox_message_vendor'];?>
</h4>
                        <?php echo nl2br($_smarty_tpl->tpl_vars['val']->value['content']);?>

						<br/>
						<br/>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rejected']&&!$_smarty_tpl->tpl_vars['val']->value['value']) {?>
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_offer_rejected'];?>

                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['val']->value['accepted_c']&&!$_smarty_tpl->tpl_vars['val']->value['accepted_v']) {?>
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_offer_accepted_by_user'];?>

                        <?php }?>

                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['val']->value['value'];?>
<?php $_tmp2=ob_get_clean();?><?php if (($_smarty_tpl->tpl_vars['val']->value['rejected']&&$_smarty_tpl->tpl_vars['val']->value['value'])||(!$_smarty_tpl->tpl_vars['val']->value['rejected']&&!$_smarty_tpl->tpl_vars['val']->value['accepted_v']&&$_tmp2)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_new_offer_by_user'];?>

							<strong>€ <?php echo nf($_smarty_tpl->tpl_vars['val']->value['value']);?>
</strong>
							.
                        <?php }?>
                    <?php }?>


					<div style="height:20px; background:#fff;"></div>

                    <?php if ((!$_smarty_tpl->tpl_vars['val']->value['accepted_v']&&!$_smarty_tpl->tpl_vars['val']->value['accepted_c'])||(!$_smarty_tpl->tpl_vars['B_customer']->value&&$_smarty_tpl->tpl_vars['val']->value['accepted_c']&&!$_smarty_tpl->tpl_vars['val']->value['accepted_v'])||($_smarty_tpl->tpl_vars['B_customer']->value&&$_smarty_tpl->tpl_vars['val']->value['rejected']&&$_smarty_tpl->tpl_vars['val']->value['accepted_c'])) {?>
						<div class="row inbox-actions-box">

                            <?php if ($_smarty_tpl->tpl_vars['val']->value['value']) {?>
								<div class="offer-box-text-new col-sm-3" style="margin-right: 20px;">
									<form method="post" action="">
										<span class="offer-box-small-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept_bid_header'];?>
</span><br/><br/>
										<span class="offer-box-small-text"><strong>EUR <?php echo nf($_smarty_tpl->tpl_vars['val']->value['value']);?>
</strong></span><br/><br/>
										<input type="hidden" name="accept" value="1">
										<input type="hidden" name="data[value]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['value'];?>
">
										<input type="checkbox" id="terms-mob" name="terms-mob"
											   value="true"> <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_buy'];?>
<br/>
										<input style="margin-top:10px; width:125px; background:#2ac20f; border:0; border-radius:0;"
											   name="accept" class="btn btn-success" type="submit"
											   value="<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept'];?>
"
											   onclick="if(!$('#terms-mob').is(':checked')) { alert('<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_error_terms'];?>
'); return false;}">
									</form>
								</div>
                            <?php }?>

                            <?php if (!$_smarty_tpl->tpl_vars['B_customer']->value||($_smarty_tpl->tpl_vars['B_customer']->value&&$_smarty_tpl->tpl_vars['cnt_bidds_left']->value>0)) {?>
								<div class="offer-box-text-new col-sm-3" style="margin-right: 20px;">
									<form method="post" action="">
										<span class="offer-box-small-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_counterproposal'];?>
</span><br/><br/>
										<input type="text" class="xinput" style="width:125px; min-height:35px;"
											   name="data[value]" id="value" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_increase'];?>
"
											   value="<?php echo $_smarty_tpl->tpl_vars['val']->value['value'];?>
"><br/>
										<input style="width:125px; background:#2e78b9; border:0; border-radius:0;"
											   name="reject2" class="btn btn-info" type="submit"
											   value="<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm'];?>
"><br/>
									</form>
                                    <?php if ($_smarty_tpl->tpl_vars['B_customer']->value) {?>
										<br/>
										<span class="offer-box-big-text"><?php echo $_smarty_tpl->tpl_vars['cnt_bidds_left']->value;?>
</span>
										<span class="offer-box-small-text">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_bidds_remaining'];?>
</span>
                                    <?php }?>
								</div>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['B_customer']->value&&$_smarty_tpl->tpl_vars['cnt_bidds_left']->value==0) {?>
								<div class="offer-box-text-new col-sm-3" style="margin-right: 20px;">
									<span class="offer-box-big-text"><?php echo $_smarty_tpl->tpl_vars['cnt_bidds_left']->value;?>
</span><span
											class="offer-box-small-text">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_bidds_remaining'];?>
</span>
								</div>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['B_customerXX']->value) {?>
								<div class="offer-box-text-new col-sm-3">
									<form method="post" action="">
										<span class="offer-box-small-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_text_reject'];?>
</span><br/><br/>
										<input style="width:125px; background:#ea8e09; border:0; border-radius:0;"
											   name="reject" class="btn btn-danger" type="submit"
											   value="<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_reject'];?>
">
									</form>
								</div>
                            <?php }?>

						</div>
                    <?php }?>

					<div class="clearfix"></div>

					<div class="" style="margin-top:25px;">
						<form method="post" action="" style="margin-top:25px;">
							<div class="col-md-12">

                                <?php if ($_smarty_tpl->tpl_vars['user2']->value&&$_smarty_tpl->tpl_vars['val']->value['accepted_v']&&!$_smarty_tpl->tpl_vars['val']->value['accepted_c']) {?>

                                    <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_text_customer'];?>

									<div class="form-group group">
										<label for="firstname"><?php echo $_smarty_tpl->tpl_vars['translation']->value['firstname'];?>
</label>
										<input type="text" class="form-control xinput" name="data[firstname]"
											   id="firstname" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['firstname'];?>
" required>
									</div>
									<div class="form-group group">
										<label for="lastname"><?php echo $_smarty_tpl->tpl_vars['translation']->value['lastname'];?>
</label>
										<input type="text" class="form-control xinput" name="data[lastname]"
											   id="lastname" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['lastname'];?>
" required>
									</div>
									<div class="form-group group">
										<label for="country"><?php echo $_smarty_tpl->tpl_vars['translation']->value['country'];?>
</label>
										<input type="text" class="form-control xinput" name="data[country]" id="country"
											   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['country'];?>
" required>
									</div>
									<div class="form-group group">
										<label for="street"><?php echo $_smarty_tpl->tpl_vars['translation']->value['street'];?>
</label>
										<input type="text" class="form-control xinput" name="data[street]" id="street"
											   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['street'];?>
" required>
									</div>
									<div class="form-group group">
										<label for="postalcode"><?php echo $_smarty_tpl->tpl_vars['translation']->value['postalcode'];?>
</label>
										<input type="text" class="form-control xinput" name="data[postalcode]"
											   id="postalcode" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['postalcode'];?>
" required>
									</div>
									<div class="form-group group">
										<label for="location"><?php echo $_smarty_tpl->tpl_vars['translation']->value['location'];?>
</label>
										<input type="text" class="form-control xinput" name="data[location]"
											   id="location" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['location'];?>
" required>
									</div>
									<div class="form-group group">
										<label for="phone"><?php echo $_smarty_tpl->tpl_vars['translation']->value['phone2'];?>
</label>
										<input type="text" class="form-control xinput" name="data[phone]" id="phone"
											   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['phone'];?>
">
									</div>
									<input type="checkbox" id="terms-mob" name="terms-mob" value="true">
                                    <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_buy'];?>

									<br>
									<input style="margin-top:10px; width:125px; background:#2ac20f; border:0; border-radius:0;"
										   name="accept" class="btn btn-success" type="submit"
										   value="<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept'];?>
"
										   onclick="if(!$('#terms-mob').is(':checked')) { alert('<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_error_terms'];?>
'); return false;}">
									<input type="hidden" name="data[value]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['value'];?>
">
                                <?php }?>
							</div>

							<div class="clearfix"></div>
							<a id="accept"></a>
							<div id="accept-box-mob" class="hidden col-md-12" style="margin-top:25px;">
								<input type="checkbox" id="terms-mob" name="terms-mob"
									   value="true"> <?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_confirm_buy'];?>

								<br>
								<input style="margin-top:10px; width:125px; background:#2ac20f; border:0; border-radius:0;"
									   name="accept" class="btn btn-success" type="submit"
									   value="<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_accept'];?>
"
									   onclick="if(!$('#terms-mob').is(':checked')) { alert('<?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_error_terms'];?>
'); return false;}">
							</div>

						</form>
					</div>

				</div>
				<div class="col-sm-4">
					div class="offer-box-text-days">
					<span class="offer-box-big-text"><?php echo $_smarty_tpl->tpl_vars['ad']->value['days'];?>
</span><span class="offer-box-small-text"
																			style="text-transform: uppercase;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
</span>&nbsp;&nbsp;&nbsp;<span
							class="offer-box-big-text"><?php echo $_smarty_tpl->tpl_vars['ad']->value['persons'];?>
</span><span
							class="offer-box-small-text">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
</span>
				</div>

				<div style="height:20px; background:#fff;"></div>

				<div class="offer-box-text-new">
					<span class="offer-box-big-text">&euro; <?php echo nf($_smarty_tpl->tpl_vars['ad']->value['value']);?>
</span><br/>
					<span class="offer-box-small-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['value3'];?>
</span>
				</div>

				<div style="height:20px; background:#fff;"></div>

				<div class="offer-box-text-new">
					<form method="post" action="">
						<span class="offer-box-small-text"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inbox_new_msg'];?>
</span>
						<textarea class="xinput" rows="10" cols="50" style="width:95%;margin-top: 10px;"
								  placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['message'];?>
" name="data[content]"></textarea>
						<input class="btn btn-primary" type="submit" value="SENDEN"
							   style="width:125px; border:0; border-radius:0; margin-top:10px;">
					</form>
				</div>
			</div>
			</div>
            <?php break 1?>
        <?php }?>

    <?php } ?>

    <?php if (!$_smarty_tpl->tpl_vars['B_inboxForm']->value) {?>
	</tbody>
</table>
<?php }?>
<?php }} ?>
