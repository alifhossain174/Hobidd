<section class="log-reg container">

	<h3>{$add.title}</h3>

	<div style="margin-bottom:30px;">
        {$pagedata.content}
	</div>

    {if $msg}<h2 style="color:#fa8f0f; margin-top:30px; margin-bottom:30px;">{$msg}</h2>{/if}

    {if !$B_success}
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5">
				<form method="post" class="login-form">
					<div class="form-group group">
						<label for="name">{$translation.name}*</label>
						<input type="text" class="form-control xinput" name="data[name]" id="name" placeholder="Name"
							   value="{$data.name}" required>
					</div>
					<div class="form-group group">
						<label for="email">{$translation.email}*</label>
						<input type="email" class="form-control xinput" name="data[email]" id="email"
							   placeholder="Email" value="{$data.email}" required>
					</div>
					<div class="form-group group">
						<label for="content">{$translation.message}*</label>
						<textarea class="form-control xinput" required rows="10" cols="50"
								  placeholder="{$translation.message}" name="data[content]">{$data.content}</textarea>
					</div>

					<div class="g-recaptcha" data-sitekey="6Ld2phMTAAAAANjahu7CaXFbOSJVeabrTbLv4Flq"></div>

					<input style="margin-top:25px;" class="btn btn-default green_btn" type="submit"
						   value="{$translation.send_message}">
				</form>
			</div>
		</div>
    {/if}
</section>
