{if $B_listTranslations}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary ajaxLayer" href="?s=createTranslation"><i class=" icon-plus-sign"></i> Übersetzung
			hinzufügen</a>
		<div class="form-group">
			<input class="form-control" type="text" name="filter[query]" value="{$filter.query}" placeholder="Suche"
				   style="width:200px;">
		</div>
		<button class="btn" id="log-clause"><i class="icon-search"></i> Suchen</button>
		<button name="clear" value="true" id="clearSearchForm" class="btn"><i class="icon-remove-sign"></i> Leeren
		</button>
		<input type="hidden" name="xclear" id="xclear" value="false">
	</form>
    {include file="b_result_counter.tpl"}
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
			<th>Key</th>
			<th><a class="ajaxLink" href="?s={$state}&order=lang_de&sort={$sort}">Deutsch{$sort_icon.lang_de}</a></th>
			<th><a class="ajaxLink" href="?s={$state}&order=lang_en&sort={$sort}">English{$sort_icon.lang_en}</a></th>
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.key}</td>
				<td>{$val.lang_de}</td>
				<td>{$val.lang_en}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editTranslation&id={$val.id}" title="Bearbeiten"
					   class="glyphicon glyphicon-pencil ajaxLayer"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createTranslation || $B_editTranslation}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  id="layer"{if $ajax} style="width:900px; height:600px;"{/if}>
		<div id="form-header">
			<h4>Übersetzung {if $state == "createTranslation"}hinzufügen{else}bearbeiten{/if}</h4>
		</div>

		<div class="col-md-12">
			<div class="form-group{$css.key}">
				<label for="key" class="col-sm-2 control-label span2">Key</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="key" value="{$data.key}" name="data[key]">
				</div>
			</div>
			<div class="form-group{$css.lang_de}">
				<label for="lang_de" class="col-sm-2 control-label span2">Deutsch</label>
				<div class="col-sm-6 span6">
					<textarea name="data[lang_de]" id="lang_de" class="form-control" rows="5"
							  style="width:600px;">{$data.lang_de}</textarea>
				</div>
			</div>
			<div class="form-group{$css.lang_en}">
				<label for="lang_en" class="col-sm-2 control-label span2">Englisch</label>
				<div class="col-sm-6 span6">
					<textarea name="data[lang_en]" id="lang_en" class="form-control" rows="5"
							  style="width:600px;">{$data.lang_en}</textarea>
				</div>
			</div>
		</div>
        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listTranslations" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
	</form>
{/if}
