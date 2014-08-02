<?php

require 'init.php';


$stmt=$db->prepare('SELECT `username`,`date`,`ip` FROM regs');

$stmt->execute();
$stmt->bind_result($username, $date,$ip);

while($stmt->fetch()) {
    echo $username."\n\t".$date."\t".$ip."\n";
}
