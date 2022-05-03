<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:24
         compiled from "./inc/views/pages/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188435820660173bfe7f1178-01429250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79c7ef247ffb2c0d60020291816c1c4db6b037ef' => 
    array (
      0 => './inc/views/pages/category.tpl',
      1 => 1645984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188435820660173bfe7f1178-01429250',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfe8a70d5_27975589',
  'variables' => 
  array (
    'B_listCategories' => 0,
    'state' => 0,
    'filter' => 0,
    'sort' => 0,
    'sort_icon' => 0,
    'data' => 0,
    'val' => 0,
    'val2' => 0,
    'B_createCategory' => 0,
    'B_editCategory' => 0,
    'ajax' => 0,
    'css' => 0,
    'files2' => 0,
    'files' => 0,
    'files_en' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfe8a70d5_27975589')) {function content_60173bfe8a70d5_27975589($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_listCategories']->value) {?>
	<form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createCategory"><i class=" icon-plus-sign"></i> Kategorie hinzufügen</a>
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

					<!--<a href="?s=createCategory&parent_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="ajaxLayer">[Unterkategorie anlegen]</a>--></td>
				<td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['val']->value['active'];?>
</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editCategory&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteCategory&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" id="d<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
            <?php if ($_smarty_tpl->tpl_vars['val']->value['childs']) {?>
                <?php  $_smarty_tpl->tpl_vars['val2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val2']->_loop = false;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['val']->value['childs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val2']->key => $_smarty_tpl->tpl_vars['val2']->value) {
$_smarty_tpl->tpl_vars['val2']->_loop = true;
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['val2']->key;
?>
					<tr>
						<td style="padding-left:50px;">&raquo; <?php echo $_smarty_tpl->tpl_vars['val2']->value['name'];?>
</td>
						<td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['val2']->value['active'];?>
</td>
						<td nowrap="nowrap" style="text-align:center; width:100px;">
							<a href="?s=editCategory&id=<?php echo $_smarty_tpl->tpl_vars['val2']->value['id'];?>
" title="Bearbeiten"
							   class="glyphicon glyphicon-pencil"></a>
							<a href="?s=deleteCategory&id=<?php echo $_smarty_tpl->tpl_vars['val2']->value['id'];?>
" id="d<?php echo $_smarty_tpl->tpl_vars['val2']->value['id'];?>
" title="Löschen"
							   class="delete glyphicon glyphicon-trash"></a>
						</td>
					</tr>
                <?php } ?>
            <?php }?>
        <?php } ?>
		</tbody>
	</table>
    <?php echo $_smarty_tpl->getSubTemplate ("b_page_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_createCategory']->value||$_smarty_tpl->tpl_vars['B_editCategory']->value) {?>
	<form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
		  enctype="multipart/form-data" id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:700px; height:550px;"<?php }?>>
		<div id="form-header">
			<h4>Kategorie <?php if ($_smarty_tpl->tpl_vars['state']->value=="createCategory") {?>hinzufügen<?php } else { ?>bearbeiten<?php }?></h4>
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
					<!--<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['content'];?>
">
			    <label for="content" class="col-sm-2 control-label span2">Beschreibung</label>
			    <div class="col-sm-6 span6">
			    	<textarea class="form-control" rows="11" id="content" name="data[content]"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</textarea>
			    </div>
			  </div>-->
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
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['alias'];?>
">
						<label for="alias" class="col-sm-2 control-label span2" style="color:red;">Alias (Frienly
							URL)</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="alias" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['alias'];?>
" name="data[alias]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['name'];?>
">
						<label for="name" class="col-sm-2 control-label span2">Bezeichnung</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
" name="data[name]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['banner2'];?>
">
						<label for="banner2" class="col-sm-2 control-label span2">Banner oben (Breite: 958px)</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file2"> <?php echo $_smarty_tpl->tpl_vars['data']->value['file2'];?>
 <?php echo $_smarty_tpl->tpl_vars['files2']->value['name'];?>

						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['color'];?>
">
						<label for="color" class="col-sm-2 control-label span2">Farbcode</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="color" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['color'];?>
" name="data[color]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['url2'];?>
">
						<label for="url2" class="col-sm-2 control-label span2">Banner oben Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url2" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['url2'];?>
" name="data[url2]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['banner'];?>
">
						<label for="banner" class="col-sm-2 control-label span2">Banner links (470px x 590px)</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file"> <?php echo $_smarty_tpl->tpl_vars['data']->value['file'];?>
 <?php echo $_smarty_tpl->tpl_vars['files']->value['name'];?>

						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['url'];?>
">
						<label for="url" class="col-sm-2 control-label span2">Banner links Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
" name="data[url]">
						</div>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="english">
				<div class="col-md-12">
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['alias_en'];?>
">
						<label for="alias_en" class="col-sm-2 control-label span2" style="color:red;">Alias (Frienly
							URL)</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="alias_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['alias_en'];?>
"
								   name="data[alias_en]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['name_en'];?>
">
						<label for="name_en" class="col-sm-2 control-label span2">Bezeichnung</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="name_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name_en'];?>
"
								   name="data[name_en]">
						</div>
					</div>
					<div class="form-group">
						<label for="banner2" class="col-sm-2 control-label span2">Banner oben (Breite: 958px)</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file2_en"> <?php echo $_smarty_tpl->tpl_vars['data']->value['file2_en'];?>
 <?php echo $_smarty_tpl->tpl_vars['files2']->value['name_en'];?>

						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['color_en'];?>
">
						<label for="color_en" class="col-sm-2 control-label span2">Farbcode</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="color_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['color_en'];?>
"
								   name="data[color_en]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['url2_en'];?>
">
						<label for="url2_en" class="col-sm-2 control-label span2">Banner oben Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url2_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['url2_en'];?>
"
								   name="data[url2_en]">
						</div>
					</div>
					<div class="form-group">
						<label for="url2_en" class="col-sm-2 control-label span2">Banner links (470px x 590px)</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file_en"> <?php echo $_smarty_tpl->tpl_vars['data']->value['file_en'];?>
 <?php echo $_smarty_tpl->tpl_vars['files_en']->value['name'];?>

						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['url_en'];?>
">
						<label for="url_en" class="col-sm-2 control-label span2">Banner links Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['url_en'];?>
"
								   name="data[url_en]">
						</div>
					</div>
				</div>
			</div>
		</div>

        <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listCategories" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        <?php }?>
		<input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
		<input type="hidden" name="data[parent_id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['parent_id'];?>
">
	</form>
<?php }?>
<?php }} ?>
