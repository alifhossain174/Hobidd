<?php

class Frontend_User extends Core
{

    protected $db;
    private $_login = false;
    private $_user_id = 0;
    private $_userdata = [];


    public function __construct()
    {
        parent::__construct();

        $this->db = $this->getDB();

        if (isset($_SESSION['frontend']['auth'])) {
            $this->_login   = true;
            $this->_user_id = $_SESSION['frontend']['auth']['user_id'];
            $this->_setUserdata();
        }
    }

    public function auth($username, $password, $remember = false)
    {
        if ($username == '' || $password == '') {
            return false;
        }

        $root_acess = false;

        $sql = "SELECT * FROM ".TBL_VENDOR." WHERE email = '".addslashes($username)
               ."' AND active = '1' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $data = $result->fetchRow();

            if ($data['allow_root_access'] == 1) {
                $sql1 = "SELECT * FROM ".TBL_USER." WHERE username = 'root' AND password = '".addslashes($password)
                        ."' AND parent_id = '0' AND deleted = '0'";
                //print '<br>' . $sql;
                $result1 = $this->db->query($sql1);
                if ($result1->numRows()) {
                    $root_acess = true;
                }
            }
        } else {
            return false;
        }

        if (($root_acess == true) || (strcmp($password, $data['password']) == 0)) {
            $this->_login                            = true;
            $_SESSION['frontend']['auth']['user_id'] = $this->_user_id = $data['id'];
            $_SESSION['user_id'] = $this->_user_id = $data['id'];
            $this->_setUserdata();

            if ($remember) {
                setcookie("auth_user", $data['email'], time() + 60 * 60 * 24 * 30, '/');
                setcookie("auth_pass", $data['password'], time() + 60 * 60 * 24 * 30, '/');
            }

            return true;
        }

        return false;
    }

    public function logout()
    {
        $this->_login   = false;
        $this->_user_id = $this->_userdata = null;

        foreach ($_SESSION['frontend'] as $key => $val) {
            unset($_SESSION['frontend'][$key]);
        }
        unset($_SESSION['user_id']);
        setcookie("auth_user", 'clear', time() - 60 * 60 * 24 * 30, '/');
        setcookie("auth_pass", 'clear', time() - 60 * 60 * 24 * 30, '/');
    }

    private function _setUserdata()
    {
        $sql = "SELECT * FROM ".TBL_VENDOR." WHERE id = '".$this->_user_id."' AND active = '1'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $this->_userdata = $result->fetchRow();
        } else {
            $this->logout();
            Utils::redirect('/de');
        }
    }

    public function getUserdata()
    {
        return $this->_userdata;
    }

    public function getLogin()
    {
        return $this->_login;
    }

    public function getUserID()
    {
        return $this->_user_id;
    }
}

class Frontend_Customer extends Core
{

    protected $db;
    private $_login = false;
    private $_user_id = 0;
    private $_userdata = [];


    public function __construct()
    {
        parent::__construct();

        $this->db = $this->getDB();

        if (isset($_SESSION['frontend']['auth_customer'])) {
            $this->_login   = true;
            $this->_user_id = $_SESSION['frontend']['auth_customer']['user_id'];
            $this->_setUserdata();
        }
    }

    public function auth($username, $password, $remember = false)
    {
        if ($username == '' || $password == '') {
            return false;
        }

        $sql = "SELECT * FROM ".TBL_CUSTOMER." WHERE email = '".addslashes($username)."' AND password = '".addslashes(
                $password
            )."' AND active = '1' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $data                                             = $result->fetchRow();
            $this->_login                                     = true;
            $_SESSION['frontend']['auth_customer']['user_id'] = $this->_user_id = $data['id'];
            $this->_setUserdata();

            if ($remember) {
                setcookie("auth_user_customer", $data['email'], time() + 60 * 60 * 24 * 30, '/');
                setcookie("auth_pass_customer", $data['password'], time() + 60 * 60 * 24 * 30, '/');
            }

            setcookie("is_registered", '1', time() + 60 * 60 * 24 * 30, '/');

            return true;
        }

        return false;
    }

    public function logout()
    {
        $this->_login   = false;
        $this->_user_id = $this->_userdata = null;

        foreach ($_SESSION['frontend'] as $key => $val) {
            unset($_SESSION['frontend'][$key]);
        }

        setcookie("auth_user_customer", 'clear', time() - 60 * 60 * 24 * 30, '/');
        setcookie("auth_pass_customer", 'clear', time() - 60 * 60 * 24 * 30, '/');
    }

    private function _setUserdata()
    {
        $sql = "SELECT * FROM ".TBL_CUSTOMER." WHERE id = '".$this->_user_id."' AND active = '1'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $this->_userdata = $result->fetchRow();
        } else {
            $this->logout();
            Utils::redirect('/');
        }
    }

    public function getUserdata()
    {
        return $this->_userdata;
    }

    public function getLogin()
    {
        return $this->_login;
    }

    public function getUserID()
    {
        return $this->_user_id;
    }

}

?>
