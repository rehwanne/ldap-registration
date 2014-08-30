<?php

require "init.php";

$username=$argv[1];
$backend=isset($argv[2])?$argv[2]:'';
$dn = 'uid='.$username.','.$ldap['base_dn'];
if($backend == "ldap"){
  if(@ldap_delete($ldapconn,$dn)){
    echo "Successfully deleted \n";
  }else{
    echo "Something went wrong \n";
	}
}else{
  $stmt=$db->prepare('DELETE FROM regs WHERE username = ?');
  $stmt->bind_param('s',$username);
  $stmt->execute();
  if ($stmt->affected_rows) {
    echo "Successfully deleted \n";
  }else {
    echo "Something went wrong \n";
  }
}
?>
