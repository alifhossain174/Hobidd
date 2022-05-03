{if $B_listVendors}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-primary ajaxLayer" href="?s=createVendor"><i class=" icon-plus-sign"></i> Anbieter hinzufügen</a>
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
			<th><a class="ajaxLink" href="?s={$state}&order=company&sort={$sort}">Firma{$sort_icon.company}</a></th>
			<th><a class="ajaxLink" href="?s={$state}&order=email&sort={$sort}">Email{$sort_icon.email}</a></th>
			<th><a class="ajaxLink" href="?s={$state}&order=active&sort={$sort}">Aktiv{$sort_icon.active}</a></th>
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.id}</td>
				<td>{$val.company}</td>
				<td>{$val.email}</td>
				<td>{if $val.active}Ja{else}Nein{/if}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editVendor&id={$val.id}" title="Bearbeiten"
					   class="ajaxLayer glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteVendor&id={$val.id}" id="d{$val.id}" title="Löschen"
					   class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createVendor || $B_editVendor}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
		  id="layer"{if $ajax} style="width:700px; height:400px;"{/if}>
		<div id="form-header">
			<h4>Anbieter {if $state == "createVendor"}hinzufügen{else}bearbeiten{/if}</h4>
		</div>

		<div class="col-md-12">
			<div class="form-group{$css.company}">
				<label for="company" class="col-sm-2 control-label span2">Firma</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="company" value="{$data.company}" name="data[company]">
				</div>
			</div>
			<div class="form-group{$css.street}">
				<label for="street" class="col-sm-2 control-label span2">Straße</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="company" value="{$data.street}" name="data[street]">
				</div>
			</div>
			<div class="form-group{$css.postalcode}">
				<label for="postalcode" class="col-sm-2 control-label span2">PLZ</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="postalcode" value="{$data.postalcode}"
						   name="data[postalcode]">
				</div>
			</div>
			<div class="form-group{$css.location}">
				<label for="location" class="col-sm-2 control-label span2">Ort</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="location" value="{$data.location}"
						   name="data[location]">
				</div>
			</div>
<div class="form-group{$css.federal_state}">
   <label for="federal_state" class="col-sm-2 control-label span2">Federal State de/ Region</label>
   <div class="col-sm-6 span6">
      <input type="text" class="form-control" id="federal_state" value="{$data.federal_state}" name="data[federal_state]">
   </div>
</div>
<div class="form-group{$css.federal_state}">
   <label for="federal_state" class="col-sm-2 control-label span2">Federal State en / Region</label>
   <div class="col-sm-6 span6">
      <input type="text" class="form-control" id="federal_state" value="{$data.federal_state_en}" name="data[federal_state_en]">
   </div>
</div>

			<div class="form-group{$css.phone}">
				<label for="phone" class="col-sm-2 control-label span2">Telefon</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="phone" value="{$data.phone}" name="data[phone]">
				</div>
			</div>
			<div class="form-group{$css.email}">
				<label for="email" class="col-sm-2 control-label span2">Email</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="email" value="{$data.email}" name="data[email]">
				</div>
			</div>
			<div class="form-group{$css.website}">
				<label for="website" class="col-sm-2 control-label span2">Webseite</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="website" value="{$data.website}" name="data[website]">
				</div>
			</div>
			<div class="form-group{$css.website}">
				<label for="website" class="col-sm-2 control-label span2">Alternative URL</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="website_alturl" value="{$data.website_alturl}"
						   name="data[website_alturl]">
				</div>
			</div>
			<div class="form-group{$css.uid}">
				<label for="uid" class="col-sm-2 control-label span2">UID-Nummer</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="uid" value="{$data.uid}" name="data[uid]">
				</div>
			</div>
			<div class="form-group{$css.package_id}">
				<label for="active" class="col-sm-2 control-label span2">Paket</label>
				<div class="col-sm-6 span6">
					<select class="form-control" id="package_id" name="data[package_id]">
                        {$data.opt_package}
					</select>
				</div>
			</div>
			<div class="form-group{$css.package_payed}">
				<label for="package_payed" class="col-sm-2 control-label span2">Paket bezahlt</label>
				<div class="col-sm-6 span6">
					<select class="form-control" id="package_payed" name="data[package_payed]">
                        {$data.opt_payed}
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
			<div class="form-group{$css.allow_root_access}">
				<label for="allow_root_access" class="col-sm-2 control-label span2">Stellvertretung zulassen</label>
				<div class="col-sm-6 span6">
					<select class="form-control" id="allow_root_access" name="data[allow_root_access]">
                        {$data.opt_allow_root_access}
					</select>
				</div>
			</div>
					<div class="form-group{$css.common_description}">
				<label for="content" class="col-sm-2 control-label span2">Common description</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:200px; width:450px;" name="data[common_description]"
							  id="common-description">{$data.common_description}</textarea>
				</div>
			</div>
			<div class="form-group{$css.common_description_en}">
				<label for="content" class="col-sm-2 control-label span2">Common description EN</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:200px; width:450px;" name="data[common_description_en]"
							  id="common-description-en">{$data.common_description_en}</textarea>
				</div>
			</div>
			<div class="form-group{$css.content}">
				<label for="content" class="col-sm-2 control-label span2">Stornobedingungen</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:200px; width:450px;" name="data[cancellation_conditions]"
							  id="content">{$data.cancellation_conditions}</textarea>
				</div>
			</div>
			<div class="form-group{$css.content}">
				<label for="content" class="col-sm-2 control-label span2">Stornobedingungen EN</label>
				<div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:200px; width:450px;" name="data[cancellation_conditions_en]"
							  id="content">{$data.cancellation_conditions_en}</textarea>
				</div>
			</div>
		</div>
        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listVendors" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
	</form>
{/if}
