{*<div class="bid-min-header">
    <div class="container">
        <div class="bid-header-inner">
            <div class="bid-info">
                <div class="bid-info-inner d-flex flex-wrap align-center"><p><span class="icon">                                <img
                                    src="/img/bids/first.png">                            </span>
                        <span>{$translation.your_package}: <b>                                {if ($lang == 'en') && ($data.package.name_en|count_characters != 0)}                                    {$data.package.name_en}                                {else}                                    {$data.package.name_de}                                {/if}</b> &nbsp;  &nbsp; {$translation.valid_till_package} {$valid_till|date_format:'d.m.Y'}                        </span>
                    </p> &nbsp; &nbsp; <p><span class="icon">                                <img
                                    src="/img/bids/minus.png">                            </span>
                        <span>03 {$translation.active_offers_package}</span></p> &nbsp; &nbsp; <p><span class="icon">                                <img
                                    src="/img/bids/plus.png">                            </span>
                        <span>{$data.package.sell_offer_limit} {$translation.still_presentable}</span></p> &nbsp; &nbsp;
                    <p><span class="icon">                                <img src="/img/bids/last.png">                            </span>
                        <span>{$translation.update_your_package}</span></p></div>
            </div>
        </div>
    </div>
</div>*}


<div class="bid-table">
    <div class="table-container">
        
        
        
        
        <table class="table table-sortable">
            <thead>
            {*<tr>
                <th class="header spacer" scope="col" role="columnheader"></th>
                <th class=" header" scope="col" role="columnheader"></th>
                <th class=" header" scope="col" role="columnheader"></th>
                <th class=" header" scope="col" role="columnheader"></th>
                <th class=" header" scope="col" role="columnheader"></th>
                <th class=" header" scope="col" role="columnheader">{$translation.date}</th>
                <th class="header spacer" scope="col" role="columnheader"></th>
            </tr>*}
            </thead>



            <tbody>
            <tr>
                
               
                
                <td class="spacer">&nbsp;</td>
                <td>{$translation.hobidds_customer}&nbsp; &nbsp;{$data.customer_id}&nbsp; &nbsp; &nbsp; |&nbsp; &nbsp; &nbsp;{$translation.date}&nbsp; &nbsp;{if $data.v_cdate > $data.c_cdate}
                        <span>{$data.v_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                    {else}
                        <span>{$data.c_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                    {/if}   </td>
                {*<td></td>
                <td></td>
                <td></td>
                <td></td>*}
                {*<td>{$translation.date}&nbsp; &nbsp; &nbsp;{if $data.v_cdate > $data.c_cdate}
                        <span>{$data.v_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                    {else}
                        <span>{$data.c_cdate|date_format:"%d.%m.%Y - %H:%M"}</span>
                    {/if}</td>*}




{*<td><a class="float-right" href="/{$lang}/delete-ad/{$val.id}/"
                        onclick="return confirm('{$translation.confirm_del}');">
                        <button type="button" class="btn btn-danger float=right"
                        style="text-transform: uppercase">{$translation.delete_ad}</button></a>
                        </td>*}


<td><a href="{$lang}/bidds">
                        <button class="btn btn-primary float-right">{$translation.close}</button>
</a></td>






                <td class="spacer">&nbsp;</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="bid-information-wrapper">
    <div class="container-fluid">
        <div class="bid-information-wrap-inner">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-3 col-12">
                    <div class="bid-edit-left">
                        <div class="offer-box-text-new">                            {if ($lang == 'en') && ($data.ad_detail.titleen|count_characters != 0)}
                                <span class="offer-box-normal-text">{$data.ad_detail.titleen}</span>
                            {else}
                                <span class="offer-box-normal-text">{$data.ad_detail.title}</span>
                            {/if}                        </div>
                        <div style="height:20px; background:#fff;"></div>
                        <div class="offer-box-text-days">                            {*<span class="big-text">{$data.days}</span>                            <span class="small-text" style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;*}
                            <span class="offer-box-big-text lightblue1">{$data.days}</span> <span
                                    class="offer-box-small-text"
                                    style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;
                            <span class="offer-box-big-text lightblue1">{$data.persons}</span> <span
                                    class="offer-box-small-text"
                                    style="text-transform: uppercase;">&nbsp;{$translation.persons}</span> {*<span class="offer-box-big-text">{$data.days}</span>                            <span class="offer-box-small-text" style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;*}
                        </div> {*                        <div class="bid-info-item days">*}                        {*                            <h2>{$data.ad_detail.days}<span class="small-span">{$translation.nights}</span>*}                        {*                                &nbsp; {$data.ad_detail.persons}<span class="small-span">{$translation.persons}</span></h2>*}                        {*                        </div>*}
                        <div style="height:20px; background:#fff;"></div>
                        <div class="offer-box-text-new"><span
                                    class="offer-box-small-text">{$translation.value3}</span><br/> <span
                                    class="offer-box-big-text lightblue1">&euro; {$data.ad_detail.value|nf}</span>
                        </div> {*                        <div class="bid-info-item regular">*}                        {*                            <span>{$translation.value3}</span>*}                        {*                            <h2>€ {$data.ad_detail.value|nf}</h2>*}                        {*                        </div>*}
                        



                        <div style="height:20px; background:#fff;"></div>
                        <div class="offer-box-text-new"><span class="offer-box-small-text"
                                                              style="color: #0099b9 !important;">{$translation.your_minimum_price}</span><br/>
                            <span class="offer-box-big-text lightblue1"
                                  style="color: #0099b9 !important;">&euro; {$data.ad_detail.threshold1.value|nf}</span>
                        </div> {*                        <div class="bid-info-item minimum-bid">*}                        {*                            <span> {$translation.your_minimum_price}</span>*}                        {*                            <h2>€ {$data.ad_detail.threshold1|nf}</h2>*}                        {*                        </div>*}
                        

                        <div style="height:20px; background:#fff;"></div> {*                        <div class="offer-box-text-new">*}                        {*                            <span class="offer-box-small-text">{$translation.travel_period}</span><br/>*}                        {*                            <span class="offer-box-big-text lightblue1">{$date_from_day}.{$date_from_month}.{$date_from_year} - {$date_until_day}*}                        {*                                .{$date_until_month}*}                        {*                                .{$date_until_year}</span>*}                        {*                        </div>*}
     
{*NEW GEWÜNSCHTER REISEZEITRAUM                  


                        <div style="height:20px; background:#fff;"></div>

                        <div class="offer-box-text-new"><span class="offer-box-small-text"
                                                              style="color: #0099b9 !important;">{$translation.travel_period}</span><br/>
                            <span class="offer-box-big-text lightblue1"
                                  style="color: #0099b9 !important;">{$date_from_day}.{$date_from_month}.{$date_from_year} - {$date_until_day}.{$date_until_month}.{$date_until_year}</span>

                            {if $desired_date}
                            <div class="bid-info-item"><span
                                        style="color: #0099b9 !important;">{$translation.desired_travelling_date}</span>
                                <h2 style="color: #0099b9 !important;">{$date_desired_from_day}.{$date_desired_from_month}.{$date_desired_from_year} - {$date_desired_until_day}.{$date_desired_until_month}.{$date_desired_until_year}</h2></div>
                        {/if}



                        </div> {*                        <div class="bid-info-item minimum-bid">*}                        {*                            <span> {$translation.your_minimum_price}</span>*}                        {*                            <h2>€ {$data.ad_detail.threshold1|nf}</h2>*}                        {*                        </div>*}



{*OLD GEWÜNSCHTER REISEZEITRAUM*}

                        <div class="bid-info-item"><span>{$translation.travel_period}</span>
                            <h2>{$date_from_day}.{$date_from_month}.{$date_from_year} - {$date_until_day}.{$date_until_month}.{$date_until_year}</h2></div>
                        {if $desired_date}
                            <div class="bid-info-item"><span
                                        style="color: #0099b9 !important;">{$translation.desired_travelling_date}</span>
                                <h2 style="color: #0099b9 !important;">{$date_desired_from_day}.{$date_desired_from_month}.{$date_desired_from_year} - {$date_desired_until_day}.{$date_desired_until_month}.{$date_desired_until_year}</h2></div>
                        {/if}
                    </div>
                </div>
                <div class="col-md-9 col-lg-9 col-xl-9 col-12">
                    <div class="included-services-wrap">
                        <div class="included-service">
                            <div class="services-desc">
                                <h3>{$translation.special_offer_heading}</h3> {if ($lang == 'en') && ($data.ad_detail.priceinfoen|count_characters != 0)}
                                    <p>{$data.ad_detail.priceinfoen|nl2br}</p>
                                {else}
                                    <p>{$data.ad_detail.priceinfo|nl2br}</p>
                                {/if}                            </div>
                            <div class="services-option">
                                <div class="row">                                    {if ($data.c_accepted_c == 1 && $data.c_accepted_v == 1) || ($data.v_accepted_c == 1 && $data.v_accepted_v == 1)}                                    {elseif ($data.c_accepted_c == 1 && $data.c_accepted_v == 0)}
                                        <div class="col-md-5 col-lg-3 col-xl-3 col-12 mt-3">
                                            <div class="option-box"><h5>{$translation.inbox_accept_bid_header}</h5><h6>
                                                    &euro; {$data.c_value|nf}</h6>
                                                <form method="post"
                                                      action="/{$lang}/inbox/{$data.max_customer_message_id}/"><input
                                                            type="hidden" name="accept" value="1"> <input type="hidden"
                                                                                                          name="data[value]"
                                                                                                          value="{$data.c_value}">
                                                    <div class="form-check"><input type="checkbox"
                                                                                   class="form-check-input" id="terms">
                                                        <label class="form-check-label"
                                                               for="terms">                                                            {$translation.inbox_confirm_buy}</label>
                                                    </div>
                                                    <button class="btn accpt-btn" type="submit"
                                                            onclick="if(!$('#terms').is(':checked')) { alert('{$translation.inbox_error_terms}'); return false;}">{$translation.inbox_accept}</button>
                                                </form>
                                            </div>
                                        </div>
                                    {elseif ($data.v_accepted_c == 0 && $data.v_accepted_v == 1)}                                    {elseif $data.v_cdate > $data.c_cdate}                                    {elseif $data.v_cdate < $data.c_cdate}
                                        <div class="col-md-5 col-lg-3 col-xl-3 col-12 mt-3">
                                            <div class="option-box"><h5>{$translation.inbox_accept_bid_header}</h5><h6>
                                                    &euro; {$data.c_value|nf}</h6>
                                                <form method="post"
                                                      action="/{$lang}/inbox/{$data.max_customer_message_id}/"><input
                                                            type="hidden" name="accept" value="1"> <input type="hidden"
                                                                                                          name="data[value]"
                                                                                                          value="{$data.c_value}">
                                                    <div class="form-check"><input type="checkbox"
                                                                                   class="form-check-input" id="terms">
                                                        <label class="form-check-label"
                                                               for="terms">                                                            {$translation.inbox_confirm_buy}</label>
                                                    </div>
                                                    <button class="btn accpt-btn" type="submit"
                                                            onclick="if(!$('#terms').is(':checked')) { alert('{$translation.inbox_error_terms}'); return false;}">{$translation.inbox_accept}</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-9 col-xl-9 col-12 mt-3">
                                            <div class="edit-bid-right">
                                                <form method="post"
                                                      action="/{$lang}/inbox/{$data.max_customer_message_id}/">
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-3 col-xl-3 col-12">
                                                            <div class="proposal">
                                                                <h5 style="text-align: center">{$translation.inbox_counterproposal}</h5>
                                                                
                                                                <div class="form-group">
                                                                    <p style="font-size: 18px;
    text-align: center;
    font-family: 'LATO', sans-serif;
    margin-right: 7px;
    font-weight: 800;">&euro;</p>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{$data.c_value}"
                                                                           aria-label="value"
                                                                           aria-describedby="basic-addon1"
                                                                           name="data[value]" value="{$data.c_value}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-9 col-xl-9 col-12">
                                                            <div class="sending-prop"><h5
                                                                        style="text-align: center">{$translation.comments}</h5>
                                                                        <br>
                                                                <div class="form-group"><textarea class="form-control"
                                                                                                  rows="3"
                                                                                                  placeholder="{$translation.comments}"
                                                                                                  name="data[vendor_comments]">{$data.vendor_comments}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="send-proposal">
                                                        <button class="send-btn btn"
                                                                type="submit">{$translation.inbox_confirm}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    {/if}                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>