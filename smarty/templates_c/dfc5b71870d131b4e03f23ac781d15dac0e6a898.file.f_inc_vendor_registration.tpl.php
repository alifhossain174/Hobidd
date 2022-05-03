<?php /* Smarty version Smarty-3.1.17, created on 2022-04-12 18:12:09
         compiled from "./inc/views/f_inc_vendor_registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:462555237614efd1f824473-11299090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfc5b71870d131b4e03f23ac781d15dac0e6a898' => 
    array (
      0 => './inc/views/f_inc_vendor_registration.tpl',
      1 => 1648070265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '462555237614efd1f824473-11299090',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614efd2026ab21_59456495',
  'variables' => 
  array (
    'msg' => 0,
    'pagedata' => 0,
    'B_registerForm' => 0,
    'B_registerFormOffer' => 0,
    'package' => 0,
    'translation' => 0,
    'data' => 0,
    'lang' => 0,
    'display_uid_fild' => 0,
    'vendor' => 0,
    'image_index' => 0,
    'i' => 0,
    'k' => 0,
    'val' => 0,
    'B_profileForm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614efd2026ab21_59456495')) {function content_614efd2026ab21_59456495($_smarty_tpl) {?>


<div class="container">

    <br>

            

    <div class="row">
        <div class="col">
            <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

                </div>
            <?php }?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 pr-md-5">
            <?php echo $_smarty_tpl->tpl_vars['pagedata']->value['content'];?>


            <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?>
                <div class="card mb-3">
                    <div class="card-header text-white" style="background:<?php echo $_smarty_tpl->tpl_vars['package']->value['color'];?>
;">
                        <?php echo $_smarty_tpl->tpl_vars['package']->value['name'];?>

                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php if ($_smarty_tpl->tpl_vars['package']->value['id']=="1") {?>
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['text_basic_package'];?>

                            <?php } elseif ($_smarty_tpl->tpl_vars['package']->value['id']=="4") {?>
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['priceinfo_zero'];?>

                            <?php } else { ?>
                                <?php echo $_smarty_tpl->tpl_vars['translation']->value['cost'];?>
 € <?php echo nf($_smarty_tpl->tpl_vars['package']->value['price']);?>
 <?php echo $_smarty_tpl->tpl_vars['translation']->value['priceinfo_package'];?>

                            <?php }?></p>
                    </div>
                </div>
            

            <?php }?>

            <br>
            <div>
				<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['reg_common'];?>
</h2>
            </div>

            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group group">
                    <label for="company"><?php echo $_smarty_tpl->tpl_vars['translation']->value['company_name'];?>
*</label>
                    <input type="text" class="form-control" name="data[company]" id="company"
                           placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['company'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['company'];?>
" required>
                </div>

                <div class="form-group group">
                    <label for="accomodationType"><?php echo $_smarty_tpl->tpl_vars['translation']->value['accomodation_type'];?>
*</label>
                    <select name="data[accomodationType]" class="form-control" id="accomodationType" required
                            value="<?php echo $_smarty_tpl->tpl_vars['data']->value['accomodationType'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_accomodationType'];?>

                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="street"><?php echo $_smarty_tpl->tpl_vars['translation']->value['street'];?>
*</label>
                        <input type="text" class="form-control" name="data[street]" id="street"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['street'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['street'];?>
" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="postalcode"><?php echo $_smarty_tpl->tpl_vars['translation']->value['postalcode'];?>
*</label>
                        <input type="text" class="form-control" name="data[postalcode]" id="postalcode"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['postalcode'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['postalcode'];?>
" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="location"><?php echo $_smarty_tpl->tpl_vars['translation']->value['location'];?>
*</label>
                        <input type="text" class="form-control" name="data[location]" id="location"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['location'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['location'];?>
" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="country"><?php echo $_smarty_tpl->tpl_vars['translation']->value['country'];?>
*</label>
                    <select name="data[country]" class="form-control" id="checkCountry">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_country'];?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="federal_state"><?php echo $_smarty_tpl->tpl_vars['translation']->value['federal_state'];?>
*</label>
                    <input type="text" class="form-control"
                           name="<?php if ($_smarty_tpl->tpl_vars['lang']->value=='de') {?>data[federal_state] <?php } else { ?> data[federal_state_en]<?php }?>"
                           id="federal_state"
                           placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['federal_state'];?>
"
                           value="<?php if ($_smarty_tpl->tpl_vars['lang']->value=='de') {?><?php echo $_smarty_tpl->tpl_vars['data']->value['federal_state'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['federal_state_en'];?>
<?php }?>" required>
                </div>

                <div class="form-group <?php if (!$_smarty_tpl->tpl_vars['display_uid_fild']->value) {?> hidden<?php }?>" id="uid-container">
                    <label for="uid"><?php echo $_smarty_tpl->tpl_vars['translation']->value['vat_number'];?>
</label>
                    <input type="text" class="form-control" name="data[uid]" id="uid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['uid'];?>
"
                           placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['vat_number'];?>
">
                </div>
                <br>
            <div>
				<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['reg_contact'];?>
</h2>
            </div>

                <div class="form-group">
                    <label for="mobile"><?php echo $_smarty_tpl->tpl_vars['translation']->value['description_mobile_number'];?>


                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['description_mobile_number_format'];?>
</label>
                    <input type="text" class="form-control" name="data[mobile]" id="mobile"
                           placeholder="0043 664 1234567"
                           value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mobile'];?>
"<?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?> required<?php }?>>
                </div>

                <div class="form-group">
                    <label for="phone"><?php echo $_smarty_tpl->tpl_vars['translation']->value['phone'];?>
</label>
                    <input type="text" class="form-control" name="data[phone]" id="phone" placeholder="0043 664 1234567"
                           value="<?php echo $_smarty_tpl->tpl_vars['data']->value['phone'];?>
">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email"><?php echo $_smarty_tpl->tpl_vars['translation']->value['email'];?>
*</label>
                        <input type="text" class="form-control" name="data[email]" id="email"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['email'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="website"><?php echo $_smarty_tpl->tpl_vars['translation']->value['website'];?>
</label>
                        <input type="text" class="form-control" name="data[website]" id="website"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['website'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['website'];?>
">
                    </div>
                </div>
                
                <br>
                <div <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value) {?> hidden<?php }?> >
				<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['pro_house'];?>
&nbsp;<i class="fas fa-info-circle tippy"
                               data-tippy-content="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['translation']->value['profile_tooltip_common_description'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"></i>
                </div></h2>


                <div class="form-row" <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?> hidden<?php }?>>
                    <div class="form-group col-md-12">
                        
                        <textarea id="common_description" class="form-control" rows="7"
                                  placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['common_description'];?>
"
                                  name="<?php if ($_smarty_tpl->tpl_vars['lang']->value=='de') {?>data[common_description] <?php } else { ?> data[common_description_en]<?php }?>"><?php if ($_smarty_tpl->tpl_vars['lang']->value=='de') {?><?php echo $_smarty_tpl->tpl_vars['data']->value['common_description'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['common_description_en'];?>
<?php }?>
						</textarea>
                    </div>
                </div>

                <br>
                <div <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value) {?> hidden<?php }?> >
				<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['pro_faci'];?>
&nbsp;
                </div></h2>


                <div class="form-row" <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?> hidden<?php }?>>
                    <div class="form-group col-md-12">
                        
                        
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_facility'];?>

                    </div>
                </div>

                <br>
                <div <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value) {?> hidden<?php }?> >
				<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['pro_cancelation'];?>

                </div></h2>


                <div class="form-row" <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?> hidden<?php }?>>
                    <div class="form-group col-md-12">
                        
                        <textarea id="cancellation_conditions" class="form-control" rows="7"
                                  placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['profile_cancellation_conditions'];?>
"
                                  name="<?php if ($_smarty_tpl->tpl_vars['lang']->value=='de') {?>data[cancellation_conditions] <?php } else { ?> data[cancellation_conditions_en]<?php }?>"><?php if ($_smarty_tpl->tpl_vars['lang']->value=='de') {?><?php echo $_smarty_tpl->tpl_vars['data']->value['cancellation_conditions'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['cancellation_conditions_en'];?>
<?php }?></textarea>
                    </div>
                </div>
                
                <br>
                <div>
				<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['reg_password'];?>
</h2>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="your choice"><?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?><?php echo $_smarty_tpl->tpl_vars['translation']->value['password'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['translation']->value['password2'];?>
<?php }?>
                            *</label>
                        <input type="password" class="form-control" name="data[password]" id="password"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['password'];?>
" <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?> required<?php }?>>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_repeat"><?php echo $_smarty_tpl->tpl_vars['translation']->value['repeat_password'];?>
*</label>
                        <input type="password" class="form-control" name="data[password_repeat]" id="password_repeat"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['password'];?>
" <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?> required<?php }?>>
                    </div>
                </div>

                <div class="form-group <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?> hidden <?php }?>" style="margin-top:30px;">
                    <h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['upload_profile_images_heading'];?>
</h2>
                    <br>
                    <p><?php echo $_smarty_tpl->tpl_vars['translation']->value['upload_profile_images_description'];?>
</p>
                </div>
                <br>
                <div class="form-row upload-gallery-photos form-group" <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?> hidden<?php }?>>
                    <div class="form-group col-12  d-flex pl-0 align-items-center">
                        <div class="file1 mr-3">
                            <label class="btn btn-secondary"> <span><?php echo $_smarty_tpl->tpl_vars['translation']->value['upload_profile_images_btn'];?>
</span>
                                <input type="file" class="form-control-file profile-gallery-files" id="file1"
                                       name="file1" size="200" onChange="addImage($(this))"/> </label>
                        </div>
                        <div class="file1-desc"><?php echo $_smarty_tpl->tpl_vars['translation']->value['upload_profile_btn_description'];?>
</div>
                    </div>

                </div>

                <div class="form-group profile-gallery profile-page-gallery" <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value||!$_smarty_tpl->tpl_vars['vendor']->value['file']) {?> hidden<?php }?>>
                    <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                        <div class="carousel-inner">
                            <?php $_smarty_tpl->tpl_vars["image_index"] = new Smarty_variable(0, null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vendor']->value['file']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                                <?php $_smarty_tpl->tpl_vars["image_index"] = new Smarty_variable($_smarty_tpl->tpl_vars['image_index']->value+1, null, 0);?>
                                <div class="carousel-item <?php if ($_smarty_tpl->tpl_vars['image_index']->value<=1) {?>active<?php }?>">
                                    <img class="d-block w-100" src="/img/catalog/<?php echo $_smarty_tpl->tpl_vars['i']->value["file"];?>
">
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev align-items-end" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon"
                                  style="width:40px; height:40px; margin-bottom: 40px;" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next align-items-end" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon"
                                  style="width:40px; height:40px; margin-bottom: 40px;" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="gallery-row">
                        <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable(1, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vendor']->value['file']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                            <div class="gallery <?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
">
                                <img src="/img/catalog/<?php echo $_smarty_tpl->tpl_vars['i']->value["file"];?>
">
                                <span class="delete-pic" onclick="deletePhotoFromGallery('<?php echo $_smarty_tpl->tpl_vars['i']->value["file"];?>
', <?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
)"><i
                                            class="far fa-times-circle"></i></span>
                            </div>
                            <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable($_smarty_tpl->tpl_vars['val']->value+1, null, 0);?>
                        <?php } ?>
                    </div>
                </div>

            
                <div <?php if ($_smarty_tpl->tpl_vars['B_profileForm']->value) {?> hidden<?php }?> >
				<h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['reg_confirm'];?>
</h2>
                </div>

            

                <?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?>
                    <div class="g-recaptcha" data-sitekey="6Ld2phMTAAAAANjahu7CaXFbOSJVeabrTbLv4Flq"></div>
                    
                    <br>
                    <div class="checkbox" style="margin-top:20px;">
                        <label>
                            <input type="checkbox" name="data[terms]">
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['info_terms'];?>

                    
                    </div>
                    
                    
                        
                <?php }?>

            <br>
                     
                <div>
                    <button type="submit"
                            class="btn btn-success mt-3 mb-5"><?php if ($_smarty_tpl->tpl_vars['B_registerForm']->value||$_smarty_tpl->tpl_vars['B_registerFormOffer']->value) {?><?php echo $_smarty_tpl->tpl_vars['translation']->value['register_and_buy'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_data'];?>
<?php }?></button>
                </div>
                    
            </form>
        </div>
        <div class="col-md-4">
            <?php if ($_smarty_tpl->tpl_vars['B_profileForm']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("f_inc_vendor_profile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php } else { ?>
                &nbsp;
            <?php }?>
        </div>
    </div>
</div>
			<?php }} ?>
