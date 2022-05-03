<?php /* Smarty version Smarty-3.1.17, created on 2022-05-02 09:37:10
         compiled from "./inc/views/f_inc_main_intro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1169170535614e21cf2ba729-03958502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49e258547796ac7b278793942991fbfe4b084bad' => 
    array (
      0 => './inc/views/f_inc_main_intro.tpl',
      1 => 1651477021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1169170535614e21cf2ba729-03958502',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614e21cf368cb9_27251105',
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
<?php if ($_valid && !is_callable('content_614e21cf368cb9_27251105')) {function content_614e21cf368cb9_27251105($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/clients/client30/web3019/web/core/libs/Smarty/plugins/modifier.truncate.php';
?><?php if ($_smarty_tpl->tpl_vars['lang']->value=='de') {?>

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
<div class="container d-lg-block mb-4 mt-0 moboff" >
    <div class="align-items-center py-4 border-1">
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




  


<div class="container d-lg-block mb-4 mt-0">


  


            <div class="mmm">
				<img class="img-fluid mx-auto d-block" src="/img/start/2b-preis.png">
			</div>

                 
    
            
            </div>
            
<div class="container d-lg-block mb-4 mt-0">
    <div>
    
        <div class="container d-lg-block mb-4 mt-0"></div>

      
		


         <p><br />HOBIDD ist keine Buchungs,- Preisvergleichs- oder gar Schn&auml;ppchenplattform. Auf HOBIDD finden Sie ausschlie&szlig;lich direkt von Anbietern eigens zusammengestellte, hochwertige Pauschalen.<br /><br /><br /></p>

            <h2>HOBIDD STEHT F&Uuml;R HOLIDAY BIDDINGS</h2>

            <p><br />Das bedeutet, das Interessenten die M&ouml;glichkeit gegeben wird, Preisvorschl&auml;ge f&uuml;r eingestellte Pauschalen einfach, ohne gro&szlig;en Aufand und f&uuml;r Dritte nicht ersichtlich, direkt &uuml;ber unsere Plattform an den jeweiligen Anbieter zu &uuml;bermitteln.
            <br /><br />Und nachdem wir eben keine Buchungs,- Preisvergleichs- oder gar Schn&auml;ppchenplattform sind, erheben wir von Anbietern auch keine Provisionen f&uuml;r &uuml;ber unsere Plattform zustande gekommene Direktbuchungen.
            <br /><br />Genau dieser Unterschied k&ouml;nnte sich als positiv auf abgegebne Preisvorschl&auml;ge, inkludierte Mehrleistungen in angebotnen Pauschalen oder auf Upgrades auswirken.
            <br /><br />Wir wollen das Direktbuchen so einfach wie m&ouml;glich machen. Reisende registriern sich kostenlos. Anbieter w&auml;hlen das f&uuml;r sie passende Paket.<br /><br /><br /></p>


           
				<img class="img-fluid mx-auto d-block" src="/img/start/office1.png">
			</div>
            
			<div>
                <h2>HOBIDD IST EINE GAST TRIFFT HOTEL PLATTFORM</h2>
            </div>

            <p><br />Die besten Urlaube sind bekanntlich dort, wo wir als Gast im Mittelpunkt stehen und die pers&ouml;nliche Note des Hauses nicht zu kurz kommt.
            <br /><br />Doch wie findet man solch ausgew&auml;hlte Reiseziele?
            <br /><br />Genau dieser Frage sind wir bei hobidd nachgegangen. Unsere Mission: Wir bringen Reisende und Anbieter zusammen &ndash; schnell, reibungslos und fair. Das Urlaubsfeeling soll schon vor dem Urlaub aufkommen und eine Win-Win Situation f&uuml;r alle Beteiligten sein!<br /><br /><br /><br />
            <div>
				<img class="img-fluid mx-auto d-block" src="/img/start/hb-reisen.png">
			</div>

        
		</div>

	</div>



			</div>
            </div>
            

<div class="container">
    <br>
    <br>


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








    

    
    

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['lang']->value=='en') {?>


<br>

<div class="container d-lg-block mb-4 mt-0">
    <div class="align-items-center py-4 border-1">
        <div class="search-bar-wrap" style="padding-top: -260px;">
            <div class="center-block">
                <form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/kategorie/suche/" style="text-align: center;">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 p-0">
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
                                <button type="submit" class="btn btn-default blue_btn">Search</button>
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







<div class="container d-lg-block mb-4 mt-0">

            <div>
				<img class="img-fluid mx-auto d-block" src="/img/start/2b-suggest.png">
			</div>

    <br>

    
    
    
            
            </div>
            
<div class="container d-lg-block mb-4 mt-0">
    <div>
    
        <div class="container d-lg-block mb-4 mt-0"></div>

        
		
            
            
            <p>HOBIDD is not a booking, price comparison or even bargain platform. On HOBIDD you will only find high-quality packages compiled directly by suppliers<br /><br /><br /></p>
            
            <h2>HOBIDD STANDS FOR HOLIDAY BIDDINGS</h2>

            

            <p><br />This means that interested parties are given the opportunity to submit price proposals for advertised packages directly to the respective provider via our platform, easily, without much effort and not visible to third parties.
            <br /><br />And since we are not a booking, price comparison or bargain platform, we do not charge any commissions to suppliers for direct bookings made via our platform.
            <br /><br />Exactly this difference could have a positive effect on price proposals, included additional services in offered packages or on upgrades.
            <br /><br />We want to make direct booking as easy as possible. Travelers register free of charge. Providers choose the package that suits them.<br /><br /><br /></p>




            <div>
				<img class="img-fluid mx-auto d-block" src="/img/start/office1.png">
			</div>

            <div>
                <h2>HOBIDD BRINGS GUESTS AND PROVIDERS TOGETHER</h2>
            </div>
            <p><br />The best holidays are always in hotels that focus fully on their guests and add their own personal touch to everything.<br /><br />Yet, how do you go about finding these exclusive hotel locations?<br /><br />That is precisely the question that we at hobidd chose to develop an answer to. Our mission is to bring travellers and hotels together &ndash; swiftly, smoothly and fairly. Experience that holiday feeling already before the holiday starts! The holiday package should be a win-win arrangement for all involved, too!<br /><br /><br /><br />
            

 
            <div>
				<img class="img-fluid mx-auto d-block" src="/img/start/hb-reisen.png">
			</div>

        
		</div>

	</div>



			</div>
            </div>
            

<div class="container">
    <br>
    <br>


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
                                        <p><span class="big-text">&nbsp;<?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
</span>
                                            <span class="small-text"
                                                  style="text-transform: uppercase;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
</span>&nbsp;&nbsp;&nbsp;
                                            <span class="big-text"><?php echo $_smarty_tpl->tpl_vars['val']->value['persons'];?>
</span>
                                            <span class="small-text"
                                                  style="text-transform: uppercase;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
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








    














    



<?php }?>
<?php }} ?>
