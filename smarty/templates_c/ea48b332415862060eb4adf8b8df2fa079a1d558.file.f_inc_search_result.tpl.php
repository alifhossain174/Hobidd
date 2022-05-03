<?php /* Smarty version Smarty-3.1.17, created on 2022-04-30 18:22:04
         compiled from "./inc/views/f_inc_search_result.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1430386070614e21cf44ebe2-56465468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea48b332415862060eb4adf8b8df2fa079a1d558' => 
    array (
      0 => './inc/views/f_inc_search_result.tpl',
      1 => 1651335722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1430386070614e21cf44ebe2-56465468',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614e21cfaca239_59583090',
  'variables' => 
  array (
    'lang' => 0,
    'translation' => 0,
    'filter' => 0,
    'data' => 0,
    'B_startXXX' => 0,
    'val' => 0,
    'B_del' => 0,
    'B_detailCategoryPage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614e21cfaca239_59583090')) {function content_614e21cfaca239_59583090($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/clients/client30/web3019/web/core/libs/Smarty/plugins/modifier.truncate.php';
?>

<br>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded',function(){
        $('body').on('click','.clear_input',function(event){
            event.preventDefault();
            $('body').find('.xsearch').val('');
            $('body').find('.xsearch').focus();
        });
    },false);
</script>
<div class="container d-lg-block mb-4 mt-0">
    <div class="align-items-center border-1">
        <div class="search-bar-wrap" style="padding-top: -260px;">
            <div class="center-block">
                <form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/kategorie/suche/" style="text-align: center;">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 p-0 resizeable">
                            <div class="form-group">
                                
                                <label for="filter_travel_period"><?php echo $_smarty_tpl->tpl_vars['translation']->value['destination'];?>
</label>
                                <?php if ($_smarty_tpl->tpl_vars['filter']->value['postalcode']) {?>
                                    <input id="xsearch" type="text" class="form-control xsearch" name="filter[postalcode]"
                                           value="<?php echo $_smarty_tpl->tpl_vars['filter']->value['postalcode'];?>
"
                                           style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
                                           <a href="#" class="clear_input"><i class="fas fa-window-close"></i></a>
                                <?php } else { ?>
                                    <input id="xsearch" type="text" class="form-control xsearch" name="filter[postalcode]"
                                           placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['search_placeholder'];?>
"
                                           style="width:720px; height:56px; display:inline; border:0; border-radius:0;">
                                           <a href="#" class="clear_input"><i class="fas fa-window-close"></i></a>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 p-0">
                            <div class="form-group travel-drop">
                                <label for="filter_travel_period"><?php echo $_smarty_tpl->tpl_vars['translation']->value['travel_period'];?>
</label>
                                <select name="filter[filter_travel_period]" class="form-control js-example-basic-single seach-dropdown" id="filter_travel_period">
                                    <option value="0"><?php echo $_smarty_tpl->tpl_vars['translation']->value['all'];?>
</option>
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_travelling_period'];?>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12 p-0">
                            <div class="form-group topic-drop">
                                <label for="filter_category"><?php echo $_smarty_tpl->tpl_vars['translation']->value['categories'];?>
</label>
                                <select name="filter[filter_category]" class="form-control js-example-basic-single seach-dropdown" id="filter_category">
                                    <option value="0"><?php echo $_smarty_tpl->tpl_vars['translation']->value['all'];?>
</option>
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_category'];?>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 p-0">
                            <div class="search-btn">
                                <button type="submit" class="btn btn-default blue_btn"><?php echo $_smarty_tpl->tpl_vars['translation']->value['search'];?>
</button>
                                <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/search-help"><i class="fas fa-question fa-1x"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<br>




<div class="container">
    



    <div class="row">
        
            <?php if ($_smarty_tpl->tpl_vars['B_startXXX']->value) {?>
                <h1><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_vacations'];?>
</h1>
                <br>
            <?php }?>


            <?php if (count($_smarty_tpl->tpl_vars['data']->value)>0) {?>
                <div class="card-deck">
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                        <?php if (!is_null($_smarty_tpl->tpl_vars['val']->value['id'])&&isset($_smarty_tpl->tpl_vars['val']->value['id'])) {?>

                            <div class="col-md-4">
                                <div class="card mb-5">
                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"><img class="card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['val']->value['file1_700'];?>
"
                                                                               alt="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['title'],50,"...",true);?>
"></a>
                                    <div class="card-body">
                                        <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['val']->value['titleen'], $tmp)!=0)) {?>
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/">
                                                <h3 class="card-title"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['titleen'],50,"...",true);?>
</h3></a>
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"><p class="card-text"
                                                                                     style="color:#000;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['contenten'],200,"...",true);?>
</p>
                                            </a>
                                        <?php } else { ?>
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"><h3
                                                        class="card-title"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['title'],50,"...",true);?>
</h3></a>
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"><p class="card-text"
                                                                                     style="color:#000;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['content'],200,"...",true);?>
</p>
                                            </a>
                                        <?php }?>

                                    </div>

                                    <div class="card-footer">
                                        <p><span class="big-text"><?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
</span>
                                            <span class="small-text"
                                                  style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
&nbsp;</span>
                                            <span class="big-text"><?php echo $_smarty_tpl->tpl_vars['val']->value['persons'];?>
</span>
                                            <span class="small-text"
                                                  style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
</span>

                                            
                                            <?php if ($_smarty_tpl->tpl_vars['val']->value['type']=="offer") {?>
                                        <p style="margin-top: 25px;"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/">
                                                <button type="button" name="bidd" class="btn btn-success width-100"><i
                                                            class="fas fa-check-circle fa-2x"
                                                            style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['button_submit_price_suggestion'];?>

                                                </button>
                                            </a></p>
                                        <br>
                                        <?php } else { ?>
                                        <p style="margin-top: 25px;"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/artikel/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/">
                                                <button type="button" name="bidd" class="btn btn-info width-100"><i
                                                            class="fas fa-thumbs-up fa-2x"
                                                            style="margin-right:10px; vertical-align:middle;"></i><?php echo $_smarty_tpl->tpl_vars['translation']->value['button_submit_draw'];?>

                                                </button>
                                            </a></p>
                                        <br>
                                        <?php }?>
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['val']->value['type']=="offer"&&$_smarty_tpl->tpl_vars['B_del']->value) {?>
                                        <?php if (($_smarty_tpl->tpl_vars['val']->value['btnStatus']==true)) {?>
                                            <div class="card-footer">

                                                <?php if ((count($_smarty_tpl->tpl_vars['val']->value['bids'])>0)) {?>
                                                    
                                                    
                                                    
                                                    
                                                <?php } else { ?>
                                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-erstellen?id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">
                                                        <button type="button"
                                                                class="btn btn-default"
                                                                style="background: #04a7bd;color:#fff;text-transform: uppercase"><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_offer'];?>
</button>
                                                    </a>
                                                <?php }?>

                                            </div>
                                        <?php } else { ?>
                                            <div class="card-footer">
                                                <a href="javascript:void(0)">
                                                    <button type="button"
                                                            class="btn btn-default"
                                                            style="background: grey;text-transform: uppercase"><?php echo $_smarty_tpl->tpl_vars['translation']->value['offer_inactive'];?>
</button>
                                                </a>
                                            </div>
                                        <?php }?>
                                        <div class="card-footer">
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-erstellen?advertise_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">
                                                <button type="button" class="btn btn-success"
                                                        style="text-transform: uppercase"><?php echo $_smarty_tpl->tpl_vars['translation']->value['advertise_again'];?>
</button>
                                            </a>
                                        </div>
                                        <div class="card-footer">
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/delete-ad/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"
                                               onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['translation']->value['confirm_del'];?>
');">
                                                <button type="button" class="btn btn-danger"
                                                        style="text-transform: uppercase"><?php echo $_smarty_tpl->tpl_vars['translation']->value['delete_ad'];?>
</button>
                                            </a>
                                        </div>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['B_del']->value) {?>
                                        <div class="card-footer">
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/delete-ad/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
/"
                                               onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['translation']->value['confirm_del'];?>
');">
                                                <button type="button" class="btn btn-secondary"
                                                        style="text-transform: uppercase"
                                                        disabled><?php echo $_smarty_tpl->tpl_vars['translation']->value['delete_ad'];?>
</button>
                                            </a>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>

                        <?php }?>
                    <?php } ?>

                    <?php $_smarty_tpl->tpl_vars['missingCards'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['missingCards']->step = 1;$_smarty_tpl->tpl_vars['missingCards']->total = (int) ceil(($_smarty_tpl->tpl_vars['missingCards']->step > 0 ? 3+1 - ((count($_smarty_tpl->tpl_vars['data']->value)+1)) : (count($_smarty_tpl->tpl_vars['data']->value)+1)-(3)+1)/abs($_smarty_tpl->tpl_vars['missingCards']->step));
if ($_smarty_tpl->tpl_vars['missingCards']->total > 0) {
for ($_smarty_tpl->tpl_vars['missingCards']->value = (count($_smarty_tpl->tpl_vars['data']->value)+1), $_smarty_tpl->tpl_vars['missingCards']->iteration = 1;$_smarty_tpl->tpl_vars['missingCards']->iteration <= $_smarty_tpl->tpl_vars['missingCards']->total;$_smarty_tpl->tpl_vars['missingCards']->value += $_smarty_tpl->tpl_vars['missingCards']->step, $_smarty_tpl->tpl_vars['missingCards']->iteration++) {
$_smarty_tpl->tpl_vars['missingCards']->first = $_smarty_tpl->tpl_vars['missingCards']->iteration == 1;$_smarty_tpl->tpl_vars['missingCards']->last = $_smarty_tpl->tpl_vars['missingCards']->iteration == $_smarty_tpl->tpl_vars['missingCards']->total;?>
                        <div class="card">
                        </div>
                    <?php }} ?>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['B_detailCategoryPage']->value) {?>
                <h1><?php echo $_smarty_tpl->tpl_vars['translation']->value['no_offers_yet'];?>
</h1>
                <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-erstellen/">
                    <button type="button" class="btn btn-success mt-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['create_first_offer'];?>
</button>
                </a>
            <?php }?>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("f_page_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
