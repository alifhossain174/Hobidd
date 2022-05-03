<?php /* Smarty version Smarty-3.1.17, created on 2021-11-08 20:33:49
         compiled from "./inc/views/f_inc_vendor_confirm_registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15969850686019150e32c6f7-21453583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08f82df06a1485134488ce9b375e3fb3a8084f43' => 
    array (
      0 => './inc/views/f_inc_vendor_confirm_registration.tpl',
      1 => 1632901837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15969850686019150e32c6f7-21453583',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6019150e3b8e95_16006397',
  'variables' => 
  array (
    'data' => 0,
    'translation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6019150e3b8e95_16006397')) {function content_6019150e3b8e95_16006397($_smarty_tpl) {?><div class="container">
	<div class="row">
		<div class="col">

            <?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>


			<h2 class="title"><?php echo $_smarty_tpl->tpl_vars['translation']->value['enter_activation_code'];?>
</h2>
			<form method="post" class="login-form" action="" style="margin-top:20px;">
				<div class="form-group">
					<label for="company"></label>
					<input type="text" class="form-control" style="text-transform:uppercase; max-width:230px;"
						   name="code" id="code" placeholder="" value="" required>
				</div>
				<button type="submit" class="btn btn-success mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['activate_account'];?>
</button>
			</form>
		</div>
	</div>
</div>
<?php }} ?>
