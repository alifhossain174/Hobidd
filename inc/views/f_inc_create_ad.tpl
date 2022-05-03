

<br>
<div class="container">
    <div class="row">
        <div class="col">
            {if isset($data.offer_id) || isset($smarty.get.id)}
                <h1>{$translation.change_offer}</h1>
            {else}
                <h1>{$translation.new_offer_step1}</h1>
            {/if}


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

            <form method="post" action="" enctype="multipart/form-data" style="margin-top:20px;">

                <input type="hidden" name="data[type]" value="offer">
                {if isset($data.offer_id) || isset($smarty.get.id)}
                    <input type="hidden" name="edit_offer" value="edit">
                    <input type="hidden" name="offer_id" value="{$smarty.get.id}">{/if}
                {* <div class="form-group">
                    <label for="type">{$translation.ad_type}*</label>
                    <select id="type" class="form-control" name="data[type]">
                        {$data.opt_type}
                    </select>
                </div> *}
                {if isset($smarty.get.advertise_id)}
                    <input type="hidden" name="offer_id" value="{$smarty.get.advertise_id}">
                    <input type="hidden" name="edit_offer" value="advertise_offer">
                {/if}

                <div class="form-group">
                    <label for="title">{$translation.text_title}*</label>
                    <input type="text" maxlength="70" class="form-control" name="data[title]" id="title"
                           placeholder="{$translation.text_title}" required value="{$data.title}">
                </div>

                <div class="form-group">
                    <label for="accomodationType">{$translation.accomodation_type}*</label>
                    <select name="data[accomodationType]" class="form-control" id="accomodationType" required
                            value="{$data.accomodationType}">
                        {$data.opt_accomodationType}
                    </select>
                </div>

                <div class="form-group">
                    <label for="categories">{$translation.categories}*</label>
                    <br/>
                    {$data.opt_category}
                </div>
                <br>
                <div class="form-group group">
                    <label for="content">{$translation.description_offer}*</label>
                    <textarea class="form-control" required rows="7" placeholder="{$translation.description_offer}"
                              name="{if $lang == 'de' }data[content]{else}data[contenten]{/if}">{if $lang == 'de' }{$vendor.common_description}{else}{$vendor.common_description_en}{/if}</textarea>
                </div>

                <!-- <div class="form-group group {if $data.type != "raffle"} hidden{/if}" id="xpriceinfo"> -->
                <div class="form-group group" id="xpriceinfo">
                    <label for="priceinfo">{$translation.priceinfo}*</label>
                    <textarea class="form-control" rows="7" placeholder="{$translation.priceinfo}"
                              name="data[priceinfo]">{$data.priceinfo}</textarea>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="days">{$translation.nights}*</label>
                        <input type="text" class="form-control" maxlength="5" name="data[days]" id="days"
                               placeholder="{$translation.nights}" required value="{$data.days}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="persons">{$translation.persons}*</label>
                        <input type="text" class="form-control" maxlength="5" name="data[persons]" id="persons"
                               placeholder="{$translation.persons}" required value="{$data.persons}">
                    </div>
                </div>

                <div class="form-row">
                    {if isset($smarty.get.advertise_id)}
                        <div class="form-group col-sm-6">
                            <label for="date_from">{$translation.create_ad_from}*</label>
                            <input name="data[date_from]" id="date_from" required value="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="date_until">{$translation.create_ad_until}*</label>
                            <input name="data[date_until]" id="date_until" required value="">
                        </div>
                    {else}
                        <div class="form-group col-sm-6">
                            <label for="date_from">{$translation.create_ad_from}*</label>
                            <input name="data[date_from]" id="date_from" required value="{$data.date_from}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="date_until">{$translation.create_ad_until}*</label>
                            <input name="data[date_until]" id="date_until" required value="{$data.date_until}">
                        </div>
                    {/if}
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
                            },
                        });
                        // .on('change', function (e) {
                        // if($('#date_until').val() != '' && $('#date_from').val() != ''){
                        //     var d1 = new Date($('#date_from').val());
                        //     var d2 = new Date($('#date_until').val());
                        //     var diff = 0;
                        //     if (d1 && d2) {
                        //         diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
                        //     }
                        //     $('#days').val(diff);
                        // }

                        // });
                    </script>
                </div>

                <div class="form-group">
                    <label for="value">{if $B_createAdOffer || $B_editAdOffer}{$translation.value2}{else}{$translation.value}{/if}
                        *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&euro;</div>
                        </div>
                        <input type="text" class="form-control" maxlength="5" name="data[value]" id="value"
                               placeholder="{$translation.value}" required value="{$data.value}">
                    </div>
                </div>

                <div class="form-group group{if $data.type == "" || $data.type == "raffle"} {/if}" id="xminprice1">
                    <label for="threshold1">{$translation.min_price1}*</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&euro;</div>
                        </div>
                        <input type="text" class="form-control" name="data[threshold1]" id="threshold1"
                               placeholder="{$translation.min_price1}" value="{$data.threshold1}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" style="width: 100%">
                        <label for="duration_date">
                            {$translation.duration_in_days} (max {$max_duration} {$translation.days})*
                        </label>
                        <div class="input-group">
                            <input name="data[duration_date]" id="duration_date" class="form-control" required
                                   value="{$data.duration_date}"
                                   required {if $duration_readonly}readonly="readonly"{/if}>
                            {if $duration_readonly}
                                <span class="input-group-append" role="right-icon"
                                      style="border-left: 1px solid #ced4da;">
								<button class="btn btn-outline-secondary border-left-0" type="button" readonly
                                        style="background-color: #e9ecef;border: 1px solid #ced4da;">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</button>
							</span>
                            {/if}
                        </div>
                    </div>
                    <script>
                        {if !$duration_readonly}
                        var yesterday = new Date();
                        yesterday.setDate(yesterday.getDate() - 1);

                        var today180 = new Date();
                        today180.setDate(today180.getDate() + 180);

                        $('#duration_date').datepicker({
                            uiLibrary: 'bootstrap4',
                            iconsLibrary: 'fontawesome',
                            format: 'yyyy-mm-dd',
                            minDate: yesterday,
                            maxDate: today180,
                        });
                        {/if}
                    </script>
                </div>

                {*<div style="margin-top: 25px; margin-bottom: 25px;">
                    <strong>{$translation.description_article_location}</strong>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="street">{$translation.street}</label>
                        <input type="text" class="form-control" name="data[street]" id="street"
                               placeholder="{$translation.street}" value="{$data.street}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="postalcode">{$translation.postalcode}</label>
                        <input type="text" class="form-control" name="data[postalcode]" id="postalcode"
                               placeholder="{$translation.postalcode}" value="{$data.postalcode}">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="location">{$translation.location}</label>
                        <input type="text" class="form-control" name="data[location]" id="location"
                               placeholder="{$translation.location}" value="{$data.location}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="country">{$translation.country}</label>
                    <select name="data[country]" class="form-control" id="checkCountry">
                        {$data.opt_country}
                    </select>
                </div>

                <div class="form-group">
                    <label for="federal_state">{$translation.federal_state}</label>
                    <input type="text" class="form-control" name="data[federal_state]" id="federal_state"
                           placeholder="{$translation.federal_state}" value="{$data.federal_state}">
                </div>*}
                <input type="hidden" name="files" id="files" value=""/>
                <div class="form-group profile-gallery add-profile-gallery" style="margin-top:30px;">
                    <h2>{$translation.choose_profile_images_for_add}</h2>
                    <p>{$translation.create_ad_select_images_description}</p>
                    <div class="container" style="padding:0;margin-top: 15px;">
                        {assign var=val value=1}

                        <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                            <div class="carousel-inner">
                                {assign "image_index"  0}
                                {foreach from=$vendor.file key=k item=i}
                                    {assign "image_index" $image_index + 1}
                                    <div class="carousel-item {if $image_index <= 1}active{/if}">
                                        <img class="d-block w-100" src="/img/catalog/{$i->file}">
                                    </div>
                                {/foreach}
                            </div>
                            <a class="carousel-control-prev align-items-end" href="#carouselExampleControls"
                               role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon"
                                      style="width:40px; height:40px; margin-bottom: 40px;" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next align-items-end" href="#carouselExampleControls"
                               role="button" data-slide="next">
                                <span class="carousel-control-next-icon"
                                      style="width:40px; height:40px; margin-bottom: 40px;" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="gallery-row" style="margin-top:15px;">
                            {assign "image_file"  ''}
                            {foreach from=$vendor.file key=k item=i}
                                <div class="gallery {$k + 1}" onclick="addPhotoForAdds('{$i->file}', {$k+1})"
                                     style="cursor: pointer;">
                                    <img src="/img/catalog/{$i->file}">
                                    <span class="choose-image-for-ad {$k+1}"
                                    >
                                        {if ($data.file1 == $i->file)}
                                            <i class="far fa-check-circle"></i>




