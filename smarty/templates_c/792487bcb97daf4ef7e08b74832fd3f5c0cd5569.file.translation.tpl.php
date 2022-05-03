<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/translation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66262622060173bfedbf443-83905859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '792487bcb97daf4ef7e08b74832fd3f5c0cd5569' => 
    array (
      0 => './inc/views/pages/translation.tpl',
      1 => 1645984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66262622060173bfedbf443-83905859',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfee1c929_10692228',
  'variables' => 
  array (
    'B_listTranslations' => 0,
    'state' => 0,
    'filter' => 0,
    'sort' => 0,
    'sort_icon' => 0,
    'data' => 0,
    'val' => 0,
    'B_createTranslation' => 0,
    'B_editTranslation' => 0,
    'ajax' => 0,
    'css' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfee1c929_10692228')) {function content_60173bfee1c929_10692228($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_listTranslations']->value) {?>
	<form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary ajaxLayer" href="?s=createTranslation"><i class=" icon-plus-sign"></i> Übersetzung
			hinzufügen</a>
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
			<th>Key</th>
			<th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=lang_de&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Deutsch<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['lang_de'];?>
</a></th>
			<th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=lang_en&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">English<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['lang_en'];?>
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
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['key'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['lang_de'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['lang_en'];?>
</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editTranslation&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Bearbeiten"
					   class="glyphicon glyphicon-pencil ajaxLayer"></a>
				</td>
			</tr>
        <?php } ?>
		</tbody>
	</table>
    <?php echo $_smarty_tpl->getSubTemplate ("b_page_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_createTranslation']->value||$_smarty_tpl->tpl_vars['B_editTranslation']->value) {?>
	<form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
		  id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:900px; height:600px;"<?php }?>>
		<div id="form-header">
			<h4>Übersetzung <?php if ($_smarty_tpl->tpl_vars['state']->value=="createTranslation") {?>hinzufügen<?php } else { ?>bearbeiten<?php }?></h4>
		</div>

		<div class="col-md-12">
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['key'];?>
">
				<label for="key" class="col-sm-2 control-label span2">Key</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="key" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['key'];?>
" name="data[key]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['lang_de'];?>
">
				<label for="lang_de" class="col-sm-2 control-label span2">Deutsch</label>
				<div class="col-sm-6 span6">
					<textarea name="data[lang_de]" id="lang_de" class="form-control" rows="5"
							  style="width:600px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['lang_de'];?>
</textarea>
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['lang_en'];?>
">
				<label for="lang_en" class="col-sm-2 control-label span2">Englisch</label>
				<div class="col-sm-6 span6">
					<textarea name="data[lang_en]" id="lang_en" class="form-control" rows="5"
							  style="width:600px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['lang_en'];?>
</textarea>
				</div>
			</div>
		</div>
        <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listTranslations" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        <?php }?>
		<input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
	</form>
<?php }?>
<?php }} ?>
