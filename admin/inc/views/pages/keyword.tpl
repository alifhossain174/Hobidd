{if $B_editKeywordList}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  id="layer"{if $ajax} style="width:700px; height:400px;"{/if}>
		<div id="form-header">
			<h4>Keywords bearbeiten</h4>
		</div>

		<div class="col-md-12">
			<div class="form-group{$css.uid}">
				<label for="uid" class="col-sm-2 control-label span2">Keyword, 1 pro Zeile</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:650px;" name="data[content]"
							  id="content">{$data.content}</textarea>
				</div>
			</div>
		</div>
        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listContents" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
	</form>
{/if}
