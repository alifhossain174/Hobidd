{if $B_listCategories}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createCategory"><i class=" icon-plus-sign"></i> Kategorie hinzufügen</a>
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
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.name}
					<!--<a href="?s=createCategory&parent_id={$val.id}" class="ajaxLayer">[Unterkategorie anlegen]</a>--></td>
				<td style="text-align:center;">{$val.active}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editCategory&id={$val.id}" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteCategory&id={$val.id}" id="d{$val.id}" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
            {if $val.childs}
                {foreach from=$val.childs key=key2 item=val2}
					<tr>
						<td style="padding-left:50px;">&raquo; {$val2.name}</td>
						<td style="text-align:center;">{$val2.active}</td>
						<td nowrap="nowrap" style="text-align:center; width:100px;">
							<a href="?s=editCategory&id={$val2.id}" title="Bearbeiten"
							   class="glyphicon glyphicon-pencil"></a>
							<a href="?s=deleteCategory&id={$val2.id}" id="d{$val2.id}" title="Löschen"
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

{if $B_createCategory || $B_editCategory}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  enctype="multipart/form-data" id="layer"{if $ajax} style="width:700px; height:550px;"{/if}>
		<div id="form-header">
			<h4>Kategorie {if $state == "createCategory"}hinzufügen{else}bearbeiten{/if}</h4>
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
					<!--<div class="form-group{$css.content}">
			    <label for="content" class="col-sm-2 control-label span2">Beschreibung</label>
			    <div class="col-sm-6 span6">
			    	<textarea class="form-control" rows="11" id="content" name="data[content]">{$data.content}</textarea>
			    </div>
			  </div>-->
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
					<div class="form-group{$css.alias}">
						<label for="alias" class="col-sm-2 control-label span2" style="color:red;">Alias (Frienly
							URL)</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="alias" value="{$data.alias}" name="data[alias]">
						</div>
					</div>
					<div class="form-group{$css.name}">
						<label for="name" class="col-sm-2 control-label span2">Bezeichnung</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="name" value="{$data.name}" name="data[name]">
						</div>
					</div>
					<div class="form-group{$css.banner2}">
						<label for="banner2" class="col-sm-2 control-label span2">Banner oben (Breite: 958px)</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file2"> {$data.file2} {$files2.name}
						</div>
					</div>
					<div class="form-group{$css.color}">
						<label for="color" class="col-sm-2 control-label span2">Farbcode</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="color" value="{$data.color}" name="data[color]">
						</div>
					</div>
					<div class="form-group{$css.url2}">
						<label for="url2" class="col-sm-2 control-label span2">Banner oben Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url2" value="{$data.url2}" name="data[url2]">
						</div>
					</div>
					<div class="form-group{$css.banner}">
						<label for="banner" class="col-sm-2 control-label span2">Banner links (470px x 590px)</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file"> {$data.file} {$files.name}
						</div>
					</div>
					<div class="form-group{$css.url}">
						<label for="url" class="col-sm-2 control-label span2">Banner links Link</label>
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
					<div class="form-group{$css.name_en}">
						<label for="name_en" class="col-sm-2 control-label span2">Bezeichnung</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="name_en" value="{$data.name_en}"
								   name="data[name_en]">
						</div>
					</div>
					<div class="form-group">
						<label for="banner2" class="col-sm-2 control-label span2">Banner oben (Breite: 958px)</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file2_en"> {$data.file2_en} {$files2.name_en}
						</div>
					</div>
					<div class="form-group{$css.color_en}">
						<label for="color_en" class="col-sm-2 control-label span2">Farbcode</label>
						<div class="col-sm-6 span6">
							<input type="text" class="form-control" id="color_en" value="{$data.color_en}"
								   name="data[color_en]">
						</div>
					</div>
					<div class="form-group{$css.url2_en}">
						<label for="url2_en" class="col-sm-2 control-label span2">Banner oben Link</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="url2_en" value="{$data.url2_en}"
								   name="data[url2_en]">
						</div>
					</div>
					<div class="form-group">
						<label for="url2_en" class="col-sm-2 control-label span2">Banner links (470px x 590px)</label>
						<div class="col-sm-8 span8">
							<input type="file" name="file_en"> {$data.file_en} {$files_en.name}
						</div>
					</div>
					<div class="form-group{$css.url_en}">
						<label for="url_en" class="col-sm-2 control-label span2">Banner links Link</label>
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
					<a href="?s=listCategories" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
		<input type="hidden" name="data[parent_id]" value="{$data.parent_id}">
	</form>
{/if}
