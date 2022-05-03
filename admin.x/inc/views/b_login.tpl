<!DOCTYPE html>
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

                        {if $msg}
							<div class="alert alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>{$msg}</strong>
							</div>
                        {/if}

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
