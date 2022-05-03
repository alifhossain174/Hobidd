<!DOCTYPE html>
<html lang="en">

<head>
	<base href="{$base}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{if $B_detailAd}hobidd | {$data.title}{else}hobidd | holiday biddings{/if}</title>

	{if $B_detailAd}
		<meta property="og:locale" content="de_AT" />
		<meta property="og:url" content="{$site_url}{$current_path}" />
		<meta property="og:type" content="article" />
		{if ($lang == 'en') && ($data.titleen|count_characters != 0)}
			<meta property="og:title" content="{$data.titleen}" />
		{else}
			<meta property="og:title" content="{$data.title}" />
		{/if}

		{if ($lang == 'en') && ($data.priceinfoen|count_characters != 0)}
			<meta property="og:description" content="{if $B_detailAd}{$data.priceinfoen}{else}{$data.content}{/if}" />
		{else}
			<meta property="og:description" content="{if $B_detailAd}{$data.priceinfo}{else}{$data.content}{/if}" />
		{/if}

		<meta property="og:image" content="{$site_url}{$data.file1_700}" />
		<meta property="fb:app_id" content="944325375604618" />
	{else}
		<meta property="og:locale" content="de_AT" />
		<meta property="og:url" content="{$site_url}{$current_path}" />
		<meta property="og:image" content="{$site_url}{$banner.1010.image}" />
		<meta property="fb:app_id" content="944325375604618" />
	{/if}

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&display=swap |Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="/js/jquery.cookiebar/jquery.cookiebar.css">
	<link href="css/fontawesome/fontawesome.min.css" rel="stylesheet">
	<link href="css/fontawesome/solid.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="/img/favicon.png" sizes="512x512">

	{if $B_js_captcha}
		<script src='//www.google.com/recaptcha/api.js'></script>
	{/if}

	<style>
		@media (max-width: 575.98px) {
			.search-bar-wrap .form-group {
				padding: 5px 30px !important;
			}
		}

		@media (min-width: 576px) and (max-width: 767.98px) {
			.search-bar-wrap .form-group {
				padding: 5px 30px !important;
			}
		}
	</style>
</head>

