{if $B_listContents}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createContent"><i class=" icon-plus-sign"></i> Inhalt hinzufügen</a>
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
			<th><a class="ajaxLink" href="?s={$state}&order=page&sort={$sort}">Bereich{$sort_icon.page}</a></th>
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.title}</td>
				<td>{$val.page}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editContent&id={$val.id}" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteContent&id={$val.id}" id="d{$val.id}" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createContent || $B_editContent}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  enctype="multipart/form-data" id="layer"{if $ajax} style="width:700px; height:400px;"{/if}>
		<div id="form-header">
			<h4>Inhalt {if $state == "createContent"}hinzufügen{else}bearbeiten{/if}</h4>
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
					<div class="form-group{$css.page}">
						<label for="page" class="col-sm-2 control-label span2" style="color:red;">Bereich</label>
						<div class="col-sm-6 span6">
							<select class="form-control" id="active" name="data[page]">
                                {$data.opt_page}
							</select>
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
					<div class="form-group{$css.alias}">
						<label for="alias" class="col-sm-2 control-label span2" style="color:red;">Alias (Frienly
							URL)</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="alias" value="{$data.alias}" name="data[alias]">
						</div>
					</div>
					<div class="form-group{$css.title}">
						<label for="title" class="col-sm-2 control-label span2">Titel</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name" value="{$data.title}" name="data[title]">
						</div>
					</div>
					<div class="form-group{$css.content}">
						<label for="content" class="col-sm-2 control-label span2">Inhalt</label>
						<div class="col-sm-8 span8">
							<textarea class="span8" rows="5" style="height:300px;" name="data[content]"
									  id="mceEditor1">{$data.content}</textarea>
						</div>
					</div>
					<div class="form-group{$css.position}">
						<label for="position" class="col-sm-2 control-label span2">Image</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file"> {$data.file} {$files.name}
						</div>
					</div>
					<div class="form-group{$css.url}">
						<label for="url" class="col-sm-2 control-label span2">Image Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url" value="{$data.url}" name="data[url]">
						</div>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="english">
				<div class="col-md-12">
					<div class="form-group{$css.alias_en}">
						<label for="alias_en" class="col-sm-2 control-label span2" style="color:red;">Alias (Frienly
							URL)</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="alias_en" value="{$data.alias_en}"
								   name="data[alias_en]">
						</div>
					</div>
					<div class="form-group{$css.title_en}">
						<label for="title_en" class="col-sm-2 control-label span2">Titel</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="title_en" value="{$data.title_en}"
								   name="data[title_en]">
						</div>
					</div>
					<div class="form-group{$css.content_en}">
						<label for="mceEditor2" class="col-sm-2 control-label span2">Inhalt</label>
						<div class="col-sm-8 span8">
							<textarea class="span8" rows="5" style="height:300px;" name="data[content_en]"
									  id="mceEditor2">{$data.content_en}</textarea>
						</div>
					</div>
					<div class="form-group{$css.file_en}">
						<label for="file_en" class="col-sm-2 control-label span2">Image</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file_en"> {$data.file_en} {$files.name_en}
						</div>
					</div>
					<div class="form-group{$css.url_en}">
						<label for="url_en" class="col-sm-2 control-label span2">Image Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url_en" value="{$data.url_en}"
								   name="data[url_en]">
						</div>
					</div>
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
{literal}
	<script type="text/javascript">
        $(document).ready(function () {
            initTinymce();
        });
	</script>
{/literal}
{/if}
