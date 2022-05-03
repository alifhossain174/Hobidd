{if !$ajax}
    {include file="b_header.tpl"}
{/if}

{if $B_acl_error}
	<div class="modal-header" id="modal-header">
		<h2>Zugriffsverletzung</h2>
	</div>
	<div id="layer"{if $ajax} style="width:800px; height:30px;"{/if}>
		<div class="alert alert-error">
			<strong>Fehler:</strong> Zugriff verweigert
		</div>
	</div>
{/if}

{if !$ajax}
    {include file="b_footer.tpl"}
{/if}
