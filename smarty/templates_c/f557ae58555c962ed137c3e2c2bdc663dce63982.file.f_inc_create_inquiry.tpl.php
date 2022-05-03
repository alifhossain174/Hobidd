<?php /* Smarty version Smarty-3.1.17, created on 2022-04-11 18:17:14
         compiled from "./inc/views/f_inc_create_inquiry.tpl" */ ?>
<?php /*%%SmartyHeaderCode:245416301601801b6836808-65116865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f557ae58555c962ed137c3e2c2bdc663dce63982' => 
    array (
      0 => './inc/views/f_inc_create_inquiry.tpl',
      1 => 1647264112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245416301601801b6836808-65116865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_601801b68b9af0_76667584',
  'variables' => 
  array (
    'msg' => 0,
    'pagedata' => 0,
    'lang' => 0,
    'translation' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_601801b68b9af0_76667584')) {function content_601801b68b9af0_76667584($_smarty_tpl) {?><div class="container">
	<div class="row">
		<div class="col">
            <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
				<div class="alert alert-danger" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

				</div>
            <?php }?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 pr-md-5">
            <?php echo $_smarty_tpl->tpl_vars['pagedata']->value['content'];?>


			<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/create-inquiry/" style="margin-top:20px;">

				<div class="form-group">
					<label for="country"><?php echo $_smarty_tpl->tpl_vars['translation']->value['country'];?>
*</label>
					<select name="data[country]" class="form-control" id="country">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_country'];?>

					</select>
				</div>

				<div class="form-group">
					<label for="federal_state"><?php echo $_smarty_tpl->tpl_vars['translation']->value['federal_state'];?>
</label>
					<input type="text" class="form-control" name="data[federal_state]" id="federal_state"
						   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['federal_state'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['federal_state'];?>
">
				</div>
                <br>
				<div class="form-group">
					<label for="accomodationType"><?php echo $_smarty_tpl->tpl_vars['translation']->value['accomodation_type'];?>
*</label>
					<br/>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_accomodationType'];?>

				</div>

				<div class="form-group">
					<label for="categories"><?php echo $_smarty_tpl->tpl_vars['translation']->value['categories'];?>
</label>
					<br/>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_category'];?>

				</div>

				<div class="form-group">
					<label for="provisions"><?php echo $_smarty_tpl->tpl_vars['translation']->value['provisions'];?>
</label>
					<br/>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_provision'];?>

				</div>
                <br>
				<div class="form-group">
					<label>
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['flexible_travel_time'];?>
*&nbsp;
						<i class="fas fa-question-circle tippy"
						   data-tippy-content="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['translation']->value['inquiry_tooltip_flexible_travel_time'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"></i>
					</label>
					<br>
					<label class="checkbox-inline mr-2">
						<input type="radio" name="data[flexible_travelling_time]" value="1" required
                               <?php if ($_smarty_tpl->tpl_vars['data']->value['flexible_travelling_time']=='1') {?>checked<?php }?>>&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['yes'];?>

					</label>
					<label class="checkbox-inline mr-2">
						<input type="radio" name="data[flexible_travelling_time]" value="0" required
                               <?php if ($_smarty_tpl->tpl_vars['data']->value['flexible_travelling_time']=='0') {?>checked<?php }?>>&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['no'];?>

					</label>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-6">
						<label for="date_from"><?php echo $_smarty_tpl->tpl_vars['translation']->value['create_inquiry_from'];?>
*</label>
						<input name="data[date_from]" id="date_from" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['date_from'];?>
">
					</div>
					<div class="form-group col-sm-6">
						<label for="date_until"><?php echo $_smarty_tpl->tpl_vars['translation']->value['create_inquiry_until'];?>
*</label>
						<input name="data[date_until]" id="date_until" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['date_until'];?>
">
					</div>
					<script>
                        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                        $('#date_from').datepicker({
                            uiLibrary: 'bootstrap4',
                            iconsLibrary: 'fontawesome',
                            format: 'yyyy-mm-dd',
                            maxDate: function () {
                                return $('#date_until').val();
                            }
                        });
                        $('#date_until').datepicker({
                            uiLibrary: 'bootstrap4',
                            iconsLibrary: 'fontawesome',
                            format: 'yyyy-mm-dd',
                            minDate: function () {
                                return $('#date_from').val();
                            }
                        }).on('change', function (e) {
							if($('#date_until').val() != '' && $('#date_from').val() != ''){
								var d1 = new Date($('#date_from').val());
								var d2 = new Date($('#date_until').val());
								var diff = 0;
								if (d1 && d2) {
									diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
								}
								$('#days').val(diff);
							}

						});
					</script>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-4">
						<label for="days"><?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
*</label>
						<input type="text" class="form-control" maxlength="5" name="data[days]" id="days"
							   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['days'];?>
">
					</div>
					<div class="form-group col-sm-4">
						<label for="adults"><?php echo $_smarty_tpl->tpl_vars['translation']->value['adults'];?>
*</label>
						<input type="text" class="form-control" maxlength="5" name="data[adults]" id="adults"
							   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['adults'];?>
" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['adults'];?>
">
					</div>
					<div class="form-group col-sm-4">
						<label for="children"><?php echo $_smarty_tpl->tpl_vars['translation']->value['children'];?>
*</label>
						<input type="text" class="form-control" maxlength="5" name="data[children]" id="children"
							   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['children'];?>
" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['children'];?>
">
					</div>
				</div>

				<div class="form-group group">
					<label for="additional_info"><?php echo $_smarty_tpl->tpl_vars['translation']->value['additional_info'];?>
</label>
					<textarea class="form-control" rows="7"
							  placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_additional_info_description'];?>
"
							  name="data[additional_info]"><?php echo $_smarty_tpl->tpl_vars['data']->value['additional_info'];?>
</textarea>
				</div>

				<div class="form-group group">
					<label for="budget"><?php echo $_smarty_tpl->tpl_vars['translation']->value['budget'];?>
*</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">€</div>
						</div>
						<input type="number" class="form-control" name="data[budget]" id="budget"
							   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['budget'];?>
" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['budget'];?>
">
					</div>
				</div>
                <br>
				<div class="checkbox" style="margin-top:20px;">
					<label>
						<input type="checkbox" name="data[terms]">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['info_terms'];?>

				</div>
                <br>
				<button type="submit" class="btn btn-success mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_submit'];?>
</button>
			</form>
		</div>
	</div>
</div>
<?php }} ?>
