<?php

class Router_Model extends Frontend_Model
{

    public function __construct()
    {
        parent::__construct(null);
    }

    public function isContentPage($alias)
    {
        $sql_where = " AND active = '1' ";

        $sql = "SELECT * FROM " . TBL_CONTENT . " WHERE 1 " . $sql_where . " AND alias = '" . addslashes($alias)
            . "' AND active = '1' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $data = $result->fetchRow();
            return $data['page'];
        }

        return false;
    }

    public function isCategoryPage($alias)
    {
        $sql = "SELECT * FROM " . TBL_CATEGORY . " WHERE alias = '" . addslashes($alias)
            . "' AND active = '1' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {

            return true;
        }

        return false;
    }

    public function isAd($id)
    {
        $sql = "SELECT * FROM " . TBL_AD . " WHERE id = '" . addslashes($id)
            . "' AND (active = '1' OR is_offer = '1') AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            return true;
        }

        return false;
    }

    public function isInquiry($id)
    {
        $sql = "SELECT * FROM " . TBL_INQUIRY . " WHERE id = '" . addslashes($id)
            . "' AND (active = '1') AND deleted = '0'";

        $result = $this->db->query($sql);
        if ($result->numRows()) {
            return true;
        }

        return false;
    }
}
