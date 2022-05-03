{if $B_listFacilities}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createFacility"><i class=" icon-plus-sign"></i> Ausstattung hinzufügen</a>
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
			<th><a class="ajaxLink" href="?s={$state}&order=name&sort={$sort}">Name{$sort_icon.name}</a></th>
			<th style="text-align:center;width:50px;">Icon</th>
			<th style="text-align:center;">Aktiv</th>
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.name}
				<td style="text-align:center;">
					<i class="fas fa-{$val.icon}"></i>
				</td>
				<td style="text-align:center;">{$val.active}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editFacility&id={$val.id}" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteFacility&id={$val.id}" id="d{$val.id}" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createFacility || $B_editFacility}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  enctype="multipart/form-data" id="layer"{if $ajax} style="width:700px; height:550px;"{/if}>
		<div id="form-header">
			<h4>Ausstattung {if $state == "createFacility"}hinzufügen{else}bearbeiten{/if}</h4>
		</div>

		<ul class="nav nav-tabs" role="tablist" style="margin-bottom:20px;">
			<li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Allgemein</a>
			</li>
			<li role="presentation"><a href="#german" aria-controls="german" role="tab" data-toggle="tab">Deutsch</a>
			</li>
			<li role="presentation"><a href="#english" aria-controls="english" role="tab" data-toggle="tab">Englisch</a>
			</li>
		</ul>

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="basic">

				<div class="col-md-12">
					<div class="form-group{$css.sort}">
						<label for="sort" class="col-sm-2 control-label span2">Sortierzahl</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="sort" value="{$data.sort}" name="data[sort]">
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
			</div>

			<div role="tabpanel" class="tab-pane" id="german">
				<div class="col-md-12">
					<div class="form-group{$css.name}">
						<label for="name" class="col-sm-2 control-label span2">Bezeichnung</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="name" value="{$data.name}" name="data[name]">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group{$css.icon}">
						<label for="name" class="col-sm-2 control-label span2">Icon</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="icon" value="{$data.icon}" name="data[icon]">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 span2">
						</div>
						<div class="col-sm-6 span6">
							Icons findet man hier:<br />
							<a href="https://fontawesome.com/icons?d=gallery" target="_blank">
								https://fontawesome.com/icons?d=gallery
							</a>
						</div>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="english">
				<div class="col-md-12">
					<div class="form-group{$css.name_en}">
						<label for="name_en" class="col-sm-2 control-label span2">Bezeichnung</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="name_en" value="{$data.name_en}"
								   name="data[name_en]">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group{$css.icon_en}">
						<label for="name" class="col-sm-2 control-label span2">Icon</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="icon_en" value="{$data.icon_en}" name="data[icon_en]">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 span2">
						</div>
						<div class="col-sm-6 span6">
							Icons findet man hier:<br />
							<a href="https://fontawesome.com/icons?d=gallery" target="_blank">
								https://fontawesome.com/icons?d=gallery
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listFacilities" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
	</form>
{/if}
