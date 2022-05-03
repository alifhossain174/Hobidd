<?php

class User extends Core
{

    protected $db;
    private $_login = false;
    private $_user_id = 0;
    private $_userdata = [];


    public function __construct($user_id = 0)
    {
        parent::__construct();

        $this->db = $this->getDB();

        if ($user_id) {
            $this->_login   = true;
            $this->_user_id = $user_id;
            $this->_setUserdata();
        } elseif (isset($_SESSION['backend']['auth'])) {
            $this->_login   = true;
            $this->_user_id = $_SESSION['backend']['auth']['user_id'];
            $this->_setUserdata();
        }
    }

    public function auth($username, $password)
    {
        if ($username == '' || $password == '') {
            return false;
        }

        $sql = "SELECT * FROM ".TBL_USER." WHERE username = '".addslashes($username)
               ."' AND parent_id = '0' AND deleted = '0'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $data = $result->fetchRow();
            if (sha1($password) == $data['password']) { //Utils::cryptString($password)
                if ($data['active'] == '1') {
                    $this->_login                           = true;
                    $_SESSION['backend']['auth']['user_id'] = $this->_user_id = $data['id'];
                    $this->_setUserdata();
                    $this->writeAuthLog($data['id'], '1', $data['username'], 'success');

                    return true;
                } else {
                    $this->writeAuthLog($data['id'], '1', $data['username'], 'password ok but user disabled');

                    return false;
                }
            } else {
                if ($data['active'] == '1') {
                    $this->writeAuthLog($data['id'], '0', $data['username'], 'wrong password');
                } else {
                    $this->writeAuthLog($data['id'], '0', $data['username'], 'wrong password, user disabled');
                }

                return false;
            }
        } else {
            $this->writeAuthLog('0', '0', $username, 'unknown user');
        }

        return false;
    }

    public function logout()
    {
        $this->_login   = false;
        $this->_user_id = $this->_userdata = null;

        foreach ($_SESSION as $key => $val) {
            unset($_SESSION[$key]);
        }
    }

    public function writeAuthLog($user_id, $status, $username = '', $log = '')
    {
        $data['user_id']     = $user_id;
        $data['status']      = $status;
        $data['username']    = $username;
        $data['log']         = $log;
        $data['remote_addr'] = $_SERVER['REMOTE_ADDR'];
        $data['timestamp']   = time();

        list($cols, $vals) = Utils::prepareInsert($data);
        $sql = "INSERT INTO ".TBL_USER_AUTH_LOG." (".$cols.") VALUES(".$vals.")";
        //print '<br>' . $sql;
        $this->db->exec($sql);

        return mysql_insert_id($this->db->connection);
    }

    private function _setUserdata()
    {
        $sql = "SELECT * FROM ".TBL_USER." WHERE id = '".$this->_user_id
               ."' AND parent_id = '0' AND deleted = '0' AND active = '1'";
        //print '<br>' . $sql;
        $result = $this->db->query($sql);
        if ($result->numRows()) {
            $this->_userdata = $result->fetchRow();
        } else {
            $this->logout();
            Utils::redirect('/');
        }
    }

    public function updateUserdata($data)
    {
        $sql = "UPDATE ".TBL_USER." SET ".Utils::prepareUpdate($data)." WHERE id = '".$this->_user_id."'";
        //print '<br>' . $sql;
        $this->db->exec($sql);
    }

    public function getUserdata($key = '')
    {
        if ($key) {
            return (isset($this->_userdata[$key]) ? $this->_userdata[$key] : '');
        }

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
