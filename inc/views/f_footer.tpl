<div class="container my-5">
	<div class="row">
		<div class="col">
			<div style="height:60px;">&nbsp;</div>
		</div>
	</div>

	<div class="row border-top pt-3">
		<div class="col">
			<ul class="list-group footer-menu justify-content-center" style="flex-direction: row; flex-wrap: wrap;">
				<li class="list-group-item border-0"><a href="/{$lang}/about-us/">{$translation.about_us}</a></li>
                <li class="list-group-item border-0"><a href="/{$lang}/for-travellers/">{$translation.for_travellers}</a></li>
				<li class="list-group-item border-0"><a href="/{$lang}/for-vendors/">{$translation.for_vendors}</a></li>
				<li class="list-group-item border-0"><a href="/{$lang}/faq/">{$translation.faq}</a></li>
			</ul>
		</div>
	</div>

	<div class="row pt-1">
		<div class="col">
			<ul class="list-group footer-menu justify-content-center" style="flex-direction: row; flex-wrap: wrap;">
                <li class="list-group-item border-0"><a href="/{$lang}/agb/">{$translation.terms}</a></li>
				<li class="list-group-item border-0"><a href="/{$lang}/datenschutz/">{$translation.privacy}</a></li>
				<li class="list-group-item border-0"><a href="/{$lang}/impressum/">{$translation.imprint}</a></li>
                <li class="list-group-item border-0"><a href="/{$lang}/kontakt/">{$translation.contact}</a></li>
			</ul>
		</div>
	</div>

	<div class="row pt-1">
		<div class="col">
			<ul class="list-group footer-menu justify-content-center" style="flex-direction: row; flex-wrap: wrap;">
				<li class="list-group-item border-0"><a href="https://www.facebook.com/holidaybiddings/"><i
								class="fab fa-facebook-f fa-2x"></i></a></li>
				<li class="list-group-item border-0"><a href="https://www.instagram.com/holidaybiddings/"><i
								class="fab fa-instagram fa-2x"></i></a></li>
				<li class="list-group-item border-0"><a href="https://twitter.com/holidaybiddings"><i
								class="fab fa-twitter fa-2x"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
		integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
		crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
		integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
		crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGXKXnNmRF-Z0lZpt0_tITtjvkyq5VrSE&callback=initMap" async
		defer></script>

<script type="text/javascript" src="/js/jquery.cookiebar/jquery.cookiebar.js"></script>

<script type="text/javascript" src="/js/libs/popper.min.js"></script>
<script type="text/javascript" src="/js/libs/tippy-bundle.umd.min.js"></script>

<script src="js/functions.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{literal}
<script type="text/javascript">
    $(document).ready(function () {
        $.cookieBar({
            message: '{/literal}{$translation.cookie_text}{literal}',
            acceptButton: true,
            acceptText: '{/literal}{$translation.cookie_accept}{literal}',
			declineText: '{/literal}{$translation.cookie_decline}{literal}',
			policyText: '{/literal}{$translation.privacy_policy}{literal}',
            autoEnable: true,
            expireDays: 365,
            bottom: true,
            append: true,
            forceShow: false,
            fixed: true,
        });
    });
</script>
{/literal}

{literal}
	<script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-72109632-1', 'auto');
        ga('send', 'pageview');
	</script>
	<script>
        $('#xsearch').focus();
	</script>
{/literal}


<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
    if (matchMedia('only screen and (min-width: 641px)').matches) {
        window.__lc = window.__lc || {};
        window.__lc.license = 9791140;
        (function () {
            var lc = document.createElement('script');
            lc.type = 'text/javascript';
            lc.async = true;
            lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(lc, s);
        })();
    }

	// $(document).ready(function() {
	// 	$('.js-example-basic-single').select2();
	// });
	$('.js-example-basic-single').select2({
		minimumResultsForSearch: Infinity
	});

	$('.js-example-basic-single').on('select2:opening select2:closing', function( event ) {
		var $searchfield = $(this).parent().find('.select2-search__field');
		$searchfield.prop('disabled', true);
	});
</script>
<!-- End of LiveChat code -->
</body>
</html>
