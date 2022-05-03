<?php

class Frontend_Controller extends Controller
{

    protected $user;  // Frontend Vendor
    protected $user2; // Frontend Customer
    protected $acl = null;
    protected $current_path;
    protected $alias;
    protected $pageNotFound = false;
    protected $lang = 'de';
    protected $translation;


    public function __construct($module, $start_state, $require_login = true)
    {
        //Utils::sendNoCacheHeader();

        if ($_SERVER['HTTP_HOST'] != 'www.hobidd.com') {
            //Utils::redirect('http://www.hobidd.com');
        }

        //print_r($_SERVER); exit;
        if ($_SERVER['REQUEST_URI'] == '/propose' || $_SERVER['REQUEST_URI'] == '/propose/') {
            $_GET['q'] = 'en/login-propose/';
            $_SERVER['REQUEST_URI'] = '/en/login-propose/';
            $_SERVER['QUERY_STRING'] = 'q=hobidd.php&q=en/login-propose/';
        }

        $this->alias = preg_replace('/\/$/', '', $_GET['q']);
        $this->alias = explode("/", $this->alias);;
        if (empty($this->alias[0]) || !in_array($this->alias[0], ['de', 'en'])) {
            $url = (DOCKER ? 'http' : 'https') . '://' . $_SERVER['HTTP_HOST'] . '/de/';

            header('HTTP/1.1 301 Moved Permanently');
            header('location: ' . $url);
            exit;
        }

        $this->lang = $this->alias[0];
        //print $this->lang;

        parent::__construct($module, $start_state);

        $this->user = new Frontend_User();
        $this->user2 = new Frontend_Customer();

        if ($this->user->getLogin() === false) {
            if (!empty($_COOKIE['auth_user']) && !empty($_COOKIE['auth_user'])) {
                if (!$this->user->auth($_COOKIE['auth_user'], $_COOKIE['auth_pass'], true)) {
                    $this->user->logout();
                }
            }
        }

        if ($_SERVER['REQUEST_URI'] && substr($_SERVER['REQUEST_URI'], -1) != '/') {
            $url = (DOCKER ? 'http' : 'https') . '://' . $_SERVER['HTTP_HOST'] . '/' . $_SERVER['REQUEST_URI'] . '/';
            header('HTTP/1.1 301 Moved Permanently');
            header('location: ' . $url);
            exit;
        } else {
            $this->current_path = $_SERVER['REQUEST_URI'];
        }

        if (
            substr($_SERVER['REQUEST_URI'], 0, 8) == '/en/set/'
            || substr($_SERVER['REQUEST_URI'], 0, 8) == '/de/set/'
        ) {
            $_SESSION['frontend']['lang'] = true;
            Utils::redirect(substr($_SERVER['REQUEST_URI'], 0, 4));
        }

//        if (
//            substr($_SERVER['REQUEST_URI'], 4, 7) != 'artikel'
//            && substr($_SERVER['REQUEST_URI'], 4, 7) != 'inquiry'
//            && substr($_SERVER['REQUEST_URI'], 4, 5) != 'login'
//            && substr($_SERVER['REQUEST_URI'], 4, 6) != 'logout'
//            && substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) != 'de'
//            && substr($_SERVER['REQUEST_URI'], 0, 4) != '/en/'
//            && !isset($_SESSION['frontend']['lang'])
//        ) {
//            Utils::redirect('/en/');
//        }

        //register own smarty modifier -> core/smarty_modifier.inc.php
        $this->smarty->registerPlugin('modifier', 'nf', 'nf');

        $this->smarty->assign('base', (DOCKER ? 'http' : 'https') . '://' . $_SERVER['HTTP_HOST']);
        $this->smarty->assign('sid', session_id());
        $this->smarty->assign('ajax', Utils::isAjax());
        $this->smarty->assign('user', $this->user->getUserdata());
        $this->smarty->assign('user2', $this->user2->getUserdata());
        $this->smarty->assign('set_ajax', true);
        $this->smarty->assign('module', $this->module);
        $this->smarty->assign('debug', DEBUG);
        $this->smarty->assign('docker', DOCKER);
        $this->smarty->assign('current_path', $this->current_path);
        $this->smarty->assign('site_url', SITE_URL);
        $this->smarty->assign('lang', $this->lang);

        if (!empty($_SESSION['backend'])) {
            $this->smarty->assign('B_admin', true);
        }
    }

