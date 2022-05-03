<?php /* Smarty version Smarty-3.1.17, created on 2022-04-11 17:43:25
         compiled from "./inc/views/f_inc_vendor_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1323093892614efd20ae7e05-48276544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67a41aed2b53c083dfe1a8361c40e07a5c663e97' => 
    array (
      0 => './inc/views/f_inc_vendor_profile.tpl',
      1 => 1647264094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1323093892614efd20ae7e05-48276544',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614efd20bcfd02_22187037',
  'variables' => 
  array (
    'vendor' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614efd20bcfd02_22187037')) {function content_614efd20bcfd02_22187037($_smarty_tpl) {?><div class="card">
	<div class="card-header">
		<h4><?php echo $_smarty_tpl->tpl_vars['vendor']->value['company'];?>
</h4>
	</div>
	<div class="card-body">
		<p class="card-text">
            <?php echo $_smarty_tpl->tpl_vars['vendor']->value['street'];?>
<br/>
            <?php echo $_smarty_tpl->tpl_vars['vendor']->value['postalcode'];?>
 <?php echo $_smarty_tpl->tpl_vars['vendor']->value['location'];?>
<br/>
            <?php echo $_smarty_tpl->tpl_vars['vendor']->value['country'];?>
<br/>
		</p>
	</div>
	<div class="card-footer">
        <?php if ($_smarty_tpl->tpl_vars['vendor']->value['phone']) {?><a href="tel:<?php echo $_smarty_tpl->tpl_vars['vendor']->value['phone'];?>
"><?php echo $_smarty_tpl->tpl_vars['vendor']->value['phone'];?>
</a><?php }?><br/>
		<a href="mailto:<?php echo $_smarty_tpl->tpl_vars['vendor']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['vendor']->value['email'];?>
</a><br/>

        <?php if ($_smarty_tpl->tpl_vars['vendor']->value['website_alturl']) {?>
			<a href="http://<?php echo $_smarty_tpl->tpl_vars['vendor']->value['website_alturl'];?>
"><?php echo $_smarty_tpl->tpl_vars['vendor']->value['website'];?>
</a>
        <?php } else { ?>
			<a href="http://<?php echo $_smarty_tpl->tpl_vars['vendor']->value['website'];?>
"><?php echo $_smarty_tpl->tpl_vars['vendor']->value['website'];?>
</a>
        <?php }?>
	</div>
</div>
<?php }} ?>
