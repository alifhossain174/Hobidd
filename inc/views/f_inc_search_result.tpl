{* WERBUNG EASYTEHTM ober dem suchbanner*}
{*<div class="container d-none d-lg-block mb-4 mt-0"
            <div>
				<img src="/img/02.jpg">
			</div>
            </div>
            <br>
            <br>*}
<br>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded',function(){
        $('body').on('click','.clear_input',function(event){
            event.preventDefault();
            $('body').find('.xsearch').val('');
            $('body').find('.xsearch').focus();
        });
    },false);
</script>
<div class="container d-lg-block mb-4 mt-0">
    <div class="align-items-center border-1">
        <div class="search-bar-wrap" style="padding-top: -260px;">
            <div class="center-block">
                <form method="post" action="/{$lang}/kategorie/suche/" style="text-align: center;">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 p-0 resizeable">
                            <div class="form-group">
                                {*<label>Destination</label>*}
                                <label for="filter_travel_period">{$translation.destination}</label>
                                {if $filter.postalcode}
                                    <input id="xsearch" type="text" class="form-control xsearch" name="filter[postalcode]"
                                           value="{$filter.postalcode}"
                                           style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
                                           <a href="#" class="clear_input"><i class="fas fa-window-close"></i></a>
                                {else}
                                    <input id="xsearch" type="text" class="form-control xsearch" name="filter[postalcode]"
                                           placeholder="{$translation.search_placeholder}"
                                           style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
                                           <a href="#" class="clear_input"><i class="fas fa-window-close"></i></a>
                                {/if}
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 p-0">
                            <div class="form-group travel-drop">
                                <label for="filter_travel_period">{$translation.travel_period}</label>
                                <select name="filter[filter_travel_period]" class="form-control js-example-basic-single seach-dropdown" id="filter_travel_period">
                                    <option value="0">{$translation.all}</option>
                                    {$data.opt_travelling_period}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12 p-0">
                            <div class="form-group topic-drop">
                                <label for="filter_category">{$translation.categories}</label>
                                <select name="filter[filter_category]" class="form-control js-example-basic-single seach-dropdown" id="filter_category">
                                    <option value="0">{$translation.all}</option>
                                    {$data.opt_category}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 p-0">
                            <div class="search-btn">
                                <button type="submit" class="btn btn-default blue_btn">{$translation.search}</button>
                                <a href="/{$lang}/search-help"><i class="fas fa-question fa-1x"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<br>

{*WERBEBOX EASYTHERM nach Suchfeld*}
{*<div class="container d-none d-lg-block mb-4 mt-0"
<div>
    <img src="/img/02.jpg">
</div>
</div>
<br>
<br>*}

