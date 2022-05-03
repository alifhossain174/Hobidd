<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:25
         compiled from "./inc/views/pages/ad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189520642260173bfeaf58e5-32509404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68597cde67483808e95989e58fbf0a0b87909fba' => 
    array (
      0 => './inc/views/pages/ad.tpl',
      1 => 1645984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189520642260173bfeaf58e5-32509404',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfec2d9b0_48162367',
  'variables' => 
  array (
    'B_listAds' => 0,
    'state' => 0,
    'filter' => 0,
    'sort' => 0,
    'sort_icon' => 0,
    'data' => 0,
    'val' => 0,
    'B_listAdLikes' => 0,
    'B_createAd' => 0,
    'B_editAd' => 0,
    'ajax' => 0,
    'css' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfec2d9b0_48162367')) {function content_60173bfec2d9b0_48162367($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/clients/client30/web3019/web/core/libs/Smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['B_listAds']->value) {?>
    <form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
        <a class="btn btn-primary ajaxLayer" href="?s=createAd"><i class=" icon-plus-sign"></i> Inserat hinzufügen</a>
        <div class="form-group">
            <input class="form-control" type="text" name="filter[query]" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value['query'];?>
" placeholder="Suche"
                   style="width:200px;">
        </div>
        <button class="btn" id="log-clause"><i class="icon-search"></i> Suchen</button>
        <button name="clear" value="true" id="clearSearchForm" class="btn"><i class="icon-remove-sign"></i> Leeren
        </button>
        <input type="hidden" name="xclear" id="xclear" value="false">
    </form>
    <?php echo $_smarty_tpl->getSubTemplate ("b_result_counter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=id&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">ID<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['title'];?>
</a></th>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=title&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Bezeichung<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['title'];?>
</a></th>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=vendor&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Anbieter<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['title'];?>
</a></th>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=category&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Kategorie<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['title'];?>
</a></th>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=category&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Wert<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['title'];?>
</a></th>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=category&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Mind.<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['title'];?>
</a></th>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=fb_likes&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Likes<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['fb_likes'];?>
</a></th>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=fb_shares&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Shares<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['fb_shares'];?>
</a>
            </th>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=valid_to&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Läuft bis<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['valid_to'];?>
</a>
            </th>
            <th><a class="ajaxLink" href="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&order=active&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
">Aktiv<?php echo $_smarty_tpl->tpl_vars['sort_icon']->value['active'];?>
</a></th>
            <th>Gewinner Link</th>
            <th style="width:50px;">Aktion</th>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['vendor'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['category'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['value'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['threshold1'];?>
</td>
                <td><a href="?s=listAdLikes&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['fb_likes'];?>
</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['fb_shares'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['valid_to'],"%d.%m.%Y %H:%M");?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['val']->value['active']) {?>Ja<?php } else { ?>Nein<?php }?></td>
                <td>http://www.noomcee.com/de/kontakt-gewinner/<?php echo $_smarty_tpl->tpl_vars['val']->value['hash'];?>
/</td>
                <td nowrap="nowrap" style="text-align:center;">
                    <a href="?s=editAd&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Bearbeiten"
                       class="ajaxLayer glyphicon glyphicon-pencil"></a>
                    <a href="?s=deleteAd&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" id="d<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" title="Löschen"
                       class="delete glyphicon glyphicon-trash"></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php echo $_smarty_tpl->getSubTemplate ("b_page_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_listAdLikes']->value) {?>
    <form method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" class="well form-inline ajaxSearchForm">
        <a class="btn btn-primary" href="?s=listAds">zurück</a>
    </form>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Profil</th>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value->name;?>
</td>
                <td><a href="https://facebook.com/<?php echo $_smarty_tpl->tpl_vars['val']->value->profile_id;?>
" taget="_blank"><?php echo $_smarty_tpl->tpl_vars['val']->value->profile_id;?>
</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['B_createAd']->value||$_smarty_tpl->tpl_vars['B_editAd']->value) {?>
    <form class="form-horizontal<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajaxForm<?php }?>" role="form" method="post" action="?s=<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
          id="layer"<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> style="width:900px; height:900px;"<?php }?>>
        <div id="form-header">
            <h4>Inserat <?php if ($_smarty_tpl->tpl_vars['state']->value=="createAd") {?>hinzufügen<?php } else { ?>bearbeiten<?php }?></h4>
        </div>

        <div class="col-md-12">
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['name'];?>
">
                <label for="title" class="col-sm-2 control-label span2">Bezeichnung</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
" name="data[title]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['name'];?>
">
                <label for="title" class="col-sm-2 control-label span2">Bezeichnung EN</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="titleen" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['titleen'];?>
" name="data[titleen]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['type'];?>
">
                <label for="type" class="col-sm-2 control-label span2">Typ</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="type" name="data[type]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_type'];?>

                    </select>
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['type'];?>
">
                <label for="type" class="col-sm-2 control-label span2">Gewinnspiel Typ</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="raffle_type" name="data[raffle_type]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_raffle_type'];?>

                    </select>
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['name'];?>
">
                <label for="title" class="col-sm-2 control-label span2">Gewinnspiel URL</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="titleen" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['raffle_url'];?>
"
                           name="data[raffle_url]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['value'];?>
">
                <label for="value" class="col-sm-2 control-label span2">Wert</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="value" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
" name="data[value]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['value'];?>
">
                <label for="value" class="col-sm-2 control-label span2">Mindestwert</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="threshold1" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['threshold1'];?>
"
                           name="data[threshold1]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['content'];?>
">
                <label for="content" class="col-sm-2 control-label span2">Common Description</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[content]"
                              id="content"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</textarea>
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['content'];?>
">
                <label for="content" class="col-sm-2 control-label span2">Common Description EN</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[contenten]"
                              id="contenten"><?php echo $_smarty_tpl->tpl_vars['data']->value['contenten'];?>
</textarea>
                </div>
            </div>

            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['priceinfo'];?>
">
                <label for="priceinfo" class="col-sm-2 control-label span2">Preis/Info</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:100px; width:600px;" name="data[priceinfo]"
                              id="priceinfo"><?php echo $_smarty_tpl->tpl_vars['data']->value['priceinfo'];?>
</textarea>
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['priceinfo'];?>
">
                <label for="priceinfo" class="col-sm-2 control-label span2">Preis/Info EN</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:100px; width:600px;" name="data[priceinfoen]"
                              id="priceinfoen"><?php echo $_smarty_tpl->tpl_vars['data']->value['priceinfoen'];?>
</textarea>
                </div>
            </div>


            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['vendor_id'];?>
">
                <label for="vendor_id" class="col-sm-2 control-label span2">Anbieter</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="active" name="data[vendor_id]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_vendor'];?>

                    </select>
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['category_id'];?>
">
                <label for="category_id" class="col-sm-2 control-label span2">Kategorie</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="category_id" name="data[category_id]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_category'];?>

                    </select>
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['valid_to'];?>
">
                <label for="valid_to" class="col-sm-2 control-label span2">Gültig bis</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="valid_to" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['valid_to'];?>
"
                           name="data[valid_to]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['active'];?>
">
                <label for="active" class="col-sm-2 control-label span2">Aktiv</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="active" name="data[active]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_active'];?>

                    </select>
                </div>
            </div>

            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['content'];?>
">
                <label for="content" class="col-sm-2 control-label span2">Gewinnspiel Teilnahmebedingungen</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[raffle_legal]"
                              id="raffle_legal"><?php echo $_smarty_tpl->tpl_vars['data']->value['raffle_legal'];?>
</textarea>
                </div>
            </div>


            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['featured'];?>
">
                <label for="featured" class="col-sm-2 control-label span2" style="color:#428bca;">Auf Startseite</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="featured" name="data[featured]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_featured'];?>

                    </select>
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['featured_position'];?>
">
                <label for="featured_position" class="col-sm-2 control-label span2" style="color:#428bca;">Startseite
                    Position (1-8)</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="featured_position" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['featured_position'];?>
"
                           name="data[featured_position]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['featured_category_id'];?>
">
                <label for="featured_category_id" class="col-sm-2 control-label span2"
                       style="color:#428bca;">Kategorie</label>
                <div class="col-sm-6 span6">
                    <select class="form-control" id="featured_category_id" name="data[featured_category_id]">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['opt_featured_category_id'];?>

                    </select>
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['featured_from'];?>
">
                <label for="featured_from" class="col-sm-2 control-label span2" style="color:#428bca;">Von</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="featured_from" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['featured_from'];?>
"
                           name="data[featured_from]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['featured_to'];?>
">
                <label for="featured_to" class="col-sm-2 control-label span2" style="color:#428bca;">Bis</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="featured_to" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['featured_to'];?>
"
                           name="data[featured_to]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['headline_de'];?>
">
                <label for="headline_de" class="col-sm-2 control-label span2" style="color:#428bca;">Headline DE</label>
                <div class="col-sm-9 span8">
                    <input type="text" class="form-control" id="headline_de" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headline_de'];?>
"
                           name="data[headline_de]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['headline'];?>
">
                <label for="headline" class="col-sm-2 control-label span2" style="color:#428bca;">Headline EN</label>
                <div class="col-sm-9 span8">
                    <input type="text" class="form-control" id="headline" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headline'];?>
"
                           name="data[headline]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['text_de'];?>
">
                <label for="text" class="col-sm-2 control-label span2" style="color:#428bca;">Description DE</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[text_de]"
                              id="text_de"><?php echo $_smarty_tpl->tpl_vars['data']->value['text_de'];?>
</textarea>
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['text'];?>
">
                <label for="text" class="col-sm-2 control-label span2" style="color:#428bca;">Description EN</label>
                <div class="col-sm-8 span8">
					<textarea class="span8" rows="5" style="height:300px; width:600px;" name="data[text]"
                              id="text"><?php echo $_smarty_tpl->tpl_vars['data']->value['text'];?>
</textarea>
                </div>
            </div>

            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['image'];?>
">
                <label for="image" class="col-sm-2 control-label span2" style="color:#428bca;">Select Image</label>
                <div class="col-sm-6 span6">
                    <input type="file" class="form-control" id="file"
                           name="file"/><?php echo $_smarty_tpl->tpl_vars['data']->value['image'];?>

                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['link'];?>
">
                <label for="link" class="col-sm-2 control-label span2" style="color:#428bca;">Link / URL EN</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="link" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['link'];?>
"
                           name="data[link]">
                </div>
            </div>

            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['link_de'];?>
">
                <label for="link" class="col-sm-2 control-label span2" style="color:#428bca;">Link / URL DE</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="link_de" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['link_De'];?>
"
                           name="data[link_de]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['regular_price'];?>
">
                <label for="regular_price" class="col-sm-2 control-label span2" style="color:#428bca;">Regular
                    price</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="regular_price" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['regular_price'];?>
"
                           name="data[regular_price]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['price_reduction'];?>
">
                <label for="price_reduction" class="col-sm-2 control-label span2" style="color:#428bca;">Price
                    reduction</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control" id="price_reduction" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['price_reduction'];?>
"
                           name="data[price_reduction]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['start_date'];?>
">
                <label for="start_date" class="col-sm-2 control-label span2" style="color:#428bca;">Valid from</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="start_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['start_date'];?>
"
                           name="data[start_date]">
                </div>
            </div>
            <div class="form-group<?php echo $_smarty_tpl->tpl_vars['css']->value['end_date'];?>
">
                <label for="end_date" class="col-sm-2 control-label span2" style="color:#428bca;">Valid to</label>
                <div class="col-sm-6 span6">
                    <input type="text" class="form-control datepicker" id="end_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['end_date'];?>
"
                           name="data[end_date]">
                </div>
            </div>


        </div>
        <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Speichern</button>
                    <a href="?s=listAds" class="btn btn-default">Abbrechen</a>
                </div>
            </div>
        <?php }?>
        <input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
    </form>

    <script type="text/javascript">
        $(document).ready(function () {
            initTinymce();
        });
    </script>

<?php }?>
<?php }} ?>
