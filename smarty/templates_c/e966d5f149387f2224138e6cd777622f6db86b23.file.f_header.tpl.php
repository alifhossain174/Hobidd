<?php /* Smarty version Smarty-3.1.17, created on 2022-04-28 18:44:49
         compiled from "./inc/views/f_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1325157817614e21ce461a30-03044793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e966d5f149387f2224138e6cd777622f6db86b23' => 
    array (
      0 => './inc/views/f_header.tpl',
      1 => 1651164273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1325157817614e21ce461a30-03044793',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_614e21ceb518b3_19069005',
  'variables' => 
  array (
    'base' => 0,
    'B_detailAd' => 0,
    'data' => 0,
    'site_url' => 0,
    'current_path' => 0,
    'lang' => 0,
    'banner' => 0,
    'B_js_captcha' => 0,
    'user' => 0,
    'user2' => 0,
    'translation' => 0,
    'filter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614e21ceb518b3_19069005')) {function content_614e21ceb518b3_19069005($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php if ($_smarty_tpl->tpl_vars['B_detailAd']->value) {?>hobidd | <?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
<?php } else { ?>hobidd | holiday biddings<?php }?></title>

    <?php if ($_smarty_tpl->tpl_vars['B_detailAd']->value) {?>
		<meta property="og:locale" content="de_AT"/>
		<meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['current_path']->value;?>
"/>
		<meta property="og:type" content="article"/>
        <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['titleen'], $tmp)!=0)) {?>
			<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['data']->value['titleen'];?>
"/>
        <?php } else { ?>
			<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
"/>
        <?php }?>

        <?php if (($_smarty_tpl->tpl_vars['lang']->value=='en')&&(preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['data']->value['priceinfoen'], $tmp)!=0)) {?>
			<meta property="og:description" content="<?php if ($_smarty_tpl->tpl_vars['B_detailAd']->value) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['priceinfoen'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
<?php }?>"/>
        <?php } else { ?>
			<meta property="og:description" content="<?php if ($_smarty_tpl->tpl_vars['B_detailAd']->value) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['priceinfo'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
<?php }?>"/>
        <?php }?>
		<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['file1_700'];?>
"/>
		<meta property="fb:app_id" content="944325375604618"/>
    <?php } else { ?>
		<meta property="og:locale" content="de_AT"/>
		<meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['current_path']->value;?>
"/>
		<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['banner']->value[1010]['image'];?>
"/>
		<meta property="fb:app_id" content="944325375604618"/>
    <?php }?>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
		  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i"
		  rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
		  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&display=swap |Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
	


	<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="/js/jquery.cookiebar/jquery.cookiebar.css">
	<link href="css/fontawesome/fontawesome.min.css" rel="stylesheet">
	<link href="css/fontawesome/solid.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">

	<link rel="icon" type="image/png" href="/img/favicon.png" sizes="512x512">

    <?php if ($_smarty_tpl->tpl_vars['B_js_captcha']->value) {?>
		<script src='//www.google.com/recaptcha/api.js'></script>
    <?php }?>

    
		<!-- Start of hobidd Zendesk Widget script -->
		<!-- <script>/*<![CDATA[*/window.zE||(function(e,t,s){var n=window.zE=window.zEmbed=function(){n._.push(arguments)}, a=n.s=e.createElement(t),r=e.getElementsByTagName(t)[0];n.set=function(e){ n.set._.push(e)},n._=[],n.set._=[],a.async=true,a.setAttribute("charset","utf-8"), a.src="https://static.zdassets.com/ekr/asset_composer.js?key="+s, n.t=+new Date,a.type="text/javascript",r.parentNode.insertBefore(a,r)})(document,"script","1723f904-8959-4adb-a23f-472d8b086373");/*]]>*/</script> -->
		<!-- End of hobidd Zendesk Widget script -->
    
	

</head>



    
    
 

<body>






<div class="d-lg-none px-0 py-0" id="mobile_header">
    
    
    <a href="href=/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/"><img class="img-fluid" style="width: 100%" src="<?php echo $_smarty_tpl->tpl_vars['banner']->value[1002]['image'];?>
