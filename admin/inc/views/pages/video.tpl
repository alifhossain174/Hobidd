{if $B_listVideos}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createVideo"><i class=" icon-plus-sign"></i> Video hinzufügen</a>
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
			<th style="text-align:center;">Aktiv</th>
			<th style="width:50px;">Aktiv</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.name}
					<!--<a href="?s=createVideo&parent_id={$val.id}" class="ajaxLayer">[Unterkategorie anlegen]</a>--></td>
				<td style="text-align:center;">{$val.active}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editVideo&id={$val.id}" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteVideo&id={$val.id}" id="d{$val.id}" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
            {if $val.childs}
                {foreach from=$val.childs key=key2 item=val2}
					<tr>
						<td style="padding-left:50px;">&raquo; {$val2.name}</td>
						<td style="text-align:center;">{$val2.active}</td>
						<td nowrap="nowrap" style="text-align:center; width:100px;">
							<a href="?s=editVideo&id={$val2.id}" title="Bearbeiten"
							   class="glyphicon glyphicon-pencil"></a>
							<a href="?s=deleteVideo&id={$val2.id}" id="d{$val2.id}" title="Löschen"
							   class="delete glyphicon glyphicon-trash"></a>
						</td>
					</tr>
                {/foreach}
            {/if}
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createVideo || $B_editVideo}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  enctype="multipart/form-data" id="layer"{if $ajax} style="width:700px; height:550px;"{/if}>
		<div id="form-header">
			<h4>Video {if $state == "createVideo"}hinzufügen{else}bearbeiten{/if}</h4>
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

					<div class="form-group">
						<label for="file" class="col-sm-2 control-label span2">Video</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file"> {$data.file} {$files.name}
						</div>
					</div>

					<div class="form-group">
						<label for="file2" class="col-sm-2 control-label span2">Bild</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file2"> {$data.file2} {$files2.name}
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

					<div class="form-group">
						<label for="file_en" class="col-sm-2 control-label span2">Video</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file_en"> {$data.file_en} {$files_en.name}
						</div>
					</div>

					<div class="form-group">
						<label for="file2_en" class="col-sm-2 control-label span2">Bild</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file2_en"> {$data.file2_en} {$files_en2.name}
						</div>
					</div>

				</div>
			</div>
		</div>

        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listVideos" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
	</form>
{/if}
