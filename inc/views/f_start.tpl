{include file="f_header.tpl"}

{if $B_mobile_intro}
    {include file="f_inc_do_not_know_5.tpl"}
{/if}


{if $B_start}
    {include file="f_inc_main_intro.tpl"}
{/if}


{*{if $B_start}
    {include file="f_inc_main_part_1.tpl"}
{/if}*}


{if $B_search || $B_intro || $B_detailCategoryPage}
    {include file="f_inc_search_result.tpl"}
{/if}


{if $B_detailVendorAds}
    {include file="f_inc_do_not_know_1.tpl"}
{/if}


{if $B_detailCategoryPageX || $B_detailVendorAdsX}
    {include file="f_inc_do_not_know_2.tpl"}
{/if}


{if $B_detailContent}
	<div class="container">
		<div class="row">
			<div class="col">{$data.content}</div>
		</div>
	</div>
{/if}


{if $B_storeAd || $B_storeAdOffer || $B_storeAdInquiry}
    {include file="f_inc_confirm_ad.tpl"}
{/if}


{if $B_contactForm}
    {include file="f_inc_contact_form.tpl"}
{/if}


{if $B_contactFormWinner}
    {include file="f_inc_do_not_know_3.tpl"}
{/if}


{if $B_reportAbuse}
    {include file="f_inc_report_abuse.tpl"}
{/if}


{if $B_checkout}
    {include file="f_inc_checkout.tpl"}
{/if}


{if $B_packageForm}
    {include file="f_inc_package_overview.tpl"}
{/if}


{if $B_forVendors}
    {include file="f_inc_for_vendors.tpl"}
{/if}


{if $B_forTravellers}
    {include file="f_inc_for_travellers.tpl"}
{/if}


{if $B_aboutUs}
    {include file="f_inc_about_us.tpl"}
{/if}

{if $B_editBids}
    {include file="f_inc_edit_bids.tpl"}
{/if}
{if $B_geldVerdienen}
    {include file="f_inc_geld_verdienen.tpl"}
{/if}

{if $B_searchHelp}
    {include file="f_inc_search_help.tpl"}
{/if}
{if $B_impressum}
    {include file="f_inc_website_imprint.tpl"}
{/if}

{if $B_vendorLandingpage}
    {include file="f_inc_vendor_landingpage.tpl"}
{/if}

{if $B_descriptionExtern}
    {include file="f_inc_description_extern.tpl"}
{/if}

{if $B_travellerLandingpage}
    {include file="f_inc_traveller_landingpage.tpl"}
{/if}


{if $B_userRegistration}
    {include file="f_inc_customer_registration.tpl"}
{/if}


{if $B_registerForm || $B_profileForm || $B_registerFormOffer}
    {include file="f_inc_vendor_registration.tpl"}
{/if}


{if $B_confirmRegister || $B_confirmRegisterOffer}
    {include file="f_inc_vendor_confirm_registration.tpl"}
{/if}


{if $B_confirmRegisterFailed || $B_confirmRegisterOfferFailed}
    {include file="f_inc_vendor_confirm_registration_failed.tpl"}
{/if}


{if $B_pageNotFound}
    {include file="f_inc_page_not_found.tpl"}
{/if}


{if $B_createAd || $B_editAd || $B_createAdOffer || $B_editAdOffer}
    {include file="f_inc_create_ad.tpl"}
{/if}


{if $B_loginForm}
    {include file="f_inc_login.tpl"}
{/if}


{if $B_loginFormOffer}
    {include file="f_inc_do_not_know_4.tpl"}
{/if}


{if $B_passwordForgottenForm}
    {include file="f_inc_password_forgotten.tpl"}
{/if}


{if $B_newPassworForm}
    {include file="f_inc_change_password.tpl"}
{/if}


{if $B_detailAd || $B_previewAd || $B_previewAdOffer || $B_previewAdInquiry}
    {include file="f_inc_detail_ad.tpl"}
{/if}


{if $B_inbox}
    {include file="f_inc_inbox.tpl"}
{/if}

{if $B_bidds && $B_customer}
    {include file="f_inc_bidds_customer.tpl"}
{/if}


{if $B_bidds && $B_vendor}
    {include file="f_inc_bidds_vendor.tpl"}
{/if}


{if $B_createInquiry && $B_customer}
    {include file="f_inc_create_inquiry.tpl"}
{/if}

{if $B_detailInquiry && !$B_customer}
    {include file="f_inc_detail_inquiry.tpl"}
    <div style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
        </div>
        {include file="f_inc_create_ad.tpl"}
    </div>
{/if}

{include file="f_footer.tpl"}

