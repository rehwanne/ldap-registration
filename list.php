<?php

require 'init.php';


$stmt=$db->perpare('SELECT FROM regs');

$stmt->execute();
$stmt->bind_result($username, $password,$date,$ip);

while($stmt->fetch()) {
	echo $username."\n\t".$data."\t".$ip."\n";
}
