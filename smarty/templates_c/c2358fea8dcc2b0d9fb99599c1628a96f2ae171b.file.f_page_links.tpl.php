<?php /* Smarty version Smarty-3.1.17, created on 2022-04-11 18:17:58
         compiled from "./inc/views/f_page_links.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2052594196614e21d00828c0-71021922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2358fea8dcc2b0d9fb99599c1628a96f2ae171b' => 
    array (
      0 => './inc/views/f_page_links.tpl',
      1 => 1647264091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2052594196614e21d00828c0-71021922',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614e21d0220f45_00365988',
  'variables' => 
  array (
    'page_links' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614e21d0220f45_00365988')) {function content_614e21d0220f45_00365988($_smarty_tpl) {?><div class="container">
    <?php if ($_smarty_tpl->tpl_vars['page_links']->value['pagination']) {?>
		<!--Pagination-->
		<div class="container d-none d-lg-block">
			<div class="row mt-5">
				<div class="col">
					<ul class="pagination">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page_links']->value['pagination']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
							<!--<li class="<?php if ($_smarty_tpl->tpl_vars['val']->value['active']) {?>active<?php }?>"><a style="top:0;" class="ajaxLink<?php if ($_smarty_tpl->tpl_vars['val']->value['name']=="&raquo;") {?> glyphicon glyphicon-chevron-right<?php } elseif ($_smarty_tpl->tpl_vars['val']->value['name']=="&laquo;") {?> glyphicon glyphicon-chevron-left<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['val']->value['link'];?>
/<?php echo $_smarty_tpl->tpl_vars['val']->value['page'];?>
/"><?php if ($_smarty_tpl->tpl_vars['val']->value['name']!="&raquo;"&&$_smarty_tpl->tpl_vars['val']->value['name']!="&laquo;") {?><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
<?php }?></a></li>-->
							<li class="page-item <?php if ($_smarty_tpl->tpl_vars['val']->value['active']) {?>active<?php }?>"><a style="top:0;" class="page-link"
																				 href="<?php echo $_smarty_tpl->tpl_vars['val']->value['link'];?>
/<?php echo $_smarty_tpl->tpl_vars['val']->value['page'];?>
/"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a>
							</li>
                        <?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="container d-lg-none">
			<div class="row mt-5">
				<div class="col">
					<ul class="pagination pagination-sm">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page_links']->value['pagination']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
							<!--<li class="<?php if ($_smarty_tpl->tpl_vars['val']->value['active']) {?>active<?php }?>"><a style="top:0;" class="ajaxLink<?php if ($_smarty_tpl->tpl_vars['val']->value['name']=="&raquo;") {?> glyphicon glyphicon-chevron-right<?php } elseif ($_smarty_tpl->tpl_vars['val']->value['name']=="&laquo;") {?> glyphicon glyphicon-chevron-left<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['val']->value['link'];?>
/<?php echo $_smarty_tpl->tpl_vars['val']->value['page'];?>
/"><?php if ($_smarty_tpl->tpl_vars['val']->value['name']!="&raquo;"&&$_smarty_tpl->tpl_vars['val']->value['name']!="&laquo;") {?><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
<?php }?></a></li>-->
							<li class="page-item <?php if ($_smarty_tpl->tpl_vars['val']->value['active']) {?>active<?php }?>"><a style="top:0;" class="page-link"
																				 href="<?php echo $_smarty_tpl->tpl_vars['val']->value['link'];?>
/<?php echo $_smarty_tpl->tpl_vars['val']->value['page'];?>
/"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a>
							</li>
                        <?php } ?>
					</ul>
				</div>
			</div>
		</div>
    <?php }?>

<?php }} ?>
