<div id="offer-container">


    {if $data.0}
		<div class="offer-box" style="background-image:url('{$data.0.file1_338}'); background-size:100%;"
			 onclick="document.location.href='/{$lang}/artikel/{$data.0.id}/';">
			<div class="offer-box-content">
				<div class="offer-box-bot">
					<div class="offer-box-text">
						<p><a href="/{$lang}/artikel/{$data.0.id}/">{$data.0.title|truncate:50:"...":true}</a></p>
					</div>
				</div>
			</div>
		</div>
    {/if}

    {if $data.1}
		<div class="offer-box offer-box-margin-left"
			 style="background-image:url('{$data.1.file1_338}'); background-size:100%;"
			 onclick="document.location.href='/{$lang}/artikel/{$data.1.id}/';">
			<div class="offer-box-content">
				<div class="offer-box-bot">
					<div class="offer-box-text">
						<p><a href="/{$lang}/artikel/{$data.1.id}/">{$data.1.title|truncate:50:"...":true}</a></p>
					</div>
				</div>
			</div>
		</div>
    {/if}

    {if $data.2}
		<div class="offer-box offer-box-margin-left"
			 style="background-image:url('{$data.2.file1_338}'); background-size:100%;"
			 onclick="document.location.href='/{$lang}/artikel/{$data.2.id}/';">
			<div class="offer-box-content">
				<div class="offer-box-bot">
					<div class="offer-box-text">
						<p><a href="/{$lang}/artikel/{$data.2.id}/">{$data.2.title|truncate:50:"...":true}</a></p>
					</div>
				</div>
			</div>
		</div>
    {/if}

	<div class="clearfix"></div>
	<div class="offer-box-spacer-bottom"></div>

    {if $_banner || $data.7}
        {if $_banner}
			<div class="offer-box-long" style="background-image:url('{$_banner.file1_698}'); background-size:100%;"
				 onclick="document.location.href='/{$lang}/artikel/{$_banner.id}/';">
				<div class="offer-box-long-content">
					<div class="offer-box-bot">
						<div class="offer-box-text">
							<p><a href="/{$lang}/artikel/{$_banner.id}/">{$_banner.title|truncate:50:"...":true}</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="offer-box-long-mobile offer-box-margin-left"
				 style="background-image:url('{$_banner.file1_338}'); background-size:100%;"
				 onclick="document.location.href='/{$lang}/artikel/{$_banner.id}/';">
				<div class="offer-box-content">
					<div class="offer-box-bot">
						<div class="offer-box-text">
							<p><a href="/{$lang}/artikel/{$_banner.id}/">{$data.3.title|truncate:50:"...":true}</a></p>
						</div>
					</div>
				</div>
			</div>
        {else}
			<div class="offer-box-long" style="background-image:url('{$data.7.file1_698}'); background-size:100%;"
				 onclick="document.location.href='/{$lang}/artikel/{$data.7.id}/';">
				<div class="offer-box-long-content">
					<div class="offer-box-bot">
						<div class="offer-box-text">
							<p><a href="/{$lang}/artikel/{$data.7.id}/">{$data.7.title|truncate:50:"...":true}</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="offer-box-long-mobile offer-box-margin-left"
				 style="background-image:url('{$data.7.file1_338}'); background-size:100%;"
				 onclick="document.location.href='/{$lang}/artikel/{$data.7.id}/';">
				<div class="offer-box-content">
					<div class="offer-box-bot">
						<div class="offer-box-text">
							<p><a href="/{$lang}/artikel/{$data.7.id}/">{$data.7.title|truncate:50:"...":true}</a></p>
						</div>
					</div>
				</div>
			</div>
        {/if}

        {if $data.3}
			<div class="offer-box offer-box-margin-left"
				 style="background-image:url('{$data.3.file1_338}'); background-size:100%;"
				 onclick="document.location.href='/{$lang}/artikel/{$data.3.id}/';">
				<div class="offer-box-content">
					<div class="offer-box-bot">
						<div class="offer-box-text">
							<p><a href="/{$lang}/artikel/{$data.3.id}/">{$data.3.title|truncate:50:"...":true}</a></p>
						</div>
					</div>
				</div>
			</div>
        {/if}
    {/if}

	<div class="clearfix"></div>
	<div class="offer-box-spacer-bottom"></div>

    {if $data.4}
		<div class="offer-box" style="background-image:url('{$data.4.file1_338}'); background-size:100%;"
			 onclick="document.location.href='/{$lang}/artikel/{$data.4.id}/';">
			<div class="offer-box-content">
				<div class="offer-box-bot">
					<div class="offer-box-text">
						<p><a href="/{$lang}/artikel/{$data.4.id}/">{$data.4.title|truncate:50:"...":true}</a></p>
					</div>
				</div>
			</div>
		</div>
    {/if}

    {if $data.5}
		<div class="offer-box offer-box-margin-left"
			 style="background-image:url('{$data.5.file1_338}'); background-size:100%;"
			 onclick="document.location.href='/{$lang}/artikel/{$data.5.id}/';">
			<div class="offer-box-content">
				<div class="offer-box-bot">
					<div class="offer-box-text">
						<p><a href="/{$lang}/artikel/{$data.5.id}/">{$data.5.title|truncate:50:"...":true}</a></p>
					</div>
				</div>
			</div>
		</div>
    {/if}

    {if $data.6}
		<div class="offer-box offer-box-margin-left"
			 style="background-image:url('{$data.6.file1_338}'); background-size:100%;"
			 onclick="document.location.href='/{$lang}/artikel/{$data.6.id}/';">
			<div class="offer-box-content">
				<div class="offer-box-bot">
					<div class="offer-box-text">
						<p><a href="/{$lang}/artikel/{$data.6.id}/">{$data.6.title|truncate:50:"...":true}</a></p>
					</div>
				</div>
			</div>
		</div>
    {/if}

	<div class="clearfix"></div>

</div>

{include file="f_page_links.tpl"}
