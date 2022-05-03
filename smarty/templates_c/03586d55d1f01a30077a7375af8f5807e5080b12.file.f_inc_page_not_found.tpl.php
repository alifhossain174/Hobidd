<?php /* Smarty version Smarty-3.1.17, created on 2022-04-17 11:11:27
         compiled from "./inc/views/f_inc_page_not_found.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1489056068614ef5128d95b9-14285825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03586d55d1f01a30077a7375af8f5807e5080b12' => 
    array (
      0 => './inc/views/f_inc_page_not_found.tpl',
      1 => 1647264099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1489056068614ef5128d95b9-14285825',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614ef512b438f6_19600216',
  'variables' => 
  array (
    'lang' => 0,
    'banner' => 0,
    'filter' => 0,
    'translation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614ef512b438f6_19600216')) {function content_614ef512b438f6_19600216($_smarty_tpl) {?><section class="blog" style="margin-top:45px; padding-left:20px;">
	<div class="container" style="max-width:1030px;">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<h2 class="title">Error: 404</h2>
				<div class="post">
					<p>
						Page not found
						<br>
						<br>
						<a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/">Start</a>
					</p>
				</div>
			</div>
		</div>

		<div class="row d-none d-lg-block">
			<div class="col hero-container"
				 style="background: url('<?php echo $_smarty_tpl->tpl_vars['banner']->value[1001]['image'];?>
') no-repeat center center; background-size:cover">
				<div class="container">
					<div class="row">
						<div class="col"><img class="img-fluid mx-auto d-block" style="padding-top: 20px;"
											  src="<?php echo $_smarty_tpl->tpl_vars['banner']->value[1003]['image'];?>
"></div>
					</div>

					<div class="row" style="padding-top: 10px;">
						<div class="col-md-12 center-block">
							<form method="get" action="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/kategorie/suche/" style="text-align: center;">
                                <?php if ($_smarty_tpl->tpl_vars['filter']->value['postalcode']) {?>
									<input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
										   value="<?php echo $_smarty_tpl->tpl_vars['filter']->value['postalcode'];?>
"
										   style="width:720px; height:55px; display:inline; border:0; border-radius:0;">
									<button type="submit"
											style="position:absolute;margin-left:-65px; background:#fff; color:#888; height:55px; border:0; border-radius:0;"
											class="btn btn-default blue_btn"><i class="fas fa-search fa-2x"></i>
									</button>
                                <?php } else { ?>
									<input id="xsearch" type="text" class="form-control" name="filter[postalcode]"
										   placeholder="<?php echo $_smarty_tpl->tpl_vars['translation']->value['search_placeholder'];?>
"
										   style="width:720px; height:55px; display:inline; border:0; border-radius:0;">
									<button type="submit"
											style="position:absolute;margin-left:-65px; background:#fff; color:#888; height:55px; border:0; border-radius:0;"
											class="btn btn-default blue_btn"><i class="fas fa-search fa-2x"></i>
									</button>
                                <?php }?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<?php }} ?>