{elseif ($data.file2 == $i->file)}




                                            <i class="far fa-check-circle"></i>




{elseif ($data.file3 == $i->file)}




                                            <i class="far fa-check-circle"></i>




{elseif ($data.file4 == $i->file)}




                                            <i class="far fa-check-circle"></i>




{elseif ($data.file5 == $i->file)}




                                            <i class="far fa-check-circle"></i>




{elseif ($data.file6 == $i->file)}




                                            <i class="far fa-check-circle"></i>




{elseif ($data.file7 == $i->file)}




                                            <i class="far fa-check-circle"></i>




{elseif ($data.file8 == $i->file)}




                                            <i class="far fa-check-circle"></i>




{elseif ($data.file9 == $i->file)}




                                            <i class="far fa-check-circle"></i>




{elseif ($data.file10 == $i->file)}




                                            <i class="far fa-check-circle"></i>




{else}




                                            <i class="far fa-times-circle"></i>
                                        {/if}
                                        </span>

                                </div>
                                {assign var=val value=$val+1}
                            {/foreach}
                        </div>
                    </div>
                </div>

                <input type="hidden" name="preview" value="true">

                <a href="/{$lang}/angebot-erstellen-abbrechen/">
                    <button type="button" class="btn btn-secondary mt-3 mb-5">{$translation.cancel}</button>
                </a>
                <button type="submit"
                        class="btn btn-success mt-3 mb-5">{if isset($data.offer_id) || isset($smarty.get.id)}{$translation.update}{else}{$translation.new_offer_continue_step_2}{/if}</button>
            </form>

        </div>
        <div class="col-md-4">
            {include file="f_inc_vendor_profile.tpl"}

            <div class="text-center">
                <a href="/{$lang}/hilfe/">
                    <button type="button" class="btn btn-primary my-5 w-75">{$translation.help}</button>
                </a>
            </div>
        </div>
    </div>
</div>