"></a>
        
        
        
	<div class="d-lg-none mobile-menu">
		<div class="col px-0 " id="accordion">
			<nav class="navbar navbar-expand-lg navbar-light py-md-2 pr-0 center-text" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="true" aria-label="Toggle navigation">
				
                
				<div class="collapse navbar-collapse mobile-menu-dropdown" id="navbarSupportedContent2" class="collapse" aria-labelledby="navbarSupportedContent2" data-parent="#accordion">
					<ul class="navbar-nav mr-auto">
                <div>
				<img class="img-fluid mx-auto d-block" src="/img/start/linie-2.png">
			    </div>
                <br>
                

                    

						<li class="nav-item py-md-3" style="margin-top:8px">
                            <a class="medium-text-mob" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/">HOME</a>
						</li>

                        <?php if (!$_smarty_tpl->tpl_vars['user']->value&&!$_smarty_tpl->tpl_vars['user2']->value) {?>
							<li class="nav-item py-md-3" style="margin-top:8px">
								<a class="medium-text-mob" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/about-us/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['about_us'];?>
</a>
							</li>
							<li class="nav-item py-md-3" style="margin-top:8px">
								<a class="medium-text-mob" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/for-travellers/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['for_travellers'];?>
</a>
							</li>
							<li class="nav-item py-md-3" style="margin-top:8px">
								<a class="medium-text-mob" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/for-vendors/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['for_vendors'];?>
</a>
							</li>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['user']->value||$_smarty_tpl->tpl_vars['user2']->value) {?>
							<li class="nav-item py-md-3" style="margin-top:8px">
								<a class="medium-text-mob" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/bidds/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['bidds'];?>
</a>
							</li>
                        

                        <li class="nav-item py-md-3" style="margin-top:8px">
								<a class="medium-text-mob" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/kategorie/meine/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry'];?>
</a>
							</li>

                        <?php }?>
                        

                        <?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
							
							
							<li class="nav-item py-md-3" style="margin-top:8px">
								<a class="medium-text-mob" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/profil/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['profile'];?>
</a>
							</li>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['user']->value['package_id']>1||$_smarty_tpl->tpl_vars['user2']->value) {?>
                            
                        <?php }?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						
						
						

                        <?php if ($_smarty_tpl->tpl_vars['user']->value||$_smarty_tpl->tpl_vars['user2']->value) {?>
							<li class="nav-item py-md-3" style="margin-top:8px">
								<a class="medium-text-mob" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/logout/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['logout'];?>
</a>
							</li>
                        <?php } else { ?>
							<li class="nav-item py-md-3" style="margin-top:8px">
								<a class="medium-text-mob" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/login/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['login'];?>
</a>
							</li>
                        <?php }?>

						<li class="nav-item dropdown  py-md-3" style="margin-top:8px">
							<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-globe-americas fa-lg"
								   style="margin-right:10px;"></i><?php if ($_smarty_tpl->tpl_vars['lang']->value=="de") {?>EN<?php } else { ?>DE<?php }?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="/de/set/">DEUTSCH</a>
								<a class="dropdown-item" href="/en/set/">ENGLISH</a>
							</div>
						</li>
					</ul>
					</form>
				</div>
			</nav>
            
            <nav class="navbar navbar-expand-lg navbar-light py-md-2 pr-0 center-text float-right nav3" data-toggle="collapse" data-target="#navbarSupportedContent3" aria-controls="navbarSupportedContent3" aria-expanded="false" aria-label="Toggle navigation" >
            
			</nav>
			<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/kategorie/suche/">
				 
			</form>
            
            <div class="container d-lg-block mb-4 mt-0 collapse" id="navbarSupportedContent3"  aria-labelledby="navbarSupportedContent3" data-parent="#accordion" >
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

		</div>
	</div>

</div>


  
            

 
		</div>
				
			</div>
		</nav>
	</div>
