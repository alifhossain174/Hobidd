<?php /* Smarty version Smarty-3.1.17, created on 2022-04-16 15:57:23
         compiled from "./inc/views/f_inc_confirm_ad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21366609136017cf48b87e00-52643285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a54fbbcb306fb3a953caf5741c92bc96aa8c316' => 
    array (
      0 => './inc/views/f_inc_confirm_ad.tpl',
      1 => 1650116937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21366609136017cf48b87e00-52643285',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6017cf48c39814_42849052',
  'variables' => 
  array (
    'msg' => 0,
    'translation' => 0,
    'data' => 0,
    'B_storeAdInquiry' => 0,
    'lang' => 0,
    'inquiry_id' => 0,
    'B_storeAdOffer' => 0,
    'B_storeAd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6017cf48c39814_42849052')) {function content_6017cf48c39814_42849052($_smarty_tpl) {?><div class="container">
	<div class="row">
		<div class="col">
            <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
				<div class="alert alert-success mt-3" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

				</div>
            <?php }?>

			<h1><?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_step3'];?>
</h1>

            <?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>

            
			<form method="post">
				<input type="hidden" name="store" value="true">
				<div class="checkbox" style="margin-top:20px;">
					<label>
						<input type="checkbox" name="data[terms]">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['info_terms'];?>

				</div>
                <br>

                <?php if ($_smarty_tpl->tpl_vars['B_storeAdInquiry']->value) {?>
					<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inquiry/<?php echo $_smarty_tpl->tpl_vars['inquiry_id']->value;?>
/">
						<button type="button"
								class="btn btn-secondary ml-2 mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_offer'];?>
</button>
					</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['B_storeAdOffer']->value) {?>
					<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-angebot-bearbeiten/">
						<button type="button"
								class="btn btn-secondary ml-2 mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_offer'];?>
</button>
					</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['B_storeAd']->value) {?>
					<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-bearbeiten/">
						<button type="button"
								class="btn btn-secondary ml-2 mt-3 mb-5"><?php echo $_smarty_tpl->tpl_vars['translation']->value['change_offer'];?>
</button>
					</a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['B_storeAd']->value) {?>

					
					<button type="submit" name="action" class="btn btn-success ml-2 mt-3 mb-5" value="all">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_activate_public'];?>

					</button>
                <?php } else { ?>
					<button type="submit" name="action" class="btn btn-info ml-2 mt-3 mb-5" value="private">
						<?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_activate_private'];?>

					</button>




					<button type="submit" name="action" class="btn btn-success ml-2 mt-3 mb-5" value="all">
						<?php echo $_smarty_tpl->tpl_vars['translation']->value['new_offer_activate_public'];?>

					</button>
                <?php }?>
			</form>

		</div>
	</div>
</div>
<?php }} ?>
