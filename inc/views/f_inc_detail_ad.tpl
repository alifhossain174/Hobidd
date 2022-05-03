<style>
    .form-control:disabled, .form-control[readonly] {
        background-color: #fff !important;
        opacity: 1;
    }
</style>
<style>

@media(max-width: 767px){
    .container{
        width: auto;
    }
    .carousel {
    padding: 33px 0 0;
}

#ad-info-mobile h2, .mob-pad h2, h2 {
    font-size: 16px;
    margin: 17px 0 0 !important;
    padding: 0;
}
.mob-pad {
    padding-left: 0;
    padding-right: 0;
}
#ad-info-mobile {    padding: 0;
}
.width-90 {
    width: 100%;
    font-size: 13px;
}
.offer-box-small-text {
    font-size: 13px !important;
}
.card-header h4 {
    font-size: 13px;
}
.offer-box-big-text {
    font-size: 36px !important;
}
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 pr-md-5">

            {if $msg}
                <div class="alert alert-danger" role="alert">
                    {$msg}
                </div>
            {/if}

            {if $B_previewAd || $B_previewAdOffer || $B_previewAdInquiry}
                <h1>{$translation.new_offer_step2}</h1>
                <div style="margin-bottom: 50px;">{$translation.new_offer_step2_text}</div>
            {/if}

            <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{$data.file1_700}">
                    </div>
                    {if $data.file2}
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{$data.file2_700}">
                        </div>
                    {/if}
                    {if $data.file3}
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{$data.file3_700}">
                        </div>
                    {/if}
                    {if $data.file4}
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{$data.file4_700}">
                        </div>
                    {/if}
                    {if $data.file5}
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{$data.file5_700}">
                        </div>
                    {/if}
                    {if $data.file6}
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{$data.file6_700}">
                        </div>
                    {/if}
                    {if $data.file7}
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{$data.file7_700}">
                        </div>
                    {/if}
                    {if $data.file8}
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{$data.file8_700}">
                        </div>
                    {/if}
                    {if $data.file9}
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{$data.file9_700}">
                        </div>
                    {/if}
                    {if $data.file10}
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{$data.file10_700}">
                        </div>
                    {/if}
                </div>
                <a class="carousel-control-prev align-items-end" href="#carouselExampleControls" role="button"
                   data-slide="prev">
					<span class="carousel-control-prev-icon" style="width:40px; height:40px; margin-bottom: 40px;"
                          aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next align-items-end" href="#carouselExampleControls" role="button"
                   data-slide="next">
					<span class="carousel-control-next-icon" style="width:40px; height:40px; margin-bottom: 40px;"
                          aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            {*Überschrift*}
            <div id="ad-info-desktop">
                {if ($lang == 'en') && ($data.titleen|count_characters != 0)}
                    <h2 style="margin-top:60px"><!--{$vendor.company}-->{$data.titleen}</h2>
                    <p style="margin-top:20px; margin-bottom:20px; padding-right:15px;" class="ft">
                        {if ($data.contenten|count_characters != 0)} {$data.contenten|nl2br} {else} {$data.content|nl2br}{/if}
                    </p>
                {else}
                    <h2 style="margin-top:60px"><!--{$vendor.company}-->{$data.title}</h2>
                    <p style="margin-top:20px; margin-bottom:20px; padding-right:15px;" class="ft">
                        {if ($lang == 'en')}
                            {if ($data.contenten|count_characters != 0)} {$data.contenten|nl2br} {else} {$data.content|nl2br} {/if}
                        {else}
                            {if ($data.content|count_characters != 0)} {$data.content|nl2br} {else} {$data.contenten|nl2br} {/if}
                        {/if}
                    </p>
                {/if}
            </div>

            {*<div>
                <h2 style="margin-top:60px">{$translation.categories}</h2>
                <p style="margin-top:20px; margin-bottom:20px; padding-right:15px;" class="ft">
                        {{$opt_category}|nl2br}
                    </p>
            </div>*}


            <div id="ad-info-mobile" class="padding10">
                {if ($lang == 'en') && ($data.titleen|count_characters != 0)}
                    <h2 style="margin-top:60px"><!--{$vendor.company}-->{$data.titleen}</h2>
                    <p style="margin-top:20px; margin-bottom:20px; padding-right:15px;" class="ft">
                        {if ($data.contenten|count_characters != 0)} {$data.contenten|nl2br} {else} {$data.content|nl2br} {/if}
                    </p>
                {else}
                    <h2 style="margin-top:60px"><!--{$vendor.company}-->{$data.title}</h2>
                    <p style="margin-top:20px; margin-bottom:20px; padding-right:15px;" class="ft">
                        {if ($lang == 'en')}
                            {if ($data.contenten|count_characters != 0)} {$data.contenten|nl2br} {else} {$data.content|nl2br} {/if}
                        {else}
                            {if ($data.content|count_characters != 0)} {$data.content|nl2br} {else} {$data.contenten|nl2br} {/if}
                        {/if}
                    </p>
                {/if}
            </div>
            {if count($data.opt_facility) > 0}
                <div class="mob-pad">
                    <h2 style="margin-top:50px;">{$translation.facilities}</h2>
                    <br>
                    <div class="row">
                        {foreach from=$data.opt_facility item=facility}
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                <div class="ad-facility-box">
                                    {if !empty($facility.icon)}
                                        <div class="ad-facility-box__icon">
                                            <i class="fas fa-{$facility.icon}"></i>
                                        </div>
                                    {/if}
                                    <div class="ad-facility-box__text">
                                        {$facility.name}
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>
            {/if}
            {if $smarty.now <= $data.end_date|@strtotime}
                {if $data.headline|count_characters != 0  || $data.headline_de|count_characters != 0 || $data.text|count_characters != 0  || $data.text_de|count_characters != 0}
                    <div class="mob-pad" style="background: #FAFAFA;    ">
                        {*                        height: 31%;*}
                        {if ($lang == 'en')}
                        <a href="{$data.link}" style="color: #000 !important;" target="_blank">
                            {/if}
                            {if ($lang == 'de')}
                            <a href="{$data.link_de}" style="color: #000 !important;" target="_blank">
                                {/if}
                                {if $data.headline|count_characters != 0  || $data.headline_de|count_characters != 0}
                                    {if ($lang == 'en')}
                                        {if $data.headline|count_characters != 0}
                                            <h2 style="margin-top:60px;font-size: 40px !important;font-weight: 750 !important;padding-top: 15px;color: #1ea6c2 !important;">
                                                {$data.headline}
                                            </h2>
                                        {/if}
                                    {/if}
                                    {if ($lang == 'de')}
                                        {if $data.headline_de|count_characters != 0}
                                            <h2 style="margin-top:60px;font-size: 40px !important;font-weight: 750 !important;padding-top: 15px;color: #1ea6c2 !important;">
                                                {$data.headline_de}
                                            </h2>
                                        {/if}
                                    {/if}
                                {/if}
                                {if $data.text  || $data.text_de}
                                    {if ($lang == 'en')}
                                        {if $data.text|count_characters != 0}
                                            <p style="margin-top:15px; margin-bottom:35px; padding-right:15px;"
                                               class="ft">
                                                {$data.text|nl2br}
                                            </p>
                                        {/if}
                                    {/if}
                                    {if ($lang == 'de')}
                                        {if $data.text_de|count_characters != 0}
                                            <p style="margin-top:15px; margin-bottom:35px; padding-right:15px;"
                                               class="ft">
                                                {$data.text_de|nl2br}
                                            </p>
                                        {/if}
                                    {/if}
                                {/if}
                                {if $data.image}
                                    <div class="">
                                        <img class="d-block w-100" src="/img/catalog/{$data.image}">
                                    </div>
                                {/if}
                            </a>


                    </div>
                {/if}
            {/if}
            <div class="mob-pad">
                <h2 style="margin-top:50px;">{$translation.special_offer_heading}</h2>
                
                {if ($lang == 'en') && ($data.titleen|count_characters != 0)}
                    <p>{$data.priceinfoen|nl2br}</p>
                {else}
                    <p>{$data.priceinfo|nl2br}</p>
                {/if}
                
            </div>

            <div>
                <h2 style="margin-top:50px;">{$translation.travel_period}</h2>
                
                <p>{$date_from_day}.{$date_from_month}.{$date_from_year} - {$date_until_day}.{$date_until_month}
                    .{$date_until_year}</p>
                
            </div>

            {if $user2.id}
                {if $desired_date}
                    <div>
                        <div id="changeperiod">
                            <h2 style="margin-top:50px;">{$translation.selected_travelling_date}</h2>
                           
                            <p>{$date_desired_from_day}.{$date_desired_from_month}.{$date_desired_from_year}
                                - {$date_desired_until_day}.{$date_desired_until_month}.{$date_desired_until_year}</p>
                            <button type="button" id="clickTravellingPeriod"
                                    class="btn btn-success mt-3 mb-5">{$translation.change_travel_period}
                            </button>
                        </div>

                        <div id="editPeriod" style="display:none;">
                            <form method="post">
                                <h2 style="margin-top:50px;">{$translation.preferred_travelling_date}</h2>
                                
                                <div style="width: 57%;">
                                    <input readonly data-days='{$data.days}'
                                           data-end="{$date_until_day}/{$date_until_month}/{$date_until_year}"
                                           data-start="{$date_from_day}/{$date_from_month}/{$date_from_year}"
                                           type="text"
                                           name="data[desired_date]" class="d-block my-4 mx-auto form-control"
                                           value="{$desired_date}">

                                </div>
                                <input type="hidden" name="desired_date_submit" value="true">
                                <input type="hidden" name="offer_desired_id" value="{$data.id}">
                                <button type="submit" name="submit_desired_date"
                                        class="btn btn-secondary mt-3 mb-5"
                                        value="cancel">{$translation.desired_cancel_btn}
                                </button>
                                <button type="submit"
                                        class="btn btn-success mt-3 mb-5">{$translation.desired_preview_btn}
                                </button>
                            </form>
                        </div>
                    </div>
                    <script>
                        $('#clickTravellingPeriod').on('click', function () {
                            $('#changeperiod').hide();
                            $('#editPeriod').show();
                        });
                    </script>
                {else}
                    <div>
                        {if $msg_desired_date}
                            <div class="alert alert-danger" role="alert">
                                {$msg_desired_date}
                            </div>
                        {/if}
                        <form method="post">
                            <h2 style="margin-top:50px;">{$translation.preferred_travelling_date}</h2>
                            
                            <div style="width: 60%;">
                                <input readonly data-days='{$data.days}'
                                       data-end="{$date_until_day}/{$date_until_month}/{$date_until_year}"
                                       data-start="{$date_from_day}/{$date_from_month}/{$date_from_year}" type="text"
                                       name="data[desired_date]" class="d-block my-4 mx-auto form-control">

                            </div>
                            <input type="hidden" name="desired_date_submit" value="true">
                            <input type="hidden" name="offer_desired_id" value="{$data.id}">
                            <button type="submit" name="submit_desired_date"
                                    class="btn btn-secondary mt-3 mb-5" value="cancel">{$translation.desired_cancel_btn}
                            </button>
                            <button type="submit"
                                    class="btn btn-success mt-3 mb-5">{$translation.desired_preview_btn}
                            </button>
                        </form>
                    </div>
                {/if}
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
                <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                <script>
                    const self = $('input[name="data[desired_date]"]')
                    var startDate;
                    var endDate;
                    self.daterangepicker({
                        applyButtonClasses: 'd-none',
                        showDropdowns: false,
                        opens: "left",
                        drops: "down",
                        autoApply: true,
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        // startDate: self.data('start'),
                        // endDate: self.data('end'),
                        minDate: self.data('start'),
                        maxDate: self.data('end'),
                        locale: {
                            format: "DD/MM/YYYY"
                        },
                    }, function (start) {
                        console.log("Callback has been called!");
                        $('input[name="data[desired_date]"]').val(start.format('DD/MM/YYYY') + ' - ' + moment(start, "DD-MM-YYYY").add(self.data('days'), 'days').format('DD/MM/YYYY'));
                        startDate = start;
                        endDate = start;

                    });
                </script>
            {/if}
            
            {if ($lang == 'en') && ($data.cancellation_conditions_en|count_characters != 0)}
                <h2 style="margin-top:50px;">{$translation.cancellation_conditions}</h2>
                
                <p>
                    {$data.cancellation_conditions_en|nl2br}
                </p>
                
            {/if}
            {if ($lang == 'de') && ($data.cancellation_conditions|count_characters != 0)}
                <h2 style="margin-top:50px;">{$translation.cancellation_conditions}</h2>
                
                <p>
                    {$data.cancellation_conditions|nl2br}
                </p>
               
            {/if}

            <div class="social-links" style="margin-top:25px; margin-bottom:10px;">

                {literal}
                    <script>
                        window.fbAsyncInit = function () {
                            FB.init({
                                appId: '944325375604618',
                                xfbml: true,
                                version: 'v2.5'
                            });
                        };
                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) {
                                return;
                            }
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/de_AT/sdk.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                {/literal}

            </div>

            {if $B_previewAd}
                <a href="/{$lang}/inserat-bearbeiten/">
                    <button type="button" class="btn btn-secondary mt-3 mb-5">{$translation.change_offer}</button>
                </a>
                <a href="/{$lang}/inserat-speichern/">
                    <button type="button"
                            class="btn btn-success ml-2 mt-3 mb-5">{$translation.new_offer_continue_step_3}</button>
                </a>
            {/if}

            {if $B_previewAdInquiry}
                <a href="/{$lang}/inquiry/{$inquiry_id}/">
                    <button type="button" class="btn btn-secondary mt-3 mb-5">{$translation.change_offer}</button>
                </a>
                <a href="/{$lang}/inserat-anfrage-speichern/{$inquiry_id}/">
                    <button type="button"
                            class="btn btn-success ml-2 mt-3 mb-5">{$translation.new_offer_continue_step_3}</button>
                </a>
            {/if}

            {if $B_previewAdOffer}
                <p style="margin-top:75px;">
                    <a class="btn btn-default green_btn"
                       href="/{$lang}/inserat-angebot-bearbeiten/">{$translation.change_offer}</a>
                    <a class="btn btn-default green_btn"
                       href="/{$lang}/inserat-angebot-speichern/">{$translation.new_offer_continue_step_3}</a>
                </p>
            {/if}

            {if $link_back}
                <a href="{$link_back}">
                    <button type="button" class="btn btn-success mt-3 mb-5">{$translation.back_to_results}</button>
                </a>
            {/if}

        </div>
        <div class="col-md-4">

            {if $vendor.id != 233}
                {include file="f_inc_vendor_profile.tpl"}
                <div style="height:20px; background:#fff;"></div>
            {/if}

            {if ($data.type == "raffle" || $data.type == "raffle_offer") && $data.raffle_type == 1}
                <div class="offer-box-text-like">
                    {if isset($user.id) && ($user.id == $vendor.id)}
                        <span class="offer-box-normal-text">{$translation.raffle_like_text_vendor}</span>
                    {else}
                        <span class="offer-box-normal-text">{$translation.raffle_like_text}</span>
                    {/if}

                    <br/>

                    {literal}
                        <script>
                            window.fbAsyncInit = function () {
                                FB.init({
                                    appId: '944325375604618',
                                    xfbml: true,
                                    version: 'v2.5'
                                });
                            };
                            (function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) {
                                    return;
                                }
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/de_AT/sdk.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                    {/literal}

                    <div style="margin-top:25px;margin-bottom:25px;" class="fb-like"
                         data-share="{if $B_admin || true}true{else}false{/if}"
                         data-href="{$site_url}{$current_path}"
                         data-layout="button"
                         data-action="like"
                         data-size="large"
                         data-show-faces="false">
                    </div>

                    {if $user.id != $vendor.id}
                        <span class="offer-box-small-text">
                {$translation.description_win}
                </span>
                    {/if}

                </div>
                <div style="height:20px; background:#fff;"></div>
            {/if}

            {if ($data.type == "raffle" || $data.type == "raffle_offer") && $data.raffle_type == 2}
                <div class="offer-box-text-new">
                    <a href="{$data.raffle_url}" target="_blank">
                        <button type="button" class="btn btn-info width-90"><i class="fas fa-thumbs-up fa-2x"
                                                                               style="margin-right:10px; vertical-align:middle;"></i>{$translation.button_submit_draw}
                        </button>
                    </a>
                    <div style="height:5px; background:#fff;"></div>
                </div>
                <div style="height:20px; background:#fff;"></div>
            {/if}

            {if $data.type == "raffle"}
                <div class="offer-box-text-new">
                    <span class="offer-box-small-text">{$translation.offer_time_left}</span><br/>
                    <span class="offer-box-normal-text">{$time_left}</span>
                </div>
                <div style="height:20px; background:#fff;"></div>
            {/if}
            {*<div class="container d-none d-lg-block mb-4 mt-2" style="background: #cabcb4;">
            <div class="row justify-content-center align-items-center py-4">
            <div class="col px-5">
                <h2 class="big-header">2 NÄCHTE<br>4 PERSONEN</h2>
            </div>
            </div>
            </div>*}
            {*<div class="container d-none d-lg-block mb-4 mt-2" style="background: #cabcb4;">
            <div class="row justify-content-center align-items-center py-4">
            <div class="col px-5">
                <h1 class="big-header">PREIS<br>EUR 249,00</h1>
            </div>
            </div>
            </div>*}

            {*<div class="offer-box-text-new">
                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.hobidd.com{$current_path}" target="_blank"><button type="button" class="btn btn-primary width-90 background-color-facebook border-color-facebook"><i class="fab fa-facebook-square fa-2x" style="margin-right:10px; vertical-align:middle;"></i>{$translation.share_it_on_facebook}</button></a>
                <div style="height:10px; background:#fff;"></div>
                <a href="https://twitter.com/home?status=https%3A//www.hobidd.com{$current_path}" target="_blank"><button type="button" class="btn btn-primary width-90 background-color-twitter border-color-twitter"><i class="fab fa-twitter-square fa-2x" style="margin-right:10px; vertical-align:middle;"></i>{$translation.share_it_on_twitter}</button></a>
                <div style="height:5px; background:#fff;"></div>
            </div>*}

            {*<div style="height:20px; background:#fff;"></div>*}

            {*<div class="container mb-5" style="background: #dbc4b7;">

            <div class="row justify-content-center align-items-center py-5">
            <div class="col px-5">
            <h1 class="big-header">
                FRAGEn ?
                </h1>
            </div>
            </div>
            </div>*}

            <div class="offer-box-text-days">


                {*<span class="big-text">{$data.days}</span>
                <span class="small-text" style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;*}

                <span class="offer-box-big-text lightblue1">{$data.days}</span>
                <span class="offer-box-small-text" style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;


                <span class="offer-box-big-text lightblue1">{$data.persons}</span>
                <span class="offer-box-small-text"
                      style="text-transform: uppercase;">&nbsp;{$translation.persons}</span>


                {*<span class="offer-box-big-text">{$data.days}</span>
                <span class="offer-box-small-text" style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;*}


            </div>


            <div style="height:20px; background:#fff;"></div>

            <div class="offer-box-text-new">
                <span class="offer-box-small-text">{$translation.value3}</span><br/>
                <span class="offer-box-big-text lightblue1">&euro; {$data.value|nf}</span>
            </div>

            {if $smarty.now <= $data.end_date|@strtotime}
                {if ($data.price_reduction != null)}
                    <div style="height:20px; background:#fff;"></div>
                    <div class="offer-box-text-new" style="    padding-right: 10px; !important;">
                        <span class="offer-box-small-text"
                              style="color: #444444 !important;">{$translation.price_reduction}</span><br/>
                        <span class="offer-box-big-text lightblue1"
                              style="color: #444444 !important;">&euro; {$data.price_reduction|nf}</span>
                    </div>
                    <div style="height:20px; background:#fff;"></div>
                    <div class="offer-box-text-new">
                        <span class="offer-box-small-text"
                              style="color: #0099b9 !important;">{$translation.reduced_price}</span><br/>
                        <span class="offer-box-big-text lightblue1"
                              style="color: #0099b9 !important;    padding-right: 25px;
