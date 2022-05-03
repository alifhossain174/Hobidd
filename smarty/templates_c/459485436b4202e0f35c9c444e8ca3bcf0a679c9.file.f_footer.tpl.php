<?php /* Smarty version Smarty-3.1.17, created on 2022-04-11 17:43:25
         compiled from "./inc/views/f_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:990938625614e21d0607272-94752998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '459485436b4202e0f35c9c444e8ca3bcf0a679c9' => 
    array (
      0 => './inc/views/f_footer.tpl',
      1 => 1647264119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '990938625614e21d0607272-94752998',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614e21d076b502_76771635',
  'variables' => 
  array (
    'lang' => 0,
    'translation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614e21d076b502_76771635')) {function content_614e21d076b502_76771635($_smarty_tpl) {?><div class="container my-5">
	<div class="row">
		<div class="col">
			<div style="height:60px;">&nbsp;</div>
		</div>
	</div>

	<div class="row border-top pt-3">
		<div class="col">
			<ul class="list-group footer-menu justify-content-center" style="flex-direction: row; flex-wrap: wrap;">
				<li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/about-us/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['about_us'];?>
</a></li>
                <li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/for-travellers/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['for_travellers'];?>
</a></li>
				<li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/for-vendors/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['for_vendors'];?>
</a></li>
				<li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/faq/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['faq'];?>
</a></li>
			</ul>
		</div>
	</div>

	<div class="row pt-1">
		<div class="col">
			<ul class="list-group footer-menu justify-content-center" style="flex-direction: row; flex-wrap: wrap;">
                <li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/agb/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['terms'];?>
</a></li>
				<li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/datenschutz/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['privacy'];?>
</a></li>
				<li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/impressum/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['imprint'];?>
</a></li>
                <li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/kontakt/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['contact'];?>
</a></li>
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

<script type="text/javascript">
    $(document).ready(function () {
        $.cookieBar({
            message: '<?php echo $_smarty_tpl->tpl_vars['translation']->value['cookie_text'];?>
',
            acceptButton: true,
            acceptText: '<?php echo $_smarty_tpl->tpl_vars['translation']->value['cookie_accept'];?>
',
			declineText: '<?php echo $_smarty_tpl->tpl_vars['translation']->value['cookie_decline'];?>
',
			policyText: '<?php echo $_smarty_tpl->tpl_vars['translation']->value['privacy_policy'];?>
',
            autoEnable: true,
            expireDays: 365,
            bottom: true,
            append: true,
            forceShow: false,
            fixed: true,
        });
    });
</script>



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
<?php }} ?>
