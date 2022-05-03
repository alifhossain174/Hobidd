<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/start_image.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96365228460173bfecfc201-42836673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5da26c7f437f50ed58cefeb1d9d3cdd4b9a21d8a' => 
    array (
      0 => './inc/views/pages/start_image.tpl',
      1 => 1645984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96365228460173bfecfc201-42836673',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfed963e0_18298075',
  'variables' => 
  array (
    'B_listStartImages' => 0,
    'state' => 0,
    'filter' => 0,
    'sort' => 0,
    'sort_icon' => 0,
    'data' => 0,
    'val' => 0,
    'B_createStartImage' => 0,
    'B_editStartImage' => 0,
    'ajax' => 0,
    'css' => 0,
    'files' => 0,
    'files_en' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfed963e0_18298075')) {function content_60173bfed963e0_18298075($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_listStartImages']->value) {?>
	<form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createStartImage"><i class=" icon-plus-sign"></i> Inhalt hinzufügen</a>
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
&order=title&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Titel<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['title'];?>
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
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editStartImage&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteStartImage&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
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

<?php if ($_smarty_tpl->tpl_vars['B_createStartImage']->value||$_smarty_tpl->tpl_vars['B_editStartImage']->value) {?>
	<form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
		  enctype="multipart/form-data" id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:700px; height:400px;"<?php }?>>
		<div id="form-header">
			<h4>Inhalt <?php if ($_smarty_tpl->tpl_vars['state']->value=="createStartImage") {?>hinzufügen<?php } else { ?>bearbeiten<?php }?></h4>
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
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['title'];?>
">
						<label for="title" class="col-sm-2 control-label span2">Titel</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
" name="data[title]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['position'];?>
">
						<label for="position" class="col-sm-2 control-label span2">Position</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['position'];?>
"
								   name="data[position]">
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
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['position'];?>
">
						<label for="position" class="col-sm-2 control-label span2">Image</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file"> <?php echo $_smarty_tpl->tpl_vars['data']->value['file'];?>
 <?php echo $_smarty_tpl->tpl_vars['files']->value['name'];?>

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
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['font_size'];?>
">
						<label for="font_size" class="col-sm-2 control-label span2">Schriftgröße</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="font_size" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['font_size'];?>
"
								   name="data[font_size]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['url'];?>
">
						<label for="url" class="col-sm-2 control-label span2">Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
" name="data[url]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['uid'];?>
">
						<label for="uid" class="col-sm-2 control-label span2">Text</label>
						<div class="col-sm-8 span8">
							<textarea class="span8" rows="5" style="height:300px; width:650px;" name="data[content]"
									  id="content"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</textarea>
						</div>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="english">
				<div class="col-md-12">
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['position'];?>
">
						<label for="position" class="col-sm-2 control-label span2">Image</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file_en"> <?php echo $_smarty_tpl->tpl_vars['data']->value['file_en'];?>
 <?php echo $_smarty_tpl->tpl_vars['files_en']->value['name'];?>

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
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['font_size_en'];?>
">
						<label for="font_size_en" class="col-sm-2 control-label span2">Schriftgröße</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="font_size_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['font_size_en'];?>
"
								   name="data[font_size_en]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['url_en'];?>
">
						<label for="url_en" class="col-sm-2 control-label span2">Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['url_en'];?>
"
								   name="data[url_en]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['content_en'];?>
">
						<label for="content_en" class="col-sm-2 control-label span2">Text</label>
						<div class="col-sm-8 span8">
							<textarea class="span8" rows="5" style="height:300px; width:650px;" name="data[content_en]"
									  id="content"><?php echo $_smarty_tpl->tpl_vars['data']->value['content_en'];?>
</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>

        <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listStartImages" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        <?php }?>
		<input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
	</form>
<?php }?>
<?php }} ?>
