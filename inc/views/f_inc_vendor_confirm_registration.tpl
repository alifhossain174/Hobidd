<div class="container">
	<div class="row">
		<div class="col">

            {$data.content}

			<h2 class="title">{$translation.enter_activation_code}</h2>
			<form method="post" class="login-form" action="" style="margin-top:20px;">
				<div class="form-group">
					<label for="company"></label>
					<input type="text" class="form-control" style="text-transform:uppercase; max-width:230px;"
						   name="code" id="code" placeholder="" value="" required>
				</div>
				<button type="submit" class="btn btn-success mt-3 mb-5">{$translation.activate_account}</button>
			</form>
		</div>
	</div>
</div>
