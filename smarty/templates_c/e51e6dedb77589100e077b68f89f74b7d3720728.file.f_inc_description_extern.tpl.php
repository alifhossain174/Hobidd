<?php /* Smarty version Smarty-3.1.17, created on 2021-03-20 21:14:55
         compiled from "./inc/views/f_inc_description_extern.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1401413902605657bf8fe819-66939708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e51e6dedb77589100e077b68f89f74b7d3720728' => 
    array (
      0 => './inc/views/f_inc_description_extern.tpl',
      1 => 1611259611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1401413902605657bf8fe819-66939708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'pagedata' => 0,
    'logged_in' => 0,
    'translation' => 0,
    'lang' => 0,
    'redirect_to' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_605657bf9b5f32_83721107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_605657bf9b5f32_83721107')) {function content_605657bf9b5f32_83721107($_smarty_tpl) {?><div class="container">
	<div class="row">
		<div class="col-md-8">
            <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
				<div class="alert alert-danger" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

				</div>
            <?php }?>
		</div>
	</div>

    <?php if ($_smarty_tpl->tpl_vars['pagedata']->value['content']) {?>
		<div class="row">
			<div class="col">
                <?php echo $_smarty_tpl->tpl_vars['pagedata']->value['content'];?>

			</div>
		</div>
    <?php }?>

    <?php if (!$_smarty_tpl->tpl_vars['logged_in']->value) {?>
	<div class="row">
		<div class="col-md-6">
			<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['login_vendor'];?>
</h2>
			<br />
			<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/login/">
                <?php if ($_smarty_tpl->tpl_vars['redirect_to']->value) {?>
					<input type="hidden" name="redirect_to" value="<?php echo $_smarty_tpl->tpl_vars['redirect_to']->value;?>
"/>
                <?php }?>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><?php echo $_smarty_tpl->tpl_vars['translation']->value['email'];?>
*</span>
					</div>
					<input type="text" class="form-control" placeholder="" aria-label="Username"
						   aria-describedby="basic-addon1" name="auth[email]" required>
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon2"><?php echo $_smarty_tpl->tpl_vars['translation']->value['password'];?>
*</span>
					</div>
					<input type="password" class="form-control" placeholder="" aria-label="Password"
						   aria-describedby="basic-addon2" name="auth[password]" required>
				</div>
				<br>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="rememberCheck">
					<label class="form-check-label" for="rememberCheck"
						   name="auth[remember]"><?php echo $_smarty_tpl->tpl_vars['translation']->value['save_login'];?>
</label>
				</div>

				<button type="submit" class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['translation']->value['login'];?>
</button>
			</form>
			<br>
			<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/passwort-vergessen/"
			   style="margin-top: 10px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['lost_password'];?>
</a>
		</div>

		<div class="col-md-6">
			<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_vendor1'];?>
</h2>
			<br />
			<div class="mb-3"><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_vendor2'];?>
</div>
			<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/paketauswahl/">
				<button type="button" class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['translation']->value['register'];?>
</button>
			</a>
		</div>
	</div>
	<?php }?>

</div>
<?php }} ?>
