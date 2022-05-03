<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/keyword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48555741560173bfed9c118-13354818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a423ac9cd07450c72fff9abea78cb0227c9093a1' => 
    array (
      0 => './inc/views/pages/keyword.tpl',
      1 => 1645984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48555741560173bfed9c118-13354818',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfedba3b8_68208748',
  'variables' => 
  array (
    'B_editKeywordList' => 0,
    'ajax' => 0,
    'state' => 0,
    'data' => 0,
    'css' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfedba3b8_68208748')) {function content_60173bfedba3b8_68208748($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['B_editKeywordList']->value) {?>
	<form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
		  id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:700px; height:400px;"<?php }?>>
		<div id="form-header">
			<h4>Keywords bearbeiten</h4>
		</div>

		<div class="col-md-12">
			<div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['uid'];?>
">
				<label for="uid" class="col-sm-2 control-label span2">Keyword, 1 pro Zeile</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:650px;" name="data[content]"
							  id="content"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</textarea>
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
<?php }?>
<?php }} ?>
