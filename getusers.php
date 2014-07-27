<?php
require "init.php";


$sr=ldap_search($ldapconn,$ldap['base_dn'],'(uid='.$username.')');
$info = ldap_get_entries($ldapconn, $sr);
echo $info;

?>