<?php

class Cron_Model extends Backend_Model
{

    public function __construct()
    {
        parent::__construct(null);
    }

    public function updateFacebookLikes()
    {
        $sql = "SELECT id, fb_object_id FROM ".TBL_AD
               ." WHERE deleted = '0' AND active = '1' AND (valid_to + 60*60*24) > UNIX_TIMESTAMP()";
        //print "\n" . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {
            //print_r($row); exit;

            $info = $this->_getFacebookObjectID('http://www.hobidd.com/de/artikel/'.$row['id'].'/');
            //print_r($info); exit;

            if (!empty($info['id'])) {
                $stats = $this->getFacebookStats($info['id']);
                //print_r($stats); exit;

                if (count($stats) > 0) {
                    $cnt = count($stats);

                    if ($cnt > 0) {
                        $info['shares'] = $info['shares'] - $cnt;
                    }

                    $sql = "UPDATE ".TBL_AD." SET fb_object_id = '".addslashes($info['id'])."', fb_shares = '"
                           .addslashes($info['shares'])."', fb_comments = '".$info['comments']."', fb_likes = '".$cnt
                           ."', fb_likes_raw = '".addslashes(json_encode($stats))."' WHERE id = '".$row['id']."'";
                    //print "\n" . $sql;
                    $this->db->exec($sql);
                }
            }

            sleep(1);
            $cnt++;
            print "\n".$cnt." - ".$info['shares'];
        }
    }

    public function getWinner()
    {
        $sql = "SELECT * FROM ".TBL_AD
               ." WHERE deleted = '0' AND active = '1' AND UNIX_TIMESTAMP() > valid_to AND fb_likes_raw <> '' AND fb_winner = '0'";
        //print "\n" . $sql;
        $result = $this->db->query($sql);
        while ($row = $result->fetchRow()) {

            if ($row['fb_likes_raw']) {
                $user = json_decode($row['fb_likes_raw']);
                //print_r($user);

                $winner = $user[rand(0, count($user) - 1)];
                //print_r($winner);

                $name       = (string)$winner->name;
                $profile_id = intval($winner->profile_id);


                $sql = "UPDATE ".TBL_AD." SET fb_winner = '".$profile_id."' WHERE id = '".$row['id']."'";
                //print "\n" . $sql;
                $this->db->exec($sql);


                $msg   = [];
                $msg[] = 'HOBIDD Gewinnspiel: '.$row['id'];
                $msg[] = 'Titel: '.$row['title'];
                $msg[] = '';
                $msg[] = 'Anzahl Teilnehmer: '.count($user);
                $msg[] = '';
                $msg[] = 'Gewinner: '.$name.' ('.$profile_id.')';
                $msg[] = '';
                $msg[] = 'https://www.facebook.com/'.$profile_id;
                //print_r($msg);

                $msg = implode("\n", $msg);

                //print $msg; exit;

                Utils::sendTextMail(
                    "rudolf@krakolinig.com",
                    "hobidd.com Gewinnspiel - Gewinner",
                    $msg,
                    'noreply@hobidd.com',
                    '',
                    'pw@sevenspire.com'
                );
            }


        }
    }

}

?>
