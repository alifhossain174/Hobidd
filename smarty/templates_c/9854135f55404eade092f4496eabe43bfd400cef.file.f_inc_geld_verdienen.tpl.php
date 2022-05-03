<?php /* Smarty version Smarty-3.1.17, created on 2022-04-12 18:16:07
         compiled from "./inc/views/f_inc_geld_verdienen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15314165476203fa4b263df2-65390939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9854135f55404eade092f4496eabe43bfd400cef' => 
    array (
      0 => './inc/views/f_inc_geld_verdienen.tpl',
      1 => 1647264102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15314165476203fa4b263df2-65390939',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6203fa4b273b04_10946997',
  'variables' => 
  array (
    'pagedata' => 0,
    'msg' => 0,
    'translation' => 0,
    'B_success' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6203fa4b273b04_10946997')) {function content_6203fa4b273b04_10946997($_smarty_tpl) {?><div class="container">	<div class="row">		<div class="col-lg">			<?php echo $_smarty_tpl->tpl_vars['pagedata']->value['content'];?>
			<div class="row">				<div class="col-md-6">					<?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>						<div class="alert alert-success mt-3" role="alert">							<?php echo $_smarty_tpl->tpl_vars['translation']->value['thank_you_for_your_message'];?>
						</div>					<?php }?>					<?php if (!$_smarty_tpl->tpl_vars['B_success']->value) {?>						<form method="post" style="margin-top:25px;">							<div class="input-group mb-3">								<div class="input-group-prepend">									<span class="input-group-text" id="basic-addon2"><?php echo $_smarty_tpl->tpl_vars['translation']->value['email'];?>
*</span>								</div>								<input type="text" class="form-control" placeholder="" aria-label="Email"									   aria-describedby="basic-addon2" name="data[email]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
" required>							</div>							<div class="g-recaptcha" data-sitekey="6Ld2phMTAAAAANjahu7CaXFbOSJVeabrTbLv4Flq"></div>							<button type="submit" class="btn btn-success mt-4"><?php echo $_smarty_tpl->tpl_vars['translation']->value['send_message'];?>
</button>						</form>					<?php }?>				</div>			</div>		</div>	</div></div><?php }} ?>