"> &euro; {($data.value -$data.price_reduction)|nf }</span>
                    </div>
                {/if}
            {/if}

            <div style="height:20px; background:#fff;"></div>


            {if $B_biddBox && $user2.id}
                <div class="offer-box-text-new">
                    <form method="post" action="">
                        <input id="xbidd" type="text" class="form-control" name="xdata[amount]" value=""
                               style="width:90%; height:50px; display:inline; border:1; border-radius:0; margin-top: 10px; margin-bottom: 10px;"
                               placeholder="{$translation.input_insert_your_bidd}">
                        <button type="submit" name="bidd" class="btn btn-success width-90"><i
                                    class="far fa-check-circle fa-2x"
                                    style="margin-right:10px; vertical-align:middle;"></i>{$translation.bidd}</button>
                        <div style="height:10px; background:#fff;"></div>
                    </form>

                    <form method="post" action="">
                        <input type="hidden" name="xdata[amount]" value="{$data.value}">
                        <button type="submit" name="buyNow" class="btn btn-success width-90 ucase"><i
                                    class="fas fa-cart-plus fa-2x"
                                    style="margin-right:10px; vertical-align:middle;"></i>{$translation.buy_now}
                        </button>
                        <div style="height:10px; background:#fff;"></div>
                    </form>

                    <a href="{$lang}/hilfe/">
                        <button type="button"
                                class="btn btn-success background-color-lightgreen1 border-color-lightgreen1 width-90">
                            <i class="fas fa-question-circle fa-2x"
                               style="margin-right:10px; vertical-align:middle;"></i>{$translation.help}</button>
                    </a>
                    <div style="height:10px; background:#fff;"></div>
                </div>
                {*<div class="offer-box-text-new">
					<a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.hobidd.com{$current_path}" target="_blank"><button type="button" class="btn btn-primary width-90 background-color-facebook border-color-facebook"><i class="fab fa-facebook-square fa-2x" style="margin-right:10px; vertical-align:middle;"></i>{$translation.share_it_on_facebook}</button></a>
					<div style="height:10px; background:#fff;"></div>
					<a href="https://twitter.com/home?status=https%3A//www.hobidd.com{$current_path}" target="_blank"><button type="button" class="btn btn-primary width-90 background-color-twitter border-color-twitter"><i class="fab fa-twitter-square fa-2x" style="margin-right:10px; vertical-align:middle;"></i>{$translation.share_it_on_twitter}</button></a>
					<div style="height:5px; background:#fff;"></div>
				</div>*}
                <div style="height:20px; background:#fff;"></div>
            {/if}


            {* BUTTONS GREEN BIETEN *}

            {if $B_biddBox && !$user2.id && !$user.id}
                <div class="offer-box-text-new">
                    <a href="{$lang}/login/">
                        <button type="button" class="btn btn-success width-90"><i class="far fa-check-circle fa-3x"
                                                                                  style="margin-right:10px; vertical-align:middle;"></i>{$translation.button_submit_price_suggestion}
                        </button>
                    </a>
                    <div style="height:10px; background:#fff;"></div>
                    <a href="{$lang}/login/">
                        <button type="button" class="btn btn-success width-90 ucase"><i class="fas fa-cart-plus fa-3x"
                                                                                        style="margin-right:10px; vertical-align:middle;"></i>{$translation.buy_now}
                        </button>
                    </a>
                    <div style="height:10px; background:#fff;"></div>
                    <a href="{$lang}/hilfe/">
                        <button type="button"
                                class="btn btn-success background-color-lightgreen1 border-color-lightgreen1 width-90">
                            <i class="fas fa-question-circle fa-3x"
                               style="margin-right:10px; vertical-align:middle;"></i>{$translation.help}</button>
                    </a>
                    <div style="height:5px; background:#fff;"></div>
                </div>
                <div style="height:20px; background:#fff;"></div>
            {/if}

            {* BUTTON GROSS OHNE RAHMEN*}

            {*<div class="container d-none d-lg-block mb-4 mt-2" style="background: #00a64c;">
		   <div class="row justify-content-center align-items-center py-4">
		   <div class="col px-5">
			   <h2 class="big-header">KAUFEN</h2>
		   </div>
		   </div>
		   </div>*}
            <div class="offer-box-text-new">
                <a target="_blank"
                   href="https://maps.google.at/?q={if $data.street && $data.postalcode && $data.location}{$data.street} {$data.postalcode} {$data.location}{else}{$vendor.street} {$vendor.postalcode} {$vendor.location}{/if}">
                    <span class="offer-box-small-text" style="padding-top: 20px;">{$translation.localize}</span><br/>
                    <span class="offer-box-normal-text">Google Maps</span>
                </a>
            </div>

            <div style="height:20px; background:#fff;"></div>

            <div class="offer-box-text-new">
                <a href="/{$lang}/anbieter/{$data.vendor_id}/">
					<span class="offer-box-small-text"
                          style="padding-top: 20px;">{$translation.more_offers_vendor}</span><br/>
                    <span class="offer-box-normal-text">{$vendor.company}</span>
                </a>
            </div>

            <div style="height:20px; background:#fff;"></div>

            {if $vendor.id != 233}
                <div class="offer-box-text-new">
                    <a target="_blank" href="http://{$vendor.website}">
						<span class="offer-box-small-text"
                              style="padding-top: 20px;">{$translation.website_of}</span><br/>
                        <span class="offer-box-normal-text">{$vendor.company}</span>
                    </a>
                </div>
                <div style="height:20px; background:#fff;"></div>
            {/if}


            <div class="offer-box-text-new">
                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.hobidd.com{$current_path}"
                   target="_blank">
                    <button type="button"
                            class="btn btn-primary width-90 background-color-facebook border-color-facebook"><i
                                class="fab fa-facebook-square fa-2x"
                                style="margin-right:10px; vertical-align:middle;"></i>{$translation.share_it_on_facebook}
                    </button>
                </a>
                <div style="height:10px; background:#fff;"></div>
                <a href="https://twitter.com/home?status=https%3A//www.hobidd.com{$current_path}" target="_blank">
                    <button type="button"
                            class="btn btn-primary width-90 background-color-twitter border-color-twitter"><i
                                class="fab fa-twitter-square fa-2x"
                                style="margin-right:10px; vertical-align:middle;"></i>{$translation.share_it_on_twitter}
                    </button>
                </a>
                <div style="height:5px; background:#fff;"></div>
            </div>
        </div>
    </div>
    {if $data.raffle_type == 2}
    <div class="row">
        <div class="col">
            <h2 style="margin-top:50px;">{$translation.raffle_legal_heading}</h2>
            <br>
            <p>{$data.raffle_legal|nl2br}</p>
        </div>
        <div>
            {/if}
        </div>

