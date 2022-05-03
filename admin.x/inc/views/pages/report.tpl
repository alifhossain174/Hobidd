{if $B_backendreport1}
    {include file="b_result_counter.tpl"}
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
			<th>Bieter ID</th>
			<th>Bieter E-Mail</th>
			<th>Anbieter ID</th>
			<th>Anbieter</th>
			<th>Anbieter E-Mail</th>
			<th>title</th>
			<th>Anbot Bieter</th>
			<th>Anbot Anbieter</th>
			<th>Hobidd Code</th>
		</tr>
		</thead>
		<tbody>
        {foreach from=$data key=key item=val}
			<tr>
				<td>{$val.customer_id}</td>
				<td>{$val.c_email}</td>
				<td>{$val.vendor_id}</td>
				<td>{$val.company}</td>
				<td>{$val.v_email}</td>
				<td>{$val.title}</td>
				<td>{$val.c_value}</td>
				<td>{$val.v_value}</td>
				<td>{$val.hobidd_code}</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
    {include file="b_page_links.tpl"}
{/if}
