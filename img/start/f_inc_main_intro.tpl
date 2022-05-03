{if $lang == 'de'}



    <div class="container d-lg-block mb-4 mt-0">
        <div class="align-items-center py-4 border-1">
            <div class="search-bar-wrap" style="padding-top: -260px;">
                <div class="center-block">
                    <form method="post" action="/{$lang}/kategorie/suche/" style="text-align: center;">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12 p-0">
                                <div class="form-group">
                                    {*<label>Destination</label>*}
                                    <label for="filter_travel_period">{$translation.destination}</label>
                                    {if $filter.postalcode}
                                        <input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
                                            value="{$filter.postalcode}"
                                            style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
                                    {else}
                                        <input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
                                            placeholder="{$translation.search_placeholder}"
                                            style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
                                    {/if}
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 p-0">
                                <div class="form-group travel-drop">
                                    <label for="filter_travel_period">{$translation.travel_period}</label>
                                    <select name="filter[filter_travel_period]" class="form-control js-example-basic-single"
                                        id="filter_travel_period">
                                        <option value="0">{$translation.all}</option>
                                        {$data.opt_travelling_period}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-12 p-0">
                                <div class="form-group topic-drop">
                                    <label for="filter_category">{$translation.categories}</label>
                                    <select name="filter[filter_category]" class="form-control js-example-basic-single"
                                        id="filter_category">
                                        <option value="0">{$translation.all}</option>
                                        {$data.opt_category}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 p-0">
                                <div class="search-btn">
                                    <button type="submit" class="btn btn-default blue_btn">Search</button>
                                    <a href="/{$lang}/search-help"><i class="fas fa-question fa-1x"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <div class="container d-lg-block mb-4 mt-0">

        <div>
            <img class="img-fluid mx-auto d-block" src="/img/start/2b-preis.png">
        </div>



        <div class="container d-lg-block mb-4 mt-0">
            <div>

                <div class="container d-lg-block mb-4 mt-0"></div>

                <div class="container">
                    <div class="row">

                        <br>
                        HOBIDD ist keine Buchungs,- Preisvergleichs- oder gar Schnäppchenplattform. Auf HOBIDD finden Sie
                        ausschließlich direkt von Anbietern eigens zusammengestellte, hochwertige Pauschalen.
                        <br>
                        <br>
                        <br>
                        <h1>HOBIDD STEHT FÜR HOLIDAY BIDDINGS</h1>
                        <br>
                        Das bedeutet, das Interessenten die Möglichkeit gegeben wird, Preisvorschläge für eingestellte
                        Pauschalen einfach, ohne großen Aufand und für Dritte nicht ersichtlich, direkt über unsere
                        Plattform an den jeweiligen Anbieter zu übermitteln.
                        <br>
                        <br>
                        Und nachdem wir eben keine Buchungs,- Preisvergleichs- oder gar Schnäppchenplattform sind, erheben
                        wir von Anbietern auch keine Provisionen für über unsere Plattform zustande gekommene
                        Direktbuchungen.
                        <br>
                        <br>
                        Genau dieser Unterschied könnte sich als positiv auf abgegebne Preisvorschläge, inkludierte
                        Mehrleistungen in angebotnen Pauschalen oder auf Upgrades auswirken.
                        <br>
                        <br>
                        Wir wollen das Direktbuchen so einfach wie möglich machen. Reisende registriern sich kostenlos.
                        Anbieter wählen das für sie passende Paket.
                        <br>
                        <br>
                        <br>
                        <br>
                        <div>
                            <img class="img-fluid mx-auto d-block" src="/img/start/office1.png">
                        </div>

                        <div>
                            <h1>HOBIDD IST EINE GAST TRIFFT HOTEL PLATTFORM</h1>
                        </div>
                        <br>
                        Die besten Urlaube sind bekanntlich dort, wo wir als Gast im Mittelpunkt stehen und die persönliche
                        Note des Hauses nicht zu kurz kommt.
                        <br>
                        <br>
                        Doch wie findet man solch ausgewählte Reiseziele?
                        <br>
                        <br>
                        Genau dieser Frage sind wir bei hobidd nachgegangen. Unsere Mission: Wir bringen Reisende und
                        Anbieter zusammen – schnell, reibungslos und fair. Das Urlaubsfeeling soll schon vor dem Urlaub
                        aufkommen und eine Win-Win Situation für alle Beteiligten sein!
                        <br>
                        <br>
                        <br>
                        <br>
                        <div>
                            <img class="img-fluid mx-auto d-block" src="/img/start/1b-reisen.png">
                        </div>


                    </div>

                </div>



            </div>
        </div>


        <div class="container">
            <br>
            <br>


            <div class="row">
                {*<div class="col">  DIESE COL AUSBLENDEN, DANN GEHEN DIE DREI BOXES ÜBER DIE GESAMTE BREITE*}
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
                                                    <h3 class="card-title">{$val.titleen|truncate:50:"...":true}</h3>
                                                </a>
                                                <a href="/{$lang}/artikel/{$val.id}/">
                                                    <p class="card-text" style="color:#000;">{$val.contenten|truncate:200:"...":true}</p>
                                                </a>
                                            {else}
                                                <a href="/{$lang}/artikel/{$val.id}/">
                                                    <h3 class="card-title">{$val.title|truncate:50:"...":true}</h3>
                                                </a>
                                                <a href="/{$lang}/artikel/{$val.id}/">
                                                    <p class="card-text" style="color:#000;">{$val.content|truncate:200:"...":true}</p>
                                                </a>
                                            {/if}

                                        </div>

                                        <div class="card-footer">
                                            <p><span class="big-text">&nbsp;{$val.days}</span>
                                                <span class="small-text"
                                                    style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;
                                                <span class="big-text">{$val.persons}</span>
                                                <span class="small-text"
                                                    style="text-transform: uppercase;">&nbsp;{$translation.persons}</span>

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
                                                            <button type="button" class="btn btn-default"
                                                                style="background: #04a7bd;color:#fff;text-transform: uppercase">{$translation.change_offer}</button>
                                                        </a>
                                                    {/if}

                                                </div>
                                            {else}
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)">
                                                        <button type="button" class="btn btn-default"
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
                                                    <button type="button" class="btn btn-secondary" style="text-transform: uppercase"
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




    {*<div class="container"> = SUCHERGEBNISSE OHNE CARD FOOTER!!!

    <br>


    <div class="row">




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
</div>*}



    {*<div class="container d-none d-lg-block mb-5 mt-5" style="background: #1897be;">
        <div class="row justify-content-center align-items-center py-4">
            <div class="col px-5">
                <h1 class="big-header">WATCH OUR VIDEO</h1>
            </div>
        </div>
    </div>
    <div class="container d-none d-lg-block">
        <div class="row">
            <div class="col mb-5">
                <div align="center">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/UfYn69cXI1k?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>*}




