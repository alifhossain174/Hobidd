<?php

class Frontend_Model extends Core
{

	protected $db;
	protected $user;

	public function __construct($user)
	{
		parent::__construct();

		$this->db   = $this->getDB();
		$this->user = $user;
	}

	public function selectTranslation($lang = '')
	{
		$lang = ($lang ? $lang : $this->lang);

		$sql = "SELECT * FROM ".TBL_TRANSLATION;
		//print '<br>' . $sql;
		$result = $this->db->query($sql);
		while ($row = $result->fetchRow()) {
			$this->translation[strtolower($row['key'])] = str_replace('{$lang}', $lang, $row['lang_'.$lang]);
		}

		$this->translation['cookie_text'] = str_replace("\n", '<br>', $this->translation['cookie_text']);

		return $this->translation;
	}

	public function getTranslation($key)
	{
		return (isset($this->translation[$key]) ? $this->translation[$key] : '');
	}

	public function cleanInput($data, $exclude = [])
	{
		$ret_val = [];

		if (is_array($data)) {
			foreach ($data as $key => $val) {
				if (!in_array($key, $exclude)) {
					$ret_val[$key] = $this->cleanInput($val);
				} else {
					$ret_val[$key] = $val;
				}
			}
		} else {
			$ret_val = htmlspecialchars(trim($data), ENT_COMPAT);
			$ret_val = str_replace('&amp;', '&', $ret_val);
		}

		return $ret_val;
	}

}

?>
