<?php /* Smarty version Smarty-3.1.17, created on 2022-03-11 10:43:11
         compiled from "./inc/views/f_inc_detail_inquiry.tpl" */ ?>
<?php /*%%SmartyHeaderCode:731895736017c181a3e8f3-33408851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '219c3f1dafa8b2adf4aba8d11a82e7a774992342' => 
    array (
      0 => './inc/views/f_inc_detail_inquiry.tpl',
      1 => 1645984416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '731895736017c181a3e8f3-33408851',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6017c181b1f2a4_61182728',
  'variables' => 
  array (
    'data' => 0,
    'translation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6017c181b1f2a4_61182728')) {function content_6017c181b1f2a4_61182728($_smarty_tpl) {?><div class="container">
	<div class="row">
		<div class="col">
            <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['pagedata']['content'];?>


			<table align="left"
				   role="presentation" width="100%"
				   style="margin-top: 10px; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;"
				   valign="top">
				<tbody>
				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_number'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['number'];?>

					</td>
				</tr>
				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_link'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['url'];?>
</a>
					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_vacation_destination'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['country'];?>

					</td>
				</tr>
				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_federal_state'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['federal_state'];?>

					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_topics'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['topics'];?>

					</td>
				</tr>
				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_category'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['category'];?>

					</td>
				</tr>
				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_provisions'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['provision'];?>

					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_flexible_travel_period'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['flexible_travel_time'];?>

					</td>
				</tr>
				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_travel_period'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['date_from'];?>
 <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_until'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['date_until'];?>

					</td>
				</tr>
				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_number_of_nights'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['days'];?>

					</td>
				</tr>
				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_number_of_adults'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['adults'];?>

					</td>
				</tr>
				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_number_of_children'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['children'];?>

					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_additional_info'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['additional_info'];?>

					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
						&nbsp;
					</td>
				</tr>

				<tr align="center"
					style="vertical-align: top; text-align: left;"
					valign="top">
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry_budget'];?>
:
					</td>
					<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 1px; padding-left: 1px;"
						valign="top">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['inquiry']['budget'];?>

					</td>
				</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>
<?php }} ?>
