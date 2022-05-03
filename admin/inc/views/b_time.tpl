{if !$ajax}
    {include file="b_header.tpl"}
{/if}

{include file="b_inc_messages.tpl"}

{if $B_listUser}
	<form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
		<div class="form-group">
			<input class="form-control" type="text" name="filter[query]" value="{$filter.query}" placeholder="Suche" style="width:200px;">
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
			<th><a class="ajaxLink"
				   href="?s={$state}&order=department&sort={$sort}">Abteilung{$sort_icon.department}</a></th>
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.lastname}</td>
				<td>{$val.firstname}</td>
				<td>{$val.department}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=listBookings&user_id={$val.id}" title="Buchungen"
					   class="glyphicon glyphicon-eye-open"></a>
					<a href="?s=listUserWorktimes&user_id={$val.id}" title="Arbeitszeit"
					   class="glyphicon glyphicon-time"></a>
					<a href="?s=editUserSetting&user_id={$val.id}" title="Einstellungen"
					   class="glyphicon glyphicon-cog ajaxLayer"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_listBookings}
	<form method="post" action="?s={$state}&user_id={$smarty.get.user_id}" class="well form-inline ajaxSearchForm">
        {if $is_admin}
			<a class="btn btn-default" href="?s=listUser">zurück</a>
			<a class="btn btn-primary ajaxLayer" href="?s=createBooking&user_id={$smarty.get.user_id}"><i
						class=" icon-plus-sign"></i> Buchung hinzufügen</a>
			<a class="btn btn-primary ajaxLayer" href="?s=createHolidayBooking&user_id={$smarty.get.user_id}"><i
						class=" icon-plus-sign"></i> Urlaub buchen</a>
        {/if}
		<input type="hidden" name="xclear" id="xclear" value="false">
		<select class="form-control" name="filter[time_range]" id="filterTimeRange">
            {$filter.opt_time_range}
		</select>
		<select class="form-control" name="filter[type_id]" id="filterTimeType">
            {$filter.opt_type}
		</select>
        {if $is_admin}
			<select class="form-control" name="filter[user_id]" id="filterUser">
                {$filter.opt_user}
			</select>
        {/if}
		<a href="{$link_back}" class="ajaxLink btn btn-default">&laquo;</a>
		<a href="{$link_next}" class="ajaxLink btn btn-default">&raquo;</a>
		<a class="btn btn-success"
		   href="?s={$state}&user_id={$smarty.get.user_id}&range={$filter.range}&export=true&type=1">Export (1)</a>
		<a class="btn btn-success"
		   href="?s={$state}&user_id={$smarty.get.user_id}&range={$filter.range}&export=true&type=2">Export (2)</a>
		&nbsp; <label>{$date_label} / {$user.firstname} {$user.lastname}</label>
	</form>
    {include file="b_result_counter.tpl"}
    {foreach from=$data.data key=key item=val}
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
			<tr>
				<td colspan="4">{$val.day_name}, {$val.day}</td>
			</tr>
			<tr>
				<th>Ein</th>
				<th>Aus</th>
				<th>Typ</th>
                {if $is_admin}
					<th>nachgetragen/bearbeitet</th>
					<th style="width:50px;">Aktion</th>
                {/if}
			</tr>
			</thead>
			<tbody>
            {foreach from=$val.bookings key=key2 item=val2}
				<tr{if $is_admin && $val2.edited} class="danger"{/if}>
					<td>{$val2.timestamp_in|date_format:"%H:%M"}</td>
					<td>{if $val2.timestamp_out}{$val2.timestamp_out|date_format:"%H:%M"}{else}-{/if}</td>
					<td>{$val2.type}</td>
                    {if $is_admin}
						<td>{if $val2.edited}Ja{else}nein{/if}</td>
						<td nowrap="nowrap" style="text-align:center;">
                            {if $val2.id}
								<a href="?s=editBooking&id={$val2.id}&user_id={$val2.user_id}" title="Bearbeiten"
								   class="ajaxLayer glyphicon glyphicon-pencil"></a>
								<a href="?s=deleteBooking&id={$val2.id}&user_id={$val2.user_id}&range={$smarty.get.range}"
								   id="d{$val2.id}" title="Löschen" class="delete glyphicon glyphicon-trash"></a>
                            {/if}
						</td>
                    {/if}
				</tr>
            {/foreach}
			<tr>
				<td colspan="4">Anwesend: {$val.sum} | Abwesend: {$val.break} | Sollzeit: {$val.worktime} |
					ÜST: {$val.overtime}</td>
			</tr>
			</tbody>
		</table>
    {/foreach}
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
			<td>Summe anwesend: {$data.sum_total} | Summe abwesend: {$data.sum_break} | Soll: {$data.should_total}
				ÜST: {$data.sum_overtime} | ÜST bis heute (vom ausgewählter Zeitraum) {$data.sum_overtime_today} | ÜST
				Gesamtsaldo {$overtime_total}</td>
		</tr>
		</thead>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createBooking || $B_editBooking}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post"
		  action="?s={$state}&id={$data.id}&user_id={$data.user_id}"
		  id="layer"{if $ajax} style="width:1000px; height:560px;"{/if}>
		<div id="form-header">
			<h4>Buchung {if $state == "createDate"}hinzufügen{else}bearbeiten{/if}</h4>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="hour_in">Datum</label>
                {$data.opt_date}
			</div>
			<div class="form-group">
				<label for="hour_in">Stunde von</label>
				<select name="data[hour_in]" id="hour_in" class="form-control">
                    {$data.opt_hour_in}
				</select>
			</div>
			<div class="form-group">
				<label for="minute_in">Minute von</label>
				<select name="data[minute_in]" id="minute_in" class="form-control">
                    {$data.opt_minute_in}
				</select>
			</div>
			<div class="form-group">
				<label for="type_id">Typ</label>
				<select name="data[type_id]" id="type_id" class="form-control">
                    {$data.opt_type}
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="hour_in">&nbsp;</label>
				&nbsp;
			</div>
			<div class="form-group">
				<label for="hour_out">Stunde bis</label>
				<select name="data[hour_out]" id="hour_out" class="form-control">
                    {$data.opt_hour_out}
				</select>
			</div>
			<div class="form-group">
				<label for="minute_out">Minute bis</label>
				<select name="data[minute_out]" id="minute_out" class="form-control">
                    {$data.opt_minute_out}
				</select>
			</div>
		</div>
        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listBookings&user_id={$data.user_id}" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
		<input type="hidden" name="data[user_id]" value="{$data.user_id}">
	</form>
{/if}

