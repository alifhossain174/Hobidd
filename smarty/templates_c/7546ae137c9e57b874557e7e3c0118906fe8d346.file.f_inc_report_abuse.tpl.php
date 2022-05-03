<?php /* Smarty version Smarty-3.1.17, created on 2021-11-05 08:06:29
         compiled from "./inc/views/f_inc_report_abuse.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24175494760ac7cce2dc8a9-63707585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7546ae137c9e57b874557e7e3c0118906fe8d346' => 
    array (
      0 => './inc/views/f_inc_report_abuse.tpl',
      1 => 1632480405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24175494760ac7cce2dc8a9-63707585',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60ac7cce362555_55223525',
  'variables' => 
  array (
    'pagedata' => 0,
    'msg' => 0,
    'B_success' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60ac7cce362555_55223525')) {function content_60ac7cce362555_55223525($_smarty_tpl) {?><section class="log-reg container">

	<div class="ft" style="margin-top:20px; margin-bottom:20px;">
        <?php echo $_smarty_tpl->tpl_vars['pagedata']->value['content'];?>

	</div>

    <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?><h2 style="color:#fa8f0f; margin-top:30px; margin-bottom:30px;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h2><?php }?>

    <?php if (!$_smarty_tpl->tpl_vars['B_success']->value) {?>
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5">
				<form method="post" class="login-form">
					<div class="form-group group">
						<label for="content">Beschreibung*</label>
						<textarea class="form-control xinput" required rows="10" style="width:675px;" cols="50"
								  placeholder="Beschreibung" name="data[content]"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</textarea>
					</div>

					<div class="g-recaptcha" data-sitekey="6Ld2phMTAAAAANjahu7CaXFbOSJVeabrTbLv4Flq"></div>

					<input style="margin-top:25px;" class="btn btn-default green_btn" type="submit"
						   value="Daten absenden">
				</form>
			</div>
		</div>
    <?php }?>
</section>
<?php }} ?>
