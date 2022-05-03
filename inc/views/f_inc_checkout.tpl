<!--Login / Register-->
<section class="log-reg container">
	<!--<h2>{if $B_registerForm}Anmelden{else}Profil bearbeiten{/if}</h2>-->

	<div class="ft" style="margin-bottom:20px;">
        {$pagedata.content}


	</div>

    {if $msg}<h2 style="#fa8f0f; margin-bottom:40px;">{$msg}</h2>{/if}

	<div class="row">
		<!--Registration-->


		<div class="col-md-2">
			<table class="table tbl-package" style="width:200px;">
				<tr>
					<td class="td-package" style="background:{$package.color};">{$package.name}</td>
				</tr>
			</table>
		</div>
		<div class="col-md-10" style="padding-top:10px;">{$priceinfo}</div>
		<div class="clearfix"></div>
		<div style="height:30px;"></div>


		<div class="col-md-12">

            {if $B_success}
				<p>{$translation.payment_success}</p>
				<p><a href="/{$lang}/">{$translation.next}</p>
            {else}
				<script src="//www.paypalobjects.com/api/checkout.js"></script>
				<table style="width:100%;">
					<tr>
						<td align="center">
							<div id="paypal-button-container"></div>
						</td>
					</tr>
				</table>
            {literal}
				<script>
                    paypal.Button.render({

                        env: 'production', // sandbox | production

                        // PayPal Client IDs - replace with your own
                        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
                        client: {
                            sandbox: 'Acgx8a7JkiPazCBTtXRbE2C5c0gCUUWJCszAAfCxH9HLUlNTVKwa7-W61zTJFsxOJe5s0LREduwg43eI',
                            production: 'AdpG7wRwsGMRd2smPEWagFXo-Tit2c4cRH0G_CH01fGmqNgoLnmTNXxcbBCTarn1Wszd_IAiLYOc4yqz'
                        },

                        // Show the buyer a 'Pay Now' button in the checkout flow
                        commit: true,

                        // payment() is called when the button is clicked
                        payment: function (data, actions) {

                            // Make a call to the REST api to create the payment
                            return actions.payment.create({
                                payment: {
                                    transactions: [
                                        {
                                            amount: {total: '{/literal}{$amount}{literal}', currency: 'EUR'}
                                        }
                                    ]
                                }
                            });
                        },

                        style: {
                            size: 'responsive', //small medium
                            color: 'gold',
                            shape: 'pill',
                            label: 'checkout'
                        },

                        // onAuthorize() is called when the buyer approves the payment
                        onAuthorize: function (data, actions) {

                            // Make a call to the REST api to execute the payment
                            return actions.payment.execute().then(function () {
                                document.location.href = '{/literal}{$success_url}{literal}';
                            });
                        }

                    }, '#paypal-button-container');

				</script>
            {/literal}
            {/if}

		</div>

	</div>
</section><!--Login / Register Close-->
