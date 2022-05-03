{* WERBUNG EASYTEHTM ober dem suchbanner*}
{*<div class="container d-none d-lg-block mb-4 mt-0"
            <div>
				<img src="/img/02.jpg">
			</div>
            </div>
            <br>
            <br>*}



<div class="container d-none d-lg-block mb-4 mt-0"
	 style="background: #222850;">{*S U C H B O X*} {* VIOLETT 410149, purple dunkel 340123 *}
	<div class="row justify-content-center align-items-center py-4 border-1">
		<div class="row" style="padding-top: -260px;">
			<div class="col-md-12 center-block">
				<form method="post" action="/{$lang}/kategorie/suche/" style="text-align: center;">
                    {if $filter.postalcode}
						<input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
							   value="{$filter.postalcode}"
							   style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
						<button type="submit"
								style="position:absolute;margin-left:-65px; background:#fff; color:#888; height:55px; border:0; border-radius:0;"
								class="btn btn-default blue_btn"><i class="fas fa-search fa-2x"></i></button>
                    {else}
						<input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
							   placeholder="{$translation.search_placeholder}"
							   style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
						<button type="submit"
								style="position:absolute;margin-left:-65px; background:#fff; color:#888; height:55px; border:0; border-radius:0;"
								class="btn btn-default blue_btn"><i class="fas fa-search fa-2x"></i></button>
                    {/if}
				</form>
			</div>
		</div>
	</div>
</div>

            {*WERBEBOX nach Suchfeld*}
            {*<div class="container d-none d-lg-block mb-4 mt-0"
            <div>
				<img src="/img/02.jpg">
			</div>
            </div>
            <br>
            <br>*}
            <br>
            <br>
<div class="container">
       <h2 class="discover-destinations">{$translation.discover_destination}</h2>
        <br>
        <br>
<div class="container">
		<div class="row">
			<div class="col-lg-7 pr-lg-8 mb-5 mt-0">
				{if ($lang == "de")}
					{$start_page_content.content}
				{else}
					{$start_page_content.content_en|unescape:'html'}
				{/if}
			</div>
            <br>
            <br>
            <br>
			<div class="col-lg-5 mb-5 mt-0">
			       {if ($lang == "de")}
					<img class="img-fluid mx-auto d-block" src="/img/catalog/{$start_page_content.file}">
				{else}
					<img class="img-fluid mx-auto d-block" src="/img/catalog/{$start_page_content.file_en}">
				{/if}
			</div>
		</div>
	</div>
	

	<div class="row">
		<div class="col">
            {if $B_startXXX}
				<h1>{$translation.new_vacations}</h1>
				<br>
            {/if}

            {if count($data) > 0}
				<div class="card-deck">
                    {foreach from=$data key=key item=val}
						<div class="card mb-5">
							<a href="/{$lang}/artikel/{$val.id}/"><img class="card-img-top" src="{$val.file1_700}"
																	   alt="{$val.title|truncate:50:"...":true}"></a>
							<div class="card-body">
                                {if ($lang == 'en') && ($val.titleen|count_characters != 0)}
									<a href="/{$lang}/artikel/{$val.id}/">
                                    <h3 class="card-title">{$val.titleen|truncate:50:"...":true}</h3></a>
									<a href="/{$lang}/artikel/{$val.id}/"><p class="card-text"
																			 style="color:#000;">{$val.contenten|truncate:200:"...":true}</p>
									</a>
                                {else}
									<a href="/{$lang}/artikel/{$val.id}/"><h3
												class="card-title">{$val.title|truncate:50:"...":true}</h3></a>
									<a href="/{$lang}/artikel/{$val.id}/"><p class="card-text"
																			 style="color:#000;">{$val.content|truncate:200:"...":true}</p>
									</a>
                                {/if}

							</div>

							<div class="card-footer">
								<p><span class="big-text">&nbsp;{$val.days}</span>
                                    <span class="small-text" style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;
                                    <span class="big-text">{$val.persons}</span>
                                    <span class="small-text" style="text-transform: uppercase;">&nbsp;{$translation.persons}</span>

                                {*<p><span class="offer-box-big-text lightblue1">&euro; {$val.value|nf}</span></p>*}
                                {if $val.type == "offer"}
									<p style="margin-top: 25px;"><a href="/{$lang}/artikel/{$val.id}/">
											<button type="button" name="bidd" class="btn btn-success width-100"><i
														class="fas fa-check-circle fa-2x"
														style="margin-right:10px; vertical-align:middle;"></i>{$translation.button_submit_price_suggestion}
											</button>
										</a></p>
									<br>
                                {else}
									<p style="margin-top: 25px;"><a href="/{$lang}/artikel/{$val.id}/">
											<button type="button" name="bidd" class="btn btn-info width-100"><i
														class="fas fa-thumbs-up fa-2x"
														style="margin-right:10px; vertical-align:middle;"></i>{$translation.button_submit_draw}
											</button>
										</a></p>
									<br>
                                {/if}
							</div>
                            {if $val.type == "offer" && $B_del}
								<div class="card-footer">
									<a href="/{$lang}/delete-ad/{$val.id}/"
									   onclick="return confirm('{$translation.confirm_del}');">
										<button type="button" class="btn btn-danger">{$translation.delete_ad}</button>
									</a>
								</div>
                            {elseif $B_del}
								<div class="card-footer">
									<a href="/{$lang}/delete-ad/{$val.id}/"
									   onclick="return confirm('{$translation.confirm_del}');">
										<button type="button" class="btn btn-secondary"
												disabled>{$translation.delete_ad}</button>
									</a>
								</div>
                            {/if}
						</div>
                    {/foreach}

                    {for $missingCards = (count($data) + 1) to 3}
						<div class="card">
						</div>
                    {/for}
				</div>
            {elseif $B_detailCategoryPage}
				<h1>{$translation.no_offers_yet}</h1>
				<a href="/{$lang}/inserat-erstellen/">
					<button type="button" class="btn btn-success mt-5">{$translation.create_first_offer}</button>
				</a>
            {/if}
		</div>
	</div>
</div>

{include file="f_page_links.tpl"}
