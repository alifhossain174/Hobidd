<div class="container">
	<div class="row">
		<div class="col">
            {if $msg}
				<div class="alert alert-danger" role="alert">
                    {$msg}
				</div>
            {/if}
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 pr-md-5">
			<h1>{$translation.text_register_customer1}</h1>
            {$translation.text_register_customer2}

			<form method="post" action="/{$lang}/user-registration/">
				<div class="input-group mt-3 mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">{$translation.email}*</span>
					</div>
					<input type="text" class="form-control" placeholder="" aria-label="Username"
						   aria-describedby="basic-addon1" name="xdata[email]" value="{$xdata.email}" required>
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon2">{$translation.password}*</span>
					</div>
					<input type="password" class="form-control" placeholder="" aria-label="Password"
						   aria-describedby="basic-addon2" name="xdata[password]" required>
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon3">{$translation.repeat_password}*</span>
					</div>
					<input type="password" class="form-control" placeholder="" aria-label="Password"
						   aria-describedby="basic-addon2" name="xdata[password2]" required>
				</div>

				<div class="form-check mb-3">
					<input type="checkbox" class="form-check-input" id="legalCheckbox1" name="xdata[legalCheckbox1]">
					<label class="form-check-label"
						   for="legalCheckbox1">{$translation.userregistration_legalcheckbox1}</label>
				</div>

				<button type="submit" class="btn btn-success">{$translation.register}</button>
			</form>
		</div>
		<div class="col-md-4">
			&nbsp;
		</div>
	</div>
</div>