</div>



   
<div class="d-none d-lg-block"> 


	<div class="col px-0">
		<nav class="navbar navbar-expand-lg navbar-dark py-md-20"
			 style="background-color: #1490d0;"> 
			<a class="navbar-brand" href="#"></a>
			<button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false"
					aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

           
            
            
            <div>
				<a href="href=/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/"><img src="/img/trans-140.png">&nbsp;&nbsp;
			</div>
                
            
            <div>
				<a href="href=/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/"><img src="/img/start/logo.png">&nbsp;&nbsp;
			</div>
            
            
			<div class="collapse navbar-collapse" id="navbarSupportedContent1">
				<ul class="navbar-nav mr-auto">
                    
            

					
            
&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if (!$_smarty_tpl->tpl_vars['user']->value&&!$_smarty_tpl->tpl_vars['user2']->value) {?>
						
						<li class="nav-item py-md-2">
							<a class="nav-link" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/for-travellers/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['for_travellers'];?>
&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                            
						</li>
						<li class="nav-item py-md-2">
							<a class="nav-link" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/for-vendors/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['for_vendors'];?>
&nbsp;&nbsp;&nbsp;&nbsp;|</a>
						</li>
                    
                        <li class="nav-item py-md-2">
							<a class="nav-link" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/about-us/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['about_us'];?>
 </a>
						</li>

                    
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['user']->value||$_smarty_tpl->tpl_vars['user2']->value) {?>
						<li class="nav-item py-md-2">
							<a class="nav-link" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/bidds/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['bidds'];?>
&nbsp;&nbsp;&nbsp;&nbsp;|</a>
						</li>
                    <?php }?>


                    <?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
                    <li class="nav-item py-md-2">
							<a class="nav-link" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/kategorie/meine/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['my_offers'];?>
&nbsp;&nbsp;&nbsp;&nbsp;|</a>
						</li>
                     <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['user2']->value) {?>
						<li class="nav-item py-md-2">
							<a class="nav-link" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/create-inquiry/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['inquiry'];?>
&nbsp;&nbsp;&nbsp;&nbsp;</a>
						</li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
						<li class="nav-item py-md-2">
							<a class="nav-link" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/inserat-erstellen/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['offer'];?>
&nbsp;&nbsp;&nbsp;&nbsp;|</a>
						</li>
						
						<li class="nav-item py-md-2">
							<a class="nav-link" href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/profil/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['profile'];?>
&nbsp;&nbsp;&nbsp;&nbsp;</a>
						</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['package_id']>1||$_smarty_tpl->tpl_vars['user2']->value) {?>
                        
                    <?php }?>
				</ul>

               
	</div>

				<ul class="nav navbar-nav navbar-right">
                    

                    

                    


					<li class="nav-item dropdown py-md-2">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-globe-americas fa-lg"
							   style="margin-right:10px;"></i><?php if ($_smarty_tpl->tpl_vars['lang']->value=="de") {?>EN<?php } else { ?>DE<?php }?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="/de/set/">DEUTSCH</a>
							<a class="dropdown-item" href="/en/set/">ENGLISH</a>
						</div>
					</li>
				</ul>


                <?php if ($_smarty_tpl->tpl_vars['user']->value||$_smarty_tpl->tpl_vars['user2']->value) {?>
                    <div>
				<img src="img/start/20.png">
			     </div>
                    <div class="row pt-1">
						<div class="col">
			         <ul class="list-group footer-menu justify-content-center" style="flex-direction: row; flex-wrap: wrap;">
                
                    <li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/logout/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['logout'];?>
</a></li>
			         </ul>
		          </div>
                <div>
				<img src="img/start/40.png">
			</div>
                    <?php } else { ?>
                    <div>
				<img src="img/start/40.png">
			         </div>
                     <div class="row pt-1">
					<div class="col">
			         <ul class="list-group footer-menu justify-content-center" style="flex-direction: row; flex-wrap: wrap;">
                
                    <li class="list-group-item border-0"><a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/login/"><?php echo $_smarty_tpl->tpl_vars['translation']->value['login'];?>
</a></li>
			         </ul>
		          </div>
                  </div>
                <div>
				<img src="img/start/40.png">
			</div>
                    <?php }?>

 
		</nav>
	</div>
</div>

    
    
    
    
<br>

 

<?php }} ?>
