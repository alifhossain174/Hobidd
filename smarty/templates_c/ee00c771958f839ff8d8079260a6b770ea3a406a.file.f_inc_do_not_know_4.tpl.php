<?php /* Smarty version Smarty-3.1.17, created on 2021-10-30 07:58:58
         compiled from "./inc/views/f_inc_do_not_know_4.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10431438160c2cba865ad76-88178441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee00c771958f839ff8d8079260a6b770ea3a406a' => 
    array (
      0 => './inc/views/f_inc_do_not_know_4.tpl',
      1 => 1632480405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10431438160c2cba865ad76-88178441',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60c2cba8718ec1_19699000',
  'variables' => 
  array (
    'pagedata' => 0,
    'msg' => 0,
    'translation' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60c2cba8718ec1_19699000')) {function content_60c2cba8718ec1_19699000($_smarty_tpl) {?><!--Login / Register-->
<section class="log-reg container">

	<div class="post ft" style="margin-top:10px;">
        <?php echo $_smarty_tpl->tpl_vars['pagedata']->value['content'];?>

	</div>

    <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?><h2 style="color:#fa8f0f; margin-bottom:30px;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h2><?php }?>

	<div class="row">
		<!--Login-->
		<div class="col-lg-6 col-md-6 col-sm-6">
			<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['login_offer1'];?>
</h2>

			<form method="post" class="login-form" style="margin-top:10px">
				<div class="form-group group">
					<label for="email" class="cf_label"><?php echo $_smarty_tpl->tpl_vars['translation']->value['email'];?>
:</label>
					<input type="email" style="width:350px;" class="form-control xinput" name="auth[email]" id="email"
						   placeholder="Email" required>
				</div>
				<div class="form-group group">
					<label for="password" class="cf_label"><?php echo $_smarty_tpl->tpl_vars['translation']->value['password'];?>
:</label>
					<input type="password" style="width:350px;" class="form-control xinput" name="auth[password]"
						   id="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['password'];?>
" required>
					<!--<a class="help-link" href="#">Passwort vergessen?</a>-->
				</div>
				<div class="checkbox">
					<div style="margin-left:22px;"><input type="checkbox" name="auth[remember]"></div>
					<label class="cf_label" style="margin-top:5px !important;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['save_login'];?>
</label>
				</div>

				<p>
					<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/passwort-vergessen/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['lost_password'];?>
</a>
				</p>

				<input class="btn btn-default green_btn" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['translation']->value['login'];?>
"
					   style="margin-top:25px; text-transform:uppercase;">
			</form>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6">
			<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['login_offer2'];?>
</h2>

			<p class="ft" style="margin-top:10px">
                <?php echo $_smarty_tpl->tpl_vars['translation']->value['login_offer3'];?>

			</p>
			<p class="">
				<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/anmelden-angebot/" class="btn btn-default green_btn"
				   style="text-transform:uppercase; margin-top:25px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['register'];?>
</a>

				<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/erste-schritte/" class="btn btn-default green_btn"
				   style="background:#fa8f0f;text-transform:uppercase; border-color:#fa8f0f; margin-top:25px; margin-left:10px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['first_steps'];?>
</a>
			</p>
		</div>
	</div>
</section><!--Login / Register Close-->
<?php }} ?>
