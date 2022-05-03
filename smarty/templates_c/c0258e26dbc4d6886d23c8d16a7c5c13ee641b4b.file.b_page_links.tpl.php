<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/b_page_links.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7862857160173bfeacac72-21436270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0258e26dbc4d6886d23c8d16a7c5c13ee641b4b' => 
    array (
      0 => './inc/views/b_page_links.tpl',
      1 => 1645984143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7862857160173bfeacac72-21436270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfeaf0709_63270656',
  'variables' => 
  array (
    'page_links' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfeaf0709_63270656')) {function content_60173bfeaf0709_63270656($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page_links']->value['pagination']) {?>
	<ul class="pagination pagination-sm">
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page_links']->value['pagination']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
			<li<?php if ($_smarty_tpl->tpl_vars['val']->value['active']) {?> class="active"<?php }?>>
				<a <?php if ($_smarty_tpl->tpl_vars['val']->value['link']) {?> class="ajaxLink" href="<?php echo $_smarty_tpl->tpl_vars['val']->value['link'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['val']->value['page'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a></li>
        <?php } ?>
	</ul>
	<p style="font-size:10px; padding-top:10px;">Eintrag <?php echo $_smarty_tpl->tpl_vars['page_links']->value['entry_from'];?>
 bis <?php echo $_smarty_tpl->tpl_vars['page_links']->value['entry_to'];?>

		von <?php echo $_smarty_tpl->tpl_vars['page_links']->value['cnt'];?>
</p>
<?php }?>
<?php }} ?>
