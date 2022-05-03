<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/facility.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177612624560173bfe8ad120-67415527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33c1d5e515e4b13e21246381fd12292273fe5e42' => 
    array (
      0 => './inc/views/pages/facility.tpl',
      1 => 1645984154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177612624560173bfe8ad120-67415527',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfe90b1d9_45503855',
  'variables' => 
  array (
    'B_listFacilities' => 0,
    'state' => 0,
    'filter' => 0,
    'sort' => 0,
    'sort_icon' => 0,
    'data' => 0,
    'val' => 0,
    'B_createFacility' => 0,
    'B_editFacility' => 0,
    'ajax' => 0,
    'css' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfe90b1d9_45503855')) {function content_60173bfe90b1d9_45503855($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_listFacilities']->value) {?>
	<form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createFacility"><i class=" icon-plus-sign"></i> Ausstattung hinzufügen</a>
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
&order=name&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Name<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['name'];?>
</a></th>
			<th style="text-align:center;width:50px;">Icon</th>
			<th style="text-align:center;">Aktiv</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>

				<td style="text-align:center;">
					<i class="fas fa-<?php echo $_smarty_tpl->tpl_vars['val']->value['icon'];?>
"></i>
				</td>
				<td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['val']->value['active'];?>
</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editFacility&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteFacility&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
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

<?php if ($_smarty_tpl->tpl_vars['B_createFacility']->value||$_smarty_tpl->tpl_vars['B_editFacility']->value) {?>
	<form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
		  enctype="multipart/form-data" id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:700px; height:550px;"<?php }?>>
		<div id="form-header">
			<h4>Ausstattung <?php if ($_smarty_tpl->tpl_vars['state']->value=="createFacility") {?>hinzufügen<?php } else { ?>bearbeiten<?php }?></h4>
		</div>

		<ul class="nav nav-tabs" role="tablist" style="margin-bottom:20px;">
			<li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Allgemein</a>
			</li>
			<li role="presentation"><a href="#german" aria-controls="german" role="tab" data-toggle="tab">Deutsch</a>
			</li>
			<li role="presentation"><a href="#english" aria-controls="english" role="tab" data-toggle="tab">Englisch</a>
			</li>
		</ul>

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="basic">

				<div class="col-md-12">
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['sort'];?>
">
						<label for="sort" class="col-sm-2 control-label span2">Sortierzahl</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="sort" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sort'];?>
" name="data[sort]">
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
			</div>

			<div role="tabpanel" class="tab-pane" id="german">
				<div class="col-md-12">
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['name'];?>
">
						<label for="name" class="col-sm-2 control-label span2">Bezeichnung</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
" name="data[name]">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['icon'];?>
">
						<label for="name" class="col-sm-2 control-label span2">Icon</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="icon" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['icon'];?>
" name="data[icon]">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 span2">
						</div>
						<div class="col-sm-6 span6">
							Icons findet man hier:<br />
							<a href="https://fontawesome.com/icons?d=gallery" target="_blank">
								https://fontawesome.com/icons?d=gallery
							</a>
						</div>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="english">
				<div class="col-md-12">
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['name_en'];?>
">
						<label for="name_en" class="col-sm-2 control-label span2">Bezeichnung</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="name_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name_en'];?>
"
								   name="data[name_en]">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['icon_en'];?>
">
						<label for="name" class="col-sm-2 control-label span2">Icon</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="icon_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['icon_en'];?>
" name="data[icon_en]">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 span2">
						</div>
						<div class="col-sm-6 span6">
							Icons findet man hier:<br />
							<a href="https://fontawesome.com/icons?d=gallery" target="_blank">
								https://fontawesome.com/icons?d=gallery
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

        <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listFacilities" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        <?php }?>
		<input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
	</form>
<?php }?>
<?php }} ?>
