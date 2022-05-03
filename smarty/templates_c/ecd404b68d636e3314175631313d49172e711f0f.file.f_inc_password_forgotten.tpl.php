<?php /* Smarty version Smarty-3.1.17, created on 2022-03-11 00:40:03
         compiled from "./inc/views/f_inc_password_forgotten.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11268058226017a9a0dd8219-39121410%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecd404b68d636e3314175631313d49172e711f0f' => 
    array (
      0 => './inc/views/f_inc_password_forgotten.tpl',
      1 => 1645984417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11268058226017a9a0dd8219-39121410',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6017a9a0e6f5d8_52598438',
  'variables' => 
  array (
    'pagedata' => 0,
    'msg' => 0,
    'translation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6017a9a0e6f5d8_52598438')) {function content_6017a9a0e6f5d8_52598438($_smarty_tpl) {?><section class="log-reg container">

	<div class="post">
        <?php echo $_smarty_tpl->tpl_vars['pagedata']->value['content'];?>

	</div>

    <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?><h2 style="color:#fa8f0f; margin-top:30px; margin-bottom:30px;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h2><?php }?>

	<div class="row" style="margin-top:25px;">
		<!--Login-->
		<div class="col-lg-5 col-md-5 col-sm-5">
			<form method="post" class="login-form">
				<div class="form-group group">
					<label for="email"><?php echo $_smarty_tpl->tpl_vars['translation']->value['email'];?>
</label>
					<input type="email" class="form-control xinput" name="data[email]" id="email"
						   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['email'];?>
" required>
				</div>
				<input class="btn btn-default green_btn" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['translation']->value['request_new_password'];?>
">
			</form>
		</div>
	</div>
</section>
<?php }} ?>
