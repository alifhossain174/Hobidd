<section class="log-reg container">

	<div class="ft" style="margin-top:20px; margin-bottom:20px;">
        {$pagedata.content}
	</div>

    {if $msg}<h2 style="color:#fa8f0f; margin-top:30px; margin-bottom:30px;">{$msg}</h2>{/if}

    {if !$B_success}
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5">
				<form method="post" class="login-form">
					<div class="form-group group">
						<label for="content">Beschreibung*</label>
						<textarea class="form-control xinput" required rows="10" style="width:675px;" cols="50"
								  placeholder="Beschreibung" name="data[content]">{$data.content}</textarea>
					</div>

					<div class="g-recaptcha" data-sitekey="6Ld2phMTAAAAANjahu7CaXFbOSJVeabrTbLv4Flq"></div>

					<input style="margin-top:25px;" class="btn btn-default green_btn" type="submit"
						   value="Daten absenden">
				</form>
			</div>
		</div>
    {/if}
</section>
