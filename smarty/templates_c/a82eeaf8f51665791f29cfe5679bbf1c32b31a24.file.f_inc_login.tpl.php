<?php /* Smarty version Smarty-3.1.17, created on 2022-04-12 15:06:44
         compiled from "./inc/views/f_inc_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1041743563614ef4c46c4089-24969225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a82eeaf8f51665791f29cfe5679bbf1c32b31a24' => 
    array (
      0 => './inc/views/f_inc_login.tpl',
      1 => 1647264101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1041743563614ef4c46c4089-24969225',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614ef4c48c6cc7_56093655',
  'variables' => 
  array (
    'msg' => 0,
    'translation' => 0,
    'lang' => 0,
    'redirect_to' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614ef4c48c6cc7_56093655')) {function content_614ef4c48c6cc7_56093655($_smarty_tpl) {?><br>
<div class="container">
	<div class="row">
		<!--Login-->
        
		<div class="col-md pr-md-5" style="margin-bottom: 50px;">
            <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
				<div class="alert alert-danger" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

				</div>
            <?php }?>

			<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['login_vendor'];?>
</h2>
            <br>
            <br>
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
/passwort-vergessen/" style="margin-top: 10px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['lost_password'];?>
</a>
		</div>


		<div class="col-md">
			<div>
				<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_customer1'];?>
</h2>
				<div class="mb-3"><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_customer2'];?>
</div>
				<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/user-registration/">
					<button type="button" class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['translation']->value['register'];?>
</button>
				</a>
			</div>

			<div style="margin-top: 50px;">
				<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_vendor1'];?>
</h2>
				<div class="mb-3"><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_vendor2'];?>
</div>
				<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/paketauswahl/">
					<button type="button" class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['translation']->value['register'];?>
</button>
				</a>
			</div>
		</div>
	</div>
</div>
<?php }} ?>
