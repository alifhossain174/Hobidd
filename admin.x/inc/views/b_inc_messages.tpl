{if $B_error}
	<div class="alert alert-danger fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strongFehler:
		</strong> {$msg}
	</div>
{/if}

{if $B_success}
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		$msg}
	</div>
{/if}
