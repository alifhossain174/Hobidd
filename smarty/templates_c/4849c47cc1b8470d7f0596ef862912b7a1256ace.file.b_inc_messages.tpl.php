<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:24
         compiled from "./inc/views/b_inc_messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90177904960173bfe75fa03-30921487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4849c47cc1b8470d7f0596ef862912b7a1256ace' => 
    array (
      0 => './inc/views/b_inc_messages.tpl',
      1 => 1645984143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90177904960173bfe75fa03-30921487',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfe76d651_66215722',
  'variables' => 
  array (
    'B_error' => 0,
    'msg' => 0,
    'B_success' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfe76d651_66215722')) {function content_60173bfe76d651_66215722($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_error']->value) {?>
	<div class="alert alert-danger fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strongFehler:
		</strong> <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_success']->value) {?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		$msg}
	</div>
<?php }?>
<?php }} ?>
