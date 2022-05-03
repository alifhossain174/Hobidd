<?php

class Admin_Model extends Backend_Model
{

    public function __construct($user, $acl)
    {
        parent::__construct($user);
        $this->acl =& $acl;
    }

    public function selectUsers($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = "";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND u.id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['u.firstname', 'u.lastname', 'u.username']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt
					FROM ".TBL_USER." u
					WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT u.*
				FROM ".TBL_USER." u
				WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertUser($data)
    {
        $data['cdate'] = time();

        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_USER." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateUser($data)
    {
        $sql = "UPDATE ".TBL_USER." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteUser($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateUser($data);
    }

    public function selectFacilities(
        $id = '',
        $filter = [],
        $count = false,
        $order = '',
        $sort = '',
        $limit = true
    ) {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['id', 'name']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt FROM ".TBL_FACILITY." WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT * FROM ".TBL_FACILITY." WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertFacility($data)
    {
        $data['user_id'] = $this->user->getUserID();
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_FACILITY." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateFacility($data)
    {
        $sql = "UPDATE ".TBL_FACILITY." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteFacility($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateFacility($data);
    }

    public function selectProvisions(
        $id = '',
        $filter = [],
        $count = false,
        $order = '',
        $sort = '',
        $limit = true
    ) {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['id', 'name']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt FROM ".TBL_PROVISION." WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT * FROM ".TBL_PROVISION." WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertProvision($data)
    {
        $data['user_id'] = $this->user->getUserID();
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_PROVISION." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateProvision($data)
    {
        $sql = "UPDATE ".TBL_PROVISION." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteProvision($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateProvision($data);
    }

    public function selectCountries(
        $id = '',
        $filter = [],
        $count = false,
        $order = '',
        $sort = '',
        $limit = true
    ) {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['id', 'name']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt FROM ".TBL_COUNTRY." WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT * FROM ".TBL_COUNTRY." WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertCountry($data)
    {
        $data['user_id'] = $this->user->getUserID();
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_COUNTRY." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateCountry($data)
    {
        $sql = "UPDATE ".TBL_COUNTRY." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteCountry($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateCountry($data);
    }

    public function selectCategories(
        $parent_id = '',
        $id = '',
        $filter = [],
        $count = false,
        $order = '',
        $sort = '',
        $limit = true
    ) {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($parent_id != '') {
            $sql_where .= " AND parent_id = '".addslashes($parent_id)."' ";
        }

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['id', 'name']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt FROM ".TBL_CATEGORY." WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT * FROM ".TBL_CATEGORY." WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertCategory($data)
    {
        $data['user_id'] = $this->user->getUserID();
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_CATEGORY." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateCategory($data)
    {
        $sql = "UPDATE ".TBL_CATEGORY." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteCategory($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateCategory($data);
    }

    public function selectVideos($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['id', 'name']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt FROM ".TBL_VIDEO." WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT * FROM ".TBL_VIDEO." WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertVideo($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_VIDEO." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateVideo($data)
    {
        $sql = "UPDATE ".TBL_VIDEO." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteVideo($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateVideo($data);
    }

    public function selectVendors($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['company']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort." ";
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt
					FROM ".TBL_VENDOR."
					WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT *
				FROM ".TBL_VENDOR."
				WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertVendor($data)
    {
        $data['cdate'] = time();

        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_VENDOR." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateVendor($data)
    {
        $sql = "UPDATE ".TBL_VENDOR." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteVendor($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateVendor($data);
    }

    public function selectCustomers($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['company']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt
					FROM ".TBL_CUSTOMER."
					WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT *
				FROM ".TBL_CUSTOMER."
				WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertCustomer($data)
    {
        $data['cdate'] = time();

        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_CUSTOMER." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateCustomer($data)
    {
        $sql = "UPDATE ".TBL_CUSTOMER." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteCustomer($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateCustomer($data);
    }

    public function selectAds($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = " AND a.deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND a.id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['a.title', 'a.content']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt, v.common_description, v.common_description_en
					FROM ".TBL_AD." a
					LEFT JOIN ".TBL_VENDOR." v ON(v.id = a.vendor_id)
					LEFT JOIN ".TBL_CATEGORY." c ON(c.id = a.category_id)
					WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT a.*, v.company AS vendor, c.name AS category, v.common_description, v.common_description_en
				FROM ".TBL_AD." a
				LEFT JOIN ".TBL_VENDOR." v ON(v.id = a.vendor_id)
				LEFT JOIN ".TBL_CATEGORY." c ON(c.id = a.category_id)
				WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertAd($data)
    {
        $data['cdate'] = time();

        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_AD." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateAd($data)
    {
        $sql = "UPDATE ".TBL_AD." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteAd($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateAd($data);
    }

    public function selectContents($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['title', 'content']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt
					FROM ".TBL_CONTENT."
					WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT *
				FROM ".TBL_CONTENT."
				WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertContent($data)
    {
        $data['cdate'] = time();

        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_CONTENT." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateContent($data)
    {
        $sql = "UPDATE ".TBL_CONTENT." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteContent($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateContent($data);
    }

    public function selectStartImages($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['title']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt
					FROM ".TBL_START_IMAGE."
					WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT *
				FROM ".TBL_START_IMAGE."
				WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertStartImage($data)
    {
        $data['cdate'] = time();

        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_START_IMAGE." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateStartImage($data)
    {
        $sql = "UPDATE ".TBL_START_IMAGE." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])
               ."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteStartImage($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updateStartImage($data);
    }

    public function selectKeywordList($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['content']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt
					FROM ".TBL_KEYWORD."
					WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT *
				FROM ".TBL_KEYWORD."
				WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function updateKeywordList($data)
    {
        $sql = "UPDATE ".TBL_KEYWORD." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function selectTranslations($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = "";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['`key`', 'lang_de', 'lang_en']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt FROM ".TBL_TRANSLATION." WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT * FROM ".TBL_TRANSLATION." WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertTranslation($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_TRANSLATION." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updateTranslation($data)
    {
        $sql = "UPDATE ".TBL_TRANSLATION." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])
               ."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deleteTranslation($id)
    {
        $sql = "DELETE FROM ".TBL_TRANSLATION." WHERE id = '".addslashes($id)."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function selectPackages($id = '', $filter = [], $count = false, $order = '', $sort = '', $limit = true)
    {
        $ret_val   = [];
        $sql_where = " AND deleted = '0' ";
        $sql_order = "";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        if ($id) {
            $sql_where .= " AND id = '".addslashes($id)."' ";
        }
        if (!empty($filter['query'])) {
            $sql_where .= Utils::filter($filter['query'], ['name_de']);
        }
        if ($order) {
            $sql_order = " ORDER BY ".$order." ".$sort;
        }

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt
					FROM ".TBL_PACKAGE."
					WHERE 1 ".$sql_where;

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT *
				FROM ".TBL_PACKAGE."
				WHERE 1 ".$sql_where.$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

    public function insertPackage($data)
    {
        $data['cdate'] = time();

        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_PACKAGE." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function updatePackage($data)
    {
        $sql = "UPDATE ".TBL_PACKAGE." SET ".Utils::prepareUpdate($data)." WHERE id = '".addslashes($data['id'])."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function deletePackage($id)
    {
        $data = [
            'id'      => $id,
            'deleted' => '1',
        ];
        $this->updatePackage($data);
    }

    public function optVendor($choose)
    {
        $data = [
            0 => '',
        ];

        $sql = "SELECT * FROM ".TBL_VENDOR." WHERE deleted = '0' ORDER BY company ASC";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $data[$row['id']] = $row['company'];
        }

        return Utils::optOptions($data, $choose);
    }

    public function optPackage($choose)
    {
        $data = [
            0 => '',
        ];

        $sql = "SELECT * FROM ".TBL_PACKAGE." WHERE deleted = '0' ORDER BY name_de ASC";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $data[$row['id']] = $row['name_de'];
        }

        return Utils::optOptions($data, $choose);
    }

    public function optCategory($choose)
    {
        $data = [
            0 => '',
        ];

        $sql = "SELECT * FROM ".TBL_CATEGORY." WHERE deleted = '0' ORDER BY name ASC";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $data[$row['id']] = $row['name'];
        }

        return Utils::optOptions($data, $choose);
    }

    public function optPage($choose, $get_name = false)
    {
        $data = [
            'AGB'                                 => 'AGB',
            'About'                               => 'About',
            'Datenschutz'                         => 'Datenschutz',
            'Impressum'                           => 'Impressum',
            'Kontakt'                             => 'Kontakt',
            'Kontakt Gewinner'                    => 'Kontakt Gewinner',
            'Paketauswahl'                        => 'Paketauswahl',
            'Checkout'                            => 'Checkout',
            'Anmeldung'                           => 'Anmelden',
            'Anmeldung Danke'                     => 'Anmelden Danke',
            'Anmeldung bestätigen'                => 'Anmeldung bestätigen',
            'Anmeldung bestätigen Fehler'         => 'Anmeldung bestätigen Fehler',
            'Login'                               => 'Login',
            'Anfrage detail'                      => 'Anfrage detail',
            'Anfrage erstellen'                   => 'Anfrage erstellen',
            'Inserat erstellen nicht angemeldet'  => 'Inserat erstellen nicht angemeldet',
            'Inserat erstellen'                   => 'Inserat erstellen',
            'Inserat erstellen mobil'             => 'Inserat erstellen mobil',
            'Inserat bearbeiten'                  => 'Inserat bearbeiten',
            'Inserat speichern'                   => 'Inserat speichern',
            'Inserat Vorschau'                    => 'Inserat Vorschau',
            'Inserat erstellt'                    => 'Inserat erstellt',
            'Profil bearbeiten'                   => 'Profil bearbeiten',
            'Profil bearbeiten danke'             => 'Profil bearbeiten danke',
            'Passwort vergessen'                  => 'Passwort vergessen',
            'Neues Passwort erstellen'            => 'Neues Passwort erstellen',
            'Angebot melden'                      => 'Angebot melden',
            'Suche'                               => 'Suche',
            'Update auf Pro'                      => 'Update auf Pro',
            'Marketing'                           => 'Marketing',
            'FAQ'                                 => 'FAQ',
            'Intro'                               => 'Intro',
            'Erste Schritte'                      => 'Erste Schritte',
            'Werben'                              => 'Werben',
            'Mobile-Intro-1'                      => 'Mobile-Intro-1',
            'Mobile-Intro-2'                      => 'Mobile-Intro-2',
            'Mobile-Intro-3'                      => 'Mobile-Intro-3',
            'Beschreibung extern'                 => 'Beschreibung extern',
            'Geld verdienen'                      => 'Geld verdienen',

            'Anmeldung Angebot'                   => 'Anmelden Angebot',
            'Anmeldung Angebot Danke'             => 'Anmelden Angebot Danke',
            'Anmeldung Angebot bestätigen'        => 'Anmeldung Angebot bestätigen',
            'Anmeldung Angebot bestätigen Fehler' => 'Anmeldung Angebot bestätigen Fehler',
            'Login Angebot'                       => 'Login Angebot',
            'Login propose'                       => 'Login propose',
            'Inserat Angebot erstellen'           => 'Inserat Angebot erstellen',
            'Inserat Angebot Vorschau'            => 'Inserat Angebot Vorschau',
            'Inserat Angebot bearbeiten'          => 'Inserat Angebot bearbeiten',
            'Inserat Angebot speichern'           => 'Inserat Angebot speichern',
            'Inserat Angebot erstellt'            => 'Inserat Angebot erstellt',
            'Inserat Angebot erstellen mobil'     => 'Inserat Angebot erstellen mobil',
            'Traffic erhöhen'                     => 'Traffic erhöhen',
            'Video'                               => 'Video',
            'Videomarketing'                      => 'Videomarketing',
            'Hilfe'                               => 'Hilfe',
            'Anbieten Hilfe'                      => 'Anbieten Hilfe',

            'Reisende Landingpage - Top'          => 'Reisende Landingpage - Top',
            'Reisende Landingpage - Bottom'       => 'Reisende Landingpage - Bottom',
            'Anbieter Landingpage - Top'          => 'Anbieter Landingpage - Top',
            'Anbieter Landingpage - Bottom'       => 'Anbieter Landingpage - Bottom',
            'Startseite'                          => 'Startseite'
        ];

        if ($get_name) {
            return $data[$choose];
        }

        return Utils::optOptions($data, $choose);
    }

    public function addressToCoordinates($street, $postalcode, $location)
    {
        $address = urlencode($street.' '.$postalcode.' '.$location);

        $url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false';

        $data = file_get_contents($url);
        $data = json_decode($data);

        return [
            'latitude'  => $data->results[0]->geometry->location->lat,
            'longitude' => $data->results[0]->geometry->location->lng,
        ];
    }

    public function optAdType($choose = '')
    {
        $data = [
            'raffle' => 'Gewinnspiel',
            //'raffle_offer' => 'Gewinnspiel & entgegennehmen von Preisvorschlägen',
            'offer'  => 'Verkaufsangebot',
        ];

        return Utils::optOptions($data, $choose);
    }

    public function optRaffleType($choose = 0)
    {
        $data = [
            0 => '0 .. Angebot',
            //'raffle_offer' => 'Gewinnspiel & entgegennehmen von Preisvorschlägen',
            1 => '1 .. Gewinnspiel Typ 1',
            2 => '2 .. Gewinnspiel Typ 2',
        ];

        return Utils::optOptions($data, $choose);
    }


    public function backendreport1($count = false, $limit = true)
    {
        $ret_val   = [];
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');
        $sql_order = " ";
        $sql_limit = ($limit && !$id ? Utils::limit($this->data_per_page) : '');

        $sql_order = " ORDER BY c_cdate DESC ";

        if ($count) {
            $sql = "SELECT COUNT(*) AS cnt FROM backend_report_1";

            //print '<br>' . $sql;
            return $this->db->queryOne($sql, null, 'cnt');
        }

        $sql = "SELECT *
                FROM backend_report_1
                WHERE 1 ".$sql_order.$sql_limit;
        //print '<br>' . $sql;
        $ret_val = $this->db->queryAll($sql);

        return ($id && $ret_val ? array_shift($ret_val) : $ret_val);
    }

}

?>
