<?php
require "init.php";

$result = ldap_search($ldapconn,$ldap['base_dn'], "(cn=*)") or die ("Error in search query: ".ldap_error($ldapconn));
$data = ldap_get_entries($ldapconn, $result);

foreach($data as $user){
	echo "User: ". $user["mail"][0]."\n";
}

?>
