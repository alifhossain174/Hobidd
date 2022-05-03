<?php

define('DOCKER', isset($_SERVER['DOCKER']) && ($_SERVER['DOCKER'] === 'true' || $_SERVER['DOCKER'] === true));
define('DEBUG', ($_SERVER['REMOTE_ADDR'] === '127.0.0.1' || PHP_SAPI === 'cli' || DOCKER ? true : false));

define('ROOT_PATH', DOCKER ? '/var/www/html/' : '/var/www/dev8.hobidd.com/');
define('DOCUMENT_ROOT_PATH', DOCKER ? ROOT_PATH . 'public/' : ROOT_PATH . 'web/');
define('SITE_URL', (DOCKER ? 'http' : 'https') . '://' . $_SERVER['HTTP_HOST']);

header('Content-Type: text/html; charset=utf-8');

if (DEBUG === true) {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
    ini_set('display_errors', 'On');
} else {
    error_reporting(0);
    ini_set('display_errors', 'Off');
}

date_default_timezone_set('Europe/Vienna');

ini_set('include_path', DOCUMENT_ROOT_PATH . 'core/libs');

require_once 'libs/PEAR.php';
require_once 'libs/MDB2.php';
require_once 'libs/Smarty/Smarty.class.php';
require_once 'autoload.inc.php';
require_once 'smarty_modifier.inc.php';

define('LOG_ERRORS', true);
define('ERROR_LOGFILE', DOCUMENT_ROOT_PATH . 'core/logs/error.log');

define('FB_APP_ID', '944325375604618');
define('FB_APP_SECRET', '2ae6045d43401da6da86e008b08c2d76');

define('UPLOAD_MAX_FILESIZE_AD', 1024 * 1024 * 5);
define('UPLOAD_PATH_AD', 'img/catalog/');

define('UPLOAD_MAX_FILESIZE_VIDEO', 1024 * 1024 * 100);
define('UPLOAD_PATH_VIDEO', 'img/video/');

define('CRYPT_HASH', 'xt315fSDsVA4hBS8XcX');
define('PASSWORD_LENGTH_MIN', 10);

define('EMAIL_FROM_SYSTEM', 'office@hobidd.com');
define('EMAIL_CONTACT_FORM', 'office@hobidd.com');

// DOCKER ? 'mysql://root:r33t@db/c30dev8?new_link=true'
// : 'mysql://c30dev8:Niyu729U?@localhost/c30dev8?new_link=true'
define(
    'DSN',
    DOCKER ? 'mysql://root:r33t@db/c1261dev4?new_link=true'
        : 'mysql://c30dev8:NEWiyUi278+!@localhost/c30dev8?new_link=true'
);

define('SESSION_USE_DB', false);
define('SESSION_MAXLIFETIME', (60 * 60 * 24 * 7));

define('TBL_USER', 'user');
define('TBL_USER_AUTH_LOG', 'user_auth_log');

define('TBL_CATEGORY', 'category');
define('TBL_FACILITY', 'facility');
define('TBL_PROVISION', 'provision');
define('TBL_COUNTRY', 'country');
define('TBL_VENDOR', 'vendor');
define('TBL_AD', 'ad');
define('TBL_AD_DESIRED_DATE', 'ad_desired_date');
define('TBL_INQUIRY', 'inquiry');
define('TBL_CONTENT', 'content');
define('TBL_START_IMAGE', 'start_image');
define('TBL_KEYWORD', 'keyword');

define('TBL_TRANSLATION', 'translation');

define('TBL_VIDEO', 'video');

define('TBL_CUSTOMER', 'customer');
define('TBL_AD_BIDD', 'ad_bidd');
define('TBL_INBOX', 'inbox');

define('TBL_PACKAGE', 'package');

define('VIEW_INBOX_BIDD_OVERVIEW', 'view_inbox_bidd_overview');
define('VIEW_VENDOR_AD_MESSAGE_COUNT', 'view_vendor_ad_message_count');


define('SMARTY_TEMPLATE_DIR', './inc/views/');
define('SMARTY_COMPILE_DIR', DOCUMENT_ROOT_PATH . 'smarty/templates_c/');
define('SMARTY_CONFIG_DIR', DOCUMENT_ROOT_PATH . 'smarty/configs/');
define('SMARTY_CACHE_DIR', DOCUMENT_ROOT_PATH . 'smarty/cache/');
define('SMARTY_FORCE_COMPILE', false);
define('SMARTY_ERROR_REPORTING', E_ERROR);
define('SMARTY_DEBUGGING', false);
define('SMARTY_ALLOW_PHP_TEMPLATES', false);
define('SMARTY_CACHING', false);
define('SMARTY_CACHE_LIFETIME', 120);

define('G_RECAPTCHA', '6Ld2phMTAAAAAKbtys9p8N0I7NsLLOqiJ8Y-IoFy');
