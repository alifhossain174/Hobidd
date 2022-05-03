<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/package.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194631077160173bfee21fc9-99923887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '845aefd4f481578ed102f352560b8ef7c8a2c5a1' => 
    array (
      0 => './inc/views/pages/package.tpl',
      1 => 1645984152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194631077160173bfee21fc9-99923887',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfee95a98_40101363',
  'variables' => 
  array (
    'B_listPackages' => 0,
    'state' => 0,
    'filter' => 0,
    'sort' => 0,
    'sort_icon' => 0,
    'data' => 0,
    'val' => 0,
    'B_createPackage' => 0,
    'B_editPackage' => 0,
    'ajax' => 0,
    'css' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfee95a98_40101363')) {function content_60173bfee95a98_40101363($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_listPackages']->value) {?>
	<form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createPackage"><i class=" icon-plus-sign"></i> Inhalt hinzufügen</a>
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
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['name_de'];?>
</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editPackage&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deletePackage&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
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

<?php if ($_smarty_tpl->tpl_vars['B_createPackage']->value||$_smarty_tpl->tpl_vars['B_editPackage']->value) {?>
	<form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
		  enctype="multipart/form-data" id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:700px; height:400px;"<?php }?>>
		<div id="form-header">
			<h4>Inhalt <?php if ($_smarty_tpl->tpl_vars['state']->value=="createPackage") {?>hinzufügen<?php } else { ?>bearbeiten<?php }?></h4>
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

					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['price'];?>
">
						<label for="price" class="col-sm-2 control-label span2">Preis</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control inputFloat" id="price" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['price'];?>
"
								   name="data[price]">
						</div>
					</div>

					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['commission'];?>
">
						<label for="commission" class="col-sm-2 control-label span2">Provision</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control inputFloat" id="commission"
								   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['commission'];?>
" name="data[commission]">
						</div>
					</div>

					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['raffle_limit'];?>
">
						<label for="raffle_limit" class="col-sm-2 control-label span2">Limit Gewinnspiele</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="raffle_limit" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['raffle_limit'];?>
"
								   name="data[raffle_limit]">
						</div>
					</div>

					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['sell_offer_limit'];?>
">
						<label for="sell_offer_limit" class="col-sm-2 control-label span2">Limit Kaufangebote</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="sell_offer_limit"
								   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sell_offer_limit'];?>
" name="data[sell_offer_limit]">
						</div>
					</div>

					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['auto'];?>
">
						<label for="auto" class="col-sm-2 control-label span2">Automatische Abw.</label>
						<div class="col-sm-6 span6">
							<select class="form-control" id="auto" name="data[auto]">
                                <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_auto'];?>

							</select>
						</div>
					</div>

					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['price_suggestion'];?>
">
						<label for="price_suggestion" class="col-sm-2 control-label span2">Preisvorschläge</label>
						<div class="col-sm-6 span6">
							<select class="form-control" id="auto" name="data[price_suggestion]">
                                <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_price_suggestion'];?>

							</select>
						</div>
					</div>

				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="german">
				<div class="col-md-12">
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['name_de'];?>
">
						<label for="name_de" class="col-sm-2 control-label span2">Name</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name_de" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name_de'];?>
"
								   name="data[name_de]">
						</div>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="english">
				<div class="col-md-12">

					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['name_en'];?>
">
						<label for="name_en" class="col-sm-2 control-label span2">Name</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name_en" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name_en'];?>
"
								   name="data[name_en]">
						</div>
					</div>

				</div>
			</div>
		</div>


        <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listPackages" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        <?php }?>
		<input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
	</form>
<?php }?>
<?php }} ?>
