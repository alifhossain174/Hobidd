{if $B_listUsers}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
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
			<th><a class="ajaxLink" href="?s={$state}&order=lastname&sort={$sort}">Nachname{$sort_icon.lastname}</a>
			</th>
			<th><a class="ajaxLink" href="?s={$state}&order=firstname&sort={$sort}">Vorname{$sort_icon.firstname}</a>
			</th>
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.lastname}</td>
				<td>{$val.firstname}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editUser&id={$val.id}" title="Bearbeiten"
					   class="glyphicon glyphicon-pencil ajaxLayer"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createUser || $B_editUser}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  id="layer"{if $ajax} style="width:700px; height:400px;"{/if}>
		<div id="form-header">
			<h4>Benutzer {if $state == "createUser"}hinzufügen{else}bearbeiten{/if}</h4>
		</div>

		<div class="col-md-12">
			<div class="form-group{$css.firstname}">
				<label for="firstname" class="col-sm-2 control-label span2">Vorname</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="firstname" value="{$data.firstname}"
						   name="data[firstname]">
				</div>
			</div>
			<div class="form-group{$css.lastname}">
				<label for="lastname" class="col-sm-2 control-label span2">Nachname</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="lastname" value="{$data.lastname}"
						   name="data[lastname]">
				</div>
			</div>
			<div class="form-group{$css.username}">
				<label for="username" class="col-sm-2 control-label span2">Username</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="username" value="{$data.username}"
						   name="data[username]">
				</div>
			</div>
			<div class="form-group{$css.password}">
				<label for="password" class="col-sm-2 control-label span2">Passwort</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="password" value="{$data.password}"
						   name="data[password]">
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
					<a href="?s=listUsers" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
	</form>
{/if}
