<?php /* Smarty version Smarty-3.1.17, created on 2022-04-15 14:45:16
         compiled from "./inc/views/f_inc_customer_registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9474362206018471008b671-33001710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6df54cb95dce5aa2b3a644a7d1838bd0a98a13e3' => 
    array (
      0 => './inc/views/f_inc_customer_registration.tpl',
      1 => 1647264109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9474362206018471008b671-33001710',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60184710172a12_99627723',
  'variables' => 
  array (
    'msg' => 0,
    'translation' => 0,
    'lang' => 0,
    'xdata' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60184710172a12_99627723')) {function content_60184710172a12_99627723($_smarty_tpl) {?><div class="container">
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
			<h1><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_customer1'];?>
</h1>
            <?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_customer2'];?>


			<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/user-registration/">
				<div class="input-group mt-3 mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><?php echo $_smarty_tpl->tpl_vars['translation']->value['email'];?>
*</span>
					</div>
					<input type="text" class="form-control" placeholder="" aria-label="Username"
						   aria-describedby="basic-addon1" name="xdata[email]" value="<?php echo $_smarty_tpl->tpl_vars['xdata']->value['email'];?>
" required>
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon2"><?php echo $_smarty_tpl->tpl_vars['translation']->value['password'];?>
*</span>
					</div>
					<input type="password" class="form-control" placeholder="" aria-label="Password"
						   aria-describedby="basic-addon2" name="xdata[password]" required>
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon3"><?php echo $_smarty_tpl->tpl_vars['translation']->value['repeat_password'];?>
*</span>
					</div>
					<input type="password" class="form-control" placeholder="" aria-label="Password"
						   aria-describedby="basic-addon2" name="xdata[password2]" required>
				</div>

				<div class="form-check mb-3">
					<input type="checkbox" class="form-check-input" id="legalCheckbox1" name="xdata[legalCheckbox1]">
					<label class="form-check-label"
						   for="legalCheckbox1"><?php echo $_smarty_tpl->tpl_vars['translation']->value['userregistration_legalcheckbox1'];?>
</label>
				</div>

				<button type="submit" class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['translation']->value['register'];?>
</button>
			</form>
		</div>
		<div class="col-md-4">
			&nbsp;
		</div>
	</div>
</div>
<?php }} ?>
