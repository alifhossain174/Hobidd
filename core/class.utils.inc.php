<?php

class Utils
{
	public static function mkdir($path)
	{
		$path = str_replace(DOCUMENT_ROOT_PATH, '', $path);
		$path = explode('/', $path);
		$dir = DOCUMENT_ROOT_PATH;
		foreach ($path as $key => $val) {
			if ($val) {
				$dir .= $val . '/';
				if (!is_dir($dir)) {
					//print "<br>" . $dir;
					mkdir($dir, 0777);
				}
			}
		}
	}

	public static function isAjax()
	{
		return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ? true : false);
	}

	public static function cryptString($string)
	{
		if (CRYPT_HASH) {
			return crypt(md5($string), CRYPT_HASH);
		} else {
			return $string;
		}
	}

	public static function removeFileExtension($file)
	{
		$data = explode('.', $file);
		if (count($data) > 1) {
			unset($data[count($data) - 1]);
		}

		return implode('.', $data);
	}

	public static function stripTags($data)
	{
		$ret_val = array();

		if (is_array($data)) {
			foreach ($data as $key => $val) {
				$ret_val[$key] = self::stripTags($val);
			}
		} else {
			$ret_val = strip_tags($data);
		}

		return $ret_val;
	}

	public static function utf8_decode($data)
	{
		$ret_val = array();

		if (is_array($data)) {
			foreach ($data as $key => $val) {
				$ret_val[$key] = self::utf8_decode($val);
			}
		} else {
			$ret_val = utf8_decode($data);
		}

		return $ret_val;
	}

	public static function utf8_encode($data)
	{
		$ret_val = array();

		if (is_array($data)) {
			foreach ($data as $key => $val) {
				$ret_val[$key] = self::utf8_encode($val);
			}
		} else {
			$ret_val = utf8_encode($data);
		}

		return $ret_val;
	}

	public static function htmlentities($data)
	{
		$ret_val = array();

		if (is_array($data)) {
			foreach ($data as $key => $val) {
				$ret_val[$key] = self::htmlentities($val);
			}
		} else {
			$ret_val = htmlentities($data, ENT_QUOTES, 'UTF-8');
		}

		return $ret_val;
	}

	public static function sendTextMail($to, $subject, $message, $from = '', $cc = '', $bcc = '', $headers = array())
	{
		if (is_array($to)) {
			$to = implode(',', $to);
			$headers[] = 'To:' . (is_array($to) ? implode(',', $to) : $to);
		}
		if ($cc) {
			$headers[] = 'Cc:' . (is_array($cc) ? implode(',', $cc) : $cc);
		}
		if ($bcc) {
			$headers[] = 'Bcc:' . (is_array($bcc) ? implode(',', $bcc) : $bcc);
		}
		if ($from) {
			$headers[] = 'From: ' . $from;
		}
		$headers = implode("\r\n", $headers);

		//mb_send_mail($to, $subject, $message, $headers);
		mail($to, utf8_decode($subject), utf8_decode($message), $headers);
	}


	public static function sendHTMLMail($to, $subject, $message, $from = '', $cc = '', $bcc = '', $headers = array())
	{
		if (is_array($to)) {
			$to = implode(',', $to);
			$headers[] = 'To:' . (is_array($to) ? implode(',', $to) : $to);
		}
		if ($cc) {
			$headers[] = 'Cc:' . (is_array($cc) ? implode(',', $cc) : $cc);
		}
		if ($bcc) {
			$headers[] = 'Bcc:' . (is_array($bcc) ? implode(',', $bcc) : $bcc);
		}
		if ($from) {
			$headers[] = 'From: ' . $from;
		}
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-Type: text/html; charset=ISO-8859-1';

		$headers = implode("\r\n", $headers);

		//mb_send_mail($to, $subject, $message, $headers);
		mail($to, utf8_decode($subject), utf8_decode($message), $headers);
	}


	public static function makeAlias($str)
	{
		$str = mb_strtolower($str);
		$str = str_replace(array('ä', 'ö', 'ü', 'ß', '_', ' '), array('ae', 'oe', 'ue', 'ss', '-', '-'), $str);
		$str = preg_replace('/[^a-z0-9\-]/', '', $str);
		while (preg_match('/\-\-/', $str)) {
			$str = str_replace('--', '-', $str);
		}

		return $str;
	}

	public static function uploadFile($file, $path, $valid_extensions = array(), $invalid_extensions = array(), $max_filesize = 0, $chmod = 0777)
	{
		if (!isset($file)) {
			return 'Es wurde keine Datei ausgewählt';
		}

		if ($max_filesize > 0 && $max_filesize < filesize($file['tmp_name'])) {
			return 'Datei ist zu groß. Die max. erlaubte Dateigröße beträgt ' . self::formatFileSize($max_filesize);
		}

		if (!is_uploaded_file($file['tmp_name'])) {
			return 'Fehler beim Dateiupload - Datei wurde nicht per HTTP-POST übertragen';
		}

		switch ($file['error']) {
			case '1':
				return 'Datei ist zu groß. Maximale Dateigröße beträgt ' . ini_get('upload_max_filesize');
			case '2':
				return 'Datei ist zu groß. Maximale Dateigröße beträgt ' . self::formatFileSize(intval($_POST['MAX_FILE_SIZE']));
			case '3':
				return 'Fehler beim Dateiupload - Datei wurde nicht vollständig übertragen';
			case '4':
				return 'Es wurde keine Datei ausgewählt';
			case '6':
				return 'Fehler beim Dateiupload - TEMP-Verzeichnis fehlt';
			case '7':
				return 'Fehler beim Dateiupload - Datei konnte nicht geschrieben werden';
			case '8':
				return 'Fehler beim Dateiupload - Systemfehler Extension';
		}

		$extension = self::filenameToExtension($file['name']);

		if ($valid_extensions && !in_array($extension, $valid_extensions)) {
			return 'Nicht erlaubte Dateiendung. Folgende Dateiendungen sind erlauft: ' . implode(", ", $valid_extensions);
		}

		if ($invalid_extensions && in_array($extension, $invalid_extensions)) {
			return 'Nicht erlaubte Dateiendung. Folgende Dateiendungen sind nicht erlauft: ' . implode(", ", $invalid_extensions);
		}

		if (move_uploaded_file($file['tmp_name'], $path) === false) {
			return 'Fehler beim Dateiupload';
		} else {
			if (filesize($file['tmp_name']) >= 200100) {
				Image::resize($path, $path, 1200); //resize images bigger than 201kb
			}
		}

		chmod($path, $chmod);
	}

	public static function deleteFile($file)
	{
		if (file_exists($file)) {
			return unlink($file);
		}
	}

	public static function filenameToExtension($filename)
	{
		$ext = explode('.', $filename);
		return strtolower($ext[count($ext) - 1]);
	}

	public static function formatFileSize($size)
	{
		$units = array('B', 'KB', 'MB', 'GB', 'TB');

		for ($i = 0; $size >= 1024 && $i < 4; $i++) {
			$size /= 1024;
		}

		return round($size, 2) . ' ' . $units[$i];
	}

	public static function addslashes($data)
	{
		$ret_val = array();

		if (is_array($data)) {
			foreach ($data as $key => $val) {
				$ret_val[addslashes($key)] = self::addslashes($val);
			}
		} else {
			$ret_val = addslashes($data);
		}

		return $ret_val;
	}

	public static function stripslashes($data)
	{
		$ret_val = array();

		if (is_array($data)) {
			foreach ($data as $key => $val) {
				$ret_val[stripslashes($key)] = self::stripslashes($val);
			}
		} else {
			$ret_val = stripslashes($data);
		}

		return $ret_val;
	}

	public static function unregisterGlobals()
	{
		foreach (func_get_args() as $name) {
			foreach ($GLOBALS[$name] as $key => $val) {
				if (isset($GLOBALS[$key])) {
					unset($GLOBALS[$key]);
				}
			}
		}
	}

	public static function validateOrder($order, $cols)
	{
		if ($cols) {
			if (!in_array($order, $cols)) {
				return array_shift($cols);
			} else {
				return $order;
			}
		} else {
			return '';
		}
	}

	public static function validateForm($fields, $form)
	{
		$ret_val = array();

		foreach ($fields as $key => $val) {
			if (!isset($form[$key]) || $form[$key] == '') {
				$ret_val['fields'][$key] = ' has-error';
				if (isset($val['msg'])) {
					$ret_val['msg'] = $val['msg'];
				}
			}
		}

		if (isset($ret_val['fields'])) {
			if (!isset($ret_val['msg'])) {
				$ret_val['msg'] = 'Bitte alle Pflichtfelder ausfüllen';
			}

			return $ret_val;
		}

		foreach ($fields as $key => $val) {
			if (isset($val['length'])) {
				if (strlen($form[$key]) < $val['length']) {
					$ret_val['fields'][$key] = ' has-error';
					$ret_val['msg'] = 'Bitte mindestens ' . $val['length'] . ' Stellen eingeben';
				}
			} else if (isset($val['email'])) {
				if (!self::isEmail($form[$key])) {
					$ret_val['fields'][$key] = ' has-error';
					$ret_val['msg'] = 'Bitte eine gültige Email-Adresse eingeben';
				} else if (isset($val['exists']) && $val['exists'] == true) {
					$ret_val['fields'][$key] = ' has-error';
					$ret_val['msg'] = 'Email-Adresse schon vorhanden';
				}
			} else if (isset($val['url'])) {
				if (!self::isURL($form[$key])) {
					$ret_val['fields'][$key] = ' has-error';
					$ret_val['msg'] = 'Bitte einen gültigen Link eingeben';
				}
			} else if (isset($val['exists']) && $val['exists'] == true) {
				$ret_val['fields'][$key] = ' has-error';
				$ret_val['msg'] = $val['msg'];
			}
			if (isset($val['compare'])) {
				if ($form[$key] != $val['compare']) {
					$ret_val['fields'][$key] = ' has-error';
					$ret_val['msg'] = (isset($val['msg']) ? $val['msg'] : 'Felder stimmen nicht überein');
				}
			}

			if ($ret_val) {
				return $ret_val;
			}
		}
	}

	public static function optOptions($data, $choose)
	{
		$ret_val = '';

		foreach ($data as $key => $val) {
			if (is_array($choose)) {
				$ret_val .= "\n<option value=\"" . $key . "\"" . (in_array($key, $choose) ? " selected=\"selected\"" : "") . ">" . $val . "</option>";
			} else {
				$ret_val .= "\n<option value=\"" . $key . "\"" . ((string) $key === (string) $choose ? " selected=\"selected\"" : "") . ">" . $val . "</option>";
			}
		}

		return $ret_val;
	}

	public static function checkboxOptions($data, $choose, $fieldname)
	{
		$ret_val = '';

		foreach ($data as $key => $val) {
			if (is_array($choose)) {
				$ret_val .= '<label class="checkbox-inline mr-2"><input type="checkbox" name="' . $fieldname . '[]" value="' . $key . '"' . (in_array($key, $choose) ? ' checked="checked"' : '') . '>&nbsp;';

				if (is_array($val)) {
					if (!empty($val['icon'])) {
						$ret_val .= '<span class="fas fa-' . $val['icon'] . '" style="font-size:16px;"></span>&nbsp;';
					}
					if (!empty($val['name'])) {
						$ret_val .= $val['name'];
					}
					if (empty($val['name']) && empty($val['icon'])) {
						$ret_val .= $val;
					}
				} else {
					$ret_val .= $val;
				}

				$ret_val .= '</label>';
			} else {
				$ret_val .= '<label class="checkbox-inline mr-2"><input type="checkbox" name="' . $fieldname . '[]" value="' . $key . '"' . ((string) $key === (string) $choose ? ' checked=\"checked\"' : '') . ' >&nbsp;';

				if (is_array($val)) {
					if (!empty($val['icon'])) {
						$ret_val .= '<span class="fas fa-' . $val['icon'] . '" style="font-size:16px;"></span>&nbsp;';
					}
					if (!empty($val['name'])) {
						$ret_val .= $val['name'];
					}
					if (empty($val['name']) && empty($val['icon'])) {
						$ret_val .= $val;
					}
				} else {
					$ret_val .= $val;
				}

				$ret_val .= '</label>';
			}
		}

		return $ret_val;
	}

	public static function textlistOptions($data, $choose, $seperator)
	{
		$ret_val = '';
		$first = true;

		foreach ($data as $key => $val) {
			if (is_array($choose) && in_array($key, $choose)) {
				if (!$first) {
					$ret_val .= $seperator;
				}
				$first = false;

				$ret_val .= '' . $val;
			} elseif (is_array($choose) ? (string) $key === implode($choose) : (string) $key === (string) $choose) {
				if (!$first) {
					$ret_val .= $seperator;
				}
				$first = false;

				$ret_val .= '' . $val;
			}
		}

		return $ret_val;
	}

	public static function prepareInsert($data, $remove = array('id'))
	{
		foreach ($remove as $key => $val) {
			if (isset($data[$val])) {
				unset($data[$val]);
			}
		}

		$cols = array();
		$vals = array();
		foreach ($data as $key => $val) {
			$cols[] = "`" . addslashes($key) . "`";

			if ($key == 'password') {
				$vals[] = "'" . addslashes(sha1($val)) . "'";
			} elseif ($key == 'birthday' || $key == 'member_since') {
				$vals[] = ($val === null ? "NULL" : "'" . addslashes($val) . "'");
			} else {
				$vals[] = "'" . addslashes($val) . "'";
			}
		}

		return array(implode(', ', $cols), implode(', ', $vals));
	}

	public static function prepareUpdate($data, $remove = array('id'))
	{
		foreach ($remove as $key => $val) {
			if (isset($data[$val])) {
				unset($data[$val]);
			}
		}

		$set = array();
		foreach ($data as $key => $val) {

			if ($key == 'password') {
				$set[] = "`" . addslashes($key) . "` = '" . addslashes(sha1($val)) . "'";
			} elseif ($key == 'birthday' || $key == 'member_since') {
				$set[] = "`" . addslashes($key) . "` = " . ($val === null ? "NULL" : "'" . addslashes($val) . "'");
			} else {
				$set[] = "`" . addslashes($key) . "` = '" . addslashes($val) . "'";
			}
		}

		return implode(', ', $set);
	}

	public static function filter($filter, $cols, $min_length = 2)
	{
		$ret_val = "";

		$filter = explode(' ', trim(strtolower($filter)));
		foreach ($filter as $query) {
			if (strlen($query) >= $min_length && preg_match('/[a-z0-9]/i', $query)) {
				$ret_val .= " AND (0";
				foreach ($cols as $col) {
					$ret_val .= " OR " . $col . " LIKE '%" . addslashes($query) . "%' ";
					if (preg_match('/ae/', $query)) {
						$ret_val .= " OR " . $col . " LIKE '%" . addslashes(str_replace('ae', 'ä', $query)) . "%' ";
					}
					if (preg_match('/oe/', $query)) {
						$ret_val .= " OR " . $col . " LIKE '%" . addslashes(str_replace('oe', 'ö', $query)) . "%' ";
					}
					if (preg_match('/ue/', $query)) {
						$ret_val .= " OR " . $col . " LIKE '%" . addslashes(str_replace('ue', 'ü', $query)) . "%' ";
					}
					if (preg_match('/ss/', $query)) {
						$ret_val .= " OR " . $col . " LIKE '%" . addslashes(str_replace('ss', 'ß', $query)) . "%' ";
					}
				}
				$ret_val .= ")";
			}
		}

		return $ret_val;
	}

	public static function limit($data_per_page)
	{
		if ($data_per_page == 0) {
			return '';
		}

		$page = (!empty($_GET['page']) ? intval($_GET['page']) : 1);

		return " LIMIT " . ($page - 1) * $data_per_page . ", " . $data_per_page . " ";
	}

	public static function pageLinks($cnt, $data_per_page, $link)
	{
		$ret_val = array(
			'cnt' => $cnt,
			'entry_from' => self::entryFrom($cnt, $data_per_page),
			'entry_to' => self::entryTo($cnt, $data_per_page),
		);

		$data = array();
		$pages = ceil($cnt / $data_per_page);
		$p = (!empty($_GET['page']) ? intval($_GET['page']) : 1);

		/*if ($pages <= 1) {
				return $ret_val;
			}*/

		if ($p > 1) {
			$data[] = array('page' => ($p - 1), 'name' => '&laquo;', 'link' => $link);
		}
		if ($pages <= 12) {
			for ($i = 1; $i <= $pages; $i++) {
				$data[] = array('page' => $i, 'name' => $i, 'link' => $link);
			}
		} else {
			for ($i = 1; $i <= 3; $i++) {
				$data[] = array('page' => $i, 'name' => $i, 'link' => $link);
			}

			$start = $p - 4;
			$end = $p + 4;
			if ($start <= 3) {
				while ($start <= 3) {
					$start++;
					$end++;
				}
			} else {
				$data[] = array('page' => '', 'name' => '...', 'link' => '');
			}

			$tmp = array();
			if ($end >= $pages - 1) {
				while ($end > $pages - 1) {
					$start--;
					$end--;
				}
			} else {
				$tmp = array('page' => '', 'name' => '...', 'link' => '');
			}

			for ($i = $start; $i < $end; $i++) {
				$data[] = array('page' => $i, 'name' => $i, 'link' => $link);
			}

			if ($tmp) {
				$data[] = $tmp;
			}

			for ($i = $pages - 1; $i <= $pages; $i++) {
				$data[] = array('page' => $i, 'name' => $i, 'link' => $link);
			}
		}

		if ($p < $pages) {
			$data[] = array('page' => ($p + 1), 'name' => '&raquo;', 'link' => $link);
		}

		foreach ($data as $key => $val) {
			if ($val['page'] == $p) {
				$data[$key]['active'] = true;
			}
		}

		$ret_val['pagination'] = $data;

		return $ret_val;
	}

	public static function opt01($choose = '', $first_empty = false, $get_name = false, $caption_first = '')
	{
		$data = array();

		if ($first_empty) {
			$data[''] = $caption_first;
		}
		$data[0] = 'Nein';
		$data[1] = 'Ja';

		if ($get_name) {
			return (isset($data[$choose]) ? $data[$choose] : '');
		}

		return self::optOptions($data, $choose);
	}

	public static function optDate($name = 'data[timestamp]', $timestamp = 0, $void = false, $year_start = '', $year_end = '')
	{
		$ret_val = '';
		if (!$timestamp) {
			$day = 0;
			$month = 0;
			$year = 0;
		} else {
			list($day, $month, $year) = explode(' ', date('d m Y', $timestamp));
		}

		if (!$year_start) {
			$year_start = date('Y') - 1;
		}
		if (!$year_end) {
			$year_end = date('Y') + 1;
		}

		$ret_val .= '<select class="input-small" name="' . $name . '[day]">';
		if ($void) {
			$ret_val .= '<option value="0">-</option>';
		}
		for ($i = 1; $i <= 31; $i++) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $day ? ' selected="selected"' : '') . '>' . ($i < 10 ? '0' : '') . $i . '</option>';
		}
		$ret_val .= '</select>&nbsp;.&nbsp;';

		$ret_val .= '<select class="input-small" name="' . $name . '[month]">';
		if ($void) {
			$ret_val .= '<option value="0">-</option>';
		}
		for ($i = 1; $i <= 12; $i++) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $month ? ' selected="selected"' : '') . '>' . ($i < 10 ? '0' : '') . $i . '</option>';
		}
		$ret_val .= '</select>&nbsp;.&nbsp;';

		$ret_val .= '<select class="input-small" name="' . $name . '[year]">';
		if ($void) {
			$ret_val .= '<option value="0">-</option>';
		}
		for ($i = $year_start; $i <= $year_end; $i++) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $year ? ' selected="selected"' : '') . '>' . $i . '</option>';
		}
		$ret_val .= '</select>';

		return $ret_val;
	}

	public static function optTime($name = 'data[timestamp]', $timestamp = 0, $void = false)
	{
		$ret_val = '';
		if (!$timestamp) {
			$day = 0;
			$month = 0;
			$year = 0;
			$hour = 0;
			$minute = 0;
		} else {
			list($day, $month, $year, $hour, $minute) = explode(' ', date('d m Y H i', $timestamp));
		}

		$ret_val .= '<select name="' . $name . '[hour]">';
		for ($i = 0; $i <= 23; $i++) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $hour ? ' selected="selected"' : '') . '>' . ($i < 10 ? '0' : '') . $i . '</option>';
		}
		$ret_val .= '</select>&nbsp;:&nbsp;';

		$ret_val .= '<select name="' . $name . '[minute]">';
		for ($i = 0; $i <= 30; $i += 30) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $minute ? ' selected="selected"' : '') . '>' . ($i < 10 ? '0' : '') . $i . '</option>';
		}
		$ret_val .= '</select>';

		return $ret_val;
	}

	public static function optDateTime($name = 'data[timestamp]', $timestamp = 0, $void = false, $year_start = '', $year_end = '')
	{
		$ret_val = '';
		if (!$timestamp) {
			$day = 0;
			$month = 0;
			$year = 0;
			$hour = 0;
			$minute = 0;
		} else {
			list($day, $month, $year, $hour, $minute) = explode(' ', date('d m Y H i', $timestamp));
		}

		if (!$year_start) {
			$year_start = date('Y');
		}
		if (!$year_end) {
			$year_end = date('Y') + 1;
		}

		$ret_val .= '<select name="' . $name . '[day]">';
		if ($void) {
			$ret_val .= '<option value="0">-</option>';
		}
		for ($i = 1; $i <= 31; $i++) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $day ? ' selected="selected"' : '') . '>' . ($i < 10 ? '0' : '') . $i . '</option>';
		}
		$ret_val .= '</select>&nbsp;.&nbsp;';

		$ret_val .= '<select name="' . $name . '[month]">';
		if ($void) {
			$ret_val .= '<option value="0">-</option>';
		}
		for ($i = 1; $i <= 12; $i++) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $month ? ' selected="selected"' : '') . '>' . ($i < 10 ? '0' : '') . $i . '</option>';
		}
		$ret_val .= '</select>&nbsp;.&nbsp;';

		$ret_val .= '<select name="' . $name . '[year]">';
		if ($void) {
			$ret_val .= '<option value="0">-</option>';
		}
		for ($i = $year_start; $i <= $year_end; $i++) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $year ? ' selected="selected"' : '') . '>' . $i . '</option>';
		}
		$ret_val .= '</select>&nbsp;&nbsp;';

		$ret_val .= '<select name="' . $name . '[hour]">';
		for ($i = 0; $i <= 23; $i++) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $hour ? ' selected="selected"' : '') . '>' . ($i < 10 ? '0' : '') . $i . '</option>';
		}
		$ret_val .= '</select>&nbsp;:&nbsp;';

		$ret_val .= '<select name="' . $name . '[minute]">';
		for ($i = 0; $i <= 30; $i += 30) {
			$ret_val .= '<option value="' . $i . '"' . ($i == $minute ? ' selected="selected"' : '') . '>' . ($i < 10 ? '0' : '') . $i . '</option>';
		}
		$ret_val .= '</select>';

		return $ret_val;
	}

	public static function optSort($choose = "500", $name = "data[sort]", $id = "sort")
	{
		$ret_val = "";

		for ($i = 0; $i <= 2; $i++) {
			$ret_val .= "<select class=\"input-small\" name=\"" . $name . "[" . $i . "]\"" .  ($i == 0 ? ' id="' . $id . '"' : '') . ">\n";
			for ($j = ($i > 0 ? 0 : 1); $j <= 9; $j++) {
				$ret_val .= "<option value=\"" . $j . "\"" . ($choose{
					$i} == $j ? " selected=\"selected\"" : "") . ">" . $j . "</option>\n";
			}
			$ret_val .= "</select>\n";
		}

		return $ret_val;
	}

	public static function generatePassword($len = 8)
	{
		$chars = 'abcdefghjkmnpqrstuvwxyzABCDEFGHKMNPQRSTUVWXYZ23456789';
		$pwd = '';
		for ($i = 1; $i <= $len; $i++) {
			$pwd .= $chars[rand(0, (strlen($chars)) - 1)];
		}

		return $pwd;
	}

	public static function nf($amount, $decimales = 2)
	{
		return number_format($amount, $decimales, ',', '.');
	}

	public static function isEmail($email)
	{
		if (!$email || $email == '') {
			return false;
		} else {
			return preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*?[a-z]+$/is', $email);
		}
	}

	public static function isURL($url)
	{
		if (!$url || $url == '') {
			return false;
		} else {
			return preg_match('#^http\\:\\/\\/[a-z0-9\-]+\.([a-z0-9\-]+\.)?[a-z]+#i', $url);
		}
	}

	public static function formToDate($data)
	{
		if ($data['month'] && $data['day'] && $data['year']) {
			$data['hour'] = (isset($data['hour']) ? $data['hour'] : 0);
			$data['minute'] = (isset($data['minute']) ? $data['minute'] : 0);

			$ts = mktime($data['hour'], $data['minute'], 0, $data['month'], $data['day'], $data['year']);
		} else {
			$ts = 0;
		}

		return $ts;
	}

	public static function entryFrom($cnt, $data_per_page)
	{
		$page = (!empty($_GET['page']) ? (int) $_GET['page'] : 1);

		return ($cnt ? $data_per_page * ($page - 1) + 1 : '0');
	}

	public static function entryTo($cnt, $data_per_page)
	{
		$page = (!empty($_GET['page']) ? (int) $_GET['page'] : 1);

		return (($data_per_page * ($page - 1) + $data_per_page) < $cnt ? $data_per_page * ($page - 1) + $data_per_page : $cnt);
	}

	public static function redirect($url)
	{
		header('location: ' . $url);
		exit;
	}

	public static function redirectJS($url)
	{
		print "<script type=\"text/javascript\">document.location.href='" . $url . "';</script>";
		exit;
	}

	public static function sendNoCacheHeader()
	{
		header('Expires: Mon, 10 Jan 1970 01:01:01 GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Pragma: no-cache');
	}

	public static function sendCSVHeader($filename = 'export.csv')
	{
		header('Pragma: private');
		header('Cache-control: private, must-revalidate');
		header('Connection: close');
		header('Content-Type: application/octet-stream; charset=ISO-8859-15');
		header('Content-Disposition: attachment; filename=' . $filename);
	}

	public static function holiday($timestamp, $state = '')
	{
		$date = explode('-', date('Y-m-d', $timestamp));

		if (!checkdate($date[1], $date[2], $date[0])) {
			return false;
		}

		$date_arr = getdate($timestamp);
		$easter_d = date('d', easter_date($date[0]));
		$easter_m = date('m', easter_date($date[0]));

		if ($date[1] . $date[2] == '0101') {
			return 'Neujahr';
		} else if ($date[1] . $date[2] == '0106') {
			return 'Heilige Drei Könige';
		} else if ($date[1] . $date[2] == '0319' && ($state == 'k' || $state == 'st' || $state == 't' || $state == 'v')) {
			return 'Josef';
		} else if ($date[1] . $date[2] == $easter_m . $easter_d) {
			return 'Ostersonntag';
		} else if ($date[1] . $date[2] == date('md', mktime(0, 0, 0, $easter_m, $easter_d + 1, $date[0]))) {
			return 'Ostermontag';
		} else if ($date[1] . $date[2] == date('md', mktime(0, 0, 0, $easter_m, $easter_d + 39, $date[0]))) {
			return 'Christi Himmelfahrt';
		} else if ($date[1] . $date[2] == date('md', mktime(0, 0, 0, $easter_m, $easter_d + 49, $date[0]))) {
			return 'Pfingstsonntag';
		} else if ($date[1] . $date[2] == date('md', mktime(0, 0, 0, $easter_m, $easter_d + 50, $date[0]))) {
			return 'Pfingstmontag';
		} else if ($date[1] . $date[2] == date('md', mktime(0, 0, 0, $easter_m, $easter_d + 60, $date[0]))) {
			return 'Fronleichnam';
		} else if ($date[1] . $date[2] == '0501') {
			return 'Erster Mai';
		} else if ($date[1] . $date[2] == '0504' && $state == 'ooe') {
			return 'Florian';
		} else if ($date[1] . $date[2] == '0815') {
			return 'Mariä Himmelfahrt';
		} else if ($date[1] . $date[2] == '0924' && $state == 's') {
			return 'Rupertitag';
		} else if ($date[1] . $date[2] == '1010' && $state == 'k') {
			return 'Tag der Volksabstimmung';
		} else if ($date[1] . $date[2] == '1026') {
			return 'Nationalfeiertag';
		} else if ($date[1] . $date[2] == '1101') {
			return 'Allerheiligen';
		} else if ($date[1] . $date[2] == '1111' && $state == 'b') {
			return 'Martini';
		} else if ($date[1] . $date[2] == '1115' && ($state == 'noe' || $state == 'w')) {
			return 'Leopoldi';
		} else if ($date[1] . $date[2] == '1208') {
			return 'Mariä Empfängnis';
		} else if ($date[1] . $date[2] == '1224') {
			return 'Heiliger Abend';
		} else if ($date[1] . $date[2] == '1225') {
			return 'Christtag';
		} else if ($date[1] . $date[2] == '1226') {
			return 'Stefanitag';
		} else if ($date[1] . $date[2] == '1231') {
			return 'Silvester';
		}
	}

	public static function isMobile($number)
	{
		if (!preg_match('/[^0-9]/', $number) && preg_match('/^43(664|650|660|676|680|681|688|699)/', $number)) {
			return true;
		}
		return false;
	}

	public function prepareMobileNumber($number)
	{
		$number = trim($number);
		$number = preg_replace('/^\+43/', '', $number);
		$number = preg_replace('/^0/', '', $number);
		$number = preg_replace('/[^0-9]/', '', $number);
		$number = '43' . $number;
		if (self::isMobile($number)) {
			return $number;
		}
		return '';
	}

	public static function generateCSVRow($data, $delimiter = ';', $enclosure = '"')
	{
		foreach ($data as $key => $val) {
			$data[$key] = $enclosure . $val . $enclosure;
		}
		return implode($delimiter, Utils::utf8_decode($data));
	}

	public static function convertCharset($string)
	{
		$charset = mb_detect_encoding($string, "UTF-8, ISO-8859-1, ISO-8859-15", true);
		$string =  mb_convert_encoding($string, "Windows-1252", $charset);
		return $string;
	}

	public static function explodeSetValueAsKey($delimiter, $string)
	{
		$ret_val = array();

		$data = explode($delimiter, $string);

		foreach ($data as $key => $val) {
			$ret_val[$val] = $val;
		}

		return $ret_val;
	}

	public function getFileEncoding($file)
	{
		$finfo = finfo_open(FILEINFO_MIME_ENCODING);
		return finfo_file($finfo, $file);
	}

	public static function isUTF8($str)
	{
		if (mb_detect_encoding($str, 'UTF-8, ISO-8859-1') === 'UTF-8') {
			return true;
		} else {
			return false;
		}
	}
}



class UUID
{

	/**
	 * @var
	 */
	public $prefix;

	/**
	 * @var
	 */
	public $entropy;

	/**
	 * @param string $prefix
	 * @param bool $entropy
	 */
	public function __construct($prefix = '', $entropy = false)
	{
		$this->uuid = uniqid($prefix, $entropy);
	}

	/**
	 * Limit the UUID by a number of characters
	 *
	 * @param $length
	 * @param int $start
	 * @return $this
	 */
	public function limit($length, $start = 0)
	{
		$this->uuid = substr($this->uuid, $start, $length);

		return $this;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->uuid;
	}
}
