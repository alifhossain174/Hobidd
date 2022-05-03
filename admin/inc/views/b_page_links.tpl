{if $page_links.pagination}
	<ul class="pagination pagination-sm">
        {foreach from=$page_links.pagination key=key item=val}
			<li{if $val.active} class="active"{/if}>
				<a {if $val.link} class="ajaxLink" href="{$val.link}&page={$val.page}"{/if}>{$val.name}</a></li>
        {/foreach}
	</ul>
	<p style="font-size:10px; padding-top:10px;">Eintrag {$page_links.entry_from} bis {$page_links.entry_to}
		von {$page_links.cnt}</p>
{/if}
