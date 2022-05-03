<?php /* Smarty version Smarty-3.1.17, created on 2022-04-12 17:55:12
         compiled from "./inc/views/f_inc_contact_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:553333642601761b3450912-75437511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa003f5f46e2756f95f4380bd139e7e4d6968af2' => 
    array (
      0 => './inc/views/f_inc_contact_form.tpl',
      1 => 1647264113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '553333642601761b3450912-75437511',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_601761b34f9416_70106523',
  'variables' => 
  array (
    'pagedata' => 0,
    'msg' => 0,
    'B_success' => 0,
    'translation' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_601761b34f9416_70106523')) {function content_601761b34f9416_70106523($_smarty_tpl) {?><br>
<div class="container">
	<div class="row">
		<div class="col-lg">
            <?php echo $_smarty_tpl->tpl_vars['pagedata']->value['content'];?>


            <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
				<div class="alert alert-success mt-3" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

				</div>
            <?php }?>

            <?php if (!$_smarty_tpl->tpl_vars['B_success']->value) {?>
				<form method="post" style="margin-top:25px;">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><?php echo $_smarty_tpl->tpl_vars['translation']->value['name'];?>
*</span>
						</div>
						<input type="text" class="form-control" placeholder="" aria-label="Username"
							   aria-describedby="basic-addon1" name="data[name]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
" required>
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon2"><?php echo $_smarty_tpl->tpl_vars['translation']->value['email'];?>
*</span>
						</div>
						<input type="text" class="form-control" placeholder="" aria-label="Email"
							   aria-describedby="basic-addon2" name="data[email]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
" required>
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3"><?php echo $_smarty_tpl->tpl_vars['translation']->value['message'];?>
*</span>
						</div>
						<textarea rows="10" class="form-control" aria-label="Content" name="data[content]"
								  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
" required></textarea>
					</div>

					<div class="g-recaptcha" data-sitekey="6Ld2phMTAAAAANjahu7CaXFbOSJVeabrTbLv4Flq"></div>

					<button type="submit" class="btn btn-success mt-4"><?php echo $_smarty_tpl->tpl_vars['translation']->value['send_message'];?>
</button>
				</form>
            <?php }?>
		</div>
		<div class="col-lg">
			<h2>hobidd wird zur Verfügung gestellt von</h2>

			<span class="text-bold">PEPPERMINDED&nbsp;</span>MARKETING SOLUTIONS<br/><br>
			DR FRANZ-REINPRECHTWEG 5<br/>
			9020 KLAGENFURT AM WS<br/>
			AUSTRIA<br/><br>
			UID ATU45471109<br>
			<br/>
			<a href="office@pepperminded.com">office@pepperminded.com</a><br/>


            
		</div>
	</div>
<?php }} ?>
