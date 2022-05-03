<div class="container">
	<div class="row">
		<div class="col">
            {if $msg}
				<div class="alert alert-danger" role="alert">
                    {$msg}
				</div>
            {/if}
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 pr-md-5">
            {$pagedata.content}

			<form method="post" action="/{$lang}/create-inquiry/" style="margin-top:20px;">

				<div class="form-group">
					<label for="country">{$translation.country}*</label>
					<select name="data[country]" class="form-control" id="country">
                        {$data.opt_country}
					</select>
				</div>

				<div class="form-group">
					<label for="federal_state">{$translation.federal_state}</label>
					<input type="text" class="form-control" name="data[federal_state]" id="federal_state"
						   placeholder="{$translation.federal_state}" value="{$data.federal_state}">
				</div>
                <br>
				<div class="form-group">
					<label for="accomodationType">{$translation.accomodation_type}*</label>
					<br/>
                    {$data.opt_accomodationType}
				</div>

				<div class="form-group">
					<label for="categories">{$translation.categories}</label>
					<br/>
                    {$data.opt_category}
				</div>

				<div class="form-group">
					<label for="provisions">{$translation.provisions}</label>
					<br/>
                    {$data.opt_provision}
				</div>
                <br>
				<div class="form-group">
					<label>
                        {$translation.flexible_travel_time}*&nbsp;
						<i class="fas fa-question-circle tippy"
						   data-tippy-content="{$translation.inquiry_tooltip_flexible_travel_time|escape:'htmlall'}"></i>
					</label>
					<br>
					<label class="checkbox-inline mr-2">
						<input type="radio" name="data[flexible_travelling_time]" value="1" required
                               {if $data.flexible_travelling_time == '1'}checked{/if}>&nbsp;{$translation.yes}
					</label>
					<label class="checkbox-inline mr-2">
						<input type="radio" name="data[flexible_travelling_time]" value="0" required
                               {if $data.flexible_travelling_time == '0'}checked{/if}>&nbsp;{$translation.no}
					</label>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-6">
						<label for="date_from">{$translation.create_inquiry_from}*</label>
						<input name="data[date_from]" id="date_from" required value="{$data.date_from}">
					</div>
					<div class="form-group col-sm-6">
						<label for="date_until">{$translation.create_inquiry_until}*</label>
						<input name="data[date_until]" id="date_until" required value="{$data.date_until}">
					</div>
					<script>
                        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                        $('#date_from').datepicker({
                            uiLibrary: 'bootstrap4',
                            iconsLibrary: 'fontawesome',
                            format: 'yyyy-mm-dd',
                            maxDate: function () {
                                return $('#date_until').val();
                            }
                        });
                        $('#date_until').datepicker({
                            uiLibrary: 'bootstrap4',
                            iconsLibrary: 'fontawesome',
                            format: 'yyyy-mm-dd',
                            minDate: function () {
                                return $('#date_from').val();
                            }
                        }).on('change', function (e) {
							if($('#date_until').val() != '' && $('#date_from').val() != ''){
								var d1 = new Date($('#date_from').val());
								var d2 = new Date($('#date_until').val());
								var diff = 0;
								if (d1 && d2) {
									diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
								}
								$('#days').val(diff);
							}

						});
					</script>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-4">
						<label for="days">{$translation.nights}*</label>
						<input type="text" class="form-control" maxlength="5" name="data[days]" id="days"
							   placeholder="{$translation.nights}" required value="{$data.days}">
					</div>
					<div class="form-group col-sm-4">
						<label for="adults">{$translation.adults}*</label>
						<input type="text" class="form-control" maxlength="5" name="data[adults]" id="adults"
							   placeholder="{$translation.adults}" required value="{$data.adults}">
					</div>
					<div class="form-group col-sm-4">
						<label for="children">{$translation.children}*</label>
						<input type="text" class="form-control" maxlength="5" name="data[children]" id="children"
							   placeholder="{$translation.children}" required value="{$data.children}">
					</div>
				</div>

				<div class="form-group group">
					<label for="additional_info">{$translation.additional_info}</label>
					<textarea class="form-control" rows="7"
							  placeholder="{$translation.inquiry_additional_info_description}"
							  name="data[additional_info]">{$data.additional_info}</textarea>
				</div>

				<div class="form-group group">
					<label for="budget">{$translation.budget}*</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">€</div>
						</div>
						<input type="number" class="form-control" name="data[budget]" id="budget"
							   placeholder="{$translation.budget}" required value="{$data.budget}">
					</div>
				</div>
                <br>
				<div class="checkbox" style="margin-top:20px;">
					<label>
						<input type="checkbox" name="data[terms]">
                        {$translation.info_terms}
				</div>
                <br>
				<button type="submit" class="btn btn-success mt-3 mb-5">{$translation.inquiry_submit}</button>
			</form>
		</div>
	</div>
</div>
