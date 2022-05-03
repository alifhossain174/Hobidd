<section class="log-reg container">

	<div class="post">
        {$pagedata.content}
	</div>

    {if $msg}<h2 style="color:#fa8f0f; margin-top:30px; margin-bottom:30px;">{$msg}</h2>{/if}

	<div class="row" style="margin-top:25px;">
		<!--Login-->
		<div class="col-lg-5 col-md-5 col-sm-5">
			<form method="post" class="login-form">
				<div class="form-group group">
					<label for="email">{$translation.email}</label>
					<input type="email" class="form-control xinput" name="data[email]" id="email"
						   placeholder="{$translation.email}" required>
				</div>
				<input class="btn btn-default green_btn" type="submit" value="{$translation.request_new_password}">
			</form>
		</div>
	</div>
</section>
