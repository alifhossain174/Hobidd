<?php

	class Core
	{
		private static $_db = null;
		private static $_smarty = null;
		private static $_instances = 0;
				
		public function __construct()
		{		
			self::_init();
		}
	
		private static final function _init()
		{
			if (self::$_instances === 0) {
				if (get_magic_quotes_gpc()) {
					$_POST = Utils::stripslashes($_POST);	
					$_GET = Utils::stripslashes($_GET);
					$_COOKIE = Utils::stripslashes($_COOKIE);
				}
				
				if (function_exists('set_magic_quotes_runtime')) {
					set_magic_quotes_runtime(0);
				}
				
				if (ini_get('register_globals')) {
					Utils::unregisterGlobals('_POST', '_GET', '_COOKIE', '_SESSION', '_REQUEST', '_SERVER', '_ENV', '_FILES');
				}

				mb_internal_encoding('UTF-8');
				
				if (DEBUG === true) {
					set_error_handler('Core::errorHandler');
				}
				
				self::_initPEAR();
				self::_initDB();
				self::_initSession();
				self::_initSmarty();
			}
			
			self::$_instances++;
		}
		
		private static final function _initPEAR()
		{
			function handle_pear_error($error_obj)
			{
				if (get_class($error_obj) == 'MDB2_Error') {
					print "Datenbank Fehler:\n<br>";
				} else {
					print "sonstiger Fehler:\n<br>";
				}

				if (DEBUG === true) {
					print "\n<br>Function: " . Core::functionBacktrace(8);
					print "\n<br>" . $error_obj->getMessage() . "\n<br>" . $error_obj->getDebugInfo();
				}
				
				if (LOG_ERRORS === true) {
					$log = "\nDatabase Error";
					$log .= "\nFunction: " . Core::functionBacktrace(8);
					$log .= "\n" . $error_obj->getMessage() . "\n" . $error_obj->getDebugInfo();
					$log .= "\n-----------------------------------------------------------------------------";
					
					error_log($log, 3, ERROR_LOGFILE);
				}
				
				die();
			}
			
			PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'handle_pear_error');
		}
		
		private static final function _initDB()
		{
			self::$_db =& MDB2::factory(DSN);
			self::$_db->setFetchMode(MDB2_FETCHMODE_ASSOC);
			self::$_db->exec("SET NAMES 'utf8'");
		}
		
		private static final function _initSession()
		{
			if (SESSION_USE_DB === true) {
				new DB_Session(self::getDB());
			} else {
				ini_set('session.gc_maxlifetime', SESSION_MAXLIFETIME);
			}
			ini_set('session.use_only_cookies', '1');
			session_start();
		}
		
		private static final function _initSmarty()
		{
			self::$_smarty = new Smarty;
			self::$_smarty->template_dir = SMARTY_TEMPLATE_DIR;
			self::$_smarty->compile_dir = SMARTY_COMPILE_DIR;
			self::$_smarty->config_dir = SMARTY_CONFIG_DIR;
			self::$_smarty->cache_dir = SMARTY_CACHE_DIR;
			self::$_smarty->force_compile = SMARTY_FORCE_COMPILE;
			self::$_smarty->error_reporting = SMARTY_ERROR_REPORTING;
			self::$_smarty->debugging = SMARTY_DEBUGGING;
			self::$_smarty->allow_php_templates = SMARTY_ALLOW_PHP_TEMPLATES;
			self::$_smarty->caching = SMARTY_CACHING;
			self::$_smarty->cache_lifetime = SMARTY_CACHE_LIFETIME;
		}
		
		public static final function getDB()
		{
			return self::$_db;		
		}
		
		public static final function getSmarty()
		{
			return self::$_smarty;		
		}
		
		public static function functionBacktrace($remove = 0)
		{
			if (function_exists('debug_backtrace')) {
				$backtrace = debug_backtrace();
				foreach($backtrace as $level) {
					if ($remove-- < 0) {
						$class = (isset($level['class']) ? $level['class'] : '');
						if ($class != 'MDB2_Driver_Common') {
							$ret[] = ($class ? $class . '::' : '') . $level['function'];
						}
					}
				}
				return implode(' / ',$ret);
			}
		}
		
		public static function errorHandler($code, $message, $file, $line)
		{
			$display = false;
			$type = '';
			
			switch($code)
			{
				case E_ERROR: //1
					$type = 'Error';
					$css_class = 'alert-error';
					$display = true;
					break;
				case E_WARNING: //2
					$type = 'Warning';
					$css_class = 'alert-block';
					$display = true;
					break;
				case E_PARSE: //4
					$display = true;
					$css_class = 'alert-error';
					$type = 'Parse';
					break;
				case E_NOTICE: //8
					$type = 'Notice';
					$css_class = 'alert-block';
					$display = true;
					break;
				case E_CORE_ERROR: // 6
					$type = 'Core-Error';
					$css_class = 'alert-error';
					$display = true;
					break;
				case E_CORE_WARNING: //32
					$type = 'Core-Warning';
					$css_class = 'alert-block';
					$display = true;
					break;
				case E_CORE_ERROR: //64
					$type = 'Core-Error';
					$css_class = 'alert-error';
					$display = true;
					break;
				case E_COMPILE_WARNING : //128
					$type = 'Compile-Warning';
					$css_class = 'alert-block';
					$display = true;
					break;
				case E_USER_ERROR: //256
					$type = 'User-Error';
					$css_class = 'alert-error';
					$display = true;
					break;
				case E_USER_WARNING: //512
					$type = 'User-Warning';
					$css_class = 'alert-block';
					$display = true;
					break;
				case E_USER_NOTICE: //1024
					$type = 'User-Notice';
					$css_class = 'alert-block';
					$display = true;
					break;
				case E_STRICT: //2048
					$type = 'Strict';
					$css_class = 'alert-info';
					$display = false;
					break;
				case E_RECOVERABLE_ERROR: //4096
					$type = 'Recoverable-Error';
					$css_class = 'alert-error';
					$display = true;
					break;
				case E_DEPRECATED: //8192
					$type = 'Deprecated';
					$css_class = 'alert-info';
					$display = false;
					break;
				case E_USER_DEPRECATED: //16384
					$type = 'User-Deprecated';
					$css_class = 'alert-info';
					$display = false;
					break;
				default:
					$display = false;
			}
	
			if ($display) {
				print "<div class=\"alert " . $css_class . "\" style=\"color:#505050;\">";
				print "<h3>" . $type . ":</h3>";
				print "\n<b>" . $message . "</b>";
				print "\n<br>File: <b>" . $file . "</b>";
				print "\n<br>Line: <b>" . $line . "</b>";
				print "\n</div>";
				
				if (LOG_ERRORS === true) {
					$log = "\n" . $type;
					$log .= "\n" . $message;
					$log .= "\nFile" . $file;
					$log .= "\nLine" . $line;
					$log .= "\n-----------------------------------------------------------------------------";
					error_log($log, 3, ERROR_LOGFILE);
				}
			}

			return true;
		}
		
	}

?>
