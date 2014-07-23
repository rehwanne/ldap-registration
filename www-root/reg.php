<?php

require "../init.php";


$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];

//check data
$errors=array();
if(!preg_match('/^[a-zA-Z0-9_-]+$/',$username)===1 && strlen($username)>=3) {
	$errors[]="username only [a-zA-Z0-9_-] and minimum lenght of 3";
}

if(sizeof($errors)===0) {
	$sr=ldap_search($ldapconn,$ldap['base_dn'],'(uid='.$username.')');
	$info = ldap_get_entries($ldapconn, $sr);
	if($info['count']!==0) {
		$errors[]="username allready in use";
	}
	$stmt=$db->prepare("SELECT `username` FROM regs WHERE `username` = ?");
	$stmt->bind_param('s',$username);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->num_rows!==0) {
		$errors[]="username allready in use";
	}
	$stmt->close();
}

if($password!==$password2) {
	$errors[]="not smame password";
}

if(strlen($password)<6) {
	$errors[]="password must be minimum 6 chars long";
}

if(sizeof($errors)!==0) {
	echo '<p>'.implode('</p><p>',$errors).'</p>';
	die();
}

//add entity
$stmt=$db->prepare("INSERT INTO regs(`username`,`password`,`date`,`ip`) VALUES (?,?,?,?)");
if($stmt===false) {
	die('internal prepare error: '.$db->error);
}
$stmt->bind_param('ssss',
				$username,
				crypt($password,'$6$'.generateSalt(10).'$'),
				date(DateTime::W3C),
				$_SERVER['REMOTE_ADDR']
				);
$stmt->execute();
$stmt->close();
die('successfull added');



function generateSalt($length=10) {
	$chars="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	
	$string="";
	for($i=0;$i<$length;$i++) {
		$string.=substr($chars,rand(0,strlen($chars)-1),1);
	}
	
	return $string;
}

