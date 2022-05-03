<?php
class Page_Model extends Frontend_Model
{
    protected $db;
    protected $lang = '';
    public $hobbids = 5; // max bidds per ad
    public function __construct($user, $acl, $lang)
    {
        parent::__construct($user);
        $this->acl =& $acl;
        $this->lang = $lang;
        if (isset($_GET['u'])) {
            $this->_update();
        }
    }
    public function selectPackages()
    {
        $ret_val = [];
        $sql = "SELECT * FROM " . TBL_PACKAGE . " WHERE deleted = '0'";
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $ret_val[$row['id']] = $this->setLangCols($row);
        }
        return $ret_val;
    }
    public function resetUserPassword($email)
    {
        $sql = "SELECT * FROM " . TBL_CUSTOMER . " WHERE email = '" . addslashes($email) . "'";
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $data = $result->fetchRow();
            $pwd = Utils::generatePassword(8);
            $sql = "UPDATE " . TBL_CUSTOMER . " SET password = '" . sha1($pwd) . "' WHERE id = '" . addslashes($data['id']) . "'";
            $this->db->exec($sql);
            $msg = [];
            $msg[] = $this->getTranslation('email_new_password_text1') . ' ' . $pwd;
            $msg[] = '';
            $msg[] = $this->getTranslation('email_new_password_text2');
            Utils::sendTextMail(
                $data['email'],
                $this->getTranslation('email_new_password_subject'),
                implode("\n", $msg),
                EMAIL_FROM_SYSTEM
            );
            return true;
        }
    }
    public function xupdate()
    {
        $sql = "SELECT * FROM " . TBL_AD . " WHERE deleted = '0'";
        $data = $this->db->queryAll($sql);
        $path = DOCUMENT_ROOT_PATH . UPLOAD_PATH_AD;
        foreach ($data as $key => $val) {
            Image::crop($path . '700x468_' . $val['file1'], $path . '698x342_' . $val['file1'], 698, 342);
            print "<br>" . $val['file1'];
            //exit;
        }
    }
    public function selectStartVideo()
    {
        $sql = "SELECT * FROM " . TBL_VIDEO . " WHERE active = '1' AND deleted = '0' ORDER BY RAND()";
        $result = $this->db->query($sql);
        $data = $result->fetchRow();
        if ($data === null) {
            return null;
        }
        if (!$data['file2_en']) {
            $data['file2_en'] = $data['file2'];
        }
        if (!$data['file_en']) {
            $data['file_en'] = $data['file'];
        }
        $data = $this->setLangCols($data);
        $data['file'] = '/img/video/' . $data['file'];
        $data['file2'] = '/img/video/' . $data['file2'];
        return $data;
    }
    private function _update()
    {
        /*
        $sql = "SELECT * FROM " . TBL_AD . " WHERE postalcode <> '' AND location <> ''";
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            print_r($row); exit;
            $coordinates = $this->addressToCoordinates($row['street'], $row['postalcode'], $row['location']);
            print_r($coordinates);
            if ($coordinates) {
                $sql = "UPDATE " . TBL_AD . " SET longitude = '" . $coordinates['longitude'] . "',latitude = '" . $coordinates['latitude'] . "' WHERE id = '" . $row['id'] . "' ";
                print "<br>" . $sql;
                $this->db->exec($sql);
            }
        }
        */
        $sql = "SELECT * FROM " . TBL_VENDOR
            . " WHERE postalcode <> '' AND location <> '' AND longitude = '' AND latitude = '' AND deleted = '0'";
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            //print_r($row); exit;
            $coordinates = $this->addressToCoordinates($row['street'], $row['postalcode'], $row['location']);
            //print_r($coordinates);
            if ($coordinates) {
                $sql = "UPDATE " . TBL_VENDOR . " SET longitude = '" . $coordinates['longitude'] . "',latitude = '"
                    . $coordinates['latitude'] . "' WHERE id = '" . $row['id'] . "' ";
                print "<br>" . $sql;
                $this->db->exec($sql);
            }
        }
    }
    public function offerLocationExists($postalcode)
    {
        $sql = "SELECT * FROM " . TBL_AD . " WHERE postalcode LIKE '" . addslashes($postalcode) . "' OR location LIKE '%"
            . addslashes($postalcode) . "%' ";
        //print "<br>" . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            return true;
        }
        $sql = "SELECT * FROM " . TBL_VENDOR . " WHERE postalcode LIKE '" . addslashes($postalcode) . "' OR location LIKE '%"
            . addslashes($postalcode) . "%' OR country LIKE '%" . addslashes($postalcode) . "%' ";
        //print "<br>" . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            return true;
        }
    }
    public function selectStartBanner()
    {
        $ret_val = [];
        $_showed = [];
        for ($i = 0; $i <= 2; $i++) { //8
            $sql = "SELECT * FROM " . TBL_AD
                . " WHERE featured = '1' AND is_private = '0' AND UNIX_TIMESTAMP() BETWEEN featured_from AND featured_to AND active = '1' AND deleted = '0' AND valid_to > UNIX_TIMESTAMP() AND featured_position = '"
                . ($i + 1) . "' ORDER BY RAND() LIMIT 1";
            //print '<br>' . $sql;
            $result = $this->db->query($sql);
            if ($result->numRows()) {
                $_data = $result->fetchRow();
                $ret_val[$i] = $_data;
                if ($_data['id']) {
                    $_SESSION['frontend']['page']['showed_ads'][$_data['id']] = $_data['id'];
                    $_showed[$_data['id']] = $_data['id'];
                }
            } else {
                if (!empty($_SESSION['frontend']['page']['showed_ads'])
                    && is_array(
                        $_SESSION['frontend']['page']['showed_ads']
                    )
                    && $_SESSION['frontend']['page']['showed_ads']
                ) {
                    $sql_where = " AND id NOT IN(" . implode(",", $_SESSION['frontend']['page']['showed_ads']) . ") ";
                    //$sql_where = "";
                } else {
                    $sql_where = "";
                }
                $sql = "SELECT * FROM " . TBL_AD . " WHERE 1 " . $sql_where
                    . " AND active = '1' AND is_private = '0' AND deleted = '0' AND valid_to > UNIX_TIMESTAMP() ORDER BY RAND() LIMIT 1";
                //print '<br>' . $sql;
                $result = $this->db->query($sql);
                if ($result->numRows()) {
                    $_data = $result->fetchRow();
                    $ret_val[$i] = $_data;
                    if ($_data['id']) {
                        $_SESSION['frontend']['page']['showed_ads'][$_data['id']] = $_data['id'];
                        $_showed[$_data['id']] = $_data['id'];
                    }
                } else {
                    $sql_where = "";
                    if ($_showed) {
                        $sql_where .= " AND id NOT IN(" . implode(",", $_showed) . ") ";
                    }
                    //$_SESSION['frontend']['page']['showed_ads'] = array();
                    $sql = "SELECT * FROM " . TBL_AD . " WHERE 1 " . $sql_where
                        . " AND active = '1' AND is_private = '0' AND deleted = '0' AND valid_to > UNIX_TIMESTAMP() ORDER BY RAND() LIMIT 1";
                    //print '<br>' . $sql;
                    $result = $this->db->query($sql);
                    $_data = $result->fetchRow();
                    $ret_val[$i] = $_data;
                    if ($_data['id']) {
                        $_SESSION['frontend']['page']['showed_ads'][$_data['id']] = $_data['id'];
                        $_showed[$_data['id']] = $_data['id'];
                    }
                }
            }
        }
        foreach ($ret_val as $key => $row) {
            for ($i = 1; $i <= 3; $i++) {
                if ($row['file' . $i]) {
                    $row['file' . $i . '_639'] = '/' . UPLOAD_PATH_AD . '639x530_' . $row['file' . $i];
                    $row['file' . $i . '_318'] = '/' . UPLOAD_PATH_AD . '318x265_' . $row['file' . $i];
                    $row['file' . $i . '_150'] = '/' . UPLOAD_PATH_AD . '150x150_' . $row['file' . $i];
                    $row['file' . $i . '_830'] = '/' . UPLOAD_PATH_AD . '830x455_' . $row['file' . $i];
                    $row['file' . $i . '_338'] = '/' . UPLOAD_PATH_AD . '338x342_' . $row['file' . $i];
                    $row['file' . $i . '_698'] = '/' . UPLOAD_PATH_AD . '698x342_' . $row['file' . $i];
                    $row['file' . $i . '_700'] = '/' . UPLOAD_PATH_AD . '700x468_' . $row['file' . $i];
                    $row['file' . $i . '_340'] = '/' . UPLOAD_PATH_AD . '340x340_' . $row['file' . $i];
                    if (!file_exists(UPLOAD_PATH_AD . '318x265_' . $row['file' . $i])) {
                        $row['file' . $i . '_318'] = '/' . UPLOAD_PATH_AD . '260x175_' . $row['file' . $i];
                    }
                    if (!file_exists(UPLOAD_PATH_AD . '639x530_' . $row['file' . $i])) {
                        $row['file' . $i . '_639'] = '/' . UPLOAD_PATH_AD . '830x455_' . $row['file' . $i];
                    }
                }
            }
            $ret_val[$key] = $this->setLangCols($row);
        }
        return $ret_val;
    }
    public function selectStartImages()
    {
        $ret_val = [];
        $sql = "SELECT * FROM " . TBL_START_IMAGE . " WHERE active = '1' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $row = $this->setLangCols($row);
            $row['image'] = '/' . UPLOAD_PATH_AD . $row['file'];
            $ret_val[$row['position']] = $this->setLangCols($row);
        }
        return $ret_val;
    }
    public function selectCategories($id = '', $alias = '')
    {
	   $ret_val = [];
        $sql_where = " AND active = '1' AND deleted = '0' ";
        if ($id) {
            $sql_where .= " AND id = '" . addslashes($id) . "' ";
        } else {
            $sql_where .= " AND id <> 5 AND id <> 6 AND id <> 7 ";
        }
        if ($alias) {
            $sql_where .= " AND alias = '" . addslashes($alias) . "' ";
        }
        $sql = "SELECT * FROM " . TBL_CATEGORY . " WHERE 1 " . $sql_where . " ORDER BY sort ASC, name ASC";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $row = $this->setLangCols($row, '', ['file1_en', 'file2_en', 'color_en']);
            if ($row['file']) {
                $row['file'] = '/' . UPLOAD_PATH_AD . $row['file'];
            }
            if ($row['file2']) {
                $row['file2'] = '/' . UPLOAD_PATH_AD . $row['file2'];
            }
            $ret_val[] = $row;
        }
        return ($alias || $id ? array_shift($ret_val) : $ret_val);
    }
    public function selectBanner($category_id)
    {
        $this->data_per_page = 1;
        $banner = $this->selectAds($category_id, '', false, false, [], 0, false, true);
        if (!$banner) {
            $banner = $this->selectAds($category_id);
        }
        return ($banner ? $banner[0] : []);
    }
    public function selectSingleAds($id)
    {
        $sql = "SELECT * FROM " . TBL_AD . " WHERE id = " . addslashes($id);
        return $this->db->query($sql)->fetchRow();
    }
    public function selectInquiry($id)
    {
        $sql = "SELECT * FROM " . TBL_INQUIRY . " WHERE id = " . addslashes($id);
        return $this->db->query($sql)->fetchRow();
    }
    public function selectAds(
        $category_id = '',
        $id = '',
        $latest = false,
        $count = false,
        $filter = [],
        $limit = 0,
        $rand = false,
        $featured = false,
        $ignore_active = false
    )
    {
        $ret_val = [];
        $sql_select = "";
        $sql_where = "";
        $sql_order = "";
        $sql_limit = (!$id && !$featured ? Utils::limit($this->data_per_page) : '');
        if ($ignore_active == false) {
            $sql_where = " AND (a.active = '1' OR is_offer = '1') AND a.deleted = '0' ";
        }
        if ($limit) {
            $sql_limit = " LIMIT " . addslashes($limit) . " ";
        }
        if ($rand) {
            $sql_order = " ORDER BY RAND() ";
        }
        if ($category_id && !$featured) {
            $sql_where .= " AND (a.category_id = '" . addslashes($category_id) . "' OR a.category_id2 = '" . addslashes(
                    $category_id
                ) . "') ";
        }
        if ($id) {
            $sql_where .= " AND a.id = '" . addslashes($id) . "' ";
        }
        if ($latest) {
            $sql_order .= " ORDER BY a.cdate DESC ";
        }
        if (isset($filter['is_private'])) {
            $sql_where .= " AND a.is_private = '" . addslashes($filter['is_private']) . "' ";
        }
        if (!empty($filter['vendor_id'])) {
            $sql_where .= " AND a.vendor_id = '" . addslashes($filter['vendor_id']) . "' ";
        }
        if (!empty($filter['hash'])) {
            $sql_where .= " AND SHA1(MD5(a.id)) = '" . addslashes($filter['hash']) . "' ";
        } else {
//            $sql_where .= " AND valid_to >= UNIX_TIMESTAMP() ";
        }
        // if (!empty($filter['postalcode'])) {
        // 	$coordinates = $this->addressToCoordinates($filter['postalcode'], '', '');
        // 	if (DEBUG) {
        // 		//print_r($coordinates);
        // 	}
        // 	if (!empty($coordinates['longitude']) && !empty($coordinates['latitude'])) {
        // 		$sql_select .= ", ACOS(SIN(RADIANS(  IF(a.latitude <> '', a.latitude, v.latitude)  )) * SIN(RADIANS(" . $coordinates['latitude'] . ")) + COS(RADIANS(  IF(a.latitude <> '', a.latitude, v.latitude)  )) * COS(RADIANS(" . $coordinates['latitude'] . ")) * COS(RADIANS(  IF(a.longitude <> '', a.longitude, v.longitude)  ) - RADIANS(" . $coordinates['longitude'] . ")) ) * 6380 AS diff ";
        // 		$sql_where .= " AND (ACOS(SIN(RADIANS( IF(a.latitude <> '', a.latitude, v.latitude) )) * SIN(RADIANS(" . $coordinates['latitude'] . ")) + COS(RADIANS(  IF(a.latitude <> '', a.latitude, v.latitude)  )) * COS(RADIANS(" . $coordinates['latitude'] . ")) * COS(RADIANS(  IF(a.longitude <> '', a.longitude, v.longitude)  ) - RADIANS(" . $coordinates['longitude'] . ")) ) * 6380 < 1500) ";
        // 		$sql_order = " ORDER BY diff ASC, a.cdate DESC ";
        // 	}
        // }
        if (!empty($filter['postalcode'])) {
            $sql_where .= " AND ((a.title LIKE '%" . addslashes($filter['postalcode']) . "%') OR (a.location LIKE '%"
                . addslashes($filter['postalcode']) . "%') OR (a.country LIKE '%" . addslashes(
                    $filter['postalcode']
                ) . "%') OR (a.content LIKE '%" . addslashes($filter['postalcode']) . "%') OR (a.priceinfo LIKE '%"
                . addslashes($filter['postalcode']) . "%') OR (v.company LIKE '%" . addslashes(
                    $filter['postalcode']
                ) . "%') OR ((v.location LIKE '%" . addslashes($filter['postalcode'])
                . "%') AND (a.location = '')) OR ((v.country LIKE '%" . addslashes($filter['postalcode'])
                . "%') AND (a.country = ''))) ";
            $sql_order = " ORDER BY a.cdate DESC ";
        }
        if (!empty($filter['filter_travel_period'])) {
            $travelPeriodDate = explode('-', $filter['filter_travel_period']);
            $sql_where .= " AND MONTH(date_from) = " . $travelPeriodDate[1] . " AND YEAR(date_from) = " . $travelPeriodDate[0] . "";
        }
        if ($featured) {
            $sql_where .= " AND featured_category_id = '" . addslashes($category_id)
                . "' AND UNIX_TIMESTAMP() BETWEEN featured_from AND featured_to AND valid_to > UNIX_TIMESTAMP() ";
        }
        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt,category_JSON
					FROM " . TBL_AD . " a
					LEFT JOIN " . TBL_VENDOR . " v ON(v.id = a.vendor_id)
					WHERE 1 " . $sql_where;
            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }
        $sql = "SELECT a.*, v.company " . $sql_select . "
				FROM " . TBL_AD . " a
				LEFT JOIN " . TBL_VENDOR . " v ON(v.id = a.vendor_id)
				WHERE 1 " . $sql_where . $sql_order . $sql_limit;
        // print '<br>' . $sql;die();
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            for ($i = 1; $i <= 10; $i++) {
                if ($row['file' . $i]) {
                    $row['file' . $i . '_639'] = '/' . UPLOAD_PATH_AD . '639x530_' . $row['file' . $i];
                    $row['file' . $i . '_318'] = '/' . UPLOAD_PATH_AD . '318x265_' . $row['file' . $i];
                    $row['file' . $i . '_150'] = '/' . UPLOAD_PATH_AD . '150x150_' . $row['file' . $i];
                    $row['file' . $i . '_830'] = '/' . UPLOAD_PATH_AD . '830x455_' . $row['file' . $i];
                    $row['file' . $i . '_338'] = '/' . UPLOAD_PATH_AD . '338x342_' . $row['file' . $i];
                    $row['file' . $i . '_698'] = '/' . UPLOAD_PATH_AD . '698x342_' . $row['file' . $i];
                    $row['file' . $i . '_700'] = '/' . UPLOAD_PATH_AD . '700x468_' . $row['file' . $i];
                    $row['file' . $i . '_340'] = '/' . UPLOAD_PATH_AD . '340x340_' . $row['file' . $i];
                    if (!file_exists(UPLOAD_PATH_AD . '318x265_' . $row['file' . $i])) {
                        $row['file' . $i . '_318'] = '/' . UPLOAD_PATH_AD . '260x175_' . $row['file' . $i];
                    }
                    if (!file_exists(UPLOAD_PATH_AD . '639x530_' . $row['file' . $i])) {
                        $row['file' . $i . '_639'] = '/' . UPLOAD_PATH_AD . '260x175_' . $row['file' . $i];
                    }
                }
            }
            if ($row['cdate'] + 60 * 60 * 24 * 3 > time()) {
                $row['new'] = true;
            }
            if (!empty($row['diff'])) {
                $row['diff'] = round($row['diff']);
            }
            $ret_val[] = $row;
        }
        return ($id || !empty($filter['hash']) ? array_shift($ret_val) : $ret_val);
    }
    public function deleteBidd($id)
    {
        $sql = "UPDATE " . TBL_AD_BIDD . " SET deleted = '1' WHERE id = '" . addslashes($id) . "'";
        $this->db->exec($sql);
    }
    public function deleteInbox($id)
    {
        $sql = "UPDATE " . TBL_INBOX . " SET deleted = '1' WHERE id = '" . addslashes($id) . "'";
        $this->db->exec($sql);
    }
    public function deleteAd($id)
    {
        $sql = "UPDATE " . TBL_AD . " SET deleted = '1' WHERE id = '" . addslashes($id) . "'";
        $this->db->exec($sql);
    }
    public function selectContent($alias = '', $id = '')
    {
        $ret_val = [];
        $sql_where = "";
        if ($alias) {
            $sql_where .= " AND alias = '" . addslashes($alias) . "' ";
        }
        if ($id) {
            $sql_where .= " AND id = '" . addslashes($id) . "' ";
        }
        $sql = "SELECT * FROM " . TBL_CONTENT . " WHERE 1 " . $sql_where . " AND active = '1' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        $ret_val = $this->setLangCols($result->fetchRow());
        $ret_val['content'] = str_replace(
            '{$lang}',
            $this->lang,
            isset($ret_val['content']) ? $ret_val['content'] : null
        );
        $ret_val['content_en'] = str_replace(
            '{$lang}',
            $this->lang,
            isset($ret_val['content_en']) ? $ret_val['content_en'] : null
        );
        if (isset($ret_val['file']) && $ret_val['file']) {
            $ret_val['file'] = '/' . UPLOAD_PATH_AD . $ret_val['file'];
        }
        return $ret_val;
    }
    public function selectContentByPage($page = '', $id = '')
    {
        $ret_val = [];
        $sql_where = "";
        if ($page) {
            $sql_where .= " AND page = '" . addslashes($page) . "' ";
        }
        if ($id) {
            $sql_where .= " AND id = '" . addslashes($id) . "' ";
        }
        $sql = "SELECT * FROM " . TBL_CONTENT . " WHERE 1 " . $sql_where . " AND active = '1' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        $ret_val = $this->setLangCols($result->fetchRow());
        $ret_val['content'] = str_replace(
            '{$lang}',
            $this->lang,
            isset($ret_val['content']) ? $ret_val['content'] : null
        );
        $ret_val['content_en'] = str_replace(
            '{$lang}',
            $this->lang,
            isset($ret_val['content_en']) ? $ret_val['content_en'] : null
        );
        if (isset($ret_val['file']) && $ret_val['file']) {
            $ret_val['file'] = '/' . UPLOAD_PATH_AD . $ret_val['file'];
        }
        return $ret_val;
    }
    public function insertAd($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO " . TBL_AD . " (" . $cols . ") VALUES(" . $vals . ")";
        //print '<br>' . $sql;
        $this->db->exec($sql);
        $auto_id = mysql_insert_id($this->db->connection);
        return $auto_id;
    }
    public function updateAD($data, $ID)
    {
        $sql = "UPDATE " . TBL_AD . " SET " . Utils::prepareUpdate($data) . " WHERE id = '" . addslashes($ID) . "'";
//       var_dump($sql);
//       exit();
        $this->db->exec($sql);
//        return $sql;
        return true;
    }
    public function insertInquiry($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO " . TBL_INQUIRY . " (" . $cols . ") VALUES(" . $vals . ")";
        //print '<br>' . $sql;
        $this->db->exec($sql);
        $auto_id = mysql_insert_id($this->db->connection);
        return $auto_id;
    }
    public function selectVendors($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');
        if ($id) {
            $sql_where .= " AND id = '" . addslashes($id) . "' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['company']);
        }
        if ($order) {
            $sql_order = " ORDER BY " . $order . " " . $sort;
        }
        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt
					FROM " . TBL_VENDOR . "
					WHERE 1 " . $sql_where;
            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }
        $sql = "SELECT *
				FROM " . TBL_VENDOR . "
				WHERE 1 " . $sql_where . $sql_order . $sql_limit;
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            if ($row['file']) {
                $row['thumb'] = '/' . UPLOAD_PATH_AD . '250_' . $row['file'];
                $row['file'] = '/' . UPLOAD_PATH_AD . $row['file'];
            }
            $ret_val[] = $row;
        }
        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }
    public function insertVendor($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO " . TBL_VENDOR . " (" . $cols . ") VALUES(" . $vals . ")";
        //print '<br>' . $sql;
        $this->db->exec($sql);
        $auto_id = mysql_insert_id($this->db->connection);
        return $auto_id;
    }
    public function insertCustomer($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO " . TBL_CUSTOMER . " (" . $cols . ") VALUES(" . $vals . ")";
        //print '<br>' . $sql;
        $this->db->exec($sql);
        $auto_id = mysql_insert_id($this->db->connection);
        return $auto_id;
    }
    public function getCustomerEmail($id)
    {
        $sql = "SELECT email FROM " . TBL_CUSTOMER . " WHERE id = '" . addslashes($id) . "'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $customer = $result->fetchRow();
            return $customer['email'];
        }
        return null;
    }
    public function verifyCustomerVerificationCode($email, $verificationCode)
    {
        $sql = "SELECT verificationCode FROM " . TBL_CUSTOMER . " WHERE email = '" . addslashes($email) . "'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $customer = $result->fetchRow();
            if (strcmp($customer['verificationcode'], $verificationCode) == 0) {
                $sql = "UPDATE " . TBL_CUSTOMER . " SET active = '1' WHERE email = '" . addslashes($email) . "'";
                $this->db->exec($sql);
                return true;
            }
        }
        return false;
    }
    public function insertBidd($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO " . TBL_AD_BIDD . " (" . $cols . ") VALUES(" . $vals . ")";
        //print '<br>' . $sql;
        $this->db->exec($sql);
        $auto_id = mysql_insert_id($this->db->connection);
        return $auto_id;
    }
    public function selectBidd($customer_id = '', $id = '', $ad_id = '')
    {
        $ret_val = [];
        $sql_where = " AND i.deleted = '0' ";
        if ($customer_id) {
            $sql_where .= " AND i.customer_id = '" . addslashes($customer_id) . "' ";
        }
        if ($ad_id) {
            $sql_where .= " AND i.ad_id = '" . addslashes($ad_id) . "' ";
        }
        if ($id) {
            $sql_where .= " AND i.id = '" . addslashes($id) . "' ";
        }
        $sql = "SELECT i.*
				FROM " . TBL_AD_BIDD . " i
				WHERE 1 " . $sql_where . ' ORDER BY i.cdate DESC';
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $row['customer_id'] = str_pad($row['customer_id'], 6, '0', STR_PAD_LEFT);
            $ret_val[] = $row;
        }
        if ($id && count($ret_val) > 0) {
            $ret_val = $ret_val[0];
        }
        return $ret_val;
    }
    public function selectInbox($vendor_id = '', $customer_id = '', $id = '', $ad_id = '')
    {
        $ret_val = [];
        $sql_where = " AND i.deleted = '0' ";
        if ($vendor_id) {
            $sql_where .= " AND i.vendor_id = '" . addslashes($vendor_id) . "' ";
        }
        if ($customer_id) {
            $sql_where .= " AND i.customer_id = '" . addslashes($customer_id) . "' ";
        }
        if ($ad_id) {
            $sql_where .= " AND i.ad_id = '" . addslashes($ad_id) . "' ";
        }
        if ($id) {
            $sql_where .= " AND i.id = '" . addslashes($id) . "' ";
        }
        $sql = "SELECT i.*, i.id as inbox_id, a.id, a.title, a.days, a.persons, v.company, v.phone vendor_phone, v.mobile vendor_mobile, v.email vendor_email
				FROM " . TBL_INBOX . " i
				LEFT JOIN " . TBL_AD . " a ON(a.id = i.ad_id)
				LEFT JOIN " . TBL_VENDOR . " v ON(v.id = i.vendor_id)
				WHERE 1 " . $sql_where . ' ORDER BY i.cdate DESC';
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $row['customer_id'] = str_pad($row['customer_id'], 6, '0', STR_PAD_LEFT);
            $ret_val[] = $row;
        }
        if ($id && count($ret_val) > 0) {
            $ret_val = $ret_val[0];
        }
        return $ret_val;
    }
    public function selectInboxParent($customer_id, $vendor_id, $ad_id, $sender)
    {
        $sql = "SELECT * FROM " . TBL_INBOX . " WHERE vendor_id = '" . $vendor_id . "' AND customer_id = '" . $customer_id
            . "' AND ad_id = '" . $ad_id . "' AND sender = '" . $sender . "' ORDER BY id DESC LIMIT 1";
        //print '<br>' . $sql;
        return $this->db->queryRow($sql);
    }
    public function insertInbox($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO " . TBL_INBOX . " (" . $cols . ") VALUES(" . $vals . ")";
        //print '<br>' . $sql;
        $this->db->exec($sql);
        $auto_id = mysql_insert_id($this->db->connection);
        return $auto_id;
    }
    public function selectBiddOverview($vendor_id = '', $customer_id = '', $ad_id = '')
    {
        $ret_val = [];
        $sql_where = " (vibo.deleted = 0 AND (vibo.c_deleted = 0 OR vibo.c_deleted IS NULL) AND (vibo.v_deleted = 0 OR vibo.v_deleted IS NULL)) ";
        // $sql_where = " (vibo.deleted = 0) ";
        if ($vendor_id) {
            $sql_where .= " AND vibo.ad_id IN (SELECT id FROM " . TBL_AD . " WHERE vendor_id = '" . addslashes($vendor_id)
                . "') ";
        }
        if ($customer_id) {
            $sql_where .= " AND vibo.customer_id = '" . addslashes($customer_id) . "' ";
        }
        if ($ad_id) {
            $sql_where .= " AND vibo.ad_id = '" . addslashes($ad_id) . "' ";
        }
        $sql = "SELECT vibo.*, vvamc.new_message_count
                FROM " . VIEW_INBOX_BIDD_OVERVIEW .
            " vibo LEFT JOIN " . VIEW_VENDOR_AD_MESSAGE_COUNT . " vvamc ON vibo.ad_id = vvamc.ad_id WHERE " . $sql_where
            . ' ORDER BY ad_id DESC, GREATEST(v_cdate, c_cdate) DESC';
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $row['customer_id'] = str_pad($row['customer_id'], 6, '0', STR_PAD_LEFT);
            $row['cnt_bidds_left'] = $this->hobbids - $row['count_bidds'];
            $row['file1'] = '/' . UPLOAD_PATH_AD . '700x468_' . $row['file1'];
            $row['c_deletable'] = !(($row['c_accepted_c'] == 1 && $row['c_accepted_v'] == 1)
                || ($row['v_accepted_c'] == 1
                    && $row['v_accepted_v'] == 1));
            $ret_val[] = $row;
        }
        if ($ad_id) {
            $ret_val = $ret_val[0];
        }
        return $ret_val;
    }
    public function countCustomerAdBidds($customer_id, $ad_id, $only_accepted = false)
    {
        $sql_where = "";
        if ($only_accepted) {
            $sql_where .= " AND accepted = '1' ";
        }
        $sql = "SELECT COUNT(*) AS cnt FROM " . TBL_AD_BIDD . " WHERE customer_id = '" . addslashes($customer_id)
            . "' AND deleted = '0' AND ad_id = '" . addslashes($ad_id) . "' " . $sql_where;
        //print '<br>' . $sql;
        return $this->db->queryOne($sql, null, 'cnt');
    }
    public function updateVendor($data)
    {
        //var_dump(Utils::prepareUpdate($data)); die();
        $sql = "UPDATE " . TBL_VENDOR . " SET " . Utils::prepareUpdate($data) . " WHERE id = '" . addslashes($data['id']) . "'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }
    public function confirmRegister($acceptid, $user2)
    {
        $ret_val = false;
        $sql = "SELECT * FROM " . TBL_VENDOR . " WHERE acceptid = '" . addslashes($acceptid) . "' AND active = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $user = $result->fetchRow();
            $sql = "UPDATE " . TBL_VENDOR . " SET active = '1' WHERE acceptid = '" . addslashes($acceptid) . "'";
            //print '<br>' . $sql; exit;
            $this->db->exec($sql);
            $this->user->auth($user['email'], $user['password']);
            $ret_val = true;
        }
        return $ret_val;
    }
    public function selectContentInfo()
    {
        $ret_val = [];
        $sql = "SELECT id, active, content, content_en, file, file_en FROM " . TBL_CONTENT;
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $ret_val[$row['id']] = $row;
        }
        return $ret_val;
    }
    public function emailExists($email, $id = '')
    {
        $sql = "SELECT * FROM " . TBL_VENDOR . " WHERE email = '" . addslashes($email) . "' AND id <> '" . addslashes($id)
            . "' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            return true;
        } else {
            return false;
        }
    }
    public function emailUserExists($email, $id = '')
    {
        $sql = "SELECT * FROM " . TBL_CUSTOMER . " WHERE email = '" . addslashes($email) . "' AND id <> '" . addslashes($id)
            . "' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            return true;
        } else {
            return false;
        }
    }
    public function phoneExists($phone, $id = '')
    {
        return false;
        if ($phone == '00436648312210' || $phone == '0043661000120') {
            return false;
        }
        $sql = "SELECT * FROM " . TBL_VENDOR . " WHERE phone = '" . addslashes($phone) . "' AND id <> '" . addslashes($id) . "'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            return true;
        } else {
            return false;
        }
    }
    public function optCategory($choose, $first_empty = false)
    {
        $data = [];
        if ($first_empty) {
            $data[] = '';
        }
        $sql = "SELECT * FROM " . TBL_CATEGORY
            . " WHERE active = '1' AND id <> 5 AND id <> 6 AND id <> 7 AND deleted = '0' ORDER BY sort ASC, name ASC";
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->setLangCols($row);
            $data[$row['id']] = $row['name'];
        }
        return Utils::checkboxOptions($data, $choose, "category");
    }
    public function optFacility($choose, $first_empty = false, $fieldname = "facility")
    {
        $data = [];
        if ($first_empty) {
            $data[] = '';
        }
        $sql = "SELECT * FROM " . TBL_FACILITY
            . " WHERE active = '1' AND deleted = '0' ORDER BY sort ASC, name ASC";
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->setLangCols($row);
            $data[$row['id']] = [
                'name' => $row['name'],
                'icon' => $row['icon'],
            ];
        }
        return Utils::checkboxOptions($data, $choose, $fieldname);
    }
    public function optProvision($choose, $first_empty = false)
    {
        $data = [];
        if ($first_empty) {
            $data[] = '';
        }
        $sql = "SELECT * FROM " . TBL_PROVISION
            . " WHERE active = '1' AND deleted = '0' ORDER BY sort ASC, name ASC";
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->setLangCols($row);
            $data[$row['id']] = $row['name'];
        }
        return Utils::checkboxOptions($data, $choose, "provision");
    }
    public function textlistCategory($choose, $seperator, $first_empty = false)
    {
        $data = [];
        if ($first_empty) {
            $data[] = '';
        }
        $sql = "SELECT * FROM " . TBL_CATEGORY
            . " WHERE active = '1' AND id <> 5 AND id <> 6 AND id <> 7 AND deleted = '0' ORDER BY sort ASC, name ASC";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->setLangCols($row);
            $data[$row['id']] = $row['name'];
        }
        return Utils::textlistOptions($data, $choose, $seperator);
    }
    public function textlistFacility($choose, $seperator, $first_empty = false)
    {
        $data = [];
        if ($first_empty) {
            $data[] = '';
        }
        $sql = "SELECT * FROM " . TBL_FACILITY
            . " WHERE active = '1' AND deleted = '0' ORDER BY sort ASC, name ASC";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->setLangCols($row);
            $data[$row['id']] = $row['name'];
        }
        return Utils::textlistOptions($data, $choose, $seperator);
    }
    public function textlistProvision($choose, $seperator, $first_empty = false)
    {
        $data = [];
        if ($first_empty) {
            $data[] = '';
        }
        $sql = "SELECT * FROM " . TBL_PROVISION
            . " WHERE active = '1' AND deleted = '0' ORDER BY sort ASC, name ASC";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->setLangCols($row);
            $data[$row['id']] = $row['name'];
        }
        return Utils::textlistOptions($data, $choose, $seperator);
    }
    public function iconlistFacility($choose)
    {
        $data = [];
        if (empty($choose)) {
            return $data;
        }
        $sql = "SELECT * FROM " . TBL_FACILITY
            . " WHERE active = '1' AND deleted = '0' AND id IN (" . implode(',', $choose)
            . ") ORDER BY sort ASC, name ASC";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->setLangCols($row);
            $data[$row['id']] = [
                'name' => $row['name'],
                'icon' => $row['icon'],
            ];
        }
        return $data;
    }
    public function addressToCoordinates($street, $postalcode, $location)
    {
        $address = urlencode($street . ' ' . $postalcode . ' ' . $location);
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&sensor=false';
        $data = file_get_contents($url);
        $data = json_decode($data);
        //if (DEBUG) {
        //print_r($data);
        //}
        if (!empty($data->results[0]->geometry->location->lat) && !empty($data->results[0]->geometry->location->lng)) {
            $ret_val = [
                'latitude' => $data->results[0]->geometry->location->lat,
                'longitude' => $data->results[0]->geometry->location->lng,
            ];
            //print_r($ret_val);
            return $ret_val;
        }
    }
    public function sendActivationSMS($number, $code)
    {
        $url = 'https://api.oja.at/sms/send/username=noomcee&password=yBd4uwR86x&sms_message=' . $code . '&send_to='
            . $number;
        $result = file_get_contents($url);
        if (preg_match('/\<error\_message\>(.*)\<\/error\_message\>/', $result, $match)) {
            return $match[1];
        }
    }
    public function checkCaptcha($response)
    {
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . G_RECAPTCHA . "&response=" . $response
            . "&remoteip=" . $_SERVER['REMOTE_ADDR'];
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success == true) {
            return true;
        }
        return false;
    }
    public function sendNewPasswordLink($email)
    {
        $sql = "SELECT * FROM " . TBL_VENDOR . " WHERE email = '" . addslashes($email) . "' AND active = '1'";
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $pwd_reset_token = Utils::generatePassword(16);
            $sql = "UPDATE " . TBL_VENDOR . " SET pwd_reset_token = '" . $pwd_reset_token . "' WHERE email = '" . addslashes(
                    $email
                ) . "'";
            $this->db->exec($sql);
            $msg = [];
            $msg[] = $this->getTranslation('email_sendnewpassword_text_1');
            $msg[] = '';
            $msg[] = SITE_URL . '/' . $this->lang . '/neues-passwort-erstellen/' . $pwd_reset_token . '/';
            $msg[] = '';
            $msg[] = $this->getTranslation('email_sendnewpassword_text_2');
            Utils::sendTextMail(
                $email,
                $this->getTranslation('email_sendnewpassword_subject'),
                implode("\n", $msg),
                EMAIL_FROM_SYSTEM
            );
            return true;
        }
        return false;
    }
    public function sendCustomerVerificationCode($email, $verificationCode)
    {
        // $msg = array();
        // $msg[] = $this->getTranslation('email_registration_text_1');
        // $msg[] = '';
        // $msg[] = $this->getTranslation('email_registration_text_2');
        // $msg[] = '';
        // $msg[] = SITE_URL . '/' . $this->lang . '/user-verification/' . urlencode($email) . '/' . $verificationCode . '/';
        // $msg[] = '';
        // $msg[] = $this->getTranslation('email_registration_text_3');
        // Utils::sendTextMail($email, $this->getTranslation('email_registration_subject'), implode("\n", $msg), EMAIL_FROM_SYSTEM);
        $banner = $this->selectStartImages();
        $template_file = DOCUMENT_ROOT_PATH . '/inc/templates/email/customer_email_verificationcode_' . $this->lang . '.php';
        $swap_array = [
            "{ACTIVATIONLINK}" => SITE_URL . '/' . $this->lang . '/user-verification/' . urlencode($email) . '/'
                . $verificationCode . '/',
            "{EMAIL_HEADER_IMAGE}" => SITE_URL . '/' . $banner[1011]['image'],
            "{EMAIL_FACEBOOK_IMAGE}" => SITE_URL . '/' . $banner[1012]['image'],
            "{EMAIL_INSTAGRAM_IMAGE}" => SITE_URL . '/' . $banner[1014]['image'],
            "{EMAIL_TWITTER_IMAGE}" => SITE_URL . '/' . $banner[1013]['image'],
        ];
        $message = file_get_contents($template_file);
        foreach (array_keys($swap_array) as $key) {
            $message = str_replace($key, $swap_array[$key], $message);
        }
        Utils::sendHTMLMail($email, $this->getTranslation('email_registration_subject'), $message, EMAIL_FROM_SYSTEM);
    }
    public function updateVendorPassword($password, $token)
    {
        $sql = "UPDATE " . TBL_VENDOR . " SET pwd_reset_token = '', password = '" . sha1(addslashes($password))
            . "' WHERE pwd_reset_token = '" . addslashes($token) . "'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }
    public function isValidPasswordChangeToken($token)
    {
        $sql = "SELECT * FROM " . TBL_VENDOR . " WHERE pwd_reset_token = '" . addslashes($token) . "'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            return true;
        }
        return false;
    }
    public function selectKeywordList()
    {
        $ret_val = [];
        $sql = "SELECT * FROM " . TBL_KEYWORD . " WHERE id = '1'";
        //print '<br>' . $sql;
        $content = $this->db->queryOne($sql, null, 'content');
        $keywords = explode("\n", strtolower($content));
        foreach ($keywords as $key => $val) {
            $ret_val[trim($val)] = trim($val);
        }
        return $ret_val;
    }
    public function optCountryDatabase($choose)
    {
        if (strcmp(strtoupper($this->lang), 'EN') == 0) {
            $data = ['' => 'Please select'];
        } else {
            $data = ['' => 'Bitte wählen'];
        }
        $sql = "SELECT * FROM " . TBL_COUNTRY
            . " WHERE active = '1' AND deleted = '0' ORDER BY name ASC";
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->setLangCols($row);
            $data[$row['name']] = trim($row['name']);
        }
        return Utils::optOptions($data, $choose);
    }
    public function optCountry($choose)
    {
        $tmp = file('files/countries.txt');
        //print_r($tmp);
        if (strcmp(strtoupper($this->lang), 'EN') == 0) {
            $data = ['' => 'Please select'];
        } else {
            $data = ['' => 'Bitte wählen'];
        }
        foreach ($tmp as $key => $val) {
            $data[trim($val)] = trim($val);
        }
        natsort($tmp);
        return Utils::optOptions($data, $choose);
    }
    public function optAccomodationTypes($choose)
    {
        $tmp = file('files/accomodationTypes_' . $this->lang . '.txt');
        //print_r($tmp);
        foreach ($tmp as $key => $val) {
            $data[trim($val)] = trim($val);
        }
        natsort($tmp);
        return Utils::optOptions($data, $choose);
    }
    public function optAccomodationTypesAsCheckbox($choose)
    {
        $tmp = file('files/accomodationTypes_' . $this->lang . '.txt');
        //print_r($tmp);
        foreach ($tmp as $key => $val) {
            $data[trim($val)] = trim($val);
        }
        natsort($tmp);
        return Utils::checkboxOptions($data, $choose, "accomodationType");
    }
    public function isEuCountry($country)
    {
        $countries = [
            'Austria (Österreich)',
            'Belgium (Belgien)',
            'Bulgaria (Bulgarien)',
            'Cyprus (Zypern)',
            'Czech Republic (Tschechische Republik)',
            'Germany (Deutschland)',
            'Denmark (Dänemark)',
            'Estonia (Estland)',
            'Greece (Griechenland)',
            'Spain (Spanien)',
            'Finland (Finnland)',
            'France (Frankreich)',
            'Greate Britain (Großbritannien)',
            'Croatia (Kroatien)',
            'Hungary (Ungarn)',
            'Ireland (Irland)',
            'Italy (Italien)',
            'Lithuania (Litauen)',
            'Luxembourg (Luxemburg)',
            'Latvia (Lettland)',
            'Malta (Malta)',
            'Netherlands (Niederlande)',
            'Poland (Polen)',
            'Portugal (Portugal)',
            'Romania (Rumänien)',
            'Sweden (Schweden)',
            'Slovenia (Slowenien)',
            'Slovakia (Slowakei)',
        ];
        if (in_array($country, $countries)) {
            return true;
        }
    }
    protected function setLangCols(&$data, $lang = '', $exclude = [])
    {
        $this->languages = ['de', 'en'];
        $lang = ($lang ? $lang : $this->lang);
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                if (!in_array($key, $exclude)) {
                    if ((substr($key, -3, 1) == '_') && (in_array(substr($key, -2), $this->languages))) {
                        if (substr($key, -2) == $lang) {
                            $data[substr($key, 0, -3)] = html_entity_decode($val);
                        }
                    }
                }
            }
        }
        return $data;
    }
    public function validateVatNumber($vatid)
    {
        //$vatid = 'ATU12345678'; // Hier die zu überprüfende UID-Nummer einsetzen
        //mwelz will fix this later :-)
        return true;
        $vatid = strtoupper($vatid);
        $vatid = str_replace([' ', '.', '-', ',', ', '], '', trim($vatid));
        $cc = substr($vatid, 0, 2);
        $vn = substr($vatid, 2);
        $client = new SoapClient("http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl");
        if ($client) {
            $params = ['countryCode' => $cc, 'vatNumber' => $vn];
            try {
                $r = $client->checkVat($params);
                if ($r->valid == true) {
                    // USt-ID ist gültig
                    return true;
                } else {
                    // USt-ID ist ungültig
                    return false;
                }
                // Alle Ergebniszeilen durchlaufen lassen und ausgeben
                /*foreach($r as $k=>$prop){
                    echo $k . ': ' . $prop;
                }*/
            } catch (SoapFault $e) {
                echo 'Error, see message: ' . $e->faultstring;
            }
        } else {
            // Verbindungsfehler, WSDL-Datei nicht erreichbar (passiert manchmal)
            return false;
        }
    }
    public function selectPackage($id)
    {
        if ($id == 0) {
            $id = 1;
        }
        $sql = "SELECT * FROM " . TBL_PACKAGE . " WHERE id = '" . addslashes($id) . "'";
        return $this->setLangCols($this->db->queryRow($sql));
    }
    public function optAdType($choose = '', $_x = false)
    {
        $data = [
            //'raffle' => $this->getTranslation('type_raffle'),
            //'raffle_offer' => $this->getTranslation('type_raffle_offer'),
        ];
        if ($_x) {
            $data['offer'] = $this->getTranslation('type_offer');
        }
        return Utils::optOptions($data, $choose);
    }
    public function delInbox($params)
    {
        $sql = "UPDATE " . TBL_INBOX . " SET deleted = '1' WHERE ad_id = '" . addslashes($params['ad_id'])
            . "' AND customer_id = '" . addslashes($params['customer_id']) . "' AND vendor_id = '" . addslashes(
                $params['vendor_id']
            ) . "' ";
        $this->db->exec($sql);
    }
    public function optCategoryList($choose, $first_empty = false)
    {
        $data = [];
        if ($first_empty) {
            $data[] = '';
        }
        $sql = "SELECT * FROM " . TBL_CATEGORY
            . " WHERE active = '1' AND id <> 5 AND id <> 6 AND id <> 7 AND deleted = '0' ORDER BY sort ASC, name ASC";
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->setLangCols($row);
            $data[$row['id']] = $row['name'];
        }
        return Utils::optOptions($data, $choose);
    }
    public function optTravellingPeriodList($dataArray, $choose, $first_empty = false)
    {

        $data = [];
        foreach($dataArray as $key => $val) 
        {
            // $travellingPeriod = date('F Y', strtotime($val['date_from']));
            $travellingPeriod = date('Y-m', strtotime($val['date_from']));
            $date_until = date('Y-m', strtotime("+1 month",strtotime($val['date_until'])));
            $period = new DatePeriod(
                new DateTime($travellingPeriod),
                new DateInterval('P1D'),
                new DateTime($date_until)
            );

            foreach ($period as $key => $value) 
            {
                $Store = $value->format('F Y');
                if(!in_array($Store, $data))
                {
                    $data[] = $Store;
                }
            }
            // $data[date('Y-m', strtotime($val['date_from']))] = $travellingPeriod;
        }
        unset($data["-0001-11"]);
        return Utils::optOptions($data, $choose);
    }
    public function selectAdsFilter(
        $category_id = '',
        $id = '',
        $latest = false,
        $count = false,
        $filter = [],
        $limit = 0,
        $rand = false,
        $featured = false,
        $ignore_active = false,
        $group_by = false
    )
    {
        $ret_val = [];
        $sql_select = "";
        $sql_where = "";
        $sql_order = "";
        $sql_group_by = "";
        if ($ignore_active == false) 
        {
            $sql_where = " AND (a.active = '1' OR is_offer = '1') AND a.deleted = '0' ";
        }
        if($group_by) 
        {
            $sql_select .= ", date_format(a.date_from, '%Y %M')";
            $sql_group_by .= " GROUP BY year(a.date_from),month(a.date_from)";
            $sql_limit = ' ORDER BY a.date_from ASC';
        }
        $sql = "SELECT a.*, v.company " . $sql_select . "
				FROM " . TBL_AD . " a
				LEFT JOIN " . TBL_VENDOR . " v ON(v.id = a.vendor_id)
				WHERE 1 " . $sql_where . $sql_order . $sql_group_by . $sql_limit;
        // echo $sql;die();
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) 
        {
            $ret_val[] = $row;
        }
        return $ret_val;
    }
    public function selectFilteredAds(
        $category_id = '',
        $id = '',
        $latest = false,
        $count = false,
        $filter = [],
        $limit = 0,
        $rand = false,
        $featured = false,
        $ignore_active = false
    )
    {
        $ret_val = [];
        $sql_select = "";
        $sql_where = "";
        $sql_order = "";
//        $sql_limit = (!$id && !$featured ? Utils::limit($this->data_per_page) : '');
        if ($ignore_active == false) {
            $sql_where = " AND (a.active = '1' OR is_offer = '1') AND a.deleted = '0' ";
        }
        if ($limit) {
            $sql_limit = " LIMIT " . addslashes($limit) . " ";
        }
        if ($rand) {
            $sql_order = " ORDER BY RAND() ";
        }
        if (!empty($filter['postalcode'])) {
            $sql_where .= " AND ((a.title LIKE '%" . addslashes($filter['postalcode']) . "%') OR (a.location LIKE '%"
                . addslashes($filter['postalcode']) . "%') OR (a.country LIKE '%" . addslashes(
                    $filter['postalcode']
                ) . "%') OR (a.content LIKE '%" . addslashes($filter['postalcode']) . "%') OR (a.priceinfo LIKE '%"
                . addslashes($filter['postalcode']) . "%') OR (v.company LIKE '%" . addslashes(
                    $filter['postalcode']
                ) . "%') OR ((v.location LIKE '%" . addslashes($filter['postalcode'])
                . "%') AND (a.location = '')) OR ((v.country LIKE '%" . addslashes($filter['postalcode'])
                . "%') AND (a.country = ''))) ";
            $sql_order = " ORDER BY a.id DESC ";
        }
        if (!empty($filter['filter_travel_period']) && $filter['filter_travel_period'] != "0") {
            $travelPeriodDate = explode('-', $filter['filter_travel_period']);
            $sql_where .= " AND MONTH(date_from) = " . $travelPeriodDate[1] . " AND YEAR(date_from) = " . $travelPeriodDate[0] . "";
        }
        if ($count) {
            $sql = "SELECT *,COUNT(*) AS cnt
					FROM " . TBL_AD . " a
					LEFT JOIN " . TBL_VENDOR . " v ON(v.id = a.vendor_id)
					WHERE 1 " . $sql_where;
            return $this->db->queryOne($sql, null, 'cnt');
        }
        $sql = "SELECT a.*, v.company " . $sql_select . "
				FROM " . TBL_AD . " a
				LEFT JOIN " . TBL_VENDOR . " v ON(v.id = a.vendor_id)
				WHERE 1 " . $sql_where . $sql_order . $sql_limit;
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            for ($i = 1; $i <= 10; $i++) {
                if ($row['file' . $i]) {
                    $row['file' . $i . '_639'] = '/' . UPLOAD_PATH_AD . '639x530_' . $row['file' . $i];
                    $row['file' . $i . '_318'] = '/' . UPLOAD_PATH_AD . '318x265_' . $row['file' . $i];
                    $row['file' . $i . '_150'] = '/' . UPLOAD_PATH_AD . '150x150_' . $row['file' . $i];
                    $row['file' . $i . '_830'] = '/' . UPLOAD_PATH_AD . '830x455_' . $row['file' . $i];
                    $row['file' . $i . '_338'] = '/' . UPLOAD_PATH_AD . '338x342_' . $row['file' . $i];
                    $row['file' . $i . '_698'] = '/' . UPLOAD_PATH_AD . '698x342_' . $row['file' . $i];
                    $row['file' . $i . '_700'] = '/' . UPLOAD_PATH_AD . '700x468_' . $row['file' . $i];
                    $row['file' . $i . '_340'] = '/' . UPLOAD_PATH_AD . '340x340_' . $row['file' . $i];
                    if (!file_exists(UPLOAD_PATH_AD . '318x265_' . $row['file' . $i])) {
                        $row['file' . $i . '_318'] = '/' . UPLOAD_PATH_AD . '260x175_' . $row['file' . $i];
                    }
                    if (!file_exists(UPLOAD_PATH_AD . '639x530_' . $row['file' . $i])) {
                        $row['file' . $i . '_639'] = '/' . UPLOAD_PATH_AD . '260x175_' . $row['file' . $i];
                    }
                }
            }
            if ($row['cdate'] + 60 * 60 * 24 * 3 > time()) {
                $row['new'] = true;
            }
            if (!empty($row['diff'])) {
                $row['diff'] = round($row['diff']);
            }
            $ret_val[] = $row;
        }
        return ($id || !empty($filter['hash']) ? array_shift($ret_val) : $ret_val);
    }
    public function deleteDesiredDate($ad_id, $user_id)
    {
        $sql = "DELETE FROM " . TBL_AD_DESIRED_DATE . " WHERE ad_id = '" . addslashes($ad_id) . "' AND user_id = '" . addslashes($user_id) . "'";
        $this->db->exec($sql);
    }
    public function selectDesiredDate($ad_id, $user_id)
    {
        $sql = "SELECT * FROM " . TBL_AD_DESIRED_DATE . " WHERE ad_id = '" . addslashes($ad_id) . "' AND user_id = '" . addslashes($user_id) . "'";
        return $this->db->query($sql)->fetchRow();
    }
    public function insertDesiredDate($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO " . TBL_AD_DESIRED_DATE . " (" . $cols . ") VALUES(" . $vals . ")";
        //print '<br>' . $sql;
        $this->db->exec($sql);
        $auto_id = mysql_insert_id($this->db->connection);
        return $auto_id;
    }
}
?>