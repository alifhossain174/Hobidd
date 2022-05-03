{literal}
	<style type="text/css">
        body {
            font-family: monospace;
            font-size: 11px
        }

        .historyTable {
            border: 1px solid #F0DDAA;
            margin-top: 5px;
            border-spacing: 0
        }

        .historyTable .date {
            background: #F0DDAA;
            padding: 0 0 0 5px
        }

        .historyTable .changetype {
            padding: 0 0 0 5px;
            font-size: 11px
        }

        .historyTable .changeinfo {
            padding: 0 0 0 5px;
            font-size: 11px;
        }

        .historyTable h1 {
            padding: 0;
            margin: 0;
            font-size: 11px;
            color: #F26D00
        }

        .historyTable .key {
            font-weight: bold;
            width: 10%;
            text-align: right
        }

        .historyTable .value {
            width: 20%
        }

        .historyTable .summary {
            vertical-align: top;
            height: 10px;
            font-size: 11px;
            background: #999;
            color: white;
            padding: 3px 0 3px 10px;
            margin: 0;
            font-weight: bold
        }

        .historyTable .csstype_open {
            background: #FFCDC7
        }

        .historyTable .csstype_closed {
            background: #D0FFC7
        }

        .historyTable .csstype_workuser {
            background: #EECCFF
        }

        .historyTable .csstype_comment {
            background: #DDD
        }

        .historyTable .csstype_subject {
            background: #DDD
        }
	</style>
{/literal}

<a href="https://io.oja.at/apps/ticket.php?s=showTicket&id={$_data.0.id}">Ticket {$data.0.id} bearbeiten</a><br><br>
<html>

{foreach $_data as $key => $val}
<table border="0" class="historyTable" style="margin-left: 0; width:100%;">
	<col style="width:22%;">
	<col style="width:78%;">
	<tbody>
	<tr>
		<td colspan="2"
			class="{if $val.status == "open" || $val.status == "reopen"}date csstype_open{elseif $val.status == "closed"}csstype_closed{/if}">
			[OT{$val.number}] {$val.creation_date|date_format:"%d.%m.%Y %H:%M"} {if $key == 0}Ticket erstellt{/if}
			von {$val.creator}</td>
	</tr>
    {if $key == 0}
		<tr valign="top">
			<td class="changetype"><b>Kategorie</b></td>
			<td class="changetype">{$val.category}</td>
		</tr>
		<tr>
			<td class="changetype"><b>Bearbeiter</b></td>
			<td class="changetype">{$val.employee}</td>
		</tr>
		<tr>
			<td class="changetype"><b>Kunde</b></td>
			<td class="changetype">{if $val.customer_id}{$val.customer_id}, {$val.customer}{else}{if $val.customer_id_external}{$val.customer_id_external},{/if} {$val.customer_external}{/if}</td>
		</tr>
		<tr>
			<td class="changetype"><b>Priorität</b></td>
			<td class="changetype">{$val.priority_f}</td>
		</tr>
    {/if}
	<tr>
		<td class="changetype"><b>Zwischen-Aufwand</b></td>
		<td class="changetype">{$val.cost} Minute{if $val.cost == 0 || $val.cost > 1}n{/if}</td>
	</tr>
    {if $key == 0}
		<tr>
			<td class="changetype"><b>Betreff</b></td>
			<td class="changetype">{$val.subject}</td>
		</tr>
    {/if}
    {if $val.attachments}
		<tr>
			<td class="changetype"><b>Attachments</b></td>
			<td class="changetype">
                {foreach from=$val.attachments key=key2 item=val2 name="fe"}
                    {$val2.name}
                    {if !$smarty.foreach.fe.last}&nbsp;{/if}
                {/foreach}
			</td>
		</tr>
    {/if}
    {if $key == 0}
		<tr>
			<td class="changetype"><b>Inhalt</b></td>
			<td class="changetype" style="background:#DDD">{$val.content}</td>
		</tr>
    {/if}
    {foreach from=$val.changes key=key2 item=val2}
        {if $val2.field == "content"}
			<td class="changetype"><b>{$val2.info}</b></td>
			<td class="changetype" style="background:#DDD">{$val2.value}</td>
        {else}
			<tr>
				<td class="changetype"><b>{$val2.info}</b></td>
				<td class="changetype">{$val2.value}</td>
			</tr>
        {/if}
    {/foreach}
	</tbody>
</table>
{/foreach}
