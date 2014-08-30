<?php

require "../init.php";


$username=$_POST['username'];
$password_old=$_POST['password_old'];
$password_new=$_POST['password_new'];
$password_new2=$_POST['password_new2'];

//check data
$errors=array();

if($password_new!==$password_new2) {
  $errors[]="not smame password";
}

if(strlen($password_new)<6) {
  $errors[]="password must be minimum 6 chars long";
}
if(!preg_match('/^[a-zA-Z0-9_-]+$/',$username)===1 && strlen($username)>=2) {
  $errors[]="username only [a-zA-Z0-9_-] and minimum lenght of 2";
}


if(sizeof($errors)==0) {
  $ldapconn_passwd = ldap_connect($ldap['host']);
  ldap_set_option($ldapconn_passwd, LDAP_OPT_PROTOCOL_VERSION, 3);
  $ldapbind_passwd = @ldap_bind($ldapconni_passwd,"uid=$username,ou=users,dc=milliways,dc=info",$password_old);
  if(!$ldapbind_passwd) {
    $errors[]="password is wrong";
  }
}

if(sizeof($errors)!==0) {
  echo '<p>'.implode('</p><p>',$errors).'</p>';
  die();
}


$info=array();
$info["userPassword"] = "{crypt}" . crypt($password_new,'$6$'.generateSalt(10).'$');

$result = ldap_mod_replace($ldapconn, "uid=$username,ou=users,dc=milliways,dc=info", $info);

die('Password changed');


