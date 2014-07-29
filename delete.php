<?php

require "init.php";

$username=$argv[1];
$backend=$argv[2];
$dn = 'uid='.$username.$ldap['base_dn'];
if($backend == "ldap"){
      if(ldap_delete($ldapconn,$dn)){
        echo "Successfully deleted";
        }else{
        echo "Something went wrong";
	}
}else{
      $stmt=$db->prepare('DELETE FROM regs WHERE username = ?');
      $stmt->bind_param('s',$username);
      $stmt->execute();
}
?>
