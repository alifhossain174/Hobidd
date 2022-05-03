<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/customer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189791540060173bfea4d445-05574834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc9cb3101a0d8f8c2f14293da96d257c7cd84c11' => 
    array (
      0 => './inc/views/pages/customer.tpl',
      1 => 1645984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189791540060173bfea4d445-05574834',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfeab61f9_32243561',
  'variables' => 
  array (
    'B_listCustomers' => 0,
    'state' => 0,
    'filter' => 0,
    'sort' => 0,
    'sort_icon' => 0,
    'data' => 0,
    'val' => 0,
    'B_createCustomer' => 0,
    'B_editCustomer' => 0,
    'ajax' => 0,
    'css' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfeab61f9_32243561')) {function content_60173bfeab61f9_32243561($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_listCustomers']->value) {?>
	<form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary ajaxLayer" href="?s=createCustomer"><i class=" icon-plus-sign"></i> Bieter hinzufügen</a>
		<div class="form-group">
			<input class="form-control" type="text" name="filter[query]" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value['query'];?>
" placeholder="Suche"
				   style="width:200px;">
		</div>
		<button class="btn" id="log-clause"><i class="icon-search"></i> Suchen</button>
		<button name="clear" value="true" id="clearSearchForm" class="btn"><i class="icon-remove-sign"></i> Leeren
		</button>
		<input type="hidden" name="xclear" id="xclear" value="false">
	</form>
    <?php echo $_smarty_tpl->getSubTemplate ("b_result_counter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
			<th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=id&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">ID<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['id'];?>
</a></th>
			<th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=email&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Email<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['email'];?>
</a></th>
			<th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=active&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Aktiv<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['active'];?>
</a></th>
			<th style="width:50px;">Aktion</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['email'];?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['val']->value['active']) {?>Ja<?php } else { ?>Nein<?php }?></td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editCustomer&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Bearbeiten"
					   class="ajaxLayer glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteCustomer&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" id="d<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
        <?php } ?>
		</tbody>
	</table>
    <?php echo $_smarty_tpl->getSubTemplate ("b_page_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_createCustomer']->value||$_smarty_tpl->tpl_vars['B_editCustomer']->value) {?>
	<form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
		  id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:700px; height:400px;"<?php }?>>
		<div id="form-header">
			<h4>Bieter <?php if ($_smarty_tpl->tpl_vars['state']->value=="createCustomer") {?>hinzufügen<?php } else { ?>bearbeiten<?php }?></h4>
		</div>

		<div class="col-md-12">
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['email'];?>
">
				<label for="email" class="col-sm-2 control-label span2">Email</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
" name="data[email]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['active'];?>
">
				<label for="active" class="col-sm-2 control-label span2">Aktiv</label>
				<div class="col-sm-6 span6">
					<select class="form-control" id="active" name="data[active]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_active'];?>

					</select>
				</div>
			</div>
		</div>
        <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listCustomers" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        <?php }?>
		<input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
	</form>
<?php }?>
<?php }} ?>
