<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/b_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94643278060173bfef29217-55557064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5af2b26035229b594248f209c371c38d6faccd8' => 
    array (
      0 => './inc/views/b_footer.tpl',
      1 => 1645984142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94643278060173bfef29217-55557064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfef350d6_78888755',
  'variables' => 
  array (
    'B_del' => 0,
    'form_action' => 0,
    'id' => 0,
    'form_back' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfef350d6_78888755')) {function content_60173bfef350d6_78888755($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_del']->value) {?>
	<form action="<?php echo $_smarty_tpl->tpl_vars['form_action']->value;?>
" method="post">
		<div class="alert-message block-message error">
			<h3>Wirklich löschen?</h3>
			<div class="alert-actions">
				<input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
				<input type="submit" class="btn-u btn-u-red" value="Löschen">
				<a class="btn-u btn-u-default" href="<?php echo $_smarty_tpl->tpl_vars['form_back']->value;?>
">Abbrechen</a>
			</div>
		</div>
	</form>
<?php }?>

</div><!-- mainContent -->
</div><!-- /.container -->
</body>
</html>
<?php }} ?>
