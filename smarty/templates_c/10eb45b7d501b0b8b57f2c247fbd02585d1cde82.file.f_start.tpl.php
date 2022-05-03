<?php /* Smarty version Smarty-3.1.17, created on 2022-04-11 17:43:25
         compiled from "./inc/views/f_start.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287220824614e21cd1fb117-52597586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10eb45b7d501b0b8b57f2c247fbd02585d1cde82' => 
    array (
      0 => './inc/views/f_start.tpl',
      1 => 1647264090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287220824614e21cd1fb117-52597586',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614e21cdcbbaa6_10247699',
  'variables' => 
  array (
    'B_mobile_intro' => 0,
    'B_start' => 0,
    'B_search' => 0,
    'B_intro' => 0,
    'B_detailCategoryPage' => 0,
    'B_detailVendorAds' => 0,
    'B_detailCategoryPageX' => 0,
    'B_detailVendorAdsX' => 0,
    'B_detailContent' => 0,
    'data' => 0,
    'B_storeAd' => 0,
    'B_storeAdOffer' => 0,
    'B_storeAdInquiry' => 0,
    'B_contactForm' => 0,
    'B_contactFormWinner' => 0,
    'B_reportAbuse' => 0,
    'B_checkout' => 0,
    'B_packageForm' => 0,
    'B_forVendors' => 0,
    'B_forTravellers' => 0,
    'B_aboutUs' => 0,
    'B_editBids' => 0,
    'B_geldVerdienen' => 0,
    'B_searchHelp' => 0,
    'B_impressum' => 0,
    'B_vendorLandingpage' => 0,
    'B_descriptionExtern' => 0,
    'B_travellerLandingpage' => 0,
    'B_userRegistration' => 0,
    'B_registerForm' => 0,
    'B_profileForm' => 0,
    'B_registerFormOffer' => 0,
    'B_confirmRegister' => 0,
    'B_confirmRegisterOffer' => 0,
    'B_confirmRegisterFailed' => 0,
    'B_confirmRegisterOfferFailed' => 0,
    'B_pageNotFound' => 0,
    'B_createAd' => 0,
    'B_editAd' => 0,
    'B_createAdOffer' => 0,
    'B_editAdOffer' => 0,
    'B_loginForm' => 0,
    'B_loginFormOffer' => 0,
    'B_passwordForgottenForm' => 0,
    'B_newPassworForm' => 0,
    'B_detailAd' => 0,
    'B_previewAd' => 0,
    'B_previewAdOffer' => 0,
    'B_previewAdInquiry' => 0,
    'B_inbox' => 0,
    'B_bidds' => 0,
    'B_customer' => 0,
    'B_vendor' => 0,
    'B_createInquiry' => 0,
    'B_detailInquiry' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614e21cdcbbaa6_10247699')) {function content_614e21cdcbbaa6_10247699($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("f_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['B_mobile_intro']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_do_not_know_5.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_start']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_main_intro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>





<?php if ($_smarty_tpl->tpl_vars['B_search']->value||$_smarty_tpl->tpl_vars['B_intro']->value||$_smarty_tpl->tpl_vars['B_detailCategoryPage']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_search_result.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_detailVendorAds']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_do_not_know_1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_detailCategoryPageX']->value||$_smarty_tpl->tpl_vars['B_detailVendorAdsX']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_do_not_know_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_detailContent']->value) {?>
	<div class="container">
		<div class="row">
			<div class="col"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</div>
		</div>
	</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_storeAd']->value||$_smarty_tpl->tpl_vars['B_storeAdOffer']->value||$_smarty_tpl->tpl_vars['B_storeAdInquiry']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_confirm_ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_contactForm']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_contact_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_contactFormWinner']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_do_not_know_3.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_reportAbuse']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_report_abuse.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_checkout']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_checkout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_packageForm']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_package_overview.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_forVendors']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_for_vendors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_forTravellers']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_for_travellers.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_aboutUs']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_about_us.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_editBids']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_edit_bids.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['B_geldVerdienen']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_geld_verdienen.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_searchHelp']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_search_help.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['B_impressum']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_website_imprint.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_vendorLandingpage']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_vendor_landingpage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_descriptionExtern']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_description_extern.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_travellerLandingpage']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_traveller_landingpage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_userRegistration']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_customer_registration.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_profileForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_vendor_registration.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_confirmRegister']->value||$_smarty_tpl->tpl_vars['B_confirmRegisterOffer']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_vendor_confirm_registration.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_confirmRegisterFailed']->value||$_smarty_tpl->tpl_vars['B_confirmRegisterOfferFailed']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_vendor_confirm_registration_failed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_pageNotFound']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_page_not_found.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_createAd']->value||$_smarty_tpl->tpl_vars['B_editAd']->value||$_smarty_tpl->tpl_vars['B_createAdOffer']->value||$_smarty_tpl->tpl_vars['B_editAdOffer']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_create_ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_loginForm']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_loginFormOffer']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_do_not_know_4.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_passwordForgottenForm']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_password_forgotten.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_newPassworForm']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_change_password.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_detailAd']->value||$_smarty_tpl->tpl_vars['B_previewAd']->value||$_smarty_tpl->tpl_vars['B_previewAdOffer']->value||$_smarty_tpl->tpl_vars['B_previewAdInquiry']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_detail_ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_inbox']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_inbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_bidds']->value&&$_smarty_tpl->tpl_vars['B_customer']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_bidds_customer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_bidds']->value&&$_smarty_tpl->tpl_vars['B_vendor']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_bidds_vendor.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['B_createInquiry']->value&&$_smarty_tpl->tpl_vars['B_customer']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_create_inquiry.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_detailInquiry']->value&&!$_smarty_tpl->tpl_vars['B_customer']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("f_inc_detail_inquiry.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("f_inc_create_ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("f_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
