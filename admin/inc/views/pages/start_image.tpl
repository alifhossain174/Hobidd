{if $B_listStartImages}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createStartImage"><i class=" icon-plus-sign"></i> Inhalt hinzufügen</a>
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
			<th><a class="ajaxLink" href="?s={$state}&order=title&sort={$sort}">Titel{$sort_icon.title}</a></th>
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.title}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editStartImage&id={$val.id}" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteStartImage&id={$val.id}" id="d{$val.id}" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createStartImage || $B_editStartImage}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  enctype="multipart/form-data" id="layer"{if $ajax} style="width:700px; height:400px;"{/if}>
		<div id="form-header">
			<h4>Inhalt {if $state == "createStartImage"}hinzufügen{else}bearbeiten{/if}</h4>
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
					<div class="form-group{$css.title}">
						<label for="title" class="col-sm-2 control-label span2">Titel</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name" value="{$data.title}" name="data[title]">
						</div>
					</div>
					<div class="form-group{$css.position}">
						<label for="position" class="col-sm-2 control-label span2">Position</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name" value="{$data.position}"
								   name="data[position]">
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
					<div class="form-group{$css.position}">
						<label for="position" class="col-sm-2 control-label span2">Image</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file"> {$data.file} {$files.name}
						</div>
					</div>
					<div class="form-group{$css.color}">
						<label for="color" class="col-sm-2 control-label span2">Farbcode</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="color" value="{$data.color}" name="data[color]">
						</div>
					</div>
					<div class="form-group{$css.font_size}">
						<label for="font_size" class="col-sm-2 control-label span2">Schriftgröße</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="font_size" value="{$data.font_size}"
								   name="data[font_size]">
						</div>
					</div>
					<div class="form-group{$css.url}">
						<label for="url" class="col-sm-2 control-label span2">Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url" value="{$data.url}" name="data[url]">
						</div>
					</div>
					<div class="form-group{$css.uid}">
						<label for="uid" class="col-sm-2 control-label span2">Text</label>
						<div class="col-sm-8 span8">
							<textarea class="span8" rows="5" style="height:300px; width:650px;" name="data[content]"
									  id="content">{$data.content}</textarea>
						</div>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="english">
				<div class="col-md-12">
					<div class="form-group{$css.position}">
						<label for="position" class="col-sm-2 control-label span2">Image</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file_en"> {$data.file_en} {$files_en.name}
						</div>
					</div>
					<div class="form-group{$css.color_en}">
						<label for="color_en" class="col-sm-2 control-label span2">Farbcode</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="color_en" value="{$data.color_en}"
								   name="data[color_en]">
						</div>
					</div>
					<div class="form-group{$css.font_size_en}">
						<label for="font_size_en" class="col-sm-2 control-label span2">Schriftgröße</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="font_size_en" value="{$data.font_size_en}"
								   name="data[font_size_en]">
						</div>
					</div>
					<div class="form-group{$css.url_en}">
						<label for="url_en" class="col-sm-2 control-label span2">Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url_en" value="{$data.url_en}"
								   name="data[url_en]">
						</div>
					</div>
					<div class="form-group{$css.content_en}">
						<label for="content_en" class="col-sm-2 control-label span2">Text</label>
						<div class="col-sm-8 span8">
							<textarea class="span8" rows="5" style="height:300px; width:650px;" name="data[content_en]"
									  id="content">{$data.content_en}</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>

        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listStartImages" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
	</form>
{/if}
