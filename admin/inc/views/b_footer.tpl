{if $B_del}
	<form action="{$form_action}" method="post">
		<div class="alert-message block-message error">
			<h3>Wirklich löschen?</h3>
			<div class="alert-actions">
				<input type="hidden" name="data[id]" value="{$id}"/>
				<input type="submit" class="btn-u btn-u-red" value="Löschen">
				<a class="btn-u btn-u-default" href="{$form_back}">Abbrechen</a>
			</div>
		</div>
	</form>
{/if}

</div><!-- mainContent -->
</div><!-- /.container -->
</body>
</html>