<div class="container">
    {*<h2 class="discover-destinations">Discover new destinations...</h2>*}



    <div class="row">
        {*<div class="col">*}
            {if $B_startXXX}
                <h1>{$translation.new_vacations}</h1>
                <br>
            {/if}


            {if count($data) > 0}
                <div class="card-deck">
                    {foreach from=$data key=key item=val}
                        {if !is_null($val.id) && isset($val.id)}

                            <div class="col-md-4">
                                <div class="card mb-5">
                                    <a href="/{$lang}/artikel/{$val.id}/"><img class="card-img-top" src="{$val.file1_700}"
                                                                               alt="{$val.title|truncate:50:"...":true}"></a>
                                    <div class="card-body">
                                        {if ($lang == 'en') && ($val.titleen|count_characters != 0)}
                                            <a href="/{$lang}/artikel/{$val.id}/">
                                                <h3 class="card-title">{$val.titleen|truncate:50:"...":true}</h3></a>
                                            <a href="/{$lang}/artikel/{$val.id}/"><p class="card-text"
                                                                                     style="color:#000;">{$val.contenten|truncate:200:"...":true}</p>
                                            </a>
                                        {else}
                                            <a href="/{$lang}/artikel/{$val.id}/"><h3
                                                        class="card-title">{$val.title|truncate:50:"...":true}</h3></a>
                                            <a href="/{$lang}/artikel/{$val.id}/"><p class="card-text"
                                                                                     style="color:#000;">{$val.content|truncate:200:"...":true}</p>
                                            </a>
                                        {/if}

                                    </div>

                                    <div class="card-footer">
                                        <p><span class="big-text">{$val.days}</span>
                                            <span class="small-text"
                                                  style="text-transform: uppercase;">{$translation.nights}&nbsp;</span>
                                            <span class="big-text">{$val.persons}</span>
                                            <span class="small-text"
                                                  style="text-transform: uppercase;">{$translation.persons}</span>

                                            {*<p><span class="offer-box-big-text lightblue1">&euro; {$val.value|nf}</span></p>*}
                                            {if $val.type == "offer"}
                                        <p style="margin-top: 25px;"><a href="/{$lang}/artikel/{$val.id}/">
                                                <button type="button" name="bidd" class="btn btn-success width-100"><i
                                                            class="fas fa-check-circle fa-2x"
                                                            style="margin-right:10px; vertical-align:middle;"></i>{$translation.button_submit_price_suggestion}
                                                </button>
                                            </a></p>
                                        <br>
                                        {else}
                                        <p style="margin-top: 25px;"><a href="/{$lang}/artikel/{$val.id}/">
                                                <button type="button" name="bidd" class="btn btn-info width-100"><i
                                                            class="fas fa-thumbs-up fa-2x"
                                                            style="margin-right:10px; vertical-align:middle;"></i>{$translation.button_submit_draw}
                                                </button>
                                            </a></p>
                                        <br>
                                        {/if}
                                    </div>
                                    {if $val.type == "offer" && $B_del}
                                        {if ($val.btnStatus == true )}
                                            <div class="card-footer">

                                                {if (count($val.bids) > 0)}
                                                    {*                                            <a href="javascript:void(0)">*}
                                                    {*                                                <button type="button"*}
                                                    {*                                                        class="btn btn-default" style="background: #04a7bd;color:#fff;text-transform: uppercase">{$translation.change_offer}</button>*}
                                                    {*                                            </a>*}
                                                {else}
                                                    <a href="/{$lang}/inserat-erstellen?id={$val.id}">
                                                        <button type="button"
                                                                class="btn btn-default"
                                                                style="background: #04a7bd;color:#fff;text-transform: uppercase">{$translation.change_offer}</button>
                                                    </a>
                                                {/if}

                                            </div>
                                        {else}
                                            <div class="card-footer">
                                                <a href="javascript:void(0)">
                                                    <button type="button"
                                                            class="btn btn-default"
                                                            style="background: grey;text-transform: uppercase">{$translation.offer_inactive}</button>
                                                </a>
                                            </div>
                                        {/if}
                                        <div class="card-footer">
                                            <a href="/{$lang}/inserat-erstellen?advertise_id={$val.id}">
                                                <button type="button" class="btn btn-success"
                                                        style="text-transform: uppercase">{$translation.advertise_again}</button>
                                            </a>
                                        </div>
                                        <div class="card-footer">
                                            <a href="/{$lang}/delete-ad/{$val.id}/"
                                               onclick="return confirm('{$translation.confirm_del}');">
                                                <button type="button" class="btn btn-danger"
                                                        style="text-transform: uppercase">{$translation.delete_ad}</button>
                                            </a>
                                        </div>
                                    {elseif $B_del}
                                        <div class="card-footer">
                                            <a href="/{$lang}/delete-ad/{$val.id}/"
                                               onclick="return confirm('{$translation.confirm_del}');">
                                                <button type="button" class="btn btn-secondary"
                                                        style="text-transform: uppercase"
                                                        disabled>{$translation.delete_ad}</button>
                                            </a>
                                        </div>
                                    {/if}
                                </div>
                            </div>

                        {/if}
                    {/foreach}

                    {for $missingCards = (count($data) + 1) to 3}
                        <div class="card">
                        </div>
                    {/for}
                </div>
            {elseif $B_detailCategoryPage}
                <h1>{$translation.no_offers_yet}</h1>
                <a href="/{$lang}/inserat-erstellen/">
                    <button type="button" class="btn btn-success mt-5">{$translation.create_first_offer}</button>
                </a>
            {/if}
        </div>
    </div>
</div>

{include file="f_page_links.tpl"}
