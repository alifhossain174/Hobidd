{if $B_listAds}
    <form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
        <a class="btn btn-primary ajaxLayer" href="?s=createAd"><i class=" icon-plus-sign"></i> Inserat hinzufügen</a>
        <div class="form-group">
            <input class="form-control" type="text" name="filter[query]" value="{$filter.query}" placeholder="Suche"
                   style="width:200px;">
        </div>
        <button class="btn" id="log-clause"><i class="icon-search"></i> Suchen</button>
        <button name="clear" value="true" id="clearSearchForm" class="btn"><i class="icon-remove-sign"></i> Leeren
        </button>
        <input type="hidden" name="xclear" id="xclear" value="false">
    </form>
    {include file="b_result_counter.tpl"}
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            <th><a class="ajaxLink" href="?s={$state}&order=id&sort={$sort}">ID{$sort_icon.title}</a></th>
            <th><a class="ajaxLink" href="?s={$state}&order=title&sort={$sort}">Bezeichung{$sort_icon.title}</a></th>
            <th><a class="ajaxLink" href="?s={$state}&order=vendor&sort={$sort}">Anbieter{$sort_icon.title}</a></th>
            <th><a class="ajaxLink" href="?s={$state}&order=category&sort={$sort}">Kategorie{$sort_icon.title}</a></th>
            <th><a class="ajaxLink" href="?s={$state}&order=category&sort={$sort}">Wert{$sort_icon.title}</a></th>
            <th><a class="ajaxLink" href="?s={$state}&order=category&sort={$sort}">Mind.{$sort_icon.title}</a></th>
            <th><a class="ajaxLink" href="?s={$state}&order=fb_likes&sort={$sort}">Likes{$sort_icon.fb_likes}</a></th>
            <th><a class="ajaxLink" href="?s={$state}&order=fb_shares&sort={$sort}">Shares{$sort_icon.fb_shares}</a>
            </th>
            <th><a class="ajaxLink" href="?s={$state}&order=valid_to&sort={$sort}">Läuft bis{$sort_icon.valid_to}</a>
            </th>
            <th><a class="ajaxLink" href="?s={$state}&order=active&sort={$sort}">Aktiv{$sort_icon.active}</a></th>
            <th>Gewinner Link</th>
            <th style="width:50px;">Aktion</th>
        </tr>
        </thead>
        <tbody>
        {foreach from=$data key=key item=val}
            <tr>
                <td>{$val.id}</td>
                <td>{$val.title}</td>
                <td>{$val.vendor}</td>
                <td>{$val.category}</td>
                <td>{$val.value}</td>
                <td>{$val.threshold1}</td>
                <td><a href="?s=listAdLikes&id={$val.id}">{$val.fb_likes}</a></td>
                <td>{$val.fb_shares}</td>
                <td>{$val.valid_to|date_format:"%d.%m.%Y %H:%M"}</td>
                <td>{if $val.active}Ja{else}Nein{/if}</td>
                <td>http://www.noomcee.com/de/kontakt-gewinner/{$val.hash}/</td>
                <td nowrap="nowrap" style="text-align:center;">
                    <a href="?s=editAd&id={$val.id}" title="Bearbeiten"
                       class="ajaxLayer glyphicon glyphicon-pencil"></a>
                    <a href="?s=deleteAd&id={$val.id}" id="d{$val.id}" title="Löschen"
                       class="delete glyphicon glyphicon-trash"></a>
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
    {include file="b_page_links.tpl"}
{/if}

{if $B_listAdLikes}
    <form method="post" action="?s={$state}" class="well form-inline ajaxSearchForm">
        <a class="btn btn-primary" href="?s=listAds">zurück</a>
    </form>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Profil</th>
        </tr>
        </thead>
        <tbody>
        {foreach from=$data key=key item=val}
            <tr>
                <td>{$val->name}</td>
                <td><a href="https://facebook.com/{$val->profile_id}" taget="_blank">{$val->profile_id}</a></td>
            </tr>
        {/foreach}
        </tbody>
    </table>
{/if}

