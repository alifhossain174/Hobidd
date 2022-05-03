<div class="container">
	<div class="row">
		<div class="col">
            {if $msg}
				<div class="alert alert-success mt-3" role="alert">
                    {$msg}
				</div>
            {/if}

			<h1>{$translation.new_offer_step3}</h1>

            {$data.content}
            
			<form method="post">
				<input type="hidden" name="store" value="true">
				<div class="checkbox" style="margin-top:20px;">
					<label>
						<input type="checkbox" name="data[terms]">
                        {$translation.info_terms}
				</div>
                <br>

                {if $B_storeAdInquiry}
					<a href="/{$lang}/inquiry/{$inquiry_id}/">
						<button type="button"
								class="btn btn-secondary ml-2 mt-3 mb-5">{$translation.change_offer}</button>
					</a>
                {/if}
                {if $B_storeAdOffer}
					<a href="/{$lang}/inserat-angebot-bearbeiten/">
						<button type="button"
								class="btn btn-secondary ml-2 mt-3 mb-5">{$translation.change_offer}</button>
					</a>
                {/if}
                {if $B_storeAd}
					<a href="/{$lang}/inserat-bearbeiten/">
						<button type="button"
								class="btn btn-secondary ml-2 mt-3 mb-5">{$translation.change_offer}</button>
					</a>
                {/if}

                {if $B_storeAd}
{*                {if $B_storeAdInquiry}*}
					{*<button type="submit" name="action" class="btn btn-info ml-2 mt-3 mb-5" value="private">
                        {$translation.new_offer_activate_private} 
					</button>*}
					<button type="submit" name="action" class="btn btn-success ml-2 mt-3 mb-5" value="all">
                        {$translation.new_offer_activate_public}
					</button>
                {else}
					<button type="submit" name="action" class="btn btn-info ml-2 mt-3 mb-5" value="private">
						{$translation.new_offer_activate_private}
					</button>
{*					<button type="submit" class="btn btn-success ml-2 mt-3 mb-5">*}
{*						{$translation.new_offer_activate}*}
{*					</button>*}

					<button type="submit" name="action" class="btn btn-success ml-2 mt-3 mb-5" value="all">
						{$translation.new_offer_activate_public}
					</button>
                {/if}
			</form>

		</div>
	</div>
</div>
