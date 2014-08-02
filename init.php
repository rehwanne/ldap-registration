<?php

require 'config.php';

function sendmail($mails,$user,$act){
	if(!$act){
		foreach($mails as $to)
			mail($to,'New User in Database','New User in Database: '.$user);
	}else
	{foreach($mails as $to)
		mail($to,'User has been activated','User has been activated: '.$user);
	}
}

function subscribe($username,$ml){
	if($mails['ml'] != 'none'){
		mail($mails['ml'],'subscribe','subscribe',$header = 'From:'.$username.'@milliways.info' . "\r\n");
	}else{
		return 0;
	}
}

$db= new mysqli($mysql['host'],$mysql['user'],$mysql['password'],$mysql['db']);
if($db->connect_error) {
	die('Connect Error (' . $db->connect_errno . ') '. $db->connect_error);
}

$ldapconn = ldap_connect($ldap['host']);

if($ldapconn===false) {
	die('can\'t connect to ldap');
}


ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
$bind = ldap_bind($ldapconn,$ldap['bind_rdn'], $ldap['bind_pw']);


if($bind===false) {
//  var_dump($ldapconn,$ldap['bind_rdn'], $ldap['bind_pw']);
	die('can\'t bind to ldap: '.ldap_error ($ldapconn));
}

