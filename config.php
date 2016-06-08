<?php

require_once("/etc/inc/authgui.inc");

echo "<center><img src=logo.png></center>";

$conf='/usr/local/etc/dansguardian/dansguardian.conf';
$etc='/usr/local/etc/dansguardian';
$bin='/usr/local/sbin/dansguardian';
$exceptioniplist='/usr/local/etc/dansguardian/exceptioniplist';
$filtergroupslist='/usr/local/etc/dansguardian/filtergroupslist';
$lists_dir='/usr/local/etc/dansguardian/lists';
$lists_install='/usr/local/etc/dansguardian/lists/install';
$conf_install='/usr/local/etc/dansguardian/dansinstall.conf';
$sed='/usr/bin/sed';

?>
