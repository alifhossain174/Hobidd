<?php

class Backend_Model extends Core
{

    protected $db;
    protected $user;
    protected $settings;
    protected $translation;
    protected $history_exclude
        = [
            'id',
            'parent_id',
            'edate',
            'last_modified',
            'last_modified_user_id',
            'last_user',
        ];
    protected $_fb_access_token;


    public function __construct($user)
    {
        parent::__construct();

        $this->db   = $this->getDB();
        $this->user = $user;
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

    public function removeDiffentFields($data1, $data2, $exclude = [])
    {
        foreach ($data2 as $key => $val) {
            if (!isset($data1[$key]) && !in_array($key, $exclude)) {
                unset($data2[$key]);
            }
        }

        return $data2;
    }

    public function hasDifferences($data1, $data2, $exclude = [])
    {
        foreach ($data1 as $key => $val) {
            if (array_key_exists($key, $data2) && $key != 'edate' && $key != 'id' && $key != 'parent_id') {
                if (!in_array($key, $exclude)) {
                    if ($val != $data2[$key]) {
                        if (!(($data2[$key] == '' || $data2[$key] == '0') && ($val == '' || $val == '0'))) {
                            return true;
                        }
                    }
                }
            }
        }

        return false;
    }

    public function getFacebookStats($object_id)
    {
        $ret_val = [];

        if ($this->_fb_access_token == '') {
            $this->_fb_access_token = $this->_getAppAccessToken(FB_APP_ID, FB_APP_SECRET);
        }

        $graph_url = 'https://graph.facebook.com/v3.1/'.$object_id.'/likes?access_token='.$this->_fb_access_token;
        $result    = file_get_contents($graph_url);
        $result    = json_decode($result);
        //print_r($result); exit;

        foreach ($result->data as $key => $val) {
            $ret_val[] = [
                'name'       => $val->name,
                'profile_id' => $val->id,
            ];
        }

        return $ret_val;
    }

    protected function _getFacebookObjectID($url)
    {
        if ($this->_fb_access_token == '') {
            $this->_fb_access_token = $this->_getAppAccessToken(FB_APP_ID, FB_APP_SECRET);
        }

        $graph_url = 'https://graph.facebook.com/v3.1/?id='.urlencode($url).'&access_token='.$this->_fb_access_token;

        //print "\n" . $graph_url; exit;

        $result = file_get_contents($graph_url);
        $result = json_decode($result);
        //print_r($result); exit;

        if (empty($result->og_object->id)) {
            return 0;
        }

        return ['id'       => $result->og_object->id,
                'shares'   => $result->share->share_count,
                'comments' => $result->share->comment_count,
        ];
    }

    protected function _getAppAccessToken($app_id, $secret)
    {
        $url          = 'https://graph.facebook.com/oauth/access_token';
        $token_params = [
            "type"          => "client_cred",
            "client_id"     => $app_id,
            "client_secret" => $secret,
        ];

        return str_replace('access_token=', '', $this->_postURL($url, $token_params));
    }

    protected function _postURL($url, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, null, '&'));
        $ret = curl_exec($ch);
        curl_close($ch);

        return $ret;
    }

}

?>
