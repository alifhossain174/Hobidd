<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207708850560173bfec34a87-35361459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8edba647fba52688ad560758ef7446bbd20d85a2' => 
    array (
      0 => './inc/views/pages/content.tpl',
      1 => 1645984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207708850560173bfec34a87-35361459',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfecf6549_43862811',
  'variables' => 
  array (
    'B_listContents' => 0,
    'state' => 0,
    'filter' => 0,
    'sort' => 0,
    'sort_icon' => 0,
    'data' => 0,
    'val' => 0,
    'B_createContent' => 0,
    'B_editContent' => 0,
    'ajax' => 0,
    'css' => 0,
    'files' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfecf6549_43862811')) {function content_60173bfecf6549_43862811($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_listContents']->value) {?>
	<form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createContent"><i class=" icon-plus-sign"></i> Inhalt hinzufügen</a>
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
			<th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=page&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Bereich<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['page'];?>
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
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['page'];?>
</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editContent&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteContent&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
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

<?php if ($_smarty_tpl->tpl_vars['B_createContent']->value||$_smarty_tpl->tpl_vars['B_editContent']->value) {?>
	<form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
		  enctype="multipart/form-data" id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:700px; height:400px;"<?php }?>>
		<div id="form-header">
			<h4>Inhalt <?php if ($_smarty_tpl->tpl_vars['state']->value=="createContent") {?>hinzufügen<?php } else { ?>bearbeiten<?php }?></h4>
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
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['page'];?>
">
						<label for="page" class="col-sm-2 control-label span2" style="color:red;">Bereich</label>
						<div class="col-sm-6 span6">
							<select class="form-control" id="active" name="data[page]">
                                <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_page'];?>

							</select>
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
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['title'];?>
">
						<label for="title" class="col-sm-2 control-label span2">Titel</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
" name="data[title]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['content'];?>
">
						<label for="content" class="col-sm-2 control-label span2">Inhalt</label>
						<div class="col-sm-8 span8">
							<textarea class="span8" rows="5" style="height:300px;" name="data[content]"
									  id="mceEditor1"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</textarea>
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['position'];?>
">
						<label for="position" class="col-sm-2 control-label span2">Image</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file"> <?php echo $_smarty_tpl->tpl_vars['data']->value['file'];?>
 <?php echo $_smarty_tpl->tpl_vars['files']->value['name'];?>

						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['url'];?>
">
						<label for="url" class="col-sm-2 control-label span2">Image Link</label>
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
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['title_en'];?>
">
						<label for="title_en" class="col-sm-2 control-label span2">Titel</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="title_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['title_en'];?>
"
								   name="data[title_en]">
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['content_en'];?>
">
						<label for="mceEditor2" class="col-sm-2 control-label span2">Inhalt</label>
						<div class="col-sm-8 span8">
							<textarea class="span8" rows="5" style="height:300px;" name="data[content_en]"
									  id="mceEditor2"><?php echo $_smarty_tpl->tpl_vars['data']->value['content_en'];?>
</textarea>
						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['file_en'];?>
">
						<label for="file_en" class="col-sm-2 control-label span2">Image</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file_en"> <?php echo $_smarty_tpl->tpl_vars['data']->value['file_en'];?>
 <?php echo $_smarty_tpl->tpl_vars['files']->value['name_en'];?>

						</div>
					</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['url_en'];?>
">
						<label for="url_en" class="col-sm-2 control-label span2">Image Link</label>
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
					<a href="?s=listContents" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        <?php }?>
		<input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
	</form>

	<script type="text/javascript">
        $(document).ready(function () {
            initTinymce();
        });
	</script>

<?php }?>
<?php }} ?>
