<?php

class ACL extends Core
{

    protected $db;
    protected $user;
    protected $roles;
    protected $acls;
    protected $last_acl_id;
    protected $is_superuser;

    public function __construct($user)
    {
        parent::__construct();

        $this->db   = $this->getDB();
        $this->user = $user;

        $this->__init();
    }

    private function __init()
    {
        $this->roles        = [];
        $this->is_superuser = false;

        if ($this->user->isSuperuser()) {
            $this->roles[]      = 1;
            $this->is_superuser = true;
        }

        $sql = "SELECT * FROM ".TBL_ROLE_USER." WHERE user_id = '".$this->user->getUserID()."'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            $this->roles[] = $row['role_id'];
        }

        if (!$this->roles) {
            $this->user->logout();
            die('ACL ERROR (no role)');
        }

        if ($this->is_superuser == true) {
            $sql = "SELECT * FROM ".TBL_ACL;
            //print '<br>' . $sql;
            $result = $this->db->query($sql);
            while ($row = $result->fetchRow()) {
                $this->acls[$row['acl']] = true;
            }
        } else {
            foreach ($this->roles as $id) {
                $sql = "SELECT ra.*, a.acl
						FROM ".TBL_ROLE_ACL." ra
						INNER JOIN ".TBL_ACL." a ON(a.id = ra.acl_id)
						WHERE role_id = '".$id."'";
                //print '<br>' . $sql;
                $result = $this->db->query($sql);
                while ($row = $result->fetchRow()) {
                    $this->acls[$row['acl']] = true;
                }
            }
        }
    }

    public function hasRight($acl)
    {
        $this->last_acl_id = $this->getACLID($acl);

        if (isset($this->acls[$acl])) {
            return true;
        }

        return false;
    }

    public function getACLs()
    {
        return $this->acls;
    }

    public function log($data)
    {
        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_ACL_LOG." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    public function getACLID($acl)
    {
        $sql = "SELECT id FROM ".TBL_ACL." WHERE id = '".addslashes($acl)."'";

        //print '<br>' . $sql;
        return $this->db->queryOne($sql, null, 'id');
    }

    public function getLastACLID()
    {
        return $this->last_acl_id;
    }

}

?>
