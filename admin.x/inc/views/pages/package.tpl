{if $B_listPackages}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary" href="?s=createPackage"><i class=" icon-plus-sign"></i> Inhalt hinzufügen</a>
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
				<td>{$val.name_de}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editPackage&id={$val.id}" title="Bearbeiten" class="glyphicon glyphicon-pencil"></a>
					<a href="?s=deletePackage&id={$val.id}" id="d{$val.id}" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createPackage || $B_editPackage}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  enctype="multipart/form-data" id="layer"{if $ajax} style="width:700px; height:400px;"{/if}>
		<div id="form-header">
			<h4>Inhalt {if $state == "createPackage"}hinzufügen{else}bearbeiten{/if}</h4>
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

					<div class="form-group{$css.price}">
						<label for="price" class="col-sm-2 control-label span2">Preis</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control inputFloat" id="price" value="{$data.price}"
								   name="data[price]">
						</div>
					</div>

					<div class="form-group{$css.commission}">
						<label for="commission" class="col-sm-2 control-label span2">Provision</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control inputFloat" id="commission"
								   value="{$data.commission}" name="data[commission]">
						</div>
					</div>

					<div class="form-group{$css.raffle_limit}">
						<label for="raffle_limit" class="col-sm-2 control-label span2">Limit Gewinnspiele</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="raffle_limit" value="{$data.raffle_limit}"
								   name="data[raffle_limit]">
						</div>
					</div>

					<div class="form-group{$css.sell_offer_limit}">
						<label for="sell_offer_limit" class="col-sm-2 control-label span2">Limit Kaufangebote</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="sell_offer_limit"
								   value="{$data.sell_offer_limit}" name="data[sell_offer_limit]">
						</div>
					</div>

					<div class="form-group{$css.auto}">
						<label for="auto" class="col-sm-2 control-label span2">Automatische Abw.</label>
						<div class="col-sm-6 span6">
							<select class="form-control" id="auto" name="data[auto]">
                                {$data.opt_auto}
							</select>
						</div>
					</div>

					<div class="form-group{$css.price_suggestion}">
						<label for="price_suggestion" class="col-sm-2 control-label span2">Preisvorschläge</label>
						<div class="col-sm-6 span6">
							<select class="form-control" id="auto" name="data[price_suggestion]">
                                {$data.opt_price_suggestion}
							</select>
						</div>
					</div>

				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="german">
				<div class="col-md-12">
					<div class="form-group{$css.name_de}">
						<label for="name_de" class="col-sm-2 control-label span2">Name</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name_de" value="{$data.name_de}"
								   name="data[name_de]">
						</div>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="english">
				<div class="col-md-12">

					<div class="form-group{$css.name_en}">
						<label for="name_en" class="col-sm-2 control-label span2">Name</label>
						<div class="col-sm-8 span8">
							<input type="text" class="form-control" id="name_en" value="{$data.name_en}"
								   name="data[name_en]">
						</div>
					</div>

				</div>
			</div>
		</div>


        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listPackages" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
	</form>
{/if}
