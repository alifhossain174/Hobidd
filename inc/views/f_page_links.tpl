<div class="container">
    {if $page_links.pagination}
		<!--Pagination-->
		<div class="container d-none d-lg-block">
			<div class="row mt-5">
				<div class="col">
					<ul class="pagination">
                        {foreach from=$page_links.pagination key=key item=val}
							<!--<li class="{if $val.active}active{/if}"><a style="top:0;" class="ajaxLink{if $val.name == "&raquo;"} glyphicon glyphicon-chevron-right{elseif $val.name == "&laquo;"} glyphicon glyphicon-chevron-left{/if}" href="{$val.link}/{$val.page}/">{if $val.name != "&raquo;" && $val.name != "&laquo;"}{$val.name}{/if}</a></li>-->
							<li class="page-item {if $val.active}active{/if}"><a style="top:0;" class="page-link"
																				 href="{$val.link}/{$val.page}/">{$val.name}</a>
							</li>
                        {/foreach}
					</ul>
				</div>
			</div>
		</div>
		<div class="container d-lg-none">
			<div class="row mt-5">
				<div class="col">
					<ul class="pagination pagination-sm">
                        {foreach from=$page_links.pagination key=key item=val}
							<!--<li class="{if $val.active}active{/if}"><a style="top:0;" class="ajaxLink{if $val.name == "&raquo;"} glyphicon glyphicon-chevron-right{elseif $val.name == "&laquo;"} glyphicon glyphicon-chevron-left{/if}" href="{$val.link}/{$val.page}/">{if $val.name != "&raquo;" && $val.name != "&laquo;"}{$val.name}{/if}</a></li>-->
							<li class="page-item {if $val.active}active{/if}"><a style="top:0;" class="page-link"
																				 href="{$val.link}/{$val.page}/">{$val.name}</a>
							</li>
                        {/foreach}
					</ul>
				</div>
			</div>
		</div>
    {/if}