<body>
	<div class="d-lg-none px-0 py-0" id="mobile_header">
		<a href="href=/{$lang}/"><img class="img-fluid" style="width: 100%" src="{$banner.1002.image}"></a>
		<div class="d-lg-none mobile-menu">
			<div class="col px-0 " id="accordion">
				<nav class="navbar navbar-expand-lg navbar-light py-md-2 pr-0 center-text" data-toggle="collapse"
					data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="true"
					aria-label="Toggle navigation">
					<div class="collapse navbar-collapse mobile-menu-dropdown" id="navbarSupportedContent2"
						class="collapse" aria-labelledby="navbarSupportedContent2" data-parent="#accordion">
						<ul class="navbar-nav mr-auto">
							<div>
								<img class="img-fluid mx-auto d-block" src="/img/start/linie-2.png">
							</div>
							<br>
							<li class="nav-item py-md-3" style="margin-top:8px">
								<a class="medium-text-mob" href="/{$lang}/">HOME</a>
							</li>

							{if !$user && !$user2}
								<li class="nav-item py-md-3" style="margin-top:8px">
									<a class="medium-text-mob" href="/{$lang}/about-us/">{$translation.about_us}</a>
								</li>

								<li class="nav-item py-md-3" style="margin-top:8px">
									<a class="medium-text-mob"
										href="/{$lang}/for-travellers/">{$translation.for_travellers}</a>
								</li>

								<li class="nav-item py-md-3" style="margin-top:8px">
									<a class="medium-text-mob" href="/{$lang}/for-vendors/">{$translation.for_vendors}</a>
								</li>
							{/if}

							{if $user || $user2}
								<li class="nav-item py-md-3" style="margin-top:8px">
									<a class="medium-text-mob" href="/{$lang}/bidds/">{$translation.bidds}</a>
								</li>
								<li class="nav-item py-md-3" style="margin-top:8px">
									<a class="medium-text-mob" href="/{$lang}/kategorie/meine/">{$translation.inquiry}</a>
								</li>
							{/if}

							{if $user}
								<li class="nav-item py-md-3" style="margin-top:8px">
									<a class="medium-text-mob" href="/{$lang}/profil/">{$translation.profile}</a>
								</li>
							{/if}
						</ul>

						<ul class="nav navbar-nav navbar-right">
							{if $user || $user2}
								<li class="nav-item py-md-3" style="margin-top:8px">
									<a class="medium-text-mob" href="/{$lang}/logout/">{$translation.logout}</a>
								</li>
							{else}
								<li class="nav-item py-md-3" style="margin-top:8px">
									<a class="medium-text-mob" href="/{$lang}/login/">{$translation.login}</a>
								</li>
							{/if}

							<li class="nav-item dropdown  py-md-3" style="margin-top:8px">
								<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-globe-americas fa-lg"
										style="margin-right:10px;"></i>{if $lang == "de"}EN{else}DE{/if}
								</a>

								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="/de/set/">DEUTSCH</a>
									<a class="dropdown-item" href="/en/set/">ENGLISH</a>
								</div>
							</li>
						</ul>
						</form>
					</div>
				</nav>

				<nav class="navbar navbar-expand-lg navbar-light py-md-2 pr-0 center-text float-right nav3" data-toggle="collapse" data-target="#navbarSupportedContent3"
					aria-controls="navbarSupportedContent3" aria-expanded="false" aria-label="Toggle navigation"></nav>

				<div class="container d-lg-block mt-0 collapse" id="navbarSupportedContent3" aria-labelledby="navbarSupportedContent3" data-parent="#accordion">
					<div class="align-items-center py-4 border-1" style="padding-bottom: 0px !important;">
						<div class="search-bar-wrap" style="padding-top: -260px;">
							<div class="center-block">
								<form method="post" action="/{$lang}/kategorie/suche/" style="text-align: center;">
									<div class="row">
										<div class="col-lg-3 col-md-6 col-12 p-0 resizeable">
											<div class="form-group">
												<label>Destination</label>
												{* <label for="filter_travel_period">{$translation.destination}</label> *}
												{if $filter.postalcode}
													<input id="xsearch" type="text" class="form-control xsearch"
														name="filter[postalcode]" value="{$filter.postalcode}"
														style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
													<a href="#" class="clear_input"><i class="fas fa-window-close"></i></a>
												{else}
													<input id="xsearch" type="text" class="form-control xsearch"
														name="filter[postalcode]"
														placeholder="{$translation.search_placeholder}"
														style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
													<a href="#" class="clear_input"><i class="fas fa-window-close"></i></a>
												{/if}
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-12 p-0">
											<div class="form-group travel-drop">
												<label for="filter_travel_period">{$translation.travel_period}</label>
												<select name="filter[filter_travel_period]"
													class="form-control js-example-basic-single seach-dropdown"
													id="filter_travel_period">
													<option value="0">{$translation.all}</option>
													{$data.opt_travelling_period}
												</select>
											</div>
										</div>
										<div class="col-lg-2 col-md-6 col-12 p-0">
											<div class="form-group topic-drop">
												<label for="filter_category">{$translation.categories}</label>
												<select name="filter[filter_category]"
													class="form-control js-example-basic-single seach-dropdown"
													id="filter_category">
													<option value="0">{$translation.all}</option>
													{$data.opt_category}
												</select>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12 p-0">
											<div class="search-btn">
												<button type="submit"
													class="btn btn-default blue_btn">{$translation.search}</button>
												<a href="/{$lang}/search-help"><i class="fas fa-question fa-1x"></i></a>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</nav>
	</div>
	</div>


	<div class="d-none d-lg-block">
		<div class="col px-0">
			<nav class="navbar navbar-expand-lg navbar-dark py-md-20" style="background-color: #1490d0;">
				<a class="navbar-brand" href="#"></a>
				<button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div>
					<a href="href=/{$lang}/"><img src="/img/trans-140.png">&nbsp;&nbsp;
				</div>

				<div>
					<a href="href=/{$lang}/"><img src="/img/start/logo.png">&nbsp;&nbsp;
				</div>

				<div class="collapse navbar-collapse" id="navbarSupportedContent1">
					<ul class="navbar-nav mr-auto">
						&nbsp;&nbsp;&nbsp;&nbsp;
						{if !$user && !$user2}
							<li class="nav-item py-md-2">
								<a class="nav-link"
									href="/{$lang}/for-travellers/">{$translation.for_travellers}&nbsp;&nbsp;&nbsp;&nbsp;|</a>
							</li>

							<li class="nav-item py-md-2">
								<a class="nav-link"
									href="/{$lang}/for-vendors/">{$translation.for_vendors}&nbsp;&nbsp;&nbsp;&nbsp;|</a>
							</li>

							<li class="nav-item py-md-2">
								<a class="nav-link" href="/{$lang}/about-us/">{$translation.about_us} </a>
							</li>
						{/if}

						{if $user || $user2}
							<li class="nav-item py-md-2">
								<a class="nav-link" href="/{$lang}/bidds/">{$translation.bidds}&nbsp;&nbsp;&nbsp;&nbsp;|</a>
							</li>
						{/if}

						{if $user}
							<li class="nav-item py-md-2">
								<a class="nav-link"
									href="/{$lang}/kategorie/meine/">{$translation.my_offers}&nbsp;&nbsp;&nbsp;&nbsp;|</a>
							</li>
						{/if}

						{if $user2}
							<li class="nav-item py-md-2">
								<a class="nav-link"
									href="/{$lang}/create-inquiry/">{$translation.inquiry}&nbsp;&nbsp;&nbsp;&nbsp;</a>
							</li>
						{/if}

						{if $user}
							<li class="nav-item py-md-2">
								<a class="nav-link"
									href="/{$lang}/inserat-erstellen/">{$translation.offer}&nbsp;&nbsp;&nbsp;&nbsp;|</a>
							</li>

							<li class="nav-item py-md-2">
								<a class="nav-link"
									href="/{$lang}/profil/">{$translation.profile}&nbsp;&nbsp;&nbsp;&nbsp;</a>
							</li>
						{/if}
					</ul>
				</div>



				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item dropdown py-md-2">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-globe-americas fa-lg"
								style="margin-right:10px;"></i>{if $lang == "de"}EN{else}DE{/if}
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="/de/set/">DEUTSCH</a>
							<a class="dropdown-item" href="/en/set/">ENGLISH</a>
						</div>
					</li>
				</ul>

				{if $user || $user2}
					<div>
						<img src="img/start/20.png">
					</div>
					<div class="row pt-1">
						<div class="col">
							<ul class="list-group footer-menu justify-content-center"
								style="flex-direction: row; flex-wrap: wrap;">

								<li class="list-group-item border-0"><a href="/{$lang}/logout/">{$translation.logout}</a>
								</li>
							</ul>
						</div>
						<div>
							<img src="img/start/40.png">
						</div>
					{else}
						<div>
							<img src="img/start/40.png">
						</div>
						<div class="row pt-1">
							<div class="col">
								<ul class="list-group footer-menu justify-content-center"
									style="flex-direction: row; flex-wrap: wrap;">
									<li class="list-group-item border-0"><a href="/{$lang}/login/">{$translation.login}</a>
									</li>
								</ul>
							</div>
						</div>
						<div>
							<img src="img/start/40.png">
						</div>
					{/if}
			</nav>
		</div>
	</div>
<br>