{/if}

{if $lang == 'en'}


    <br>

    <div class="container d-lg-block mb-4 mt-0">
        <div class="align-items-center py-4 border-1">
            <div class="search-bar-wrap" style="padding-top: -260px;">
                <div class="center-block">
                    <form method="post" action="/{$lang}/kategorie/suche/" style="text-align: center;">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12 p-0">
                                <div class="form-group">
                                    {*<label>Destination</label>*}
                                    <label for="filter_travel_period">{$translation.destination}</label>
                                    {if $filter.postalcode}
                                        <input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
                                            value="{$filter.postalcode}"
                                            style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
                                    {else}
                                        <input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
                                            placeholder="{$translation.search_placeholder}"
                                            style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
                                    {/if}
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 p-0">
                                <div class="form-group travel-drop">
                                    <label for="filter_travel_period">{$translation.travel_period}</label>
                                    <select name="filter[filter_travel_period]" class="form-control js-example-basic-single"
                                        id="filter_travel_period">
                                        <option value="0">{$translation.all}</option>
                                        {$data.opt_travelling_period}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-12 p-0">
                                <div class="form-group topic-drop">
                                    <label for="filter_category">{$translation.categories}</label>
                                    <select name="filter[filter_category]" class="form-control js-example-basic-single"
                                        id="filter_category">
                                        <option value="0">{$translation.all}</option>
                                        {$data.opt_category}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 p-0">
                                <div class="search-btn">
                                    <button type="submit" class="btn btn-default blue_btn">Search</button>
                                    <a href="/{$lang}/search-help"><i class="fas fa-question fa-1x"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <div class="container d-lg-block mb-4 mt-0">

        <div>
            <img class="img-fluid mx-auto d-block" src="/img/start/2b-best.png">
        </div>



        {*<div>   IMAGE NICHT SKALIERBAR
				<img src="/img/start/b2.png">
			</div>*}
    </div>

    <div class="container d-lg-block mb-4 mt-0">
        <div>

            <div class="container d-lg-block mb-4 mt-0"></div>

            <div class="container">
                <div class="row">

                    <br>
                    HOBIDD is not a booking, price comparison or even bargain platform. On HOBIDD you will only find
                    high-quality packages compiled directly by suppliers
                    <br>
                    <br>
                    <br>
                    <h1>HOBIDD STANDS FOR HOLIDAY BIDDINGS</h1>
                    <br>
                    This means that interested parties are given the opportunity to submit price proposals for advertised
                    packages directly to the respective provider via our platform, easily, without much effort and not
                    visible to third parties.
                    <br>
                    <br>
                    And since we are not a booking, price comparison or bargain platform, we do not charge any commissions
                    to suppliers for direct bookings made via our platform.
                    <br>
                    <br>
                    Exactly this difference could have a positive effect on price proposals, included additional services in
                    offered packages or on upgrades.
                    <br>
                    <br>
                    We want to make direct booking as easy as possible. Travelers register free of charge. Providers choose
                    the package that suits them.
                    <br>
                    <br>
                    <br>
                    <br>
                    <div>
                        <img class="img-fluid mx-auto d-block" src="/img/start/office1.png">
                    </div>

                    <div>
                        <h1>HOBIDD BRINGS GUESTS AND PROVIDERs TOGETHER</h1>
                    </div>
                    <br>
                    The best holidays are always in hotels that focus fully on their guests and add their own personal touch
                    to everything.
                    <br>
                    <br>
                    Yet, how do you go about finding these exclusive hotel locations?
                    <br>
                    <br>
                    That is precisely the question that we at hobidd chose to develop an answer to. Our mission is to bring
                    travellers and hotels together – swiftly, smoothly and fairly. Experience that holiday feeling already
                    before the holiday starts! The holiday package should be a win-win arrangement for all involved, too!
                    <br>
                    <br>
                    <br>
                    <br>
                    <div>
                        <img class="img-fluid mx-auto d-block" src="/img/start/1b-holidays.png">
                    </div>


                </div>

            </div>



        </div>
    </div>


    <div class="container">
        <br>
        <br>


        <div class="row">
            {*<div class="col">  DIESE COL AUSBLENDEN, DANN GEHEN DIE DREI BOXES ÜBER DIE GESAMTE BREITE*}
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
                                                <h3 class="card-title">{$val.titleen|truncate:50:"...":true}</h3>
                                            </a>
                                            <a href="/{$lang}/artikel/{$val.id}/">
                                                <p class="card-text" style="color:#000;">{$val.contenten|truncate:200:"...":true}</p>
                                            </a>
                                        {else}
                                            <a href="/{$lang}/artikel/{$val.id}/">
                                                <h3 class="card-title">{$val.title|truncate:50:"...":true}</h3>
                                            </a>
                                            <a href="/{$lang}/artikel/{$val.id}/">
                                                <p class="card-text" style="color:#000;">{$val.content|truncate:200:"...":true}</p>
                                            </a>
                                        {/if}

                                    </div>

                                    <div class="card-footer">
                                        <p><span class="big-text">&nbsp;{$val.days}</span>
                                            <span class="small-text"
                                                style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;
                                            <span class="big-text">{$val.persons}</span>
                                            <span class="small-text"
                                                style="text-transform: uppercase;">&nbsp;{$translation.persons}</span>

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
                                                        <button type="button" class="btn btn-default"
                                                            style="background: #04a7bd;color:#fff;text-transform: uppercase">{$translation.change_offer}</button>
                                                    </a>
                                                {/if}

                                            </div>
                                        {else}
                                            <div class="card-footer">
                                                <a href="javascript:void(0)">
                                                    <button type="button" class="btn btn-default"
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
                                            <a href="/{$lang}/delete-ad/{$val.id}/" onclick="return confirm('{$translation.confirm_del}');">
                                                <button type="button" class="btn btn-danger"
                                                    style="text-transform: uppercase">{$translation.delete_ad}</button>
                                            </a>
                                        </div>
                                    {elseif $B_del}
                                        <div class="card-footer">
                                            <a href="/{$lang}/delete-ad/{$val.id}/" onclick="return confirm('{$translation.confirm_del}');">
                                                <button type="button" class="btn btn-secondary" style="text-transform: uppercase"
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




    {*<div class="container"> = SUCHERGEBNISSE OHNE CARD FOOTER!!!

    <br>


    <div class="row">




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
</div>*}



    {*<div class="container d-none d-lg-block mb-5 mt-5" style="background: #1897be;">
        <div class="row justify-content-center align-items-center py-4">
            <div class="col px-5">
                <h1 class="big-header">WATCH OUR VIDEO</h1>
            </div>
        </div>
    </div>
    <div class="container d-none d-lg-block">
        <div class="row">
            <div class="col mb-5">
                <div align="center">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/UfYn69cXI1k?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>*}














    {*<div class="container d-none d-lg-block mb-4 mt-2" style="background: #ddc4b8;">
        <div class="row justify-content-center align-items-center py-4">
            <div class="row" style="padding-top: -260px;">
                            <div class="col-md-12 center-block">
                            <form method="post" action="/{$lang}/kategorie/suche/" style="text-align: center;">
                            {if $filter.postalcode}
                                <input id="xsearch" type="text" class="form-control" name="filter[postalcode]" value="{$filter.postalcode}" style="width:720px; height:56px; display:inline; border:0; border-radius:0;"> <button type="submit" style="position:absolute;margin-left:-65px; background:#fff; color:#888; height:55px; border:0; border-radius:0;" class="btn btn-default blue_btn"><i class="fas fa-search fa-2x"></i></button>
                            {else}
                                <input id="xsearch" type="text" class="form-control" name="filter[postalcode]" placeholder="{$translation.search_placeholder}" style="width:720px; height:56px; display:inline; border:0; border-radius:0;"> <button type="submit" style="position:absolute;margin-left:-65px; background:#fff; color:#888; height:55px; border:0; border-radius:0;" class="btn btn-default blue_btn"><i class="fas fa-search fa-2x"></i></button>
                            {/if}
                            </form>
                            </div>
                        </div>
        </div>
    </div>*}



{/if}