<?php 

	class DB_Session
	{
		private static $_db;
	
		
		public function __construct($db)
		{
			self::$_db = $db;
			
			session_set_save_handler(
				array('DB_Session', 'sessionOpen'),
				array('DB_Session', 'sessionClose'),
				array('DB_Session', 'sessionRead'),
				array('DB_Session', 'sessionWrite'),
				array('DB_Session', 'sessionDestroy'),
				array('DB_Session', 'sessionGC')
			);
		}
		
		public static final function sessionOpen($path, $name)
		{
			return true;
		}
		
		public static final function sessionClose()
		{
			return true;
		}
		
		public static final function sessionRead($key)
		{
			$sql = "SELECT value FROM " . TBL_PHP_SESSION . " WHERE `key` = '" . $key . "' AND expire > UNIX_TIMESTAMP()";
			//print '<br>' . $sql;
			$result = self::$_db->query($sql);
			
			if ($row = $result->fetchRow()) {
				$sql = "UPDATE " . TBL_PHP_SESSION . " SET expire = '" . (time() + SESSION_MAXLIFETIME) . "' WHERE `key` = '" . $key . "'";
				//print '<br>' . $sql;
				self::$_db->exec($sql);
				
				return $row['value'];
			}
			
			return '';
		}
		
		public static final function sessionWrite($key, $value)
		{
			self::$_db->exec("SET NAMES 'utf8'");
		
			$expire = time() + SESSION_MAXLIFETIME;
			$value = addslashes($value);
		
			$sql = "SELECT * FROM " . TBL_PHP_SESSION . " WHERE `key` = '" . $key . "'";
			//print '<br>' . $sql;
			$result = self::$_db->query($sql);
			if ($result->numRows()) {
				$sql = "UPDATE " . TBL_PHP_SESSION ." SET expire = '" . $expire . "', value = '" . $value . "' WHERE `key` = '" . $key . "'";
			} else {
				$sql = "INSERT INTO " . TBL_PHP_SESSION . " (`key`, expire, value) VALUES ('" . $key . "', '" . $expire . "', '" . $value ."')";
			}
			//print '<br>' . $sql;
			self::$_db->exec($sql);
	
			return true;
		}
		
		public static final function sessionDestroy($key)
		{
			$sql = "DELETE FROM " . TBL_PHP_SESSION . " WHERE `key` = '" . $key . "'";
			//print '<br>' . $sql;
			self::$_db->exec($sql);
		
			return true;
		}
		
		public static final function sessionGC($maxlifetime)
		{
			$sql = "DELETE FROM " . TBL_PHP_SESSION . " WHERE expire < UNIX_TIMESTAMP()";
			//print '<br>' . $sql;
			self::$_db->exec($sql);
		
			return true;
		}
	}

?>