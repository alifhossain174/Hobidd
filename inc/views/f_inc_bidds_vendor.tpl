
<div class="container">
	<div class="row">
		<div class="col">
			<h1>{$translation.your_hobidds} </h1>
		</div>
	</div>
<br>
    {if count($data) == 0}
		<div class="row">
			<div class="col">
                {$translation.no_hobbids_yet_vendor}
			</div>
		</div>
    {/if}

	<div class="row">
		<div class="col">
            {assign var='ad_id' value=0}
            {assign var='table_opened' value=0}

            {foreach from=$data key=key item=val}
            {if $ad_id != $val.ad_id}
            {assign var='ad_id' value=$val.ad_id}

            {if $table_opened != 0}
		</div>
	</div>
    {/if}

    {assign var='table_opened' value=1}


	<div class="container">
		<div class="row mb-5">
			<div class="col mb-2">
				<div class="media">
					<a href="/{$lang}/artikel/{$val.ad_id}/"><img class="mr-3" src="{$val.file1}" style="width:150px;"></a>
					<div class="media-body">
						<a href="/{$lang}/artikel/{$val.ad_id}/"><h4
									class="mt-0">{$val.title|truncate:50:"...":true}</h4></a>
                        {$val.days}&nbsp;{$translation.nights}&nbsp;{$val.persons}&nbsp;{$translation.persons}<br/>
						&euro; {$val.value|nf}<br/>

					</div>
				</div>
			</div>
			<div class="col mb-2">
                {if $val.new_message_count > 0}
					<a data-toggle="collapse" href="#container{$key}" aria-expanded="false"
					   aria-controls="container{$key}">
						<button type="button" class="btn btn-primary float-right">{$translation.hobidds_new_messages}&nbsp;&nbsp;
							<span class="badge badge-light">{$val.new_message_count}</span></button>
					</a>
                {else}
					<a data-toggle="collapse" href="#container{$key}" aria-expanded="false"
					   aria-controls="container{$key}">

						<button type="button" class="btn btn-primary float-right">&nbsp;&nbsp;{$translation.hobidds_open}&nbsp;&nbsp;</button>
					</a>
                {/if}
			</div>
		</div>
	</div>

    
	<div class="container collapse" id="container{$key}">
		<div class="row mb-5">
            {/if}

			<div class="col-12 pl-0">
				<div class="card mb-3">

                    {if ($val.c_accepted_c == 1 && $val.c_accepted_v == 1) || ($val.v_accepted_c == 1 && $val.v_accepted_v == 1)}
						<div class="card-header" style="background:#d4ffcc; color:#000000;">
                            {$translation.hobidds_customer} {$val.customer_id} | {$translation.hobidds_accepted} |
							hobidd Code {$val.hobidd_code}
							<span>&nbsp;&dash;&nbsp;</span>
                            {if $val.v_cdate > $val.c_cdate}
								<span>{$val.v_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {else}
								<span>{$val.c_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {/if}




<td><a class="float-right" href="/{$lang}/delete-bidd/{$val.ad_id}/"
                            onclick="return confirm('{$translation.confirm_del}');">
                            <button type="button" class="btn btn-danger float=right"
                            style="text-transform: uppercase">{$translation.delete_ad}</button></a>
                            </td>

						</div>







                    {elseif ($val.c_accepted_c == 1 && $val.c_accepted_v == 0)}
						<div class="card-header" style="background:#f8d7da;">
                            {$translation.hobidds_customer} {$val.customer_id}
							<a class="btn btn-primary float-right" data-toggle="collapse" href="#collapse{$key}1"
							   role="button" aria-expanded="false" aria-controls="collapse{$key}1">
                                {$translation.hobidds_accepted_by_customer}
							</a>
							<span>&nbsp;&dash;&nbsp;</span>
                            {if $val.v_cdate > $val.c_cdate}
								<span>{$val.v_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {else}
								<span>{$val.c_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {/if}
						</div>
                    {elseif ($val.v_accepted_c == 0 && $val.v_accepted_v == 1)}
						<div class="card-header" style="background:#fff59b;">
                            {$translation.hobidds_customer} {$val.customer_id}
							| {$translation.hobidds_accepted_and_wait} 
							<span>&nbsp;&dash;&nbsp;</span>
                            {if $val.v_cdate > $val.c_cdate}
								<span>{$val.v_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {else}
								<span>{$val.c_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {/if}
						</div>
                    {elseif $val.v_cdate > $val.c_cdate}
						<div class="card-header">


                            <td><a class="float-right" href="/{$lang}/delete-ad/{$val.id}/"
                            onclick="return confirm('{$translation.confirm_del}');">
                            <button type="button" class="btn btn-danger float=right"
                            style="text-transform: uppercase">{$translation.delete_ad}</button></a>
                            </td>

                            {$translation.hobidds_customer} {$val.customer_id} | {$translation.hobidds_wait}
							<span>&nbsp;&dash;&nbsp;</span>
                            {if $val.v_cdate > $val.c_cdate}
								<span>{$val.v_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
							{else}
								<span>{$val.c_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {/if}

						</div>
                    {elseif $val.v_cdate < $val.c_cdate}
						<div class="card-header" style="background:#f8d7da;">
                            {$translation.hobidds_customer} {$val.customer_id}

                    
							{*<a class="btn btn-primary float-right" data-toggle="collapse" href="#collapse{$key}2"
							   role="button" aria-expanded="false" aria-controls="collapse{$key}2">
                               {$translation.hobidds_action_needed}
							</a>*}

                             <td><a class="btn btn-primary float-right" href="{$lang}/edit-bids?vendor_id={$val.vendor_id}&customer_id={$val.customer_id}&ad_id={$val.ad_id}"
							   role="button" aria-expanded="false" aria-controls="collapse{$key}2">
                                &nbsp;&nbsp;&nbsp;{$translation.hobidds_action_needed}&nbsp;&nbsp;&nbsp;
							</a></td>

                        <td><a class=" float-right">
                                &nbsp;
							</a></td>


                            <td><a class="float-right" {$translation.delete_ad}></a></td>
                        
                        <td><a class="float-right" href="/{$lang}/delete-ad/{$val.id}/"
                        onclick="return confirm('{$translation.confirm_del}');">
                        <button type="button" class="btn btn-danger float=right"
                        style="text-transform: uppercase">{$translation.delete_ad}</button></a>
                        </td>

                    
                    <span>&nbsp;&dash;&nbsp;</span>


                    {if $val.v_cdate > $val.c_cdate}
								<span>{$val.v_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {else}
								<span>{$val.c_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {/if}
						</div>

                    {else}
						<div class="card-header">
                            {$translation.hobidds_customer} {$val.customer_id} | {$translation.hobidds_offer}
							<span>&nbsp;&dash;&nbsp;</span>
                            {if $val.v_cdate > $val.c_cdate}
								<span>{$val.v_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {else}
								<span>{$val.c_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                            {/if}
						</div>
                    {/if}


					<div class="card-body">

						<p class="card-text">
                            
                            
                            {$translation.hobidds_your_offer} &euro;{$val.v_value|nf}
							| {$translation.hobidds_their_offer} &euro; {$val.c_value|nf}
						</p>
					</div>

                    {if ($val.c_accepted_c == 1 && $val.c_accepted_v == 1) || ($val.v_accepted_c == 1 && $val.v_accepted_v == 1)}
                    {elseif ($val.c_accepted_c == 1 && $val.c_accepted_v == 0)}

                     
                    

						<div class="card-footer collapse" id="collapse{$key}1">



							<h6>{$translation.inbox_accept_bid_header} &euro; {$val.c_value|nf}</h6>
							<form method="post" action="/{$lang}/inbox/{$val.max_customer_message_id}/">
								<input type="hidden" name="accept" value="1">
								<input type="hidden" name="data[value]" value="{$val.c_value}">
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="terms-mob">
									<label class="form-check-label"
										   for="terms-mob">{$translation.inbox_confirm_buy}</label>



								</div>
								<button type="submit" class="btn btn-success"
										onclick="if(!$('#terms-mob').is(':checked')) { alert('{$translation.inbox_error_terms}'); return false;}">{$translation.inbox_accept}</button>
							</form>
						</div>
                    {elseif ($val.v_accepted_c == 0 && $val.v_accepted_v == 1)}
                    {elseif $val.v_cdate > $val.c_cdate}
                    {elseif $val.v_cdate < $val.c_cdate}
						<div class="card-footer collapse" id="collapse{$key}2">
							<h6>{$translation.inbox_accept_bid_header} &euro; {$val.c_value|nf}</h6>
							<form method="post" action="/{$lang}/inbox/{$val.max_customer_message_id}/">
								<input type="hidden" name="accept" value="1">
								<input type="hidden" name="data[value]" value="{$val.c_value}">
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="terms-mob">
									<label class="form-check-label"
										   for="terms-mob">{$translation.inbox_confirm_buy}</label>
								</div>
								<button type="submit" class="btn btn-success"
										onclick="if(!$('#terms-mob').is(':checked')) { alert('{$translation.inbox_error_terms}'); return false;}">{$translation.inbox_accept}</button>
							</form>

							<h6 class="mt-4">{$translation.inbox_counterproposal}</h6>
							<form method="post" action="/{$lang}/inbox/{$val.max_customer_message_id}/">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">&euro;</span>
									</div>
									<input type="text" class="form-control" placeholder="{$val.c_value}"
										   aria-label="value" aria-describedby="basic-addon1" name="data[value]"
										   value="{$val.c_value}">
								</div>

								<div class="form-group group mb-3">
									<label for="content">{$translation.comments}</label>
									<textarea class="form-control" rows="7" placeholder="{$translation.comments}"
											  name="data[vendor_comments]">{$val.vendor_comments}</textarea>
								</div>

								<button type="submit" class="btn btn-success">{$translation.inbox_confirm}</button>
							</form>
						</div>
                    {/if}
				</div>
			</div>
            {/foreach}

            {if $table_opened != 0}
		</div>
	</div>
    {/if}
</div>
</div>
</div>
