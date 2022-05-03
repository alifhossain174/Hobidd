<section class="blog" style="margin-top:45px; padding-left:20px;">
	<div class="container" style="max-width:1030px;">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<h2 class="title">Error: 404</h2>
				<div class="post">
					<p>
						Page not found
						<br>
						<br>
						<a href="/{$lang}/">Start</a>
					</p>
				</div>
			</div>
		</div>

		<div class="row d-none d-lg-block">
			<div class="col hero-container"
				 style="background: url('{$banner.1001.image}') no-repeat center center; background-size:cover">
				<div class="container">
					<div class="row">
						<div class="col"><img class="img-fluid mx-auto d-block" style="padding-top: 20px;"
											  src="{$banner.1003.image}"></div>
					</div>

					<div class="row" style="padding-top: 10px;">
						<div class="col-md-12 center-block">
							<form method="get" action="{$lang}/kategorie/suche/" style="text-align: center;">
                                {if $filter.postalcode}
									<input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
										   value="{$filter.postalcode}"
										   style="width:720px; height:55px; display:inline; border:0; border-radius:0;">
									<button type="submit"
											style="position:absolute;margin-left:-65px; background:#fff; color:#888; height:55px; border:0; border-radius:0;"
											class="btn btn-default blue_btn"><i class="fas fa-search fa-2x"></i>
									</button>
                                {else}
									<input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
										   placeholder="{$translation.search_placeholder}"
										   style="width:720px; height:55px; display:inline; border:0; border-radius:0;">
									<button type="submit"
											style="position:absolute;margin-left:-65px; background:#fff; color:#888; height:55px; border:0; border-radius:0;"
											class="btn btn-default blue_btn"><i class="fas fa-search fa-2x"></i>
									</button>
                                {/if}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
