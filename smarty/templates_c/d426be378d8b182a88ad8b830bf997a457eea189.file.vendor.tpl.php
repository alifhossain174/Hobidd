<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/vendor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53460405860173bfe976c54-20376050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd426be378d8b182a88ad8b830bf997a457eea189' => 
    array (
      0 => './inc/views/pages/vendor.tpl',
      1 => 1645984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53460405860173bfe976c54-20376050',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfea47ab2_98369265',
  'variables' => 
  array (
    'B_listVendors' => 0,
    'state' => 0,
    'filter' => 0,
    'sort' => 0,
    'sort_icon' => 0,
    'data' => 0,
    'val' => 0,
    'B_createVendor' => 0,
    'B_editVendor' => 0,
    'ajax' => 0,
    'css' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfea47ab2_98369265')) {function content_60173bfea47ab2_98369265($_smarty_tpl) {?>﻿<?php if ($_smarty_tpl->tpl_vars['B_listVendors']->value) {?>
	<form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary ajaxLayer" href="?s=createVendor"><i class=" icon-plus-sign"></i> Anbieter hinzufügen</a>
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
&order=company&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Firma<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['company'];?>
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
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['company'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['email'];?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['val']->value['active']) {?>Ja<?php } else { ?>Nein<?php }?></td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editVendor&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Bearbeiten"
					   class="ajaxLayer glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteVendor&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
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

<?php if ($_smarty_tpl->tpl_vars['B_createVendor']->value||$_smarty_tpl->tpl_vars['B_editVendor']->value) {?>
	<form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
		  id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:700px; height:400px;"<?php }?>>
		<div id="form-header">
			<h4>Anbieter <?php if ($_smarty_tpl->tpl_vars['state']->value=="createVendor") {?>hinzufügen<?php } else { ?>bearbeiten<?php }?></h4>
		</div>

		<div class="col-md-12">
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['company'];?>
">
				<label for="company" class="col-sm-2 control-label span2">Firma</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="company" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['company'];?>
" name="data[company]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['street'];?>
">
				<label for="street" class="col-sm-2 control-label span2">Straße</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="company" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['street'];?>
" name="data[street]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['postalcode'];?>
">
				<label for="postalcode" class="col-sm-2 control-label span2">PLZ</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="postalcode" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['postalcode'];?>
"
						   name="data[postalcode]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['location'];?>
">
				<label for="location" class="col-sm-2 control-label span2">Ort</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="location" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['location'];?>
"
						   name="data[location]">
				</div>
			</div>
<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['federal_state'];?>
">
   <label for="federal_state" class="col-sm-2 control-label span2">Federal State de/ Region</label>
   <div class="col-sm-6 span6">
      <input type="text" class="form-control" id="federal_state" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['federal_state'];?>
" name="data[federal_state]">
   </div>
</div>
<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['federal_state'];?>
">
   <label for="federal_state" class="col-sm-2 control-label span2">Federal State en / Region</label>
   <div class="col-sm-6 span6">
      <input type="text" class="form-control" id="federal_state" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['federal_state_en'];?>
" name="data[federal_state_en]">
   </div>
</div>

			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['phone'];?>
">
				<label for="phone" class="col-sm-2 control-label span2">Telefon</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['phone'];?>
" name="data[phone]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['email'];?>
">
				<label for="email" class="col-sm-2 control-label span2">Email</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
" name="data[email]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['website'];?>
">
				<label for="website" class="col-sm-2 control-label span2">Webseite</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="website" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['website'];?>
" name="data[website]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['website'];?>
">
				<label for="website" class="col-sm-2 control-label span2">Alternative URL</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="website_alturl" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['website_alturl'];?>
"
						   name="data[website_alturl]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['uid'];?>
">
				<label for="uid" class="col-sm-2 control-label span2">UID-Nummer</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="uid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['uid'];?>
" name="data[uid]">
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['package_id'];?>
">
				<label for="active" class="col-sm-2 control-label span2">Paket</label>
				<div class="col-sm-6 span6">
					<select class="form-control" id="package_id" name="data[package_id]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_package'];?>

					</select>
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['package_payed'];?>
">
				<label for="package_payed" class="col-sm-2 control-label span2">Paket bezahlt</label>
				<div class="col-sm-6 span6">
					<select class="form-control" id="package_payed" name="data[package_payed]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_payed'];?>

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
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['allow_root_access'];?>
">
				<label for="allow_root_access" class="col-sm-2 control-label span2">Stellvertretung zulassen</label>
				<div class="col-sm-6 span6">
					<select class="form-control" id="allow_root_access" name="data[allow_root_access]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_allow_root_access'];?>

					</select>
				</div>
			</div>
					<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['common_description'];?>
">
				<label for="content" class="col-sm-2 control-label span2">Common description</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:200px; width:450px;" name="data[common_description]"
							  id="common-description"><?php echo $_smarty_tpl->tpl_vars['data']->value['common_description'];?>
</textarea>
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['common_description_en'];?>
">
				<label for="content" class="col-sm-2 control-label span2">Common description EN</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:200px; width:450px;" name="data[common_description_en]"
							  id="common-description-en"><?php echo $_smarty_tpl->tpl_vars['data']->value['common_description_en'];?>
</textarea>
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['content'];?>
">
				<label for="content" class="col-sm-2 control-label span2">Stornobedingungen</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:200px; width:450px;" name="data[cancellation_conditions]"
							  id="content"><?php echo $_smarty_tpl->tpl_vars['data']->value['cancellation_conditions'];?>
</textarea>
				</div>
			</div>
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['content'];?>
">
				<label for="content" class="col-sm-2 control-label span2">Stornobedingungen EN</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:200px; width:450px;" name="data[cancellation_conditions_en]"
							  id="content"><?php echo $_smarty_tpl->tpl_vars['data']->value['cancellation_conditions_en'];?>
</textarea>
				</div>
			</div>
		</div>
        <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listVendors" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        <?php }?>
		<input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
	</form>
<?php }?>
<?php }} ?>
