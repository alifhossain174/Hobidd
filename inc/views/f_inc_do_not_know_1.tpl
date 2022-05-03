<div class="container">
    <div class="row">

        {foreach from=$data key=key item=val}
            {if ($val.is_private == 0 && !isset($smarty.session.frontend.auth.user_id) && is_null($smarty.session.frontend.auth.user_id))}
                <div class="col md-6 col-lg-4 mb-5">
                    <div class="card">
                        <a href="/{$lang}/artikel/{$val.id}/"><img class="card-img-top" src="{$val.file1_700}"
                                                                   alt="{$val.title|truncate:50:"...":true}"></a>
                        <div class="card-body">
                            {if ($lang == 'en') && ($val.titleen|count_characters != 0)}
                                <a href="/{$lang}/artikel/{$val.id}/"><h3
                                            class="card-title">{$val.titleen|truncate:50:"...":true}</h3></a>
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
                            <p>&nbsp; <span class="big-text">{$val.days}</span><span class="small-text"
                                                                                     style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;<span
                                        class="big-text">{$val.persons}</span><span
                                        class="small-text">&nbsp;{$translation.persons}</span></p>
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
                    </div>
                </div>
            {elseif (isset($smarty.session.frontend.auth.user_id) && !is_null($smarty.session.frontend.auth.user_id))}
                <div class="col md-6 col-lg-4 mb-5">
                    <div class="card">
                        <a href="/{$lang}/artikel/{$val.id}/"><img class="card-img-top" src="{$val.file1_700}"
                                                                   alt="{$val.title|truncate:50:"...":true}"></a>
                        <div class="card-body">
                            {if ($lang == 'en') && ($val.titleen|count_characters != 0)}
                                <a href="/{$lang}/artikel/{$val.id}/"><h3
                                            class="card-title">{$val.titleen|truncate:50:"...":true}</h3></a>
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
                            <p>&nbsp; <span class="big-text">{$val.days}</span><span class="small-text"
                                                                                     style="text-transform: uppercase;">&nbsp;{$translation.nights}</span>&nbsp;&nbsp;&nbsp;<span
                                        class="big-text">{$val.persons}</span><span
                                        class="small-text">&nbsp;{$translation.persons}</span></p>
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
                    </div>
                </div>
            {/if}
        {/foreach}
    </div>
</div>

{include file="f_page_links.tpl"}
