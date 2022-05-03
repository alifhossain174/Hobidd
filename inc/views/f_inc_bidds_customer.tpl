<div class="container">
	<div class="row">
        {if $msg}
			<div class="alert alert-success mt-3" role="alert">
                {$msg}
			</div>
        {/if}

		<div class="col">
			<h1>{$translation.your_hobidds}</h1>
		</div>
	</div>

    {if count($data) == 0}
		<div class="row">
			<div class="col">
                {$translation.no_hobbids_yet_customer}
			</div>
		</div>
    {/if}

    {if count($data) > 0}
	<div class="row mb-5">
        {/if}

        {foreach from=$data key=key item=val}
			<div class="col-sm-4 mb-5">
				<div class="card">
					<a href="/{$lang}/artikel/{$val.ad_id}/"><img class="card-img-top" src="{$val.file1}"
																  alt="{$val.title|truncate:50:"...":true}"></a>
					<div class="card-body">
						<a href="/{$lang}/artikel/{$val.ad_id}/"><h3
									class="card-title">{$val.title|truncate:50:"...":true}</h3></a>
						<p class="card-text">
                            {$val.days}&nbsp;{$translation.nights}&nbsp;{$val.persons}&nbsp;{$translation.persons}<br/>
                            {$translation.value3}&nbsp;&euro; {$val.value|nf}<br/>
                            <br>
                            {$val.cnt_bidds_left}&nbsp;{$translation.inbox_bidds_remaining}<br/>
							<br/>
                            {$translation.hobidds_your_offer} &euro; {$val.c_value|nf}<br/>
                            {if $val.v_value > 0}
                                {$translation.hobidds_counterbid} &euro; {$val.v_value|nf}
								<br/>
                            {else}
                                {$translation.hobidds_counterbid} {$translation.hobidds_still_open}
								<br/>
                            {/if}
							<br/>
                            {if ($val.c_accepted_c == 1 && $val.c_accepted_v == 1) || ($val.v_accepted_c == 1 && $val.v_accepted_v == 1)}
                            {elseif ($val.c_accepted_c == 1 && $val.c_accepted_v == 0)}
                                {$translation.hobidds_status} {$translation.hobidds_customer_accepted_vendor_waiting}
								<br/>
                            {elseif ($val.v_accepted_c == 0 && $val.v_accepted_v == 1)}
                                {$translation.hobidds_status} {$translation.hobidds_vendor_accepted_customer_waiting}
								<br/>
                            {elseif $val.c_cdate > $val.v_cdate}
                                {$translation.hobidds_status} {$translation.hobidds_waiting_for_provider}
								<br/>
                            {elseif $val.c_cdate < $val.v_cdate}
                                {$translation.hobidds_status} {$translation.hobidds_waiting_for_customer}
								<br/>
                            {/if}
						</p>
					</div>
                    {if strlen($val.vendor_comments) > 0}
						<div class="card-footer vendor_comments">
                            {$translation.comments}<br/>
							<br>{$val.vendor_comments|nl2br}
						</div>
                    {/if}
                    {if ($val.c_accepted_c == 1 && $val.c_accepted_v == 1) || ($val.v_accepted_c == 1 && $val.v_accepted_v == 1)}
						<div class="card-footer">
                            {$translation.hobidds_congratulation}<br/>
							<br/>
							<button type="button" class="btn btn-success">hobidd Code {$val.hobidd_code}</button>
							</a>
						</div>
                    {elseif ($val.c_accepted_c == 1 && $val.c_accepted_v == 0)}
                    {elseif ($val.v_accepted_c == 0 && $val.v_accepted_v == 1)}
						<div class="card-footer">
							<h5>{$translation.inbox_accept_bid_header} &euro; {$val.v_value|nf}</h5>
							<form method="post" action="/{$lang}/inbox/{$val.max_vendor_message_id}/">
								<input type="hidden" name="accept" value="1">
								<input type="hidden" name="data[value]" value="{$val.v_value}">
								<button class="btn btn-primary" type="button" data-toggle="collapse"
										data-target="#collapseOrderWithCosts{$key}" aria-expanded="false"
										aria-controls="collapseOrderWithCosts{$key}">
                                    {$translation.inbox_accept}
								</button>
								<div class="collapse mt-3" id="collapseOrderWithCosts{$key}">
									<div class="card card-body">
										<div class="form-group group">
											<label for="content">{$translation.firstname}*</label>
											<input type="text" class="form-control" name="data[firstname]"
												   id="firstname" placeholder="{$translation.firstname}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.lastname}*</label>
											<input type="text" class="form-control" name="data[lastname]" id="lastname"
												   placeholder="{$translation.lastname}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.street}*</label>
											<input type="text" class="form-control" name="data[street]" id="street"
												   placeholder="{$translation.street}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.postalcode}*</label>
											<input type="text" class="form-control" name="data[postalcode]"
												   id="postalcode" placeholder="{$translation.postalcode}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.location}*</label>
											<input type="text" class="form-control" name="data[location]" id="location"
												   placeholder="{$translation.location}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.country}*</label>
											<select name="data[country]" class="form-control" id="checkCountry">
                                                {$opt_country}
											</select>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.phone2}*</label>
											<input type="text" class="form-control" name="data[phone]" id="phone"
												   placeholder="{$translation.phone2}" required>
										</div>
										<div class="form-group form-check">
											<input type="checkbox" class="form-check-input" id="terms-mob">
											<label class="form-check-label"
												   for="terms-mob">{$translation.inbox_confirm_buy}</label>
										</div>
										<button type="submit" class="btn btn-success"
												onclick="if(!$('#terms-mob').is(':checked')) { alert('{$translation.inbox_error_terms}'); return false;}">{$translation.order_with_costs}</button>
									</div>
								</div>
							</form>
						</div>
                    {elseif $val.c_cdate > $val.v_cdate}
                    {elseif $val.c_cdate < $val.v_cdate}
						<div class="card-footer">
							<h5>{$translation.inbox_accept_bid_header} &euro; {$val.v_value|nf}</h5>
							<form method="post" action="/{$lang}/inbox/{$val.max_vendor_message_id}/">
								<input type="hidden" name="accept" value="1">
								<input type="hidden" name="data[value]" value="{$val.v_value}">
								<button class="btn btn-primary" type="button" data-toggle="collapse"
										data-target="#collapseOrderWithCosts{$key}" aria-expanded="false"
										aria-controls="collapseOrderWithCosts{$key}">
                                    {$translation.inbox_accept}
								</button>
								<div class="collapse mt-3" id="collapseOrderWithCosts{$key}">
									<div class="card card-body">
										<div class="form-group group">
											<label for="content">{$translation.firstname}*</label>
											<input type="text" class="form-control" name="data[firstname]"
												   id="firstname" placeholder="{$translation.firstname}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.lastname}*</label>
											<input type="text" class="form-control" name="data[lastname]" id="lastname"
												   placeholder="{$translation.lastname}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.street}*</label>
											<input type="text" class="form-control" name="data[street]" id="street"
												   placeholder="{$translation.street}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.postalcode}*</label>
											<input type="text" class="form-control" name="data[postalcode]"
												   id="postalcode" placeholder="{$translation.postalcode}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.location}*</label>
											<input type="text" class="form-control" name="data[location]" id="location"
												   placeholder="{$translation.location}" required>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.country}*</label>
											<select name="data[country]" class="form-control" id="checkCountry">
                                                {$opt_country}
											</select>
										</div>
										<div class="form-group group">
											<label for="content">{$translation.phone2}*</label>
											<input type="text" class="form-control" name="data[phone]" id="phone"
												   placeholder="{$translation.phone2}" required>
										</div>
										<div class="form-group form-check">
											<input type="checkbox" class="form-check-input" id="terms-mob{$key}">
											<label class="form-check-label"
												   for="terms-mob">{$translation.inbox_confirm_buy}</label>
										</div>
										<button type="submit" class="btn btn-success"
												onclick="if(!$('#terms-mob{$key}').is(':checked')) { alert('{$translation.inbox_error_terms}'); return false;}">{$translation.order_with_costs}</button>
									</div>
								</div>
							</form>
						</div>
						<div class="card-footer">
                            {if $val.cnt_bidds_left > 0}
								<h5>{$translation.inbox_counterproposal}</h5>
								<form method="post" action="/{$lang}/inbox/{$val.max_vendor_message_id}/">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">&euro;</span>
										</div>
										<input type="text" class="form-control" placeholder="{$val.v_value}"
											   aria-label="value" aria-describedby="basic-addon1" name="data[value]"
											   value="{$val.v_value}">
									</div>

									<button type="submit" class="btn btn-success">{$translation.inbox_confirm}</button>
								</form>
                            {/if}
						</div>
                    {/if}
                    {if $val.c_deletable}
					<div class="card-footer">
						<a href="/{$lang}/delete-bidd/{$val.ad_id}/"
						   onclick="return confirm('{$translation.confirm_del}');">
							<button type="button" class="btn btn-danger">{$translation.delete_ad}</button>
						</a>
					</div>
					{/if}
				</div>
			</div>
        {/foreach}
        {if count($data) > 0}
	</div>
    {/if}
</div>
