


<div class="container">

    <br>

            {*<div {if $B_profileForm} hidden{/if} >
				<h2>{$translation.reg_package}</h2>
            </div>*}

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

            {if $B_registerForm || $B_registerFormOffer}
                <div class="card mb-3">
                    <div class="card-header text-white" style="background:{$package.color};">
                        {$package.name}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{if $package.id == "1"}
                                {$translation.text_basic_package}
                            {elseif $package.id == "4"}
                                {$translation.priceinfo_zero}
                            {else}
                                {$translation.cost} € {$package.price|nf} {$translation.priceinfo_package}
                            {/if}</p>
                    </div>
                </div>
            

            {/if}

            <br>
            <div>
				<h2>{$translation.reg_common}</h2>
            </div>

            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group group">
                    <label for="company">{$translation.company_name}*</label>
                    <input type="text" class="form-control" name="data[company]" id="company"
                           placeholder="{$translation.company}" value="{$data.company}" required>
                </div>

                <div class="form-group group">
                    <label for="accomodationType">{$translation.accomodation_type}*</label>
                    <select name="data[accomodationType]" class="form-control" id="accomodationType" required
                            value="{$data.accomodationType}">
                        {$data.opt_accomodationType}
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="street">{$translation.street}*</label>
                        <input type="text" class="form-control" name="data[street]" id="street"
                               placeholder="{$translation.street}" value="{$data.street}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="postalcode">{$translation.postalcode}*</label>
                        <input type="text" class="form-control" name="data[postalcode]" id="postalcode"
                               placeholder="{$translation.postalcode}" value="{$data.postalcode}" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="location">{$translation.location}*</label>
                        <input type="text" class="form-control" name="data[location]" id="location"
                               placeholder="{$translation.location}" value="{$data.location}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="country">{$translation.country}*</label>
                    <select name="data[country]" class="form-control" id="checkCountry">
                        {$data.opt_country}
                    </select>
                </div>

                <div class="form-group">
                    <label for="federal_state">{$translation.federal_state}*</label>
                    <input type="text" class="form-control"
                           name="{if $lang == 'de'}data[federal_state] {else} data[federal_state_en]{/if}"
                           id="federal_state"
                           placeholder="{$translation.federal_state}"
                           value="{if $lang == 'de' }{$data.federal_state}{else}{$data.federal_state_en}{/if}" required>
                </div>

                <div class="form-group {if !$display_uid_fild} hidden{/if}" id="uid-container">
                    <label for="uid">{$translation.vat_number}</label>
                    <input type="text" class="form-control" name="data[uid]" id="uid" value="{$data.uid}"
                           placeholder="{$translation.vat_number}">
                </div>
                <br>
            <div>
				<h2>{$translation.reg_contact}</h2>
            </div>

                <div class="form-group">
                    <label for="mobile">{$translation.description_mobile_number}

                        {$translation.description_mobile_number_format}</label>
                    <input type="text" class="form-control" name="data[mobile]" id="mobile"
                           placeholder="0043 664 1234567"
                           value="{$data.mobile}"{if $B_registerForm || $B_registerFormOffer} required{/if}>
                </div>

                <div class="form-group">
                    <label for="phone">{$translation.phone}</label>
                    <input type="text" class="form-control" name="data[phone]" id="phone" placeholder="0043 664 1234567"
                           value="{$data.phone}">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">{$translation.email}*</label>
                        <input type="text" class="form-control" name="data[email]" id="email"
                               placeholder="{$translation.email}" value="{$data.email}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="website">{$translation.website}</label>
                        <input type="text" class="form-control" name="data[website]" id="website"
                               placeholder="{$translation.website}" value="{$data.website}">
                    </div>
                </div>
                
                <br>
                <div {if $B_registerForm} hidden{/if} >
				<h2>{$translation.pro_house}&nbsp;<i class="fas fa-info-circle tippy"
                               data-tippy-content="{$translation.profile_tooltip_common_description|escape:'htmlall'}"></i>
                </div></h2>


                <div class="form-row" {if $B_registerForm || $B_registerFormOffer} hidden{/if}>
                    <div class="form-group col-md-12">
                        {*<label for="common_description">{$translation.common_description}
                            <i class="fas fa-info-circle tippy"
                               data-tippy-content="{$translation.profile_tooltip_common_description|escape:'htmlall'}"></i>
                        </label>*}
                        <textarea id="common_description" class="form-control" rows="7"
                                  placeholder="{$translation.common_description}"
                                  name="{if $lang == 'de'}data[common_description] {else} data[common_description_en]{/if}">{if $lang == 'de' }{$data.common_description}{else}{$data.common_description_en}{/if}
						</textarea>
                    </div>
                </div>

                <br>
                <div {if $B_registerForm} hidden{/if} >
				<h2>{$translation.pro_faci}&nbsp;{*<i class="fas fa-info-circle tippy"
                               data-tippy-content="{$translation.profile_tooltip_common_description|escape:'htmlall'}"></i>*}
                </div></h2>


                <div class="form-row" {if $B_registerForm || $B_registerFormOffer} hidden{/if}>
                    <div class="form-group col-md-12">
                        {*<label for="facility">
                            {$translation.facilities}&nbsp;
                            <i class="fas fa-info-circle tippy"
                               data-tippy-content="{$translation.profile_tooltip_facilities|escape:'htmlall'}"></i>
                        </label>*}
                        
                        {$data.opt_facility}
                    </div>
                </div>

                <br>
                <div {if $B_registerForm} hidden{/if} >
				<h2>{$translation.pro_cancelation}
                </div></h2>


                <div class="form-row" {if $B_registerForm || $B_registerFormOffer} hidden{/if}>
                    <div class="form-group col-md-12">
                        {*<label for="cancellation_conditions">{$translation.profile_cancellation_conditions}</label>*}
                        <textarea id="cancellation_conditions" class="form-control" rows="7"
                                  placeholder="{$translation.profile_cancellation_conditions}"
                                  name="{if $lang == 'de'}data[cancellation_conditions] {else} data[cancellation_conditions_en]{/if}">{if $lang == 'de' }{$data.cancellation_conditions}{else}{$data.cancellation_conditions_en}{/if}</textarea>
                    </div>
                </div>
                
                <br>
                <div>
				<h2>{$translation.reg_password}</h2>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="your choice">{if $B_registerForm || $B_registerFormOffer}{$translation.password}{else}{$translation.password2}{/if}
                            *</label>
                        <input type="password" class="form-control" name="data[password]" id="password"
                               placeholder="{$translation.password}" {if $B_registerForm || $B_registerFormOffer} required{/if}>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_repeat">{$translation.repeat_password}*</label>
                        <input type="password" class="form-control" name="data[password_repeat]" id="password_repeat"
                               placeholder="{$translation.password}" {if $B_registerForm || $B_registerFormOffer} required{/if}>
                    </div>
                </div>

                <div class="form-group {if $B_registerForm || $B_registerFormOffer} hidden {/if}" style="margin-top:30px;">
                    <h2>{$translation.upload_profile_images_heading}</h2>
                    <br>
                    <p>{$translation.upload_profile_images_description}</p>
                </div>
                <br>
                <div class="form-row upload-gallery-photos form-group" {if $B_registerForm || $B_registerFormOffer} hidden{/if}>
                    <div class="form-group col-12  d-flex pl-0 align-items-center">
                        <div class="file1 mr-3">
                            <label class="btn btn-secondary"> <span>{$translation.upload_profile_images_btn}</span>
                                <input type="file" class="form-control-file profile-gallery-files" id="file1"
                                       name="file1" size="200" onChange="addImage($(this))"/> </label>
                        </div>
                        <div class="file1-desc">{$translation.upload_profile_btn_description}</div>
                    </div>

                </div>

                <div class="form-group profile-gallery profile-page-gallery" {if $B_registerForm || $B_registerFormOffer || !$vendor.file} hidden{/if}>
                    <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                        <div class="carousel-inner">
                            {assign "image_index"  0}
                            {foreach from=$vendor.file key=k item=i}
                                {assign "image_index" $image_index + 1}
                                <div class="carousel-item {if $image_index <= 1}active{/if}">
                                    <img class="d-block w-100" src="/img/catalog/{$i["file"]}">
                                </div>
                            {/foreach}
                        </div>
                        <a class="carousel-control-prev align-items-end" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon"
                                  style="width:40px; height:40px; margin-bottom: 40px;" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next align-items-end" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon"
                                  style="width:40px; height:40px; margin-bottom: 40px;" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="gallery-row">
                        {assign var=val value=1}
                        {foreach from=$vendor.file key=k item=i}
                            <div class="gallery {$k + 1}">
                                <img src="/img/catalog/{$i["file"]}">
                                <span class="delete-pic" onclick="deletePhotoFromGallery('{$i["file"]}', {$k+1})"><i
                                            class="far fa-times-circle"></i></span>
                            </div>
                            {assign var=val value=$val+1}
                        {/foreach}
                    </div>
                </div>

            
                <div {if $B_profileForm} hidden{/if} >
				<h2>{$translation.reg_confirm}</h2>
                </div>

            

                {if $B_registerForm || $B_registerFormOffer}
                    <div class="g-recaptcha" data-sitekey="6Ld2phMTAAAAANjahu7CaXFbOSJVeabrTbLv4Flq"></div>
                    {* <div class="g-recaptcha" data-sitekey="6Lfvz_8UAAAAADspzCxGiOzcWgDsD0ndiCuT238f"></div> *}
                    <br>
                    <div class="checkbox" style="margin-top:20px;">
                        <label>
                            <input type="checkbox" name="data[terms]">
                            {$translation.info_terms}
                    
                    </div>
                    
                    
                        
                {/if}

            <br>
                     
                <div>
                    <button type="submit"
                            class="btn btn-success mt-3 mb-5">{if $B_registerForm || $B_registerFormOffer}{$translation.register_and_buy}{else}{$translation.change_data}{/if}</button>
                </div>
                    
            </form>
        </div>
        <div class="col-md-4">
            {if $B_profileForm}
                {include file="f_inc_vendor_profile.tpl"}
            {else}
                &nbsp;
            {/if}
        </div>
    </div>
</div>
			