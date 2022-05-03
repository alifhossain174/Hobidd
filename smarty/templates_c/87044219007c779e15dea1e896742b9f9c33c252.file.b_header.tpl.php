<?php /* Smarty version Smarty-3.1.17, created on 2022-02-27 19:43:24
         compiled from "./inc/views/b_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164408418460173bfe71c940-07094236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87044219007c779e15dea1e896742b9f9c33c252' => 
    array (
      0 => './inc/views/b_header.tpl',
      1 => 1645984142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164408418460173bfe71c940-07094236',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60173bfe75ae26_58039522',
  'variables' => 
  array (
    'menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60173bfe75ae26_58039522')) {function content_60173bfe75ae26_58039522($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Backend</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/fontawesome/fontawesome.min.css" rel="stylesheet">
	<link href="assets/css/fontawesome/solid.min.css" rel="stylesheet">
	<link href="assets/css/jquery-ui/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<link href="assets/js/colorPicker/colorPicker.css" rel="stylesheet">
	<link href="assets/js/uploadify/uploadify.css" rel="stylesheet">
	<link href="assets/css/custom.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<script src="assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.form.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="assets/js/colorPicker/jquery.colorPicker.min.js" type="text/javascript"></script>
	<script src="assets/js/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
	<script src="assets/js/shortcut.js" type="text/javascript"></script>
	<script src="assets/js/tinymce/tinymce.min.js" type="text/javascript"></script>
	<script src="assets/js/functions.js" type="text/javascript"></script>
</head>
<body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Backend</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<!--<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="users") {?>active<?php }?>"><a href="?s=listUsers">Benutzer</a></li>-->
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="categories") {?>active<?php }?>"><a href="?s=listCategories">Kategorien</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="facilities") {?>active<?php }?>"><a href="?s=listFacilities">Ausstattung</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="provisions") {?>active<?php }?>"><a href="?s=listProvisions">Verpflegung</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="countries") {?>active<?php }?>"><a href="?s=listCountries">Länder</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="vendors") {?>active<?php }?>"><a href="?s=listVendors">Anbieter</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="customers") {?>active<?php }?>"><a href="?s=listCustomers">Bieter</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="ads") {?>active<?php }?>"><a href="?s=listAds">Inserate</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="contents") {?>active<?php }?>"><a href="?s=listContents">Content-Seiten</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="start_image") {?>active<?php }?>"><a href="?s=listStartImages">Startseite</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="keyword_list") {?>active<?php }?>"><a href="?s=editKeywordList">Keyword Filterliste</a>
				</li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="translations") {?>active<?php }?>"><a href="?s=listTranslations">Übersetzungen</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="video") {?>active<?php }?>"><a href="?s=listVideos">Video</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="packages") {?>active<?php }?>"><a href="?s=listPackages">Pakete</a></li>
				<li class="<?php if ($_smarty_tpl->tpl_vars['menu']->value=="backendreports") {?>active<?php }?>"><a href="?s=backendreport1">Berichte</a></li>
			</ul>

			<div class="pull-right" style="margin-top:15px;"><a href="?logout=true">[abmelden]</a></div>

		</div><!--/.nav-collapse -->
	</div>
</div>

<div class="container">

	<div id="spinner" class="hide"></div>
	<div id="ajaxLayer" class=""></div>

	<!-- Modal -->
	<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="deleteMessageTitle">Wirklich löschen?</h4>
				</div>
				<div class="modal-footer">
					<form method="post" action="" id="deleteForm">
						<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
						<button type="button" class="btn btn-danger" id="buttonDeleteSubmit">Ja löschen</button>
						<input type="hidden" name="data[id]" id="delID">
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="successBox" style="display:none; position:fixed;" class="alert alert-success">
		<a class="close" id="closeSuccessBox" href="#">&times;</a>
		<span id="successBoxMsg"></span>
	</div>

	<div id="mainContent">
<?php }} ?>