{if $B_createHolidayBooking}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post"
		  action="?s={$state}&id={$data.id}&user_id={$data.user_id}"
		  id="layer"{if $ajax} style="width:500px; height:250px;"{/if}>
		<div id="form-header">
			<h4>Buchung {if $state == "createDate"}hinzufügen{else}bearbeiten{/if}</h4>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="dfrom">von</label>
                {$data.opt_dfrom}
			</div>
			<div class="form-group">
				<label for="minute_in">bis</label>
                {$data.opt_dto}
			</div>
		</div>
		<div class="col-md-6">

		</div>
        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listBookings&user_id={$data.user_id}" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
		<input type="hidden" name="data[user_id]" value="{$data.user_id}">
	</form>
{/if}

{if $B_listUserWorktimes}
	<form method="post" action="?s={$state}&user_id={$smarty.get.user_id}" class="well form-inline ajaxSearchForm">
		<a class="btn btn-default" href="?s=listUser">zurück</a>
		<a class="btn btn-primary ajaxLayer" href="?s=createUserWorktime&user_id={$smarty.get.user_id}"><i
					class=" icon-plus-sign"></i> Arbeitszeit hinzufügen</a>
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
			<th><a class="ajaxLink"
				   href="?s={$state}&user_id={$smarty.get.user_id}&order=dfrom&sort={$sort}">Von{$sort_icon.dfrom}</a>
			</th>
			<th><a class="ajaxLink"
				   href="?s={$state}&user_id={$smarty.get.user_id}&order=dto&sort={$sort}">Bis{$sort_icon.dto}</a></th>
			<th><a class="ajaxLink" href="?s={$state}&user_id={$smarty.get.user_id}&order=worktime&sort={$sort}">Arbeitszeit
					pro Tag{$sort_icon.worktime}</a></th>
			<th style="width:50px;">Aktion</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.dfrom|date_format:"%d.%m.%Y"}</td>
				<td>{if $val.dto}{$val.dto|date_format:"%d.%m.%Y"}{else}-{/if}</td>
				<td>{$val.worktime}</td>
				<td nowrap="nowrap" style="text-align:center;">
					<a href="?s=editUserWorktime&id={$val.id}&user_id={$val.user_id}" title="Bearbeiten"
					   class="ajaxLayer glyphicon glyphicon-pencil"></a>
					<a href="?s=deleteUserWorktime&id={$val.id}&user_id={$val.user_id}&range={$smarty.get.range}"
					   id="d{$val.id}" title="Löschen" class="delete glyphicon glyphicon-trash"></a>
				</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_createUserWorktime || $B_editUserWorktime}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post"
		  action="?s={$state}&id={$data.id}&user_id={$data.user_id}"
		  id="layer"{if $ajax} style="width:700px; height:350px;"{/if}>
		<div id="form-header">
			<h4>Arbeitszeit {if $state == "createDate"}hinzufügen{else}bearbeiten{/if}</h4>
		</div>

		<div class="col-md-12">
			<div class="form-group{$css.dfrom}">
				<label for="dfrom" class="col-sm-2 control-label span2">Von</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control datepicker" id="dfrom" value="{$data.dfrom}"
						   name="data[dfrom]">
				</div>
			</div>
			<div class="form-group{$css.dto}">
				<label for="dto" class="col-sm-2 control-label span2">Bis</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control datepicker" id="dto" value="{$data.dto}" name="data[dto]">
				</div>
			</div>
			<div class="form-group{$css.worktime}">
				<label for="worktime" class="col-sm-2 control-label span2">Dauer/Tag</label>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="worktime" value="{$data.worktime}"
						   name="data[worktime]">
					<span class="help-block">HH:MM:SS - z.B. 08:00:00 oder 07:42:00</span>
				</div>
			</div>
		</div>
        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listUsedFor" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
		<input type="hidden" name="data[user_id]" value="{$data.user_id}">
	</form>
{/if}