{if $B_createAd || $B_editAd}
    <form class="form-horizontal{if $ajax} ajaxForm{/if}" role="form" method="post" action="?s={$state}&id={$data.id}"
          id="layer"{if $ajax} style="width:900px; height:900px;"{/if}>
        <div id="form-header">
            <h4>Inserat {if $state == "createAd"}hinzufügen{else}bearbeiten{/if}</h4>
        </div>

        <div class="col-md-12">
            <div class="form-group{$css.name}">
                <label for="title" class="col-sm-2 control-label span2">Bezeichnung</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="title" value="{$data.title}" name="data[title]">
                </div>
            </div>
            <div class="form-group{$css.name}">
                <label for="title" class="col-sm-2 control-label span2">Bezeichnung EN</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="titleen" value="{$data.titleen}" name="data[titleen]">
                </div>
            </div>
            <div class="form-group{$css.type}">
                <label for="type" class="col-sm-2 control-label span2">Typ</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="type" name="data[type]">
                        {$data.opt_type}
                    </select>
                </div>
            </div>
            <div class="form-group{$css.type}">
                <label for="type" class="col-sm-2 control-label span2">Gewinnspiel Typ</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="raffle_type" name="data[raffle_type]">
                        {$data.opt_raffle_type}
                    </select>
                </div>
            </div>
            <div class="form-group{$css.name}">
                <label for="title" class="col-sm-2 control-label span2">Gewinnspiel URL</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="titleen" value="{$data.raffle_url}"
                           name="data[raffle_url]">
                </div>
            </div>
            <div class="form-group{$css.value}">
                <label for="value" class="col-sm-2 control-label span2">Wert</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="value" value="{$data.value}" name="data[value]">
                </div>
            </div>
            <div class="form-group{$css.value}">
                <label for="value" class="col-sm-2 control-label span2">Mindestwert</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="threshold1" value="{$data.threshold1}"
                           name="data[threshold1]">
                </div>
            </div>
            <div class="form-group{$css.content}">
                <label for="content" class="col-sm-2 control-label span2">Common Description</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[content]"
                              id="content">{$data.content}</textarea>
                </div>
            </div>
            <div class="form-group{$css.content}">
                <label for="content" class="col-sm-2 control-label span2">Common Description EN</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[contenten]"
                              id="contenten">{$data.contenten}</textarea>
                </div>
            </div>

            <div class="form-group{$css.priceinfo}">
                <label for="priceinfo" class="col-sm-2 control-label span2">Preis/Info</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:100px; width:600px;" name="data[priceinfo]"
                              id="priceinfo">{$data.priceinfo}</textarea>
                </div>
            </div>
            <div class="form-group{$css.priceinfo}">
                <label for="priceinfo" class="col-sm-2 control-label span2">Preis/Info EN</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:100px; width:600px;" name="data[priceinfoen]"
                              id="priceinfoen">{$data.priceinfoen}</textarea>
                </div>
            </div>


            <div class="form-group{$css.vendor_id}">
                <label for="vendor_id" class="col-sm-2 control-label span2">Anbieter</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="active" name="data[vendor_id]">
                        {$data.opt_vendor}
                    </select>
                </div>
            </div>
            <div class="form-group{$css.category_id}">
                <label for="category_id" class="col-sm-2 control-label span2">Kategorie</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="category_id" name="data[category_id]">
                        {$data.opt_category}
                    </select>
                </div>
            </div>
            <div class="form-group{$css.valid_to}">
                <label for="valid_to" class="col-sm-2 control-label span2">Gültig bis</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="valid_to" value="{$data.valid_to}"
                           name="data[valid_to]">
                </div>
            </div>
            <div class="form-group{$css.active}">
                <label for="active" class="col-sm-2 control-label span2">Aktiv</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="active" name="data[active]">
                        {$data.opt_active}
                    </select>
                </div>
            </div>

            <div class="form-group{$css.content}">
                <label for="content" class="col-sm-2 control-label span2">Gewinnspiel Teilnahmebedingungen</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[raffle_legal]"
                              id="raffle_legal">{$data.raffle_legal}</textarea>
                </div>
            </div>


            <div class="form-group{$css.featured}">
                <label for="featured" class="col-sm-2 control-label span2" style="color:#428bca;">Auf Startseite</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="featured" name="data[featured]">
                        {$data.opt_featured}
                    </select>
                </div>
            </div>
            <div class="form-group{$css.featured_position}">
                <label for="featured_position" class="col-sm-2 control-label span2" style="color:#428bca;">Startseite
                    Position (1-8)</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="featured_position" value="{$data.featured_position}"
                           name="data[featured_position]">
                </div>
            </div>
            <div class="form-group{$css.featured_category_id}">
                <label for="featured_category_id" class="col-sm-2 control-label span2"
                       style="color:#428bca;">Kategorie</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="featured_category_id" name="data[featured_category_id]">
                        {$data.opt_featured_category_id}
                    </select>
                </div>
            </div>
            <div class="form-group{$css.featured_from}">
                <label for="featured_from" class="col-sm-2 control-label span2" style="color:#428bca;">Von</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="featured_from" value="{$data.featured_from}"
                           name="data[featured_from]">
                </div>
            </div>
            <div class="form-group{$css.featured_to}">
                <label for="featured_to" class="col-sm-2 control-label span2" style="color:#428bca;">Bis</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="featured_to" value="{$data.featured_to}"
                           name="data[featured_to]">
                </div>
            </div>
            <div class="form-group{$css.headline_de}">
                <label for="headline_de" class="col-sm-2 control-label span2" style="color:#428bca;">Headline DE</label>
                <div class="col-sm-9 span8">
                    <input type="text" class="form-control" id="headline_de" value="{$data.headline_de}"
                           name="data[headline_de]">
                </div>
            </div>
            <div class="form-group{$css.headline}">
                <label for="headline" class="col-sm-2 control-label span2" style="color:#428bca;">Headline EN</label>
                <div class="col-sm-9 span8">
                    <input type="text" class="form-control" id="headline" value="{$data.headline}"
                           name="data[headline]">
                </div>
            </div>
            <div class="form-group{$css.text_de}">
                <label for="text" class="col-sm-2 control-label span2" style="color:#428bca;">Description DE</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[text_de]"
                              id="text_de">{$data.text_de}</textarea>
                </div>
            </div>
            <div class="form-group{$css.text}">
                <label for="text" class="col-sm-2 control-label span2" style="color:#428bca;">Description EN</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[text]"
                              id="text">{$data.text}</textarea>
                </div>
            </div>

            <div class="form-group{$css.image}">
                <label for="image" class="col-sm-2 control-label span2" style="color:#428bca;">Select Image</label>
                <div class="col-sm-6 span6">
                    <input type="file" class="form-control" id="file"
                           name="file"/>{$data.image}
                </div>
            </div>
            <div class="form-group{$css.link}">
                <label for="link" class="col-sm-2 control-label span2" style="color:#428bca;">Link / URL EN</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="link" value="{$data.link}"
                           name="data[link]">
                </div>
            </div>

            <div class="form-group{$css.link_de}">
                <label for="link" class="col-sm-2 control-label span2" style="color:#428bca;">Link / URL DE</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="link_de" value="{$data.link_De}"
                           name="data[link_de]">
                </div>
            </div>
            <div class="form-group{$css.regular_price}">
                <label for="regular_price" class="col-sm-2 control-label span2" style="color:#428bca;">Regular
                    price</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="regular_price" value="{$data.regular_price}"
                           name="data[regular_price]">
                </div>
            </div>
            <div class="form-group{$css.price_reduction}">
                <label for="price_reduction" class="col-sm-2 control-label span2" style="color:#428bca;">Price
                    reduction</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="price_reduction" value="{$data.price_reduction}"
                           name="data[price_reduction]">
                </div>
            </div>
            <div class="form-group{$css.start_date}">
                <label for="start_date" class="col-sm-2 control-label span2" style="color:#428bca;">Valid from</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="start_date" value="{$data.start_date}"
                           name="data[start_date]">
                </div>
            </div>
            <div class="form-group{$css.end_date}">
                <label for="end_date" class="col-sm-2 control-label span2" style="color:#428bca;">Valid to</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="end_date" value="{$data.end_date}"
                           name="data[end_date]">
                </div>
            </div>


        </div>
        {if !$ajax}
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Speichern</button>
                    <a href="?s=listAds" class="btn btn-default">Abbrechen</a>
                </div>
            </div>
        {/if}
        <input type="hidden" name="data[id]" value="{$data.id}">
    </form>
{literal}
    <script type="text/javascript">
        $(document).ready(function () {
            initTinymce();
        });
    </script>
{/literal}
{/if}
