<?php

require "init.php";

$username=$argv[1];
if(isset($arv[2])){
	$backend=$argv[2];
  }
if(isset($backend)){
  if($backend == "sql")
    {
      $stmt=$db->prepare('DELETE FROM regs WHERE username = ?');
      $stmt->bind_param('s',$username);
      $stmt->execute();
  }elseif("$backend == ldap"){
      if(ldap_delete($ldapconnm,'dn='.$username.','.$ldap['dc'])){
        echo "Successfully deleted";
        }else{
        echo "Something went wrong";
        }
  }else{
      $stmt=$db->prepare('DELETE FROM regs WHERE username = ?');
      $stmt->bind_param('s',$username);
      $stmt->execute();
  }
}
?>
