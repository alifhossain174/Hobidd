<div class="container">
	<div class="row">
		<div class="col-md-8">
            {if $msg}
				<div class="alert alert-danger" role="alert">
                    {$msg}
				</div>
            {/if}
		</div>
	</div>

    {if $pagedata.content}
		<div class="row">
			<div class="col">
                {$pagedata.content}
			</div>
		</div>
    {/if}

    {if !$logged_in}
	<div class="row">
		<div class="col-md-6">
			<h2>{$translation.login_vendor}</h2>
			<br />
			<form method="post" action="/{$lang}/login/">
                {if $redirect_to}
					<input type="hidden" name="redirect_to" value="{$redirect_to}"/>
                {/if}
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">{$translation.email}*</span>
					</div>
					<input type="text" class="form-control" placeholder="" aria-label="Username"
						   aria-describedby="basic-addon1" name="auth[email]" required>
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon2">{$translation.password}*</span>
					</div>
					<input type="password" class="form-control" placeholder="" aria-label="Password"
						   aria-describedby="basic-addon2" name="auth[password]" required>
				</div>
				<br>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="rememberCheck">
					<label class="form-check-label" for="rememberCheck"
						   name="auth[remember]">{$translation.save_login}</label>
				</div>

				<button type="submit" class="btn btn-success">{$translation.login}</button>
			</form>
			<br>
			<a href="/{$lang}/passwort-vergessen/"
			   style="margin-top: 10px;">{$translation.lost_password}</a>
		</div>

		<div class="col-md-6">
			<h2>{$translation.text_register_vendor1}</h2>
			<br />
			<div class="mb-3">{$translation.text_register_vendor2}</div>
			<a href="/{$lang}/paketauswahl/">
				<button type="button" class="btn btn-success">{$translation.register}</button>
			</a>
		</div>
	</div>
	{/if}

</div>
