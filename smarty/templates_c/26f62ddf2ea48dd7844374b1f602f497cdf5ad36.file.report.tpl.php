<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42819277460173bfee9b373-38488908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26f62ddf2ea48dd7844374b1f602f497cdf5ad36' => 
    array (
      0 => './inc/views/pages/report.tpl',
      1 => 1645984154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42819277460173bfee9b373-38488908',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfeec4240_52865877',
  'variables' => 
  array (
    'B_backendreport1' => 0,
    'data' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfeec4240_52865877')) {function content_60173bfeec4240_52865877($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_backendreport1']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("b_result_counter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
			<th>Bieter ID</th>
			<th>Bieter E-Mail</th>
			<th>Anbieter ID</th>
			<th>Anbieter</th>
			<th>Anbieter E-Mail</th>
			<th>title</th>
			<th>Anbot Bieter</th>
			<th>Anbot Anbieter</th>
			<th>Hobidd Code</th>
		</tr>
		</thead>
		<tbody>
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['customer_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['c_email'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['vendor_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['company'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['v_email'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['c_value'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['v_value'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['hobidd_code'];?>
</td>
			</tr>
        <?php } ?>
		</tbody>
	</table>
    <?php echo $_smarty_tpl->getSubTemplate ("b_page_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php }} ?>
