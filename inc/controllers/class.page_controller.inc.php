<?php
class Page_Controller extends Frontend_Controller
{
    protected $model;
    protected $data_per_page;
    protected $crumbs = [];
    protected $banner;
    public function __construct($module, $start_state, $require_login)
    {
        parent::__construct($module, $start_state, $require_login);
        $this->model = new Page_Model($this->user, $this->acl, $this->lang);
        $this->model->data_per_page = $this->data_per_page = 20;
        $this->banner = $this->model->selectStartImages();
        $this->smarty->assign('banner', $this->banner);
        //print_r($this->banner);
        $categories = $this->model->selectCategories();
        $this->smarty->assign('categories', $categories);
        //print_r($categories);
        $this->smarty->assign('translation', $this->model->selectTranslation());
        $this->smarty->assign('_content', $this->model->selectContentInfo());
        $this->smarty->assign(
            'start_page_content',
            array_filter($this->model->selectContentInfo(), function ($content) {
                return $content["id"] == 124;
            })[124]
        );
        $this->crumbs = [
            [
                'name' => 'Start',
                'link' => '/',
            ],
        ];
        parent::execute();
        /*if (!preg_match('/(facebook|google)/i', $_SERVER['HTTP_USER_AGENT'])) {
                if (!isset($_COOKIE['privacy']) && $this->state != 'intro') {
                    Utils::redirect('/de/intro/?fwd=' . urlencode($_SERVER['REQUEST_URI']));
                }
            }*/
        parent::display('f_start.tpl');
    }
    public function intro()
    {
        $data = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $data['title'],
            'link' => '/' . $data['alias'] . '/',
        ];
        if ($_POST && isset($_POST['accept'])) {
            setcookie('privacy', 'true', time() + 3600 * 24 * 365, '/');
            Utils::redirect((!empty($_GET['fwd']) ? $_GET['fwd'] : '/de/'));
        }
        $this->smarty->assign('_data', $data);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
        $this->start();
    }
    public function start()
    {
        $data = $this->banner;
        $_data = $this->model->selectStartBanner();
        //print_r($_data);
        $category = $this->model->selectCategories(5);
        //print_r($category);
        foreach ($_data as $key => $val) {
            $diff = $val['valid_to'] - time();
            $days = 0;
            if ($diff >= 86400) {
                $days = floor($diff / 86400);
            }
            if ($days == 0) {
                $days = 1;
            }
            $_data[$key]['remaining'] = $days;
            if ($days >= 60) {
                $_p = 90;
            } elseif ($days >= 30) {
                $_p = 75;
            } elseif ($days >= 10) {
                $_p = 60;
            } else {
                $_p = 40;
            }
            $_data[$key]['remaining_p'] = $_p;
        }
        $ads_data = $this->model->selectAdsFilter('', '', false, false, [], 0, false, false, false, true);
        // echo '<pre>',print_r($ads_data),'</pre>';exit();
        $_data['opt_category'] = $this->model->optCategoryList(null);
        $_data['opt_travelling_period'] = $this->model->optTravellingPeriodList($ads_data);
        $this->smarty->assign('data', $_data);
        $this->smarty->assign('category', $category);
        if (!empty($this->alias[2]) && $this->alias[2] == 'umkreis') {
            $this->smarty->assign('B_' . $this->state . 'Umkreis', true);
            $this->smarty->assign('B_searchUmkreisMobile', true);
        } else {
            $this->smarty->assign('B_' . $this->state, true);
            $this->smarty->assign('B_searchUmkreis', true);
        }
        $this->smarty->assign('video', $this->model->selectStartVideo());
    }
    public function search()
    {
        $this->start();
        $this->detailCategoryPage();
    }
    public function detailCategoryPage()
    {
 		$this->data_per_page = $this->model->data_per_page = 3;
        $sort_by_cdate = false;
		
        if ($this->user->getLogin() && $this->alias[2] == 'meine') {
            $pagedata = [
                'title' => $this->model->getTranslation('my_offers'),
            ];
            //$category = $this->model->selectCategories(6);
            $category = $this->model->selectCategories(6);
			/*echo '<pre>';
			print_r($category);exit;*/
            $category['id'] = '';
            $this->filter = [];
            $this->filter['vendor_id'] = $this->user->getUserID();
            $this->smarty->assign('B_own_ads', true);
            $this->smarty->assign('B_text_header', true);
            $this->smarty->assign('B_del', true);
            $this->smarty->assign('pagedata', $pagedata);
        } elseif ($this->alias[2] == 'suche') {



			// print_r($_POST['filter']['filter_travel_period']);
            // exit;
            $category = $this->model->selectCategories(5);
	        //$category['id'] = '';
			//print_r($category);
            //exit;
			
            // if ($_POST) {
            //     Utils::redirect('/' . $this->lang . '/kategorie/suche/');
            // }
			$this->smarty->assign('B_searchUmkreis', true);
            $this->smarty->assign('B_searchUmkreisX', true);


        } elseif ($this->alias[2] == 'umkreis') {
            $category = $this->model->selectCategories(5);
            $category['id'] = '';
        } else {
            $this->filter['postalcode'] = '';
            $this->filter['filter_travel_period'] = '';
            $this->filter['filter_category'] = '';
            //$this->filter = array();
            $sort_by_cdate = true;
            $category = $this->model->selectCategories('', $this->alias[2]);
        }
    
        $this->data_per_page = $this->model->data_per_page = 3;
        if (!$this->user->getLogin() || $this->alias[2] != 'meine') {
            $this->filter['is_private'] = 0;
        }
        $this->filter['postalcode'] = isset($this->filter['postalcode']) ? str_replace(
            '/',
            '',
            $this->filter['postalcode']
        ) : null;

        $this->filter['filter_travel_period'] = isset($this->filter['filter_travel_period']) ? str_replace('/', '', $this->filter['filter_travel_period']) : null;

        $this->filter['filter_category'] = isset($this->filter['filter_category']) ? str_replace(
            '/',
            '',
            $this->filter['filter_category']
        ) : null;

        if ($this->filter['postalcode'] != "" || $this->filter['filter_category'] != "" || $this->filter['filter_travel_period'] != "") {
			// error is here to check
			// print_r($category);exit;
            $data = $this->model->selectFilteredAds(
                ($this->alias[2] == 'suche' ? '' : $category['id']),
                '',
                $sort_by_cdate,
                false,
                $this->filter
            );
	        $cnt = $this->model->selectFilteredAds(
                ($this->alias[2] == 'suche' ? '' : $category['id']),
                '',
                false,
                true,
                $this->filter
            );
        } else {
            $data = $this->model->selectAds(
                ($this->alias[2] == 'suche' ? '' : $category['id']),
                '',
                $sort_by_cdate,
                false,
                $this->filter
            );
            $cnt = $this->model->selectAds(
                ($this->alias[2] == 'suche' ? '' : $category['id']),
                '',
                false,
                true,
                $this->filter
            );
        }
        $this->crumbs[] = [
            'name' => $category['name'],
            'link' => '/kategorie/' . $category['alias'] . '/',
        ];
        $_SESSION['frontend'][$this->module]['_last_page'] = $_SERVER['REQUEST_URI'];
        if (!is_null($this->filter['filter_category']) && (int)$this->filter['filter_category'] != 0) {
            $newData = [];
            $newCnt = [];
            foreach ($data as $key => $val) {
                $categoryJSON = json_decode($val['category_json'], true);
                if (!is_null($val['category_json'])) {
                    foreach ($categoryJSON as $cat) {
                        if ((int)$cat == (int)$this->filter['filter_category']) {
                            array_push($newData, $val);
                        }
                    }
                }
            }
            foreach ($cnt as $key => $val) {
                $categoryJSON = json_decode($val['category_json'], true);
                if (!is_null($val['category_json'])) {
                    foreach ($categoryJSON as $cat) {
                        if ((int)$cat == (int)$this->filter['filter_category']) {
                            array_push($newData, $val);
                        }
                    }
                }
            }
            $data = $newData;
            $cnt = count($newCnt);
            foreach ($data as $key => $val) {
                $diff = $val['valid_to'] - time();
                $days = 0;
                if ($diff >= 86400) {
                    $days = floor($diff / 86400);
                }
                if ($days == 0) {
                    $days = 1;
                }
                $data[$key]['remaining'] = $days;
                if ($days >= 60) {
                    $_p = 90;
                } elseif ($days >= 30) {
                    $_p = 75;
                } elseif ($days >= 10) {
                    $_p = 60;
                } else {
                    $_p = 40;
                }
                $data[$key]['remaining_p'] = $_p;
                if ($val['valid_to'] > strtotime(date('Y-m-d'))) {
                    $data[$key]['btnStatus'] = true;
                } else {
                    $data[$key]['btnStatus'] = false;
                }
                $data[$key]['bids'] = $this->model->selectBiddOverview('', '', $val['id']);
                $this->smarty->assign('B_vendor', true);
            }
        } else {
            foreach ($data as $key => $val) {
                $diff = $val['valid_to'] - time();
                $days = 0;
                if ($diff >= 86400) {
                    $days = floor($diff / 86400);
                }
                if ($days == 0) {
                    $days = 1;
                }
                $data[$key]['remaining'] = $days;
                if ($days >= 60) {
                    $_p = 90;
                } elseif ($days >= 30) {
                    $_p = 75;
                } elseif ($days >= 10) {
                    $_p = 60;
                } else {
                    $_p = 40;
                }
                $data[$key]['remaining_p'] = $_p;
                if ($val['valid_to'] > strtotime(date('Y-m-d'))) {
                    $data[$key]['btnStatus'] = true;
                } else {
                    $data[$key]['btnStatus'] = false;
                }
                $data[$key]['bids'] = $this->model->selectBiddOverview('', '', $val['id']);
                $this->smarty->assign('B_vendor', true);
            }
        }

        $data['opt_category'] = $this->model->optCategoryList(isset($this->filter['filter_category']) ? $this->filter['filter_category'] : null);
        $ads_data = $this->model->selectAdsFilter('', '', false, false, [], 0, false, false, false, true);
        $data['opt_travelling_period'] = $this->model->optTravellingPeriodList($ads_data, isset($this->filter['filter_travel_period']) ? $this->filter['filter_travel_period'] : null);
        //print_r($data);
        $this->smarty->assign('category', $category);
        //print_r($category);
        $this->smarty->assign('data', $data);
        if (isset($_banner)) {
            $this->smarty->assign('_banner', $_banner);
        }
        if ($this->alias[2] == 'umkreis') {
            $this->alias[2] = 'suche';
        }
        $this->smarty->assign(
            'page_links',
            Utils::pageLinks($cnt, $this->data_per_page, '/' . $this->lang . '/kategorie/' . $this->alias[2])
        );
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
        //$this->smarty->assign('B_small_header', true);
    }
    public function detailVendorAds()
    {
        $this->filter['vendor_id'] = intval($this->alias[2]);
        $vendor = $this->model->selectVendors($this->alias[2]);
        $data = $this->model->selectAds('', '', false, false, $this->filter);
        $cnt = $this->model->selectAds('', '', false, true, $this->filter);
        $category = $this->model->selectCategories(7); //7
        $pagedata = [
            'title' => $vendor['company'],
        ];
        //print_r($category);
        $this->crumbs[] = [
            'name' => $vendor['company'],
            'link' => '/anbieter/' . $vendor['company'] . '/',
        ];
        foreach ($data as $key => $val) {
            $diff = $val['valid_to'] - time();
            $days = 0;
            if ($diff >= 86400) {
                $days = floor($diff / 86400);
            }
            if ($days == 0) {
                $days = 1;
            }
            $data[$key]['remaining'] = $days;
            if ($days >= 60) {
                $_p = 90;
            } elseif ($days >= 30) {
                $_p = 75;
            } elseif ($days >= 10) {
                $_p = 60;
            } else {
                $_p = 40;
            }
            $data[$key]['remaining_p'] = $_p;
        }
        $this->smarty->assign('data', $data);
        $this->smarty->assign('category', $category);
        $this->smarty->assign(
            'page_links',
            Utils::pageLinks($cnt, $this->data_per_page, '/' . $this->lang . '/anbieter/' . addslashes($this->alias[2]) . '/')
        );
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('pagedata', $pagedata);
        $this->smarty->assign('B_fake_header', true);
    }
    public function detailInquiry()
    {
        $data = [
            'inquiry' => $this->model->selectInquiry($this->alias[2]),
        ];
        $category = implode(', ', json_decode($data['inquiry']['accomodationtype_json']));
        $topics = $this->model->textlistCategory(json_decode($data['inquiry']['category_json']), ', ');
        $provision = $this->model->textlistProvision(json_decode($data['inquiry']['provision_json']), ', ');
        $inquiryData = [
            "url" => SITE_URL . '/' . $this->lang . '/inquiry/' . $this->alias[2] . '/',
            "number" => 'AT' . str_pad($this->alias[2], 5, '0', STR_PAD_LEFT),
            "country" => empty(trim($data['inquiry']['country']))
                ? '-'
                : trim(
                    $data['inquiry']['country']
                ),
            "federal_state" => empty(trim($data['inquiry']['federal_state']))
                ? '-'
                : trim(
                    $data['inquiry']['federal_state']
                ),
            "topics" => empty(trim($topics)) ? '-' : trim($topics),
            "category" => empty(trim($category)) ? '-' : trim($category),
            "provision" => empty(trim($provision)) ? '-' : trim($provision),
            "flexible_travel_time" => empty(trim($data['inquiry']['flexible_travelling_time'])) ? 'Nein'
                : ($data['inquiry']['flexible_travelling_time'] == '1' ? 'Ja' : 'Nein'),
            "date_from" => empty(trim($data['inquiry']['date_from']))
                ? '-'
                : trim(
                    $data['inquiry']['date_from']
                ),
            "date_until" => empty(trim($data['inquiry']['date_until']))
                ? '-'
                : trim(
                    $data['inquiry']['date_until']
                ),
            "days" => empty(trim($data['inquiry']['days'])) ? '-' : trim($data['inquiry']['days']),
            "adults" => empty(trim($data['inquiry']['adults'])) ? '-' : trim($data['inquiry']['adults']),
            "children" => empty(trim($data['inquiry']['children']))
                ? '-'
                : trim(
                    $data['inquiry']['children']
                ),
            "additional_info" => empty(trim($data['inquiry']['additional_info']))
                ? '-'
                : trim(
                    $data['inquiry']['additional_info']
                ),
            "budget" => empty(trim($data['inquiry']['budget']))
                ? '-'
                : '€ ' . number_format(
                    trim($data['inquiry']['budget']),
                    2
                ),
        ];
        $data['inquiry'] = $inquiryData;
        $data['inquiry']['pagedata'] = $this->model->selectContent($this->alias[1]);
        $this->createAd(false, false, true);
        $this->smarty->append('data', $data, true);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function detailAd()
    {
        if (preg_match('/iPhone|Android/i', $_SERVER['HTTP_USER_AGENT'])) {
            /*if (!isset($_COOKIE['intro'])) {
                    $_SESSION['_fwd'] = $_SERVER['REQUEST_URI'];
                    Utils::redirect('/de/mobile-intro-1/');
                }*/
        }
        $banner = $this->banner;
        $data = $this->model->selectAds('', $this->alias[2]);
        $category = $this->model->selectCategories($data['category_id']);
        $vendor = $this->model->selectVendors($data['vendor_id']);
        $vendor['cnt_ads'] = $this->model->selectAds('', '', false, true, ['vendor_id' => $vendor['id']]);
        $cnt_bidds_left = $this->model->hobbids - $this->model->countCustomerAdBidds(
                $this->user2->getUserID(),
                $data['id']
            );
        if ($_POST && isset($_POST['desired_date_submit'])) {
            $id = $_POST['offer_desired_id'];
            if (isset($_POST['submit_desired_date']) && $_POST['submit_desired_date'] == 'cancel') {
                $xDdata = &$_POST['data'];
                $xDdata['desired_date'] = null;
//                $_t = $xDdata;
                $this->model->deleteDesiredDate($id, $this->user2->getUserID());
//                $this->model->updateAD($_t, $id);
            } else {
                $xDdata = &$_POST['data'];
                $required = [
                    'desired_date' => [],
                ];
                $error = Utils::validateForm($required, $xDdata);
                if ($error) {
                    $this->smarty->assign('msg_desired_date', $error['msg']);
                    $this->smarty->assign('B_msg', true);
                    $this->smarty->assign('B_reg_login', true);
                } else {
                    $this->model->deleteDesiredDate($id, $this->user2->getUserID());
                    $newDate['ad_id'] = $id;
                    $newDate['user_id'] = $this->user2->getUserID();
                    $newDate['desired_date'] = $xDdata['desired_date'];
                    $_t = $newDate;
                    $this->model->insertDesiredDate($_t);
                }
            }
            Utils::redirect('/' . $this->lang . '/artikel/' . $id);
        } elseif ($_POST && isset($_POST['login'])) {
            if ($this->user2->auth($_POST['auth']['email'], sha1($_POST['auth']['password']))) {
                Utils::redirect('/' . $this->lang . '/artikel/' . $data['id'] . '/');
            } else {
                $this->smarty->assign('msg', 'Login failed');
                $this->smarty->assign('B_msg', true);
                $this->smarty->assign('B_reg_login', true);
            }
        } elseif ($_POST && isset($_POST['register'])) {
            $xdata = &$_POST['xdata'];
            $required = [
                'email' => ['email' => true, 'exists' => $this->model->emailUserExists($xdata['email'])],
                'password' => ['compare' => $xdata['password2'], 'length' => 8],
                'password2' => [],
            ];
            $error = Utils::validateForm($required, $xdata);
            if ($error) {
                $this->smarty->assign('msg', $error['msg']);
                $this->smarty->assign('B_msg', true);
                $this->smarty->assign('B_reg_login', true);
            } else {
                unset($xdata['password2']);
                $this->model->insertCustomer($xdata);
                $this->user2->auth($xdata['email'], sha1($xdata['password']));
                $this->smarty->assign('msg', $this->model->getTranslation('reg_customer_done'));
                $this->smarty->assign('B_msg', true);
            }
            $this->smarty->assign('xdata', $xdata);
        } elseif ($_POST && isset($_POST['bidd'])) {
            $continue = $this->user2->getLogin();
            if ($data['is_private'] == '1') {
                $inboxData = $this->model->selectInbox($data['vendor_id'], $this->user2->getUserID(), '', $data['id']);
                if (empty($inboxData)) {
                    $continue = false;
                }
            }
            if ($continue) {
                if ($cnt_bidds_left > 0) {
                    if ($_POST['xdata']['amount'] < $data['threshold1']) {
                        $this->smarty->assign(
                            'msg',
                            $this->model->getTranslation('bidd_rejected') . '<br>' . $cnt_bidds_left . ' '
                            . $this->model->getTranslation('bidds_left')
                        );
                        $this->smarty->assign('B_msg', true);
                    } else {
                        $this->smarty->assign('msg', $this->model->getTranslation('bidd_submitted'));
                        $this->smarty->assign('B_msg', true);
                        $_t = [
                            'customer_id' => $this->user2->getUserID(),
                            'ad_id' => $data['id'],
                            'vendor_id' => $data['vendor_id'],
                            'value' => $_POST['xdata']['amount'],
                            'sender' => 'c',
                            'cdate' => time(),
                        ];
                        $this->model->insertInbox($_t);
                        $template_file = DOCUMENT_ROOT_PATH . '/inc/templates/email/vendor_get_bidd_' . $this->lang . '.php';
                        $swap_array = [
                            "{OFFER_NUMBER}" => $data['id'],
                            "{OFFER_NAME}" => $data['title'],
                            "{OFFERLINK}" => SITE_URL . "/" . $this->lang . '/artikel/' . $data['id'],
                            "{OFFERED_PRICE}" => number_format($_POST['xdata']['amount'], 2, ",", "."),
                            "{EMAIL_HEADER_IMAGE}" => SITE_URL . "/" . $this->banner[1011]['image'],
                            "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . "/" . $this->banner[1012]['image'],
                            "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . "/" . $this->banner[1014]['image'],
                            "{EMAIL_TWITTER_IMAGE}" => SITE_URL . "/" . $this->banner[1013]['image'],
                        ];
                        $message = file_get_contents($template_file);
                        foreach (array_keys($swap_array) as $key) {
                            $message = str_replace($key, $swap_array[$key], $message);
                        }
                        Utils::sendHTMLMail($vendor['email'], 'hobidd.com Angebot', $message, EMAIL_FROM_SYSTEM);
                    }
                    $_t = [
                        'ad_id' => $data['id'],
                        'customer_id' => $this->user2->getUserID(),
                        'value' => $_POST['xdata']['amount'],
                        'accepted' => ($_POST['xdata']['amount'] < $data['threshold1'] ? '0' : '1'),
                        'cdate' => time(),
                    ];
                    $this->model->insertBidd($_t);
                } else {
                    $this->smarty->assign('msg', $this->model->getTranslation('no_bidds_left'));
                    $this->smarty->assign('B_msg', true);
                }
            } else {
                $_SESSION['frontend']['bidd'] = [$_POST['xdata']['amount']];
                $this->smarty->assign('B_reg_login', true);
            }
        } elseif ($_POST && isset($_POST['buyNow'])) {
            if ($this->user2->getLogin()) {
                $this->smarty->assign('msg', $this->model->getTranslation('bidd_submitted'));
                $this->smarty->assign('B_msg', true);
                $_t = [
                    'customer_id' => $this->user2->getUserID(),
                    'ad_id' => $data['id'],
                    'vendor_id' => $data['vendor_id'],
                    'value' => $_POST['xdata']['amount'],
                    'sender' => 'c',
                    'cdate' => time(),
                ];
                $this->model->insertInbox($_t);
                $_t = [
                    'customer_id' => $this->user2->getUserID(),
                    'ad_id' => $data['id'],
                    'vendor_id' => $data['vendor_id'],
                    'value' => $_POST['xdata']['amount'],
                    'sender' => 'v',
                    'accepted_v' => 1,
                    'cdate' => time(),
                ];
                $this->model->insertInbox($_t);
                $_t = [
                    'ad_id' => $data['id'],
                    'customer_id' => $this->user2->getUserID(),
                    'value' => $_POST['xdata']['amount'],
                    'accepted' => ($_POST['xdata']['amount'] < $data['threshold1'] ? '0' : '1'),
                    'cdate' => time(),
                ];
                $this->model->insertBidd($_t);
                Utils::redirect('/' . $this->lang . '/bidds/');
            } else {
                $_SESSION['frontend']['bidd'] = [$_POST['xdata']['amount']];
                $this->smarty->assign('B_reg_login', true);
            }
        } elseif ($_POST && isset($_POST['reset_pwd'])) {
            if ($this->model->resetUserPassword($_POST['data']['email'])) {
                $this->smarty->assign('msg', $this->model->getTranslation('new_password_sent'));
            } else {
                $this->smarty->assign('msg', $this->model->getTranslation('unknown_email'));
            }
            $this->smarty->assign('B_msg', true);
            $this->smarty->assign('B_reg_login', true);
        } elseif ($_POST && isset($_POST['reset_pwd_form'])) {
            $this->smarty->assign('B_restPassword', true);
        } elseif ($_POST) {
            $fdata = &$this->model->cleanInput($_POST['fdata']);
            $fdata['captcha'] = '';
            if (isset($_POST['g-recaptcha-response'])) {
                if ($this->model->checkCaptcha($_POST['g-recaptcha-response'])) {
                    $fdata['captcha'] = true;
                }
            }
            $required = [
                'name' => [],
                'email' => ['email' => true],
                'message' => [],
                'captcha' => ['msg' => $this->model->getTranslation('wrong_captcha')],
            ];
            $error = Utils::validateForm($required, $fdata);
            if ($error) {
                $this->smarty->assign('msg', $error['msg']);
                $this->smarty->assign('css', $error['fields']);
            } else {
                $msg = [];
                $msg[] = 'Name: ' . $fdata['name'];
                $msg[] = 'Email: ' . $fdata['email'];
                $msg[] = 'Nachricht: ' . $fdata['message'];
                Utils::sendTextMail($vendor['email'], 'hobidd Anfrage', implode("\n", $msg), EMAIL_FROM_SYSTEM);
                $this->smarty->assign('msg', $this->model->getTranslation('message_sent'));
            }
        } else {
            $fdata = [];
        }
        $this->crumbs[] = [
            'name' => isset($category['name']) ? $category['name'] : null,
            'link' => '/kategorie/' . (isset($category['alias']) ? $category['alias'] : null) . '/',
        ];
        $this->crumbs[] = [
            'name' => isset($data['title']) ? $data['title'] : null,
            'link' => '/artikel/' . (isset($data['id']) ? $data['id'] : null) . '/',
        ];
        $diff = $data['valid_to'] - time();
        $days = 0;
        $hours = 0;
        $mins = 0;
        if ($diff >= 86400) {
            $days = floor($diff / 86400);
            $diff -= $days * 86400;
        }
        if ($diff >= 3600) {
            $hours = floor($diff / 3600);
            $diff -= $hours * 3600;
        }
        if ($diff >= 60) {
            $mins = floor($diff / 60);
            $diff -= $mins * 60;
        }
        $similar = $this->model->selectAds('', '', false, false, [], 3, true);
        //print_r($similar);
        if (!isset($fdata)) {
            $fdata = [];
        }
        if (isset($_COOKIE['is_registered']) && $_COOKIE['is_registered']) {
            $this->smarty->assign('B_is_registered', true);
        }
        if ($data['type'] == 'offer' || $data['type'] == 'raffle_offer') {
            //$this->smarty->assign('B_biddBox', ($this->model->countCustomerAdBidds($this->user2->getUserID(), $data['id'], true) ? false : true));
            $this->smarty->assign('B_biddBox', true);
        }
        $this->smarty->assign(
            'abuse_offer_description',
            str_replace('{$data.id}', $data['id'], $this->model->getTranslation('abuse_offer_description'))
        );
        $data['cancellation_conditions'] = $vendor['cancellation_conditions'];
        $data['cancellation_conditions_en'] = $vendor['cancellation_conditions_en'];
        $data['opt_facility'] = $this->model->iconlistFacility(
            !empty($vendor['facility_json']) ? json_decode($vendor['facility_json']) : null
        );
        $this->smarty->assign('data', $data);
        $this->smarty->assign('similar', $similar);
        $this->smarty->assign('fdata', $fdata);
        $this->smarty->assign('category', $category);
        $opt_category = $this->model->textlistCategory(json_decode($data['category_json']), " | ");
        $this->smarty->assign('opt_category', $opt_category);
        $this->smarty->assign('vendor', $vendor);
        $this->smarty->assign('banner', $banner);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign(
            'link_back',
            (!empty($_SESSION['frontend'][$this->module]['_last_page'])
                ? $_SESSION['frontend'][$this->module]['_last_page'] : '')
        );
        $this->smarty->assign('B_js_captcha', true);
        //$this->smarty->assign('time_left', $days . ' ' . $this->model->getTranslation('days') . ' ' . $hours . ' ' . $this->model->getTranslation('hours'));
        if ($this->user2->getLogin()) {
            $desiredData = $this->model->selectDesiredDate($data['id'], $this->user2->getUserID());
            if (!is_null($desiredData)) {
                $desired_date = explode('-', str_replace(' ', '', $desiredData['desired_date']));
                $desired_start_day = date('l', strtotime(date('d-m-Y', strtotime($desired_date[0]))));
                $desired_end_day = date('l', strtotime(date('d-m-Y', strtotime($desired_date[1]))));
                $this->smarty->assign('date_desired_from_year', explode('/', $desired_date[0])[2]);
                $this->smarty->assign('date_desired_from_month', explode('/', $desired_date[0])[1]);
                $this->smarty->assign('date_desired_from_day', explode('/', $desired_date[0])[0]);
                $this->smarty->assign('date_desired_from_Day', $desired_start_day);
                $this->smarty->assign('date_desired_until_year', explode('/', $desired_date[1])[2]);
                $this->smarty->assign('date_desired_until_month', explode('/', $desired_date[1])[1]);
                $this->smarty->assign('date_desired_until_day', explode('/', $desired_date[1])[0]);
                $this->smarty->assign('date_desired_until_Day', $desired_end_day);
                $this->smarty->assign('desired_date', $desiredData['desired_date']);
            } else {
                $this->smarty->assign('desired_date', null);
            }
        } else {
            $this->smarty->assign('desired_date', null);
        }
        $this->smarty->assign('date_from_year', substr($data['date_from'], 0, 4));
        $this->smarty->assign('date_from_month', substr($data['date_from'], 5, 2));
        $this->smarty->assign('date_from_day', substr($data['date_from'], 8, 2));
        $this->smarty->assign('date_until_year', substr($data['date_until'], 0, 4));
        $this->smarty->assign('date_until_month', substr($data['date_until'], 5, 2));
        $this->smarty->assign('date_until_day', substr($data['date_until'], 8, 2));
        if ($this->lang == "de") {
            $this->smarty->assign(
                'time_left',
                $days . ' Tag' . ($days > 1 ? 'e<br/>' : '<br/>') . $hours . ' Std ' . $mins . ' Min'
            );
        } else {
            $this->smarty->assign(
                'time_left',
                $days . ' day' . ($days > 1 ? 's<br/>' : '<br/>') . $hours . ' hrs ' . $mins . ' min'
            );
        }
        $this->smarty->assign('B_' . $this->state, true);
        //$this->smarty->assign('B_small_header', true);
        $this->smarty->assign('B_searchUmkreis', true);
        $this->smarty->assign('B_searchUmkreisX', true);
        $this->smarty->assign('B_searchUmkreisMobile', true);
    }
    public function detailContent()
    {
        $data = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $data['title'],
            'link' => '/' . $data['alias'] . '/',
        ];
        $data['content'] = str_replace('{$lang}', $this->lang, $data['content']);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('crumbs', $this->crumbs);
        if ($data['id'] == '31' || $data['id'] == '32' || $data['id'] == '33') {
            //print_r($data);
            if ($data['id'] == '31') {
                //$next = '/' . $this->lang . '/mobile-intro-2';
                $next = (!empty($_SESSION['_fwd']) ? $_SESSION['_fwd'] : '/de/');
                setcookie('intro', 'true', time() + 3600 * 24 * 365, '/');
            } elseif ($data['id'] == '32') {
                $next = '/' . $this->lang . '/mobile-intro-3';
            } elseif ($data['id'] == '33') {
                $next = (!empty($_SESSION['_fwd']) ? $_SESSION['_fwd'] : '/de/');
                setcookie('intro', 'true', time() + 3600 * 24 * 365, '/');
            }
            $this->smarty->assign('next', $next);
            $this->smarty->assign('B_mobile_intro', true);
        } else {
            $this->smarty->assign('B_' . $this->state, true);
            $this->smarty->assign('B_text_header', true);
        }
    }
    public function inbox()
    {
        $cnt_bidds_left = 0;
        $_ad = [];
        if ($this->user->getLogin()) {
            $data = $this->model->selectInbox($this->user->getUserID());
            if (!empty($this->alias[2])) {
                $this->smarty->assign('B_inboxForm', true);
                $_i = $this->model->selectInbox('', '', $this->alias[2]);
                //print_r($_i);
                $_i_parent = $this->model->selectInboxParent($_i['customer_id'], $_i['vendor_id'], $_i['ad_id'], 'c');
                //print_r($_i_parent);
                $_ad = $this->model->selectAds('', $_i['ad_id'], false, false, [], 0, false, false, true);
                //print_r($_ad);
                if ($_POST) {
                    if (isset($_POST['del'])) {
                        $_t = [
                            'customer_id' => $_i['customer_id'],
                            'ad_id' => $_i['ad_id'],
                            'vendor_id' => $_i['vendor_id'],
                        ];
                        $this->model->delInbox($_t);
                        Utils::redirect('/' . $this->lang . '/bidds/');
                    }
                    $_accepted = '0';
                    $_rejected = '0';
                    if (isset($_POST['accept'])) {
                        $_accepted = '1';
                        if ($_i_parent['accepted_c'] == 1) {
                            $code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 6);
                            $hobidd_code = strtoupper($code);
                        }
                        //$_i_parent['accepted_c'] = '0';
                    } elseif (isset($_POST['reject'])) {
                        $_POST['data']['value'] = '0';
                        $_rejected = '1';
                    } elseif (isset($_POST['reject2'])) {
                        $_rejected = '1';
                    }
                    $_t = [
                        'customer_id' => $_i['customer_id'],
                        'ad_id' => $_i['ad_id'],
                        'vendor_id' => $_i['vendor_id'],
                        'value' => $_POST['data']['value'],
                        'sender' => 'v',
                        'content' => $_POST['data']['content'],
                        'cdate' => time(),
                        'accepted_v' => $_accepted,
                        'accepted_c' => $_i_parent['accepted_c'],
                        'rejected' => $_rejected,
                        'hobidd_code' => $hobidd_code,
                        'vendor_comments' => $_POST['data']['vendor_comments'],
                    ];
                    $this->model->insertInbox($_t);
                    $template_file = DOCUMENT_ROOT_PATH . '/inc/templates/email/customer_get_bidd_' . $this->lang . '.php';
                    $swap_array = [
                        "{VENDOR_NAME}" => $_ad['company'],
                        "{OFFER_NAME}" => $_ad['title'],
                        "{OFFERLINK}" => SITE_URL . "/" . $this->lang . '/artikel/' . $_i['ad_id'],
                        "{HOBIDDSLINK}" => SITE_URL . "/" . $this->lang . '/bidds/',
                        "{OFFERED_PRICE}" => number_format($_POST['data']['value'], 2, ",", "."),
                        "{EMAIL_HEADER_IMAGE}" => SITE_URL . "/" . $this->banner[1011]['image'],
                        "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . "/" . $this->banner[1012]['image'],
                        "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . "/" . $this->banner[1014]['image'],
                        "{EMAIL_TWITTER_IMAGE}" => SITE_URL . "/" . $this->banner[1013]['image'],
                    ];
                    $message = file_get_contents($template_file);
                    foreach (array_keys($swap_array) as $key) {
                        $message = str_replace($key, $swap_array[$key], $message);
                    }
                    Utils::sendHTMLMail($_i['vendor_email'], 'hobidd.com Angebot', $message, EMAIL_FROM_SYSTEM);
                    Utils::redirect('/' . $this->lang . '/bidds/');
                }
            }
            $this->smarty->assign('ad', $_ad);
            $this->smarty->assign('id', (isset($this->alias[2]) ? $this->alias[2] : ''));
            $this->smarty->assign('B_vendor', true);
        } elseif ($this->user2->getLogin()) {
            $data = $this->model->selectInbox('', $this->user2->getUserID());
            if (isset($data[0])) {
                if ($data[0]['sender'] == 'v') {
                    $data[0]['can_reply'] = true;
                }
            }
            if (!empty($this->alias[2])) {
                $this->smarty->assign('B_inboxForm', true);
                $_i = $this->model->selectInbox('', '', $this->alias[2]);
                $_i_parent = $this->model->selectInboxParent(
                    $_i['customer_id'],
                    $_i['vendor_id'],
                    $_i['ad_id'],
                    'v'
                );
                $_ad = $this->model->selectAds('', $_i['ad_id'], false, false, [], 0, false, false, true);
                $cnt_bidds_left = $this->model->hobbids - $this->model->countCustomerAdBidds(
                        $this->user2->getUserID(),
                        $_ad['id']
                    );
                if ($_POST) {
                    if (isset($_POST['del'])) {
                        $_t = [
                            'customer_id' => $_i['customer_id'],
                            'ad_id' => $_i['ad_id'],
                            'vendor_id' => $_i['vendor_id'],
                        ];
                        $this->model->delInbox($_t);
                        Utils::redirect('/' . $this->lang . '/bidds/');
                    }
                    $_accepted = '0';
                    $_rejected = '0';
                    $_accepted_v = $_i_parent['accepted_v'];
                    if (isset($_POST['accept'])) {
                        $_accepted = '1';
                        $_accepted_v = '1';
                        $code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 6);
                        $hobidd_code = strtoupper($code);
                    } elseif (isset($_POST['reject'])) {
                        $_POST['data']['value'] = '0';
                        $_rejected = '1';
                    } elseif (isset($_POST['reject2'])) {
                        $_rejected = '1';
                        $_t = [
                            'ad_id' => $_i['ad_id'],
                            'customer_id' => $_i['customer_id'],
                            'value' => $_POST['data']['value'],
                            'accepted' => ($_POST['data']['value'] < $data['threshold1'] ? '0' : '1'),
                            'cdate' => time(),
                        ];
                        $this->model->insertBidd($_t);
                    }
                    if ((strcmp($_accepted, '1') == 0) && isset($_POST['data']['firstname'])) {
                        $_c = [];
                        $_c[] = 'Firstname: ' . $_POST['data']['firstname'];
                        $_c[] = 'Lastname: ' . $_POST['data']['lastname'];
                        $_c[] = 'Country: ' . $_POST['data']['country'];
                        $_c[] = 'Street: ' . $_POST['data']['street'];
                        $_c[] = 'ZIP-Code: ' . $_POST['data']['postalcode'];
                        $_c[] = 'City: ' . $_POST['data']['location'];
                        $_c[] = 'Phone number: ' . $_POST['data']['phone'];
                        $_c[] = 'EMail: ' . $this->user2->getUserdata()['email'];
                        $_POST['data']['content'] .= "\n\nContact-Details:\n\n" . implode("\n", $_c);
                    }
                    if (strcmp($_accepted, '1') != 0) {
                        $_t = [
                            'ad_id' => $_i['ad_id'],
                            'customer_id' => $_i['customer_id'],
                            'value' => $_POST['data']['value'],
                            'accepted' => ($_POST['data']['value'] < $data['threshold1'] ? '0' : '1'),
                            'cdate' => time(),
                        ];
                        $this->model->insertBidd($_t);
                    }
                    $_t = [
                        'customer_id' => $_i['customer_id'],
                        'ad_id' => $_i['ad_id'],
                        'vendor_id' => $_i['vendor_id'],
                        'value' => $_POST['data']['value'],
                        'sender' => 'c',
                        'content' => $_POST['data']['content'],
                        'cdate' => time(),
                        'accepted_c' => $_accepted,
                        'accepted_v' => $_accepted_v,
                        'rejected' => $_rejected,
                        'hobidd_code' => $hobidd_code,
                        'vendor_comments' => $_i['vendor_comments'],
                    ];
                    $this->model->insertInbox($_t);
                    if ((strcmp($_accepted, '1') == 0) && isset($_POST['data']['firstname'])) {
                        $template_file_customer = DOCUMENT_ROOT_PATH . '/inc/templates/email/customer_order_confirmation_'
                            . $this->lang . '.php';
                        $template_file_vendor = DOCUMENT_ROOT_PATH . '/inc/templates/email/vendor_order_confirmation_'
                            . $this->lang . '.php';
                        $swap_array = [
                            "{PURCHASE_DATE}" => date("d.m.Y"),
                            "{OFFER_NUMBER}" => $_i['ad_id'],
                            "{OFFERED_PRICE}" => $_POST['data']['value'],
                            "{TITLE}" => $_i['title'],
                            "{PERSONS}" => $_i['persons'],
                            "{DAYS}" => $_i['days'],
                            "{VENDOR_COMMENTS}" => $_i['vendor_comments'],
                            "{VENDOR_COMPANY}" => $_i['company'],
                            "{VENDOR_PHONE}" => $_i['vendor_phone'],
                            "{VENDOR_MOBILE}" => $_i['vendor_mobile'],
                            "{VENDOR_EMAIL}" => $_i['vendor_email'],
                            "{FIRSTNAME}" => $_POST['data']['firstname'],
                            "{LASTNAME}" => $_POST['data']['lastname'],
                            "{COUNTRY}" => $_POST['data']['country'],
                            "{STREET}" => $_POST['data']['street'],
                            "{ZIP-CODE}" => $_POST['data']['postalcode'],
                            "{CITY}" => $_POST['data']['location'],
                            "{PHONE}" => $_POST['data']['phone'],
                            "{EMAIL}" => $this->user2->getUserdata()['email'],
                            "{HOBIDDCODE}" => $hobidd_code,
                            "{EMAIL_HEADER_IMAGE}" => SITE_URL . "/" . $lang . "/" . $this->banner[1011]['image'],
                            "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . "/" . $lang . "/" . $this->banner[1012]['image'],
                            "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . "/" . $lang . "/" . $this->banner[1014]['image'],
                            "{EMAIL_TWITTER_IMAGE}" => SITE_URL . "/" . $lang . "/" . $this->banner[1013]['image'],
                        ];
                        $message_customer = file_get_contents($template_file_customer);
                        foreach (array_keys($swap_array) as $key) {
                            $message_customer = str_replace($key, $swap_array[$key], $message_customer);
                        }
                        $message_vendor = file_get_contents($template_file_vendor);
                        foreach (array_keys($swap_array) as $key) {
                            $message_vendor = str_replace($key, $swap_array[$key], $message_vendor);
                        }
                        Utils::sendHTMLMail(
                            $_i['vendor_email'],
                            'hobidd.com Kaufbestätigung ',
                            $message_vendor,
                            EMAIL_FROM_SYSTEM
                        );
                        Utils::sendHTMLMail(
                            $this->user2->getUserdata()['email'],
                            'hobidd.com Kaufbestätigung ',
                            $message_customer,
                            EMAIL_FROM_SYSTEM
                        );
                    } else {
                        $template_file = DOCUMENT_ROOT_PATH . '/inc/templates/email/vendor_get_bidd_' . $this->lang . '.php';
                        $swap_array = [
                            "{OFFER_NUMBER}" => $_i['ad_id'],
                            "{OFFER_NAME}" => $_ad['title'],
                            "{OFFERLINK}" => SITE_URL . "/" . $this->lang . '/artikel/' . $_i['ad_id'],
                            "{OFFERED_PRICE}" => number_format($_POST['data']['value'], 2, ",", "."),
                            "{EMAIL_HEADER_IMAGE}" => SITE_URL . "/" . $this->banner[1011]['image'],
                            "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . "/" . $this->banner[1012]['image'],
                            "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . "/" . $this->banner[1014]['image'],
                            "{EMAIL_TWITTER_IMAGE}" => SITE_URL . "/" . $this->banner[1013]['image'],
                        ];
                        $message = file_get_contents($template_file);
                        foreach (array_keys($swap_array) as $key) {
                            $message = str_replace($key, $swap_array[$key], $message);
                        }
                        Utils::sendHTMLMail($_i['vendor_email'], 'hobidd.com Angebot', $message, EMAIL_FROM_SYSTEM);
                    }
                    Utils::redirect('/' . $this->lang . '/bidds/');
                }
            }
            $this->smarty->assign('cnt_bidds_left', $cnt_bidds_left);
            $this->smarty->assign('ad', $_ad);
            $this->smarty->assign('id', (isset($this->alias[2]) ? $this->alias[2] : ''));
            $this->smarty->assign('B_customer', true);
        } else {
            Utils::redirect('/' . $this->lang);
        }
        $pagedata['title'] = 'Inbox';
        $this->smarty->assign('pagedata', $pagedata);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function createInquiry()
    {
        if ($this->user2->getLogin()) {
            $this->smarty->assign('B_customer', true);
        } else {
            Utils::redirect('/' . $this->lang);
        }
        $edit = false;
        if (!empty($_SESSION['frontend'][$this->module]['data'])) {
            $edit = true;
        }
        if ($_POST) {
            $data = &$this->model->cleanInput($_POST['data']);
            $data['accomodationType'] = isset($_POST['accomodationType']) ? $this->model->cleanInput(
                $_POST['accomodationType']
            ) : [];
            $data['category'] = isset($_POST['category']) ? $this->model->cleanInput($_POST['category']) : [];
            $data['provision'] = isset($_POST['provision']) ? $this->model->cleanInput($_POST['provision']) : [];
            $error = false;
            if (!$error) {
                $required = [
                    'country' => [],
                    'accomodationType' => [],
                    'days' => [],
                    'adults' => [],
                    'children' => [],
                    'flexible_travelling_time' => [],
                    'budget' => [],
                ];
                $error = Utils::validateForm($required, $data);
            }
            if ($error) {
                $this->smarty->assign('css', $error['fields']);
                $this->smarty->assign('msg', $error['msg']);
            } else {
                $data['active'] = '1';
                $data['cdate'] = time();
                $data['customer_id'] = $this->user2->getUserID();
                $_SESSION['frontend'][$this->module]['data'] = $data;
                if (isset($_POST['data']['terms'])) {
                    $_t = $_SESSION['frontend'][$this->module]['data'];
                    $_t['accomodationType_JSON'] = json_encode($_t['accomodationType']);
                    $_t['category_JSON'] = json_encode($_t['category']);
                    $_t['provision_JSON'] = json_encode($_t['provision']);
                    unset($_t['terms'], $_t['accomodationType'], $_t['provision'], $_t['category']);
                    $_id = $this->model->insertInquiry($_t);
                    $email_kategorie = implode(', ', json_decode($_t['accomodationType_JSON']));
                    $email_topics = $this->model->textlistCategory(json_decode($_t['category_JSON']), ', ');
                    $email_verpflegung = $this->model->textlistProvision(json_decode($_t['provision_JSON']), ', ');
                    $swap_array = [
                        "{INQUIRY_URL}" => SITE_URL . '/' . $this->lang . '/vendors-landing/' . $_id . '/',
                        "{ANFRAGE_NR}" => 'AT' . str_pad($_id, 5, '0', STR_PAD_LEFT),
                        "{URLAUBSLAND}" => empty(trim($_t['country'])) ? '-' : trim($_t['country']),
                        "{REGION}" => empty(trim($_t['federal_state']))
                            ? '-'
                            : trim(
                                $_t['federal_state']
                            ),
                        "{TOPICS}" => empty(trim($email_topics)) ? '-' : trim($email_topics),
                        "{KATEGORIE}" => empty(trim($email_kategorie)) ? '-' : trim($email_kategorie),
                        "{VERPFLEGUNG}" => empty(trim($email_verpflegung)) ? '-' : trim($email_verpflegung),
                        "{FLEXIBLER_REISEZEITRAUM}" => empty(trim($_t['flexible_travelling_time'])) ? 'Nein'
                            : ($_t['flexible_travelling_time'] == '1' ? 'Ja' : 'Nein'),
                        "{REISEZEITRAUM_VON}" => empty(trim($_t['date_from'])) ? '-' : trim($_t['date_from']),
                        "{REISEZEITRAUM_BIS}" => empty(trim($_t['date_until'])) ? '-' : trim($_t['date_until']),
                        "{ANZAHL_NAECHTE}" => empty(trim($_t['days'])) ? '-' : trim($_t['days']),
                        "{ANZAHL_ERWACHSENE}" => empty(trim($_t['adults'])) ? '-' : trim($_t['adults']),
                        "{ANZAHL_KINDER}" => empty(trim($_t['children'])) ? '-' : trim($_t['children']),
                        "{ZUSATZINFO}" => empty(trim($_t['additional_info']))
                            ? '-'
                            : trim(
                                $_t['additional_info']
                            ),
                        "{BUDGET}" => empty(trim($_t['budget']))
                            ? '-'
                            : '€ ' . number_format(
                                trim($_t['budget']),
                                2
                            ),
                        "{EMAIL_HEADER_IMAGE}" => SITE_URL . "/" . $this->banner[1011]['image'],
                        "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . "/" . $this->banner[1012]['image'],
                        "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . "/" . $this->banner[1014]['image'],
                        "{EMAIL_TWITTER_IMAGE}" => SITE_URL . "/" . $this->banner[1013]['image'],
                    ];
                    $email_template_file = DOCUMENT_ROOT_PATH . '/inc/templates/email/system_get_inquiry_de.php';
                    $email_message = file_get_contents($email_template_file);
                    foreach (array_keys($swap_array) as $key) {
                        $email_message = str_replace($key, $swap_array[$key], $email_message);
                    }
                    Utils::sendHTMLMail(
                        EMAIL_FROM_SYSTEM,
                        'hobidd - Eine neue Anfrage wurde gestellt',
                        $email_message,
                        EMAIL_FROM_SYSTEM
                    );
                    $_SESSION['frontend'][$this->module]['data'] = '';
                    $data = [];
                    $this->smarty->assign('msg', $this->model->getTranslation('inquiry_created'));
                } else {
                    $this->smarty->assign('css', $error['fields']);
                    $this->smarty->assign('msg', $this->model->getTranslation('agb_akzeptieren'));
                }
            }
        } elseif ($edit) {
            $data = $_SESSION['frontend'][$this->module]['data'];
        } else {
            $data = [];
        }
        $data['opt_category'] = $this->model->optCategory(isset($data['category']) ? $data['category'] : null);
        $data['opt_provision'] = $this->model->optProvision(
            isset($data['provision']) ? $data['provision'] : null
        );
        $data['opt_country'] = $this->model->optCountryDatabase(
            isset($data['country']) ? $data['country'] : null
        );
        $data['opt_accomodationType'] = $this->model->optAccomodationTypesAsCheckbox(
            isset($data['accomodationType']) ? $data['accomodationType'] : null
        );
        $this->smarty->assign('data', $data);
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function bidds()
    {
        if ($this->user->getLogin()) {
            $data = $this->model->selectBiddOverview($this->user->getUserID());
            $this->smarty->assign('B_vendor', true);
        } elseif ($this->user2->getLogin()) {
            $data = $this->model->selectBiddOverview('', $this->user2->getUserID());
            $this->smarty->assign('B_customer', true);
        } else {
            Utils::redirect('/' . $this->lang);
        }
        $pagedata['title'] = 'Bidds';
        $this->smarty->assign('pagedata', $pagedata);
        $this->smarty->assign('data', $data);
        $this->smarty->assign(
            'opt_country',
            $this->model->optCountry(isset($data['country']) ? $data['country'] : null)
        );
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function descriptionExtern()
    {
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        if ($this->user2->getLogin() !== true) {
            $this->loginForm();
            $this->smarty->assign('B_loginForm', false);
        }
        $this->smarty->assign('logged_in', $this->user2->getLogin());
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function forTravellers()
    {
        if (isset($pagedata)) {
            $this->smarty->assign('pagedata', $pagedata);
        }
        if (isset($data)) {
            $this->smarty->assign('data', $data);
        }
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function forVendors()
    {
        if (isset($pagedata)) {
            $this->smarty->assign('pagedata', $pagedata);
        }
        if (isset($data)) {
            $this->smarty->assign('data', $data);
        }
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function aboutUs()
    {
        if (isset($pagedata)) {
            $this->smarty->assign('pagedata', $pagedata);
        }
        if (isset($data)) {
            $this->smarty->assign('data', $data);
        }
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function editBids()
    {
        if ($this->user->getLogin()) {
            $data = $this->model->selectBiddOverview($this->user->getUserID(), $_GET['customer_id'], str_replace('/', '', $_GET['ad_id']));
            $this->smarty->assign('B_vendor', true);
        } else {
            Utils::redirect('/' . $this->lang);
        }
        $user = $this->user->getUserdata();
        $data['ad_detail'] = $this->model->selectAds('', $_GET['ad_id']);
        // echo '<pre>',print_r($data['ad_detail']),'</pre>';exit();
        $data['user'] = $user;
        $data['package'] = $this->model->selectPackage($user['package_id']);
        $valid_till = date("Y-m-d", strtotime(date("Y-m-d", strtotime($user['edate'])) . " + " . $data['package']['duration'] . " day"));
        $this->smarty->assign('date_from_year', substr($data['ad_detail']['date_from'], 2, 2));
        $this->smarty->assign('date_from_month', substr($data['ad_detail']['date_from'], 5, 2));
        $this->smarty->assign('date_from_day', substr($data['ad_detail']['date_from'], 8, 2));
        $this->smarty->assign('date_until_year', substr($data['ad_detail']['date_until'], 2, 2));
        $this->smarty->assign('date_until_month', substr($data['ad_detail']['date_until'], 5, 2));
        $this->smarty->assign('date_until_day', substr($data['ad_detail']['date_until'], 8, 2));
        $this->smarty->assign('valid_till', $valid_till);
        $desiredData = $this->model->selectDesiredDate(str_replace('/', '', $_GET['ad_id']), str_replace('000', '', $_GET['customer_id']));
        if (!is_null($desiredData)) {
            $desired_date = explode('-', str_replace(' ', '', $desiredData['desired_date']));
            $desired_start_day = date('l', strtotime(date('d-m-Y', strtotime($desired_date[0]))));
            $desired_end_day = date('l', strtotime(date('d-m-Y', strtotime($desired_date[1]))));
            $this->smarty->assign('date_desired_from_year', date('y', strtotime($desired_date[0])));
            $this->smarty->assign('date_desired_from_month', explode('/', $desired_date[0])[1]);
            $this->smarty->assign('date_desired_from_day', explode('/', $desired_date[0])[0]);
            $this->smarty->assign('date_desired_from_Day', $desired_start_day);
            $this->smarty->assign('date_desired_until_year', date('y', strtotime($desired_date[1])));
            $this->smarty->assign('date_desired_until_month', explode('/', $desired_date[1])[1]);
            $this->smarty->assign('date_desired_until_day', explode('/', $desired_date[1])[0]);
            $this->smarty->assign('date_desired_until_Day', $desired_end_day);
            $this->smarty->assign('desired_date', $desiredData['desired_date']);
        } else {
            $this->smarty->assign('desired_date', null);
        }
        $pagedata['title'] = 'Bidds';
        $this->smarty->assign('pagedata', $pagedata);
        $this->smarty->assign('data', $data);
        $this->smarty->assign(
            'opt_country',
            $this->model->optCountry(isset($data['country']) ? $data['country'] : null)
        );
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function vendorLandingpage()
    {
        $this->smarty->assign('pagedata_top', $this->model->selectContentByPage('Anbieter Landingpage - Top'));
        $this->smarty->assign('pagedata_bottom', $this->model->selectContentByPage('Anbieter Landingpage - Bottom'));
        $redirectUrl = SITE_URL . '/' . $this->lang . '/kategorie/meine/';
        if (isset($this->alias[2])) {
            $redirectUrl = SITE_URL . '/' . $this->lang . '/inquiry/' . $this->alias[2] . '/';
        }
        if ($this->user->getLogin() === true) {
            Utils::redirect($redirectUrl);
        } else {
            if (isset($this->alias[2])) {
                $this->redirectToAfterLogin = $redirectUrl;
            }
            $this->loginForm();
            $this->smarty->assign('B_loginForm', false);
        }
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function travellerLandingpage()
    {
        $this->smarty->assign('pagedata_top', $this->model->selectContentByPage('Reisende Landingpage - Top'));
        $this->smarty->assign('pagedata_bottom', $this->model->selectContentByPage('Reisende Landingpage - Bottom'));
        $redirectUrl = SITE_URL . '/' . $this->lang . '/kategorie/meine/';
        if (isset($this->alias[2])) {
            $redirectUrl = SITE_URL . '/' . $this->lang . '/inquiry/' . $this->alias[2] . '/';
        }
        if ($this->user2->getLogin() === true) {
            Utils::redirect($redirectUrl);
        } else {
            if (isset($this->alias[2])) {
                $this->redirectToAfterLogin = $redirectUrl;
            }
            $this->loginForm();
            $this->smarty->assign('B_loginForm', false);
        }
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function impressum()
    {
        if (isset($pagedata)) {
            $this->smarty->assign('pagedata', $pagedata);
        }
        if (isset($data)) {
            $this->smarty->assign('data', $data);
        }
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function userRegistration()
    {
        if ($this->user->getLogin() === true) {
            Utils::redirect('/' . $this->lang);
        }
        if ($_POST && isset($_POST['xdata'])) {
            $xdata = &$_POST['xdata'];
            $required = [
                'email' => ['email' => true, 'exists' => $this->model->emailUserExists($xdata['email'])],
                'password' => ['compare' => $xdata['password2'], 'length' => 8],
                'password2' => [],
                'legalCheckbox1' => ['compare' => 'on'],
            ];
            $error = Utils::validateForm($required, $xdata);
            if ($error) {
                $this->smarty->assign('msg', $error['msg']);
                $this->smarty->assign('B_msg', true);
                $this->smarty->assign('B_reg_login', true);
            } else {
                unset($xdata['password2']);
                unset($xdata['legalCheckbox1']);
                $xdata['active'] = 0;
                $xdata['verificationCode'] = md5(rand(0, 10000000));
                $this->model->insertCustomer($xdata);
                $this->model->sendCustomerVerificationCode($xdata['email'], $xdata['verificationCode']);
                //$this->user2->auth($xdata['email'], sha1($xdata['password']));
                $this->smarty->assign('msg', $this->model->getTranslation('reg_customer_done'));
                $this->smarty->assign('B_msg', true);
                $this->smarty->assign('xdata', $xdata);
                $this->smarty->assign('B_loginForm', true);
                $this->smarty->assign('B_text_header', true);
                return;
            }
        }
        if (isset($pagedata)) {
            $this->smarty->assign('pagedata', $pagedata);
        }
        if (isset($xdata)) {
            $this->smarty->assign('xdata', $xdata);
        }
        $this->smarty->assign('B_text_header', true);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function userVerification()
    {
        if (!empty($this->alias[2]) && !empty($this->alias[3])) {
            $verificationComplete = $this->model->verifyCustomerVerificationCode($this->alias[2], $this->alias[3]);
            if ($verificationComplete) {
                $this->smarty->assign('msg', $this->model->getTranslation('reg_customer_verification_ok'));
            } else {
                $this->smarty->assign('msg', $this->model->getTranslation('reg_customer_verification_failed'));
            }
            $this->smarty->assign('B_msg', true);
        }
        $this->smarty->assign('B_loginForm', true);
        $this->smarty->assign('B_text_header', true);
    }
    public function packageForm()
    {
        $pagedata = $this->model->selectContent($this->alias[1]);
        $packages = $this->model->selectPackages();
        //print_r($packages);
        //$this->smarty->assign('data', $data);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('packages', $packages);
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function checkout()
    {
        if (!$this->user->getLogin()) {
            exit;
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $user = $this->user->getUserdata();
        $package = $this->model->selectPackage($user['package_id']);
        if (!$package['price'] || $user['package_payed'] == '1') {
            Utils::redirect('/' . $this->lang . '/kategorie/meine/');
            exit;
        }
        if (true || !empty($this->alias[2])) {
            $_t = [
                'id' => $this->user->getUserID(),
                'package_payed' => '1',
            ];
            $this->model->updateVendor($_t);
            Utils::redirect('/' . $this->lang . '/kategorie/meine/');
            $this->smarty->assign('B_success', true);
        }
        $priceinfo = $this->model->getTranslation('priceinfo_checkout');
        $priceinfo = str_replace('%package%', $package['name'], $priceinfo);
        $price = $package['price'] * 12;
        if ($user['country'] == 'Austria (Österreich)') {
            $price = $price * 1.2;
            $priceinfo = str_replace('%price%', Utils::nf($price) . ' incl. MwSt.', $priceinfo);
        } else {
            $priceinfo = str_replace('%price%', Utils::nf($price) . ' excl. MwSt.', $priceinfo);
        }
        $this->smarty->assign('priceinfo', $priceinfo);
        $this->smarty->assign('package', $package);
        $this->smarty->assign('amount', $price);
        $this->smarty->assign('success_url', '/' . $this->lang . '/checkout/success/');
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function registerForm($offer = false)
    {
        if (empty($this->alias[2]) || !in_array($this->alias[2], [1, 2, 3, 4])) {
            Utils::redirect('/' . $this->lang . '/paketauswahl/');
        }
        $package = $this->model->selectPackage($this->alias[2]);
        $package['price'] = $package['price'] * 12;
        if ($_POST) {
            $data = &$this->model->cleanInput($_POST['data']);
            $data['mobile'] = str_replace('+', '00', $data['mobile']);
            $data['mobile'] = preg_replace('/^43/', '0043', $data['mobile']);
            $data['mobile'] = preg_replace('/[^0-9]/', '', $data['mobile']);
            // if (trim($data['website']) && substr($data['website'], 0, 4) != 'http') {
            // 	$data['website'] = 'http://' . trim($data['website']);
            // }
            $data['captcha'] = '';
            if (isset($_POST['g-recaptcha-response'])) {
                if ($this->model->checkCaptcha($_POST['g-recaptcha-response'])) {
                    $data['captcha'] = true;
                }
            }
            $required = [
                'company' => [],
                'accomodationType' => [],
                'street' => [],
                'postalcode' => [],
                'location' => [],
                'country' => [],
                'mobile' => [
                    'msg' => $this->model->getTranslation('error_mobile_exists'),
                    'exists' => $this->model->phoneExists($data['mobile']),
                ],
                'email' => ['email' => true, 'exists' => $this->model->emailExists($data['email'])],
                'password' => ['compare' => $data['password_repeat'], 'length' => 8],
                'password_repeat' => [],
                'terms' => [$this->model->getTranslation('error_terms')],
                'captcha' => ['msg' => $this->model->getTranslation('wrong_captcha')],
            ];
            $error = Utils::validateForm($required, $data);
            if ($this->model->isEuCountry($data['country'])) {
                if (!$this->model->validateVatNumber($data['uid'])) {
                    $error = [
                        'msg' => $this->model->getTranslation('error_invalid_vat_number'),
                        'fields' => ['uid' => ' has-error error'],
                    ];
                }
            }
            if (!$error) {
                //if (substr($data['mobile'], 0, 5) != '00436') {
                if (substr($data['mobile'], 0, 2) != '00') {
                    $error = [
                        'msg' => $this->model->getTranslation('description_mobile_number_format'),
                        'fields' => ['mobile' => ' error'],
                    ];
                }
            }
            if (!$error) {
                $data['acceptid'] = rand(1000, 9999);
                if ($_e = $this->model->sendActivationSMS($data['mobile'], $data['acceptid'])) {
                    $error = [
                        'msg' => 'Fehler Mobilnummer (' . $_e . ')',
                        'fields' => ['mobile' => ' error'],
                    ];
                }
            }
            if ($error) {
                $this->smarty->assign('msg', $error['msg']);
                $this->smarty->assign('css', $error['fields']);
            } else {
                unset($data['password_repeat']);
                unset($data['terms']);
                unset($data['captcha']);
                $coordinates = $this->model->addressToCoordinates(
                    $data['street'],
                    $data['postalcode'],
                    $data['location']
                );
                $data['longitude'] = $coordinates['longitude'];
                $data['latitude'] = $coordinates['latitude'];
                //$data['acceptid'] = Utils::generatePassword(10);
                if ($offer) {
                    $data['is_offer_user'] = '1';
                }
                $data['package_id'] = intval($this->alias[2]);
                $data['facility_JSON'] = json_encode($data['facility']);
                unset($data['facility']);
                $this->model->insertVendor($data);
                // $_text = $this->model->getTranslation('email_registration_vendor1');
                // $msg = explode("\n", $_text);
                // $msg[] = '';
                // $msg[] = $this->model->getTranslation('email_registration_vendor2');
                // $msg[] = '';
                // $msg[] = SITE_URL . '/' . $this->lang . '/login/';
                // $msg[] = $this->model->getTranslation('username') . ': ' . $data['email'];
                // $msg[] = $this->model->getTranslation('password') . ': ' . $data['password'];
                // $msg[] = '';
                // $msg[] = $this->model->getTranslation('email_registration_vendor3');
                // //$msg[] = SITE_URL . '/anmeldung-bestaetigen/' . $data['acceptid'];
                // Utils::sendTextMail($data['email'], $this->model->getTranslation('email_registration_vendor_subject'), implode("\n", $msg), EMAIL_FROM_SYSTEM);
                if ($offer) {
                    Utils::redirect('/' . $this->lang . '/anmeldung-bestaetigen-angebot/');
                } else {
                    Utils::redirect(
                        '/' . $this->lang . '/anmeldung-bestaetigen/' . $data['email'] . '/' . $data['package_id'] . '/'
                    );
                }
            }
        } else {
            $data = [
                'display_phone' => '1',
                'country' => '',
            ];
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $data['opt_display_phone'] = isset($data['display_phone']) ? Utils::opt01($data['display_phone']) : null;
        $data['opt_country'] = $this->model->optCountry($data['country']);
        $data['opt_accomodationType'] = $this->model->optAccomodationTypes(
            isset($data['accomodationtype']) ? $data['accomodationtype'] : null
        );
        $data['opt_facility'] = $data['facility'] = $this->model->optFacility(
            isset($data['facility']) ? (is_array($data['facility'])
                ? $data['facility']
                : json_decode(
                    $data['facility']
                )) : null,
            false,
            'data[facility]'
        );
        if ($this->model->isEuCountry($data['country'])) {
            $this->smarty->assign('display_uid_fild', true);
        }
        $this->smarty->assign('data', $data);
        $this->smarty->assign('package', $package);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        $this->smarty->assign('B_js_captcha', true);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function registerFormOffer()
    {
        $this->registerForm(true);
    }
    public function confirmRegister($offer = false)
    {
        if ($_POST) {
            if ($this->model->confirmRegister($_POST['code'])) {
                // $_text = $this->model->getTranslation('email_registration_vendor1');
                // $msg = explode("\n", $_text);
                // $msg[] = '';
                // $msg[] = $this->model->getTranslation('email_registration_vendor2');
                // $msg[] = '';
                // $msg[] = SITE_URL . '/' . $this->lang . '/login/';
                // $msg[] = $this->model->getTranslation('username') . ': ' . $this->alias[2];
                // $msg[] = '';
                // $msg[] = $this->model->getTranslation('email_registration_vendor3');
                // //$msg[] = SITE_URL . '/anmeldung-bestaetigen/' . $data['acceptid'];
                // //Utils::sendTextMail($this->alias[2], $this->model->getTranslation('email_registration_vendor_subject'), implode("\n", $msg), EMAIL_FROM_SYSTEM);
                // Utils::sendTextMail('office@hobidd.com', $this->model->getTranslation('email_registration_vendor_subject'), implode("\n", $msg), EMAIL_FROM_SYSTEM);
                $package_id = intval($this->alias[3]);
                $template_file_vendor = DOCUMENT_ROOT_PATH . '/inc/templates/email/vendor_email_registration_' . $package_id
                    . '_' . $this->lang . '.php';
                $swap_array = [
                    "{USERNAME}" => $this->alias[2],
                    "{EMAIL_HEADER_IMAGE}" => SITE_URL . "/" . $lang . "/" . $this->banner[1011]['image'],
                    "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . "/" . $lang . "/" . $this->banner[1012]['image'],
                    "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . "/" . $lang . "/" . $this->banner[1014]['image'],
                    "{EMAIL_TWITTER_IMAGE}" => SITE_URL . "/" . $lang . "/" . $this->banner[1013]['image'],
                ];
                $message_vendor = file_get_contents($template_file_vendor);
                foreach (array_keys($swap_array) as $key) {
                    $message_vendor = str_replace($key, $swap_array[$key], $message_vendor);
                }
                //Utils::sendHTMLMail('michael.welz@dotparc.com', $this->model->getTranslation('email_registration_vendor_subject'), $message_vendor, EMAIL_FROM_SYSTEM);
                Utils::sendHTMLMail(
                    EMAIL_FROM_SYSTEM,
                    $this->model->getTranslation('email_registration_vendor_subject'),
                    $message_vendor,
                    EMAIL_FROM_SYSTEM
                );
                Utils::sendHTMLMail(
                    $this->alias[2],
                    $this->model->getTranslation('email_registration_vendor_subject'),
                    $message_vendor,
                    EMAIL_FROM_SYSTEM
                );
                $package = $this->model->selectPackage($package_id);
                if ($package['price'] > 0) {
                    Utils::redirect('/' . $this->lang . '/checkout/');
                }
                if ($offer) {
                    Utils::redirect('/' . $this->lang . '/inserat-angebot-erstellen/');
                } else {
                    Utils::redirect('/' . $this->lang . '/anmeldung-danke/');
                }
            } else {
                if ($offer) {
                    $pagedata = $this->model->selectContent('anmeldung-angebot-bestaetigen-fehler');
                } else {
                    $pagedata = $this->model->selectContent('anmeldung-bestaetigen-fehler');
                }
                $this->smarty->assign('B_' . $this->state . 'Failed', true);
                $this->smarty->assign('B_text_header', true);
            }
        } else {
            $pagedata = $this->model->selectContent($this->alias[1]);
            $this->smarty->assign('B_' . $this->state, true);
            $this->smarty->assign('B_text_header', true);
        }
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('data', $pagedata);
        $this->smarty->assign('pagedata', $pagedata);
    }
    public function confirmRegisterOffer()
    {
        $this->confirmRegister(true);
    }
    /*public function confirmRegister()
        {
            if ($this->model->confirmRegister($this->alias[1])) {
                $data = $this->model->selectContent($this->alias[0]);
                $this->smarty->assign('data', $data);
                $this->smarty->assign('B_detailContent', true);
            } else {
                $this->smarty->assign('B_' . $this->state . 'Failed', true);
            }
            $pagedata = $this->model->selectContent($this->alias[0]);
            $this->crumbs[] = array(
                'name' => $pagedata['title'],
                'link' => '/' . $pagedata['alias'] . '/',
            );
            $this->smarty->assign('crumbs', $this->crumbs);
        }*/
    public function profileForm()
    {
        if ($_POST) {
            $data = &$this->model->cleanInput($_POST['data']);
            $data['mobile'] = str_replace('+', '00', $data['mobile']);
            $data['mobile'] = preg_replace('/^43/', '0043', $data['mobile']);
            $data['mobile'] = preg_replace('/[^0-9]/', '', $data['mobile']);
            $error = false;
            if (isset($_FILES)) {
                $_FILES = array_values($_FILES);
                foreach ($_FILES as $key => $value) {
                    if ($_FILES[$key]["name"] == "") {
                        unset($_FILES[$key]);
                    }
                }
                $files = $this->model->selectVendors($this->user->getUserID())["file"];
                if ($files) {
                    $files = count(json_decode(explode("catalog/", $files)[1], true));
                } else {
                    $files = 0;
                }
                if (count($_FILES) + $files > 20) {
                    $error = [
                        'fields' => ['file'],
                        'msg' => 'You cannot upload more than 20 files.',
                    ];
                }
            }
            // Checks if user sent an empty form
            if (isset($_FILES) && !$error) {
                // Loop through each file in files[] array
                foreach ($_FILES as $key => $value) {
                    $path = DOCUMENT_ROOT_PATH . UPLOAD_PATH_AD;
                    $file = md5($_FILES[$key]['tmp_name']) . '.' . Utils::filenameToExtension($_FILES[$key]['name']);
                    $file_array = array('name' => $_FILES[$key]['name'], 'type' => $_FILES[$key]['type'], 'tmp_name' => $_FILES[$key]['tmp_name'], 'error' => $_FILES[$key]['error'], 'size' => $_FILES[$key]['size']);
                    if ($error = Utils::uploadFile(
                        $file_array,
                        $path . $file,
                        ['jpg', 'jpeg', 'png'],
                        [],
                        UPLOAD_MAX_FILESIZE_AD
                    )) {
                        $error = [
                            'fields' => ['file'],
                            'msg' => $error,
                        ];
                    } else {
                        if (!Image::resize($path . $file, $path . '250_' . $file, 250)) {
                            $error = [
                                'fields' => ['file'],
                                'msg' => 'Fehler beim erstellen des Bildes',
                            ];
                        } else {
                            $_SESSION['frontend'][$this->module]['upload']['file'][$files] = [
                                'path' => $path,
                                'file' => $file,
                                'name' => $_FILES[$key]['name'],
                            ];
                            $files = $files + 1;
                        }
                    }
                }
                $files = $this->model->selectVendors($this->user->getUserID())["file"];
                if ($files && !$error) {
                    $files = json_decode(explode("catalog/", $files)[1]);
                    $new_files_last_index = 0;
                    foreach ($files as $key => $value) {
                        $_SESSION['frontend'][$this->module]['upload']['file'][$new_files_last_index] = [
                            'path' => $value->path,
                            'file' => $value->file,
                            'name' => $value->name,
                        ];
                        $new_files_last_index = $new_files_last_index + 1;
                    }
                }
            }
            if (!$error) {
                $required = [
                    'accomodationType' => [],
                    'company' => [],
                    'street' => [],
                    'postalcode' => [],
                    'location' => [],
                    'country' => [],
                    'email' => [
                        'email' => true,
                        'exists' => $this->model->emailExists($data['email'], $this->user->getUserID()),
                    ],
                ];
                if ($this->state == 'registerForm') {
                    $required['mobile'] = [
                        'msg' => $this->model->getTranslation('error_mobile_exists'),
                        'exists' => $this->model->phoneExists(
                            $data['mobile'],
                            $this->user->getUserID()
                        ),
                    ];
                }
                if ($data['password']) {
                    $required['password'] = ['compare' => $data['password_repeat'], 'length' => 8];
                } else {
                    unset($data['password']);
                }
                $error = Utils::validateForm($required, $data);
            }
            if (!$error && $this->state == 'registerForm') {
                if (substr($data['mobile'], 0, 5) != '00436') {
                    $error = [
                        'msg' => $this->model->getTranslation('description_mobile_number_format'),
                        'fields' => ['mobile' => ' error'],
                    ];
                }
            }
            if ($error) {
                $this->smarty->assign('msg', $error['msg']);
                $this->smarty->assign('css', $error['fields']);
            } else {
                if (!empty($_SESSION['frontend'][$this->module]['upload']['file'])) {
                    $data['file'] = json_encode($_SESSION['frontend'][$this->module]['upload']['file']);
                    $_SESSION['frontend'][$this->module]['upload']['file'] = [];
                }
                $data['facility'] = isset($_POST['facility']) ? $this->model->cleanInput($_POST['facility']) : [];
                $data['facility_JSON'] = json_encode($data['facility']);
                unset($data['password_repeat'], $data['facility']);
                $data['id'] = $this->user->getUserID();
                $coordinates = $this->model->addressToCoordinates(
                    $data['street'],
                    $data['postalcode'],
                    $data['location']
                );
                $data['longitude'] = $coordinates['longitude'];
                $data['latitude'] = $coordinates['latitude'];
                //check if cancellation condition or common description is updated then send email to admin
                $current_vendor = $this->model->selectVendors($this->user->getUserID());
                $email = false;
                $updated_content = array(
                    "common_description_de" => NULL,
                    "common_description_en" => NULL,
                    "cancellation_description_de" => NULL,
                    "cancellation_description_en" => NULL
                );
                if(isset($data["common_description"])) 
                {
                    if($current_vendor["common_description"] != $data["common_description"]) 
                    {
                        $updated_content["common_description_de"] = $data["common_description"];
                        $email = true;
                    }
                }
                if(isset($data["common_description_en"])) 
                {
                    if ($current_vendor["common_description_en"] != $data["common_description_en"]) 
                    {
                        $updated_content["common_description_en"] = $data["common_description_en"];
                        $email = true;
                    }
                }
                if(isset($data["cancellation_conditions"])) 
                {
                    if ($current_vendor["cancellation_conditions"] != $data["cancellation_conditions"]) 
                    {
                        $updated_content["cancellation_description_de"] = $data["cancellation_conditions"];
                        $email = true;
                    }
                }
                if(isset($data["cancellation_conditions_en"])) 
                {
                    if ($current_vendor["cancellation_conditions_en"] != $data["cancellation_conditions_en"]) 
                    {
                        $updated_content["cancellation_description_en"] = $data["cancellation_conditions_en"];
                        $email = true;
                    }
                }
                if($email) 
                {
                    $template_file = DOCUMENT_ROOT_PATH . 'inc/templates/email/admin_update_user_profile_notification_' . $this->lang . '.php';
                    $banner = $this->model->selectStartImages();
                    $swap_array = [
                        "{VENDOR_ID}" => $current_vendor["id"],
                        "{VENDOR_EMAIL}" => $current_vendor["email"],
                        "{EMAIL_HEADER_IMAGE}" => SITE_URL . '/' . $banner[1011]['image'],
                        "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . '/' . $banner[1012]['image'],
                        "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . '/' . $banner[1014]['image'],
                        "{EMAIL_TWITTER_IMAGE}" => SITE_URL . '/' . $banner[1013]['image'],
                    ];
                    $content_html = "";
                    foreach ($updated_content as $key => $value) {
                        if ($value != NULL) {
                            $key = strtoupper($key);
                            $content_html .= "<br><p style=\"font-size: 14px; line-height: 1.5; word-break: break-word; text-align: justify; mso-line-height-alt: 21px; margin: 0;\">
                            $key:<br><br> $value</p>";
                        }
                    }
                    $swap_array["{UPDATED_CONTENT}"] = $content_html;
                    $message = file_get_contents($template_file);
                    foreach (array_keys($swap_array) as $key) {
                        $message = str_replace($key, $swap_array[$key], $message);
                    }
                    Utils::sendHTMLMail(
                        EMAIL_FROM_SYSTEM,
                        "Updation in User Profile",
                        $message,
                        EMAIL_FROM_SYSTEM
                    );
                }
                $this->model->updateVendor($data);
                Utils::redirect('/' . $this->lang . '/profil/success/');
            }
        } else {
            $data = $this->model->selectVendors($this->user->getUserID());
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        if (!empty($_SESSION['frontend'][$this->module]['upload'])) {
            $this->smarty->assign('files', $_SESSION['frontend'][$this->module]['upload']);
        }
        $data['opt_display_phone'] = Utils::opt01($data['display_phone']);
        $data['opt_country'] = $this->model->optCountry($data['country']);
        $data['opt_facility'] = $data['opt_facility'] = $this->model->optFacility(
            isset($data['facility_json']) ? json_decode($data['facility_json']) : null
        );
        $data['opt_accomodationType'] = $this->model->optAccomodationTypes(
            isset($data['accomodationtype']) ? $data['accomodationtype'] : null
        );
        if (!empty($this->alias[2]) && $this->alias[2] == 'success') {
            $this->smarty->assign('msg', $this->model->getTranslation('profile_saved'));
        }
        $data["file"] = explode("catalog/", $data["file"] ? $data["file"] : $this->model->selectVendors($this->user->getUserID())["file"]);
        $data["file"] = json_decode($data["file"][1], true);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('vendor', $data);
        $this->smarty->assign('pagedata', $pagedata);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function loginInbox()
    {
        if ($this->user->getLogin() === true || $this->user2->getLogin() === true) {
            Utils::redirect('/' . $this->lang . '/inbox/');
        }
        if ($_POST) {
            if ($this->user2->auth(
                $_POST['auth']['email'],
                sha1($_POST['auth']['password'])
            )) { //$this->user->auth($_POST['auth']['email'], sha1($_POST['auth']['password']), isset($_POST['auth']['remember'])) === true ||
                Utils::redirect('/' . $this->lang . '/' . '/inbox/');
            } else {
                $this->smarty->assign('msg', 'Login fehlgeschlagen');
            }
        }
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function loginForm($create_ad_form = false)
    {
        if ($this->user->getLogin() === true) {
            Utils::redirect('/' . $this->lang);
        }
        if ($_POST && isset($_POST['xdata'])) {
            $xdata = &$_POST['xdata'];
            $required = [
                'email' => ['email' => true, 'exists' => $this->model->emailUserExists($xdata['email'])],
                'password' => ['compare' => $xdata['password2'], 'length' => 8],
                'password2' => [],
                'legalCheckbox1' => ['compare' => 'fff'],
            ];
            $error = Utils::validateForm($required, $xdata);
            if ($error) {
                $this->smarty->assign('msg', $error['msg'] . $xdata['legalCheckbox1']);
                $this->smarty->assign('B_msg', true);
                $this->smarty->assign('B_reg_login', true);
            } else {
                unset($xdata['password2']);
                $this->model->insertCustomer($xdata);
                $this->user2->auth($xdata['email'], sha1($xdata['password']));
                $this->smarty->assign('msg', $this->model->getTranslation('reg_customer_done'));
                $this->smarty->assign('B_msg', true);
                $this->smarty->assign('xdata', $xdata);
                if (!empty($_POST['redirect_to'])) {
                    Utils::redirect($_POST['redirect_to']);
                } else {
                    Utils::redirect('/' . $this->lang);
                }
            }
        } elseif ($_POST) {
            if (
                $this->user->auth(
                    $_POST['auth']['email'],
                    sha1($_POST['auth']['password']),
                    isset($_POST['auth']['remember'])
                ) === true
                || $this->user2->auth($_POST['auth']['email'], sha1($_POST['auth']['password']))
            ) {
                if (!empty($_POST['redirect_to'])) {
                    Utils::redirect($_POST['redirect_to']);
                } else {
                    Utils::redirect('/' . $this->lang . '/kategorie/meine/');
                }
            } else {
                $this->smarty->assign('msg', 'Login fehlgeschlagen');
            }
        }
        if ($create_ad_form) {
            $pagedata = $this->model->selectContent('loginx');
        } else {
            $pagedata = $this->model->selectContent($this->alias[1]);
        }
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('pagedata', $pagedata);
        $this->smarty->assign('redirect_to', $this->redirectToAfterLogin);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_loginForm', true);
        $this->smarty->assign('B_text_header', true);
    }
    public function loginFormOffer()
    {
        if ($this->user->getLogin() === true) {
            Utils::redirect('/' . $this->lang);
        }
        if ($_POST) {
            if (
                $this->user->auth(
                    $_POST['auth']['email'],
                    sha1($_POST['auth']['password']),
                    isset($_POST['auth']['remember'])
                ) === true
            ) {
                Utils::redirect('/' . $this->lang);
            } else {
                $this->smarty->assign('msg', 'Login fehlgeschlagen');
            }
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('pagedata', $pagedata);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_loginFormOffer', true);
        $this->smarty->assign('B_text_header', true);
    }
    public function logout()
    {
        $this->user->logout();
        $this->user2->logout();
        Utils::redirect('/' . $this->lang);
    }
    public function passwordForgottenForm()
    {
        if ($_POST) {
            if ($this->model->sendNewPasswordLink($_POST['data']['email'])) {
                $this->smarty->assign('msg', $this->model->getTranslation('lost_pwd_email_sent'));
            } else {
                $this->smarty->assign('msg', $this->model->getTranslation('unknown_email'));
            }
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('pagedata', $pagedata);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function newPassworForm()
    {
        if (!empty($this->alias[2]) && $this->model->isValidPasswordChangeToken($this->alias[2])) {
            if ($_POST) {
                $data = &$this->model->cleanInput($_POST['data']);
                $required = [
                    'password' => ['compare' => $data['password_repeat'], 'length' => 8],
                    'password_repeat' => [],
                ];
                $error = Utils::validateForm($required, $data);
                if ($error) {
                    $this->smarty->assign('msg', $error['msg']);
                    $this->smarty->assign('css', $error['fields']);
                } else {
                    $this->model->updateVendorPassword($data['password'], $this->alias[2]);
                    $this->smarty->assign('hide_form', true);
                    $this->smarty->assign('msg', $this->model->getTranslation('password_changed'));
                }
            } else {
                $fdata = [];
            }
        } else {
            Utils::redirect('/' . $this->lang . '/passwort-vergessen/');
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('pagedata', $pagedata);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function contactForm()
    {
        if ($_POST) {
            $data = &$this->model->cleanInput($_POST['data']);
            $data['captcha'] = '';
            if (isset($_POST['g-recaptcha-response'])) {
                if ($this->model->checkCaptcha($_POST['g-recaptcha-response'])) {
                    $data['captcha'] = true;
                }
            }
            $required = [
                'content' => [],
                'captcha' => ['msg' => 'Wrong Captcha. Please try again.'],
                'name' => [],
                'email' => ['email' => true],
            ];
            $error = Utils::validateForm($required, $data);
            if ($error) {
                $this->smarty->assign('msg', $error['msg']);
                $this->smarty->assign('css', $error['fields']);
            } else {
                $msg = [];
                $msg[] = 'Name: ' . $data['name'];
                $msg[] = 'Email: ' . $data['email'];
                $msg[] = 'Nachricht: ' . $data['content'];
                Utils::sendTextMail(EMAIL_CONTACT_FORM, 'hobidd.com', implode("\n", $msg), EMAIL_FROM_SYSTEM);
                $this->smarty->assign('msg', 'Thank you for your message!');
                $this->smarty->assign('B_success', true);
            }
        } else {
            $data = [];
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('data', $data);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        $this->smarty->assign('B_js_captcha', true);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function contactFormWinner()
    {
        if (empty($this->alias[2])) {
            Utils::redirect('/' . $this->lang);
        }
        $add = $this->model->selectAds('', '', false, false, ['hash' => $this->alias[2]]);
        //print_r($add);
        if (!$add) {
            Utils::redirect('/' . $this->lang);
        }
        if ($_POST) {
            $data = &$this->model->cleanInput($_POST['data']);
            $data['captcha'] = '';
            if (isset($_POST['g-recaptcha-response'])) {
                if ($this->model->checkCaptcha($_POST['g-recaptcha-response'])) {
                    $data['captcha'] = true;
                }
            }
            $required = [
                'content' => [],
                'captcha' => ['msg' => 'Captcha falsch'],
                'name' => [],
                'email' => ['email' => true],
            ];
            $error = Utils::validateForm($required, $data);
            if ($error) {
                $this->smarty->assign('msg', $error['msg']);
                $this->smarty->assign('css', $error['fields']);
            } else {
                $msg = [];
                $msg[] = 'Name: ' . $data['name'];
                $msg[] = 'Email: ' . $data['email'];
                $msg[] = 'Nachricht: ' . $data['content'];
                Utils::sendTextMail(
                    'support@hobidd.com',
                    'hobidd.com - Gewinn einlösen',
                    implode("\n", $msg),
                    EMAIL_FROM_SYSTEM
                );
                $this->smarty->assign('msg', 'Vielen Dank');
                $this->smarty->assign('B_success', true);
            }
        } else {
            $data = [];
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('data', $data);
        $this->smarty->assign('add', $add);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        $this->smarty->assign('B_js_captcha', true);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function reportAbuse()
    {
        if ($_POST) {
            $data = &$this->model->cleanInput($_POST['data']);
            $data['captcha'] = '';
            if (isset($_POST['g-recaptcha-response'])) {
                if ($this->model->checkCaptcha($_POST['g-recaptcha-response'])) {
                    $data['captcha'] = true;
                }
            }
            $required = [
                'content' => [],
                'captcha' => ['msg' => 'Captcha falsch'],
            ];
            $error = Utils::validateForm($required, $data);
            if ($error) {
                $this->smarty->assign('msg', $error['msg']);
                $this->smarty->assign('css', $error['fields']);
            } else {
                $msg = [];
                $msg[] = 'Folgendes Angebot wurde gemeldet:';
                $msg[] = '';
                $msg[] = SITE_URL . '/' . $this->lang . '/artikel/' . $this->alias[2] . '/';
                $msg[] = '';
                $msg[] = 'Nachricht: ' . $data['content'];
                Utils::sendTextMail(
                    'filter@hobidd.com',
                    'hobidd.com - Meldung Angebot',
                    implode("\n", $msg),
                    EMAIL_FROM_SYSTEM
                );
                $this->smarty->assign('msg', 'Vielen Dank');
                $this->smarty->assign('B_success', true);
            }
        } else {
            $data = [];
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('data', $data);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        $this->smarty->assign('B_js_captcha', true);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function createAd($edit = false, $offer = false, $inquiry = false)
    {
        if ($this->user->getLogin() == false) {
            if ($offer) {
                return $this->loginFormOffer(true);
            } else {
                return $this->loginForm(true);
            }
        }
        $user = $this->user->getUserdata();
        $package = $this->model->selectPackage($user['package_id']);
        if ($package['price'] > 0 && $user['package_payed'] == '0') {
            Utils::redirect('/' . $this->lang . '/checkout/');
        }
        if ($package['price_suggestion'] > 0) {
            $this->smarty->assign('B_ad_type', true);
        }
        if ($package['id'] == '1') {
            $this->smarty->assign('duration_readonly', true);
        }
        $this->smarty->assign('max_duration', $package['duration']);
        if (!empty($_SESSION['frontend'][$this->module]['data'])) {
            $edit = true;
        }
        if ($_POST) {
            $data = &$this->model->cleanInput($_POST['data']);
            $data['category'] = isset($_POST['category']) ? $this->model->cleanInput($_POST['category']) : null;
            $error = false;
            if (isset($_POST["files"])) {
                $files = json_decode($_POST["files"]);
                if (count($files) <= 1) {
                    if ($_POST['edit_offer'] == 'edit') {
                    } else {
                        $error = ['fields' => [], 'msg' => $this->model->getTranslation('image_required')];
                    }
                }
            }
            if (!$error) {
                for ($i = 1; $i <= 10; $i++) {
                    if ($_FILES['file' . $i]['name'] || $files) {
                        if (!empty($_SESSION['frontend'][$this->module]['upload']['file' . $i])) {
                            Utils::deleteFile(
                                $_SESSION['frontend'][$this->module]['upload']['file' . $i]['path']
                                . $_SESSION['frontend'][$this->module]['upload']['file' . $i]
                            );
                            Utils::deleteFile(
                                $_SESSION['frontend'][$this->module]['upload']['file' . $i]['path'] . '318x265'
                                . $_SESSION['frontend'][$this->module]['upload']['file' . $i]
                            );
                            Utils::deleteFile(
                                $_SESSION['frontend'][$this->module]['upload']['file' . $i]['path'] . '830x455_'
                                . $_SESSION['frontend'][$this->module]['upload']['file' . $i]
                            );
                            Utils::deleteFile(
                                $_SESSION['frontend'][$this->module]['upload']['file' . $i]['path'] . '150x150_'
                                . $_SESSION['frontend'][$this->module]['upload']['file' . $i]
                            );
                            Utils::deleteFile(
                                $_SESSION['frontend'][$this->module]['upload']['file' . $i]['path'] . '639x530_'
                                . $_SESSION['frontend'][$this->module]['upload']['file' . $i]
                            );
                            Utils::deleteFile(
                                $_SESSION['frontend'][$this->module]['upload']['file' . $i]['path'] . '338x342_'
                                . $_SESSION['frontend'][$this->module]['upload']['file' . $i]
                            );
                            $_SESSION['frontend'][$this->module]['upload']['file' . $i] = [];
                        }
                        $path = DOCUMENT_ROOT_PATH . UPLOAD_PATH_AD;
                        $file = $files ? $files[$i] : md5($_FILES['file' . $i]['tmp_name']) . '.' . Utils::filenameToExtension(
                                $_FILES['file' . $i]['name']
                            );
                        if ($files ? false : $error = Utils::uploadFile(
                            $_FILES['file' . $i],
                            $path . $file,
                            ['jpg', 'jpeg', 'png'],
                            [],
                            UPLOAD_MAX_FILESIZE_AD
                        )
                        ) {
                            $error = [
                                'fields' => ['file' . $i],
                                'msg' => $error,
                            ];
                        } else {
                            if (!Image::crop($path . $file, $path . '318x265_' . $file, 318, 265) && !$files) {
                                $error = [
                                    'fields' => ['file' . $i],
                                    'msg' => 'Fehler beim erstellen des Vorschaubildes',
                                ];
                            } elseif (!Image::crop($path . $file, $path . '830x455_' . $file, 830, 455) && !$files) {
                                $error = [
                                    'fields' => ['file' . $i],
                                    'msg' => 'Fehler beim erstellen des Vorschaubildes',
                                ];
                            } elseif (!Image::crop($path . $file, $path . '150x150_' . $file, 150, 150) && !$files) {
                                $error = [
                                    'fields' => ['file' . $i],
                                    'msg' => 'Fehler beim erstellen des Vorschaubildes',
                                ];
                            } elseif (!Image::crop($path . $file, $path . '639x530_' . $file, 639, 530) && !$files) {
                                $error = [
                                    'fields' => ['file' . $i],
                                    'msg' => 'Fehler beim erstellen des Vorschaubildes',
                                ];
                            } elseif (!Image::crop($path . $file, $path . '338x342_' . $file, 338, 342) && !$files) {
                                $error = [
                                    'fields' => ['file' . $i],
                                    'msg' => 'Fehler beim erstellen des Vorschaubildes',
                                ];
                            } elseif (!Image::crop($path . $file, $path . '698x342_' . $file, 698, 342) && !$files) {
                                $error = [
                                    'fields' => ['file' . $i],
                                    'msg' => 'Fehler beim erstellen des Vorschaubildes',
                                ];
                            } elseif (!Image::crop($path . $file, $path . '700x468_' . $file, 700, 468) && !$files) {
                                $error = [
                                    'fields' => ['file' . $i],
                                    'msg' => 'Fehler beim erstellen des Vorschaubildes',
                                ];
                            } elseif (!Image::crop($path . $file, $path . '340x340_' . $file, 340, 340) && !$files) {
                                $error = [
                                    'fields' => ['file' . $i],
                                    'msg' => 'Fehler beim erstellen des Vorschaubildes',
                                ];
                            } else {
                                $_SESSION['frontend'][$this->module]['upload']['file' . $i] = [
                                    'path' => $path,
                                    'file' => $file,
                                    'name' => $files ? $file : $_FILES['file' . $i]['name'],
                                ];
                            }
                        }
                    }
                }
            }
            if (!$error) {
                $required = [
                    'category' => [],
                    'title' => [],
                    $this->lang == 'en' ? 'contenten' : 'content' => [],
                    'value' => [],
                ];
                $error = Utils::validateForm($required, $data);
            }
            if ($_POST['edit_offer'] == 'edit') {
            } else {
                if (!$error) {
                    if (empty($_SESSION['frontend'][$this->module]['upload'])) {
                        $error = ['fields' => [], 'msg' => $this->model->getTranslation('image_upload_error')];
                    }
                }
            }
            if (!$error) {
                if ((bool)strtotime($data['duration_date'])) {
                    $now = time();
                    $durationDate = strtotime($data['duration_date']);
                    $durationDays = round(($durationDate - $now) / (60 * 60 * 24));
                    if ($durationDays < 1 || $durationDays > $package['duration']) {
                        $error = [
                            'fields' => [],
                            'msg' => $this->model->getTranslation('ad_duration_error') . ' ' . $package['duration'] . '.',
                        ];
                    }
                }
            }
            if ($error) {
                $this->smarty->assign('css', $error['fields']);
                $this->smarty->assign('msg', $error['msg']);
                if ($_POST['edit_offer'] == 'edit' || $_POST['edit_offer'] == 'advertise_offer') {
                    $data = $this->model->selectAds('', $_POST['offer_id']);
                }
            } else {
                for ($i = 1; $i <= 10; $i++) {
                    $f = [];
                    if (!empty($_SESSION['frontend'][$this->module]['upload']['file' . $i])) {
                        $f[] = $_SESSION['frontend'][$this->module]['upload']['file' . $i]['file'];
                    }
                    $cnt = 1;
                    foreach ($f as $key => $val) {
                        $data['file' . $i] = $val;
                        $cnt++;
                    }
                }
                $duration = $package['duration'];
                //vendor can set custom duration
                if ($package['id'] > 1) {
                    if ((bool)strtotime($data['duration_date'])) {
                        $now = time();
                        $durationDate = strtotime($data['duration_date']);
                        $durationDays = round(($durationDate - $now) / (60 * 60 * 24));
                        if ($durationDays > 0 && $durationDays <= $duration) {
                            $duration = $durationDays;
                        }
                    }
                }
                if ($data['type'] == 'raffle') {
                    $duration = 30;
                }
                $data['duration'] = $duration;
                $data['active'] = '1';
                $data['valid_to'] = mktime(23, 59, 59, date('m'), date('d'), date('Y')) + 60 * 60 * 24 * $duration;
                $data['cdate'] = time();
                $data['vendor_id'] = $this->user->getUserID();
                $data['category'] = $_POST['category'];
                $_SESSION['frontend'][$this->module]['data'] = $data;
                if ($_POST['edit_offer'] == 'edit') {
                    $this->updateAd(false, false, $_POST['offer_id']);
                    Utils::redirect('/' . $this->lang . '/artikel/' . $_POST['offer_id'] . '/');
                } else {
                    if ($offer) {
                        Utils::redirect('/' . $this->lang . '/inserat-angebot-vorschau/');
                    } elseif ($inquiry) {
                        Utils::redirect('/' . $this->lang . '/inserat-anfrage-vorschau/' . $this->alias[2] . '/');
                    } else {
                        Utils::redirect('/' . $this->lang . '/inserat-vorschau/');
                    }
                }
            }
        } else {
            if ($edit) {
                if (isset($_GET) && isset($_GET['id']) && !is_null($_GET['id'])) {
                    $data = $this->model->selectAds('', $_GET['id']);
                    $data['offer_id'] = (int)str_replace('/', '', $_GET['id']);
                } elseif (isset($_GET) && isset($_GET['advertise_id']) && !is_null($_GET['advertise_id'])) {
                    $data = $this->model->selectAds('', $_GET['advertise_id']);
                } else {
                    $data = $_SESSION['frontend'][$this->module]['data'];
                }
            } else {
                if (isset($_GET) && isset($_GET['id']) && !is_null($_GET['id'])) {
                    $data = $this->model->selectAds('', $_GET['id']);
                    $data['offer_id'] = (int)str_replace('/', '', $_GET['id']);
                } elseif (isset($_GET) && isset($_GET['advertise_id']) && !is_null($_GET['advertise_id'])) {
                    $data = $this->model->selectAds('', $_GET['advertise_id']);
                } else {
                    $data = $_SESSION['frontend'][$this->module]['data'];
                }
                $data['category_id'] = '';
                $data['category_id2'] = '';
                $data['duration'] = $package['duration'];
                $data['type'] = '';
            }
        }
        $_x = false;
        if ($package['sell_offer_limit'] > 0) {
            $_x = true;
        }
        $data['opt_type'] = $this->model->optAdType(isset($data['type']) ? $data['type'] : null, $_x);
        $data['opt_country'] = $this->model->optCountry(isset($data['country']) ? $data['country'] : null);
        $data['opt_accomodationType'] = $this->model->optAccomodationTypes(
            isset($data['accomodationtype']) ? $data['accomodationtype'] : isset($this->user->getUserdata()['accomodationtype']) ? $this->user->getUserdata()['accomodationtype'] : null
        );
        $data['opt_category'] = $this->model->optCategory(isset($data['category_json']) ? json_decode($data['category_json'], true) : null);
        if (isset($_GET) && isset($_GET['id']) && !is_null($_GET['id'])) {
            $pagedata = $this->model->selectContent($this->alias[1] . '?id=');
        } else {
            $pagedata = $this->model->selectContent($this->alias[1]);
        };
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        if (!empty($_SESSION['frontend'][$this->module]['upload'])) {
            $this->smarty->assign('files', $_SESSION['frontend'][$this->module]['upload']);
        }
        if (empty($data['duration_date']) || !(bool)strtotime($data['duration_date'])) {
            $data['duration_date'] = date('Y-m-d', strtotime('+' . $package['duration'] . ' day'));
        }
        $this->smarty->assign('files_images', "[" . $data['file1'] . "," . $data['file2'] . "," . $data['file3'] . "," . $data['file4'] . "," . $data['file5'] . "," . $data['file6'] . "," . $data['file7'] . "," . $data['file8'] . "," . $data['file9'] . "," . $data['file10'] . "]");
        $this->smarty->assign('data', $data);
        $vendor_data = $this->model->selectVendors($this->user->getUserID());
        $vendor_data["file"] = explode("catalog/", $vendor_data["file"]);
        $vendor_data["file"] = json_decode($vendor_data["file"][1]);
        $this->smarty->assign('vendor', $vendor_data);
        $pagedataSelector = 'inserat-erstellen';
        if ($offer) {
            $pagedataSelector = 'inserat-angebot-erstellen';
        } elseif ($inquiry) {
            $pagedataSelector = 'inserat-anfrage-erstellen';
        }
        if (isset($_GET) && isset($_GET['id']) && !is_null($_GET['id'])) {
            $this->smarty->assign(
                'pagedata',
                $pagedata
            );
        } else {
            $this->smarty->assign(
                'pagedata',
                $this->model->selectContent($pagedataSelector)
            );
        }
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function createAdOffer()
    {
        $this->createAd(false, true);
    }
    public function editAd()
    {
        $this->createAd(true);
    }
    public function editAdOffer()
    {
        $this->createAd(true, true);
    }
    public function previewAd($offer = false, $inquiry = false)
    {
        $data = $_SESSION['frontend'][$this->module]['data'];
        for ($i = 1; $i <= 10; $i++) {
            $data['file' . $i . '_340'] = '/' . UPLOAD_PATH_AD . '340x340_' . (isset($data['file' . $i]) ? $data['file' . $i] : null);
            $data['file' . $i . '_700'] = '/' . UPLOAD_PATH_AD . '700x468_' . (isset($data['file' . $i]) ? $data['file' . $i] : null);
        }
        //$category = $this->model->selectCategories($data['category_id']);
        $opt_category = $this->model->textlistCategory($data['category'], " | ");
        $vendor = $this->model->selectVendors($data['vendor_id']);
        $this->smarty->assign('date_from_year', substr($data['date_from'], 0, 4));
        $this->smarty->assign('date_from_month', substr($data['date_from'], 5, 2));
        $this->smarty->assign('date_from_day', substr($data['date_from'], 8, 2));
        $this->smarty->assign('date_until_year', substr($data['date_until'], 0, 4));
        $this->smarty->assign('date_until_month', substr($data['date_until'], 5, 2));
        $this->smarty->assign('date_until_day', substr($data['date_until'], 8, 2));
        if ($inquiry) {
            $this->smarty->assign('inquiry_id', $this->alias[2]);
        }
        $this->smarty->assign('data', $data);
        $this->smarty->assign('opt_category', $opt_category);
        $this->smarty->assign('vendor', $vendor);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_offer', $offer);
        $this->smarty->assign('B_inquiry', $inquiry);
        $this->smarty->assign('B_text_header', true);
    }
    public function previewAdInquiry()
    {
        $this->previewAd(false, true);
    }
    public function previewAdOffer()
    {
        $this->previewAd(true);
    }
    public function storeAd($offer = false, $inquiry = false)
    {
        if ($_POST) {
            if (isset($_POST['data']['terms'])) {
                $blacklist = $this->model->selectKeywordList();
                //print_r($blacklist);
                $content = $_SESSION['frontend'][$this->module]['data']['content'];
                $tmp = explode("\n", strtolower($content));
                $keywords = [];
                foreach ($tmp as $key => $val) {
                    $tmp2 = explode(" ", $val);
                    $keywords = array_merge($keywords, $tmp2);
                }
                //print_r($keywords);
                $found = [];
                foreach ($keywords as $key => $val) {
                    if (isset($blacklist[trim($val)])) {
                        $found[] = $val;
                    }
                }
                if ($found) {
                    $_SESSION['frontend'][$this->module]['data']['active'] = '0';
                } else {
                    $_SESSION['frontend'][$this->module]['data']['active'] = '1';
                }
                if (
                    $_SESSION['frontend'][$this->module]['data']['postalcode']
                    && $_SESSION['frontend'][$this->module]['data']['location']
                ) {
                    $coordinates = $this->model->addressToCoordinates(
                        $_SESSION['frontend'][$this->module]['data']['street'],
                        $_SESSION['frontend'][$this->module]['data']['postalcode'],
                        $_SESSION['frontend'][$this->module]['data']['location']
                    );
                    $_SESSION['frontend'][$this->module]['data']['longitude'] = $coordinates['longitude'];
                    $_SESSION['frontend'][$this->module]['data']['latitude'] = $coordinates['latitude'];
                }
                if ($offer) {
                    $_SESSION['frontend'][$this->module]['data']['active'] = '0';
                    $_SESSION['frontend'][$this->module]['data']['is_offer'] = '1';
                }
                $_t = $_SESSION['frontend'][$this->module]['data'];
                if (empty($_t['type'])) {
                    $_t['type'] = 'raffle';
                }
                $_t['category_JSON'] = json_encode($_t['category']);
                //                $_t['is_private']    = $inquiry && isset($_POST['action']) && $_POST['action'] === 'private';
                $_t['is_private'] = isset($_POST['action']) && $_POST['action'] === 'private';
                unset($_t['duration'], $_t['duration_date'], $_t['category']);
                $_id = $this->model->insertAd($_t);
                if ($inquiry) 
                {
                    $inquiryData = $this->model->selectInquiry($this->alias[2]);
                    $biddData = [
                        'ad_id' => $_id,
                        'customer_id' => $inquiryData['customer_id'],
                        'value' => $_t['value'],
                        'accepted' => 1,
                        'cdate' => time() + 1,
                    ];
                    $this->model->insertBidd($biddData);
                    $inboxData = [
                        'ad_id' => $_id,
                        'customer_id' => $inquiryData['customer_id'],
                        'vendor_id' => $_t['vendor_id'],
                        'value' => $_t['value'],
                        'sender' => 'c',
                        'accepted_v' => 0,
                        'accepted_c' => 0,
                        'cdate' => time() + 1,
                    ];
                    $this->model->insertInbox($inboxData);
                    $inboxData = [
                        'ad_id' => $_id,
                        'customer_id' => $inquiryData['customer_id'],
                        'vendor_id' => $_t['vendor_id'],
                        'value' => $_t['value'],
                        'sender' => 'v',
                        'accepted_v' => 0,
                        'accepted_c' => 0,
                        'cdate' => time() + 2,
                    ];
                    $this->model->insertInbox($inboxData);
                    $template_file = DOCUMENT_ROOT_PATH . '/inc/templates/email/customer_get_inquiry_' . $this->lang . '.php';
                    $swap_array = [
                        "{OFFER_NAME}" => $_t['title'],
                        "{OFFERLINK}" => SITE_URL . "/" . $this->lang . '/artikel/' . $_id,
                        "{OFFERED_PRICE}" => number_format($_t['value'], 2, ",", "."),
                        "{EMAIL_HEADER_IMAGE}" => SITE_URL . "/" . $this->banner[1011]['image'],
                        "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . "/" . $this->banner[1012]['image'],
                        "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . "/" . $this->banner[1014]['image'],
                        "{EMAIL_TWITTER_IMAGE}" => SITE_URL . "/" . $this->banner[1013]['image'],
                    ];
                    $message = file_get_contents($template_file);
                    foreach (array_keys($swap_array) as $key) {
                        $message = str_replace($key, $swap_array[$key], $message);
                    }
                    $customerEmail = $this->model->getCustomerEmail($inquiryData['customer_id']);
                    if ($customerEmail) {
                        Utils::sendHTMLMail(
                            $customerEmail,
                            'hobidd.com Anfrage',
                            $message,
                            EMAIL_FROM_SYSTEM
                        );
                    }
                }
                if ($found) {
                    $msg = [];
                    $msg[] = 'Anzeige wurde erstellt, folgende gesperrte Keywords wurden gefunden:';
                    $msg[] = implode(" ", $found);
                    $msg[] = '';
                    $msg[] = SITE_URL . '/' . $this->lang . '/artikel/' . $_id . '/';
                    Utils::sendTextMail(
                        'filter@hobidd.com',
                        'hobidd neues Angebot - Keywords gefunden',
                        implode("\n", $msg),
                        EMAIL_FROM_SYSTEM,
                        '',
                        'pw@sevenspire.com'
                    );
                }
                if (!$offer) {
                    if ($_SESSION['frontend'][$this->module]['data']['active'] == '0') {
                        $msg = $this->model->getTranslation('text_freischaltung');
                        Utils::sendTextMail(
                            $this->user->getUserdata('email'),
                            'hobidd.com Angebot',
                            $msg,
                            EMAIL_FROM_SYSTEM
                        );
                    }
                }
                $msg = [];
                $msg[] = 'Eine neues Angebot wurde erstellt:';
                $msg[] = '';
                $msg[] = SITE_URL . '/' . $this->lang . '/artikel/' . $_id . '/';
                Utils::sendTextMail(
                    'new@hobidd.com',
                    'hobidd neues Angebot wurde erstellt',
                    implode("\n", $msg),
                    EMAIL_FROM_SYSTEM
                );
                $_SESSION['frontend'][$this->module]['data'] = '';
                $_SESSION['frontend'][$this->module]['upload'] = '';
                if ($offer) {
                    Utils::redirect('/' . $this->lang . '/inserat-angebot-erstellt/');
                } else {
                    Utils::redirect('/' . $this->lang . '/inserat-erstellt/');
                }
            } else {
                $this->smarty->assign('msg', $this->model->getTranslation('agb_akzeptieren'));
                $data = $this->model->selectContent($this->alias[1]);
                $this->smarty->assign('data', $data);
                $this->smarty->assign('B_' . $this->state, true);
                $this->smarty->assign('B_text_header', true);
            }
        } else {
            $data = $this->model->selectContent($this->alias[1]);
            $this->smarty->assign('data', $data);
            $this->smarty->assign('B_' . $this->state, true);
            $this->smarty->assign('B_text_header', true);
        }
        if ($inquiry) {
            $this->smarty->assign('inquiry_id', $this->alias[2]);
        }
        $this->smarty->assign('B_offer', $offer);
        $this->smarty->assign('B_inquiry', $inquiry);
    }
    public function storeAdOffer()
    {
        $this->storeAd(true);
    }
    public function updateAd($offer = false, $inquiry = false, $id)
    {
        if ($_POST) {
            $existing_ads = $this->model->selectSingleAds(str_replace('/','',$id));
            $email = false;
            $current_contenten = isset($_SESSION['frontend']['page']['data']['contenten']) ? $_SESSION['frontend']['page']['data']['contenten']:'';
            if(!$current_contenten)
            {
                $current_contenten = isset($_SESSION['frontend']['page']['data']['content']) ? $_SESSION['frontend']['page']['data']['content']:'';
                if(isset($existing_ads['content']) && $existing_ads['content']!= $current_contenten)
                {
                    $updated_content["DESCRIPTION_HOUSE_DE"] = $current_contenten;
                    $email = true;
                }
            }
            else
            {
                if(isset($existing_ads['contenten']) && $existing_ads['contenten']!= $current_contenten)
                {
                    $updated_content["DESCRIPTION_HOUSE_EN"] = $current_contenten;
                    $email = true;
                }
            }
            $current_priceinfo = isset($_SESSION['frontend']['page']['data']['priceinfo']) ? $_SESSION['frontend']['page']['data']['priceinfo']:'';
            if($current_priceinfo)
            {
                if(isset($existing_ads['priceinfo']) && $existing_ads['priceinfo']!= $current_priceinfo)
                {
                    $updated_content["Special_offer_DE"] = $current_priceinfo;
                    $email = true;
                }
            }
            $current_priceinfo = isset($_SESSION['frontend']['page']['data']['priceinfoen']) ? $_SESSION['frontend']['page']['data']['priceinfoen']:'';
            if($current_priceinfo)
            {
                if(isset($existing_ads['priceinfoen']) && $existing_ads['priceinfoen']!= $current_priceinfo)
                {
                    $updated_content["Special_offer_EN"] = $current_priceinfo;
                    $email = true;
                }
            }
            $vendor_id = isset($_SESSION['frontend']['auth']['user_id']) ? $_SESSION['frontend']['auth']['user_id']:'';
            $blacklist = $this->model->selectKeywordList();
            //print_r($blacklist);
            $current_vendor = $this->model->selectVendors($vendor_id);
            $content = $_SESSION['frontend'][$this->module]['data']['content'];
            $tmp = explode("\n", strtolower($content));
            $keywords = [];
            foreach ($tmp as $key => $val) {
                $tmp2 = explode(" ", $val);
                $keywords = array_merge($keywords, $tmp2);
            }
            //print_r($keywords);
            $found = [];
            foreach ($keywords as $key => $val) {
                if (isset($blacklist[trim($val)])) {
                    $found[] = $val;
                }
            }
            if ($found) {
                $_SESSION['frontend'][$this->module]['data']['active'] = '0';
            } else {
                $_SESSION['frontend'][$this->module]['data']['active'] = '1';
            }
            if (
                $_SESSION['frontend'][$this->module]['data']['postalcode']
                && $_SESSION['frontend'][$this->module]['data']['location']
            ) {
                $coordinates = $this->model->addressToCoordinates(
                    $_SESSION['frontend'][$this->module]['data']['street'],
                    $_SESSION['frontend'][$this->module]['data']['postalcode'],
                    $_SESSION['frontend'][$this->module]['data']['location']
                );
                $_SESSION['frontend'][$this->module]['data']['longitude'] = $coordinates['longitude'];
                $_SESSION['frontend'][$this->module]['data']['latitude'] = $coordinates['latitude'];
            }
            if ($offer) {
                $_SESSION['frontend'][$this->module]['data']['active'] = '0';
                $_SESSION['frontend'][$this->module]['data']['is_offer'] = '1';
            }
            $_t = $_SESSION['frontend'][$this->module]['data'];
            if (empty($_t['type'])) {
                $_t['type'] = 'raffle';
            }
            $_t['category_JSON'] = json_encode($_t['category']);
            $_t['is_private'] = $inquiry && isset($_POST['action']) && $_POST['action'] === 'private';
            unset($_t['duration'], $_t['duration_date'], $_t['category']);
            $_id = $this->model->updateAD($_t, $id);
            $msg = [];
            $msg[] = 'Eine neues Angebot wurde erstellt:';
            $msg[] = '';
            $msg[] = SITE_URL . '/' . $this->lang . '/artikel/' . $id . '/';
            $_SESSION['frontend'][$this->module]['data'] = '';
            $_SESSION['frontend'][$this->module]['upload'] = '';
            if($email) 
            {
                $template_file = DOCUMENT_ROOT_PATH . 'inc/templates/email/admin_update_user_profile_notification_' . $this->lang . '.php';
                $banner = $this->model->selectStartImages();
                $swap_array = [
                    "{VENDOR_ID}" => $current_vendor["id"],
                    "{VENDOR_EMAIL}" => $current_vendor["email"],
                    "{EMAIL_HEADER_IMAGE}" => SITE_URL . '/' . $banner[1011]['image'],
                    "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . '/' . $banner[1012]['image'],
                    "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . '/' . $banner[1014]['image'],
                    "{EMAIL_TWITTER_IMAGE}" => SITE_URL . '/' . $banner[1013]['image'],
                ];
                $content_html = "";
                foreach ($updated_content as $key => $value) 
                {
                    if ($value != NULL) 
                    {
                        $key = strtoupper($key);
                        $content_html .= "<br><p style=\"font-size: 14px; line-height: 1.5; word-break: break-word; text-align: justify; mso-line-height-alt: 21px; margin: 0;\">
                        $key:<br><br> $value</p>";
                    }
                }
                $swap_array["{UPDATED_CONTENT}"] = $content_html;
                $message = file_get_contents($template_file);
                foreach (array_keys($swap_array) as $key) {
                    $message = str_replace($key, $swap_array[$key], $message);
                }
                Utils::sendHTMLMail(
                    EMAIL_FROM_SYSTEM,
                    "Updation in User Profile",
                    $message,
                    EMAIL_FROM_SYSTEM
                );
            }
            Utils::redirect('/' . $this->lang . '/artikel/' . $id . '/');
        } else {
            $data = $this->model->selectContent($this->alias[1]);
            $this->smarty->assign('data', $data);
            $this->smarty->assign('B_' . $this->state, true);
            $this->smarty->assign('B_text_header', true);
        }
        if ($inquiry) {
            $this->smarty->assign('inquiry_id', $this->alias[2]);
        }
        $this->smarty->assign('B_offer', $offer);
        $this->smarty->assign('B_inquiry', $inquiry);
    }
    public function storeAdInquiry()
    {
        $this->storeAd(false, true);
    }
    public function cancelAd()
    {
        $_SESSION['frontend'][$this->module]['data'] = [];
        Utils::redirect('/' . $this->lang . '/');
    }
    public function deletePhoto()
    {
        $nr = intval($this->alias[2]);
        $_SESSION['frontend'][$this->module]['upload']['file' . $nr] = [];
        Utils::redirect('/' . $this->lang . '/inserat-erstellen/');
    }
    public function deleteBidd()
    {
        $data = $this->model->selectAds('', $this->alias[2]);
        if ($data) {
            $biddOverview = $this->model->selectBiddOverview(null, $this->user2->getUserID(), $this->alias[2]);
            $deletable = !empty($biddOverview) && isset($biddOverview['c_deletable'])
                && $biddOverview['c_deletable'];
            if ($deletable) {
                $inboxEntries = $this->model->selectInbox('', $this->user2->getUserID(), '', $this->alias[2]);
                $biddEntries = $this->model->selectBidd($this->user2->getUserID(), '', $this->alias[2]);
                foreach ($biddEntries as $biddEntry) {
                    $this->model->deleteBidd($biddEntry['id']);
                }
                foreach ($inboxEntries as $inboxEntry) {
                    $this->model->deleteInbox($inboxEntry['inbox_id']);
                }
            }
        }
        Utils::redirect('/' . $this->lang . '/bidds/');
    }
    public function deleteAd()
    {
        $data = $this->model->selectAds('', $this->alias[2]);
        if ($data) {
            if ($data['vendor_id'] == $this->user->getUserID() && $data['type'] == 'offer') {
                $this->model->deleteAd($this->alias[2]);
            }
        }
        Utils::redirect('/' . $this->lang . '/kategorie/meine/');
    }
    public function deleteLogo()
    {
        $data['id'] = $this->user->getUserID();
        $data['file'] = '';
        $this->model->updateVendor($data);
    }
    public function deletePhotoFromGallery()
    {
        $files = $this->model->selectVendors($this->user->getUserID())["file"];
        $files = json_decode(explode("catalog/", $files)[1], true);
        foreach ($files as $key => $value) {
            if ($value["file"] . '/' == $_GET["photo"]) {
                unset($files[$key]);
            }
        }
        $data['id'] = $this->user->getUserID();
        $data['file'] = json_encode($files);
        $this->model->updateVendor($data);
    }
    public function pageNotFound()
    {
        header('HTTP/1.0 404 Not Found');
        header('Status: 404 Not Found');
        $this->crumbs[] = [
            'name' => '404',
            'link' => '/',
        ];
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('B_' . $this->state, true);
    }
    public function ajaxGetContent()
    {
        $data = $this->model->selectContent('', $this->alias[2]);
        if ($this->alias[2] == '9') {
            $this->alias[1] = 'kontakt';
            $this->state = 'contactForm';
            $this->contactForm();
        } else {
            print '<div id="content-container">';
            print $data['content'];
            print "</div>";
            exit;
        }
    }
    public function ajaxIsEuCountry()
    {
        if ($this->model->isEuCountry($this->alias[2])) {
            print 'true';
        } else {
            print 'false';
        }
        exit;
    }
    public function geldVerdienen()
    {
        if ($_POST) {
            $data = &$this->model->cleanInput($_POST['data']);
            $data['captcha'] = '';
            if (isset($_POST['g-recaptcha-response'])) {
                if ($this->model->checkCaptcha($_POST['g-recaptcha-response'])) {
                    $data['captcha'] = true;
                }
            }
            $required = [
                'captcha' => ['msg' => 'Wrong Captcha. Please try again.'],
                'email' => ['email' => true],
            ];
            $error = Utils::validateForm($required, $data);
            if ($error) {
                $this->smarty->assign('msg', $error['msg']);
                $this->smarty->assign('css', $error['fields']);
            } else {
                $msg = [];
                $msg[] = 'Email: ' . $data['email'];
//                verify@hobidd.com
//                EMAIL_CONTACT_FORM
                Utils::sendTextMail('verify@hobidd.com', 'hobidd.com', implode("\n", $msg), EMAIL_FROM_SYSTEM);
                $this->smarty->assign('msg', 'Thank you for your message!');
                $this->smarty->assign('B_success', true);
            }
        } else {
            $data = [];
        }
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('data', $data);
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        $this->smarty->assign('B_js_captcha', true);
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
    public function searchHelp()
    {
        $pagedata = $this->model->selectContent($this->alias[1]);
        $this->crumbs[] = [
            'name' => $pagedata['title'],
            'link' => '/' . $pagedata['alias'] . '/',
        ];
        $this->smarty->assign('crumbs', $this->crumbs);
        $this->smarty->assign('pagedata', $this->model->selectContent($this->alias[1]));
        $this->smarty->assign('B_' . $this->state, true);
        $this->smarty->assign('B_text_header', true);
    }
}
