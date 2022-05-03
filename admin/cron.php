#!/usr/bin/php
<?php

chdir(__DIR__);

require_once '../core/config.inc.php';

$cron = new Cron_Model;

$cron->updateFacebookLikes();

$cron->getWinner();

?>
