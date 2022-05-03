<?php

class Backend_Controller extends Controller
{

    protected $user;
    protected $acl = null;

    public function __construct($module, $start_state, $require_login = true)
    {
        Utils::sendNoCacheHeader();

        parent::__construct($module, $start_state);

        $this->user = new User();

        if (!empty($_GET['username']) && !empty($_GET['password'])) {
            if ($this->user->getLogin() === true) {
                $this->user->logout();
            }
            $_POST['auth']['username'] = $_GET['username'];
            $_POST['auth']['password'] = $_GET['password'];
        }

        if ($this->user->getLogin() === false) {
            if (isset($_POST['auth']['username']) && isset($_POST['auth']['password'])) {
                if ($this->user->auth($_POST['auth']['username'], $_POST['auth']['password'])) {
                    Utils::redirect('index.php');
                } else {
                    $this->smarty->assign('msg', 'Login fehlgeschlagen');
                }
            }
        } else {
            if (isset($_GET['logout'])) {
                $this->user->logout();
                $this->smarty->assign('msg', 'Abmeldung erfolgreich');
            }
        }

        if ($require_login === true) {
            if ($this->user->getLogin() === false) {
                if (Utils::isAjax()) {
                    Utils::redirectJS('index.php');
                }
                parent::display('b_login.tpl');
                exit;
            }
        }

        //$this->acl = new ACL($this->user);
        //$this->smarty->assign('acl', $this->acl->getACLs());

        //register own smarty modifier -> core/smarty_modifier.inc.php
        $this->smarty->registerPlugin('modifier', 'nf', 'nf');

        $this->smarty->assign('sid', session_id());
        $this->smarty->assign('ajax', Utils::isAjax());
        $this->smarty->assign('user', $this->user->getUserdata());
        $this->smarty->assign('set_ajax', true);
        $this->smarty->assign('module', $this->module);
        $this->smarty->assign('debug', DEBUG);
    }

    public function successBox($msg = '', $redirect = '', $secondary = false)
    {
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('redirect', $redirect);
        $this->smarty->assign('secondary', $secondary);

        parent::display('b_successbox.tpl');
        exit;
    }

    public function aclError()
    {
        /*
        $data = array(
            'user_id' => $this->user->getUserID(),
            'acl_id' => $this->acl->getLastACLID(),
            'remote_addr' => $_SERVER['REMOTE_ADDR'],
            'timestamp' => time(),
            'query_string' => $_SERVER['QUERY_STRING'],
        );

        $this->acl->log($data);
        */
        $this->smarty->assign('B_acl_error', true);
        parent::display('b_acl.tpl');
        exit;
    }
}

?>
