<?php

require "init.php";

$username=$argv[1];
$db = $argv[2];
  
if(isset($db)){
  if($db == "sql")
    {
      $stmt=$db->prepare('DELETE FROM regs WHERE username = ?');
      $stmt->bind_param('s',$username);
      $stmt->execute();
  }elseif("$db == ldap"){
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
