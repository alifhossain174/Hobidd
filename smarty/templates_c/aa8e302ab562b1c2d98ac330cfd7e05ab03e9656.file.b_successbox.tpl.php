<?php /* Smarty version Smarty-3.1.17, created on 2022-03-08 08:57:37
         compiled from "./inc/views/b_successbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6436714006017b444bc32c0-09939668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa8e302ab562b1c2d98ac330cfd7e05ab03e9656' => 
    array (
      0 => './inc/views/b_successbox.tpl',
      1 => 1645984142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6436714006017b444bc32c0-09939668',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6017b444bda922_38243111',
  'variables' => 
  array (
    'msg' => 0,
    'redirect' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6017b444bda922_38243111')) {function content_6017b444bda922_38243111($_smarty_tpl) {?><script>
    $(document).ready(function () {
        $('#ajaxLayer').modal('hide');
        if ($("#ajaxLayer").closest('.ui-dialog').is(':visible')) {
            $('#ajaxLayer').dialog('close');
        }

        $('#successBoxMsg').html('<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
');
        $('#successBox').show();

        
        $("#successBox").ready(function () {
            $("#successBox").delay(3000).fadeOut(500, function () {
            });
        });
        

        <?php if ($_smarty_tpl->tpl_vars['redirect']->value) {?>
        
        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
',
            beforeSend: function () {
                $('#mainContent').html(spinner);
            },
            success: function (data) {
                $('#mainContent').html(data);
            }
        });
        
        <?php }?>


        });

</script>
<?php }} ?>
