<?php /* Smarty version Smarty-3.1.17, created on 2022-04-22 19:24:02
         compiled from "./inc/views/f_inc_create_ad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2068116909615060cb7b95f8-10418309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10356d36b8b6ed52b6329f58574c6c3ea8b067dd' => 
    array (
      0 => './inc/views/f_inc_create_ad.tpl',
      1 => 1650646555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2068116909615060cb7b95f8-10418309',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_615060cbd18623_23057829',
  'variables' => 
  array (
    'data' => 0,
    'translation' => 0,
    'msg' => 0,
    'pagedata' => 0,
    'lang' => 0,
    'vendor' => 0,
    'B_createAdOffer' => 0,
    'B_editAdOffer' => 0,
    'max_duration' => 0,
    'duration_readonly' => 0,
    'image_index' => 0,
    'i' => 0,
    'k' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615060cbd18623_23057829')) {function content_615060cbd18623_23057829($_smarty_tpl) {?>

<br>
<div class="container">
    <div class="row">
        <div class="col">
            <?php if (isset($_smarty_tpl->tpl_vars['data']->value['offer_id'])||isset($_GET['id'])) {?>
                <h1><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_offer'];?>
</h1>
            <?php } else { ?>
                <h1><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_step1'];?>
</h1>
            <?php }?>


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


            <form method="post" action="" enctype="multipart/form-data" style="margin-top:20px;">

                <input type="hidden" name="data[type]" value="offer">
                <?php if (isset($_smarty_tpl->tpl_vars['data']->value['offer_id'])||isset($_GET['id'])) {?>
                    <input type="hidden" name="edit_offer" value="edit">
                    <input type="hidden" name="offer_id" value="<?php echo $_GET['id'];?>
"><?php }?>
                
                <?php if (isset($_GET['advertise_id'])) {?>
                    <input type="hidden" name="offer_id" value="<?php echo $_GET['advertise_id'];?>
">
                    <input type="hidden" name="edit_offer" value="advertise_offer">
                <?php }?>

                <div class="form-group">
                    <label for="title"><?php echo $_smarty_tpl->tpl_vars['translation']->value['text_title'];?>
*</label>
                    <input type="text" maxlength="70" class="form-control" name="data[title]" id="title"
                           placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['text_title'];?>
" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
">
                </div>

                <div class="form-group">
                    <label for="accomodationType"><?php echo $_smarty_tpl->tpl_vars['translation']->value['accomodation_type'];?>
*</label>
                    <select name="data[accomodationType]" class="form-control" id="accomodationType" required
                            value="<?php echo $_smarty_tpl->tpl_vars['data']->value['accomodationType'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_accomodationType'];?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="categories"><?php echo $_smarty_tpl->tpl_vars['translation']->value['categories'];?>
*</label>
                    <br/>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_category'];?>

                </div>
                <br>
                <div class="form-group group">
                    <label for="content"><?php echo $_smarty_tpl->tpl_vars['translation']->value['description_offer'];?>
*</label>
                    <textarea class="form-control" required rows="7" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['description_offer'];?>
"
                              name="<?php if ($_smarty_tpl->tpl_vars['lang']->value=='de') {?>data[content]<?php } else { ?>data[contenten]<?php }?>"><?php if ($_smarty_tpl->tpl_vars['lang']->value=='de') {?><?php echo $_smarty_tpl->tpl_vars['vendor']->value['common_description'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['vendor']->value['common_description_en'];?>
<?php }?></textarea>
                </div>

                <!-- <div class="form-group group <?php if ($_smarty_tpl->tpl_vars['data']->value['type']!="raffle") {?> hidden<?php }?>" id="xpriceinfo"> -->
                <div class="form-group group" id="xpriceinfo">
                    <label for="priceinfo"><?php echo $_smarty_tpl->tpl_vars['translation']->value['priceinfo'];?>
*</label>
                    <textarea class="form-control" rows="7" placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['priceinfo'];?>
"
                              name="data[priceinfo]"><?php echo $_smarty_tpl->tpl_vars['data']->value['priceinfo'];?>
</textarea>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="days"><?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
*</label>
                        <input type="text" class="form-control" maxlength="5" name="data[days]" id="days"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['days'];?>
">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="persons"><?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
*</label>
                        <input type="text" class="form-control" maxlength="5" name="data[persons]" id="persons"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['persons'];?>
">
                    </div>
                </div>

                <div class="form-row">
                    <?php if (isset($_GET['advertise_id'])) {?>
                        <div class="form-group col-sm-6">
                            <label for="date_from"><?php echo $_smarty_tpl->tpl_vars['translation']->value['create_ad_from'];?>
*</label>
                            <input name="data[date_from]" id="date_from" required value="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="date_until"><?php echo $_smarty_tpl->tpl_vars['translation']->value['create_ad_until'];?>
*</label>
                            <input name="data[date_until]" id="date_until" required value="">
                        </div>
                    <?php } else { ?>
                        <div class="form-group col-sm-6">
                            <label for="date_from"><?php echo $_smarty_tpl->tpl_vars['translation']->value['create_ad_from'];?>
*</label>
                            <input name="data[date_from]" id="date_from" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['date_from'];?>
">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="date_until"><?php echo $_smarty_tpl->tpl_vars['translation']->value['create_ad_until'];?>
*</label>
                            <input name="data[date_until]" id="date_until" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['date_until'];?>
">
                        </div>
                    <?php }?>
                    <script>
                        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                        $('#date_from').datepicker({
                            uiLibrary: 'bootstrap4',
                            iconsLibrary: 'fontawesome',
                            format: 'yyyy-mm-dd',
                            maxDate: function () {
                                return $('#date_until').val();
                            }
                        });
                        $('#date_until').datepicker({
                            uiLibrary: 'bootstrap4',
                            iconsLibrary: 'fontawesome',
                            format: 'yyyy-mm-dd',
                            minDate: function () {
                                return $('#date_from').val();
                            },
                        });
                        // .on('change', function (e) {
                        // if($('#date_until').val() != '' && $('#date_from').val() != ''){
                        //     var d1 = new Date($('#date_from').val());
                        //     var d2 = new Date($('#date_until').val());
                        //     var diff = 0;
                        //     if (d1 && d2) {
                        //         diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
                        //     }
                        //     $('#days').val(diff);
                        // }

                        // });
                    </script>
                </div>

                <div class="form-group">
                    <label for="value"><?php if ($_smarty_tpl->tpl_vars['B_createAdOffer']->value||$_smarty_tpl->tpl_vars['B_editAdOffer']->value) {?><?php echo $_smarty_tpl->tpl_vars['translation']->value['value2'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['translation']->value['value'];?>
<?php }?>
                        *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&euro;</div>
                        </div>
                        <input type="text" class="form-control" maxlength="5" name="data[value]" id="value"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['value'];?>
" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
">
                    </div>
                </div>

                <div class="form-group group<?php if ($_smarty_tpl->tpl_vars['data']->value['type']==''||$_smarty_tpl->tpl_vars['data']->value['type']=="raffle") {?> <?php }?>" id="xminprice1">
                    <label for="threshold1"><?php echo $_smarty_tpl->tpl_vars['translation']->value['min_price1'];?>
*</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&euro;</div>
                        </div>
                        <input type="text" class="form-control" name="data[threshold1]" id="threshold1"
                               placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['min_price1'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['threshold1'];?>
">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" style="width: 100%">
                        <label for="duration_date">
                            <?php echo $_smarty_tpl->tpl_vars['translation']->value['duration_in_days'];?>
 (max <?php echo $_smarty_tpl->tpl_vars['max_duration']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['translation']->value['days'];?>
)*
                        </label>
                        <div class="input-group">
                            <input name="data[duration_date]" id="duration_date" class="form-control" required
                                   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['duration_date'];?>
"
                                   required <?php if ($_smarty_tpl->tpl_vars['duration_readonly']->value) {?>readonly="readonly"<?php }?>>
                            <?php if ($_smarty_tpl->tpl_vars['duration_readonly']->value) {?>
                                <span class="input-group-append" role="right-icon"
                                      style="border-left: 1px solid #ced4da;">
								<button class="btn btn-outline-secondary border-left-0" type="button" readonly
                                        style="background-color: #e9ecef;border: 1px solid #ced4da;">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</button>
							</span>
                            <?php }?>
                        </div>
                    </div>
                    <script>
                        <?php if (!$_smarty_tpl->tpl_vars['duration_readonly']->value) {?>
                        var yesterday = new Date();
                        yesterday.setDate(yesterday.getDate() - 1);

                        var today180 = new Date();
                        today180.setDate(today180.getDate() + 180);

                        $('#duration_date').datepicker({
                            uiLibrary: 'bootstrap4',
                            iconsLibrary: 'fontawesome',
                            format: 'yyyy-mm-dd',
                            minDate: yesterday,
                            maxDate: today180,
                        });
                        <?php }?>
                    </script>
                </div>

                
                <input type="hidden" name="files" id="files" value=""/>
                <div class="form-group profile-gallery add-profile-gallery" style="margin-top:30px;">
                    <h2><?php echo $_smarty_tpl->tpl_vars['translation']->value['choose_profile_images_for_add'];?>
</h2>
                    <p><?php echo $_smarty_tpl->tpl_vars['translation']->value['create_ad_select_images_description'];?>
</p>
                    <div class="container" style="padding:0;margin-top: 15px;">
                        <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable(1, null, 0);?>

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
                                        <img class="d-block w-100" src="/img/catalog/<?php echo $_smarty_tpl->tpl_vars['i']->value->file;?>
">
                                    </div>
                                <?php } ?>
                            </div>
                            <a class="carousel-control-prev align-items-end" href="#carouselExampleControls"
                               role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon"
                                      style="width:40px; height:40px; margin-bottom: 40px;" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next align-items-end" href="#carouselExampleControls"
                               role="button" data-slide="next">
                                <span class="carousel-control-next-icon"
                                      style="width:40px; height:40px; margin-bottom: 40px;" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="gallery-row" style="margin-top:15px;">
                            <?php $_smarty_tpl->tpl_vars["image_file"] = new Smarty_variable('', null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vendor']->value['file']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                                <div class="gallery <?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" onclick="addPhotoForAdds('<?php echo $_smarty_tpl->tpl_vars['i']->value->file;?>
', <?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
)"
                                     style="cursor: pointer;">
                                    <img src="/img/catalog/<?php echo $_smarty_tpl->tpl_vars['i']->value->file;?>
">
                                    <span class="choose-image-for-ad <?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"
                                    >
                                        <?php if (($_smarty_tpl->tpl_vars['data']->value['file1']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>
                                            <i class="far fa-check-circle"></i>




<?php } elseif (($_smarty_tpl->tpl_vars['data']->value['file2']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>




                                            <i class="far fa-check-circle"></i>




<?php } elseif (($_smarty_tpl->tpl_vars['data']->value['file3']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>




                                            <i class="far fa-check-circle"></i>




<?php } elseif (($_smarty_tpl->tpl_vars['data']->value['file4']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>




                                            <i class="far fa-check-circle"></i>




<?php } elseif (($_smarty_tpl->tpl_vars['data']->value['file5']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>




                                            <i class="far fa-check-circle"></i>




<?php } elseif (($_smarty_tpl->tpl_vars['data']->value['file6']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>




                                            <i class="far fa-check-circle"></i>




<?php } elseif (($_smarty_tpl->tpl_vars['data']->value['file7']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>




                                            <i class="far fa-check-circle"></i>




<?php } elseif (($_smarty_tpl->tpl_vars['data']->value['file8']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>




                                            <i class="far fa-check-circle"></i>




<?php } elseif (($_smarty_tpl->tpl_vars['data']->value['file9']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>




                                            <i class="far fa-check-circle"></i>




<?php } elseif (($_smarty_tpl->tpl_vars['data']->value['file10']==$_smarty_tpl->tpl_vars['i']->value->file)) {?>




                                            <i class="far fa-check-circle"></i>




<?php } else { ?>




                                            <i class="far fa-times-circle"></i>
                                        <?php }?>
                                        </span>

                                </div>
                                <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable($_smarty_tpl->tpl_vars['val']->value+1, null, 0);?>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="preview" value="true">

                <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/angebot-erstellen-abbrechen/">
                    <button type="button" class="btn btn-secondary mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['cancel'];?>
</button>
                </a>
                <button type="submit"
                        class="btn btn-success mt-3 mb-5"><?php if (isset($_smarty_tpl->tpl_vars['data']->value['offer_id'])||isset($_GET['id'])) {?><?php echo $_smarty_tpl->tpl_vars['translation']->value['update'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_continue_step_2'];?>
<?php }?></button>
            </form>

        </div>
        <div class="col-md-4">
            <?php echo $_smarty_tpl->getSubTemplate ("f_inc_vendor_profile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <div class="text-center">
                <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/hilfe/">
                    <button type="button" class="btn btn-primary my-5 w-75"><?php echo $_smarty_tpl->tpl_vars['translation']->value['help'];?>
</button>
                </a>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
