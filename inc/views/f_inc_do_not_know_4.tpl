<!--Login / Register-->
<section class="log-reg container">

	<div class="post ft" style="margin-top:10px;">
        {$pagedata.content}
	</div>

    {if $msg}<h2 style="color:#fa8f0f; margin-bottom:30px;">{$msg}</h2>{/if}

	<div class="row">
		<!--Login-->
		<div class="col-lg-6 col-md-6 col-sm-6">
			<h2>{$translation.login_offer1}</h2>

			<form method="post" class="login-form" style="margin-top:10px">
				<div class="form-group group">
					<label for="email" class="cf_label">{$translation.email}:</label>
					<input type="email" style="width:350px;" class="form-control xinput" name="auth[email]" id="email"
						   placeholder="Email" required>
				</div>
				<div class="form-group group">
					<label for="password" class="cf_label">{$translation.password}:</label>
					<input type="password" style="width:350px;" class="form-control xinput" name="auth[password]"
						   id="password" placeholder="{$translation.password}" required>
					<!--<a class="help-link" href="#">Passwort vergessen?</a>-->
				</div>
				<div class="checkbox">
					<div style="margin-left:22px;"><input type="checkbox" name="auth[remember]"></div>
					<label class="cf_label" style="margin-top:5px !important;">{$translation.save_login}</label>
				</div>

				<p>
					<a href="/{$lang}/passwort-vergessen/">{$translation.lost_password}</a>
				</p>

				<input class="btn btn-default green_btn" type="submit" value="{$translation.login}"
					   style="margin-top:25px; text-transform:uppercase;">
			</form>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6">
			<h2>{$translation.login_offer2}</h2>

			<p class="ft" style="margin-top:10px">
                {$translation.login_offer3}
			</p>
			<p class="">
				<a href="/{$lang}/anmelden-angebot/" class="btn btn-default green_btn"
				   style="text-transform:uppercase; margin-top:25px;">{$translation.register}</a>

				<a href="/{$lang}/erste-schritte/" class="btn btn-default green_btn"
				   style="background:#fa8f0f;text-transform:uppercase; border-color:#fa8f0f; margin-top:25px; margin-left:10px;">{$translation.first_steps}</a>
			</p>
		</div>
	</div>
</section><!--Login / Register Close-->
