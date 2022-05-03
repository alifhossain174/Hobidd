<?php /* Smarty version Smarty-3.1.17, created on 2022-02-28 14:33:05
         compiled from "./inc/views/f_inc_do_not_know_1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:488211157601754e7d82b34-34824932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c230ea2542915dff2890b700df2d7c4b3b835773' => 
    array (
      0 => './inc/views/f_inc_do_not_know_1.tpl',
      1 => 1645984416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '488211157601754e7d82b34-34824932',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_601754e7e84252_44551335',
  'variables' => 
  array (
    'data' => 0,
    'val' => 0,
    'lang' => 0,
    'translation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_601754e7e84252_44551335')) {function content_601754e7e84252_44551335($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/clients/client30/web3019/web/core/libs/Smarty/plugins/modifier.truncate.php';
?><div class="container">
    <div class="row">

        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
            <?php if (($_smarty_tpl->tpl_vars['val']->value['is_private']==0&&!isset($_SESSION['frontend']['auth']['user_id'])&&is_null($_SESSION['frontend']['auth']['user_id']))) {?>
                <div class="col md-6 col-lg-4 mb-5">
                    <div class="card">
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
/"><h3
                                            class="card-title"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['titleen'],50,"...",true);?>
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
                            <p>&nbsp; <span class="big-text"><?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
</span><span class="small-text"
                                                                                     style="text-transform: uppercase;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
</span>&nbsp;&nbsp;&nbsp;<span
                                        class="big-text"><?php echo $_smarty_tpl->tpl_vars['val']->value['persons'];?>
</span><span
                                        class="small-text">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
</span></p>
                            
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
                    </div>
                </div>
            <?php } elseif ((isset($_SESSION['frontend']['auth']['user_id'])&&!is_null($_SESSION['frontend']['auth']['user_id']))) {?>
                <div class="col md-6 col-lg-4 mb-5">
                    <div class="card">
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
/"><h3
                                            class="card-title"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['titleen'],50,"...",true);?>
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
                            <p>&nbsp; <span class="big-text"><?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
</span><span class="small-text"
                                                                                     style="text-transform: uppercase;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['nights'];?>
</span>&nbsp;&nbsp;&nbsp;<span
                                        class="big-text"><?php echo $_smarty_tpl->tpl_vars['val']->value['persons'];?>
</span><span
                                        class="small-text">&nbsp;<?php echo $_smarty_tpl->tpl_vars['translation']->value['persons'];?>
</span></p>
                            
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
                    </div>
                </div>
            <?php }?>
        <?php } ?>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("f_page_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
