{if !$B_inboxForm}
<table class="table table-inbox table-hover">
	<tbody>
	<tr>
		<td class="inbox-header">&nbsp;</td>
		<td class="inbox-header">{$translation.subject}</td>
		<td class="inbox-header">{$translation.inbox_from}</td>
		<td class="inbox-header">{$translation.offer}</td>
		<td class="inbox-header">{$translation.content}</td>
		<td class="inbox-header text-right">{$translation.date}</td>
		<td class="inbox-header">&nbsp;</td>
	</tr>
    {/if}

    {foreach from=$data key=key item=val}
        {if !$B_inboxForm}
			<tr class="{if $val.accepted_c && $val.accepted_v}success{/if}">
				<td class="view-message  dont-show">{if ($B_customer && $val.sender == "c") || ($B_vendor && $val.sender == "v")}
						<strong>{$translation.out}&nbsp;</strong>{else}<strong>{$translation.in}&nbsp;</strong>{/if}
				</td>
				<td class="view-message  dont-show">{$val.title|truncate:40}</td>
				<td class="view-message visible-md visible-lg">{$val.customer_id}</td>
				<td class="view-message  inbox-small-cells">€ {$val.value|nf}</td>
				<td class="view-message visible-md visible-lg">{$val.content|truncate:30}</td>
				<td class="view-message  text-right">{$val.cdate|date_format:"%d.%m.%Y %H:%M"}</td>
				<td class="text-right">
                    {if !$B_inboxForm}
                        {if $B_customer}{if $val.sender == "v" && ($val.can_reply || ($val.accepted_v))}<a
							href="/{$lang}/inbox/{$val.id}/"
							class="btn btn-sm btn-primary">{$translation.reply}</a>{/if}{/if}
                        {if $B_vendor || $val.accepted_c}{if $val.sender == "c"}<a href="/{$lang}/inbox/{$val.id}/"
																				   class="btn btn-sm btn-primary">{$translation.reply}</a>{/if}{/if}
                    {else}
						<a href="/{$lang}/inbox/" class="btn btn-sm btn-primary">{$translation.close}</a>
                    {/if}
				</td>
			</tr>
        {/if}


        {if $B_inboxForm && ($B_inboxForm && $val.id == $id)}

        {literal}
			<style>
                .btn {
                    font-size: 18px;
                }

                .xinput {
                    margin-bottom: 20px;
                }
			</style>
        {/literal}
			<table class="table table-inbox table-hover">
				<tbody>
				<tr>
					<td class="inbox-header">&nbsp;</td>
					<td class="inbox-header">{$translation.subject}</td>
					<td class="inbox-header">{$translation.inbox_from}</td>
					<td class="inbox-header">{$translation.offer}</td>
					<td class="inbox-header">{$translation.content}</td>
					<td class="inbox-header text-right">{$translation.date}</td>
					<td class="inbox-header">&nbsp;</td>
				</tr>
				<tr class="{if $val.accepted_c && $val.accepted_v}success{/if}">
					<td class="view-message  dont-show">{if ($B_customer && $val.sender == "c") || ($B_vendor && $val.sender == "v")}
							<strong>{$translation.out}&nbsp;</strong>{else}<strong>{$translation.in}&nbsp;</strong>{/if}
					</td>
					<td class="view-message  dont-show">{$val.title|truncate:40}</td>
					<td class="view-message visible-md visible-lg">{$val.customer_id}</td>
					<td class="view-message  inbox-small-cells">€ {$val.value|nf}</td>
					<td class="view-message visible-md visible-lg">{$val.content|truncate:30}</td>
					<td class="view-message  text-right">{$val.cdate|date_format:"%d.%m.%Y %H:%M"}</td>
					<td class="text-right"><a href="/{$lang}/bidds/"
											  class="btn btn-sm btn-primary">{$translation.close}</a></td>
				</tr>
				</tbody>
			</table>
			<div class="row inbox-message-box">
				<div class="col-sm-8">
					<!--$val.accepted_v: {$val.accepted_v}<br/>
                $val.accepted_c: {$val.accepted_c}<br/>
                $val.rejected: {$val.rejected}<br/>-->

                    {if $B_customer}
						<h4 class="xoffer">{$translation.new_inbox_message_customer}</h4>
                        {$val.content|nl2br}
						<br/>
						<br/>
                        {if $val.rejected && !$val.value}
                            {$translation.inbox_offer_rejected}
                        {/if}

                        {if $val.accepted_v && !$val.accepted_c}
                            {$translation.inbox_offer_accepted_by_vendor}
                        {/if}

                        {if ($val.rejected && $val.value) || (!$val.rejected && !$val.accepted_v && {$val.value})}
                            {$translation.inbox_new_offer_by_vendor}
							<strong>€ {$val.value|nf}</strong>
							.
                        {/if}

                    {else}
						<h4 class="xoffer">{$translation.new_inbox_message_vendor}</h4>
                        {$val.content|nl2br}
						<br/>
						<br/>
                        {if $val.rejected && !$val.value}
                            {$translation.inbox_offer_rejected}
                        {/if}

                        {if $val.accepted_c && !$val.accepted_v}
                            {$translation.inbox_offer_accepted_by_user}
                        {/if}

                        {if ($val.rejected && $val.value) || (!$val.rejected && !$val.accepted_v && {$val.value})}
                            {$translation.inbox_new_offer_by_user}
							<strong>€ {$val.value|nf}</strong>
							.
                        {/if}
                    {/if}


					<div style="height:20px; background:#fff;"></div>

                    {if (!$val.accepted_v && !$val.accepted_c) || (!$B_customer && $val.accepted_c && !$val.accepted_v) || ($B_customer && $val.rejected && $val.accepted_c)}
						<div class="row inbox-actions-box">

                            {if $val.value}
								<div class="offer-box-text-new col-sm-3" style="margin-right: 20px;">
									<form method="post" action="">
										<span class="offer-box-small-text">{$translation.inbox_accept_bid_header}</span><br/><br/>
										<span class="offer-box-small-text"><strong>EUR {$val.value|nf}</strong></span><br/><br/>
										<input type="hidden" name="accept" value="1">
										<input type="hidden" name="data[value]" value="{$val.value}">
										<input type="checkbox" id="terms-mob" name="terms-mob"
											   value="true"> {$translation.inbox_confirm_buy}<br/>
										<input style="margin-top:10px; width:125px; background:#2ac20f; border:0; border-radius:0;"
											   name="accept" class="btn btn-success" type="submit"
											   value="{$translation.inbox_accept}"
											   onclick="if(!$('#terms-mob').is(':checked')) { alert('{$translation.inbox_error_terms}'); return false;}">
									</form>
								</div>
                            {/if}

                            {if !$B_customer || ($B_customer && $cnt_bidds_left > 0)}
								<div class="offer-box-text-new col-sm-3" style="margin-right: 20px;">
									<form method="post" action="">
										<span class="offer-box-small-text">{$translation.inbox_counterproposal}</span><br/><br/>
										<input type="text" class="xinput" style="width:125px; min-height:35px;"
											   name="data[value]" id="value" placeholder="{$translation.inbox_increase}"
											   value="{$val.value}"><br/>
										<input style="width:125px; background:#2e78b9; border:0; border-radius:0;"
											   name="reject2" class="btn btn-info" type="submit"
											   value="{$translation.inbox_confirm}"><br/>
									</form>
                                    {if $B_customer}
										<br/>
										<span class="offer-box-big-text">{$cnt_bidds_left}</span>
										<span class="offer-box-small-text">&nbsp;{$translation.inbox_bidds_remaining}</span>
                                    {/if}
								</div>
                            {/if}

                            {if $B_customer && $cnt_bidds_left == 0}
								<div class="offer-box-text-new col-sm-3" style="margin-right: 20px;">
									<span class="offer-box-big-text">{$cnt_bidds_left}</span><span
											class="offer-box-small-text">&nbsp;{$translation.inbox_bidds_remaining}</span>
								</div>
                            {/if}

                            {if $B_customerXX}
								<div class="offer-box-text-new col-sm-3">
									<form method="post" action="">
										<span class="offer-box-small-text">{$translation.inbox_text_reject}</span><br/><br/>
										<input style="width:125px; background:#ea8e09; border:0; border-radius:0;"
											   name="reject" class="btn btn-danger" type="submit"
											   value="{$translation.inbox_reject}">
									</form>
								</div>
                            {/if}

						</div>
                    {/if}

					<div class="clearfix"></div>

					<div class="" style="margin-top:25px;">
						<form method="post" action="" style="margin-top:25px;">
							<div class="col-md-12">

                                {if $user2 && $val.accepted_v && !$val.accepted_c}

                                    {$translation.inbox_confirm_text_customer}
									<div class="form-group group">
										<label for="firstname">{$translation.firstname}</label>
										<input type="text" class="form-control xinput" name="data[firstname]"
											   id="firstname" placeholder="{$translation.firstname}" required>
									</div>
									<div class="form-group group">
										<label for="lastname">{$translation.lastname}</label>
										<input type="text" class="form-control xinput" name="data[lastname]"
											   id="lastname" placeholder="{$translation.lastname}" required>
									</div>
									<div class="form-group group">
										<label for="country">{$translation.country}</label>
										<input type="text" class="form-control xinput" name="data[country]" id="country"
											   placeholder="{$translation.country}" required>
									</div>
									<div class="form-group group">
										<label for="street">{$translation.street}</label>
										<input type="text" class="form-control xinput" name="data[street]" id="street"
											   placeholder="{$translation.street}" required>
									</div>
									<div class="form-group group">
										<label for="postalcode">{$translation.postalcode}</label>
										<input type="text" class="form-control xinput" name="data[postalcode]"
											   id="postalcode" placeholder="{$translation.postalcode}" required>
									</div>
									<div class="form-group group">
										<label for="location">{$translation.location}</label>
										<input type="text" class="form-control xinput" name="data[location]"
											   id="location" placeholder="{$translation.location}" required>
									</div>
									<div class="form-group group">
										<label for="phone">{$translation.phone2}</label>
										<input type="text" class="form-control xinput" name="data[phone]" id="phone"
											   placeholder="{$translation.phone}">
									</div>
									<input type="checkbox" id="terms-mob" name="terms-mob" value="true">
                                    {$translation.inbox_confirm_buy}
									<br>
									<input style="margin-top:10px; width:125px; background:#2ac20f; border:0; border-radius:0;"
										   name="accept" class="btn btn-success" type="submit"
										   value="{$translation.inbox_accept}"
										   onclick="if(!$('#terms-mob').is(':checked')) { alert('{$translation.inbox_error_terms}'); return false;}">
									<input type="hidden" name="data[value]" value="{$val.value}">
                                {/if}
							</div>

							<div class="clearfix"></div>
							<a id="accept"></a>
							<div id="accept-box-mob" class="hidden col-md-12" style="margin-top:25px;">
								<input type="checkbox" id="terms-mob" name="terms-mob"
									   value="true"> {$translation.inbox_confirm_buy}
								<br>
								<input style="margin-top:10px; width:125px; background:#2ac20f; border:0; border-radius:0;"
									   name="accept" class="btn btn-success" type="submit"
									   value="{$translation.inbox_accept}"
									   onclick="if(!$('#terms-mob').is(':checked')) { alert('{$translation.inbox_error_terms}'); return false;}">
							</div>

						</form>
					</div>

				</div>
				<div class="col-sm-4">
					div class="offer-box-text-days">
					<span class="offer-box-big-text">{$ad.days}</span><span class="offer-box-small-text"
																			style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;<span
							class="offer-box-big-text">{$ad.persons}</span><span
							class="offer-box-small-text">&nbsp;{$translation.persons}</span>
				</div>

				<div style="height:20px; background:#fff;"></div>

				<div class="offer-box-text-new">
					<span class="offer-box-big-text">&euro; {$ad.value|nf}</span><br/>
					<span class="offer-box-small-text">{$translation.value3}</span>
				</div>

				<div style="height:20px; background:#fff;"></div>

				<div class="offer-box-text-new">
					<form method="post" action="">
						<span class="offer-box-small-text">{$translation.inbox_new_msg}</span>
						<textarea class="xinput" rows="10" cols="50" style="width:95%;margin-top: 10px;"
								  placeholder="{$translation.message}" name="data[content]"></textarea>
						<input class="btn btn-primary" type="submit" value="SENDEN"
							   style="width:125px; border:0; border-radius:0; margin-top:10px;">
					</form>
				</div>
			</div>
			</div>
            {break}
        {/if}

    {/foreach}

    {if !$B_inboxForm}
	</tbody>
</table>
{/if}
