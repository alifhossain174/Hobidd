<section class="log-reg container" style="max-width:1030px; margin-top:28px; padding-left:20px;">

    {if $pagedata.file}
		<a href="{$pagedata.url}"><img src="{$pagedata.file}" style="max-width:958px; margin-left:5px;"></a>
    {/if}

	<div class="post">
        {$pagedata.content}
	</div>

    {if $msg}<h2 style="color:#fa8f0f; margin-top:30px; margin-bottom:30px;">{$msg}</h2>{/if}

    {if !$hide_form}
		<div class="row">
			<!--Login-->
			<div class="col-lg-5 col-md-5 col-sm-5">
				<form method="post" class="login-form">
					<div class="form-group group">
						<label for="password">{$translation.password_8_signs}*</label>
						<input type="password" class="form-control xinput" name="data[password]" id="password"
							   placeholder="{$translation.password}"{if $B_registerForm} required{/if}>
					</div>
					<div class="form-group group">
						<label for="password_repeat">{$translation.repeat_password}*</label>
						<input type="password" class="form-control xinput" name="data[password_repeat]"
							   id="password_repeat"
							   placeholder="{$translation.repeat_password}"{if $B_registerForm} required{/if}>
					</div>
					<input class="btn btn-default green_btn" type="submit" value="{$translation.change_password}">
				</form>
			</div>
		</div>
    {/if}
</section>
