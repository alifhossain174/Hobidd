<div class="card">
	<div class="card-header">
		<h4>{$vendor.company}</h4>
	</div>
	<div class="card-body">
		<p class="card-text">
            {$vendor.street}<br/>
            {$vendor.postalcode} {$vendor.location}<br/>
            {$vendor.country}<br/>
		</p>
	</div>
	<div class="card-footer">
        {if $vendor.phone}<a href="tel:{$vendor.phone}">{$vendor.phone}</a>{/if}<br/>
		<a href="mailto:{$vendor.email}">{$vendor.email}</a><br/>

        {if $vendor.website_alturl}
			<a href="http://{$vendor.website_alturl}">{$vendor.website}</a>
        {else}
			<a href="http://{$vendor.website}">{$vendor.website}</a>
        {/if}
	</div>
</div>
