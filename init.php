<?php

require 'config.php';

$db= new mysqli($mysql['host'],$mysql['user'],$mysql['pw'],$mysql['db']);
if($db->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}

$ldapconn = ldap_connect($ldap['host']);

if($ldapconn===false) {
	die('can\'t connect to ldap');
}

$bind = ldap_bind($ldapconn,$ldap['bind_rdn'], $ldap['bind_pw']);


if($bind===false) {
	die('can\'t bind to ldap');
}
