<?php /* Smarty version Smarty-3.1.17, created on 2022-02-28 15:15:47
         compiled from "./inc/views/b_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164005382601982a36e9cf3-40548443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87f5bc24b37572a1c7b7664a63b354e4286e6c78' => 
    array (
      0 => './inc/views/b_login.tpl',
      1 => 1645984143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164005382601982a36e9cf3-40548443',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_601982a377ae10_87512289',
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_601982a377ae10_87512289')) {function content_601982a377ae10_87512289($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Backend</title>

	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container" style="margin-top:20px;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Backend Login</h3>
				</div>
				<div class="panel-body">
					<form accept-charset="UTF-8" role="form" method="post">

                        <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
							<div class="alert alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</strong>
							</div>
                        <?php }?>

						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Benutzername" name="auth[username]"
									   type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Passwort" name="auth[password]" type="password"
									   value="">
							</div>
							<!--
							<div class="checkbox">
								<label>
									<input name="auth[remember]" type="checkbox" value="true" checked="checked"> Login speichern
								</label>
						 </div>-->
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
<?php }} ?>
