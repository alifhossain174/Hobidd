{if $crumbs}
	<!--Breadcrumbs-->
	<ol class="breadcrumb">
        {foreach from=$crumbs key=key item=val name="fe"}
			<li>{if $smarty.foreach.fe.last}{$val.name}{else}<a href="{$val.link}">{$val.name}</a>{/if}</li>
        {/foreach}
	</ol>
	<!--Breadcrumbs Close-->
{/if}
