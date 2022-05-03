<?php /* Smarty version Smarty-3.1.17, created on 2021-10-09 10:39:24
         compiled from "./inc/views/f_inc_traveller_landingpage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10477384136017b46a6ca007-08703312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '319068bba7832fd811b4b6e6740f0c6199183fb4' => 
    array (
      0 => './inc/views/f_inc_traveller_landingpage.tpl',
      1 => 1632480405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10477384136017b46a6ca007-08703312',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6017b46a70ac73_95539793',
  'variables' => 
  array (
    'msg' => 0,
    'pagedata_top' => 0,
    'translation' => 0,
    'lang' => 0,
    'redirect_to' => 0,
    'pagedata_bottom' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6017b46a70ac73_95539793')) {function content_6017b46a70ac73_95539793($_smarty_tpl) {?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
            <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
				<div class="alert alert-danger" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

				</div>
            <?php }?>
		</div>
	</div>



    <?php if ($_smarty_tpl->tpl_vars['pagedata_top']->value['content']) {?>
		<div class="row">
			<div class="col">
                <?php echo $_smarty_tpl->tpl_vars['pagedata_top']->value['content'];?>

			</div>
		</div>
    <?php }?>

	<div class="row">
		<div class="col-md-6">
			<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['login_vendor'];?>
</h2>
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
/passwort-vergessen/"
			   style="margin-top: 10px;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['lost_password'];?>
</a>
		</div>
       
		<div class="col-md-6">
			<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_customer1'];?>
</h2>
             <br>
			<div class="mb-3"><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_register_customer2'];?>
</div>
			<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/user-registration/">
				<button type="button" class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['translation']->value['register'];?>
</button>
			</a>
		</div>
	</div>

    <?php if ($_smarty_tpl->tpl_vars['pagedata_bottom']->value['content']) {?>
		<div class="row">
			<div class="col">
                <?php echo $_smarty_tpl->tpl_vars['pagedata_bottom']->value['content'];?>

			</div>
		</div>
    <?php }?>

</div>
<?php }} ?>
