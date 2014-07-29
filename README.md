 
# LDAP Registration tool (LRT)

## install

rename the "config.php.dist" to "config.php" and edit it

import db.sql into mysql

run webserver with php and as root dir "www-root"

## add an registation request

got to the webserver und fillout the form and submit it
thats all

## show list

run

	php list.php

## allow registration from user %user%

run

	php allow.php %user%

## delete user request

run

	php delete.php %user%


## See  which users are in LDAP 

run 	
	php getusers.php
	
##Still to come:	

### delete users from LDAP
	
	will come
