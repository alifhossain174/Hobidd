<?php /* Smarty version Smarty-3.1.17, created on 2021-09-30 18:00:19
         compiled from "./inc/views/f_inc_change_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1489340618601a764ebc6be7-34585742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b978132f3376e33d2251720dfbfc8e08751ddebd' => 
    array (
      0 => './inc/views/f_inc_change_password.tpl',
      1 => 1632480405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1489340618601a764ebc6be7-34585742',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_601a764ec7bdb4_57261533',
  'variables' => 
  array (
    'pagedata' => 0,
    'msg' => 0,
    'hide_form' => 0,
    'translation' => 0,
    'B_registerForm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_601a764ec7bdb4_57261533')) {function content_601a764ec7bdb4_57261533($_smarty_tpl) {?><section class="log-reg container" style="max-width:1030px; margin-top:28px; padding-left:20px;">

    <?php if ($_smarty_tpl->tpl_vars['pagedata']->value['file']) {?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['pagedata']->value['url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pagedata']->value['file'];?>
" style="max-width:958px; margin-left:5px;"></a>
    <?php }?>

	<div class="post">
        <?php echo $_smarty_tpl->tpl_vars['pagedata']->value['content'];?>

	</div>

    <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?><h2 style="color:#fa8f0f; margin-top:30px; margin-bottom:30px;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h2><?php }?>

    <?php if (!$_smarty_tpl->tpl_vars['hide_form']->value) {?>
		<div class="row">
			<!--Login-->
			<div class="col-lg-5 col-md-5 col-sm-5">
				<form method="post" class="login-form">
					<div class="form-group group">
						<label for="password"><?php echo $_smarty_tpl->tpl_vars['translation']->value['password_8_signs'];?>
*</label>
						<input type="password" class="form-control xinput" name="data[password]" id="password"
							   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['password'];?>
"<?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value) {?> required<?php }?>>
					</div>
					<div class="form-group group">
						<label for="password_repeat"><?php echo $_smarty_tpl->tpl_vars['translation']->value['repeat_password'];?>
*</label>
						<input type="password" class="form-control xinput" name="data[password_repeat]"
							   id="password_repeat"
							   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['repeat_password'];?>
"<?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value) {?> required<?php }?>>
					</div>
					<input class="btn btn-default green_btn" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['translation']->value['change_password'];?>
">
				</form>
			</div>
		</div>
    <?php }?>
</section>
<?php }} ?>