    private function _route()
    {


        $router = new Router_Model();


        if ($this->pageNotFound == true) {
            $this->state = 'pageNotFound';
        } elseif (empty($this->alias[1])) {
            $this->state = 'start';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'login-inbox') {
            $this->state = 'loginInbox';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'intro') {
            $this->state = 'intro';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'inbox') {
            $this->state = 'inbox';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'bidds') {
            $this->state = 'bidds';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'for-travellers') {
            $this->state = 'forTravellers';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'for-vendors') {
            $this->state = 'forVendors';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'about-us') {
            $this->state = 'aboutUs';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'edit-bids') {
            $this->state = 'editBids';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'geld-verdienen') {
            $this->state = 'geldVerdienen';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'search-help') {
            $this->state = 'searchHelp';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'impressum') {
            $this->state = 'impressum';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'user-registration') {
            $this->state = 'userRegistration';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'user-verification') {
            $this->state = 'userVerification';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'vendors') {
            $this->state = 'vendors';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'delete-bidd') {
            $this->state = 'deleteBidd';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'delete-ad') {
            $this->state = 'deleteAd';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'foto-loeschen') {
            $this->state = 'deletePhoto';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'delete-photo') {
            $this->state = 'deletePhotoFromGallery';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'logo-loeschen') {
            $this->state = 'deleteLogo';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'get-content') {
            $this->state = 'ajaxGetContent';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'angebot-erstellen-abbrechen') {
            $this->state = 'cancelAd';
        } elseif (!empty($this->alias[1]) && $this->alias[1] == 'is-eu-country') {
            $this->state = 'ajaxIsEuCountry';
        } elseif ($page = $router->isContentPage($this->alias[1])) {
            if ($page == 'Kontakt') {
                $this->state = 'contactForm';
            } elseif ($page == 'Checkout') {
                $this->state = 'checkout';
            } elseif ($page == 'Kontakt Gewinner') {
                $this->state = 'contactFormWinner';
            } elseif ($page == 'Anmeldung') {
                $this->state = 'registerForm';
            } elseif ($page == 'Paketauswahl') {
                $this->state = 'packageForm';
            } elseif ($page == 'Anmeldung Angebot') {
                $this->state = 'registerFormOffer';
            } elseif ($page == 'Profil bearbeiten') {
                $this->state = 'profileForm';
            } elseif ($page == 'Anmeldung bestätigen') {
                $this->state = 'confirmRegister';
            } elseif ($page == 'Anmeldung Angebot bestätigen') {
                $this->state = 'confirmRegisterOffer';
            } elseif ($page == 'Inserat erstellen') {
                $this->state = 'createAd';
            } elseif ($page == 'Inserat Angebot erstellen') {
                $this->state = 'createAdOffer';
            } elseif ($page == 'Inserat bearbeiten') {
                $this->state = 'editAd';
            } elseif ($page == 'Inserat Angebot bearbeiten') {
                $this->state = 'editAdOffer';
            } elseif ($page == 'Inserat Vorschau' && $this->alias[1] == 'inserat-anfrage-vorschau') {
                $this->state = 'previewAdInquiry';
            } elseif ($page == 'Inserat Vorschau') {
                $this->state = 'previewAd';
            } elseif ($page == 'Inserat Angebot Vorschau') {
                $this->state = 'previewAdOffer';
            } elseif ($page == 'Inserat speichern' && $this->alias[1] == 'inserat-anfrage-speichern') {
                $this->state = 'storeAdInquiry';
            } elseif ($page == 'Inserat speichern') {
                $this->state = 'storeAd';
            } elseif ($page == 'Inserat Angebot speichern') {
                $this->state = 'storeAdOffer';
            } elseif ($page == 'Login') {
                $this->state = 'loginForm';
            } elseif ($page == 'Login Angebot') {
                $this->state = 'loginFormOffer';
            } elseif ($page == 'Login propose') {
                $this->state = 'loginFormOffer';
            } elseif ($page == 'Passwort vergessen') {
                $this->state = 'passwordForgottenForm';
            } elseif ($page == 'Neues Passwort erstellen') {
                $this->state = 'newPassworForm';
            } elseif ($page == 'Angebot melden') {
                $this->state = 'reportAbuse';
            } elseif ($page == 'Suche') {
                $this->state = 'search';
            } elseif ($page == 'Beschreibung extern') {
                $this->state = 'descriptionExtern';
            } elseif ($page == 'Anfrage erstellen') {
                $this->state = 'createInquiry';
            } elseif ($page == 'Reisende Landingpage - Top') {
                $this->state = 'travellerLandingpage';
            } elseif ($page == 'Anbieter Landingpage - Top') {
                $this->state = 'vendorLandingpage';
            } elseif ($page == 'Anfrage detail') {
                $isValid = !empty($this->alias[2]) && $router->isInquiry($this->alias[2]);
                if ($isValid && $this->user->getLogin()) {
                    $this->state = 'detailInquiry';
                } elseif ($isValid) {
                    if ($this->user2->getLogin()) {
                        $this->state = 'pageNotFound';
                    } else {
                        $this->state = 'loginForm';
                        $this->redirectToAfterLogin = SITE_URL . '/' . $this->lang . '/inquiry/' . $this->alias[2] . '/';
                    }
                } else {
                    $this->state = 'pageNotFound';
                }
            } else {
                $this->state = 'detailContent';
            }
        } elseif (
            $this->alias[1] == 'kategorie' && !empty($this->alias[2])
            && ($router->isCategoryPage($this->alias[2])
                || $this->alias[2] == 'meine'
                || $this->alias[2] == 'suche')
        ) {
            $_GET['page'] = (!empty($this->alias[3]) ? intval($this->alias[3]) : 1);
            $this->state = 'detailCategoryPage';
        } elseif ($this->alias[1] == 'artikel' && !empty($this->alias[2]) && $router->isAd($this->alias[2])) {
            $this->state = 'detailAd';
        } elseif ($this->alias[1] == 'anbieter' && !empty($this->alias[2])) {
            $_GET['page'] = (!empty($this->alias[3]) ? intval($this->alias[3]) : 1);
            $this->state = 'detailVendorAds';
        } elseif ($this->alias[1] == 'logout') {
            $this->state = 'logout';
        } else {
            $this->state = 'pageNotFound';
        }
    }

    public function execute()
    {
        $this->_route();
        //$this->_filter();
        parent::execute();
    }
}
