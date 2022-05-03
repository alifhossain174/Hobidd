<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/b_result_counter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6529552860173bfeabb564-05659374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dae54ad303744d5a0ab3e28a07b7600856bec4f8' => 
    array (
      0 => './inc/views/b_result_counter.tpl',
      1 => 1645984142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6529552860173bfeabb564-05659374',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfeac5515_06990854',
  'variables' => 
  array (
    'page_links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfeac5515_06990854')) {function content_60173bfeac5515_06990854($_smarty_tpl) {?><p style="font-size:10px; padding-top:10px;">Eintrag <?php echo $_smarty_tpl->tpl_vars['page_links']->value['entry_from'];?>
 bis <?php echo $_smarty_tpl->tpl_vars['page_links']->value['entry_to'];?>

	von <?php echo $_smarty_tpl->tpl_vars['page_links']->value['cnt'];?>
</p>
<?php }} ?>
