{if !$B_detailAd}
	<style>
        .searchU:after {literal} {
		{/literal} content: "";
            background-image: url("{$banner.13.image}");
            /*opacity:
		{$banner.14.color} ;*/
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
		{literal}
        }

		{/literal}
	</style>
	<div id="cat-container-small" class="searchU a614" style="margin-top:10px; height:235px;">
		<div style="background-color:#00bcf4; height:100%;">
			<form method="post" action="/{$lang}/kategorie/suche/">
				<p class="cat-text" style="padding-top:40px;float:none; text-align:center; text-transform:none;"><a
							style="text-decoration:none; font-family:source sans pro; font-weight:400; line-height:90%; font-size:41px; color:#fff; text-transform: uppercase;">
						<!--<img class="svg" width="24" height="24" src="img/m5.svg" alt="">--> {$translation.perimeter_search2}
						&nbsp;</a></p>
				<div class="clearfix"></div>
				<div style="margin-top:30px;">
					<input id="xsearch" type="text" class="form-control xcenter" name="filter[postalcode]"
						   value="{$filter.postalcode}"
						   style="text-transform:uppercase; width:720px; height:77px; display:inline; border:0; border-radius:0;">
					<input type="submit"
						   style="position:absolute;margin-left:-225px; font-family:source sans pro; margin-top:5px; font-size:30px; line-height:90%; font-weight:400; background:#0381c5; color:#fff; height:67px; border:0; border-radius:0; width:220px;"
						   class="btn btn-default blue_btn" value="{$translation.search}">
				</div>
			</form>
		</div>
	</div>
{/if}