{if $B_editUserSetting}
	<form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post"
		  action="?s={$state}&id={$data.id}&user_id={$data.user_id}"
		  id="layer"{if $ajax} style="width:700px; height:300px;"{/if}>
		<div id="form-header">
			<h4>Einstellungen bearbeiten</h4>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label for="allow_edit_booking">Buchungen bearbeiten</label>
				<select name="data[allow_edit_booking]" id="allow_edit_booking" class="form-control">
                    {$data.allow_edit_booking}
				</select>
			</div>
			<div class="form-group{$css.saldo}">
				<label for="saldo">Saldo Altbestand</label>
				<br>
				<div class="col-sm-6 span6">
					<input type="text" class="form-control" id="saldo" value="{$data.saldo}" name="data[saldo]">
					<span class="help-block">HH:MM:SS - z.B. 48:35:00</span>
				</div>
			</div>
		</div>
        {if !$ajax}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Speichern</button>
					<a href="?s=listUsedFor" class="btn btn-default">Abbrechen</a>
				</div>
			</div>
        {/if}
		<input type="hidden" name="data[id]" value="{$data.id}">
		<input type="hidden" name="data[user_id]" value="{$data.user_id}">
	</form>
{/if}

{if !$ajax}
    {include file="b_footer.tpl"}
{/if}
