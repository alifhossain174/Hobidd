{if $B_listCustomers}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary ajaxLayer" href="?s=createCustomer"><i class=" icon-plus-sign"></i> Bieter hinzufügen</a>
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
			<th><a class="ajaxLink" href="?s={$state}&order=id&sort={$sort}">ID{$sort_icon.id}</a></th>
			<th><a class="ajaxLink" href="?s={$state}&order=email&sort={$sort}">Email{$sort_icon.email}</a></th>
			<th><a class="ajaxLink" href="?s={$state}&order=active&sort={$sort}">Aktiv{$sort_icon.active}</a></th>
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.id}</td>
				<td>{$val.email}</td>
				<td>{if $val.active}Ja{else}Nein{/if}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editCustomer&id={$val.id}" title="Bearbeiten"
					   class="ajaxLayer glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteCustomer&id={$val.id}" id="d{$val.id}" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createCustomer || $B_editCustomer}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  id="layer"{if $ajax} style="width:700px; height:400px;"{/if}>
		<div id="form-header">
			<h4>Bieter {if $state == "createCustomer"}hinzufügen{else}bearbeiten{/if}</h4>
		</div>

		<div class="col-md-12">
			<div class="form-group{$css.email}">
				<label for="email" class="col-sm-2 control-label span2">Email</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="email" value="{$data.email}" name="data[email]">
				</div>
			</div>
			<div class="form-group{$css.active}">
				<label for="active" class="col-sm-2 control-label span2">Aktiv</label>
				<div class="col-sm-6 span6">
					<select class="form-control" id="active" name="data[active]">
                        {$data.opt_active}
					</select>
				</div>
			</div>
		</div>
        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listCustomers" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
	</form>
{/if}
